@extends('layout')
@section('title', 'About Us')

@section('content')

<main class="room-details-intro">
	<div class="room-details-intro__text">
		<section class="room-details-intro__head-section">
			<h5 class="room-details-intro__head-text subtitle-trigger">
				THE ULTIMATE LUXURY
			</h5>
			<h1 class="room-details-intro__head-text big-title">
				Ultimate Room
			</h1>
			<div class="room-details-intro__breadcrumbs-container">
				<div class="room-details-intro__breadcrumbs">
					<a href="/index.php"><span class="room-details-intro__breadcrumbs-home">Home</span></a>
					<span class="room-details-intro__breadcrumbs-separator">&nbsp|&nbsp</span>
					<span class="room-details-intro__breadcrumbs-about">Room Details</span>
					@if(isset($room))
					<span class="room-details-intro__breadcrumbs-separator">&nbsp|&nbsp</span>
					<span class="room-details-intro__breadcrumbs-about">{{ $room['room_type'] }}</span>
					@endif
				</div>
			</div>
		</section>
	</div>
</main>

@if(isset($room))
@if(isset($start) && isset($end))
<div class="checkin-info">
	<h1 class="regular-new-title">Room availablity checked for the selected dates:</h1>
	<h2 class="regular-new-title">Check in: {{ $start }}</h2>
	<h2 class="regular-new-title">Check out: {{ $end }} </h2>
</div>
@endif
<main class=" room-details-intro__room-details">
	<div class="room-details-intro__room-details-wrapper">
		<div class="room-details-intro__room-details-text-wrapper">
			<h4 class="subtitle-trigger">{{ $room['room_type'] }}</h4>
			<h1 class="regular-title">Luxury {{ $room['room_type'] }}</h1>
			@if($room['discount'])
			<span class="discounted-price">${{ $room['priceWithDiscount'] }}</span>
			<span class="price-nigth-small discounted-price">/Night</span>
			@else
			<span class="price-amount-small">${{ $room['price'] }}</span>
			<span class="price-nigth-small">/Night</span>
			@endif
		</div>
		<img src="{{ $room['URL'] }}" alt="a photo of a hotel room" />
	</div>
	<div class="room-details-intro__rooms-details-availability">
		@if(!isset($start) && !isset($end))
		<p>Check Availability</p>
		<form action="#" method="get">
			<label for="">Check In</label>
			<input name="trip-start" class=" room-details-intro__calendar-picker" type="date" value="{{$start}}" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 Year')) }}" required />
			<label for="">Check Out</label>
			<input name=" trip-end" class="room-details-intro__calendar-picker" type="date" value="{{$end}}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" max="{{ date('Y-m-d', strtotime('+2 Year')) }}" required />
			<input type="hidden" name="room_id" value="{{$room['id']}}" />
			<button type="submit" class="button button--beige button--auto">
				Check Availability
			</button>
		</form>
		@else
		<form action="/create-booking.php" method="post">
			<p>Check Availability</p>
			<label for="">Check In</label>
			<input name="trip-start" class=" room-details-intro__calendar-picker" type="date" value="{{$start}}" required />
			<label for="">Check Out</label>
			<input name="trip-end" class="room-details-intro__calendar-picker" type="date" value="{{$end}}" required />
			<label for="">Full Name</label>
			<input name="name" id="input-details-name" name="full-name" placeholder="Your full name" type="text" required />
			<label for="">Email</label>
			<input name="email" id="input-details-email" name="email" placeholder="Enter email address" type="text" required />
			<label for="">Phone</label>
			<input name="phone" id="input-details-phone" name="phone" placeholder="Add phone number" type="text" required />
			<label for="">Special Request</label>
			<input name="special-request" id="input-details-special-request" placeholder="Enter subject" type="text" required />
			<button type="submit" class="button button--beige button--auto">
				Book Now!
			</button>
		</form>
		@endif
		<div class="room-details-intro__body-text">
			<p>
				{{$room['description']}}
			</p>
		</div>
	</div>
</main>

