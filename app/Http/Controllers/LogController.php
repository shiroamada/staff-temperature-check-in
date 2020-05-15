<?php

namespace App\Http\Controllers;

use App\Logs;
use App\Notifications\StaffFever;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Cookie;

class LogController extends Controller
{

    protected $redirectTo = '/home';

    public function __construct()
    {
    }

    function getApiCustomer()
    {
        $query = request('q');
        $results = Logs::getCustomerNameByUbsCodeOrUsername($query);

        return response(['results' => $results, 'nextPageUrl' => $results->nextPageUrl(),'status' => true], 200);

    }

    function getApiSelect2Customer()
    {
        $query = request('q');
        $results = Customer::where('user_name', 'LIKE', "%$query%")
            ->select('customers.user_name','customers.id')
            ->paginate(10);
        $results = $results->toArray();

        return response()->json(['items' => $results, 'incomplete_results' => false]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {

        $data['contentheader_title'] = 'Staff Check-In';

        return view('logs.index', $data);
    }

    function ajax()
    {
        $log = Logs::query();
        $log = $log->select(['logs.staff_name','logs.staff_id', 'logs.staff_temp',
            'logs.created_at','logs.id']);

        $datatables = Datatables::of($log);

        $datatables
            ->editColumn('name', function ($log) {
                return '<a href="' . route('log.edit', $log->id ). ' "> ' . $log->name . '</a>';
            })
            ->addColumn('action',  function ($log) {
                $action_string = '<a class="btn btn-info btn-xs" style="margin-right:5px;" href="' . route('log.edit', $log->id) . '">Edit</a>';

                return $action_string;
            })
            ->rawColumns(['name','action']);


        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //check if user created cookie
        if(!Cookie::has('staff_name'))
            return redirect('/staff');

        $data['contentheader_title'] = 'Staff Check-In on '. date('Y-m-d');

        return view('logs.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'staff_temp' => 'required|max:191|regex:/^[3-4][0-9](?:\.[0-9]{1,2})*$/',
        ], [
            'staff_temp.regex' => 'Please enter correct Body Temperature (°C)!'
        ]);

        $log = New Logs;
        $log->staff_name = Cookie::get('staff_name');
        $log->staff_id = Cookie::get('staff_id');
        $log->staff_temp = request()->get('staff_temp');
        $log->save();

        //check fever
        if(request()->get('staff_temp') >= env('TRIGGER_TEMP', '37.5'))
        {
            Notification::route('mail', env('WARNING_EMAIL', 'warning@example.com'))
                ->notify(new StaffFever($log));
            return redirect()->route('log.create')->with('error', 'Record Created, You are SICK and Stop Enter the Premise and go and see Doctor NOW!');
        }

        return redirect()->route('log.create')->with('success', 'Record Created, See you tomorrow :D!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data['log'] = Logs::find($id);

        $data['contentheader_title'] = 'Edit ' . $data['log']->staff_name . '\'s Record';

        return  view('logs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {$this->validate($request, [
        'staff_temp' => 'required|max:191',
    ]);

        $log = Logs::find($id);
        $log->staff_name = request()->get('staff_name');
        $log->staff_id = request()->get('staff_id');
        $log->staff_temp = request()->get('staff_temp');
        $log->save();

        return redirect('/log')->with('success', 'Details Updated!');
    }


    /**
     * Edit & Duplicated Form
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        Logs::destroy($id);

        return redirect('/log')->with('success', 'Record Deleted!');
    }

}
