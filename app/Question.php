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
    protected $fillable = [
        'formId', 'description', 'answer',
    ];

    /**
     * Get the form that owns the question.
     */
    public function form()
    {
        return $this->belongsTo('App\Form');
    }
}
