<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mailgun\Mailgun;

class ContactController extends Controller
{
    public function index()
    {
        return view('theme.contact');
    }

    public function post()
    {
        $mg = Mailgun::create('key-1715c074f053673f6e3c4c79e8595390');

        $email = $_POST['email'];
        $name = $_POST['name'];
        
        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
        } else {
            $phone = '';
        }

        $message = $_POST['message'];

        # Now, compose and send your message.
        # $mg->messages()->send($domain, $params);
        $mg->messages()->send('sandbox54da33a8b2644faebc547af411755bc1.mailgun.org', [
          'from'    => $email,
          'to'      => 'kim@darkroast.co',
          'subject' => 'New message from ' . $name . ' via Essex Appliance Centre contact form.',
          'html'    => 'Name: ' . $name . '<br/>' .
                        'Email: ' . $email . '<br/>' .
                        'Phone: ' . $phone . '<br/>' .
                        'Message: ' . $message
        ]);

    }
}
