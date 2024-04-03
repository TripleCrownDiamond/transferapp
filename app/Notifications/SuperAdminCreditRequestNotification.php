<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SuperAdminCreditRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $credit;
    public $currency;
    public $client;

    public function __construct(
        $credit,
        $currency,
        $client
    ) {
        $this->credit = $credit;
        $this->currency = $currency;
        $this->client = $client; // Correction here
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
            ->subject(__('loans-messages.super_admin_new_loan_email.title'))
            ->line(__('loans-messages.super_admin_new_loan_email.message'))
            ->line(__('loans-messages.super_admin_new_loan_email.label'))
            // Access credit details using $this->credit
            ->line(__('loans-messages.super_admin_new_loan_email.name') . ': ' . $this->client->name)
            ->line(__('loans-messages.details.credit_id') . ': ' . $this->credit->uniq_id)
            ->line(__('loans-messages.details.amount') . ': ' . $this->credit->amount . ' ' . $this->currency)
            ->line(__('loans-messages.loans-list.duration') . ': ' . $this->credit->repayment_duration . ' ' . __('loans-messages.loans-list.month'))
            ->line(__('loans-messages.details.rate') . ': ' . $this->credit->interest_rate . '%')
            // Add more credit details as needed
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
