<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'id_q';
    public $timestamps = false;

    protected $fillable = [
        'intitule_q', 'niveau', 'multi', 'code', 'id_cat',
    ];

    public function categorie()
    {
        return $this->belongsTo('App\Categorie', 'id_cat');
    }

    public function reponse()
    {
        return $this->hasMany('App\Reponse', 'id_q');
    }

}
