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
{{-- @section('tombol')
<a href="{{route('tambah.spp')}}" class="btn btn-outline-light btn-rounded get-started-btn"><i class="mdi mdi-account-convert"></i> TAMBAH SPP</a>
@endsection --}}
@section('user')
@auth
<h5 class="mb-0 font-weight-normal"><b>{{ Auth::user()->name }}</b></h5>
@endauth
@section('TA')
@auth
<a class="nav-link btn btn-warning create-new-button text-dark" href="{{url('pembayaran')}}">TA {{$tahun[0]->tahun_ajar}}</a>
@endauth
@endsection
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
                    <table class="table shadow tabeldatapembayaran">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Nama Siswa</th>
                                <th class="text-white">Level</th>
                                <th class="text-white">Bulan Tagihan</th>
                                <th class="text-white">Tahun Ajar</th>
                                <th class="text-white">Status</th>
                                <th width="100px" class="text-white">Detail</th>
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