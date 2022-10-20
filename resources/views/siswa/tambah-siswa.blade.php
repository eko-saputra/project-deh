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
                @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{route('tambah.siswa.action')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <h5>PENDAFTARAN</h5>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="no">No Pendaftaran</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-dark bg-warning" id="no" name="no" value="{{ old('no') }}" placeholder="No Pendaftaran">
                            </div>
                            <div class="col">
                                <label for="level">Level</label> <span class="text-danger">*</span></label>
                                <select class="form-control text-light" id="level" name="level">
                                    @foreach($level as $l)
                                    <option value="{{$l->level_id}}">{{$l->nama_level}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>Photo</label> <span class="text-danger">*</span></label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                        </div>
                    </div>
                    <h5>DATA SISWA</h5>
                    <hr>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-light" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col"><label for="tempat">Tempat Lahir</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="tempat" name="tempat" value="{{ old('tempat') }}" placeholder="Tempat Lahir">
                            </div>
                            <div class="col"><label for="tgl">Tanggal Lahir</label> <span class="text-danger">*</span></label>
                                <input type="date" class="form-control text-light" id="tgl" name="tgl" value="{{ old('tgl') }}" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="gender">Gender</label> <span class="text-danger">*</span></label>
                                <select class="form-control text-light" id="gender" name="gender">
                                    <option>Laki - laki</option>
                                    <option>Perempuanß</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="agama">Agama</label> <span class="text-danger">*</span></label>
                                <select class="form-control text-light" id="agama" name="agama">
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Katolik</option>
                                    <option>Hindu</option>
                                    <option>Budah</option>
                                    <option>Konghucu</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="alamat">Alamat</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat">
                            </div>
                        </div>
                    </div>
                    <h5>DATA SEKOLAH ASAL</h5>
                    <hr>
                    <div class="form-group">
                        <label for="sa">Sekolah Asal</label> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-light" id="sa" name="sa" value="{{ old('sa') }}" placeholder="Sekolah Asal">
                    </div>
                    <div class="form-group">
                        <label for="ksa">Kelas Sekolah Asal</label> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-light" id="ksa" name="ksa" value="{{ old('ksa') }}" placeholder="Kelas Sekolah Asal">
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="n_ayah">Nama Ayah</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="n_ayah" name="n_ayah" value="{{ old('n_ayah') }}" placeholder="Nama Ayah">
                            </div>
                            <div class="col">
                                <label for="k_ayah">Pekerjaan Ayah</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="k_ayah" name="k_ayah" value="{{ old('k_ayah') }}" placeholder="Pekerjaan Ayah">
                            </div>
                            <div class="col">
                                <label for="no_ayah">No Hp Ayah</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="no_ayah" name="no_ayah" value="{{ old('no_ayah') }}" placeholder="No Hp Ayah">
                            </div>
                        </div>
                    </div>
                    <h5>DATA ORANG TUA</h5>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="n_ibu">Nama Ibu</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="n_ibu" name="n_ibu" value="{{ old('n_ibu') }}" placeholder="Nama Ibu">
                            </div>
                            <div class="col">
                                <label for="k_ibu">Pekerjaan Ibu</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="k_ibu" name="k_ibu" value="{{ old('k_ibu') }}" placeholder="Pekerjaan Ibu">
                            </div>
                            <div class="col">
                                <label for="no_ibu">No Hp Ibu</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="no_ibu" name="no_ibu" value="{{ old('no_ibu') }}" placeholder="No Hp Ibu">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection