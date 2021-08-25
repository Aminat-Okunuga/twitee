<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $data;
    public function __construct($data){
        
        $this->data = $data;
    }
        public function build(){

                // $address = 'janeexampexample@example.com';
                // $subject = 'This is a demo!';
                // $name = 'Jane Doe';
                
                // return $this->view('emails.test')
                //             ->from($address, $name)
                //             ->cc($address, $name)
                //             ->bcc($address, $name)
                //             ->replyTo($address, $name)
                //             ->subject($subject)
                //             ->with([ 'message' => $this->data['message'] ]);

                $subject = 'Welcome';
       return $this->view('emails.welcome')->subject($subject);
            
              }
        }