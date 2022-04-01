<?php

namespace App\Jobs;

use App\Mail\SpamMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Log\Logger;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSpamMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public SpamMail $mail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $something_text)
    {
        $this->mail = new SpamMail($something_text);

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('uzulla@example.jp')->send($this->mail);
    }
}
