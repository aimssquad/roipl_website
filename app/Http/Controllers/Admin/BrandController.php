<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Storage;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.brands.';
    }
    public function index()
    {
        $datas = Brand::all();
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
        // dd($request->all());
        // Validate the form inputs
        $request->validate([
            'title' => 'required|string|max:255|unique:brands,title',
            'brand_type' => 'required|string|max:255',
            'small_description' => 'required|string|max:255',
            'long_description' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048', // Max file size 2MB
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        // Store the images if they exist
        $image1Path = null;
        if ($request->hasFile('image1')) {
            $image1Path = $request->file('image1')->store('brands', 'public');
        }

        $image2Path = null;
        if ($request->hasFile('image2')) {
            $image2Path = $request->file('image2')->store('brands', 'public');
        }

        // Create the brand record in the database
        Brand::create([
            'title' => $request->input('title'),
            'brand_type' => $request->input('brand_type'),
            'small_description' => $request->input('small_description'),
            'long_description' => $request->input('long_description'),
            'image1' => $image1Path,
            'image2' => $image2Path,
        ]);

        // Redirect back with success message
        return redirect()->route($this->prefix.'index')->with('success', 'Brand created successfully.');
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
        $brand = Brand::find($id);
        return view($this->prefix.'edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $brand = Brand::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255|unique:brands,title,' . $brand->id,
            'brand_type' => 'required|string|max:255',
            'small_description' => 'required|string|max:255',
            'long_description' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        // Find the brand by ID
        $brand = Brand::findOrFail($id);

        // Handle Image 1 upload (only if a new image is uploaded)
        if ($request->hasFile('image1')) {
            // Delete the old image if it exists
            if ($brand->image1 && Storage::exists('public/' . $brand->image1)) {
                Storage::delete('public/' . $brand->image1);
            }
            // Store the new image
            $image1Path = $request->file('image1')->store('brands', 'public');
            $brand->image1 = $image1Path;
        }

        // Handle Image 2 upload (only if a new image is uploaded)
        if ($request->hasFile('image2')) {
            // Delete the old image if it exists
            if ($brand->image2 && Storage::exists('public/' . $brand->image2)) {
                Storage::delete('public/' . $brand->image2);
            }
            // Store the new image
            $image2Path = $request->file('image2')->store('brands', 'public');
            $brand->image2 = $image2Path;
        }

        // Update the brand data
        $brand->update([
            'title' => $request->input('title'),
            'brand_type' => $request->input('brand_type'),
            'small_description' => $request->input('small_description'),
            'long_description' => $request->input('long_description'),
        ]);

        // Redirect back with success message
        return redirect()->route($this->prefix.'index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the brand by ID
        $brand = Brand::findOrFail($id);

        // Check if Image 1 exists and delete it from storage
        if ($brand->image1 && Storage::exists('public/' . $brand->image1)) {
            Storage::delete('public/' . $brand->image1);
        }

        // Check if Image 2 exists and delete it from storage
        if ($brand->image2 && Storage::exists('public/' . $brand->image2)) {
            Storage::delete('public/' . $brand->image2);
        }

        // Delete the brand record from the database
        $brand->delete();

        // Redirect back with a success message
        return redirect()->route($this->prefix.'index')->with('success', 'Brand deleted successfully.');
    }

}
