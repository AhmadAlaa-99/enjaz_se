<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ENJAZ COMPANY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('home/img/favicon.ico') }}">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ URL::asset('home/scss\bootstrap\scss\_images.scss') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/scss\bootstrap\scss\mixins\_image.scss') }}">

    <link rel="stylesheet" href="{{ URL::asset('home/lib/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/css/style.css') }}">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->

        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{ asset('home/img/icon-deal.png') }}" alt="Icon"
                            style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-2 text-primary">روعة انجاز</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('enjaz') }}" class="nav-item nav-link active">الصفحة الرئيسية</a>
                        <a href="{{ route('all_units') }}" class="nav-item nav-link">الوحدات الايجارية</a>

                    </div>
                    <a href="#contact" class="btn btn-primary px-3 d-none d-lg-flex">اتصل بنا</a>
                    <a href="{{ route('login') }}" class="btn btn-primary px-3 d-none d-lg-flex">تسجيل الدخول</a>


                </div>
            </nav>
        </div>
        <!-- Navbar End -->

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="{{ asset('home/img/about.jpg') }}">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">مؤسسة روعة انجاز للتطوير العقاري</h1>
                        <p class="mb-4">
                            </li> {{ $company->about }} </p>
                        <h2>الرؤية : </h2>
                        <p> <i class="fa fa-check text-primary me-3"> </i> {{ $company->vision }} </p>
                        <h2>الرسالة :</h2>
                        <p> <i class="fa fa-check text-primary me-3"> </i> {{ $company->mission }} </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Start
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    اعثر على منزل مثالي للعيش فيه مع عائلتك
                    <h1 class="display-5 animated fadeIn mb-4">  ابحث عن <span class="text-primary">منزل مثالي </span>
                        للعيش فيه مع عائلتك</h1>
                        <h1 class="display-9 animated fadeIn mb-4">
                            ان استئجار مكان جديد هو بداية ل
                            <span class="text-primary">شيء عظيم </span>

                        </h1>
                    <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">اتصل بنا</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid"src="{{ asset('home/img/about.jpg') }}" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="{{ asset('home/img/about.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Header End -->



        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form action="{{ route('property_search') }}" method="get">


                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input name="cost"type="text" class="form-control border-0 py-3"
                                        autocomplete="off"placeholder="تكلفة الايجار">
                                </div>
                                <div class="col-md-4">
                                    <select name="type" class="form-select border-0 py-3">
                                        <option placeholder="" value="">حدد النوع</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->Name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <select name="location" class="form-select border-0 py-3">
                                        <option placeholder="" value="">حدد المنطقة</option>
                                        @foreach ($quarters as $quarter)
                                            <option value="{{ $quarter->name }}">{{ $quarter->name }}</option>
                                        @endforeach



                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 py-3">بحث</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Search End -->

        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">أنواع العقارات الايجارية</h1>
                    <p></p>
                </div>
                <div class="row g-3">
                    @foreach ($types as $type)
                        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a class="cat-item d-block bg-light text-center rounded p-3"
                                href="{{ route('categories', ['key' => $type->id]) }}">
                                <div class="rounded p-4">
                                    <div class="icon mb-3">
                                        <img class="img-fluid" src="{{ asset('home/img/icon-apartment.png') }}"
                                            alt="Icon">
                                    </div>
                                    <h6>{{ $type->Name }}</h6>
                                    <span>{{ App\Models\Units::where('type_id', $type->id)->count() }} وحدة
                                        ايجارية</span>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3"> العقارات الايجارية</h1>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @forelse ($units as $unit)
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href="#contact"><img
                                                    class="img-fluid"style="height:230px;width:407px;"
                                                    src="{{ asset('units/' . $unit->img) }}" alt=""></a>
                                            <div
                                                class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                For Rent</div>
                                            <div
                                                class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                {{ $unit->type->Name }}</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">{{ $unit->rent_cost }}/ <span>شهريا</span>
                                            </h5>
                                            <a class="d-block h5 mb-2" href="">{{ $unit->main_show }}</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                                {{ $unit->address }}
                                            </p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-ruler-combined text-primary me-2"></i>
                                                {{ $unit->size }} مساحة</small>
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-bed text-primary me-2"></i> {{ $unit->rooms }} عدد
                                                الغرف</small>
                                            <small class="flex-fill text-center py-2"><i
                                                    class="fa fa-bath text-primary me-2"></i>
                                                {{ $unit->bathrooms }} دورات المياه</small>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    </br>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="{{ route('all_units') }}">تصفح كافة العقارات </a>
                    </div>
                </div>

            </div>
            <!-- Property List End -->


            <!-- Contact Start -->
            <div id="contact" class="container-xxl py-5">
                <div class="container">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 600px;">
                        <h1 class="mb-3">Contact Us</h1>
                        <p></p>
                    </div>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="row gy-4">
                                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="bg-light rounded p-3">
                                        <div class="d-flex align-items-center bg-white rounded p-3"
                                            style="border: 1px dashed rgba(0, 185, 142, .3)">
                                            <div class="icon me-3" style="width: 45px; height: 45px;">
                                                <i class="fa fa-map-marker-alt text-primary"></i>
                                            </div>
                                            <span> {{ $company->contact_address }} </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="bg-light rounded p-3">
                                        <div class="d-flex align-items-center bg-white rounded p-3"
                                            style="border: 1px dashed rgba(0, 185, 142, .3)">
                                            <div class="icon me-3" style="width: 45px; height: 45px;">
                                                <i class="fa fa-envelope-open text-primary"> </i>
                                            </div>
                                            <span> {{ $company->contact_email }} </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="bg-light rounded p-3">
                                        <div class="d-flex align-items-center bg-white rounded p-3"
                                            style="border: 1px dashed rgba(0, 185, 142, .3)">
                                            <div class="icon me-3" style="width: 45px; height: 45px;">
                                                <i class="fa fa-phone-alt text-primary"></i>
                                            </div>
                                            <span> {{ $company->contact_mobile }} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- Contact End -->


            <!-- Footer Start -->
            <!-- Remove the container if you want to extend the Footer to full width. -->
            <div class="container my-5">

                <footer class="bg-dark text-center text-white">


                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                        © 2023 Copyright:
                        <a class="text-white" href="">Enjaz Raoaa</a>
                    </div>
                    <!-- Copyright -->
                </footer>

            </div>
            <!-- End of .
            <!-- Footer End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                    class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

        <script type="text/javascript">
            var path = "{{ route('autocomplete') }}";

            $('#search').typeahead({
                source: function(query, process) {
                    return $.get(path, {
                        query: query
                    }, function(data) {
                        return process(data);
                    });
                }
            });

            function showMap(lat, long) {
                var coord = {
                    lat: lat,
                    lng: long
                };
                var map = new google.maps.Map(
                    document.getElementById("map"), {
                        zoom: 10,
                        center: coord

                    });
                new google.maps.Marker({
                    position: coord,
                    map: map,
                });
            }
            showMap(0, 0);
        </script>
        <script>
            $("#pac-input").focusin(function() {
                $(this).val('');
            });
            $('#latitude').val('');
            $('#longitude').val('');

            function initAutocomplete() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: 24.740691,
                        lng: 46.6528521
                    },
                    zoom: 13,
                    mapTypeId: 'roadmap'
                });

                // move pin and current location
                infoWindow = new google.maps.InfoWindow;
                geocoder = new google.maps.Geocoder();
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        map.setCenter(pos);
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(pos),
                            map: map,
                            title: 'موقعك الحالي'
                        });
                        markers.push(marker);
                        marker.addListener('click', function() {
                            geocodeLatLng(geocoder, map, infoWindow, marker);
                        });
                        // to get current position address on load
                        google.maps.event.trigger(marker, 'click');
                    }, function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    console.log('dsdsdsdsddsd');
                    handleLocationError(false, infoWindow, map.getCenter());
                }

                var geocoder = new google.maps.Geocoder();
                google.maps.event.addListener(map, 'click', function(event) {
                    SelectedLatLng = event.latLng;
                    geocoder.geocode({
                        'latLng': event.latLng
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                deleteMarkers();
                                addMarkerRunTime(event.latLng);
                                SelectedLocation = results[0].formatted_address;
                                console.log(results[0].formatted_address);
                                splitLatLng(String(event.latLng));
                                $("#pac-input").val(results[0].formatted_address);
                            }
                        }
                    });
                });

                function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {
                    var latlng = {
                        lat: markerCurrent.position.lat(),
                        lng: markerCurrent.position.lng()
                    };
                    /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                    $('#latitude').val(markerCurrent.position.lat());
                    $('#longitude').val(markerCurrent.position.lng());

                    geocoder.geocode({
                        'location': latlng
                    }, function(results, status) {
                        if (status === 'OK') {
                            if (results[0]) {
                                map.setZoom(8);
                                var marker = new google.maps.Marker({
                                    position: latlng,
                                    map: map
                                });
                                markers.push(marker);
                                infowindow.setContent(results[0].formatted_address);
                                SelectedLocation = results[0].formatted_address;
                                $("#pac-input").val(results[0].formatted_address);

                                infowindow.open(map, marker);
                            } else {
                                window.alert('No results found');
                            }
                        } else {
                            window.alert('Geocoder failed due to: ' + status);
                        }
                    });
                    SelectedLatLng = (markerCurrent.position.lat(), markerCurrent.position.lng());
                }

                function addMarkerRunTime(location) {
                    var marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });
                    markers.push(marker);
                }

                function setMapOnAll(map) {
                    for (var i = 0; i < markers.length; i++) {
                        markers[i].setMap(map);
                    }
                }

                function clearMarkers() {
                    setMapOnAll(null);
                }

                function deleteMarkers() {
                    clearMarkers();
                    markers = [];
                }

                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                $("#pac-input").val("أبحث هنا ");
                var searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function() {
                    searchBox.setBounds(map.getBounds());
                });

                var markers = [];
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();

                    if (places.length == 0) {
                        return;
                    }

                    // Clear out the old markers.
                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function(place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }
                        var icon = {
                            url: place.icon,
                            size: new google.maps.Size(100, 100),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        };

                        // Create a marker for each place.
                        markers.push(new google.maps.Marker({
                            map: map,
                            icon: icon,
                            title: place.name,
                            position: place.geometry.location
                        }));


                        $('#latitude').val(place.geometry.location.lat());
                        $('#longitude').val(place.geometry.location.lng());

                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);
                });
            }

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
                infoWindow.open(map);
            }

            function splitLatLng(latLng) {
                var newString = latLng.substring(0, latLng.length - 1);
                var newString2 = newString.substring(1);
                var trainindIdArray = newString2.split(',');
                var lat = trainindIdArray[0];
                var Lng = trainindIdArray[1];

                $("#latitude").val(lat);
                $("#longitude").val(Lng);
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=EG
                 async defer"></script>
        <script src="{{ URL::asset('home/lib/wow/wow.min.js') }}"></script>
        <script src="{{ URL::asset('home/lib/easing/easing.min.js') }}"></script>

        <script src="{{ URL::asset('home/lib/waypoints/waypoints.min.js') }}"></script>

        <script src="{{ URL::asset('home/lib/owlcarousel/owl.carousel.min.j') }}"></script>

        <script src="{{ URL::asset('home/js/main.js') }}"></script>
</body>

</html>
