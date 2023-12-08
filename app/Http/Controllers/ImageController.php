<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $image = $request->file('image');

        $image_name = $image->getClientOriginalName();

        Storage::fake('public');
        Storage::disk('public')->put('images/books', $image);
        
        // $path = $image->storeAs('images/books', $image_name, 'public');
        $image->move(public_path('images/books'), $image_name);
        
        return response($image);
    }
}
