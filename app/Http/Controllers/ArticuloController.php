<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Sector;
use App\Models\Sede;

class ArticuloController extends Controller
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
        $articulos = Articulo::all();
        return view('articulo.index')->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $sectors = Sector::orderBy('nombre')->get();
         $sedes = Sede::orderBy('nombre')->get();
        return view('articulo.create', compact('categorias','sectors','sedes'));

        /*$sectors = Sector::orderBy('nombre')->get();
        return view('sector.create', compact('sectors'));

        $sedes = Sede::orderBy('nombre')->get();
        return view('sede.create', compact('sedes'));*/
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulos = new Articulo();
        
        $articulos->idcategoria = $request->get('idcategoria');
        $articulos->idsector = $request->get('idsector');
        $articulos->idsede = $request->get('idsede');
        $articulos->nombre = $request->get('nombre');
        $articulos->modelo = $request->get('modelo');
        $articulos->serial = $request->get('serial');
        $articulos->descripcion = $request->get('descripcion');


        $articulos->save();

        return redirect('articulos');
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
    public function edit($articulo)
    {
        $categorias = Categoria::all();
        $sectors = Sector::all();
        $sedes = Sede::all();
        $articulo = Articulo::find($articulo);
        return view('articulo.edit',compact('articulo','categorias','sectors','sedes'));
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
        $articulo = Articulo::find($id);

        $articulo->idcategoria = $request->get('idcategoria');
        $articulo->idsector = $request->get('idsector');
        $articulo->idsede = $request->get('idsede');
        $articulo->nombre = $request->get('nombre');
        $articulo->modelo = $request->get('modelo');
        $articulo->serial = $request->get('serial');
        $articulo->descripcion = $request->get('descripcion');


        $articulo->save();

        return redirect('articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);

        $articulo->delete();

        return redirect('articulos')->with('eliminar','ok');
    }
}
