<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * Get the user that owns the form.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the form's questions.
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
