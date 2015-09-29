<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;


abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * create a new controller instance
     */

    protected $user;

    protected $signedIn;

    public function __construct(){
    	$this->user = $this->signedIn = Auth::user();
    }
    
    
}
