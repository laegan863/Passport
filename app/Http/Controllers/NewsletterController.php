<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide a valid email address.'
            ], 422);
        }

        $email = $request->email;

        // Check if already subscribed
        if (NewsletterSubscriber::isSubscribed($email)) {
            return response()->json([
                'success' => false,
                'message' => 'This email is already subscribed to our newsletter.'
            ], 422);
        }

        try {
            // Check if previously unsubscribed
            $subscriber = NewsletterSubscriber::where('email', $email)->first();
            
            if ($subscriber) {
                // Reactivate subscription
                $subscriber->update([
                    'status' => 'active',
                    'ip_address' => $request->ip()
                ]);
            } else {
                // Create new subscription
                NewsletterSubscriber::create([
                    'email' => $email,
                    'status' => 'active',
                    'ip_address' => $request->ip()
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing! You will receive our latest updates.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }
}
