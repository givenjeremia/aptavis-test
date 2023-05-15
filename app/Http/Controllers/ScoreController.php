<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Score::all();
        $klub = Klub::all();
        return view('score.index', compact('data','klub'));
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
        $klub_1 = $request->get('klub_1');
        $klub_2 = $request->get('klub_2');
        $score_1 = $request->get('score_1');
        $score_2 = $request->get('score_2');
        // dd($klub_1);
        foreach ($klub_1 as $key => $value) {
            if($value == $klub_2[$key]) {
                return redirect()->route('score.index')->with('gagal', 'Ada Klub Yang Beranding Sama');
            }
        }
        
        if (count($klub_1) == count($klub_2) && count($score_1) == count($score_2)) {
            foreach ($klub_1 as $key => $value) {
                $k_1 = $value;
                $k_2 = $klub_2[$key];
                $s_1 = $score_1[$key];
                $s_2 = $score_2[$key];
                
                $new = new Score();
                $id_winner = $s_1 > $s_2 ? $k_1 : $k_2;
                // dd($id_winner);
                // Klub 1
                $new->klub_1 = $k_1;
                $new->score_1 = $s_1;
                // Klub 1
                $new->klub_2 = $k_2;
                $new->score_2 = $s_2;
                $new->winner_klub = $s_1 != $s_2 ? $id_winner :null;
                $new->save();
            }
            return redirect()->route('score.index')->with('sukses', 'Berhasil Menambahkan Score');

        } else {
            return redirect()->route('score.index')->with('gagal', 'Cek Lagi Penambahan Score');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
