@extends("layouts.master")

@section("title", "About | Laravel Portfolio")

@section("content")
<section class="banner" role="banner">
  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <div class="banner-text text-center">
        <h1>About Me</h1>
        <p>Want to Know More?<br>
          Scroll to see my story</p>
      </div>
    </div>
  </div>
</section>

<!-- description text section -->
<section id="inner-description" class="section inner-description">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 text-center"> <img src="{{asset('images/designer-pic.jpg')}}"
        alt="Designer Picture">
      <h1>Reajul Hasan Raju</h1>
      <p>!Backend Developer</p>
    </div>
    
    <div class="col-md-10 col-md-offset-1 space">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu urna vel odio fermentum condimentum. Curabitur
        fringilla justo nec velit viverra congue. Fusce varius ex vel mi efficitur, at tincidunt nulla facilisis. Nam
        nec
        metus nec dolor consequat suscipit. Vivamus nec tincidunt ante. Cras tincidunt arcu at nisi aliquam, at aliquam
        nunc facilisis.</p>
      <p>Maecenas dignissim lorem eget purus pellentesque, vitae malesuada ex ullamcorper. Integer nec purus tincidunt,
        tristique nulla eu, vestibulum turpis. Duis a magna vitae nunc rutrum vulputate. Nulla facilisi. Ut vitae lacus
        vitae libero fermentum rhoncus. Sed congue metus ac ex ullamcorper, at dapibus elit tristique.</p>
      <p>Donec ultricies sagittis purus, non facilisis felis commodo sit amet. Quisque molestie urna et odio feugiat,
        sed
        lobortis velit scelerisque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
        egestas. Sed laoreet neque et fermentum tincidunt. Mauris tincidunt erat at mi fringilla, vitae posuere quam
        luctus. Vivamus nec dui eu arcu sagittis interdum.</p>

    </div>
  </div>
</section>


@include("components.connect")

@endsection