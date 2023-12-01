@extends('layout')
@section('title', 'Home')

@section('content')

<main class="home-intro">
	<div class="home-intro__text">
		<section class="home-intro__text-section">
			<h5 class="home-intro__text subtitle-trigger">
				THE ULTIMATE LUXURY EXPERIENCE
			</h5>
			<h1 class="home-intro__text big-title">
				The Perfect Base For You
			</h1>
		</section>
		<section class="home-intro__button-section">
			<a href="#video" style="text-decoration: none;">
				<button class="home-intro__button home-intro__button--left button button--beige">
					TAKE A TOUR
				</button>
			</a>
			<a href="../about-us.php" style="text-decoration: none;">
				<button class="home-intro__button button button--grey">
					LEARN MORE
				</button>
			</a>
		</section>
	</div>

	<div class="home-intro__calendar-picker">
		<form action="../rooms.php" method="get">
			<section class="home-intro__calendar-picker-inner">
				<div class="home-intro__calendar-picker-inner-input home-intro__calendar-picker-inner-input--left">
					<label for="arrival">Arrival date:</label>
					<input type="date" id="arrival" name="trip-start" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 Year')) }}" required />
				</div>
				<div class="home-intro__calendar-picker-inner-input home-intro__calendar-picker-inner-input--right">
					<label for="departure">LeDeparture date:</label>
					<input type="date" id="departure" name="trip-end" value="{{ date('Y-m-d', strtotime('+1 day')) }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" max="{{ date('Y-m-d', strtotime('+2 Year')) }}" required />
				</div>
				<button type="submit" class="home-intro__calendar-picker-button button button--beige button--auto">
					CHECK AVAILABILITY
				</button>
			</section>
		</form>
	</div>
	<div class="home-intro__background-landscape"></div>
</main>

<main class="home-about">
	<div class="home-about__text-button">
		<div class="home-about__background"></div>
		<div class="home-about__text-button-content">
			<p class="home-about__text subtitle-trigger">ABOUT US</p>
			<h1 class="home-about__text home-about__text--title big-new-title">
				Discover Our Underground.
			</h1>
			<p class="home-about__text home-about__text--body filled-arch-new-text-grey">
				Beneath the bustling city, an authentic underground
				hotel awaits, mirroring the intrigue of Lorem ipsum's
				hidden depths. Experience true luxury and tranquility in
				our subterranean sanctuary. Here, time slows, making
				each moment truly exceptional. Welcome to a genuine
				urban escape.
			</p>
			<a href="../offers.php" style="text-decoration: none;">
				<button class="home-about__button button button--beige">
					BOOK NOW
				</button>
			</a>
		</div>
	</div>
	<div class="home-about__cards">
		<div class="home-about__card home-about__card--topcard">
			<section class="home-about__card-img home-about__card-img--crew">
				<img src="../assets/images/hotel_crew.jpeg" alt="a group of hotel stuff" />
			</section>
			<section class="home-about__card-info home-about__card-info--topcard">
				<img src="../assets/images/strong_team.png" alt="a logo of a strong team" />
				<h1 class="home-about__card-text regular-new-title">
					Strong Team
				</h1>
				<p class="home-about__card-text filled-new-text">
					Relax in luxurious comfort, where every need is met
					with a smile.
				</p>
			</section>
		</div>
		<div class="home-about__card home-about__card--bottomcard">
			<section class="home-about__card-img home-about__card-img--luxury">
				<img src="../assets/images/luxury_room.jpeg" alt="a group of hotel stuff" />
			</section>
			<section class="home-about__card-info home-about__card-info--variation">
				<img src="../assets/images/luxury_date_picker.png" alt="a logo of a strong team" />
				<h1 class="home-about__card-text regular-new-title">
					Luxury Room
				</h1>
				<p class="home-about__card-text filled-new-text-clear">
					Relax in luxurious comfort, where every need is met
					with a smile.
				</p>
			</section>
		</div>
	</div>
</main>

