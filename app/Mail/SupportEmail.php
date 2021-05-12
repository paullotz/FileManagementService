<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $anrede;
    public $name;
    public $email;
    public $message;

    public function __construct($anrede, $name, $email, $message)
    {
        $this->anrede = $anrede;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userdetails = [$this->anrede, $this->name, $this->email, $this->message];
        return $this->from("filemanagementservice@web.de")->view('support-email-template', ["userdetails" => $userdetails]);
    }
}
