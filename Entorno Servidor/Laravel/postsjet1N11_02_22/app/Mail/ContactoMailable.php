<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Formulario de Contacto";
    public $datos, $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos, $email)
    {
        $this->datos = $datos;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.contacto');
    }
}
