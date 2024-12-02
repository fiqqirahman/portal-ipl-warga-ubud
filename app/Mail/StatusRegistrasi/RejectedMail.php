<?php

namespace App\Mail\StatusRegistrasi;

use App\Models\RegistrasiVendor;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RejectedMail extends Mailable
{
    use SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public RegistrasiVendor $registrasiVendor)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Status Registrasi Vendor',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.status-registrasi.rejected',
	        with: [
				'vendorName' => $this->registrasiVendor->nama,
				'status' => $this->registrasiVendor->status_registrasi->label(),
				'notes' => $this->registrasiVendor->status_registrasi_notes ?? '-'
	        ]
        );
    }
}
