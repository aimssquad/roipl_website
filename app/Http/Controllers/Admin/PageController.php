<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.pages.';
        // parent::__construct('Role');
    }
    public function index()
    {
        $datas = Page::all();
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
        $validated = $request->validate([
            'title' => 'required|string|max:455',
            'content' => 'required',
        ]);

        // Generate slug from title
        $slug = Str::slug($validated['title']);

        // Ensure the slug is unique
        $count = Page::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        // Add slug to validated data
        $validated['slug'] = $slug;

        // Create page
        $data = Page::create($validated);

        return redirect()->route($this->prefix.'index')->with('success', 'Created successfully.');
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
        $data = Page::find($id);
        return view($this->prefix.'edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Page::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:455',
            'content' => 'required',
        ]);

        // If title is changed, update slug
        if ($data->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);

            // Ensure uniqueness of the slug
            $count = Page::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }

            $validated['slug'] = $slug;
        }

        $data->update($validated);

        return redirect()->route($this->prefix . 'index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = Page::find($id);
        $about->delete();

        return redirect()->route($this->prefix.'index')->with('success', 'Deleted successfully.');
    }
}
