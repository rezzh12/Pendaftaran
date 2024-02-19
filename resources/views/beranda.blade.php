@extends('tamplate.master')
@section('judul', 'Beranda')
@section('content')
<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url({{asset('images/dewanguru1.jpg')}}">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1>Penerimaan Santri Baru</h1>
								
								<h2>Penerimaan Santri Tahun Pelajaran {{$angkatan}} Telah Dibuka</h2>
								
								<p><a class="btn btn-primary btn-lg" href="{{ route('login') }}">Daftar Sekarang</a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url({{asset('images/fotopengurus1.jpg')}}">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1>Penerimaan Santri Baru</h1>
								<h2>Penerimaan Santri Tahun Pelajaran {{$angkatan}} Telah Dibuka</h2>
								<p><a class="btn btn-primary btn-lg" href="{{ route('login') }}">Daftar Sekarang</a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url({{asset('images/santriwisuda1.jpg')}}">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1>Penerimaan Santri Baru</h1>
								<h2>Penerimaan Santri Tahun Pelajaran {{$angkatan}} Telah Dibuka</h2>
								<p><a class="btn btn-primary btn-lg" href="{{ route('login') }}">Daftar Sekarang</a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</aside>

<div id="fh5co-about">
	<div class="container">
		<div class="col-md-6 animate-box">
			<span>PIMPINAN PONDOK PESANTREN AL - MUSRI</span>
			<h2>KH. Mukhtar Gozali </h2>
			<p>Assalaamu’alaikum Wr. Wb.</p>
			<p>Puji syukur kami panjatkan ke hadirat Allah SWT yang atas berkat rahmat dan hidayah-Nya kami bisa meluncurkan situs web Pondok Pesantren Al - Musri ini di Internet. Situs web ini bertujuan untuk memperkenalkan Al - Musri sebagai lembaga pendidikan dengan memanfaatkan media teknologi internet.</p>
			<p>Dengan adanya situs web ini, kami berharap Pondok Pesantren ini dapat lebih dikenal di kalangan yang lebih luas. Selain itu melalui situs web ini juga, kami berharap dapat memberi kemudahan bagi para santri dan orang tuanya untuk mengakses informasi mengenai kegiatan belajar mengajar di Pondok Pesantren ini dengan cepat, efisien dan online 24 jam. Akhir kata, kami berharap situs web ini dapat memberikan manfaat positif bagi siapa saja yang mengunjungi situs web kami ini.</p>
			<p>Wassalaamu’alaikum Wr. Wb.</p>
		</div>
		<div class="col-md-6">
			<img class="img-responsive" src="{{asset('images/pemimpin.jpg')}}" alt="Bapa Pimpinan">
		</div>
	</div>
</div>

<div id="fh5co-counter" class="fh5co-counters" style="background-image: url({{asset('images/img_bg_4.jpg')}}" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">

			<div class="col-md-10 col-md-offset-1">
				<div class="row">
                    @foreach($pihak as $p)
					
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="{{$p->jumlah_putra}}" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Jumlah Santri Putra</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="{{$p->jumlah_putri}}" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Jumlah Santri Putri</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="{{$p->jumlah_pengurus}}" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Jumlah Pengurus</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="{{$p->jumlah_alumni}}" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Jumlah Alumni Putra & Putri </span>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div id="fh5co-course">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Pengumuman Di AL - Musri</h2>
				<p>Pemberitahuan untuk santri mengenai pesantren tertullis di bawah.</p>
			</div>
		</div>
		<div class="row">
			<!-- Pengumuman -->

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

<div id="fh5co-blog">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Berita Mengenai Pesantren</h2>
				<p>Disini Berita akan ditampilkan.</p>
			</div>
		</div>

		<!-- Berita -->

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

<div id="fh5co-course-categories">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Pengalaman dan Fasilitas</h2>
				<p>Dibawah Sini adalah beberapa pengalaman dan fasilitas yang akan anda dapatkan</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-shop"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Pondok</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-heart4"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Kebersihan &amp; Kesehatan</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-banknote"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Keuangan</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-lab2"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Pertemanan</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-photo"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Kesenian </a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-home-outline"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Organisasi</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-bubble3"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Bahasa Arab</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-world"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Wifi Gratis</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section id="location">
        <div class="container-fluid">
            <h2 class="text-center" style="padding:50px;" data-aos="fade-up">Lokasi</h2>
            <div class="row">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.816318490562!2d107.2674834741877!3d-6.792191793204994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6855a093373297%3A0xdc124e2c79fd2725!2sPondok%20Pesantren%20Miftahulhuda%20Al-Musri&#39;%20Pusat!5e0!3m2!1sid!2sid!4v1704772912217!5m2!1sid!2sid" width="1500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%"></iframe>
            </div>
        </div>
    </section>
@stop

