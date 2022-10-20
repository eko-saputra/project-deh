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
                @foreach($user as $u)
                @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{route('pengaturan.action')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Nama</label> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-light" id="exampleInputName1" name="nama" value="{{ $u->name }}" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Username</label> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-light" id="exampleInputUsername1" name="username" value="{{ $u->username }}" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>File upload</label> <span class="text-danger">*</span></label>
                                <input type="file" name="photo" class="form-control text-light">

                                <p class="card-text text-muted">Abaikan photo jika tidak ada perubahan!</p>
                            </div>
                            <div class="col text-center">
                                <div class="text-center"><img src="{{ asset('storage/'.$u->photo.'')}}" class="img-thumbnail" width="200"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endauth
@endsection