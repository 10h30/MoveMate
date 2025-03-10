<x-layout>
    <x-slot:heading>Create New Task</x-slot:heading>
    @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif
    <form action="/task/create" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-600">Task Name</label>
            <input type="text" name="name" class="w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-300" required>
            <x-form-error name="name"></x-form-error>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-600">Description</label>
            <textarea name="description" class="w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-300" rows="3" required></textarea>
            <x-form-error name="description"></x-form-error>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-600">Category</label>
            <select name="category_id" class="w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-300" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-form-error name="category_id"></x-form-error>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-600">Location</label>
            <input type="text" name="location" class="w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-300">
            <x-form-error name="location"></x-form-error>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-600">Estimated Time (hours)</label>
            <input type="number" name="time_estimate" class="w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-300" min="0" step="0.5" required>
            <x-form-error name="time_estimate"></x-form-error>
        </div>
        <div class="flex flex-col items-center gap-y-6">
            <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Create Task</button>
            <a href="/task/" class="text-sm font-semibold text-gray-900">Cancel</a>
        </div>
    </form>
</x-layout>