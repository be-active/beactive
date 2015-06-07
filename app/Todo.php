<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // model todo table:
    protected $table = 'todos';

    // declaration of the fillable fields for protecting mass assignment vulnerability 
    protected $fillable = [
        'name',
        'user_id'
    ];


    // eloquent attribute casting
    protected $casts = [
        'complete' => 'boolean'
    ];
}
