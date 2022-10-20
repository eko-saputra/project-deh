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
                @foreach($siswa as $s)
                @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{route('ubah.siswa.action')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <h5>PENDAFTARAN</h5>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="no">No Pendaftaran</label> <span class="text-danger">*</span></label>
                                <input type="hidden" name="id" value="{{$s->siswa_id}}">
                                <input type="text" class="form-control text-dark bg-warning" id="no" name="no" value="{{ $s->no_pendaftaran }}" placeholder="No Pendaftaran">
                            </div>
                            <div class="col">
                                <label for="level">Level</label> <span class="text-danger">*</span></label>
                                <select class="form-control text-light" id="level" name="level">
                                    @foreach($level as $l)
                                    <option value="{{$l->level_id}}" <?php echo $l->level_id == $s->level ? 'selected' : ''; ?>>{{$l->nama_level}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>Photo</label> <span class="text-danger">*</span></label>
                                <input type="file" name="photo" class="form-control">
                                <label class="text-muted mt-2"><i>Abaikan jika tidak ada perubahan photo</i></label>
                            </div>
                            <div class="col">
                                <img src="{{ asset('storage/'.$s->photo.'')}}" class="img-thumbnail" width="200">
                            </div>
                        </div>
                    </div>
                    <h5>DATA SISWA</h5>
                    <hr>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-light" id="nama" name="nama" value="{{ $s->nama_lengkap }}" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col"><label for="tempat">Tempat Lahir</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="tempat" name="tempat" value="{{ $s->tempat_lahir }}" placeholder="Tempat Lahir">
                            </div>
                            <div class="col"><label for="tgl">Tanggal Lahir</label> <span class="text-danger">*</span></label>
                                <input type="date" class="form-control text-light" id="tgl" name="tgl" value="{{ $s->tgl_lahir }}" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="gender">Gender</label> <span class="text-danger">*</span></label>
                                <select class="form-control text-light" id="gender" name="gender">
                                    <option <?php echo $s->gender == "Laki - laki" ? 'selected' : ''; ?>>Laki - laki</option>
                                    <option <?php echo $s->gender == "Perempuan" ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="agama">Agama</label> <span class="text-danger">*</span></label>
                                <select class="form-control text-light" id="agama" name="agama">
                                    <option <?php echo $s->agama == "Islam" ? 'selected' : ''; ?>>Islam</option>
                                    <option <?php echo $s->agama == "Kristen" ? 'selected' : ''; ?>>Kristen</option>
                                    <option <?php echo $s->agama == "Katolik" ? 'selected' : ''; ?>>Katolik</option>
                                    <option <?php echo $s->agama == "Hindu" ? 'selected' : ''; ?>>Hindu</option>
                                    <option <?php echo $s->agama == "Budha" ? 'selected' : ''; ?>>Budha</option>
                                    <option <?php echo $s->agama == "Konghucu" ? 'selected' : ''; ?>>Konghucu</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="alamat">Alamat</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="alamat" name="alamat" value="{{ $s->alamat }}" placeholder="Alamat">
                            </div>
                        </div>
                    </div>
                    <h5>DATA SEKOLAH ASAL</h5>
                    <hr>
                    <div class="form-group">
                        <label for="sa">Sekolah Asal</label> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-light" id="sa" name="sa" value="{{ $s->sekolah_asal }}" placeholder="Sekolah Asal">
                    </div>
                    <div class="form-group">
                        <label for="ksa">Kelas Sekolah Asal</label> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-light" id="ksa" name="ksa" value="{{ $s->kelas_sa }}" placeholder="Kelas Sekolah Asal">
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="n_ayah">Nama Ayah</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="n_ayah" name="n_ayah" value="{{ $s->nama_ortu_ayah }}" placeholder="Nama Ayah">
                            </div>
                            <div class="col">
                                <label for="k_ayah">Pekerjaan Ayah</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="k_ayah" name="k_ayah" value="{{ $s->kerja_ortu_ayah }}" placeholder="Pekerjaan Ayah">
                            </div>
                            <div class="col">
                                <label for="no_ayah">No Hp Ayah</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="no_ayah" name="no_ayah" value="{{ $s->no_ortu_ayah }}" placeholder="No Hp Ayah">
                            </div>
                        </div>
                    </div>
                    <h5>DATA ORANG TUA</h5>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="n_ibu">Nama Ibu</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="n_ibu" name="n_ibu" value="{{ $s->nama_ortu_ibu }}" placeholder="Nama Ibu">
                            </div>
                            <div class="col">
                                <label for="k_ibu">Pekerjaan Ibu</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="k_ibu" name="k_ibu" value="{{ $s->kerja_ortu_ibu }}" placeholder="Pekerjaan Ibu">
                            </div>
                            <div class="col">
                                <label for="no_ibu">No Hp Ibu</label> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-light" id="no_ibu" name="no_ibu" value="{{ $s->no_ortu_ibu }}" placeholder="No Hp Ibu">
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