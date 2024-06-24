<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>Chatting Application</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/emojionearea.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>

<body>

<!--==================================
    Chatting Application Start
===================================-->
   @yield('content')
<!--==================================
    Chatting Application End
===================================-->


<!--jquery library js-->
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<!--bootstrap js-->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!--font-awesome js-->
<script src="{{ asset('js/Font-Awesome.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/venobox.min.js') }}"></script>
<script src="{{ asset('js/emojionearea.min.js') }}"></script>

<!--main/custom js-->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/messenger.js') }}"></script>

</body>

</html>
