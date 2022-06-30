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
            <h4 class="card-title">Edit Kendaraan</h4>
          </div>
          <div class="card-body">
            <form action="/dashboard/kendaraan/{{$kendaraan->slug}}" method="POST" class="mb-5"
              enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Kendaraan</label>
                <input type="text" class="form-control form-control-lg @error('nama') is-invalid
                                    @enderror" id="nama" name="nama" required autofocus
                  value="{{ old('nama', $kendaraan->nama) }}">
                @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <select class="default-select form-control wide mb-3" name="brand_id">
                  @foreach ($brands as $brand)
                  <option value="{{ $brand->id }}" {{ $kendaraan->brand_id == $brand->id ? 'selected' : '' }}>
                    {{ $brand->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="default-select form-control wide mb-3" name="category_id">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ $kendaraan->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="type" class="form-label">Tipe</label>
                <select class="default-select form-control wide mb-3" name="type_id">
                  @foreach ($types as $type)
                  <option value="{{ $type->id }}" {{ $kendaraan->type_id == $type->id ? 'selected' : '' }}>
                    {{ $type->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="warna" class="form-label">Warna Kendaraan</label>
                <input type="text" class="form-control form-control-lg @error('warna') is-invalid
                                    @enderror" id="warna" name="warna" required autofocus
                  value="{{ old('warna', $kendaraan->warna) }}">
                @error('warna')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="tahun" class="form-label">Tahun Kendaraan</label>
                <input type="text" class="form-control form-control-lg @error('tahun') is-invalid
                                    @enderror" id="tahun" name="tahun" required autofocus
                  value="{{ old('tahun', $kendaraan->tahun) }}">
                @error('tahun')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">Harga Sewa</label>
                <input type="text" class="form-control form-control-lg @error('harga') is-invalid
                                    @enderror" id="harga" name="harga" required autofocus
                  value="{{ old('harga', $kendaraan->harga) }}">
                @error('harga')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="image" class="form-label d-block">Gambar</label>
                <img src="@if ($kendaraan -> image == null)
                                    {{ asset('img/kendaraan/'.$kendaraan -> slug.'.png') }}
                                    @else
                                    {{asset('storage/'.$kendaraan->image)}}
                                    @endif" class="img-preview mb-3 " alt="{{ $kendaraan -> nama }}" height="200px"
                  height="250px">
                <input class="form-control  @error('image') is-invalid
                                    @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                @error('deskripsi')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="deskripsi" type="hidden" name="deskripsi"
                  value="{{ old('deskripsi', $kendaraan->deskripsi) }}">
                <trix-editor input="deskripsi"></trix-editor>
              </div>

              <button type="submit" class="btn btn-primary">Edit Kendaraan</button>
              <a href="/dashboard/kendaraan" class="btn btn-danger">Kembali</a>
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