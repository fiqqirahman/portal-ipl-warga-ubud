<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    private $activationToken;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $password, $activationToken)
    {
        $this->user = $user;
        $this->password = $password;
        $this->activationToken = $activationToken;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Aktivasi Akun Anda',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $activationLink = route('landing-page.user.activate', ['token' => $this->activationToken]);

        return new Content(

            view: 'emails.registration', // Gunakan view yang sudah Anda buat
            with: [
                'user' => $this->user,
                'password' => $this->password,
                'activationLink' => $activationLink,
            ],
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
