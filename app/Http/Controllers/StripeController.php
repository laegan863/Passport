<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Tblpersonalinfo;

class StripeController extends Controller
{
    public function stripecheckout(Request $request)
    {
        $validated = $request->validate([
            'total' => 'required|numeric|min:1',
            'name'  => 'nullable|string|max:255',
            'email' => 'nullable|max:255',
            'id' => 'numeric|required'
        ]);

        // Ensure Stripe secret key is configured
        $stripeKey = env('STRIPE_SK');
        if (empty($stripeKey)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Stripe secret key not configured',
            ], 500);
        }

        Stripe::setApiKey($stripeKey);

        try {
            $amount = (int) ($validated['total'] * 100);

            // Create the PaymentIntent first — avoid failing early if DB is down
            $intent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'usd',
                // Use explicit card payment method type to avoid accounts
                // that don't support automatic payment methods for the currency
                'payment_method_types' => ['card'],
                'metadata' => [
                    'customer_name'  => $validated['name'] ?? 'N/A',
                    'customer_email' => $validated['email'] ?? 'N/A',
                ],
            ]);

            // Attempt to update DB status but do not fail the whole request if DB is unavailable
            try {
                $data = Tblpersonalinfo::find($validated['id']);
                if ($data) {
                    $data->status = 'successful';
                    $data->save();
                }
            } catch (\Exception $dbEx) {
                // Log database error but continue — returning client secret is most important
                logger()->error('Stripe checkout: failed to update Tblpersonalinfo: ' . $dbEx->getMessage());
            }

            return response()->json([
                'clientSecret' => $intent->client_secret,
                'status' => 'success'
            ]);

        } catch (\Exception $e) {
            // Try to mark record abandoned if possible, but ignore failures here
            try {
                $data = Tblpersonalinfo::find($validated['id']);
                if ($data) {
                    $data->status = 'abandoned';
                    $data->save();
                }
            } catch (\Exception $ignore) {
                logger()->warning('Stripe checkout: failed to set abandoned status: ' . $ignore->getMessage());
            }

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
