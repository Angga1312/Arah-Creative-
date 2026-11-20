<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — ARAH Creative</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/arah-theme.css') }}">
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100" style="background-color: #121419;">
    <div class="container" style="max-width: 480px;">
        <div class="text-center mb-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="ARAH Creative" height="38" class="mb-3">
            </a>
            <h4 class="text-white font-heading fw-bold mb-1">Admin Authentication</h4>
            <p class="text-secondary small" style="color: #8E95A5 !important;">
                Masuk ke panel manajemen konten PT Arah Kreasi Digital
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show p-3 rounded-3 mb-4" role="alert" style="background-color: rgba(198, 243, 107, 0.15); border: 1px solid #C6F36B; color: #FFFFFF;">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger p-3 rounded-3 mb-4 border-0" style="background-color: rgba(239, 68, 68, 0.15); border: 1px solid #EF4444 !important; color: #FCA5A5;">
                <ul class="mb-0 ps-3 small">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="p-4 p-md-5 rounded-4" style="background-color: #17191F; border: 1px solid #282E3D; box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
            <form action="{{ route('admin.login.submit') }}" method="POST" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label-editorial">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text border-editorial" style="background-color: #1D212A; color: #8E95A5;">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" 
                               class="form-control form-control-editorial @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', 'admin@arahcreative.com') }}" 
                               required 
                               autofocus>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label-editorial">Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-text border-editorial" style="background-color: #1D212A; color: #8E95A5;">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" 
                               class="form-control form-control-editorial @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               value="password123"
                               required>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                        <label class="form-check-label small text-secondary" for="remember">
                            Ingat sesi saya
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-accent w-100 py-3 justify-content-center fs-6">
                    Masuk ke Dashboard <i class="bi bi-arrow-right ms-2"></i>
                </button>
            </form>

            <!-- Demo Account Info Box -->
            <div class="mt-4 p-3 rounded-3" style="background-color: #121419; border: 1px dashed #2B313E;">
                <div class="d-flex align-items-center gap-2 mb-1 text-accent small fw-bold font-heading">
                    <i class="bi bi-info-circle-fill"></i> Akun Demo Seeder:
                </div>
                <div class="text-secondary" style="font-size: 0.82rem; color: #8E95A5 !important;">
                    <strong>Email:</strong> <code>admin@arahcreative.com</code><br>
                    <strong>Password:</strong> <code>password123</code>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-secondary small text-decoration-none">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Utama Website
            </a>
        </div>
    </div>
</body>
</html>
