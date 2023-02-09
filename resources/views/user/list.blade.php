<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<div class="container" style="margin-top: 5%">
    <div class="card">
        <div class="card-body">
            <section class="row">
                <aside class="col-6">
                    <h4 class="card-title mb-4">
                        User <small class="text-muted">List</small>
                    </h4>
                </aside>
                <!--col-->
                {{--
                <aside class="col-6">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        @if (auth()->user()->roles[0]->name == 'Tenant admin' || auth()->user()->roles[0]->name == 'Administrator')
                            <a href="{{ route('admin.account.create') }}" class="btn btn-success ml-1"
                                data-toggle="tooltip" title="Add New"><i class="fas fa-plus-circle"></i></a>
                        @endif
                    </div>
                </aside> --}}
            </section>

        </div>
    </div>
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
                                <td>{{ $one->name }}</td>
                                <td>{{ $one->name }}</td>
                                <td>{{ $one->name }}</td>
                                {{-- <td class="text-right">
                                            <button type="button" url="{{ route('admin.account.destroy', $one->id) }}"
                                                return_url="{{ route('admin.account.index') }}"
                                                class="btn btn-danger btn_deletes"><i class="fas fa-trash"></i></button>
                                        </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--col-->
    </section>
    <footer>
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
    </footer>
</div>

</body>

</html>
