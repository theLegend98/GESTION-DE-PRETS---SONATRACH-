<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MyFirstNotification extends Notification
{
    use Queueable;

    private $details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }


            /**
         * Get the array representation of the notification.
         *
         * @param  mixed  $notifiable
         * @return array
         */
        public function toArray($notifiable)
        {
            return [
                'invoice_id' => $this->invoice->id,
                'amount' => $this->invoice->amount,
            ];
        }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from('d.meharga@esi-sba.dz', 'Example')
                    ->greeting('Hi Artisan')
                    ->line('This is my first notification from ItSolutionStuff.com')
                    ->action('View My Site', url('/'))
                    ->line('Thank you for using ItSolutionStuff.com tuto!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'type'=>$this->details['type'],
            'etat'=>$this->details['etat'],
            'motif'=>$this->details['motif'],
            'sender'=>$this->details['sender'],
            'order_id' => $this->details['order_id']
        ];
    }
}
