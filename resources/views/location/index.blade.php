<!DOCTYPE html>
<html>
<head>
    <title>Location Search</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $googleMapsApiKey }}&callback=initMap" async defer></script>

</head>
<body>
    <div class="container">
        <h1> Find your favorite Food Truck </h1>
        <form action="{{ route('location.search') }}" method="GET">
            <input type="text" name="query" placeholder="Enter the name of the place">
            <button type="submit">Search</button>
        </form>

        @if(isset($location))
            <h2>Location {{ $location->applicant }}</h2>
            <div id="map"></div>
            <script>
                function initMap() {
                    var location = { lat: {{ $location->latitude }}, lng: {{ $location->longitude }} };
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 14,
                        center: location
                    });
                    var marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });
                }
                initMap();
            </script>

            <div class="container">
            <h2>Food Trucks in San Francisco</h2>   
            <table class="table">
            <thead>
                <tr>
                    <th>Applicant</th>
                    <th>Location Description</th>
                    <th>Food Items</th>
                    <th>Schedule</th>
                    <th>Days/Hours</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td>{{ $location->applicant }}</td>
                    <td>{{ $location->locationdescription }}</td>
                    <td>{{ $location->fooditems }}</td>
                    <td>{{ $location->schedule }}</td>
                    <td>{{ $location->dayshours }}</td>
                </tr>
            </tbody>
            </table>
            </div>
        @endif
    </div>
</body>
</html>