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
<a href="{{route('data.siswa')}}" class="btn btn-outline-light btn-rounded get-started-btn"><i class="mdi mdi-account-multiple"></i> DATA SISWA</a>
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
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 corona-gradient-card">
                            <div class="card-body text-center">
                                @foreach($siswa as $s)
                                <img src="{{ asset('storage/'.$s->photo.'')}}" class="img-thumbnail" width="200">
                                <p>
                                <h5 class=" card-title">BIODATA SISWA</h5>
                                <b>{{Str::upper($s->nama_lengkap)}}</b>
                                <hr>
                                {{$s->tempat_lahir}}, {{$s->tgl_lahir}} | {{$s->gender}} | {{$s->agama}}
                                <hr>
                                {{$s->alamat}}
                                </p>
                                <hr>
                                <p class="card-text"><i>Terdaftar {{$s->created_at}}</i></p>
                                <p class="card-text"><i>Terupdate {{$s->updated_at}}</i></p>
                            </div>
                            <div class="card-footer">
                                <a href="{{url('ubah-siswa')}}/{{$s->siswa_id}}" class="btn btn-success">Ubah</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title text-muted">Daftar Tagihan SPP {{$tahun[0]->tahun_ajar}}</h5>
                                @foreach($tagihan as $t)
                                <button class="btn btn-<?php echo $t->status == 0 ? 'danger' : 'success'; ?> m-2">{{$t->bulan}}</button>
                                @endforeach
                            </div>
                            <hr>
                            <ul>
                                <li class="text-success">Hijau : Sudah membayar</li>
                                <li class="text-danger">Merah : Belum membayar</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title text-muted"><i class="mdi mdi-table-edit"></i> Catatan Prestasi</h5>
                                <p class="card-text text-muted">Anaknya cerdas dan giat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection