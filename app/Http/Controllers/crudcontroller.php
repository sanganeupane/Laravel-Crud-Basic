<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class crudcontroller extends Controller
{
    public function index()
    {

        $usersData = DB::table('users')->orderBy('id', 'desc')->paginate(3);
        return view('index', compact('usersData'));
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:10|max:50'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        if (DB::table('users')->insert($data)) {
            return redirect()->back()->with('success', "Data successfully inserted");
        } else {
            return redirect()->back()->with('error', "Data Cannot inserted");
        }
    }

    public function delete(Request $request)
    {
        $id = $request->criteria;
        if (DB::table('users')->where('id', '=', $id)->delete()) {

            return redirect()->back()->with('success', "Data successfully Deleted");

        } else {
            return redirect()->back()->with('error', "There was a problems");

        }

    }

    public function edit(Request $request)
    {
        $id = $request->criteria;
        $userData = DB::table('users')->where('id', '=', $id)->first();
        return view('edit', compact('userData'));
    }

    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('POST')) {
            $id = $request->criteria;
            $this->validate($request,[
                'name' => 'required|min:3|max:100',
                'email' => 'required|email',[Rule::unique('users', 'email')->ignore($id)],
                'phone' => 'required'
            ]);

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;

            if(DB::table('users')->where('id', '=', $id)->update($data)) {
                return redirect()->route('index')->with('success', "Your Data is Edited");
            } else {
                return redirect()->route('index')->with('error', "Data Cannot Edited");
            }

        }
    }
}
