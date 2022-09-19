<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HealerNotfy extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     
    public $user;
     
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        $data['id']      = $this->user['id'];
        $data['name']    = $this->user['name'];
        $data['email']   = $this->user['email'];  
        $data['message'] = $this->user['message'];

        return $data;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        $data['id']      = $this->user['id'];
        $data['name']    = $this->user['name'];
        $data['email']   = $this->user['email'];
        $data['message'] = $this->user['message'];

        return $data;
    }
}
