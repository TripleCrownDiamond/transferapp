<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanRejectedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $credit_to_update;
    public function __construct(
        $credit_to_update
    ) {
        $this->credit_to_update = $credit_to_update;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('loans-messages.loan_rejected_email.title'))
            ->line(__('loans-messages.loan_rejected_email.message_part_1') . $this->credit_to_update->uniq_id . ' ' . __('loans-messages.loan_rejected_email.message_part_2'))
            ->salutation(__('login-register-messages.email.emailFooter'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
