<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Branch;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::with(['services' => function ($query) {
            $query->where('status', true);
        }])->where('status', true)->orderBy('sort_order')->get();

        return view('client.services.index', compact('categories'));
    }

    public function show($slug)
    {
        $service = Service::with('category')->where('slug', $slug)->where('status', true)->firstOrFail();
        $relatedServices = Service::where('category_id', $service->category_id)->where('id', '!=', $service->id)->where('status', true)->take(3)->get();
        $branches = Branch::where('status', true)->get();

        return view('client.services.show', compact('service', 'relatedServices', 'branches'));
    }
}
