<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede3;

class Sede3Controller extends Controller
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
        $sede3s = Sede3::all();
        return view('sede3.index')->with('sede3s', $sede3s);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sede3.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sede3s = new Sede3();
        
        $sede3s->ip = $request->get('ip');
        $sede3s->equipo = $request->get('equipo');
        $sede3s->num_serie = $request->get('num_serie');
        $sede3s->sector = $request->get('sector');
        $sede3s->usuario = $request->get('usuario');
        $sede3s->puesto = $request->get('puesto');
        $sede3s->disponible = $request->get('disponible');

        $sede3s->save();

        return redirect('sede3s');
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
        $sede3 = Sede3::find($id);
        return view('sede3.edit')->with('sede3',$sede3);
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
        $sede3 = Sede3::find($id);

        $sede3->ip = $request->get('ip');
        $sede3s->equipo = $request->get('equipo');
        $sede3->num_serie = $request->get('num_serie');
        $sede3->sector = $request->get('sector');
        $sede3->usuario = $request->get('usuario');
        $sede3s->puesto = $request->get('puesto');
        $sede3->disponible = $request->get('disponible');

        $sede3->save();

        return redirect('sede3s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sede3 = Sede3::find($id);

        $sede3->delete();

        return redirect('sede3s')->with('eliminar','ok');
    }
}
