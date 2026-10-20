<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\InstagramReel;

class PublicController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));

        $categories = ServiceCategory::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->with([
                'services' => fn ($query) => $query
                    ->where('publication_status', 'published')
                    ->where('is_verified', true)
                    ->orderBy('sort_order')
                    ->orderBy('title'),
            ])
            ->get();

        // Pencarian layanan yang sudah terverifikasi dan diterbitkan.
        $services = Service::query()
            ->where('publication_status', 'published')
            ->where('is_verified', true)
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery
                        ->where('title', 'like', "%{$search}%")
                        ->orWhere('summary', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        // Pencarian FAQ menggunakan kata kunci yang sama.
        $faqs = Faq::query()
            ->where('publication_status', 'published')
            ->where('is_verified', true)
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery
                        ->where('question', 'like', "%{$search}%")
                        ->orWhere('answer', 'like', "%{$search}%");
                });
            })
            ->orderBy('sort_order')
            ->when(
                $search === '',
                fn ($query) => $query->latest()
            )
            ->when(
                $search === '',
                fn ($query) => $query->limit(10)
            )
            ->get();

        // Reels Instagram yang sudah diverifikasi dan diaktifkan.
        $reels = InstagramReel::query()
            ->where('is_active', true)
            ->where('is_verified', true)
            ->orderBy('sort_order')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

            return view('public.home', compact(
            'categories',
            'services',
            'faqs',
            'search',
            'reels'
        ));
    }

    public function showService(string $slug): View
    {
        $service = Service::query()
            ->where('slug', $slug)
            ->where('publication_status', 'published')
            ->where('is_verified', true)
            ->with('category', 'faqs')
            ->firstOrFail();

        $faqs = $service->faqs()
            ->where('publication_status', 'published')
            ->where('is_verified', true)
            ->orderBy('sort_order')
            ->get();

        return view('public.service-detail', compact('service', 'faqs'));
    }
}
