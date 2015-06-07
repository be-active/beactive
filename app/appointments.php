<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class appointments extends Model
{
    /*
     * Table name
     */
    protected $table = 'appointments';
	
	/*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
        'title',
        'user_id',
		'start',
		'end'
	];


}
