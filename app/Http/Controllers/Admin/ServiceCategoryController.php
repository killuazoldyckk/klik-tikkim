<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceCategoryController extends Controller
{
    public function index(): View
    {
        $categories = ServiceCategory::query()
            ->withCount('services')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150', 'unique:service_categories,name'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['required', 'boolean'],
        ]);

        $validated['slug'] = $this->makeUniqueSlug($validated['name']);

        ServiceCategory::create($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(string $id): RedirectResponse
    {
        return redirect()->route('admin.categories.edit', $id);
    }

    public function edit(ServiceCategory $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, ServiceCategory $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('service_categories', 'name')->ignore($category->id),
            ],
            'description' => ['nullable', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['required', 'boolean'],
        ]);

        if ($validated['name'] !== $category->name) {
            $validated['slug'] = $this->makeUniqueSlug($validated['name'], $category->id);
        }

        $category->update($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(ServiceCategory $category): RedirectResponse
    {
        if ($category->services()->exists()) {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki layanan.');
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    private function makeUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);

        if ($baseSlug === '') {
            $baseSlug = 'kategori';
        }

        $slug = $baseSlug;
        $suffix = 2;

        while (
            ServiceCategory::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $suffix;
            $suffix++;
        }

        return $slug;
    }
}