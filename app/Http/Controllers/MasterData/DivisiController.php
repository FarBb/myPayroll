<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Divisi::get();
        return view('masterdata.divisi', ['divisi' => $data]);
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama_aplikasi' => 'required|max:10|min:3',
                'jumlah_hari_kerja' => 'required|max:31|min:10|numeric'
            ],
            [
                'nama_aplikasi.required' => 'Nama Aplikasi Harus Di Isi',
                'nama_aplikasi.max' => 'Nama Aplikasi Maksimal 10 Karakter',
                'nama_aplikasi.min' => 'Nama Aplikasi Minimal 3 Karakter',
                'jumlah_hari_kerja.required' => 'Jumlah Hari Kerja Harus Di Isi',
                'jumlah_hari_kerja.numeric' => 'Jumlah Hari Harus Berisi Angka',
                'jumlah_hari_kerja.max' => 'Jumlah Hari kerja maksimal 31 Hari',
                'jumlah_hari_kerja.min' => 'Jumlah Hari Kerja minimal 9 Hari',
            ]
        );
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
        $this->_validation($request);
        Divisi::create($request->all());
        return redirect()->back()->with('Success', 'Data Berhasil Ditambahkan');
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

    public function edit(Setup $setup)
    {
        return view('masterdata.devisi-edit', compact('setup'));
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
        $this->_validation($request);
        Setup::where('id', $id)->update(['nama_aplikasi' => $request->nama_aplikasi, 'jumlah_hari_kerja' => $request->jumlah_hari_kerja]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
