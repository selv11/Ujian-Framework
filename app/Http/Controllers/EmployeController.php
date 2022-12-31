<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::all();

        return view('employe.index',[
            'employes'=>$employes,
        ]);
    }

    public function create()
    {
        return view('employe.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname'=>'required|between:3,100',
            'phone_number'=>'nullable|between:10,20',
            'jobtitle'=>'nullable|between:3,100'
        ],[],[
            'fullname'=>'full name',
            'jobtitle'=>'job title'
        ]);

        $employes = Employe::create([
            'fullname'=> ucwords( $request->fullname ),
            'phone_number'=> $request->phone_number,
            'jobtitle'=> ucwords($request->jobtitle)]);

            return redirect('employe')->with('store','succes');
}

    public function show(Employe $employe)
    {
        return view('employe.show',[
            'employe'=>$employe,
        ]);
    }

    public function edit(Employe $employe)
    {
        return view('employe.edit',[
            'employe'=>$employe,
        ]);
    }

    public function update(Request $request, Employe $employe)
    {
        $request->validate([
            'fullname'=>'required|between:3,100',
            'phone_number'=>'nullable|between:10,20',
            'jobtitle'=>'nullable|between:3,100'
        ],[],[
            'fullname'=>'full name',
            'jobtitle'=>'job title'
        ]);

    $employes = Employe::update([
        'fullname'=> ucwords( $request->fullname ),
        'phone_number'=> $request->phone_number,
        'jobtitle'=> ucwords($request->jobtitle)]);

        return redirect('employe')->with('update','succes');
}

    public function destroy(Employe $employe)
    { 
        $employe->delete();
            return back()->with('destroy','succes');
    }
}