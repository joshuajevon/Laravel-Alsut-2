<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public User $user, public $message)
    {
        // dd($this->message);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $userNow = Auth::user();
        return new Envelope(
            from: new Address($userNow->email, $userNow->name),
            subject: 'Send Message',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $message = $this->message;
        return new Content(
            view: 'email.emailTemplate',
            with: [
                'messages' => $message
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
