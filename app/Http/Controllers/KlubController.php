<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KlubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Klub::all();
        return view('klub.index', compact('data'));
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
        //
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kota' => 'required',
        ]);
        $nama = $request->nama;
        $kota = $request->kota;
        if ($validator->fails()) {
            return redirect()->route('klub.index')->with('gagal', 'Harap Isi Semua Data');
        } else {
            $check = Klub::where('nama', $nama)->get();
            if (count($check) == 0) {
                $new = new Klub();
                $new->nama = $nama;
                $new->kota = $kota;
                $new->save();
                return redirect()->route('klub.index')->with('sukses', 'Nama Klub Ada Yang Sama');
            } else {
                return redirect()->route('klub.index')->with('gagal', 'Nama Klub Ada Yang Sama');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klub  $klub
     * @return \Illuminate\Http\Response
     */
    public function show(Klub $klub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klub  $klub
     * @return \Illuminate\Http\Response
     */
    public function edit(Klub $klub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klub  $klub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Klub $klub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klub  $klub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klub $klub)
    {
        //
    }
}
