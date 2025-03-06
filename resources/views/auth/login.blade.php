<x-layout>
    <x-slot:heading>Login Page</x-slot:heading>
    <div>
        <!-- Your content -->
        <div class="w-full max-w-md p-8 mt-8 space-y-4 bg-white shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>
            <form action="/login" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" class="w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-300" value="{{ old('email') }}" required>
                    <x-form-error name="email"></x-form-error>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" name="password" class="w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-300" required>
                    <x-form-error name="email"></x-form-error>
                </div>
                <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Login</button>
            </form>
        </div>
    </div>
    
</x-layout>