@extends('layout')
@section('title', 'Rooms')

@section('content')

<main class="rooms-intro">
	<div class="rooms-intro__text">
		<section class="rooms-intro__head-section">
			<h5 class="rooms-intro__head-text subtitle-trigger">
				THE ULTIMATE LUXURY
			</h5>
			<h1 class="rooms-intro__head-text big-title">
				Ultimate Rooms
			</h1>
			<div class="rooms-intro__breadcrumbs-container">
				<div class="rooms-intro__breadcrumbs">
					<a href="/"><span class="rooms-intro__breadcrumbs-home">Home</span></a>
					<span class="rooms-intro__breadcrumbs-separator">&nbsp|&nbsp</span>
					<span class="rooms-intro__breadcrumbs-about">Rooms</span>
				</div>
			</div>
		</section>
	</div>
</main>

<main class="rooms-cards">
	<div class="swiper swiper-rooms-cards">
		<div class="swiper-wrapper rooms-cards__wrapper">
			@foreach ($rooms as $room)
			<div class="swiper-slide swiper-slide-rooms-cards">
				<div class="rooms-cards__card">
					<img class="room-image" src="{{$room['URL']}}" alt="a picture of a hotel room" />
					<div class="rooms-cards__card-service-info">
						<img src="/images/assets/images/miranda_services_info.png" alt="an illustration of the room services" />
					</div>
					<div class="rooms-cards__text-container">
						<h4 class="small-title">{{$room['room_type']}}</h4>
						<p class="filled-text">
							{{$room['quick_description']}}
						</p>
						<span class="'rooms-cards__text-frist-span' {{$room['discount'] ? 'price-amount price-amount--small price-amount--discount' : 'price-amount price-amount--small'}}">${{$room['priceWithDiscount']}}/Night</span>&nbsp&nbsp&nbsp&nbsp
						<a href="/room-details/{{$room['id']}}" class="rooms-cards__anchor-second-span">
							<span class="rooms-cards__text-second-span">
								<button class="card-button">
									Booking Now
								</button>
							</span>
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div id="pagination-rooms-cards" class="swiper-pagination-rooms-cards"></div>
</main>

@endsection