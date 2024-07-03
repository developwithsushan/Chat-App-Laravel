<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MessengerController extends Controller
{
    function index() {
        return view('messenger.index');
    }

    /** Search user profiles */
    function search(Request $request)
    {
        $getRecords = null;
        $input = $request['query'];
        $records = User::where('id', '!=', Auth::user()->id)
            ->where('name', 'LIKE', "%{$input}%")
            ->orWhere('user_name', 'LIKE', "%{$input}%")
            ->paginate(10);

        if ($records->total() < 1) {
            $getRecords .= "<p class='text-center'>Noting to show.</p>";
        }

        foreach ($records as $record) {
            $getRecords .= view('messenger.components.search-item', compact('record'))->render();
        }

        return response()->json([
            'records' => $getRecords,
            'last_page' => $records->lastPage()
        ]);
    }


    // fetch user by id
    function fetchIdInfo(Request $request)
    {
        $fetch = User::where('id', $request['id'])->first();
        return response()->json([
            'fetch' => $fetch
        ]);
    }

    // send message
    public function sendMessage(Request $request){
        $request->validate([
            'message' => ['required'],
            'id' => ['required', 'integer'],
            'temporaryMsgId' => ['required'],
        ]);
        // STORES THE MESSAGE IN DB
        $message = new Message();
        $message->from_id = Auth::user()->id;
        $message->to_id = $request->id;
        $message->body = $request->message;
        $message->save();

        return response()->json([
            'message' => $this->messageCard($message),
            'tempID' => $request->temporaryMsdId
        ]);
    }

    function messageCard($message){
        return view('messenger.components.message-card', compact('message'))->render();
    }

}
