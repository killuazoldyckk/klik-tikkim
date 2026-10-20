<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramReel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class InstagramReelController extends Controller
{
    public function index(): View
    {
        $this->ensureRole(['admin', 'editor', 'verifikator']);

        $reels = InstagramReel::query()
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.instagram-reels.index', compact('reels'));
    }

    public function create(): View
    {
        $this->ensureRole(['admin', 'editor']);

        return view('admin.instagram-reels.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->ensureRole(['admin', 'editor']);

        $data = $this->validatedData($request);

        $reel = new InstagramReel();
        $reel->title = $data['title'];
        $reel->description = $data['description'] ?? null;
        $reel->instagram_url = $data['instagram_url'];
        $reel->sort_order = $data['sort_order'] ?? 0;
        $reel->is_active = false;
        $reel->is_verified = false;
        $reel->created_by_user_id = auth()->id();
        $reel->save();

        return redirect()
            ->route('admin.instagram-reels.index')
            ->with(
                'success',
                'Reel berhasil disimpan sebagai konten yang belum diverifikasi.'
            );
    }

    public function edit(InstagramReel $instagramReel): View
    {
        $this->ensureRole(['admin', 'editor']);

        return view(
            'admin.instagram-reels.edit',
            compact('instagramReel')
        );
    }

    public function update(
        Request $request,
        InstagramReel $instagramReel
    ): RedirectResponse {
        $this->ensureRole(['admin', 'editor']);

        $data = $this->validatedData($request);

        $contentChanged =
            $instagramReel->title !== $data['title']
            || $instagramReel->description !== ($data['description'] ?? null)
            || $instagramReel->instagram_url !== $data['instagram_url'];

        $instagramReel->title = $data['title'];
        $instagramReel->description = $data['description'] ?? null;
        $instagramReel->instagram_url = $data['instagram_url'];
        $instagramReel->sort_order = $data['sort_order'] ?? 0;

        if ($contentChanged) {
            $instagramReel->is_verified = false;
            $instagramReel->is_active = false;
            $instagramReel->verified_at = null;
            $instagramReel->verified_by_name = null;
        }

        $instagramReel->save();

        return redirect()
            ->route('admin.instagram-reels.index')
            ->with(
                'success',
                $contentChanged
                    ? 'Reel diperbarui dan dikembalikan ke status belum diverifikasi.'
                    : 'Reel berhasil diperbarui.'
            );
    }

    public function destroy(
        InstagramReel $instagramReel
    ): RedirectResponse {
        $this->ensureRole(['admin', 'editor']);

        $instagramReel->delete();

        return redirect()
            ->route('admin.instagram-reels.index')
            ->with('success', 'Reel berhasil dihapus.');
    }

    public function verify(
        InstagramReel $instagramReel
    ): RedirectResponse {
        $this->ensureRole(['admin', 'verifikator']);

        if (
            $instagramReel->created_by_user_id !== null
            && (int) $instagramReel->created_by_user_id === (int) auth()->id()
        ) {
            return redirect()
                ->route('admin.instagram-reels.index')
                ->with(
                    'error',
                    'Pembuat Reel tidak boleh memverifikasi kontennya sendiri.'
                );
        }

        if (
            blank($instagramReel->title)
            || ! $this->isValidInstagramUrl($instagramReel->instagram_url)
        ) {
            return redirect()
                ->route('admin.instagram-reels.edit', $instagramReel)
                ->with(
                    'error',
                    'Judul dan tautan Reel Instagram yang valid wajib tersedia sebelum verifikasi.'
                );
        }

        $instagramReel->is_verified = true;
        $instagramReel->is_active = false;
        $instagramReel->verified_at = now();
        $instagramReel->verified_by_name = auth()->user()->name;
        $instagramReel->save();

        return redirect()
            ->route('admin.instagram-reels.index')
            ->with(
                'success',
                'Reel berhasil diverifikasi. Aktifkan secara terpisah setelah pemeriksaan akhir.'
            );
    }

    public function publish(
        InstagramReel $instagramReel
    ): RedirectResponse {
        $this->ensureRole(['admin', 'verifikator']);

        if (
            ! $instagramReel->is_verified
            || blank($instagramReel->verified_at)
        ) {
            return redirect()
                ->route('admin.instagram-reels.index')
                ->with(
                    'error',
                    'Reel harus diverifikasi terlebih dahulu sebelum diaktifkan.'
                );
        }

        $instagramReel->is_active = true;
        $instagramReel->save();

        return redirect()
            ->route('admin.instagram-reels.index')
            ->with('success', 'Reel berhasil diaktifkan untuk halaman publik.');
    }

    public function unpublish(
        InstagramReel $instagramReel
    ): RedirectResponse {
        $this->ensureRole(['admin', 'verifikator']);

        $instagramReel->is_active = false;
        $instagramReel->save();

        return redirect()
            ->route('admin.instagram-reels.index')
            ->with('success', 'Reel dinonaktifkan dari halaman publik.');
    }

    private function validatedData(Request $request): array
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'instagram_url' => [
                'required',
                'string',
                'url',
                'max:2048',
                function ($attribute, $value, $fail) {
                    if (! $this->isValidInstagramUrl($value)) {
                        $fail(
                            'Masukkan tautan Reel Instagram yang valid, misalnya https://www.instagram.com/reel/ABC123/'
                        );
                    }
                },
            ],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:4294967295'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }

    private function isValidInstagramUrl(?string $url): bool
    {
        if (blank($url)) {
            return false;
        }

        $parts = parse_url($url);

        if (! is_array($parts)) {
            return false;
        }

        $scheme = strtolower($parts['scheme'] ?? '');
        $host = strtolower($parts['host'] ?? '');
        $path = $parts['path'] ?? '';

        return $scheme === 'https'
            && in_array($host, [
                'instagram.com',
                'www.instagram.com',
            ], true)
            && ! isset($parts['user'])
            && ! isset($parts['pass'])
            && ! isset($parts['port'])
            && preg_match(
                '#^/(reel|reels|p)/[A-Za-z0-9_-]+/?$#i',
                $path
            ) === 1;
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