<main class="home-rooms">
	<div class="home-rooms__text-container">
		<h4 class="home-rooms__text subtitle-trigger">ROOMS</h4>
		<h1 class="home-roooms__text big-title">Hand Picked Rooms</h1>
	</div>

	<div class="home-rooms__services-slider-with-price">
		<div id="desktopSlider" class="home-rooms__slider home-rooms__slider--swiper-rooms swiper home-swiper-rooms">
			<div class="swiper-wrapper">
				@foreach ($rooms as $room)
				<div class="home-rooms__card-container swiper-slide">
					<img class="home-rooms__services-info" src="../assets/images/miranda_services_info.png" alt="a serie of icons representing room services" />
					<img class="home-rooms__slider--swiper-slidepic" src="{{$room['URL']}}" alt="" />
					<div class="home-rooms__slider-info-card">
						<h1 class="home-rooms__info-card-title regular-title">
							{{$room['room_type']}}
						</h1>
						<h4 class="home-rooms__info-card-body filled-text">
							{{$room['quick_description']}}
						</h4>
						<div class="home-rooms__info-card-price-amount-nigth">
							<span class="home-rooms__info-card-price price-amount">${{$room['price']}}</span><span class="home-rooms__info-card-price price-nigth">/Night</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="home-rooms__slider-button-prev swiper-button-prev"></div>
			<div class="home-rooms__slider-button-next swiper-button-next"></div>
		</div>
	</div>

	<div id="video" class="home-rooms__intro-video">
		<section class="home-rooms__intro-video-text">
			<h4 class="home-rooms__text new-subtitle-head-gold">
				INTRO VIDEO
			</h4>
			<h1 class="home-rooms__text big-title">
				Meet With Our Luxury Place.
			</h1>
			<p class="home-rooms__text filled-text">
				Experience unmatched luxury at our hotel, where
				impeccable service meets opulent accommodations. From
				lavish suites to exquisite dining, we redefine elegance,
				ensuring an unforgettable stay.
			</p>
		</section>
		<section class="home-rooms__intro-video-video">
			<div class="plyr__video-embed" id="player">
				<iframe src="https://www.youtube-nocookie.com/embed/Bu3Doe45lcU?si=1rHPncx6fmoXVYtz&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div>
		</section>
		<a href="../offers.php" style="text-decoration: none;">
			<button class="home-rooms__intro-video-button button button--beige-no-animation">
				BOOK NOW
			</button>
		</a>
	</div>
</main>

<main class="home-facilities">
	<div class="home-facilities__text-container">
		<h4 class="home-facilities__text subtitle-trigger">
			FACILITIES
		</h4>
		<h1 class="home-facilities__text big-title">Core Features</h1>
	</div>
	<div class="home-facilities__swiper swiper swiper-features">
		<div class="home-facilities__swiper-wrapper swiper-wrapper">
			<div class="general-features-card rating swiper-slide swiper-slide-card">
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
			<div class="general-features-card clock swiper-slide swiper-slide-card">
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
			<div class="general-features-card pointer swiper-slide swiper-slide-card">
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
			<div class="general-features-card clock-stop swiper-slide swiper-slide-card">
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
			<div class="general-features-card credit-card swiper-slide swiper-slide-card">
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
			<div class="general-features-card award swiper-slide swiper-slide-card">
				<img class="general-features-card__features-left-img" src="/assets/images/features/award.png" alt="icon" />
				<div class="general-features-card__features-card-text">
					<h4 class="home-facilities__features-title regular-title">
						Special Offers
					</h4>
					<p class="home-facilities__features-body filled-text">
						xperience opulent luxury with our exclusive
						hotel packages, indulging in lavish amenities
						and services for an unforgettable getaway.
					</p>
				</div>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</main>

