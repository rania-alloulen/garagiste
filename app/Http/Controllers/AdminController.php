<?php

namespace App\Http\Controllers;

use App\Mail\NotificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Show the form for sending a notification email.
     *
     * @return \Illuminate\View\View
     */
    public function showSendNotificationForm()
    {
        return view('admin.send-notification');
    }

    /**
     * Handle the form submission and send the notification email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendNotification(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Get the email details from the request
        $email = $request->input('email');
        $subject = $request->input('subject');
        $content = $request->input('content');

        // Send the notification email
        Mail::to($email)->send(new NotificationEmail($subject, $content));

        // Redirect back with a success message
        return back()->with('success', 'Notification email sent successfully!');
    }
}
