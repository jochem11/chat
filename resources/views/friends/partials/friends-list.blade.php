<div class="container w-2/5">
    <h2 class="text-lg font-medium">Friends</h2>

    @foreach($friends as $friend)
        <div class="flex flex-row justify-between items-center p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-4">
            <div class="text-lg text-gray-900 font-medium">{{$friend->name}}</div>
            <div class="flex flex-row space-x-4">
                <form method="POST" action="{{route('friends.destroy')}}" class="inline">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$friend->id}}">
                    <button type="submit" class="btn btn-danger">Remove Friend</button>
                </form>
                <a href="{{url('/chat/'.$friend->id)}}">
                    <button class="btn btn-success">Chat</button>
                </a>
            </div>
        </div>
    @endforeach
</div>
