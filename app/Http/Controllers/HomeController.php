<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\Branch;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::with('services')->where('status', true)->orderBy('sort_order')->get();
        $featuredServices = Service::with('category')->where('is_featured', true)->where('status', true)->get();
        $doctors = Doctor::with('branch')->where('status', true)->take(6)->get();
        $branches = Branch::where('status', true)->get();
        $featuredPosts = Post::where('is_featured', true)->where('status', true)->latest()->take(3)->get();
        $testimonials = Testimonial::where('status', true)->get();

        return view('client.home', compact('categories', 'featuredServices', 'doctors', 'branches', 'featuredPosts', 'testimonials'));
    }
}
