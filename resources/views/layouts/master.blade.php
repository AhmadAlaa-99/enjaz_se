<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
 <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{ auth()->check() ? auth()->id() : '' }}">
<title>@yield('title')</title>
 @include('layouts.head')
</head>
	<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">

<div class="main-wrapper">
@include('layouts.header')

            @include('layouts.sidebar')
            @yield('content')

</div>
		@include('layouts.footer-scripts')

	</body>
</html>
