@extends('admin.layout.main')
@section('content')
<div class="content-body">
    <div class="container">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Brands</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Brands</h4>
                        <div><a href="/dashboard/brand/create" class="btn btn-primary">
                                <i class="fas fa-plus"> Tambah Data</i>
                            </a></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 1000px">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="checkAll"
                                                    required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Image</th>
                                        <th>Nama Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2"
                                                    required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td><img src="https://source.unsplash.com/250x250/?car,{{ $brand -> nama }}"
                                                alt="" style="object-fit: cover" class="rounded"></td>
                                        <td>{{ $brand->nama }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/dashboard/brand/{{$brand->slug}}/edit"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>

                                                        <form action="/dashboard/brand/{{ $brand->slug }}" method="POST" class="d-inline"
                                                            id="data-{{ $brand->slug }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger shadow btn-xs sharp me-1 delete" data-name="{{ $brand->name }}"
                                                              data-slug="{{ $brand->slug }}"><i class='fa fa-trash'></i></button>
                                                          </form>

                                            </div>
                                        </td>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

@section('sweetAlert')
<script>
    const deleteButton = document.querySelectorAll('.delete');
      deleteButton.forEach((dBtn) => {
          dBtn.addEventListener('click', function (event) {
              event.preventDefault();

              const postSlug = this.dataset.slug;
              const postTitle = this.dataset.name;
              Swal.fire({
                  title: 'Anda Yakin Menghapus Brand Ini ?',
                  text: "Data Brand : " + postTitle,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, Hapus!'
                      }).then((result) => {
                          if (result.isConfirmed) {
                              const dataSlug = document.getElementById('data-' + postSlug);
                              dataSlug.submit();
                          }
              })
          })
      });
  </script>
@endsection
@endsection
