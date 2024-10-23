<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandLogo;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Validator;


class BrandLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.brandlogos.';
    }
    public function index()
    {
        $datas = BrandLogo::all();
        return view($this->prefix.'index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->prefix.'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:brand_logos,title',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048', // Max file size 2MB
        ]);

        // Store the images if they exist
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brandlogos', 'public');
        }


        // Create the brand record in the database
        BrandLogo::create([
            'title' => $request->input('title'),
            'image' => $imagePath,
        ]);

        // Redirect back with success message
        return redirect()->route($this->prefix.'index')->with('success', 'Brand Logo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = BrandLogo::find($id);
        return view($this->prefix.'edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = BrandLogo::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255|unique:brand_logos,title,' . $brand->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        // Find the brand by ID
        $brand = BrandLogo::findOrFail($id);

        // Handle Image 1 upload (only if a new image is uploaded)
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($brand->image && Storage::exists('public/' . $brand->image)) {
                Storage::delete('public/' . $brand->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('brandlogos', 'public');
            $brand->image = $imagePath;
        }


        // Update the brand data
        $brand->update([
            'title' => $request->input('title'),
        ]);

        // Redirect back with success message
        return redirect()->route($this->prefix.'index')->with('success', 'Brand Logo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = BrandLogo::findOrFail($id);

        // Check if Image 1 exists and delete it from storage
        if ($brand->image && Storage::exists('public/' . $brand->image)) {
            Storage::delete('public/' . $brand->image);
        }
        // Delete the brand record from the database
        $brand->delete();

        // Redirect back with a success message
        return redirect()->route($this->prefix.'index')->with('success', 'Brand Logo deleted successfully.');
    }
}
