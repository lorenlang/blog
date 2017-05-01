<?php namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
//use App\Http\Controllers\Controller;

use App\Subscriber;
use Illuminate\Support\Facades\Mail;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Redirect;

class SubscribeController extends Controller
{


    public function getIndex()
    {
        return view('pages.subscribe');
    }

    public function postSubmit(SubscribeRequest $request)
    {

        if (Subscriber::create(['email' => $request->input('email')])) {
            flash()->success('Success - w00t!');
            return redirect('/');

        } else {
            flash()->error('There was a problem saving your subscription. Please try again.');
            return redirect('subscribe');

        }
    }


    public function getFoo()
    {

//        $subj = 'Blog post notification from wheresmyhead.com';

//        Mail::send('emails.notify', ['title' => $post->title, 'slug' => $post->slug], function($message) use ($subj)
        Mail::send(
            'emails.notify',
            ['title' => 'My Test Blog Post', 'slug' => 'something-here'],
            function ($message) {
                $message->to('loren@lorenlang.com')->subject('Test notification');
            }
        );


        $to      = 'loren@lorenlang.com';
        $subject = "Test HTML email";

        $message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($to, $subject, $message, $headers);


    }
}
