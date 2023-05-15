<?php
namespace App\Mail;
use App\Models\Commande;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommandeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $commande;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Commande $commande)
    {
        $this->commande = $commande;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.commande')
                    ->with([
                        'commande' => $this->commande,
                        'produits' => $this->commande->produits,
                        'total' => $this->commande->total
                    ])
                    ->subject('Confirmation de commande');
    }
}
