<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OrderWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $signature = (string) $request->header('X-Order-Signature');
        $payload = $request->getContent();
        $secret = config('services.order.webhook_secret');
        $expected = hash_hmac('sha256', $payload, $secret);
        
        if (!hash_equals($expected, $signature)) {
            return response()->json(['error' => 'Invalid signature verification'], 401);
        }
        
        $orderId = $request->input('order_id');
        $lock = Cache::lock('webhook_order_' . $orderId, 15);
        if (!$lock->get()) {
            return response()->json(['status' => 'duplicate_event_ignored'], 200);
        }
        
        return response()->json(['status' => 'order_dispatched_successfully'], 200);
    }
}
