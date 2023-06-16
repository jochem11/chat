<style>
form {
    bottom: 20px;
    background-color: white !important;
    height: 60px;
    margin: 0;
    padding-top: 10px;
    align-items: center;
    border-top: 1px solid #9ca3af;
    }
    input {
        width: 80%;
        height: 75%;
        border: 1px solid #9ca3af;
        outline: none;
    }
    button {
        height: 75%;
        border: 1px solid #11274d;
        outline: none;
        background-color: rgba(5, 197, 32, 0.4) !important;
        color: #831b1b;
        width: 20%;
    }
</style>
@extends('layouts.chat')
@section('content')
    <div class="container min-h-screenw-screen relative">
{{--        get all chat messges--}}
        <div class="flex flex-col gap-4 p-4">
            @foreach($messages as $message)
                <div class="flex flex-row gap-4">
                    <div class="flex flex-col gap-1 bg-gray-200 p-3 rounded-lg">
                        <div class="text-gray-800 font-bold">{{ $message->user->name }} <span class="text-gray-600 text-sm">({{ $message->created_at }})</span>:</div>
                        <div class="text-gray-700">{{ $message->message }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        <form action="{{ route('chat.store', $id) }}" method="post" class="fixed w-full bg-white flex px-6 gap-6">
            @csrf
            <input type="text" name="message" placeholder="send message..." class="rounded-lg mt-auto">
            <button class="rounded-lg">Send</button>
        </form>
    </div>
@endsection
