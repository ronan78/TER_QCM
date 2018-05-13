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
    protected $primaryKey = 'id_rep';
    protected $foreignKey = 'id_q';
    public $timestamps = false;
    protected $fillable = [
        'intitule_rep', 'correct', 'id_q',
    ];
    
    public function question()
    {
        return $this->belongsTo('App\Question', 'id_q');
    }

}
