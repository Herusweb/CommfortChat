<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreRequest;
use App\Models\Message;
use App\Models\MessageStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Message\MessageResource;

class MessageController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();
            $message = Message::create([
            'chat_id' => $data['chat_id'],
            'user_id' => auth()->id(),
            'body' => $data['body'],
        ]);

        foreach ($data['user_Ids'] as $user_Id){
            MessageStatus::create([
            'chat_id' => $data['chat_id'],
            'message_id' => $message->id,
            'user_id' => $user_Id,
        ]);
    }
    DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'status' => 'Error',
                'message' => $exception->getMessage(),
        ],);
        }

        return MessageResource::make($message)->resolve();

    }
}
