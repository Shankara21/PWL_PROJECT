@extends('admin.layout.main')
@section('content')
<div class="content-body">
    <div class="container">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Tipe</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tipe</h4>
                        <div><a href="/dashboard/type/create" class="btn btn-primary">
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
                                        <th>Nama Tipe</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $type)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2"
                                                    required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>{{ $type->nama }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/dashboard/type/{{$type->slug}}/edit"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                        <form action="/dashboard/type/{{ $type->slug }}" method="POST" class="d-inline"
                                                            id="data-{{ $type->slug }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger shadow btn-xs sharp me-1 delete" data-name="{{ $type->name }}"
                                                              data-slug="{{ $type->slug }}"><i class='fa fa-trash'></i></button>
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
                  title: 'Anda Yakin Menghapus Tipe Ini ?',
                  text: "Data Tipe : " + postTitle,
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
