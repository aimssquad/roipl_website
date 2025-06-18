<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAward;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.awards.';
    }
    public function index()
    {
        $datas = EmployeeAward::all();
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
            'month' => 'required|string',
            'awards.*.name' => 'required|string',
            'awards.*.designation' => 'required|string',
            'awards.*.team' => 'required|string',
            'awards.*.card_color' => 'nullable|string',
        ]);

        foreach ($request->awards as $award) {
            EmployeeAward::create([
                'month' => $request->month,
                'name' => $award['name'],
                'designation' => $award['designation'],
                'team' => $award['team'],
                'card_color' => $award['card_color'] ?? 'black',
            ]);
        }

        return redirect()->route($this->prefix.'index')->with('success', 'Employee awards created successfully.');
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
        $award = EmployeeAward::findOrFail($id);
        $sameMonthAwards = EmployeeAward::where('month', $award->month)->get();
        return view($this->prefix.'edit', compact('award', 'sameMonthAwards'));
    }
    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
    {
        $request->validate([
            'month' => 'required|string',
            'awards.*.name' => 'required|string',
            'awards.*.designation' => 'required|string',
            'awards.*.team' => 'required|string',
            'awards.*.card_color' => 'nullable|string',
        ]);

        $existingAwardIds = [];

        foreach ($request->awards as $awardData) {
            if (!empty($awardData['id'])) {
                // Update existing award
                $award = EmployeeAward::find($awardData['id']);
                if ($award) {
                    $award->update([
                        'month' => $request->month,
                        'name' => $awardData['name'],
                        'designation' => $awardData['designation'],
                        'team' => $awardData['team'],
                        'card_color' => $awardData['card_color'] ?? 'black',
                    ]);
                    $existingAwardIds[] = $award->id;
                }
            } else {
                // Create new award
                $newAward = EmployeeAward::create([
                    'month' => $request->month,
                    'name' => $awardData['name'],
                    'designation' => $awardData['designation'],
                    'team' => $awardData['team'],
                    'card_color' => $awardData['card_color'] ?? 'black',
                ]);
                $existingAwardIds[] = $newAward->id;
            }
        }

        // Optional: Delete awards that were removed from the form
            EmployeeAward::where('month', $request->month)
            ->whereNotIn('id', $existingAwardIds)
            ->delete();

        return redirect()->route($this->prefix.'index')->with('success', 'Employee awards updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $award = EmployeeAward::findOrFail($id);
        EmployeeAward::where('month', $award->month)->delete();
        return redirect()->route($this->prefix.'index')->with('success', 'All employee awards for the month of ' . $award->month . ' have been deleted.');
    }
}
