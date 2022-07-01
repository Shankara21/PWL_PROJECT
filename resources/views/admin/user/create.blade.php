@extends('admin.layout.main')
@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah User</h4>
                        </div>
                        <div class="card-body">
                            <form action="/dashboard/user" method="POST" class="mb-5" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama User</label>
                                    <input type="text" class="form-control form-control-lg @error('name') is-invalid
                                    @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                                    @error('name')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control form-control-lg @error('username') is-invalid
                                    @enderror" id="username" name="username" required autofocus value="{{ old('username') }}">
                                    @error('username')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control form-control-lg @error('email') is-invalid
                                    @enderror" id="email" name="email" required autofocus value="{{ old('email') }}">
                                    @error('email')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                    </div>
                                  <div class="mb-3">
                                    <label for="phone" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control form-control-lg @error('phone') is-invalid
                                    @enderror" id="phone" name="phone" required autofocus value="{{ old('phone') }}">
                                    @error('phone')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                    </div>
                                  <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="default-select form-control wide mb-3" name="gender">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                          </select>
                                      </div>
                                  <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                  @enderror
                                  <input id="address" type="hidden" name="address" value="{{ old('address') }}">
                                  <trix-editor input="address"></trix-editor>
                                    </div>
                                  <div class="mb-3">
                                    <label for="image" class="form-label">Foto</label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input class="form-control  @error('image') is-invalid
                                    @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                      </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control form-control-lg @error('password') is-invalid
                                        @enderror" id="password" name="password" required autofocus value="{{ old('password') }}">
                                        @error('password')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                      </div>
                                    <div class="mb-3">
                                        <label for="level" class="form-label">Level</label>
                                        <select class="default-select form-control wide mb-3" name="level">
                                            <option value="admin">Admin</option>
                                            <option value="customer">Customer</option>
                                          </select>
                                      </div>


                                  <button type="submit" class="btn btn-primary">Tambah User</button>
                                  <a href="/dashboard/user" class="btn btn-danger">Kembali</a>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault()
  })
    </script>
@endsection
