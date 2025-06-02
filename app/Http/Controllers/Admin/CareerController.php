<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Storage;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.careers.';
    }
    public function index()
    {
        $datas = Career::with(['state', 'city', 'department', 'job'])->orderBy('id', 'desc')->get();
        // dd($datas);
        return view($this->prefix.'index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $career = Career::findOrFail($id);
        if ($career->image1 && Storage::exists('public/' . $career->cv)) {
            Storage::delete('public/' . $career->cv);
        }
        $career->delete();

        return redirect()->route($this->prefix.'index')->with('success', ' Deleted successfully.');
    }
    public function updateStatus(Request $request)
    {
        $career = Career::find($request->id);

        if ($career) {
            $career->status = $request->status;
            $career->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Career not found']);
    }
}
