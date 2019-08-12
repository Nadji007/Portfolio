<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Ngd_service;
use App\Ngd_about;
use App\Ngd_home;
use Session;
use App\ngd_contact;


class PagesController extends Controller
{
    public function landing()
    {
        $ngd_services = Ngd_service::whereStatus(1)
            ->orderBy('sid')
            ->limit(4)
            ->get();
            $ngd_abouts = Ngd_about::whereStatus(1)
            ->orderByDesc('aid')
            ->limit(1)
            ->get();
            $ngd_homes = Ngd_home::whereStatus(1)
            ->orderByDesc('hid')
            ->limit(1)
            ->get();
            $ngd_contacts = Ngd_contact::whereCid('cid >=1')
            ->orderByDesc('cid')
            ->limit(1)
            ->get();
        return view('frontend.index', compact('ngd_services','ngd_abouts','ngd_homes','ngd_contacts'));
        
    }
    
    public function postcontact(Request $request)
    {
       /* $this->validate($request,[
            'FirstName' =>'FirstName',
            'LastName' =>'LastName',
            'email' => 'required|email',
            'phone' => 'required|min:10|numeric',
            'message' =>'message|min:10'
            
            //'phone' => 'required|regex:/(01)[0-9]{9}/'
        ]);
        */
        $data = [
            'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
            
        ];
        Mail::send('frontend.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('test@example.org');
            $message->subject('Demande de devis');
        });
        
        Session::flash('succès', 'Votre message a bien été envoyé');
       
        return redirect('/');
            
    }

}
