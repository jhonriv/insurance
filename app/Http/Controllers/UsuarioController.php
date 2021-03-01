<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Pais;
use App\Models\Estado;
use App\Models\Ciudad;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::all();
        $usuarios = DB::table('usuarios')
            ->join('ciudads', 'usuarios.id_ciudad', '=', 'ciudads.id')
            ->join('estados', 'ciudads.id_estado', '=', 'estados.id')
            ->join('pais', 'estados.id_pais', '=', 'pais.id')
            ->select('usuarios.*', DB::raw('ciudads.nombre as ciudad'), 
            DB::raw('estados.nombre as estado'), DB::raw('pais.nombre as pais'))
            ->get();


        return view('usuario.index')->with('usuarios', $usuarios)
        ->with('paises', $paises);
    }

    public function getestados($id, Request $request)
    {
        $estados = Estado::where('id_pais', '=', $id)->get();
        return response()->json($estados);
    }

    public function getciudades($id, Request $request)
    {
        $estados = Ciudad::where('id_estado', '=', $id)->get();
        return response()->json($estados);
    }

    public function getedit($id, Request $request)
    {
        $usuario = DB::table('usuarios')
            ->join('ciudads', 'usuarios.id_ciudad', '=', 'ciudads.id')
            ->join('estados', 'ciudads.id_estado', '=', 'estados.id')
            ->join('pais', 'estados.id_pais', '=', 'pais.id')
            ->where('usuarios.id', '=', $id)
            ->select('usuarios.*', DB::raw('ciudads.nombre as ciudad'), 
            DB::raw('estados.nombre as estado'), DB::raw('estados.id as id_estado'), 
            DB::raw('pais.nombre as pais'), DB::raw('pais.id as id_pais'))
            ->get();

        return response()->json($usuario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $u = new Usuario();

            $u->email = $request->email;
            $u->password = bcrypt($request->password);
            $u->nombre = $request->nombre;
            $u->apellido = $request->apellido;
            $u->dni = $request->dni;
            $u->birthday = $request->birthday;
            $u->telefono = $request->phone;
            $u->nivel = $request->nivel;
            $u->id_ciudad = $request->ciudad;

            $u->save();

            $ajax = "OK";
        } catch (Throwable $e) {
            report($e);
            $ajax = "Exception";
        }
        
        return response()->json($ajax);
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
        try {
            $u = Usuario::find($id);

            $u->email = $request->email;
            $u->password = bcrypt($request->password);
            $u->nombre = $request->nombre;
            $u->apellido = $request->apellido;
            $u->dni = $request->dni;
            $u->birthday = $request->birthday;
            $u->telefono = $request->phone;
            $u->nivel = $request->nivel;
            $u->id_ciudad = $request->ciudad;

            $u->save();

            $ajax = "OK";
        } catch (Throwable $e) {
            report($e);
            $ajax = "Exception";
        }
        
        return response()->json($ajax);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $us = Usuario::find($id);
            $us->delete();

            $ajax = "OK";
        } catch (Throwable $e) {
            report($e);
            $ajax = "Exception";
        }
        
        return response()->json($ajax);
    }
}
