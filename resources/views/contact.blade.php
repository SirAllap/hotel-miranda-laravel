@extends('layout')
@section('title', 'Contact')

@section('content')

<main class="contact-intro">
	<div class="contact-intro__text">
		<section class="contact-intro__head-section">
			<h5 class="contact-intro__head-text subtitle-trigger">
				THE ULTIMATE LUXURY
			</h5>
			<h1 class="contact-intro__head-text big-title">
				New Details
			</h1>
			<div class="contact-intro__breadcrumbs-container">
				<div class="contact-intro__breadcrumbs">
					<a href="/index.php"><span class="contact-intro__breadcrumbs-home">Home</span></a>
					<span class="contact-intro__breadcrumbs-separator">&nbsp|&nbsp</span>
					<span class="contact-intro__breadcrumbs-about">Blog</span>
				</div>
			</div>
		</section>
	</div>
</main>

<main class="contact-intro__cards">
	<div class="contact-intro__card1">
		<img src="../assets/images/contact_icons/email_icon.png" alt="" />
		<div>
			<h4 class="small-title">Hotel Address</h4>
			<p class="filled-text">
				19/A, Cirikon City hall Tower New York, NYC
			</p>
		</div>
	</div>
	<div class="contact-intro__card2">
		<img src="../assets/images/contact_icons/call_icon.png" alt="" />
		<div>
			<h4 class="small-title">Phone Number</h4>
			<p class="filled-text">+ 876 766 8675 765 6</p>
			<p class="filled-text">+ 97656 8675 7864 7</p>
		</div>
	</div>
	<div class="contact-intro__card3">
		<img src="../assets/images/contact_icons/address_icon.png" alt="" />
		<div>
			<h4 class="small-title">Email</h4>
			<p class="filled-text">info@webmail.com</p>
			<p class="filled-text">jobs.webmail@mail.com</p>
		</div>
	</div>
</main>

<main class="contact-intro__gmap">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48363.48103000033!2d-74.02873812906013!3d40.74623987516722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258fda88cefb3%3A0x7f1e88758d210007!2sNew%20York%20City%20Hall!5e0!3m2!1sen!2ses!4v1695151891145!5m2!1sen!2ses" width="100%" height="200" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</main>

<main class="contact-intro__form">
	<div class="contact-intro__form-wrapper">
		<form method="post">
			<input id="input-name" name="name" placeholder="Your full name" type="text" required />
			<input id="input-phone" name="phone" placeholder="Add phone number" type="text" required />
			<input id="input-email" name="email" placeholder="Enter email address" type="text" required />
			<input id="input-subject" name="subject" placeholder="Enter subject" type="text" required />
			<div class="contact-intro__form-wrapper">
				<textarea name="message" placeholder="Enter message" id="input-messsage-body" cols="30" rows="10" required></textarea>
			</div>
			<button type="submit" class="contact-intro__form-button button button--beige button--auto">
				SEND
			</button>
		</form>
	</div>
</main>

@endsection