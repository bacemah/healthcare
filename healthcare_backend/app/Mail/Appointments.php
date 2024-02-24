<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope ;
use App\Models\Appointment;

class Appointments extends Mailable
{
    use Queueable, SerializesModels;

    public  $appointment  ;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment ;
        return $appointment ;
    }

      /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope([
        'from' => new Address("bacemahmed7@gmail.com", "healthcare"),
        'subject' => 'Make An Appointment']);

    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
       return new Content(
    [
        'markdown' => 'emails.Appointment',
        'with' => [
            'client_name' => $this->appointment->name_client,
            'client_email' => $this->appointment->email_client,
            'time' => $this->appointment->time,
            'problem' => $this->appointment->problem,
        ],
    ]);
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { return $this->markdown('emails.Appointment')
            ->with([
                'client_name' => $this->appointment->name_client,
                'client_email' => $this->appointment->email_client,
                'time' => $this->appointment->time,
                'problem' => $this->appointment->problem,
            ]);
        
    }
}
