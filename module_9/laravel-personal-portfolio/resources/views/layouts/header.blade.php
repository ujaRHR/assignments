<header id="header">
    <div class="header-content clearfix">
        <a class="logo" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Portfolio">
        </a>
        <nav class="navigation" role="navigation">
            <ul class="primary-nav">
                <li><a href="/">Home</a></li>
                <li><a href="{{ route("about") }}">About Me</a></li>
                <li><a href="{{ route("projects") }}">Projects</a></li>
                <li><a href="{{ route("contact") }}">Contact</a></li>
            </ul>
        </nav>
        <a href="#" class="nav-toggle">Menu<span></span></a>
    </div>
</header>