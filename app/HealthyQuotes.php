<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthyQuotes extends Model
{
    /*
     * Table name
     */
    protected $table = 'HealthyQuotes';

    /*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
        'title',
        'text',
		'body',
		'author'
		
    ];

}
