<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    /*
     * Table name
     */
    protected $table = 'Weight';

    /*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
        'weight',
        'id','user_id'	
    ];

}