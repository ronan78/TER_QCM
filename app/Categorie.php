<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'id_cat';
    public $timestamps = false;
    

    protected $fillable = [
        'nom',
        'intitule_c',
    ];

    public function question()
    {
        return $this->hasMany('App\Question');
    }
}
