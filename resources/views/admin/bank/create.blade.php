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
                            <h4 class="card-title">Tambah Bank</h4>
                        </div>
                        <div class="card-body">
                            <form action="/dashboard/bank" method="POST" class="mb-5" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="name">Nama Bank</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid
                                    @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
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
                                      <input type="text" class="form-control @error('norek') is-invalid
                                      @enderror" id="norek" name="norek" required autofocus value="{{ old('norek') }}">
                                      @error('norek')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input class="form-control  @error('image') is-invalid
                                    @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                  </div>
                                    <div class="row justify-content-end">
                                  <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah Bank</button>
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

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault()
  })
    </script>
@endsection
