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
@section('tombol')
<a href="{{route('data.spp')}}" class="btn btn-outline-light btn-rounded get-started-btn"><i class="mdi mdi-account-convert"></i> DATA SPP</a>
@endsection
@section('user')
@auth
<h5 class="mb-0 font-weight-normal"><b>{{ Auth::user()->name }}</b></h5>
@endauth
@endsection
@section('TA')
@auth
<a class="nav-link btn btn-warning create-new-button text-dark" href="{{url('pembayaran')}}">TA {{$tahun[0]->tahun_ajar}}</a>
@endauth
@endsection
@section('content')
@auth
<div class="row">
    <div class="col-12 col-xl-12 col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @foreach($spp as $s)
                @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{route('ubah.spp.action')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nominal">Nominal</label> <span class="text-danger">*</span></label>
                        <input type="hidden" name="id" value="{{$s->spp_id}}">
                        <input type="text" class="form-control text-light" id="nominal" name="nominal" value="{{ $s->nominal }}" placeholder="Level">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="ta">Tahun Ajaran</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="ta" name="ta" value="{{ $s->tahun_ajar }}" placeholder="Tahun Ajaran">
                            </div>
                            <div class="col">
                                <br>
                                <i class="text-muted">Contoh Format : 2022/2023</i>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endauth
@endsection