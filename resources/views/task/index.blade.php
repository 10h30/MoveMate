<x-layout>
    <x-slot:heading>Task Page</x-slot:heading>

    @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif
    <div class="mb-5">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="/task/create">Create new task</a>
    </div>
    <div class="mb-5">
        Progress:  {{ $completedTasks}} / {{ $totalTasks  }} completed.
    </div>
    @foreach ($tasks as $task)
    <div class="block border-2 border-gray-500 p-2">
        <div class="flex items-center justify-between">
            <div>
                <div><a href="/task/{{ $task->id }}">
                    <h3 class="text-2xl tracking-tight text-blue-800">{{ $task->name }}<h3>
                </a></div>
                <div><strong>Where to go:</strong> {{ $task->location }}</div>
                <div><strong>Time Estimate:</strong> {{ $task->time_estimate }}</div>
            </div>
            <div>
                <p>{{ ($task->completed) ? "Completed" : "" }}</p>
            </div>
        </div>
    </div>    
    @endforeach

    <div class="mt-2">{{$tasks -> links()}}</div>
</x-layout>