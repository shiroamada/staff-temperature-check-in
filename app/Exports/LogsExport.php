<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LogsExport implements FromCollection, WithHeadingRow
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //header row
        $excel = collect([[
        ]]);
        $excel->push([
            'Date',
            'Name',
            'ID',
            'Temperature',
        ]);
        foreach($this->data as $log)
        {
            $excel->push([
                trim($log->created_at),
                trim($log->staff_name),
                trim($log->staff_id),
                trim($log->staff_temp),
            ]);
        }

        return $excel;
    }
}
