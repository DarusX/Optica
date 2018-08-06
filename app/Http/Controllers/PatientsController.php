<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Session;

class PatientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patients;

        if($request->query('query') != null) $patients = Patient::search($request->query('query'));
        else $patients = Patient::all();
        return view('patients.index')->with([
            'patients' => $patients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'address' => 'required',
        ]);
        
        $patient = Patient::create($request->all());

        Session::flash('success', 'Paciente registrado');

        return redirect()->route('patients.show', $patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('patients.show')->with([
            'patient' => Patient::find($id)
        ]);
    }

    public function exams($id)
    {
        return view('patients.exams')->with([
            'patient' => Patient::find($id)
        ]);
    }

    public function sales($id)
    {
        return view('patients.sales')->with([
            'patient' => Patient::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('patients.edit')->with([
            'patient' => Patient::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Patient::find($id)->update($request->all());
        Session::flash('success', 'Paciente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
