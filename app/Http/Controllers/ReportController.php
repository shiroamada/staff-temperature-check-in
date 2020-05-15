<?php

namespace App\Http\Controllers;

use App\Exports\LogsExport;
use App\Exports\MoviesExport;
use App\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $data['contentheader_title'] = 'Reporting';

        return view('reports.index', $data);
    }

    public function export(Request $request)
    {
        $validator = Validator::make($request->all(), ['date_filter' => 'required']);

        if(request()->has('date_filter') && !empty(request()->get('date_filter')))
        {
            list($dateStart, $dateEnd) = explode(' - ', request()->get('date_filter'));
        }


        //perform search
        $data = Logs::whereBetween('created_at', [$dateStart . ' 00:00:00', $dateEnd . ' 23:59:59'])->get();

        if($data->count() < 1)
        {
            $validator->getMessageBag()->add('nodata', 'No Data Found! Please change your search filter.');
            return redirect()->back()->withInput()->withErrors($validator);
        }

        return \Maatwebsite\Excel\Facades\Excel::download(new LogsExport($data), date('Y-m-d').'-'.Str::slug(env('APP_COMPANY_NAME','MY COMPANY'), '_').'.xls', \Maatwebsite\Excel\Excel::XLS);

    }
}
