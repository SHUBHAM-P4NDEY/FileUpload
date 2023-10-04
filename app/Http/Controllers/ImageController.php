<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('index', compact('images'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('images', 'public');

            $image = new Image();
            $image->name = $request->file('image')->getClientOriginalName();
            $image->path = $imagePath;
            $image->save();

            return redirect()->back()->with('success', 'Image uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Image upload failed.');
    }

    public function delete($id)
    {
        $image = Image::findOrFail($id);

        Storage::disk('public')->delete($image->path);

        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}

