@extends('tamplate.master')
@section('judul', 'Pengajar')
@section('content')
<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url({{asset('images/guru.jpg')}}">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1 class="heading-section">Dewan Pengajar</h1>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</aside>

<div id="fh5co-staff">
	<div class="container">
		<div class="row">
			@foreach ($guru as $g)
				<div class="col-md-3 animate-box text-center">
					<div class="staff">
						<div class="staff-img" style="background-image: url({{asset('storage/guru/'.$g->foto)}}">
							<ul class="fh5co-social">
							</ul>
						</div>
						<span>Mengajar {{$g->pelajaran}}</span>
						<h3>{{$g->nama}}</h3>
						<p>{{$g->pesan}}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
@stop