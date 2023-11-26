@extends("layouts.master")

@section("title", "Home | Laravel Portfolio")

@section("content")
<section class="banner" role="banner">
  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <div class="banner-text text-center">
        <h1>Hey, I'm Raju</h1>
        <p>Looking for a strategist and experienced developer?<br>
          Scroll to see my work.</p>
      </div>
    </div>
  </div>
</section>

<!-- description text section -->
<section id="descripton" class="section descripton">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 text-center">
      <p>Explore my innovative website designed to deliver a seamless user experience. Navigate effortlessly through
        reflexive interfaces crafted to engage and captivate. From sleek, modern design elements to robust
        functionality, my website offers a dynamic platform where creativity meets cutting-edge technology. Discover a
        digital space where ideas flourish, interactions spark, and user satisfaction is paramount. Join us on a journey
        through a captivating online experience crafted with precision, purpose, and passion.</p>
    </div>
  </div>
</section>

@include("components.portfolio")

@include("components.connect")

@endsection