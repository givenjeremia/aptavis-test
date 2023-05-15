<?php

namespace App\Models;

use App\Models\Klub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Score extends Model
{
    protected $table = 'score';
    use HasFactory;

    public function data_klub_1(){
        return $this->belongsTo(Klub::class,'klub_1');
    }
    public function data_klub_2(){
        return $this->belongsTo(Klub::class,'klub_2');
    }
    public function data_winner_klub(){
        return $this->belongsTo(Klub::class,'winner_klub');
    }
}
