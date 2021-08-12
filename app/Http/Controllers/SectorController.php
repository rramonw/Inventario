<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;

class SectorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:sectors.index')->only('index');
        $this->middleware('can:sectors.create')->only('create', 'store');
        $this->middleware('can:sectors.edit')->only('edit', 'update');
        $this->middleware('can:sectors.destroy')->only('destroy');
    }

    //public function __construct(){
        //$this->middleware('auth');
    //}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = Sector::all();
        return view('sector.index')->with('sectors', $sectors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'nombre'=>'required|unique:sectors',
            

        ]);


        $sectors = new Sector();
        
        $sectors->nombre = $request->get('nombre');
        $sectors->descripcion = $request->get('descripcion');
        $sectors->condicion = $request->get('condicion');

        $sectors->save();

        return redirect('sectors');
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
        $sector = Sector::find($id);
        return view('sector.edit')->with('sector',$sector);
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
        $request->validate([
            
            'nombre'=>'required:sectors',
            

        ]);
        
        $sector = Sector::find($id);

        $sector->nombre = $request->get('nombre');
        $sector->descripcion = $request->get('descripcion');
        $sector->condicion = $request->get('condicion');

        $sector->save();

        return redirect('sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = sector::find($id);

        $sector->delete();

        return redirect('sectors')->with('eliminar','ok');
    }
}
