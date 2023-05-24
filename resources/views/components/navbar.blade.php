<nav class="navbar navbar-expand-lg  bg-primary shadow mb-3" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="/">Kertas Jaya</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse d-flex navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ ($title === "Administrator") ? 'active' : '' }}" href="/administrator">Administration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Absensi") ? 'active' : '' }}" href="/absensi">Absensi</a>
            </li>    
        </ul>

        @auth
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none text-light" href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                </li>
            </ul>
        @else
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-link text-decoration-none text-light" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                </li>
            </ul>
        @endauth

        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <form action="/login" method="post">
        @csrf
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}" @error('email') is-invalid @enderror>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </form>
</div>