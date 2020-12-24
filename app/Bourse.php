<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bourse extends Model
{

    protected $table = 'bourses';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numeroEtudiant', 'status', 'montantBourse',
    ];

}
