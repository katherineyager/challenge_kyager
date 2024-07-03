<!DOCTYPE html>
<html>
<head>
    <title>Location Search</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <svg style="display:none;">
        <!-- SVG symbols -->
    </svg>
    <section class="hero-section position-relative">
        <img src="https://media.istockphoto.com/id/1495174423/es/foto/cami%C3%B3n-de-comida-van-con-ventana-abierta-y-comida-y-bebidas-para-llevar.jpg?s=1024x1024&w=is&k=20&c=J3ZyXFRzgAYibM01nIhsL-EP_3FDlDc6QtvUsHjliFM=" alt="">
        <div class="overlay position-absolute d-flex align-items-center justify-content-center font-weight-bold text-white h2 mb-0">
            <blockquote class="p-4 mb-0">
                <p>Find your favorite Food Truck </p>
                <footer class="blockquote-footer text-white text-right">In San Francisco</footer>
            </blockquote>
        </div>
        <svg class="position-absolute w-100">
            <use xlink:href="#one"></use>
        </svg>
    </section>
    <section>
        <div class="container">
            <h1> Search your favorite Food Truck </h1>
            <form action="{{ route('location.search') }}#search" method="GET">
                <div class="custom_input">
                    <svg xmlns="http://www.w3.org/2000/svg" class="svg_icon bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                    </svg>
                    <input class="input" type="text" name="query" placeholder="FoodTruck Name">
                    <button type="submit" class="btn" id="search">Search</button>
                </div>
            </form>

            @if(isset($locations))
                @if($locations->isEmpty())
                    <p>No locations found.</p>
                @else
                    <div class="container">
                        <h2>Food Trucks in San Francisco</h2>
                        <table class="table" id="results-table">
                            <thead>
                                <tr>
                                    <th>Applicant</th>
                                    <th>Location Description</th>
                                    <th>Food Items</th>
                                    <th>Schedule</th>
                                    <th>Days/Hours</th>
                                    <th>Map</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $location)
                                    <tr>
                                        <td>{{ $location->applicant }}</td>
                                        <td>{{ $location->locationdescription }}</td>
                                        <td>{{ $location->fooditems }}</td>
                                        <td><a href="{{ $location->schedule }}">{{ $location->schedule }}</a></td>
                                        <td>{{ $location->dayshours }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#locationModal-{{ $location->locationid }}">
                                                Map
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="locationModal-{{ $location->locationid }}" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel-{{ $location->locationid }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="locationModalLabel-{{ $location->locationid }}">Map Location</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="map-{{ $location->locationid }}" style="height: 400px; width: 100%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                function initMap{{ $location->locationid }}() {
                                                    const location = { lat: {{ $location->latitude }}, lng: {{ $location->longitude }} };
                                                    const map = new google.maps.Map(document.getElementById('map-{{ $location->locationid }}'), {
                                                        zoom: 12,
                                                        center: location,
                                                    });
                                                    const marker = new google.maps.Marker({
                                                        position: location,
                                                        map: map,
                                                    });
                                                }

                                                // Add event listener for modal open to initialize map
                                                document.getElementById('locationModal-{{ $location->locationid }}').addEventListener('shown.bs.modal', function () {
                                                    initMap{{ $location->locationid }}();
                                                });
                                            </script>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination Links -->
                        {{ $locations->links() }}
                    </div>
                @endif
            @endif
        </div>
    </section>
    <section class="cover-section position-relative">
        <div class="cover" style="background-image: url(https://media.istockphoto.com/id/1454128202/es/foto/puente-golden-gate-al-atardecer-en-larga-exposici%C3%B3n-contra-un-hermoso-fondo-de-cielo-azul.jpg?s=1024x1024&w=is&k=20&c=0H1FQAAUQj5yf5lC36gdcSyJ0LuudUSMu-9rrJcF0u0=);">
            <img src="https://media.istockphoto.com/id/1454128202/es/foto/puente-golden-gate-al-atardecer-en-larga-exposici%C3%B3n-contra-un-hermoso-fondo-de-cielo-azul.jpg?s=1024x1024&w=is&k=20&c=0H1FQAAUQj5yf5lC36gdcSyJ0LuudUSMu-9rrJcF0u0=" class="img-fluid invisible" alt="" />
        </div>
        <svg class="position-absolute w-100">
            <use xlink:href="#six"></use>
        </svg>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_maps_api_key') }}&callback=initMap" async defer></script>
    <script>
        $(document).ready(function() {
            if (window.location.hash === '#results-table') {
                document.getElementById('results-table').scrollIntoView();
            }

            // Add hash to pagination links
            $('.pagination a').each(function() {
                this.href += '#results-table';
            });
        });

        function initMap() {
            // Initialize all maps
            @foreach($locations as $location)
                initMap{{ $location->locationid }}();
            @endforeach
        }
    </script>
</body>
</html>