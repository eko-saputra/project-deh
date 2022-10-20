@extends('app')
@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper rounded-lg">
    <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
                <div class="card-body px-5 py-5">
                    <h3 class="card-title text-left mb-3">Register</h3>
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                    @endif
                    <form action="{{ route('register.action') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Name <span class="text-danger">*</span></label>
                            <input class="form-control text-light" type="text" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="mb-3">
                            <label>Username <span class="text-danger">*</span></label>
                            <input class="form-control text-light" type="username" name="username" value="{{ old('username') }}" />
                        </div>
                        <div class="mb-3">
                            <label>Password <span class="text-danger">*</span></label>
                            <input class="form-control text-light" type="password" name="password" />
                        </div>
                        <div class="mb-3">
                            <label>Password Confirmation<span class="text-danger">*</span></label>
                            <input class="form-control text-light" type="password" name="password_confirm" />
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Register</button>
                            <a class="btn btn-danger" href="{{ route('dashboard') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- row ends -->
</div>
<!-- page-body-wrapper ends -->
<!-- </div> -->
<!-- container-scroller -->
@endsection