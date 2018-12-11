<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use \App\Customer;
class UserRegisteration extends Mailable
{
    use Queueable, SerializesModels;

	public $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $customer)
    {
        //
		$this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->from(env("MAIL_SENDER_EMAIL"))
		                ->view('Emails.users.register',compact("customer"));
    }
}
