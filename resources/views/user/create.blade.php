@extends('backend.layouts.app')
@section('title', 'Create Account')

@push('after-scripts')
    @include('backend.includes.azmeer.btn_delete')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        #display_image {
            margin-top: 5px;
            width: 200px;
            height: 150px;
            border: 1px solid #a7a7a7;
            background-position: center;
            background-size: cover;
        }

    </style>
    <script>
        $('.js-example-basic-single').select2();
        $('.js-example-basic-double').select2();
    </script>
@endpush

@section('content')
    <x-forms.post :action="route('admin.account.store')" class="was-validated" id="myForm" enctype="multipart/form-data">
        <article class="card">
            <section class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">
                            Account <small class="text-muted mode_label">Create</small>
                        </h4>
                    </div>
                    <!--col-->

                    <div class="col-4">
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                            <a href="{{ url()->previous() }}" title="Close" class="btn btn-light btn-sm"><i
                                    class="fas fa-times"></i></a>
                        </div>
                        <!--btn-toolbar-->
                    </div>
                    <!--col-->
                </div>
                <!--card-header-actions-->
            </section>
            <!--card-header-->

            <section class="card-body">

                <div class="form-group row">
                    <label for="number" class="col-sm-2 col-form-label text-lg-right">Account No.</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="number" name="number" placeholder="Account No."
                            required />
                        @error('number')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bank" class="col-sm-2 col-form-label text-lg-right">Bank</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-single form-control" name='bank' id="bank" required>
                            <option value="">Select Bank</option>
                            @foreach ($all_banks as $one)
                                <option value="{{ $one->title }}">{{ $one->bank_code . ' - ' . $one->title }}</option>
                            @endforeach
                        </select>
                        @error('bank')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="branch" class="col-sm-2 col-form-label text-lg-right">Branch</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-double form-control" name='branch' id="branch" required>
                            <option value="">Select Branch</option>
                            @foreach ($all_branch as $one)
                                <option value="{{ $one }}">{{ $one }}</option>
                            @endforeach
                        </select>
                        @error('branch')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </section>
            <!--card-body-->
            <section class="card-footer">
                <div class="row">
                    <div class="col-sm-6">
                        <small><span class="text-danger">Red</span> boxes are mandatory. <span
                                class="text-success">Green</span> boxes are optional.</small>
                    </div>
                    <div class="col-sm-6 text-right">
                        @if (auth()->user()->roles[0]->name == 'Tenant admin' || auth()->user()->roles[0]->name == 'Administrator')
                            <button type="reset" class="btn btn-danger btn_reset" type="reset"
                                onClick="window.location.reload()">Reset</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        @endif
                    </div>
                </div>
            </section>
            <!--card-footer-->
        </article>
        <!--card-->
    </x-forms.post>

@endsection
