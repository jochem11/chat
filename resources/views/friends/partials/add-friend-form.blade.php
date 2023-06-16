<div class="container w-3/5">
        <h2 class="text-lg font-medium">Add Friend</h2>

        @foreach($users as $user)
            <div class="flex flex-row justify-between items-center p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-4">
                <div class="text-lg text-gray-900 font-medium">{{$user->name}}</div>
                <div class="flex flex-row space-x-4">
                    <form method="POST" action="{{route('friends.store')}}">
                        @csrf
                        <input type="hidden" name="friend_id" value="{{$user->id}}">
                        <button type="submit" class="text-indigo-600 hover:text-indigo-900">Add Friend</button>
                    </form>
                </div>
            </div>
        @endforeach
</div>
