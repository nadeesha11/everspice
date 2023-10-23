<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class orderAdmin extends Mailable
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
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
         return $this->subject('www.everspiceceylon.com')->view('web.adminMail');
    }
}













