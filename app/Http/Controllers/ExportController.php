<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DynamicExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportTableData(Request $request)
    {
        // Decode the JSON data and headings from the request
        $data = json_decode($request->input('data'), true);
        $headings = json_decode($request->input('headings'), true);

        // Return the Excel file for download
        return Excel::download(new DynamicExport($data, $headings), 'table_data.xlsx');
    }
}
