@extends("layouts.master")

@section("title", "Contact | Laravel Portfolio")

@section("content")
<section class="banner" role="banner">
  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <div class="banner-text text-center">
        <h1>Contact</h1>
        <p>Get Connected with Us!<br>
          Fill-up the box below to send a message.</p>
      </div>
    </div>
  </div>
</section>

<!-- description text section -->
<section id="inner-description" class="section inner-description">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 text-center">
      <p>Our contact form is your gateway to seamless communication. Fill in your details and inquiries, and our
        dedicated team will swiftly respond to address your needs. Whether you have questions, suggestions, or seek
        collaboration, our contact form ensures a prompt and personalized response. Experience hassle-free communication
        tailored to your convenience. Reach out today and let us assist you in achieving your goals.</p>

      <!-- Contact Form -->
      @include("components.form")
      
    </div>
  </div>
</section>

@include("components.testimonials")

@endsection