<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notificacion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $asunto;
    public $mensaje;
    public function __construct($asunto, $mensaje)
    {
        $this->sub = $asunto;
        $this->mes = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->sub;
        $e_message = $this->mes;

    	return $this->markdown('email.notificacion', compact("e_message"))->subject($e_subject);
    }
}
