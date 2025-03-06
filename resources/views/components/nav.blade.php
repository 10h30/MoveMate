<nav>
    <ul class="flex space-x-6 items-center ">
        @guest
            <x-nav-link href="/login">Login</x-nav-link>
            <x-nav-link href="/register">Register</x-nav-link>
        @endguest
        @auth
            <x-nav-link type="button" href="/task/create">Create new task</x-nav-link>
            <form method="POST" action="/logout">
                @csrf
                  <x-form-button>Log Out</x-form-button>
              </form>
        @endauth
       
    </ul>
  </nav>