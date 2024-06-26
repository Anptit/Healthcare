<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/frontend/vendors/images/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/frontend/vendors/images/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/frontend/vendors/images/favicon-16x16.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/vendors/styles/core.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/vendors/styles/icon-font.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/vendors/styles/style.css') }}" />
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="{{ route('nav.login') }}">
                    <img class="h-100" src="{{ asset('/frontend/vendors/images/deskapp-logo.svg') }}" alt="" />
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img class="w-100 h-100" src="{{ asset('/frontend/vendors/images/background.jpg') }}" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
   
    <!-- js -->
    <script src="{{ asset('/frontend/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('/frontend/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('/frontend/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('/frontend/vendors/scripts/core.js') }}"></script>
</body>

</html>