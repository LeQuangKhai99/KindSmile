<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\PriceItem;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::with(['priceItems' => function ($q) {
            $q->where('status', true);
        }])->where('status', true)->orderBy('sort_order')->get();

        return view('client.price.index', compact('categories'));
    }
}