<main class="home-menu">
	<div class="home-menu__icon-text">
		<img class="home-menu__donut-img" src="../assets/images/donut_icon.png" alt="a donut illustration" />
		<h4 class="home-menu__text subtitle-trigger">MENU</h4>
		<h1 class="home-menu__text-title big-title">Our Foods Menu</h1>
	</div>
	<div class="home-menu__food-menu-slider swiper swiper-food-menu">
		<div class="swiper-wrapper">
			<div class="home-menu__food-items swiper-slide">
				<div class="home-menu__food-item menu-item">
					<img src="../assets/images/food_menu/egg_bacon.jpg" alt="an egg and bacon plate" />
					<div class="home-menu__menu-item-text menu-item-text">
						<h4>Egg & Bacon</h4>
						<p>
							Savory bacon and eggs, a classic breakfast
							delight, perfectly prepared.
						</p>
					</div>
				</div>
				<div class="home-menu__food-item menu-item">
					<img src="../assets/images/food_menu/tea_coffee.jpg" alt="a hot tea" />
					<div class="home-menu__menu-item-text menu-item-text">
						<h4>Tea or Coffee</h4>
						<p>
							Indulge in our aromatic brews, a sip of pure
							comfort.
						</p>
					</div>
				</div>
				<div class="home-menu__food-item menu-item">
					<img src="../assets/images/food_menu/chia_oatmeal.jpg" alt="a chia oatmeal" />
					<div class="home-menu__menu-item-text menu-item-text">
						<h4>Chia Oatmeal</h4>
						<p>
							Delight in our nourishing chia oatmeal, a
							morning indulgence.
						</p>
					</div>
				</div>
			</div>
			<div class="home-menu__food-items swiper-slide">
				<div class="home-menu__food-item menu-item">
					<img src="../assets/images/food_menu/fruit_parfait.jpg" alt="a bowl of fruit" />
					<div class="home-menu__menu-item-text menu-item-text">
						<h4>Fruit Parfait</h4>
						<p>
							Savor the exquisite delight of our hotel's
							fruit parfait offering.
						</p>
					</div>
				</div>
				<div class="home-menu__food-item menu-item">
					<img src="../assets/images/food_menu/marmelade_selection.jpg" alt="a photo of marmelades selection" />
					<div class="home-menu__menu-item-text menu-item-text">
						<h4>Marmalade Selection</h4>
						<p>
							Savor our exquisite Marmalade Selection, a
							symphony of delightful flavors.
						</p>
					</div>
				</div>
				<div class="home-menu__food-item menu-item">
					<img src="../assets/images/food_menu/board_cheese.jpg" alt="a board of cheese" />
					<div class="home-menu__menu-item-text menu-item-text">
						<h4>Cheese Plate</h4>
						<p>
							Savor artisanal cheeses on our delectable
							hotel's signature cheese plate.
						</p>
					</div>
				</div>
			</div>
			<div class="home-menu__food-items swiper-slide">
				<div class="home-menu__food-item menu-item">
					<img src="../assets/images/food_menu/marmelade_selection.jpg" alt="a bowl of fruit" />
					<div class="home-menu__menu-item-text menu-item-text">
						<h4>Fruit Parfait</h4>
						<p>
							Savor the exquisite delight of our hotel's
							fruit parfait offering.
						</p>
					</div>
				</div>
				<div class="home-menu__food-item menu-item">
					<img src="../assets/images/food_menu/marmelade_selection.jpg" alt="a photo of marmelades selection" />
					<div class="home-menu__menu-item-text menu-item-text">
						<h4>Marmalade Selection</h4>
						<p>
							Savor our exquisite Marmalade Selection, a
							symphony of delightful flavors.
						</p>
					</div>
				</div>
				<div class="home-menu__food-item menu-item">
					<img src="../assets/images/food_menu/marmelade_selection.jpg" alt="a board of cheese" />
					<div class="home-menu__menu-item-text menu-item-text">
						<h4>Cheese Plate</h4>
						<p>
							Savor artisanal cheeses on our delectable
							hotel's signature cheese plate.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="home-menu__slider-button-prev swiper-button-prev"></div>
		<div class="home-menu__slider-button-next swiper-button-next"></div>
	</div>
	<div class="home-menu__restaurant-photos swiper swiper-restaurant-photos">
		<div class="swiper-wrapper">
			<img src="../assets/images/food_menu/food_pic1.jpg" alt="a cheff finishing the plate presentation" class="home-menu__pic swiper-slide" />
			<img src="../assets/images/food_menu/food_pic2.jpg" alt="a buffet line of food" class="home-menu__pic swiper-slide" />
			<img src="../assets/images/food_menu/food_pic3.jpg" alt="a table with different teas/coffee and various snacks" class="home-menu__pic swiper-slide" />
		</div>
		<div class="swiper-pagination"></div>
	</div>
</main>

<main class="acheivements">
	<div class="acheivements__acheivements-container">
		<div class="acheivements__acheivements-item">
			<img src="../assets/images/achievements/84k.png" alt="" class="acheivements__acheivements-item-photo" />
			<p>Projects are Completed</p>
		</div>
		<div class="acheivements__acheivements-item">
			<img src="../assets/images/achievements/10m.png" alt="" class="acheivements__acheivements-item-photo" />
			<p>Active Backers Around World</p>
		</div>
		<div class="acheivements__acheivements-item">
			<img src="../assets/images/achievements/02k.png" alt="" class="acheivements__acheivements-item-photo" />
			<p>Categories Served</p>
		</div>
		<div class="acheivements__acheivements-item">
			<img src="../assets/images/achievements/100m.png" alt="" class="acheivements__acheivements-item-photo" />
			<p>Idea Raised Funds</p>
		</div>
	</div>
</main>

@endsection