@extends('tamplate.master')
@section('judul', 'Berita')
@section('content')
<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url({{asset('images/belajarbersama2.jpg')}}">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1 class="heading-section">Acara Santri</h1>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</aside>

<div id="fh5co-blog">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Acara Santri</h2>
				<p>Disini santri bisa mengepresikan mengenai berbagai hal yang di curahkan melalui tulisan.</p>
			</div>
		</div>
		<div class="row">
		@foreach ($berita as $b)
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="{{ route('berita') }}" class="blog-img-holder" style="background-image: url({{asset('storage/berita/'.$b->foto)}}"></a>
						<div class="blog-text">
                    <h3><a href="{{ route('berita') }}">{{$b->judul}}</a></h3>
							<span class="posted_on">{{$b->created_at->format('d M Y')}}</span>
							<p>{{$b->isi}}</p>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</div>
@stop