<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.contacts.';
        // parent::__construct('Role');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Contact::orderBy('id', 'desc')->get();
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
        $data = Contact::findOrFail($id);

        // Check if the role can be deleted (optional, based on business rules)
        if ($data->name == 'Dashboard') {
            return redirect()->route($this->prefix.'index')->with('error', 'Cannot delete the dashboard.');
        }
        $data->delete();
        return redirect()->route($this->prefix.'index')->with('success', 'Data deleted successfully.');
    }

    public function updateStatus(Request $request)
    {
        $contact = Contact::find($request->id);

        if ($contact) {
            // Toggle the status (if status is 1, make it 0, and vice versa)
            $contact->status = $contact->status == 1 ? 0 : 1;
            $contact->save();

            return response()->json(['success' => true, 'status' => $contact->status]);
        }

        return response()->json(['success' => false], 400);
    }

}
