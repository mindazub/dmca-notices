<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PrepareNoticeRequest;
use App\Http\Controllers\Controller;
use App\Provider;
use Illuminate\Auth\Guard;
use App\Notice;
use Illuminate\Support\Facades\Mail;
use Auth;

// use Mail;

class NoticesController extends Controller
{


	public function __construct() {
		$this->middleware('auth');

        parent::__construct();
	}
	
	
    public function index() {
    	
    	// return Notice::all();
        $notices = $this->user->notices;

        return view('notices.index', compact('notices'));
    }
    
    /**
     * Show a a page to create a new Notice
     * @return \Response
     */

    public function create() {
    	// get list of providers
    	// load a view to create a new notice

    	$providers = Provider::lists('name', 'id');

    	return view('notices.create', compact('providers'));	
    }
    

    public function confirm(PrepareNoticeRequest $request) {
    	// return $request->all();

    	$data = $request->all();

    	$template = $this->compileDmcaTemplate($data);

        // dd($template);

        // session()->flash('dmca', $data);
        Session()->put('dmca', $data);

        // dd(session()->flash('dmca', $data));

    	return view('notices.confirm', compact('template'));

    }


    public function compileDmcaTemplate($data) {

    	$data = $data + [
    		'name' => $this->user->name,
    		'email' => $this->user->email,
    	];

    	return view()->file(app_path('Http/Templates/dmca.blade.php'), $data);

    }
    
   /**
     * Store a new dmca notice
     */ 
    public function store(Request $request) {


			$notice = $this->createNotice($request);

           //$mailer->send();

            Mail::queue(['text'=>'emails.dmca'], compact('notice'), function($message) use ($notice)
            {
                // dd($notice->getRecipientEmail());
                $message->from($notice->getOwnerEmail())
                        ->to($notice->getRecipientEmail())
                        ->subject('DMCA Notice');
            });

            flash('Youre DMCA notice has been delivered!');

           return redirect('notices');

    	// session()->get('dmca', $data);

    	// access template
		// $data= session()->get('dmca');

		// return $data;
		// return \Request('template');

		// email  form through the request 
		//create migration for notices table


    }


    public function update($noticeId, Request $request)
    {
        
        $isRemoved = $request->has('content_removed');

        Notice::findOrFail($noticeId)
                       ->update(['content_removed' => $isRemoved]);
        
        return redirect()->back();
    }
    
    

    /**
     * create and persist new dmca notice
     */


    public function createNotice(Request $request) {
            
            // $data = session()->get('dmca');

            // $notice = \Notice::open($data)->useTemplate($request->input('template'));

            // $this->user()->notices()->create($notice);
            
            // $one = session()->get('dmca');

            // dd($one);

            $notice = session()->get('dmca') + ['template' => $request->input('template')];

            // dd($notice); 

            $notice = $this->user->notices()->create($notice);

            return $notice;

    }
    
    
    
    
    
    
    
    
}
