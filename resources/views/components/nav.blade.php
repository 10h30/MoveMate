<nav>
    <ul class="flex space-x-6 items-center ">
        @guest
            <x-nav-link href="/login">Login</x-nav-link>
            <x-nav-link href="/register">Register</x-nav-link>
        @endguest
        @auth
            <p class="text-sm text-bold">Welcome back, {{ Auth::user()->name }}</p>
            <form method="POST" action="/logout">
                @csrf
                  <x-form-button>Log Out</x-form-button>
              </form>
        @endauth
       
    </ul>
  </nav>