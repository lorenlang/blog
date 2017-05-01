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


        Mail::send(
            'emails.notify',
            ['title' => 'My Test Blog Post', 'slug' => 'something-here'],
            function ($message) {
                $message->to('loren@lorenlang.com')->subject('Test notification');
            }
        );

    }

}
