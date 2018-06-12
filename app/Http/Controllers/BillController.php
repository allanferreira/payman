<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bill::whereHas('service', function($query) {
            $query->where('user_id', Auth::id());
        })->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bill = new Bill;

        $bill->service_id = $request->service_id;
        $bill->value = $request->value;
        $bill->month = $request->month;
        $bill->year = $request->year;

        $bill->save();
        return $bill;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return Bill::where('id', $id)->whereHas('service', function ($query) {
            $query->where('user_id', Auth::id());
        })->firstOrFail();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $bill->service_id = $request->service_id;
        $bill->value = $request->value;
        $bill->month = $request->month;
        $bill->year = $request->year;

        $bill->save();
        return $bill;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        return Bill::where('id', $id)->whereHas('service', function ($query) {
            $query->where('user_id', Auth::id());
        })->firstOrFail()->delete();
    }
}
