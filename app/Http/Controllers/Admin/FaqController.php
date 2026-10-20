<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $this->ensureRole(['admin', 'editor', 'verifikator']);
        $faqs = Faq::query()
            ->with('service')
            ->orderByDesc('updated_at')
            ->paginate(10);

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create(): View
    {
        $this->ensureRole(['admin', 'editor']);
        $services = Service::query()
            ->orderBy('title')
            ->get();

        return view('admin.faqs.create', compact('services'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->ensureRole(['admin', 'editor']);
        $validated = $request->validate([
            'service_id' => [
                'nullable',
                'integer',
                'exists:services,id',
            ],
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['created_by_user_id'] = $request->user()->id;
        $validated['publication_status'] = 'draft';
        $validated['is_verified'] = false;
        $validated['verified_at'] = null;
        $validated['verified_by_name'] = null;

        Faq::create($validated);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ berhasil disimpan sebagai draft.');
    }

    public function show(string $id): RedirectResponse
    {
        return redirect()->route('admin.faqs.edit', $id);
    }

    public function edit(Faq $faq): View
    {
        $this->ensureRole(['admin', 'editor']);
        $services = Service::query()
            ->orderBy('title')
            ->get();

        return view('admin.faqs.edit', compact('faq', 'services'));
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $this->ensureRole(['admin', 'editor']);
        $validated = $request->validate([
            'service_id' => [
                'nullable',
                'integer',
                'exists:services,id',
            ],
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $contentChanged =
            $validated['service_id'] != $faq->service_id
            || $validated['question'] !== $faq->question
            || $validated['answer'] !== $faq->answer;

        if ($contentChanged) {
            $validated['publication_status'] = 'draft';
            $validated['is_verified'] = false;
            $validated['verified_at'] = null;
            $validated['verified_by_name'] = null;
        }

        $faq->update($validated);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', $contentChanged
                ? 'FAQ diperbarui dan dikembalikan menjadi draft karena kontennya berubah.'
                : 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $this->ensureRole(['admin', 'editor']);
        $faq->delete();

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ berhasil dihapus.');
    }


    public function verify(Faq $faq): RedirectResponse
    {
        $this->ensureRole(['admin', 'verifikator']);

        if (
            $faq->created_by_user_id !== null
            && (int) $faq->created_by_user_id === (int) auth()->id()
        ) {
            return redirect()
                ->route('admin.faqs.index')
                ->with(
                    'error',
                    'Pembuat FAQ tidak boleh memverifikasi kontennya sendiri.'
                );
        }

        if (blank($faq->question) || blank($faq->answer)) {
            return redirect()
                ->route('admin.faqs.edit', $faq)
                ->with(
                    'error',
                    'Pertanyaan dan jawaban harus diisi sebelum verifikasi.'
                );
        }

        $faq->update([
            'publication_status' => 'draft',
            'is_verified' => true,
            'verified_at' => now(),
            'verified_by_name' => auth()->user()->name,
        ]);

        return redirect()
            ->route('admin.faqs.index')
            ->with(
                'success',
                'FAQ berhasil diverifikasi dan tetap berstatus draf. Terbitkan secara terpisah setelah pemeriksaan akhir.'
            );
    }


    public function publish(Faq $faq): RedirectResponse
    {
        $this->ensureRole(['admin', 'verifikator']);
        if (! $faq->is_verified || ! $faq->verified_at) {
            return redirect()
                ->route('admin.faqs.index')
                ->with('error', 'FAQ harus diverifikasi terlebih dahulu.');
        }

        $faq->update([
            'publication_status' => 'published',
        ]);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ berhasil diterbitkan.');
    }

    public function unpublish(Faq $faq): RedirectResponse
    {
        $this->ensureRole(['admin', 'verifikator']);
        $faq->update([
            'publication_status' => 'draft',
        ]);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ dikembalikan menjadi draft.');
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
