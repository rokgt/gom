<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{   
    public function showForm()
    {
        return view('create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        // 이미지 정보를 데이터베이스에 저장
        Image::create([
            'file_name' => $imageName,
        ]);

        return redirect()->route('image.form')->with('success', 'Image uploaded successfully.');
    }
}