<main class="room-details-intro__amenities">
	<h4 class="small-title">Amenities</h4>
	<hr />
	<div class="room-details-intro__amenities-services">
		<div class="room-details-intro__amenities-services-left">
			<div>
				@if (strpos($room['all_amenities'], 'Free Wifi') !== false)
				<img src="../assets/images/offers_services/Vector.png" alt="" />
				<span>High Speed Wifi</span>
				@endif
			</div>
			<div>
				@if (strpos($room['all_amenities'], 'Kitchen') !== false)
				<img src="../assets/images/offers_services/kitchen.png" alt="" />
				<span>Kitchen</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], 'Shower') !== false)
				<img src="../assets/images/offers_services/shower.png" alt="" />
				<span>Shower</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], 'Single Bed') !== false)
				<img src="../assets/images/offers_services/single_bed.png" alt="" />
				<span>Single Bed</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], 'Towels') !== false)
				<img src="../assets/images/offers_services/towels.png" alt="" />
				<span>Towels</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], 'Strong Locker') !== false)
				<img src="../assets/images/offers_services/locker.png" alt="" />
				<span>Strong Locker</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], 'Expert Team') !== false)
				<img src="../assets/images/offers_services/team.png" alt="" />
				<span>Expert Team</span>
				@endif
			</div>
		</div>

		<div class="room-details-intro__amenities-services-right">
			<div>
				@if (strpos($room['all_amenities'], 'Air Conditioner') !== false)
				<img src="../assets/images/offers_services/air_conditioner.png" alt="" />
				<span>Air Conditioner</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], 'Breakfast') !== false)
				<img src="../assets/images/offers_services/breakfast.png" alt="" />
				<span>Breakfast</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], 'Cleaning') !== false)
				<img src="../assets/images/offers_services/cleaning.png" alt="" />
				<span>Cleaning</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], 'Grocery') !== false)
				<img src="../assets/images/offers_services/grocery.png" alt="" />
				<span>Grocery</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], 'Shop Near') !== false)
				<img src="../assets/images/offers_services/shop_near.png" alt="" />
				<span>Shop Near</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], '24/7 Online Support') !== false)
				<img src="../assets/images/offers_services/support.png" alt="" />
				<span>24/7 Online Support</span>
				@endif
			</div>

			<div>
				@if (strpos($room['all_amenities'], 'Smart Security') !== false)
				<img src="../assets/images/offers_services/security.png" alt="" />
				<span>Smart Security</span>
				@endif
			</div>
		</div>
	</div>
</main>

@else
<div class="unavailable-booking">
	<h1 class="big-title">Unfortunately, the room you desire is not available for the selected dates!</h1>
	<a href="/rooms.php" style="text-decoration: none;">
		<button class="button button--beige button--auto">
			Go back to Rooms
		</button>
	</a>
</div>
@endif

<main class="room-details-intro__founder-container">
	<div class="room-details-intro__founder">
		<div>
			<img src="../assets/images/elipse-banner.png" alt="a banner on the top right of the main photo" />
			<img src="../assets/images/founder_photo.png" alt="a photo of the founder" />
		</div>
		<h4 class="small-title">David P. Robaina</h4>
		<h5 class="subtitle-trigger">FOUNDER, QUX CO.</h5>
		<p>
			David P. Robaina, the visionary behind QUX CO., leads with passion and innovation. His commitment to excellence
			drives our team to new heights.
		</p>
	</div>
</main>

<main class="room-details-intro__cancellation-container">
	<div class="room-details-intro__cancellation">
		<h4 class="small-title">Cancellation</h4>
		<hr />
		<p>
			At Miranda, we understand that plans can change. To provide flexibility and peace of mind, we offer the following cancellation policy:
		</p>
		<br>
		<p>
			Cancellation Terms:
		</p>
		<br>
		<p>
			- Guests can receive a full refund if the reservation is canceled up to 14 days before the scheduled date.
		</p>
		<p>
			- Cancellations made within 14 days of the scheduled date may not be eligible for a refund.
		</p>
		<br>
		<p>
			We appreciate your understanding and look forward to hosting you. If you have any questions or need assistance, please feel free to contact our customer support team.
		</p>
		<br>
		<p>
			Thank you for choosing Hotel Miranda.
		</p>
	</div>
</main>

<main class="room-details-cards">
	<h4 class="small-title">Related Rooms</h4>
	<hr />
	<div class="room-details-cards__card">
		<div class="swiper swiper-rooms-offer">
			<div class="swiper-wrapper">
				@foreach ($rooms as $room)
				<div class="offers-popular__card swiper-slide">
					<img src="{{$room['URL']}}" alt="a picture of a hotel room" />
					<div class="offers-popular__card-service-info">
						<img src="../assets/images/miranda_services_info.png" alt="an illustration of the room services" />
					</div>
					<div class="offers-popular__text-container">
						<h4 class="small-title">{{$room['room_type']}}</h4>
						<p class="filled-text">
							{{$room['quick_description']}}
						</p>
						<span class="offers-popular__text-frist-span price-amount">${{$room['price']}}/Night</span>&nbsp&nbsp&nbsp&nbsp
						<form action="../room-details.php" method="get"><span class="rooms-cards__text-second-span">
								<input type="hidden" name="room_id" value="{{$room['id']}}" />
								<button type="submit">Booking Now</button>
							</span>
						</form>
					</div>
				</div>
				@endforeach
			</div>
			<div class="swiper-button-next swiper-buttons swiper-related-rooms-button-next"></div>
			<div class="swiper-button-prev swiper-buttons swiper-related-rooms-button-prev"></div>
		</div>
	</div>
</main>

@endsection