
<?php
$closest_restaurant = "";
function getDistance($addressFrom, $addressTo){
    $apiKey = 'AIzaSyCOnY2nUozHy6-dTAnvvxHZHFgfKL1Rxl8';

    $city = ", Waterloo, ON, Canada";

    
    // Change address format
    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom.$city);
    $formattedAddrTo     = str_replace(' ', '+', $addressTo.$city);
    
    // Geocoding API request with start address
    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
    $outputFrom = json_decode($geocodeFrom);
    if(!empty($outputFrom->error_message)){
        return $outputFrom->error_message;
    }
    
    // Geocoding API request with end address
    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
    $outputTo = json_decode($geocodeTo);
    if(!empty($outputTo->error_message)){
        return $outputTo->error_message;
    }
    
    // Get latitude and longitude from the geodata
    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
    
    // Calculate distance between latitude and longitude
    $theta    = $longitudeFrom - $longitudeTo;
    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist    = acos($dist);
    $dist    = rad2deg($dist);
    $miles    = $dist * 60 * 1.1515;
    
    // Convert unit and return distance
    return round($miles * 1609.344, 2).' meters';
    }

    $path = parse_url($_SERVER["REQUEST_URI"])["path"];
    
    function closest($addressFrom){
        $drop_off = array("203 Lester St", "228 Albert St", 
        "170 University Ave W", "75 King St S", 
        "110 Erb St. W", "578 Weber St N", 
        "150 Wissler Rd", "425 University Ave");

        
        $distance1 = getDistance($addressFrom, $drop_off[0]);
        $restaurant = $drop_off[0];
            for($i = 1; $i < count($drop_off); $i++){
                if(getDistance($addressFrom, $drop_off[$i])<$distance1){
                    $distance1 = getDistance($addressFrom, $drop_off[$i]);
                    $restaurant = $drop_off[$i];
                }
            }
        return $restaurant;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food4Kids: Partner</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,regular,
    500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,
    800italic,900italic" rel="stylesheet" /> 
    
    <style>
        <?php include("style.css"); ?>
    </style>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<div class="container">
    <div class = "menu">
        <a href="apply.php">Apply</a>
        <a href="distance.php">Location</a>
    </div>/

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

</div>
<body>

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk"></script>

    <div class = "apply_txt">
        <h2>Enter your address to find the nearest pick-up location!</h2>
    </div>




    <div class = "form23">
        <?php ?>
        <form action ="distance.php" method="get">
        <input type = "text" name="origininput" placeholder="Enter your address">
        <input type="submit" value="send"></input>        
        </form>
        <br>
    </div>

    <div class="total2">
        <h1>Your closest location is <?php echo closest("105 Main St")?> </h1>
    </div>
    
    
    
</body>
</html>



