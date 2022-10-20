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
<a href="{{route('tambah.siswa')}}" class="btn btn-outline-light btn-rounded get-started-btn"><i class="mdi mdi-account-plus"></i> TAMBAH SISWA</a>
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
                @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                <div class="p-3 border">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 m-auto text-center">
                                <label for="noreg" class="font-weight-bold">NO PENDAFTARAN</label>
                                <input type="number" class="form-control form-control-lg text-light" name="noreg" id="noreg" value="{{old('noreg')}}" placeholder="Masukkan no pendaftaran" autofocus required>
                            </div>
                        </div>
                    </div>
                    <div id="gagal" class="text-danger text-center" style="display: none;">Data <b>Siswa</b> tidak ditemukan!</div>
                    <div id="box_hasil" style="display: none;">
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="card corona-gradient-card">
                                    <div class="card-body text-center">
                                        <img src="" width="50%" class="img-thumbnail" id="photo">
                                        <p>
                                        <h3 style="text-transform: uppercase;">DATA SISWA</h3>
                                        <h3 style="text-transform: uppercase;" id="no-reg"></h3>
                                        <h4 style="text-transform: uppercase;" id="nama"></h4>
                                        <h6 class="text-success font-weight-bold" style="text-transform: uppercase;" id="status"></h6>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <h4>Tagihan SPP Bulanan ({{$tahun[0]->tahun_ajar}})</h4>
                                <div class="card">
                                    <div class="card-body" id="tagihan">
                                        
                                    </div>
                                </div>
                                <hr>
                                <ul>
                                    <li class="text-success">Hijau : Sudah membayar</li>
                                    <li class="text-danger">Merah : Belum membayar</li>
                                </ul>
                            </div>
                            <div class="col">
                                <h4>Pembayaran Detail</h4>
                                <div class="card">
                                    <div class="card-body bg-light text-muted rounded">
                                        <div class="rincian text-dark">
                                            <span class="text-muted" id="info">klik bulan untuk bayar!</span>
                                        </div>
                                        <hr>
                                        <h1 id="tb"></h1>
                                        <h3 id="bs"></h3>
                                        <h3 id="bayar" style="color:white;"></h3>
                                        <p class="text-center mt-5" style="display:none;" id="tombol">
                                            <!-- <form action=""> -->
                                            <button onclick="ok();" class="btn btn-primary btn-lg">Lanjutkan Pembayaran</button>
                                            <!-- </form> -->
                                        </p>
                                    </div>
                                </div>
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