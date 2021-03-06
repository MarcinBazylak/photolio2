<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordReset extends Notification
{
   use Queueable;

   /**
    * The password reset token.
    *
    * @var string
    */
   public $token;

   /**
    * Create a new notification instance.
    *
    * @return void
    */
   public function __construct($token)
   {
      $this->token = $token;
   }

   /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
   public function via($notifiable)
   {
      return ['mail'];
   }

   /**
    * Build the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
   public function toMail($notifiable)
   {
      return (new MailMessage)
         ->subject('Resetowanie hasła')
         ->line('Otrzymujesz tę wiadomość, ponieważ wysłałeś żadanie zresetowania swojego hasła.')
         ->line('Aby to zrobić, kliknij w poniższy przycisk. Zostaniesz przeniesiony na stronę resetowania hasła.') // Here are the lines you can safely override
         ->action('Resetuj hasło', url('password/reset', $this->token))
         ->line('Jeśli nie wysłałeś żądania resetowania hasła, zignoruj tę wiadomość..');
   }
}
