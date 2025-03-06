<x-layout>
    <x-slot:heading>Task Page</x-slot:heading>
    
    @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @foreach ($tasks as $task)
    <div class="block border-2 border-gray-500 p-2">
        <div><a href="/task/{{ $task->id }}">
            <h3 class="text-2xl tracking-tight text-blue-800">{{ $task->name }}<h3>
        </a></div>
        <div><strong>Where to go:</strong> {{ $task->location }}</div>
        <div><strong>Time Estimate:</strong> {{ $task->time_estimate }}</div>
    </div>    
    @endforeach

    <div class="mt-2">{{$tasks -> links()}}</div>
</x-layout>