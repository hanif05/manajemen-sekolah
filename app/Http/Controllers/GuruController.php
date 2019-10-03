<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Kelas;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.guru.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Guru();
        $kelas = Kelas::all();

        return view('pages.guru.form', compact('data', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nama' => 'required|string|max:50',
            'kelas_id' => 'required',
            'jk' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|max:13',
            'alamat' => 'required',
            'foto' => 'required|image',
        ]);
        
        // Create table user
        $user = new User;
        $user->name = $request->nama;
        $user->password = bcrypt('password');
        $user->email = $request->email;
        // $user->remember_token = str_random(60);
        $user->save();

        // Foto
        $imagePath = request('foto')->store('uploads/guru', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 400);
        $image->save();

        // menambahkan user_id dari tabel user
        $user_id = $request->request->add(['user_id' => $user->id]);

        Guru::create([
            'nama' => $data['nama'],
            'kelas_id' => $data['kelas_id'],
            'user_id' => $user['id'],
            'jk' => $data['jk'],
            'tmpt_lahir' => $data['tmpt_lahir'],
            'tgl_lahir' => $data['tgl_lahir'],
            'alamat' => $data['alamat'],
            'no_hp' => $data['no_hp'],
            'foto' => $imagePath
        ]);
        return redirect()->route('guru.index')->with('berhasil', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        $kelas = Kelas::all();
        return view('pages.guru.edit', compact('guru', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $data = request()->validate([
            'nama' => 'required|string|max:50',
            'kelas_id' => 'required',
            'jk' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|max:13',
            'alamat' => 'required',
            'foto' => 'image',
        ]);


        // Foto

        if (request('foto')){

            $imagePath = request('foto')->store('uploads/guru', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 400);
            $image->save();

            $foto = ['foto' => $imagePath];
        }

        $guru->update(array_merge(
            $data,
            $foto ?? []
        ));
        
        return redirect()->route('guru.index')->with('berhasil', 'Data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
    }

    public function dataTable()
    {
        $data = Guru::join('kelas', 'guru.kelas_id', '=', 'kelas.id')->select('guru.id', 'guru.nama', 'kelas.nama_kelas', 'guru.tmpt_lahir', 'guru.tgl_lahir', 'guru.jk', 'guru.no_hp', 'guru.alamat', 'guru.foto');

        return DataTables::of($data)
            ->addColumn('aksi', function($data){
                return view('layouts.includes._aksi', [
                    'data' => $data,
                    'url_edit' => route('guru.edit', $data->id),
                    'url_destroy' => route('guru.destroy', $data->id)
                ]);
            })
            ->addColumn('foto', function($data){
                $url = asset('/storage/'. $data->foto);
                return '<img src="'.$url.'" border="0" width="50" class="img-rounded" align="center"/>';
            })->addIndexColumn()->rawColumns(['aksi', 'foto'])->make(true);
    }
}
