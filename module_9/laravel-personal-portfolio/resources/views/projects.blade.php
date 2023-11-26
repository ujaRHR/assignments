@extends("layouts.master")

@section("title", "Projects | Laravel Portfolio")

@section("content")
<section class="banner" role="banner">
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="banner-text text-center">
                <h1>Projects</h1>
                <p>Explore Our Portfolio:<br>
                    Projects Showcase</p>
            </div>
        </div>
    </div>
</section>

@include("components.portfolio")
@include("components.testimonials")
@include("components.connect")

@endsection