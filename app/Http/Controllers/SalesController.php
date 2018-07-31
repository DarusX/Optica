<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Exam;
use App\Material;
use App\Patient;
use Carbon\Carbon;

class SalesController extends Controller
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
        return view('sales.index')->with([
            'patients' => Patient::with([
                'sales' => function ($query) use ($request){
                    if ($request->query('status') == null && $request->query('from') == null) {
                        $query->whereDate('sales.created_at', Carbon::today());
                    } else {
                        if ($request->query('status') != null) $query->where('status', $request->query('status'));
                        if ($request->query('from') != null) $query->whereDate('sales.created_at', '>=', $request->query('from'))->whereDate('sales.created_at', '<=', $request->query('to'));
                    }
                    
                    //$query->where('status', $request->query('status'));
                }
            ])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('sales.create')->with([
            'exam' => Exam::find($id),
            'materials' => Material::all()
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
        $this->validate($request, [
            'frame' => 'required',
            'total' => 'required'
        ]);
        $sale = Sale::create($request->all());

        return redirect()->route('patients.sales', $sale->exam->patient_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sales.show')->with([
            'sale' => Sale::find($id)
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
        Sale::find($id)->update($request->all());
        return redirect()->back();
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

    public function payment(Request $request, $id)
    {
        Sale::find($id)->payments()->create($request->all());
        $this->updatePaid($id);
        return redirect()->back();
    }

    public function payments($id)
    {
        return Sale::with('payments')->find($id);
    }

    public function updatePaid($id)
    {
        $sale = Sale::find($id);
        if($sale->remaining == 0){
            $sale->update([
                'paid' => 1
            ]);
        }
    }
}
