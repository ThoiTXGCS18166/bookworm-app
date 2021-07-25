<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bookworm</title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="navbar"></div>

    <h2 style="margin-top:25px;margin-left:50px;margin-bottom:25px;">About Us</h2>
    <hr style="margin-left:50px;margin-right:25px;margin-bottom:10px;">

    <div class="container" style="border-style:none;">
        <h1 style="text-align:center;margin-bottom:20px;">Welcome to Bookworm</h1>
        <br>
        <p style="font-size:30px;">"Bookworm is an independent New York bookstore and language school with locations in
            Manhattan and Brooklyn. We specialize in travel books and language classes."</p>
        <br>
        <div class="row">
            <div class="col">
                <h1>Our Story</h1>
                <br>
                <p style="font-size:25px;">The name Bookworm was taken from the original name for New York International Airport, which was renamed JFK in December 1963.</p>
                <p style="font-size:25px;">Our Manhattan store has just moved to the West Village. Our new location is 170 7th Avenue South, at the corner of Perry Street.</p>
                <p style="font-size:25px;">From March 2008 through May 2016, the store was located in the Flatiron District.</p>
            </div>
            <div class="col">
                <h1>Our Vision</h1>
                <br>
                <p style="font-size:25px;">One of the last travel bookstores in the country, our Manhattan store carries a range of guidebooks (all 10% off) to suit the needs and tastes of every traveler and budget.</p>
                <p style="font-size:25px;">We believe that a novel or travelogue can be just as valuable a key to a place as any guidebook, and our well-read, well-traveled staff is happy to make reading recommendations for any traveler, book lover, or gift giver.</p>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div id="footer"></div>
            <h7>BOOKWORM</h7>
            <p>Address</p>
            <p>Phone</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>