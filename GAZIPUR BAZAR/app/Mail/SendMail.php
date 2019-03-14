<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ResetPassword;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;
    public function __construct(ResetPassword $pass)
    {
        $this->data = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Laravel@email.com')->subject('Reset Password')->view('Admin.resetlink')
                                                                 ->with('data',$this->data);
    }
}
