<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class newOrderNotification extends Notification 
{
    use Queueable;

    protected $name, $product , $price;

    /**
     * Create a new notification instance.
     */
    public function __construct($name, $product, $price)
    {
        $this->name    = $name;

        $this->product = $product;

        $this->price   = $price;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // maiL, Broadcast, databade, vonage, slack 
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {    
        return (new MailMessage)
                    ->greeting('Dear ' .$notifiable->name)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    // public function toBroadcast(object $notifiable): MailMessage
    // {    

    //     return [
              
    //           'msg' => 'New Order Created, '.$this->name.' purchase '.$this->product.' with cost'.$this->price,
    //           'url' => route('admin.orders'),


    //     ];
        
    // }

    // public function toDatabase() {
    //     return [
              
    //           'msg' => 'New Order Created, '.$this->name.' purchase '.$this->product.' with cost'.$this->price,
    //           'url' => route('admin.orders'),


    //     ];
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
              
              'msg' => 'New Order Created, '.$this->name.' purchase '.$this->product.' with cost'.$this->price,
              'url' => route('admin.orders'),


        ];
    }
}
