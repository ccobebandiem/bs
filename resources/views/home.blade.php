@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!

                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myjsfile')
    <script>
        var map;
        var marker;
        var purple_icon = 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png';
        var bus_icon = 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png';

        // // add bus stop location
        var locations = [
            ['bus 1', 20.986796, 105.783503],
            ['bus 2', 20.980781, 105.788942],
            ['bus 3', 20.978708, 105.785608],
            ['bus 4', 20.978032, 105.787743],
            ['bus 5', 20.974833, 105.779845],
            ['bus 6', 20.973321, 105.784884]
        ];

        function rad(x) {
            return x * Math.PI / 180;
        }

        // Initialize and add the map
        function initMap() {
            // The location of user
            var userlocal = {lat: 20.977255, lng: 105.783246};
            // The map, centered at user location
            map = new google.maps.Map(
                document.getElementById('map'), {
                    zoom: 14,
                    center: userlocal
                });

            // The marker, positioned at user
            marker = new google.maps.Marker({
                position: userlocal,
                map: map,
                title: 'You are here'
            });

            // Info window
            var infowindow = new google.maps.InfoWindow();

            var i;
            var min = {};
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    icon: purple_icon,
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));

                var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(locations[i][1], locations[i][2]), new google.maps.LatLng(20.977255, 105.783246));

                if (i == 0) {
                    min.index = i;
                    min.distance = distance;
                } else {
                    if (distance < min.distance) {
                        min.index = i;
                        min.distance = distance;
                    }
                }
            }

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[min.index][1], locations[min.index][2]),
                icon: bus_icon,
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[min.index][0] + ' This is the bus point closest to you');
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    </script>
@endsection
