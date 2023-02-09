<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>
<script>
    $(function() {
        $('.btn_delete').on('click', function() {
            var url = $(this).attr('url');
            Swal.fire({
                icon: 'question',
                title: 'Are you sure you want to delete this item?',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(v => {
                console.log(v.value);
                if (v.value) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _method: 'delete',
                            _token: '@php echo csrf_token(); @endphp'
                        }
                    })
                    location.reload()
                }
            });
        })
    });
</script>
<div class="container" style="margin-top: 5%">
    <article class="card">
        <section class="card-header">
            <div class="row">
                <div class="col-5"></div>
                <form method="post" class='col-2 form-horizontal float-right' action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Log Out</button>
                </form>
            </div>
            <section class="row mt-2">
                <aside class="col-10">
                    <h4 class="card-title mb-4">
                        User <small class="text-muted">List</small>
                    </h4>
                </aside>
                <aside class="col-2 float-right">
                    <button class="btn btn-warning" role="toolbar" aria-label="Toolbar with button groups">
                        <a href="{{ url('user/create') }}" data-toggle="tooltip" title="Add New">Add</i></a>
                    </button>
                </aside>
            </section>
        </section>
        <section class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="dtable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>Home Address</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $one)
                                <tr>
                                    <td>{{ $one->name }}</td>
                                    <td>{{ $one->email }}</td>
                                    <td>{{ $one->phone }}</td>
                                    <td>{{ $one->address }}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group" aria-label="user_actions">
                                            <a href="{{ url('user') }}/{{ $one->id }}" data-toggle="tooltip"
                                                data-placement="top" title="View" class="btn btn-info">View</i>
                                            </a>
                                            <button type="button" url="{{ route('user.destroy', $one->id) }}"
                                                class="btn btn-danger btn_delete">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--col-->
        </section>
        <section class="card-footer">
            <section class="row">
                <div class="col-7">
                    <div class="float-right">
                        {{ $users->total() }} {{ Str::plural('user', $users->total()) }}
                    </div>
                </div>
                <div class="col-5">
                    <div class="float-right">
                        {!! $users->render() !!}
                    </div>
                </div>
            </section>
        </section>
    </article>
</div>
@if (session('status') == 'User added')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'User Creation Successful',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            toast: true,
        })
    </script>
@endif
@if (session('status') == 'User updated')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'User Updation Successful',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            toast: true,
        })
    </script>
@endif
@if (session('status') == 'User not added')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'User Creation Unuccessful',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            toast: true,
        })
    </script>
@endif
@if (session('status') == 'User not updated')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'User Updation Unuccessful',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            toast: true,
        })
    </script>
@endif
</body>

</html>
