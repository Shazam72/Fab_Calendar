<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Account_Confirm extends Mailable
{
    use Queueable, SerializesModels;

    protected $tokenToSend;
    protected $sendingTo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tokenToSend,$sendingTo)
    {
        $this->tokenToSend=$tokenToSend;
        $this->sendingTo=$sendingTo;
    }

    public $dataInfo=[
        'subject'=>"Verification de compte",
        'replyTo'=>"gossr330@gmail.com",
    ];


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->dataInfo['subject'])->replyTo($this->dataInfo['replyTo'])->view('mails.confirm_account')->with([
            'token'=>$this->tokenToSend,
            'name'=>$this->sendingTo,
        ]);
    }
}
