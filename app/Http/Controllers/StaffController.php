<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class StaffController extends Controller
{
    public function create()
    {

        $data['contentheader_title'] = 'Welcome, register your info.';

        return view('staff.create', $data);

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'id' => 'required',
        ]);

        /*Cookie::forget('staff_name');
        Cookie::forget('staff_id');

        Cookie::forever('staff_name', $request->get('name'));
        Cookie::forever('staff_id', $request->get('id'));*/

        Cookie::queue('staff_name', $request->get('name'),-200000);
        Cookie::queue('staff_id', $request->get('id'), -200000);

        Cookie::queue('staff_name', $request->get('name'), 100000);
        Cookie::queue('staff_id', $request->get('id'), 100000);

        return redirect('/');
    }
}
