<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->hasFile('image');
        // $image_name = $image->getClientOriginalName();

        // $request['image']->move(public_path('images/books', $image_name . '.png'));

        return response(mb_convert_encoding($request['image'], 'UTF-8', 'UTF-8'));
    }
}
