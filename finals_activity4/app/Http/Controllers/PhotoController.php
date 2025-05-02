<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
    use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function storeSingle(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $image = $request->file('image');
        $name = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $name);

        Photo::create(['image' => $name]);

        return back()->with('success', 'Single image uploaded successfully!');
    }

    public function storeMultiple(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        foreach ($request->file('images') as $image) {
            $name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            Photo::create(['image' => $name]);
        }

        return back()->with('success', 'Multiple images uploaded successfully!');
    }


public function index()
{
    $photos = Photo::latest()->paginate(10); // Paginate with 10 photos per page
    return view('photos', compact('photos'));
}

public function destroy(Photo $photo)
{
    // Delete the image file from storage
    if (file_exists(public_path('images/' . $photo->image))) {
        unlink(public_path('images/' . $photo->image));
    }

    // Delete the photo record
    $photo->delete();

    return back()->with('success', 'Photo deleted successfully!');
}
}