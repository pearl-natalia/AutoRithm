<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food4Kids: Volunteer</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,regular,
    500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,
    800italic,900italic" rel="stylesheet" /> 
    
    <style>
        <?php include("style.css"); ?>
    </style>

    <!-- linking animations -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
<div class="container">
    <div class = "menu">
        <a href="apply.php">Apply</a>
        <a href="distance.php">Location</a>
    </div>

    <!-- animation -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

</div>

<body>

    <div class = "apply_txt">
        <h4><span style="font-weight: 400">Apply to be a volunteer today!</span></h4>
    </div>

    <div class = "apply_subtxt">
        <h5><span style="font-weight: 10">Use our algorithm to determine which role best suits you:<br>• Food packaging assembler<br>• Food proportioning crew member<br>• Drivers<br>• Grant writer<br>• Bingo volunteer</span></h5>
    </div>

    <div class = "role_replit">
        <iframe src="https://www.online-python.com/owlxULtSpN#control-btn" width="600" height="300">
            $('#output_header').load(function(){
                $('#output_header').contents().find('#leftpanel').hide();
                $('#output_header').contents().find('#toppanel').hide();
            });

        </iframe>
        
    </div>


    <div class = "form">
        <form action="https://formsubmit.co/46b8757b1334a09ad150615bc9678188" method="POST">
            <div class = "contact">
            <input type="text" id="name" class="no-outline" required placeholder="Name"> 
            </div>

            <div class = "contact">
            <input type="email" id="email" class="no-outline" required placeholder="Email">
            </div> 

            <div class = "contact">
            <input type="text" id="phoneNumber" class="no-outline" required placeholder="Phone Number">
            </div>  

            <div class = "contact">
                <input type="text" id="role" class="no-outline" 
                required placeholder="Enter your desired role">
            </div>  

            <div class = "contact">
            <input type="text" id="comments" class="no-outline" 
            required placeholder="Write any additional comments here...">
            </div>  

            <div class = "contact">
                <button type="submit">Apply!</button>
            </div>

            <input type="hidden" name="_next" value="https://spave.tech/thanks.html">
        </form>
    </div>



    
</body>
</html>