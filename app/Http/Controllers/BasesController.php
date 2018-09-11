<?php

namespace App\Http\Controllers;

use App\Base;
use Illuminate\Http\Request;
use Session;

class BasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bases.index')->with([
            'bases' => Base::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Base::create($request->all());
        Session::flash('success', 'Base registrada');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Base  $base
     * @return \Illuminate\Http\Response
     */
    public function show(Base $base)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Base  $base
     * @return \Illuminate\Http\Response
     */
    public function edit(Base $base)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Base  $base
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $base = Base::find($id);
        switch ($request->type) {
            case 'plus':
                $base->quantity += $request->quantity;
                break;
            case 'minus':
                $base->quantity -= $request->quantity;
                break;
        }
        
        $base->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Base  $base
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Base::destroy($id);
        Session::flash('success', 'Base eliminada');
    }
}
