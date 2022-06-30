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
            <h4 class="card-title">Edit User</h4>
          </div>
          <div class="card-body">
            <form action="/dashboard/user/{{$user->id}}" method="POST" class="mb-5" enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="mb-3">
                <label class="form-label" for="name">Nama User</label>
                <input type="text" class="form-control form-control-lg @error('name') is-invalid
                  @enderror" id="name" name="name" placeholder="Nama User" value="{{ old('name', $user->name) }}" />
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="username">Username</label>

                <input type="text" class="form-control form-control-lg  @error('username') is-invalid
                    @enderror" id="username" name="username" placeholder="Username"
                  value="{{ old('username', $user->username) }}" />
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="text" class="form-control form-control-lg @error('email') is-invalid
                  @enderror" id="email" name="email" placeholder="email" value="{{ old('email', $user->email) }}" />
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="phone">No Telepon</label>

                <input type="text" class="form-control form-control-lg @error('phone') is-invalid
                  @enderror" id="phone" name="phone" placeholder="phone" value="{{ old('phone', $user->phone) }}" />
                @error('phone')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="Gender">Jenis Kelamin</label>

                <select class="default-select form-control wide mb-3" name="gender">
                  <option value="Laki-Laki" {{  $user->gander == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                  <option value="Perempuan" {{  $user->gander == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="address" type="hidden" name="address" value="{{ old('address', $user->address) }}">
                <trix-editor input="address"></trix-editor>
              </div>
              <div class="mb-3">
                <label class="form-label" for="Image">Image</label>

                <input type="hidden" name="oldImage" value="{{ $user->image }}">
                @if ($user->image)
                <img src="{{asset('storage/'.$user->image)}}" class="img-preview img-fluid mb-3 " alt="" height="200px"
                  width="200px">
                @else
                <img class="img-preview img-fluid" width="200px" height="200px">
                @endif
                <div class="pt-3">
                  <input class=" form-control form-control-lg @error('image') is-invalid @enderror" type="file"
                    id="image" name="image" onchange="previewImage()">
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label" for="Level">Level</label>

                <select class="default-select form-control wide mb-3" name="level">

                  <option value="admin" {{  $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="customer" {{  $user->level == 'customer' ? 'selected' : '' }}>Customer</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Edit User</button>
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
</script>
@endsection