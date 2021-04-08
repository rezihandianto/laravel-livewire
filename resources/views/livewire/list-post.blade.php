<div>
    @foreach ($posts as $post)
        <div class="p-4 my-4 bg-white shadow-xl rounded-md">
            <div>
                <span class="text-xl font-bold">{{ $post->user->name }}</span>
                <span class="text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                <button 
                    wire:click="showUpdateForm({{ $post->id }})"
                    class="p-2 bg-green-600 hover:bg-green-400 text-white rounded-md"
                >
                Edit
            </button>
            <button 
                    onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()"
                    wire:click="delete({{ $post->id }})"
                    class="p-2 bg-red-600 hover:bg-red-400 text-white rounded-md"
                >
                Delete
            </button>
            </div>
            <div>
                @if ($updateStateId !== $post->id)
                    <span>{{ $post->body }}</span>
                @endif

                @if ($updateStateId === $post->id)
                    <textarea wire:model="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" rows="3"
                    ></textarea>
                    <button 
                    wire:click="update({{ $post->id }})"
                    class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-400 rounded-md"
                    >Save</button>
                @endif
            </div>
        </div>
    @endforeach
</div>
