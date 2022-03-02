@extends('dashboard.layouts.main')

@section('container')
<body>
  {{-- <a href="/dashboard/users" class="btn btn-primary mb-3">Kembali</a> --}}
  <h1 class="mb-4">Ubah Data User</h1>

  <div class="container">
    <div class="card">
    <div class="card-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3 p-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if ($user->foto)
                                <img src="{{ asset('storage/' . $user->foto) }}" class="img-responsive rounded-circle mb-3" id="imgPreview" width="200" height="200">
                            @else
                                <img src="{{ asset('assets/img/foto_profile.png') }}" class="img-responsive rounded-circle mb-3" id="imgPreview" width="200" height="200">
                            @endif
                            <div class="mt-3">
                              <form action="/dashboard/user/setting/update" method="POST" enctype="multipart/form-data">
                                @method('post')
                                @csrf
                                  <input type="hidden" name="oldImage" value="{{ $user->foto }}">
                                  <input type="file" name="foto" accept="image/*" id="foto" onchange="previewPhoto()" hidden>
                                  <input type="button" value="Ganti Foto" class="btn btn-outline-secondary" onclick="document.getElementById('foto').click(); ">
                                {{-- </form> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 p-3">
                {{-- <div class="card mb-3 shadow-sm p-3 mb-5 bg-body rounded">
                    <div class="card-body"> --}}
                        {{-- <form action="/dashboard/user/setting/{{ $user->username }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf --}}
                            <div class="col-sm-12 mb-3">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Inputkan username" readonly value="{{ old('username', $user->username) }}">
                              @error('username')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="col-sm-12 mb-3">
                              <label for="no_karyawan" class="form-label">No. Karyawan</label>
                              <input type="text" name="no_karyawan" class="form-control @error('no_karyawan') is-invalid @enderror" id="no_karyawan" placeholder="Inputkan nomor karyawan" required value="{{ old('no_karyawan',$user->no_karyawan) }}" disabled>
                              @error('no_karyawan')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="col-sm-12 mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required value="{{ old('email', $user->email) }}">
                              @error('email')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                            <div class="col-sm-12 mb-3">
                              <label for="nama" class="form-label">Nama</label>
                              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Inputkan nama" required value="{{ old('nama', $user->nama) }}">
                              @error('nama')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="col-sm-12 mb-3">
                              <label for="no_hp" class="form-label">No. Hp</label>
                              <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Inputkan nomor hp" required value="{{ old('no_hp',$user->no_hp) }}">
                              @error('no_hp')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="col-sm-12 mb-4">
                              <label for="alamat" class="form-label">Alamat</label>
                              <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Inputkan alamat" required value="{{ old('alamat', $user->alamat) }}">
                              @error('alamat')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    {{-- </div>
                </div> --}}
            </div>
        </div>
    </div>
  </div>
</div>
</body>

<script>
  function previewPhoto(){
    const photo = document.querySelector('#foto');
    const photoPreview = document.querySelector('#imgPreview');

    photoPreview.style.display = 'block';
    
    const oFReader = new FileReader();
    oFReader.readAsDataURL(photo.files[0]);
    oFReader.onload = function(oRFEvent){
      photoPreview.src = oRFEvent.target.result
    }
  }
</script>
   
@endsection