<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreditRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $credit;
    public $currency;

    public function __construct(
        $credit,
        $currency
    ) {
        $this->credit = $credit;
        $this->currency = $currency; // Correction here
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

        // Customize the mail representation of the notification
        return (new MailMessage)
            ->subject(__('loans-messages.new_loan_email.title'))
            ->line(__('loans-messages.new_loan_email.message'))
            ->line(__('loans-messages.new_loan_email.details_label'))
            // Access credit details using $this->credit
            ->line(__('loans-messages.details.credit_id') . ': ' . $this->credit->uniq_id)
            ->line(__('loans-messages.details.amount') . ': ' . $this->credit->amount . ' ' . $this->currency)
            ->line(__('loans-messages.loans-list.duration') . ': ' . $this->credit->repayment_duration . ' ' . __('loans-messages.loans-list.month'))
            ->line(__('loans-messages.details.rate') . ': ' . $this->credit->interest_rate . '%')
            ->line(__('loans-messages.new_loan_email.action'))
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
