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
<svg style="display:none;">
  <symbol id="one" viewBox="0 0 1440 320" preserveAspectRatio="none">
    <path fill="white" d="M0,96L1440,320L1440,320L0,320Z"></path>
  </symbol>
  <symbol id="two" viewBox="0 0 1440 320" preserveAspectRatio="none">
    <path fill="white" d="M0,32L48,37.3C96,43,192,53,288,90.7C384,128,480,192,576,197.3C672,203,768,149,864,138.7C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
  </symbol>
  <symbol id="three" viewBox="0 0 1440 320" preserveAspectRatio="none">
    <path fill="white" d="M0,128L30,144C60,160,120,192,180,197.3C240,203,300,181,360,192C420,203,480,245,540,245.3C600,245,660,203,720,192C780,181,840,203,900,181.3C960,160,1020,96,1080,80C1140,64,1200,96,1260,122.7C1320,149,1380,171,1410,181.3L1440,192L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
  </symbol>
  <symbol id="four" viewBox="0 0 1440 320" preserveAspectRatio="none">
    <path fill="white" d="M0,192L120,192C240,192,480,192,720,165.3C960,139,1200,85,1320,58.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
  </symbol>
  <symbol id="five" viewBox="0 0 1440 320" preserveAspectRatio="none">
    <path fill="white" d="M0,32L120,69.3C240,107,480,181,720,192C960,203,1200,149,1320,122.7L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
  </symbol>
  <symbol id="six" viewBox="0 0 1440 320" preserveAspectRatio="none">
    <path fill="rgba(255, 255, 255, .8)" d="M0,32L120,64C240,96,480,160,720,160C960,160,1200,96,1320,64L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
  </symbol>
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
        <form action="{{ route('location.search') }}" method="GET">
         
    <div class="custom_input">
        <svg xmlns="http://www.w3.org/2000/svg" class="svg_icon bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path></svg>
        <input class="input" type="text" name="query" placeholder="FoodTruck Name">
        <button type="submit" class="btn">Search</button>
    </div>
           
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
</html>
</section>
<section class="cover-section position-relative">
  <div class="cover" style="background-image: url(https://media.istockphoto.com/id/1454128202/es/foto/puente-golden-gate-al-atardecer-en-larga-exposici%C3%B3n-contra-un-hermoso-fondo-de-cielo-azul.jpg?s=1024x1024&w=is&k=20&c=0H1FQAAUQj5yf5lC36gdcSyJ0LuudUSMu-9rrJcF0u0=);">
    <img src="https://media.istockphoto.com/id/1454128202/es/foto/puente-golden-gate-al-atardecer-en-larga-exposici%C3%B3n-contra-un-hermoso-fondo-de-cielo-azul.jpg?s=1024x1024&w=is&k=20&c=0H1FQAAUQj5yf5lC36gdcSyJ0LuudUSMu-9rrJcF0u0=" class="img-fluid invisible" alt="" />
  </div>
  <svg class="position-absolute w-100">
    <use xlink:href="#six"></use>
  </svg>
</section>
