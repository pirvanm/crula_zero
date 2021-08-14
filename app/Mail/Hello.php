
<?php

namespace AppMail;

use IlluminateBusQueueable;
use IlluminateMailMailable;
use IlluminateQueueSerializesModels;
use IlluminateContractsQueueShouldQueue;

class Hello extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}