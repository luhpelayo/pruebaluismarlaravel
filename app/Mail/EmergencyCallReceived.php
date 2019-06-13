<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Contact;

class EmergencyCallReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $mensaje;

    public function __construct($msj)
    {
        $this->mensaje = $msj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ingenieria Financiera')->view('emails.Bienvenido');
    }
}
