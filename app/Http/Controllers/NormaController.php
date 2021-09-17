<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Norma;

class NormaController extends Controller
{

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
        return view('norma.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('norma.create');
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
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:150',
        ]);

        $norma = Norma::create($request->all());
        return redirect()->route('normas.index')->with('info','Norma guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Norma $norma)
    {
        return view('norma.show',compact('norma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Norma $norma)
    {
        return view('norma.edit', compact('norma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Norma $norma,Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:150',
        ]);

        $norma->update($request->all());
        $norma->touch();
        return redirect()->route('normas.index')->with('info','Norma actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Norma $norma)
    {
       $norma->delete();
       return redirect()->route('normas.index')->with('info','Norma eliminada');
    }
}
