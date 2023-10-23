<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $details;
    public $multiple_items;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details="",$multiple_items="")
    {
          $this->details = $details; 
          $this->multiple_items = $multiple_items; 
          
        //   dd($multiple_items);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->subject("Test mail from everspice")->view('web.email');
         return $this->subject('www.everspiceceylon.com')->view('web.email');
    }
}
