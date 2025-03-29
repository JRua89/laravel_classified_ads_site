<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListingContactCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $listing;

    public $sender;

    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Listing $listing, User $sender, $body)
    {
        $this->listing = $listing;
        $this->sender = $sender;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
  public function build()
{
    Log::info('Email body:', ['body' => $this->body]); // Check logs
    return $this->view('email.listing.contact.message', [
        'body' => $this->body
    ])
    ->subject("{$this->sender->name} sent a message about this {$this->listing->title}")
    ->from('hello@fresh.com')
    ->replyTo($this->sender->email);
}

}
