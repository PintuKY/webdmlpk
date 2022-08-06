<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'info@subbisky.com';
        $name = 'subbisky.com Login';
        $firstname = $this->data['firstname'];      
        $otp = $this->data['otp'];        
        $subject = "Login OTP - subbisky.com";
        
        return $this->view('mail.login-otp',compact('firstname','otp'))
                    ->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject);
    }
}
