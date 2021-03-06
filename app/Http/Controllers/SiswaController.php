<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\User;
use App\Kelas;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Siswa();
        $kelas = Kelas::all();

        return view('pages.siswa.form', compact('data', 'kelas'));
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
        $imagePath = request('foto')->store('uploads/siswa', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 400);
        $image->save();

        // menambahkan user_id dari tabel user
        $user_id = $request->request->add(['user_id' => $user->id]);

        Siswa::create([
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
        return redirect()->route('siswa.index')->with('berhasil', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('pages.siswa.edit', compact('siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
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

            $imagePath = request('foto')->store('uploads/siswa', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 400);
            $image->save();

            $foto = ['foto' => $imagePath];
        }

        $siswa->update(array_merge(
            $data,
            $foto ?? []
        ));
        
        return redirect()->route('siswa.index')->with('berhasil', 'Data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
    }

    public function dataTable()
    {
        $data = Siswa::join('kelas', 'siswa.kelas_id', '=', 'kelas.id')
                    ->join('users', 'siswa.user_id', '=', 'users.id')
                    ->select('siswa.id', 'siswa.nama', 'users.email', 'kelas.nama_kelas', 'siswa.tmpt_lahir', 'siswa.tgl_lahir', 'siswa.jk', 'siswa.no_hp', 'siswa.alamat', 'siswa.foto');

        return DataTables::of($data)
            ->addColumn('aksi', function($data){
                return view('layouts.includes._aksi', [
                    'data' => $data,
                    'url_edit' => route('siswa.edit', $data->id),
                    'url_destroy' => route('siswa.destroy', $data->id)
                ]);
            })
            ->addColumn('foto', function($data){
                $url = asset('/storage/'. $data->foto);
                return '<img src="'.$url.'" border="0" width="50" class="img-rounded" align="center"/>';
            })->addIndexColumn()->rawColumns(['aksi', 'foto'])->make(true);
    }
}
