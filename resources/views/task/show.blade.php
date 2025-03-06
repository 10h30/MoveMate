
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
    </div>
</x-layout>