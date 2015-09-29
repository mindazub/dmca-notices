<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    
	/**
	 * No timestamps for provider table
	 */
    public $timestamps = false;

    /**
     * fillable fields for provider
     */
    protected $fillable = [
    	'name', 'copyright_email'
    ];
}
