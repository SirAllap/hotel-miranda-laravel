@extends('layout')
@section('title', 'About Us')

@section('content')

<main class="aboutus-intro">
	<div class="aboutus-intro__text">
		<section class="aboutus-intro__head-section">
			<h5 class="aboutus-intro__head-text subtitle-trigger">
				THE ULTIMATE LUXURY
			</h5>
			<h1 class="aboutus-intro__head-text big-title">About Us</h1>
			<div class="aboutus-intro__breadcrumbs-container">
				<div class="aboutus-intro__breadcrumbs">
					<a href="/index.php"><span class="aboutus-intro__breadcrumbs-home">Home</span></a>
					<span class="aboutus-intro__breadcrumbs-separator">&nbsp|&nbsp</span>
					<span class="aboutus-intro__breadcrumbs-about">About</span>
				</div>
			</div>
		</section>
		<section class="aboutus-intro__video-services">
			<div class="plyr__video-embed" id="player">
				<iframe src="https://www.youtube-nocookie.com/embed/Bu3Doe45lcU?si=1rHPncx6fmoXVYtz&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div>
			<div class="aboutus-intro__services">
				<h1 class="aboutus-intro__services-title small-title">
					Our hotel has been present for over 20 years. We
					make the best for all our customers.
				</h1>
				<div class="aboutus-intro__services-card">
					<img src="../assets/images/aboutus_services/BREAKFAST.png" alt="an illustration of a cup and croissant as a breakfast" />
					<img src="../assets/images/aboutus_services/AIRPORT.png" alt="an illustration of a plane" />
				</div>
				<div class="aboutus-intro__services-card">
					<img src="../assets/images/aboutus_services/CITI GUIDE.png" alt="an illustration of a citi guide" />
					<img src="../assets/images/aboutus_services/LUXURY.png" alt="an illustration of a luxury room" />
				</div>
			</div>
		</section>
		<section class="aboutus-intro__restaurant">
			<img src="../assets/images/aboutus_services/aboutus_restaurant.jpg" alt="a photo of a restaurant" />
			<h4 class="aboutus-intro__restaurant-text-subtitle subtitle-trigger">
				RESTAURANT
			</h4>
			<h1 class="aboutus-intro__restaurant-text-title big-title">
				Get Restaurant Facilities & Many Other More
			</h1>
			<p class="aboutus-intro__restaurant-text-body body-text">
				Located inside our prestigious luxury hotel, our
				restaurant embodies culinary perfection. Experience
				unrivaled flavors and impeccable service, embracing the
				epitome of opulence.
			</p>
			<a href="../index.php#video" style="text-decoration: none;">
				<button class="aboutus-intro__restaurant-button button button--beige">
					TAKE A TOUR
				</button>
			</a>
		</section>
	</div>
</main>

