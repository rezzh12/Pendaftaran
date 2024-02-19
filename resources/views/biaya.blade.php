@extends('tamplate.master')
@section('judul', 'Biaya')
@section('content')
<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url({{asset('images/bayar.jpg')}}">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1 class="heading-section">Rincian &amp; Biaya</h1>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</aside>

<div id="fh5co-pricing" class="fh5co-bg-section">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Rincian &amp; Biaya</h2>
				<p>Dibawah ini tertera biaya yang harus dikeluarkan santri beserta rincian fasilitas yang akan diterima santri</p>
			</div>
		</div>
		<div class="row">
			<div class="pricing pricing--rabten">
				<div class="col-md-4 animate-box">
					<div class="pricing__item">
						<div class="wrap-price">
							<!-- <div class="icon icon-user2"></div> -->
							<h3 class="pricing__title">Mustaotin</h3>
							<!-- <p class="pricing__sentence">Single user license</p> -->
						</div>
						<div class="pricing__price">
							<span class="pricing__anim pricing__anim--1">
								<span class="pricing__currency">Rp</span>740.000
							</span>
						</div>
						<div class="wrap-price">
							<ul class="pricing__feature-list">
								<li class="pricing__feature">Pendaftaran</li>
								<li class="pricing__feature">Infak Bangunan</li>
								<li class="pricing__feature">Syahriah</li>
								<li class="pricing__feature">Kitab - Kitab</li>
								<li class="pricing__feature">Raport & Buku Izin</li>

							</ul>
							<a class="pricing__action" href="{{ route('admin.angkatan') }}">Pilih kategori</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="pricing__item">
						<div class="wrap-price">
							<!-- <div class="icon icon-store"></div> -->
							<h3 class="pricing__title">Mukimin </h3>
							<!-- <p class="pricing__sentence">Up to 5 users</p> -->
						</div>
						<div class="pricing__price">
							<span class="pricing__anim pricing__anim--1">
								<span class="pricing__currency">Rp</span>1.000.000
							</span>
						</div>
						<div class="wrap-price">
							<ul class="pricing__feature-list">
								<li class="pricing__feature">Pendaftaran</li>
								<li class="pricing__feature">Infak Bangunan</li>
								<li class="pricing__feature">Syahriah</li>
								<li class="pricing__feature">Kitab - Kitab</li>
								<li class="pricing__feature">Raport & Buku Izin</li>
								<li class="pricing__feature">Makan</li>
								<li class="pricing__feature">Bawa HP</li>
								<li class="pricing__feature">Bawa Leptop</li>
							</ul>
							<a class="pricing__action" href="{{ route('login') }}">Pilih kategori</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
