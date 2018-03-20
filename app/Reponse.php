<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'intitule_rep', 'correct', 'id_q',
    ];
}
