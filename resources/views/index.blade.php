<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body class="container p-6 " style="margin-top: 15%">
    <div class="card p-5 bg-light mt-5">
        <div class="d-flex justify-content-center mt-5">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <form method="post" class='form-horizontal' action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">@lang('E-mail Address')</label>
                        <div class="col-md-8">
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255"
                                required autofocus autocomplete="email" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">@lang('Password')</label>

                        <div class="col-md-8">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="{{ __('Password') }}" maxlength="100" required
                                autocomplete="current-password" />
                        </div>
                    </div>
                    <div class="form-group row mb-5 mt-5">
                        <div class="col-md-8 offset-md-4">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (session('status') == 'Login Unuccessful')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Login Unuccessful',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                toast: true,
            })
        </script>
    @endif
</body>
</html>
