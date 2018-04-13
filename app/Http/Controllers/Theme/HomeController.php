<?php

namespace App\Http\Controllers\Theme;

use App\Ad;
use App\Color;
use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Mailgun\Mailgun;

class HomeController extends Controller
{
    public function index()
    {
        $ads = Ad::all();
        $banner = Ad::where('name', 'banner')->first();
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $hotBuys = Product::where('featured', '1')->get();
        $products = Product::orderBy('created_at', 'desc')->limit(10)->get();
        
        return view('theme.home', compact('posts', 'ads', 'banner', 'hotBuys', 'products'));
    }

    public function post()
    {
        $mg = Mailgun::create('key-1715c074f053673f6e3c4c79e8595390');

        $email = $_POST['email'];

        # Now, compose and send your message.
        # $mg->messages()->send($domain, $params);
        $mg->messages()->send('sandbox54da33a8b2644faebc547af411755bc1.mailgun.org', [
          'from'    => $email,
          'to'      => 'kim@darkroast.co',
          'subject' => $email . ' would like to be added to your mailing list.',
          'html'    => $email . ' has signed up to receive Essex Appliance Centre\'s newsletters. Please add them to your mailing list at your earliest convenience.'
        ]);
    }
}
