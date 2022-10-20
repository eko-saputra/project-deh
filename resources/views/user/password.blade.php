@extends('layout')
@guest
<script>
    document.location.href = "{{url('login')}}";
</script>
@endguest
@section('photo-user')
@auth
<img class="img-xs rounded-circle " src="{{ asset('/storage/'.Auth::user()->photo.'')}}" alt="">
@endauth
@endsection
@section('user')
@auth
<h5 class="mb-0 font-weight-normal"><b>{{ Auth::user()->name }}</b></h5>
@endauth
@endsection
@section('content')
@auth
<div class="row">
    <div class="col-12 col-xl-12 col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{ route('password.action') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Password <span class="text-danger">*</span></label>
                        <input class="form-control text-light" type="password" name="old_password" />
                    </div>
                    <div class="mb-3">
                        <label>New Password <span class="text-danger">*</span></label>
                        <input class="form-control text-light" type="password" name="new_password" />
                    </div>
                    <div class="mb-3">
                        <label>New Password Confirmation<span class="text-danger">*</span></label>
                        <input class="form-control text-light" type="password" name="new_password_confirmation" />
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection