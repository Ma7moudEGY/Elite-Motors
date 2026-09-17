@extends('layouts.app')

@section('content')

<style>
	.hero-section {
		background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.9)), url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=1600&auto=format&fit=crop&q=80');
		background-size: cover;
		background-position: center;
		padding: 160px 0;
		border-bottom: 2px solid #ffc107;
	}

	.feature-card {
		background: #0a0a0a;
		transition: transform 0.3s ease, border-color 0.3s ease;
	}

	.feature-card:hover {
		transform: translateY(-5px);
		border-color: #ffc107 !important;
	}
</style>

<section class="hero-section text-center text-white">
	<div class="container py-4">
		<span class="badge bg-warning text-black px-3 py-2 fw-bold text-uppercase mb-3 rounded-pill" style="font-size: 0.8rem; letter-spacing: 1px;">Elite Luxury Fleet</span>
		<h1 class="display-3 fw-bold text-white mb-4" style="letter-spacing: 1px;">EXPERIENCE ULTIMATE <span class="text-warning">LUXURY</span></h1>
		<p class="text-secondary mb-5 mx-auto fs-5" style="max-width: 650px; line-height: 1.6;">
			Discover prestigious cars with unmatched performance, elegance, and exclusivity waiting for you in our premier showroom.
		</p>
		<div class="d-flex flex-wrap justify-content-center gap-3">
			<a href="{{ route('cars.index') }}" class="btn btn-warning text-black fw-bold px-5 py-3 rounded-pill shadow-lg">Explore Showroom</a>
			@auth
				@if (Auth::user()->isAdmin())
					<a href="{{ route('cars.create') }}" class="btn btn-outline-warning fw-bold px-4 py-3 rounded-pill">Add New Car</a>
				@endif
			@else
				<a href="{{ route('register') }}" class="btn btn-outline-warning fw-bold px-4 py-3 rounded-pill">Join Elite Motors</a>
			@endauth
		</div>
	</div>
</section>

<section class="container py-5 my-5">
	<div class="text-center mb-5">
		<h6 class="text-warning text-uppercase fw-bold mb-2" style="letter-spacing: 2px;">Why Choose Us</h6>
		<h2 class="fw-bold text-white display-6">THE PINNACLE OF <span class="text-warning">EXCELLENCE</span></h2>
		<p class="text-secondary">A seamless and elite rental experience tailored for you.</p>
	</div>

	<div class="row g-4 justify-content-center">
		<div class="col-md-4">
			<div class="card feature-card border border-secondary p-4 rounded-4 h-100 text-center text-white shadow-sm">
				<div class="mb-3 text-warning display-5"><i class="fas fa-shield-alt"></i></div>
				<h4 class="fw-bold mb-3 h5">100% Verified Fleet</h4>
				<p class="text-secondary small lh-lg">Every car in our collection is presented with clear details before you book.</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card feature-card border border-secondary p-4 rounded-4 h-100 text-center text-white shadow-sm">
				<div class="mb-3 text-warning display-5"><i class="fas fa-key"></i></div>
				<h4 class="fw-bold mb-3 h5">Simple Booking</h4>
				<p class="text-secondary small lh-lg">Choose your car and rental dates through a quick, straightforward reservation process.</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card feature-card border border-secondary p-4 rounded-4 h-100 text-center text-white shadow-sm">
				<div class="mb-3 text-warning display-5"><i class="fas fa-concierge-bell"></i></div>
				<h4 class="fw-bold mb-3 h5">Trusted Owners</h4>
				<p class="text-secondary small lh-lg">See useful vehicle and owner information before making your choice.</p>
			</div>
		</div>
	</div>
</section>

@endsection