<main class="aboutus-facilities">
	<div class="aboutus-facilities__text-container">
		<h4 class="aboutus-facilities__text subtitle-trigger">
			FACILITIES
		</h4>
		<h1 class="aboutus-facilities__text big-title">
			Core Features
		</h1>
	</div>
	<div class="aboutus-facilities__swiper swiper swiper-features">
		<div class="aboutus-facilities__swiper-wrapper swiper-wrapper">
			<div class="general-features-card rating-black swiper-slide swiper-slide-card">
				<img class="general-features-card__features-left-img" src="/assets/images/features/rating.png" alt="icon" />
				<div class="general-features-card__features-card-text">
					<h4 class="home-facilities__features-title regular-title">
						Have High Rating
					</h4>
					<p class="home-facilities__features-body filled-text">
						Experience pure luxury at our hotel, where every
						room exudes opulence, offering you the finest
						amenities and impeccable service.
					</p>
				</div>
			</div>
			<div class="general-features-card clock-black swiper-slide swiper-slide-card">
				<img class="general-features-card__features-left-img" src="/assets/images/features/clock.png" alt="icon" />
				<div class="general-features-card__features-card-text">
					<h4 class="home-facilities__features-title regular-title">
						Quite Hours
					</h4>
					<p class="home-facilities__features-body filled-text">
						Experience uninterrupted tranquility during your
						stay with our exclusive "Quiet Hours" feature,
						ensuring a peaceful and serene ambiance
						throughout.
					</p>
				</div>
			</div>
			<div class="general-features-card pointer-black swiper-slide swiper-slide-card">
				<img class="general-features-card__features-left-img" src="/assets/images/features/pointer.png" alt="icon" />
				<div class="general-features-card__features-card-text">
					<h4 class="home-facilities__features-title regular-title">
						Best Locations
					</h4>
					<p class="home-facilities__features-body filled-text">
						Luxury hotels boast prime locations, offering
						guests breathtaking views, convenient access to
						attractions, and unparalleled proximity to city
						center gems.
					</p>
				</div>
			</div>
			<div class="general-features-card clock-stop-black swiper-slide swiper-slide-card">
				<img class="general-features-card__features-left-img" src="/assets/images/features/clock_stop.png" alt="icon" />
				<div class="general-features-card__features-card-text">
					<h4 class="home-facilities__features-title regular-title">
						Free Cancellation
					</h4>
					<p class="home-facilities__features-body filled-text">
						Experience the indulgence of our luxury hotel
						with the added flexibility of complimentary
						cancellation for your peace of mind.
					</p>
				</div>
			</div>
			<div class="general-features-card credit-card-black swiper-slide swiper-slide-card">
				<img class="general-features-card__features-left-img" src="/assets/images/features/credit_card.png" alt="icon" />
				<div class="general-features-card__features-card-text">
					<h4 class="home-facilities__features-title regular-title">
						Payment Options
					</h4>
					<p class="home-facilities__features-body filled-text">
						Experience seamless luxury with our hotel's
						versatile payment options, from digital wallets
						to exclusive credit card privileges.
					</p>
				</div>
			</div>
			<div class="general-features-card award-black swiper-slide swiper-slide-card">
				<img class="general-features-card__features-left-img" src="/assets/images/features/award.png" alt="icon" />
				<div class="general-features-card__features-card-text">
					<h4 class="home-facilities__features-title regular-title">
						Special Offers
					</h4>
					<p class="home-facilities__features-body filled-text">
						Experience opulent luxury with our exclusive
						hotel packages, indulging in lavish amenities
						and services for an unforgettable getaway.
					</p>
				</div>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</main>

<main class="aboutus-counter">
	<h4 class="aboutus-counter__text-subtitle subtitle-trigger">
		COUNTER
	</h4>
	<h1 class="aboutus-counter__text-title big-title">
		Some Fun Facts
	</h1>
	<div class="aboutus-counter__mini-card-wrapper">
		<div class="aboutus-counter__mini-card">
			<img class="aboutus-counter__illustration-img" src="../assets/images/aboutus_counter/happy.png" alt="an illustration of a happy person" />
			<div>
				<span>8000</span>
				<p>Happy Users</p>
			</div>
			<img class="aboutus-counter__arrow-img" src="../assets/images/aboutus_counter/arrow.png" alt="an illustration of an arrow pointing to the right" />
		</div>
		<div class="aboutus-counter__mini-card">
			<img class="aboutus-counter__illustration-img" src="../assets/images/aboutus_counter/liked.png" alt="an illustration of hand doing a thumb up gesture" />
			<div>
				<span>10M</span>
				<p>Reviews & Appriciate</p>
			</div>
			<img class="aboutus-counter__arrow-img" src="../assets/images/aboutus_counter/arrow.png" alt="an illustration of an arrow pointing to the right" />
		</div>
		<div class="aboutus-counter__mini-card">
			<img class="aboutus-counter__illustration-img" src="../assets/images/aboutus_counter/positions.png" alt="an illustration of the globe with multiple pointers" />
			<div>
				<span>100</span>
				<p>Country Coverage</p>
			</div>
			<img class="aboutus-counter__arrow-img" src="../assets/images/aboutus_counter/arrow.png" alt="an illustration of an arrow pointing to the right" />
		</div>
	</div>
	<div class="aboutus-counter__fun-fact swiper swiper-fun-fact">
		<div class="swiper-wrapper">
			<img class="swiper-slide" src="../assets/images/fun_fact_laundry.jpg" alt="a picture of a laundry basket" />
			<img class="swiper-slide" src="../assets/images/fun_fact_swimmingpool.jpg" alt="an aerial picture of a swimming pool" />
		</div>
		<div class="aboutus-counter__pagination swiper-pagination-fun"></div>
	</div>
</main>

@endsection