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
                    <table class="table table-white shadow tabelsiswa">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Nama</th>
                                <th class="text-white">Tempat Lahir</th>
                                <th class="text-white">Tgl Lahir</th>
                                <th class="text-white">Gender</th>
                                <th class="text-white">Alamat</th>
                                <th class="text-white">Sekolah Asal</th>
                                <th width="100px" class="text-white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection