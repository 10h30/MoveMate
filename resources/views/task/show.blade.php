
<x-layout>
    <x-slot:heading>{{ $task->name }}</x-slot:heading>
    
    
    <div>
        <div class="text-lg mb-4"> 
            <h2>What need to do </h2>
            <p class="text-sm">{{ $task->description }}</p>
        </div>
        <div><strong>Where to go:</strong> {{ $task->location }}</div>
        <div><strong>Time Estimate:</strong> {{ $task->time_estimate }} hour</div>
        <div><strong>Category:</strong> {{ $task->category->name }}</div>
        <div><strong>Owner:</strong> {{ $task->user->name }}</div>
        @auth
            <div class="mt-4 mb-4">
                <form action="/task/{{ $task->id }}/toggle" method="POST" class="d-inline" >
                    @csrf
                    @method('PATCH')
                    <x-form-button>{{ (! $task->completed) ? 'Mark Completed' : "Greate! You nailed it!" }}</x-form-button>
                </form>
            </div>
        @endauth
    </div>   
    <div class="mt-5">
        <a href="/task/{{ $task->id }}/edit" class="text-sm text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
        <form action="/task/{{ $task->id }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <a href="javascript:void(0)" onclick="if(confirm('Are you sure you want to delete this task?')){this.closest('form').submit()}">
                Delete
            </a>
        </form>    
    </div>
</x-layout>