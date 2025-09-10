<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">
  </head>
  <body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/Blog-Logo.png') }}" alt="Bootstrap" width="30" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('posts.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search"/>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="container py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Done!',
        text: "{{ session('success') }}",
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: `{!! implode('<br>', $errors->all()) !!}`
    });
</script>
@endif

  </body>
</html>
