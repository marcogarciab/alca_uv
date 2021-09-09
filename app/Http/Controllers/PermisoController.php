<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermisoController extends Controller
{

    //Constructor para permisos
    // public function __construct()
    // {
    //     $this->middleware(['role:Admin', 'permission:Eliminar']);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permiso.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permiso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'guard_name' => 'required|max:191',
        ]);

        $permisos = Permission::create($request->all());
        return redirect()->route('permisos.index')->with('info','Permiso guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permiso)
    {
        return view('permiso.show',compact('permiso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permiso)
    {
        return view('permiso.edit', compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permiso)
    {
        $validated = $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'guard_name' => 'required|max:191',
        ]);

        $permiso->update($request->all());
        return redirect()->route('permisos.index')->with('info','Permiso actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permiso)
    {
        $permiso->delete();
        return redirect()->route('permisos.index')->with('info','Permiso eliminado');
    }
}
