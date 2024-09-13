<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class DynamicExport implements FromCollection, WithHeadings
{
    protected $data;
    protected $headings;

    // Constructor to accept data and headings
    public function __construct($data, $headings)
    {
        $this->data = $data;
        $this->headings = $headings;
    }

    // Return the data as a collection
    public function collection()
    {
        return collect($this->data);
    }

    // Return the headings for the columns
    public function headings(): array
    {
        return $this->headings;
    }
}
