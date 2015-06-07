<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class geo extends Model
{
    // model for geo table :
    protected $table = 'geo';

    /* declaration of the fillable fields for protecting mass assignment vulnerability  */
    protected $fillable = [
        'note',
        'user_id',
		'start',
		'stop'
		'distance'
    ];

    /*
     * Eloquent attribute casting
     */
    protected $casts = [
        'complete' => 'boolean'
    ];
}
