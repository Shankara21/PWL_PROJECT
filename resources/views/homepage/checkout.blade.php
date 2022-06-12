@extends('homepage.layouts.main')

@section('content')
<div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Checkout</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<form action="/checkout" method="POST">
    @csrf
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Checkout</h6>
                <h2 class="mt-2">Selesaikan Pesanan Anda</h2>
            </div>
            <div class="row g-4">
                <div class="col-8 col-md-8 col-sm-12">
                    <h4 class="mb-5">Pilih metode pembayaran!</h4>
                    @error('payments')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <table class="text-center mb-5" style="border-spacing: 10px">
                        <tbody>
                            <tr>
                                <td style="padding:10px;">
                                    <div class="form-check">
                                        <label class="form-check-label " for="exampleRadios1">
                                            <img src="{{ asset('img/payments/Shopeepay.png') }}" alt="" height="100px"
                                                style="object-fit: fill;border-radius: 20px;" class="img-target">
                                        </label>
                                        <input class="form-check-input d-none opt-radio" type="radio" name="payments"
                                            id="exampleRadios1" value="Shopeepay">
                                    </div>
                                </td>
                                <td style="padding:10px;">
                                    <div class="form-check">
                                        <label class="form-check-label " for="exampleRadios2">
                                            <img src="{{ asset('img/payments/LinkAja.png') }}" alt="" height="100px"
                                                style="border-radius: 20px;" class="img-target">
                                        </label>
                                        <input class="form-check-input d-none opt-radio" type="radio" name="payments"
                                            id="exampleRadios2" value="LinkAja">
                                    </div>
                                </td>
                                <td style="padding:10px;">
                                    <div class="form-check">
                                        <label class="form-check-label " for="exampleRadios3">
                                            <img src="{{ asset('img/payments/Gopay.png') }}" alt="" height="100px"
                                                style="border-radius: 20px;" class="img-target">
                                        </label>
                                        <input class="form-check-input d-none opt-radio" type="radio" name="payments"
                                            id="exampleRadios3" value="Gopay">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px;">
                                    <div class="form-check">
                                        <label class="form-check-label " for="exampleRadios4">
                                            <img src="{{ asset('img/payments/BCA.png') }}" alt="" height="100px"
                                                style="border-radius: 20px;" class="img-target">
                                        </label>
                                        <input class="form-check-input d-none opt-radio" type="radio" name="payments"
                                            id="exampleRadios4" value="BCA">
                                    </div>
                                </td>
                                <td style="padding:10px;">
                                    <div class="form-check">
                                        <label class="form-check-label " for="exampleRadios5">
                                            <img src="{{ asset('img/payments/BRI.png') }}" alt="" height="100px"
                                                style="border-radius: 20px;" class="img-target">
                                        </label>
                                        <input class="form-check-input d-none opt-radio" type="radio" name="payments"
                                            id="exampleRadios5" value="BRI">
                                    </div>
                                </td>
                                <td style="padding:10px;">
                                    <div class="form-check">
                                        <label class="form-check-label " for="exampleRadios6">
                                            <img src="{{ asset('img/payments/Mandiri.png') }}" alt="" height="100px"
                                                style="border-radius: 20px;" class="img-target">
                                        </label>
                                        <input class="form-check-input d-none opt-radio" type="radio" name="payments"
                                            id="exampleRadios6" value="Mandiri">
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <h4 class="mb-3">Instruksi Pembayaran</h4>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Shopeepay <img src="{{ asset('img/payments/Shopeepay.png') }}" alt="" width="75px">
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Linkaja <img src="{{ asset('img/payments/LinkAja.png') }}" alt="" height="50px">
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Gopay <img src="{{ asset('img/payments/Gopay.png') }}" alt="" width="75px">
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#bca" aria-expanded="false" aria-controls="bca">
                                    BCA <img src="{{ asset('img/payments/BCA.png') }}" alt="" width="75px">
                                </button>
                            </h2>
                            <div id="bca" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#bri" aria-expanded="false" aria-controls="bri">
                                    BRI <img src="{{ asset('img/payments/BRI.png') }}" alt="" height="50px">
                                </button>
                            </h2>
                            <div id="bri" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#mandiri" aria-expanded="false" aria-controls="mandiri">
                                    Mandiri <img src="{{ asset('img/payments/Mandiri.png') }}" alt="" width="75px">
                                </button>
                            </h2>
                            <div id="mandiri" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Total Pesanan</h4>
                            @if (!empty($order))
                            <h6 class="card-subtitle mb-2">Rp.{{ number_format($order -> total) }}</h6>
                            @else
                            <h6 class="card-subtitle mb-2">Rp. 0</h6>
                            @endif
                            <hr>
                            @if ($orderDetail -> opsi == 1)
                            <div class="mb-3">
                                <label for="berkas" class="form-label">Upload berkas penyewaan</label>
                                <input type="file" class="form-control" id="berkas" name="berkas" required>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="formFile" class="form-label">
                                    <h6>*Upload bukti pembayaran</h6>
                                </label>
                                <input class="form-control" type="file" id="formFile" name="bukti_pembayaran" required>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary w-100">Selesaikan pesanan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    const radio = document.querySelectorAll('.opt-radio');
    const target = document.querySelectorAll('.img-target');

    radio.forEach(function (item, index) {
        item.addEventListener('click', function () {
            target.forEach(function (item, index) {
                item.style.backgroundColor = 'white';
                item.style.transform = 'scale(1)';
            });
            target[index].style.backgroundColor = 'rgba(0,0,0,0.05)';
            target[index].style.transform = 'scale(1.2)';
        });
    });
</script>
@endsection