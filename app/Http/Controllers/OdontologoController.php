<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Odontologo;

class OdontologoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rta = Odontologo::all();
        return view('administrador.welcome',compact('rta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rta = Odontologo::all()->last();
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
        $odontologo = new Odontologo();
        $odontologo-> ODO_ID = $request -> input('ODO_ID');
        $odontologo-> ODO_TIPO_ID = $request -> input('ODO_TIPO_ID');
        $odontologo-> ODO_PRIMER_NOMBRE = $request -> input('ODO_NOMBRES');
        $odontologo-> ODO_SEGUNDO_NOMBRE = $request -> input('ODO_NOMBRES');
        $odontologo-> ODO_PRIMER_APELLIDO = $request -> input('ODO_NOMBRES');
        $odontologo-> ODO_SEGUNDO_APELLIDO = $request -> input('ODO_APELLIDOS');
        $odontologo-> ODO_DIRECCION = $request -> input('ODO_DIRECCION');
        $odontologo-> ODO_TELEFONO = $request -> input('ODO_TELEFONO');
        $odontologo-> ODO_FECNACIMIENTO = $request -> input('ODO_FECNACIMIENTO');
        $odontologo-> ODO_REGISTRO = $request -> input('ODO_REGISTRO');
        $odontologo-> ODO_GENERO = $request -> input('ODO_GENERO');

        if($request->hasfile('ODO_FOTO')){

            $odontologo['ODO_FOTO'] = $request->file('FOTO')->store('uploads','public');

        }
        $odontologo->save();

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
        $rta = Odontologo::find($id);
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
        $rta = Odontologo::find($id);
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
        Odontologo::where('ODO_ID','=',$id)->update($rta);

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
        Odontologo::destroy($id);
        return redirect('/home');
    }
}
