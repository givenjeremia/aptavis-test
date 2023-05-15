<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use App\Models\Klasemen;
use App\Models\Score;
use Illuminate\Http\Request;

class KlasemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $klub = Klub::all();
        $klasemen = [];
        foreach ($klub as $value) {
            $id_klub = $value->id;
            $nama_klub = $value->nama;
            $total_bermain = count(Score::where('klub_1', $id_klub)->orWhere('klub_2',$id_klub)->get());
            $total_menang = count(Score::where('winner_klub', $id_klub)->get());
            $total_seri = count(Score::where(function($query) use ($id_klub) {
                $query->where('klub_1', $id_klub )
                      ->orWhere('klub_2', $id_klub );
            })
            ->whereNull('winner_klub')
            ->get());
            $total_kalah = $total_bermain - ($total_menang + $total_seri);
            // Goal Winner
            $sum_1 = Score::where('klub_1', $id_klub)
            ->where('winner_klub', $id_klub)
            ->sum('score_1');
            $sum_2 = Score::where('klub_2', $id_klub)
            ->where('winner_klub', $id_klub)
            ->sum('score_2');
            $total_goal_winner = ( empty($sum_1) ? $sum_1 : 0 ) + ( empty($sum_2) ? $sum_2 : 0 );
            // Goal Lose
            $sum_1 = Score::where('klub_1', $id_klub)
            ->where('winner_klub', '!=',$id_klub)
            ->sum('score_1');
            $sum_2 = Score::where('klub_2', $id_klub)
            ->where('winner_klub', '!=', $id_klub)
            ->sum('score_2');
            $total_goal_lose = ( empty($sum_1) ? $sum_1 : 0 ) + ( empty($sum_2) ? $sum_2 : 0 );
            // Point
            $point = ($total_menang * 3) + ($total_seri * 1);
            $tamp = [
                'nama_club'=>$nama_klub,
                'total_main'=>$total_bermain,
                'total_menang'=>$total_menang,
                'total_seri' => $total_seri,
                'total_kalah'=>$total_kalah,
                'goal_menang'=>$total_goal_winner,
                'goal_lose'=>$total_goal_lose,
                'point' =>$point,

            ];
            array_push($klasemen,$tamp);
        }
        return view('klasemen.index',compact('klasemen'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klasemen  $klasemen
     * @return \Illuminate\Http\Response
     */
    public function show(Klasemen $klasemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klasemen  $klasemen
     * @return \Illuminate\Http\Response
     */
    public function edit(Klasemen $klasemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klasemen  $klasemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Klasemen $klasemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klasemen  $klasemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klasemen $klasemen)
    {
        //
    }
}
