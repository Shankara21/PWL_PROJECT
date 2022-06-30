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
            <h4 class="card-title">Edit Bank</h4>
          </div>
          <div class="card-body">
            <form action="/dashboard/bank/{{ $bank->slug }}" method="POST" class="mb-5" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Nama Bank</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('nama') is-invalid
                                @enderror" id="name" name="name" required autofocus
                    value="{{ old('name', $bank->name) }}">
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="norek">Nomor Rekening</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('nama') is-invalid
                                  @enderror" id="norek" name="norek" required autofocus
                    value="{{ old('norek', $bank->norek) }}">
                  @error('norek')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label d-block">Gambar</label>
                <img src="@if ($bank -> image == null)
                                {{ asset('img/bank/'.$bank -> slug.'.png') }}
                                @else
                                {{asset('storage/'.$bank->image)}}
                                @endif" class="img-preview mb-3 " alt="{{ $bank -> nama }}" width="200px"
                  height="200px">
                <input class="form-control  @error('image') is-invalid
                                                    @enderror" type="file" id="image" name="image"
                  onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="row">
                <div class="col-4">
                  <button type="submit" class="btn btn-primary">Edit Bank</button>
                  <a href="/dashboard/bank" class="btn btn-danger">Kembali</a>
                </div>
              </div>
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