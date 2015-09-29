<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{

	// protected noticeId;
	
	protected $fillable = [

	'infringing_title',
	'infringing_link',
	'original_link',
	'original_description',
	'template',
	'content_removed',
	'provider_id'
	];

	/**
	 * a notice bolongs to recipient / provider
	 */

	public function recipient() {
		return $this->belongsTo('App\Provider', 'provider_id');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
	
	public function getRecipientEmail(){
		// return $this->recipient->copyrigh_email;	
		return $this->recipient->copyright_email;	
	}
	

	public function getOwnerEmail(){
		return $this->user->email;
	}
	
	
	
     
}
