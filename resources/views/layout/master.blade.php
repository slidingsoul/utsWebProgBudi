<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Master Template')</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.js') }}"></script>

</head>
<body>
  {{-- This one is a navbar --}}
  {{-- <p>{{ auth()->user()}}</p> --}}
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Portofolio Generator</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth
          <li class="nav-item">
            <a class="nav-link" href="/createPortofolio">Create Your Portofolio</a>
          </li>
            @if(auth()->user()->portofolio()->exists())
            <li class="nav-item">
                <a class="nav-link" href="/your">Your Portofolio</a>
            </li>
            @endif
          @else
          <li class="nav-item">
            <a class="nav-link" href="/loginRegister">Login/Register</a>
          </li>
          @endauth
        </ul>

        @auth
        <div class="d-flex">
          <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger me-2">Logout</button>
          </form>
        </div>
        @endauth
      </div>
    </div>
  </nav>
  @yield('content')
</body>
</html>