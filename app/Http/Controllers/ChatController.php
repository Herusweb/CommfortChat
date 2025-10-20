<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Message\MessageResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Chat\StoreRequest;
use App\Http\Resources\Chat\ChatResource;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('id','!=',auth()->id())->get();
        $users = UserResource::collection($users)->resolve();
        $chats = Auth::user()->chats()->has('messages')->get();
        $chats = ChatResource::collection($chats)->resolve();

        return inertia('Chat/Index',compact('users', 'chats'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $userIds = array_merge($data['users'], [auth()->id()]);
        sort($userIds);
        $userIdsString = implode('-', $userIds);

        try {
            DB::beginTransaction();
            $chat = Chat::updateOrCreate(
                ['users' => $userIdsString],
                ['title' => $data['title']]
            );
            $chat->users()->sync($userIds);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('chats.show', $chat->id);
    }

    public function show(Chat $chat)
    {
        $users = $chat->users()->get();
        $messages = $chat->messages()->get();
        $messages = MessageResource::collection($messages)->resolve();
        $users = UserResource::collection($users)->resolve();
        $chat = ChatResource::make($chat)->resolve();
        return inertia('Chat/Show', compact('chat', 'users', 'messages'));
    }
}
