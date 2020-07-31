<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tnc extends Model
{
    protected $table = 'tnc';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'pad_id', 'pad_rad_id', 'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
