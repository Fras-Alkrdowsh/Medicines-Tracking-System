<?php

namespace App\Jobs;

use App\Models\User;
use PHPUnit\Exception;
use App\Models\Message;
use App\Mail\MessageMail;
use App\Models\Pharmacist;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageJob implements ShouldQueue
{
    use Queueable;

    public $ids; 
    public $subject;
    public $body;
    public $recipient_type;

    public function __construct(array $ids, string $subject, string $body, string $recipient_type)
    {
        $this->ids = $ids;
        $this->subject = $subject;
        $this->body = $body;
        $this->recipient_type = $recipient_type;
    }

    public function handle(): void
    {
        foreach ($this->ids as $recipientId) {
            $recipient = null;

            if ($this->recipient_type === 'users') {

                $recipient = User::findorfail($recipientId);
                $resive_model='App\Models\User';

            } elseif ($this->recipient_type === 'pharmacists') {
                $recipient = Pharmacist::findorfail($recipientId);
                $resive_model='App\Models\Pharmacist';
            }

           

            try {
                 Message::create([
                    'subject' => $this->subject,
                    'message' => $this->body,
                    'receiveable_type' => $resive_model,
                    'receiveable_id' => $recipient->id, 
                    'sendable_type' => 'App\Models\Admin', 
                    'sendable_id' => 1, 
                ]);


                Mail::to($recipient->email)->send(new MessageMail($this->subject, $this->body));
            } catch (Exception $e) {
                
                Log::error('Failed to create message or send email: ' . $e->getMessage());
            }
        }
    }    }

