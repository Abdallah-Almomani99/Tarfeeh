<head>
    <!-- Page Title -->
    <title>@yield('title', 'Discover Top Entertainment Destinations - Tarfeeh Jordan')</title>

    <!-- Essential Meta Tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Tarfeeh - Explore the best entertainment and tourist destinations in Jordan. Book your spot at top venues and attractions in Jodran and across Jordan.')" />
    <meta name="keywords" content="@yield('meta_keywords', 'Tarfeeh, entertainment in Jordan, Jodran tourism, entertainment venues, Jordan bookings, tourist destinations')" />
    <meta name="author" content="Tarfeeh - Jordan" />

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'Discover Top Entertainment Spots with Tarfeeh')" />
    <meta property="og:description" content="@yield('og_description', 'Tarfeeh - Jordan’s premier platform for discovering top entertainment and tourist destinations in Jodran and beyond.')" />
    <meta property="og:image" content="@yield('og_image', asset('assets/user_assets/images/default_og_image.jpg'))" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('twitter_title', 'Tarfeeh - Discover Entertainment in Jordan')" />
    <meta name="twitter:description" content="@yield('twitter_description', 'Enjoy a unique entertainment experience with Tarfeeh, the ideal platform for exploring tourist and entertainment spots in Jordan.')" />
    <meta name="twitter:image" content="@yield('twitter_image', asset('assets/user_assets/images/default_twitter_image.jpg'))" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/user_assets/images/abooz.gif') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/user_assets/images/apple-touch-icon.png') }}" />

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/user_assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user_assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user_assets/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user_assets/style.css') }}" />

</head>
