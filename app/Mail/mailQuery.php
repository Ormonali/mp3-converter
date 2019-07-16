<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Markdown;

class mailQuery extends Mailable
{
    use Queueable, SerializesModels;
    public $file;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file['path'];
        $this->name = $file['name'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ваш зарпос на сайте mp3-converter')->from('kaarov8@gmail.com','mp3-converter')->markdown('emails.mail');
    }
}
