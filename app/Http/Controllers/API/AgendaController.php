<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = Agenda::all();

        return response()->json([
        'error' =>false,
        'agenda' => $agenda,
      ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agenda = Agenda::create($request->all());

        return response()->json([
        'error' =>false,
        'agenda' => $agenda,
      ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = Agenda::find($id);

        return response()->json([
        'error' =>false,
        'agenda' => $agenda,
      ], 200);
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
        $agenda = Agenda::find($id);

        $agenda-> =$request ->input('');
        $agenda-> =$request ->input('');
        $agenda-> =$request ->input('');
        $agenda-> =$request ->input('');
        $agenda-> =$request ->input('');

        $agenda->save();

        return response()->json([
        'error' =>false,
        'agenda' => $agenda,
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
        'error' =>false,
        'agenda' => $agenda,
      ], 200);
    }
}
