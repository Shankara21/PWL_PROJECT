@extends('homepage.layouts.main')

@section('content')
<div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Profile</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Profile User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button class="btn btn-warning align-self-end" id="edit" onclick="edit()">Edit profile <i
                        class="fas fa-edit"></i></button>
                <button class="btn btn-danger align-self-end d-none" id="back" onclick="back()">Batal <i
                        class="fas fa-times"></i></button>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-12 text-center pt-3">
                    <img src="@if ($user -> image)
                        {{ asset('storage/'.$user -> image) }}
                        @elseif($user -> gender == 'Perempuan')
                        {{ asset('img/woman.png') }}
                        @elseif($user -> gender == 'Laki-laki')
                        {{ asset('img/man.png') }}
                        @else
                        {{ asset('img/user.png') }}
                    @endif" alt="" width="250px" class="rounded-circle img-thumbnail mb-3">
                    <h4 id="username">{{ $user -> username }}</h4>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 text-start d-none" id="update">
                            <label for="formFile" class="form-label">Update Foto</label>
                            <input class="form-control" value="{{ $user -> image }}" type="file" id="formFile"
                                name="image">
                            <input type="hidden" name="oldImage" value="{{ $user -> image }}">
                        </div>
                </div>
                <div class="col-lg-9 col-sm-12">

                    <div class="bio">
                        <div class="row p-5">
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <div class="card" style="border: none">
                                    <label for="">Nama</label>
                                    <h4>{{ $user -> name }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <div class="card" style="border: none">
                                    <label for="">Username</label>
                                    <h4>{{ $user -> username }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <div class="card" style="border: none">
                                    <label for="">Phone</label>
                                    <h4>{{ $user -> phone }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <div class="card" style="border: none">
                                    <label for="">Jenis Kelamin</label>
                                    <h4>{{ $user -> gender }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <div class="card" style="border: none">
                                    <label for="">Alamat</label>
                                    <h4>{{ $user -> address }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <div class="card" style="border: none">
                                    <label for="">Alamat Email</label>
                                    <h4>{{ $user -> email }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form d-none">

                        <div class="row">
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" class="form-control" value="{{ $user -> name }}"
                                    id="exampleInputEmail1" name="name">
                            </div>
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" class="form-control" value="{{ $user -> username }}"
                                    id="exampleInputEmail1" name="username">
                            </div>
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <label for="exampleInputEmail1" class="form-label">No HP</label>
                                <input type="text" class="form-control" value="{{ $user -> phone }}"
                                    id="exampleInputEmail1" name="phone">
                            </div>
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="gender">
                                    <option selected>Open this select menu</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-sm-12  mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" value="{{ $user -> address }}"
                                    id="exampleInputEmail1" name="address">
                            </div>
                            <div class="col-lg-6 col-sm-12  mb-5">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ $user -> email }}"
                                    id="exampleInputEmail1" name="email">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit <i
                                        class="fas fa-check-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const edit = () => {
        document.querySelector('.bio').classList.add('d-none');
        document.querySelector('.form').classList.remove('d-none');
        document.querySelector('#edit').classList.add('d-none');
        document.querySelector('#back').classList.remove('d-none');
        document.querySelector('#update').classList.remove('d-none');
        document.querySelector('#username').classList.add('d-none');
    }
    const back = () => {
        document.querySelector('.bio').classList.remove('d-none');
        document.querySelector('.form').classList.add('d-none');
        document.querySelector('#edit').classList.remove('d-none');
        document.querySelector('#back').classList.add('d-none');
        document.querySelector('#update').classList.add('d-none');
        document.querySelector('#username').classList.remove('d-none');
    }
</script>
@endsection