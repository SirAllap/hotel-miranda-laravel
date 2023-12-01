@extends('layout')
@section('title', 'Offers')

@section('content')

<main class="offers-intro">
    <div class="offers-intro__text">
        <section class="offers-intro__head-section">
            <h5 class="offers-intro__head-text subtitle-trigger">
                THE ULTIMATE LUXURY
            </h5>
            <h1 class="offers-intro__head-text big-title">
                Our Offers
            </h1>
            <div class="offers-intro__breadcrumbs-container">
                <div class="offers-intro__breadcrumbs">
                    <a href="/index.php"><span class="offers-intro__breadcrumbs-home">Home</span></a>
                    <span class="offers-intro__breadcrumbs-separator">&nbsp|&nbsp</span>
                    <span class="offers-intro__breadcrumbs-about">Offers</span>
                </div>
            </div>
        </section>
    </div>
</main>

<main class="offers-intro__cards">
    @foreach ($roomsWithDiscounts as $room)
    <div class="offers-intro__offer-card">
        <div class="offers-intro__offer-card-image">
            <img src="{{$room['URL']}}" alt="" />
            <div class="offers-intro__offer-card-image-price-offer">
                <div class="offers-intro__lined-price">
                    <span class="price-amount">${{$room['price']}}</span><span class="price-nigth">/Night</span>
                </div>
                <div class="offers-intro__red-price">
                    <span class="price-amount">${{ $room['priceWithDiscount'] }}</span>
                    <span class="price-nigth">/Night</span>
                </div>
            </div>
        </div>
        <div class="offers-intro__offer-card-body">
            <h4 class="subtitle-trigger">{{$room['room_type']}}</h4>
            <h1 class="big-title">Luxury {{$room['room_type']}}</h1>
            <p class="filled-text">
                {{$room['description']}}
            </p>
            <div class="offers-intro__offer-card-body-services">
                <div class="offers-intro__offer-card-body-services-left">
                    <div>
                        <img src="../assets/images/offers_services/air_conditioner.png" alt="" /><span>Air Conditioner</span>
                    </div>
                    <div>
                        <img src="../assets/images/offers_services/breakfast.png" alt="" /><span>Breakfast</span>
                    </div>
                    <div>
                        <img src="../assets/images/offers_services/cleaning.png" alt="" /><span>Cleaning</span>
                    </div>
                    <div>
                        <img src="../assets/images/offers_services/grocery.png" alt="" /><span>Grocery</span>
                    </div>
                    <div>
                        <img src="../assets/images/offers_services/shop_near.png" alt="" /><span>Shop Near</span>
                    </div>
                </div>

                <div class="offers-intro__offer-card-body-services-right">
                    <div>
                        <img src="../assets/images/offers_services/Vector.png" alt="" /><span>High Speed Wifi</span>
                    </div>
                    <div>
                        <img src="../assets/images/offers_services/kitchen.png" alt="" /><span>Kitchen</span>
                    </div>
                    <div>
                        <img src="../assets/images/offers_services/shower.png" alt="" /><span>Shower</span>
                    </div>
                    <div>
                        <img src="../assets/images/offers_services/single_bed.png" alt="" /><span>Single Bed</span>
                    </div>
                    <div>
                        <img src="../assets/images/offers_services/towels.png" alt="" /><span>Towels</span>
                    </div>
                </div>
            </div>
            <form action="../room-details.php" method="get">
                <input type="hidden" name="room_id" value="{{$room['id']}}" />
                <button type="submit" class="offers-intro__button button button--beige">
                    BOOK NOW
                </button>
            </form>
        </div>
    </div>
    @endforeach
</main>

<main class="offers-popular">
    <h4 class="subtitle-trigger">POPULAR LIST</h4>
    <h1 class="regular-title">Popular Rooms</h1>
    <div class="swiper swiper-rooms-offer">
        <div class="swiper-wrapper">
            @foreach ($roomsWithoutDiscounts as $room)
            <div class="offers-popular__card swiper-slide">
                <img src="{{$room['URL']}}" alt="a picture of a hotel room" />
                <div class="offers-popular__card-service-info">
                    <img src="../assets/images/miranda_services_info.png" alt="an illustration of the room services" />
                </div>
                <div class="offers-popular__text-container">
                    <h4 class="small-title">Minimal {{$room['room_type']}}</h4>
                    <p class="filled-text">
                        {{$room['quick_description']}}
                    </p>
                    <span class="offers-popular__text-frist-span price-amount">${{$room['price']}}/Night</span>&nbsp&nbsp&nbsp&nbsp<span class="offers-popular__text-second-span"><a href="../rooms.php">Check Availablity</a></span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next swiper-custom-buttons next"></div>
        <div class="swiper-button-prev swiper-custom-buttons prev"></div>
    </div>
</main>

@endsection