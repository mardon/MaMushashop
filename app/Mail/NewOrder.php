<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $customer)
    {
        $this->data = $data;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nová objednávka')->view('emails.neworder');
    }
}
