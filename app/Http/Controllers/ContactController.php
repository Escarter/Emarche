<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Weblee\Mandrill\Mail;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
   private $mandrill;
   
    public function __construct(Mail $mandrill)
    {
        $this->mandrill = $mandrill;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $data =[
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'bodymessage'=>$request->input('message')];

        \Mail::send('emails.contact',$data, function($message){
            $message->to('brienom@gmail.com','Me');
            $message->subject('CleBeainc.com Inquiry');
        });
        return \Redirect::route('contact')->with('info','Thanks for Contancting us!');
    }

    
}
