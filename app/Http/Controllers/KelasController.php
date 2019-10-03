<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Kelas();
        return view('pages.kelas.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:5'
        ]);

        $data = Kelas::create($request->all());
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        $data = $kelas;
        return view('pages.kelas.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:20'
        ]);

        $kelas->update(request()->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
    }

    public function dataTable()
    {
        $data = Kelas::query();

        return DataTables::of($data)
            ->addColumn('aksi', function($data){
                return view('layouts.includes._action', [
                    'data' => $data,
                    'url_edit' => route('kelas.edit', $data->id),
                    'url_destroy' => route('kelas.destroy', $data->id)
                ]);
            })
            ->addIndexColumn()->rawColumns(['aksi'])->make(true);
    }
}
