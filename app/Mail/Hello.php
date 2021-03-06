<?php

namespace App\Mail;



use App\Models\User as UM;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Hello extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(UM $user)
    {
        $this->user = $user;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.hello');
    }
}