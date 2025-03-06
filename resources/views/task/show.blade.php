
<x-layout>
    <x-slot:heading>{{ $task->name }}</x-slot:heading>
    
    
    <div>
        <div class="text-lg mb-4"> {{ $task->description }}</div>
        <div><strong>Where to go:</strong> {{ $task->location }}</div>
        <div><strong>Time Estimate:</strong> {{ $task->time_estimate }} hour</div>
        <div><strong>Category:</strong> {{ $task->category->name }}</div>
        <div><strong>Owner:</strong> {{ $task->user->name }}</div>

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