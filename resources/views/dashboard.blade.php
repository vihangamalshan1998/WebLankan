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
                <H5>Welcome To Web Lankan</H5>
                <div class="form-group row mb-5 mt-5">
                    <div class="col-md-8 offset-md-4">
                        <button class="btn btn-warning"><a style="text-decoration: none;"
                                href="{{ url('user') }}"> User
                                List</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('status') == 'Login Successful')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Login Successful',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                toast: true,
            })
        </script>
    @endif
</body>

</html>
