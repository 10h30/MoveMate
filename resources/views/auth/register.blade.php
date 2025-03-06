<x-layout>
    <x-slot:heading>Register Page</x-slot:heading>
    <div>
        <!-- Your content -->
        <div class="w-full max-w-md p-8 space-y-4 bg-white shadow-lg rounded-lg">

        <form action="/register" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-600">Full Name</label>
                <input type="text" name="name" class="w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-300" >
                <x-form-error name="name"></x-form-error>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" class="w-full p-name2 mt-1 border rounded-md focus:ring focus:ring-blue-300" >
                <x-form-error name="email"></x-form-error>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" class="w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-300" >
                <x-form-error name="password"></x-form-error>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-300" >
                <x-form-error name="password_confirmation"></x-form-error>
            </div>
            <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Register</button>
        </form>
        </div>
    </div>
    
</x-layout>