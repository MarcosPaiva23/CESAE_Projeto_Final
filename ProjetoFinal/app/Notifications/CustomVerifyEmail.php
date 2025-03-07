<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends VerifyEmail
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Verifique a sua conta criada no Cesae Boleias')
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line('Por favor, clique no botão abaixo para verificar a sua conta.')
            ->line('Este email é valido por ' . Config::get('auth.verification.expire', 30) . ' minutos.')
            ->action('Verificar conta', $verificationUrl)
            ->line('Se você não criou uma conta, nenhuma ação é necessária.')
            ->salutation('Atenciosamente, Equipa do Cesae Boleias');
    }
    
    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 30)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
        
    }
}