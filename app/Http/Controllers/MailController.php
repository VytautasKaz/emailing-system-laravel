<?php

namespace App\Http\Controllers;

use App\Mail\MailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // dd($_GET);
        $recipient = $request->customer_username;
        $email = $request->customer_email;
        $subject = $request->email_subject;
        $content = $request->email_content;

        Mail::to($email)->send(new MailTemplate($recipient, $subject, $content));

        return redirect()->route('customers.index')->with('status_success', 'E-mail sent successfully!');
    }
}
