<?
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    /**
     * Create a new message instance.
     *
     * @param array $formData
     * @return void
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
{
    return $this->subject('New Subscription')
                ->view('emails.paysubscribeform');
}

// public function build()
// {
//     return $this->view('emails.paysubscribeform')->with('formdata', $this->formdata);
// }
}
