<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SpamMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $body_text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $body_text)
    {
        $this->body_text = $body_text;
        $this->from('spammer@example.jp');
        $this->subject("hi");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('spam_mail', ['body_text' => $this->body_text]);
    }
}
