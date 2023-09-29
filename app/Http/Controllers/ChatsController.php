<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function get() {
        $user =Auth::user()->role;
        if($user == 'admin') {
            $contacts = User::where('id', '!=', Auth::user()->id)->get();
        }else{
            $contacts = User::where('role', 'admin')->get();
        }
        $unreadIds = Message::select(\DB::raw('`from_id` as sender_id, count(`from_id`) as messages_count'))
            ->where('to_id' , Auth::user()->id)
            ->where('read', false)
            ->groupBy('from_id')
            ->get();
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
            return $contact;
        });

        return response()->json($contacts);
    }


    public function getMessagesFor($id) {

        Message::where('from_id', $id)->orWhere('to_id', $id)->update(['read' => true]);
        $messages = Message::where(function ($q) use ($id){
            $q->where('from_id', Auth::user()->id);
            $q->where('to_id', $id);
        })->orWhere(function ($q) use ($id){
            $q->where('from_id', $id);
            $q->where('to_id',  Auth::user()->id);
        })->get();
        return response()->json($messages);

    }
    public function send(Request $request) {
        $user = Auth::user();
        $message = Message::create([
            'from_id' => $user->id,
            'to_id' => $request->contact_id,
            'message' => $request->message
        ]);
        broadcast(new MessageSent($message));
        return response()->json($message);
    }
}
