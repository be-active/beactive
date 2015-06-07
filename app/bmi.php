<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class bmi extends Model
{
    /*
     * Table name
     */
    protected $table = 'bmi';

    /*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
        'height',
        'user_id',
		'weight',
		'result'
		
    ];

}
