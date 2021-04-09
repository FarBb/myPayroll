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
        $data = Divisi::paginate(3);
        return view('masterdata.divisi', ['divisi' => $data]);
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama' => 'required|max:50|min:5',
            ],
            [
                'nama.required' => 'Nama Divisi Harus Di Isi',
                'nama.max' => 'Nama Divisi Maksimal 50 Karakter',
                'nama.min' => 'Nama Divisi Minimal 5 Karakter'
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
        // dd($request->all());
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

    public function edit(Divisi $divisi)
    {
        return view('masterdata.divisi-edit', compact('divisi'));
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
        Divisi::where('id', $id)->update(['nama' => $request->nama]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Divisi::destroy($id);
        return redirect()->route('divisi.index')->with('Success', 'Data Berhasil Dihapus');
    }
}
