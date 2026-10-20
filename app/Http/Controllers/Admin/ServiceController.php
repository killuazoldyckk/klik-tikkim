<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $this->ensureRole(['admin', 'editor', 'verifikator']);
        $services = Service::query()
            ->with('category')
            ->orderByDesc('updated_at')
            ->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        $this->ensureRole(['admin', 'editor']);
        $categories = ServiceCategory::query()
            ->orderBy('name')
            ->get();

        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->ensureRole(['admin', 'editor']);
        $validated = $request->validate([
            'service_category_id' => [
                'required',
                'integer',
                'exists:service_categories,id',
            ],
            'title' => ['required', 'string', 'max:200'],
            'summary' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
            'official_url' => ['nullable', 'url', 'max:2048'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['slug'] = $this->makeUniqueSlug($validated['title']);
        $validated['created_by_user_id'] = $request->user()->id;
        $validated['publication_status'] = 'draft';
        $validated['is_verified'] = false;
        $validated['verified_at'] = null;
        $validated['verified_by_name'] = null;

        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil disimpan sebagai draft. Layanan belum tampil kepada publik.');
    }

    public function show(string $id): RedirectResponse
    {
        return redirect()->route('admin.services.edit', $id);
    }

    public function edit(Service $service): View
    {
        $this->ensureRole(['admin', 'editor']);
        $categories = ServiceCategory::query()
            ->orderBy('name')
            ->get();

        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $this->ensureRole(['admin', 'editor']);
        $validated = $request->validate([
            'service_category_id' => [
                'required',
                'integer',
                'exists:service_categories,id',
            ],
            'title' => ['required', 'string', 'max:200'],
            'summary' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
            'official_url' => ['nullable', 'url', 'max:2048'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        if ($validated['title'] !== $service->title) {
            $validated['slug'] = $this->makeUniqueSlug(
                $validated['title'],
                $service->id
            );
        }

        // Perubahan konten membatalkan verifikasi sebelumnya.
        $contentChanged =
            $validated['title'] !== $service->title
            || $validated['service_category_id'] != $service->service_category_id
            || ($validated['summary'] ?? null) !== $service->summary
            || ($validated['content'] ?? null) !== $service->content
            || ($validated['official_url'] ?? null) !== $service->official_url;

        if ($contentChanged) {
            $validated['publication_status'] = 'draft';
            $validated['is_verified'] = false;
            $validated['verified_at'] = null;
            $validated['verified_by_name'] = null;
        }

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', $contentChanged
                ? 'Layanan diperbarui dan dikembalikan menjadi draft karena kontennya berubah.'
                : 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $this->ensureRole(['admin', 'editor']);
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }

    public function verify(Service $service): RedirectResponse
    {
        $this->ensureRole(['admin', 'verifikator']);

        if (
            $service->created_by_user_id !== null
            && (int) $service->created_by_user_id === (int) auth()->id()
        ) {
            return redirect()
                ->route('admin.services.index')
                ->with('error', 'Pembuat layanan tidak boleh memverifikasi kontennya sendiri.');
        }

        if (
            blank($service->title)
            || blank($service->content)
            || blank($service->official_url)
        ) {
            return redirect()
                ->route('admin.services.edit', $service)
                ->with('error', 'Lengkapi judul, isi informasi, dan tautan sumber resmi sebelum verifikasi.');
        }

        $service->update([
            'is_verified' => true,
            'verified_at' => now(),
            'verified_by_name' => auth()->user()->name,
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan ditandai telah diverifikasi. Status publikasinya tetap perlu diatur.');
    }

    public function publish(Service $service): RedirectResponse
    {
        $this->ensureRole(['admin', 'verifikator']);
        if (! $service->is_verified || blank($service->verified_at)) {
            return redirect()
                ->route('admin.services.index')
                ->with('error', 'Layanan harus diverifikasi terlebih dahulu sebelum diterbitkan.');
        }

        $service->update([
            'publication_status' => 'published',
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil diterbitkan.');
    }

    public function unpublish(Service $service): RedirectResponse
    {
        $this->ensureRole(['admin', 'verifikator']);
        $service->update([
            'publication_status' => 'draft',
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan dikembalikan menjadi draft.');
    }

    private function makeUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);

        if ($baseSlug === '') {
            $baseSlug = 'layanan';
        }

        $slug = $baseSlug;
        $suffix = 2;

        while (
            Service::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $suffix;
            $suffix++;
        }

        return $slug;
    }

    private function ensureRole(array $allowedRoles): void
    {
        abort_unless(
            in_array(auth()->user()?->role, $allowedRoles, true),
            403,
            'Anda tidak memiliki izin untuk melakukan tindakan ini.'
        );
    }
}