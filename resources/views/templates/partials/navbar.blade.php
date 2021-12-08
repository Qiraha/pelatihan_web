<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('notes.index')}}">Notes App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" >
        <li>
            <a class="nav-link text-dark" href="#">Login as {{Auth::user()->fullname ?? ' '}}</a>
        </li>
          @auth
          <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="d-inline nav-link border-0 bg-transparent">Logout</button>
            </form>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link text-dark" href="/login">Login</a>
          </li>
          @endguest

      </ul>
    </div>
  </div>
</nav>
