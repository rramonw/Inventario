<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Sector;
use App\Models\Sede;
use App\Models\Marca;

class ArticuloController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:articulos.index')->only('index');
        $this->middleware('can:articulos.create')->only('create');
        $this->middleware('can:articulos.edit')->only('edit, update');
        $this->middleware('can:articulos.destroy')->only('destroy');

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
    public function listado()

{
    $articulos = Articulo::all();
      return view('articulos.listado')->with('articulos', $articulos);
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
        $marcas = Marca::orderBy('nombre')->get();

        return view('articulo.create', compact('categorias','sectors','sedes','marcas'));

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
        $request->validate([
            
             'ip'=>'unique:articulos',
            'puesto'=>'required:articulos',
            'serial'=>'required|unique:articulos',
            'estante'=>'required|unique:articulos',

            

        ]);


        $articulos = new Articulo();
        
        $articulos->categoria_id = $request->get('categoria_id');
        $articulos->sector_id = $request->get('sector_id');
        $articulos->sede_id = $request->get('sede_id');
        $articulos->puesto = $request->get('puesto');
        $articulos->ip = $request->get('ip');
        $articulos->marca_id = $request->get('marca_id');
        $articulos->serial = $request->get('serial');
        $articulos->estante = $request->get('estante');
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
        $marcas = Marca::all();
        $articulo = Articulo::find($articulo);
        return view('articulo.edit',compact('articulo','categorias','sectors','sedes','marcas'));
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
            
             'ip'=>'required:articulos',
            'puesto'=>'required:articulos',
            'serial'=>'required:articulos',
            'estante'=>'required:articulos',

            

        ]);

        $articulo = Articulo::find($id);

        $articulo->categoria_id = $request->get('categoria_id');
        $articulo->sector_id = $request->get('sector_id');
        $articulo->sede_id = $request->get('sede_id');
        $articulo->puesto = $request->get('puesto');
        $articulo->ip = $request->get('ip');
        $articulo->marca_id = $request->get('marca_id');
        $articulo->serial = $request->get('serial');
        $articulo->estante = $request->get('estante');
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
