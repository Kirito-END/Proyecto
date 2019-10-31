<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rta = Paciente::all();
        return view('administrador.welcome',compact('rta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rta = Paciente::all()->last();
        return view('administrador.register',compact('rta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente();
        $paciente-> PAC_ID = $request -> input('PAC_ID');
        $paciente-> PAC_TIPO_ID = $request -> input('PAC_TIPO_ID');
        $paciente-> PAC_NOMBRES = $request -> input('PAC_NOMBRES');
        $paciente-> PAC_APELLIDOS = $request -> input('PAC_APELLIDOS');
        $paciente-> PAC_DIRECCION = $request -> input('PAC_DIRECCION');
        $paciente-> PAC_TELEFONO = $request -> input('PAC_TELEFONO');
        $paciente-> PAC_FECNACIMIENTO = $request -> input('PAC_FECNACIMIENTO');
        $paciente-> PAC_REGISTRO = $request -> input('PAC_REGISTRO');
        $paciente-> PAC_GENERO = $request -> input('PAC_GENERO');

        if($request->hasfile('PAC_FOTO')){

            $paciente['PAC_FOTO'] = $request->file('FOTO')->store('uploads','public');

        }
        $paciente->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rta = Paciente::find($id);
        return view('administrador.listar',compact('rta'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rta = Paciente::find($id);
        return view('administrador.register',compact('rta')); 
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
        $rta = request()->except(['_token','_method','button']);
        Paciente::where('PAC_ID','=',$id)->update($rta);

        return redirect('/home');
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
