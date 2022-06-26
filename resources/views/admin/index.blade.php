@extends('admin.layout.main')
@section('content')

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12">
				<div class="row">
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card tryal-gradient">
									<div class="card-body tryal row">
										<div class="col-xl-7 col-sm-6">
											<h2>Selamat Datang Di GO RENT Dashboard</h2>
											<span>Gimana Kabar Anda Hari Ini?
											</span>
										</div>
										<div class="col-xl-5 col-sm-6">
											<img src="{{asset('admin/images/chart.png')}}" alt="" class="sd-shape">
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0">
										<div>
											<h4 class="fs-20 font-w700">Testimoni</h4>
										</div>
										<div>
											<a href="/testimonial"
												class="btn btn-outline-primary btn-rounded fs-18">View More</a>
										</div>
									</div>
									<div class="card-body px-0">
										@foreach ($testimonis as $testimoni)
                                        <div class="d-flex justify-content-between recent-emails">
											<div class="d-flex">
												<div class="profile-k">
													<img src="@if ($testimoni->user->image)
                                                    {{ asset('storage/'.$testimoni->user->image) }}
                                                    @elseif($testimoni->user->gender == 'Perempuan')
                                                    {{ asset('img/woman.png') }}
                                                    @elseif($testimoni->user->gender == 'Laki-laki')
                                                    {{ asset('img/man.png') }}
                                                    @else
                                                    {{ asset('img/user.png') }}
                                                @endif" alt="">
												</div>
												<div class="ms-3">
													<h4 class="fs-18 font-w500">{{ $testimoni->user->name }}
													</h4>
													<span class="font-w400 d-block">{{ $testimoni->comment }}</span>
												</div>
											</div>
											<div class="email-check">
												<label class="like-btn mb-0">
													<input type="checkbox">
													<span class="checkmark"></span>
												</label>
											</div>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">

								<div class="row">
									<div class="col-xl-6 col-sm-6">
										<div class="card">
											<div class="card-body">
												<div
													class="card-title d-flex align-items-start justify-content-between">
													<i class="fas fa-user fa-2x" style="color: orange"></i>

												</div>
												<h4 class="fw-semibold d-block mb-1">Users</h4>
												<h4>
													<h3 class="card-title mb-2 d-inline pr-3">{{ $user }}</h3>
												</h4>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-sm-6">
										<div class="card">
											<div class="card-body">
												<div
													class="card-title d-flex align-items-start justify-content-between">
													<i class="fas fa-university fa-2x" style="color: orange"></i>

												</div>
												<h4 class="fw-semibold d-block mb-1">Bank</h4>
												<h4>
													<h3 class="card-title mb-2 d-inline pr-3">{{ $bank }}</h3>
												</h4>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-sm-6">
										<div class="card">
											<div class="card-body">
												<div
													class="card-title d-flex align-items-start justify-content-between">
													<i class="fas fa-tag fa-2x" style="color: orange"></i>

												</div>
												<h4 class="fw-semibold d-block mb-1">Brand</h4>
												<h4>
													<h3 class="card-title mb-2 d-inline pr-3">{{ $brand }}</h3>
												</h4>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-sm-6">
										<div class="card">
											<div class="card-body">
												<div
													class="card-title d-flex align-items-start justify-content-between">
													<i class="fas fa-bars fa-2x" style="color: orange"></i>

												</div>
												<h4 class="fw-semibold d-block mb-1">Category</h4>
												<h4>
													<h3 class="card-title mb-2 d-inline pr-3">{{ $category }}</h3>
												</h4>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-sm-6">
										<div class="card">
											<div class="card-body">
												<div
													class="card-title d-flex align-items-start justify-content-between">
													<i class="fas fa-car fa-2x" style="color: orange"></i>

												</div>
												<h4 class="fw-semibold d-block mb-1">Kendaraan</h4>
												<h4>
													<h3 class="card-title mb-2 d-inline pr-3">{{ $kendaraan }}</h3>
												</h4>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-sm-6">
										<div class="card">
											<div class="card-body">
												<div
													class="card-title d-flex align-items-start justify-content-between">
													<i class="fas fa-shopping-cart fa-2x" style="color: orange"></i>

												</div>
												<h4 class="fw-semibold d-block mb-1">Order</h4>
												<h4>
													<h3 class="card-title mb-2 d-inline pr-3">{{ $order }}</h3>
												</h4>
											</div>
										</div>
									</div>
                                    <div class="col-xl-6 col-sm-6">
										<div class="card">
											<div class="card-body">
												<div
													class="card-title d-flex align-items-start justify-content-between">
													<i class="fas fa-undo fa-2x" style="color: orange"></i>

												</div>
												<h4 class="fw-semibold d-block mb-1">Pengembalian</h4>
												<h4>
													<h3 class="card-title mb-2 d-inline pr-3">{{ $order }}</h3>
												</h4>
											</div>
										</div>
									</div>
                                    <div class="col-xl-6 col-sm-6">
										<div class="card">
											<div class="card-body">
												<div
													class="card-title d-flex align-items-start justify-content-between">
													<i class="fas fa-calendar-times fa-2x" style="color: orange"></i>

												</div>
												<h4 class="fw-semibold d-block mb-1">Denda</h4>
												<h4>
													<h3 class="card-title mb-2 d-inline pr-3">{{ $order }}</h3>
												</h4>
											</div>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
@endsection
