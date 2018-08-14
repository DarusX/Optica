<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Patient;
use App\Exam;

class ExamsController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('exams.create')->with([
            'patient' => Patient::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Exam::create([
            'patient_id' => $request->patient_id,
            'addition' => ($request->addition)? $request->addition: 0,
            'alt' => ($request->alt)? $request->alt: 0,
            'pupilary_distance' => ($request->pupilary_distance)? $request->pupilary_distance: 0,
            'od_cylinder' => ($request->od_cylinder)? $request->od_cylinder: 0,
            'od_sphere' => ($request->od_sphere)? $request->od_sphere: 0,
            'od_axis' => ($request->od_axis)? $request->od_axis: 0,
            'os_cylinder' => ($request->os_cylinder)? $request->os_cylinder: 0,
            'os_sphere' => ($request->os_sphere)? $request->os_sphere: 0,
            'os_axis' => ($request->os_axis)? $request->os_axis: 0,
            'ou_cylinder' => ($request->ou_cylinder)? $request->ou_cylinder: 0,
            'ou_sphere' => ($request->ou_sphere)? $request->ou_sphere: 0,
            'ou_axis' => ($request->ou_axis)? $request->ou_axis: 0,
        ]);

        Session::flash('msg', 'Registro guardado');

        return redirect()->route('patients.show', $request->patient_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('exams.show')->with([
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam::destroy($id);
        Session::flash('success', 'Examen eliminado');
    }
}
