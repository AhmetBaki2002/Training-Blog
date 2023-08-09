<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Exception;
use \Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            // $newsletter = new Newsletter();

            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email can not be added to the newsletter list'
            ]);
        }
        return redirect('/')->with('success', 'you are now signed up for our newsletter');
    }
}
