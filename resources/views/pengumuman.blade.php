@extends('tamplate.master')
@section('judul', 'Beranda')
@section('content')
<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url({{asset('images/narkib.jpg')}}">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1 class="heading-section">Pengumuman</h1>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</aside>

<div id="fh5co-course">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Pengumuman Pesantren Al - Intiqol</h2>
				<p>Dibawah sini adalah semua pengumuman mengenai pondok pesantren Al - Intiqol</p>
			</div>
		</div>
		<div class="row">
			<div class="row row-padded-mb">
			@foreach ($pengumuman as $p)
					<div class="col-md-4 animate-box ">
						<div class="fh5co-event">
							<div class="date text-center"><span>{{$p->created_at->format('d')}}<br>{{$p->created_at->format('M')}}.</span></div>
							<h3><a href="{{ route('pengumuman') }}">{{$p->judul}}</a></h3>
							<p>{{$p->isi}}</p>
							<p><a href="{{ route('pengumuman') }}">Terus Baca </a></p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop