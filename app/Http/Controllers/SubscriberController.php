<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function StoreSubscribers(Request $request)
    {
        $request->validate([
            // 'name' => 'required | string',
            's_email' => 'required | email',
            // 'message' => 'required',
        ]);

        $subscriber = new Subscriber();
        // $message->name = $request->name;
        $subscriber->s_email = $request->s_email;
        // $subscriber->subscriber = $request->subscriber;
        $subscriber->save();

        session()->flash('success', 'Thanks for the Subscription.');
        return redirect()->back();
    }
}
