@extends('homepage.layouts.main')

@section('content')
<div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Cart</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl py-5 overflow-hidden">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Keranjang</h6>
            <h2 class="mt-2">Pesanan anda</h2>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="btn-group w-100" role="group">
                    <a href="/cart" class="btn btn-outline-primary {{ Request::is('cart') ? 'active' : '' }}">Belum
                        bayar <i class="far fa-credit-card"></i></a>
                    <a href="/onProcess"
                        class="btn btn-outline-primary {{ Request::is('onProcess') ? 'active' : '' }}">Dalam
                        pemimjaman <i class="fas fa-car"></i></a>
                    <a href="/history"
                        class="btn btn-outline-primary {{ Request::is('history') ? 'active' : '' }}">History
                        pinjam <i class="fas fa-history"></i></a>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Berikan penilaianmu <i class="bi bi-chat-square-dots"></i>
                    </button>
                </div>
                <div class="card overflow-auto">
                    <div class="card-body">
                        <table class="table text-center">
                            <thead class="justify-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Kendaraan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal Sewa</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Tanggal Kembali</th>
                                    <th scope="col">Option</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Catatan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="align-baseline">
                                @if ($orderDetails != null)
                                @foreach ($orderDetails as $item)
                                @if ($item -> order -> status == 2 && $item -> order -> user_id == Auth::user() -> id)
                                @php
                                $pengembalian = \App\Models\Pengembalian::where('order_id', $item -> order_id)->first();
                                $pengembalianDetails = \App\Models\PengembalianDetail::where('pengembalian_id',
                                $pengembalian -> id)->first();
                                // dd($pengembalianDetails);
                                // dd($denda -> pengembalianDetail -> tanggal_kembali);
                                @endphp
                                <tr>
                                    <td>
                                        {{ $loop -> iteration }}
                                    </td>
                                    <td>
                                        <img src="@if (!$item -> kendaraan -> image)
                                                                                {{ asset('img/kendaraan/'.$item -> kendaraan -> slug.'.png') }}
                                                                                @else
                                                                                {{asset('storage/'.$item -> kendaraan->image)}}
                                                                              @endif" alt="" width="200px">
                                    </td>
                                    <td>{{ $item -> kendaraan -> nama }}</td>
                                    <td>
                                        @if ($item -> order -> status == 0)
                                        <span class="badge rounded-pill bg-danger">Belum bayar</span>
                                        @elseif ($item -> order -> status == 1)
                                        <span class="badge rounded-pill bg-warning">Dalam Peminjaman</span>
                                        @elseif ($item -> order -> status == 2)
                                        <span class="badge rounded-pill bg-success">Selesai</span>
                                        @endif
                                    </td>
                                    <td>{{ $item -> tanggal_sewa }}</td>
                                    <td>{{ $item -> lama_sewa }} hari</td>
                                    <td>{{ $pengembalianDetails -> tanggal_kembali }}</td>
                                    <td>@if ($item -> opsi == 1)
                                        {{ 'Tanpa Sopir' }}
                                        @elseif ($item -> opsi == 2)
                                        {{ 'Dengan Sopir' }}
                                        @else
                                        {{ 'Dengan Supir + BBM' }}
                                        @endif</td>
                                    <td>Rp.{{ number_format($item -> total_bayar) }}</td>
                                    <td>
                                        @if ($item -> catatan)
                                        {{ $item -> catatan }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td><a href="/details/{{ $item -> id }}" class="btn btn-primary"
                                            title="Lihat Details"><i class="fas fa-eye"></i></a></td>
                                </tr>
                                @endif
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="9" class="text-center">
                                        <h5>Belum ada history peminjaman</h5>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/testimoni" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Testimoni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                            value="{{ auth()->user()->name }}" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Masukkan Penilaian Anda</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name="comment"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection