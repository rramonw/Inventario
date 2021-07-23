<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relevamiento;

class RelevamientoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relevamientos = Relevamiento::all();
        return view('relevamiento.index')->with('relevamientos', $relevamientos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('relevamiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $relevamientos = new Relevamiento();
        
        $relevamientos->ip = $request->get('ip');
        $relevamientos->pc = $request->get('pc');
        $relevamientos->num_serie = $request->get('num_serie');
        $relevamientos->sector = $request->get('sector');
        $relevamientos->usuario = $request->get('usuario');
        $relevamientos->disponible = $request->get('disponible');

        $relevamientos->save();

        return redirect('relevamientos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relevamiento = Relevamiento::find($id);
        return view('relevamiento.edit')->with('relevamiento',$relevamiento);
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
        $relevamiento = Relevamiento::find($id);

        $relevamiento->ip = $request->get('ip');
        $relevamiento->pc = $request->get('pc');
        $relevamiento->num_serie = $request->get('num_serie');
        $relevamiento->sector = $request->get('sector');
        $relevamiento->usuario = $request->get('usuario');
        $relevamiento->disponible = $request->get('disponible');

        $relevamiento->save();

        return redirect('relevamientos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relevamiento = Relevamiento::find($id);

        $relevamiento->delete();

        return redirect('relevamientos')->with('eliminar','ok');
    }
}
