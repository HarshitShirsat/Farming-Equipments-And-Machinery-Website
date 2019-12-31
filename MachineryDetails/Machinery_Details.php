<?php
$con = mysqli_connect("localhost", "root", "", "farmer_machinery_and_equipment") or die(mysqli_error($con));
$select_query = "SELECT Equipment_ID, Equipment_Name, Used_For, Cost FROM machinery_details";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            background-image: url("/Myproject/img/green.jpg");
        ;
        }

        #myInput{ background-position: 10px 12px;
            width: 20%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */}

    </style>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: green;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: black;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>
      <title>Equipment Details</title>
      <link rel="stylesheet" type="text/css" href="/Testproject/style.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <!--jQuery library-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <!--Latest compiled and minified JavaScript-->
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	 </head>
</head>


<body>

    <div class="green">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">About</a>
            <a href="/Testproject/start.html">Home</a>
            <a href="/Testproject/MachineryDetails/Machinery_Details.php">Machinery Details</a>
            <a href="/Testproject/DealerDetails/Dealer_Details.php">Dealer Details</a>
            <a href="/Testproject/ManufacturerDetails/Manufacturer_Details.php">Manufacturer Details</a>
            <a href="/Testproject/BuyOrRent/Buy_Rent.php">Buy Equipment</a>
            <a href="/Testproject/BuyOrRent/Farmer_Owned_Equipment.php">Owned Equipments</a>
        </div>

        <div id="main">
            <!--    <h2>Sidenav Push Example</h2>-->
            <!--        <p>Click on the element below to open the side navigation menu, and push this content to the right.</p>-->
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; DASHBOARD</span>
        </div>

        <h1 style="text-align: center">MACHINERY DETAILS</h1>

        <form>
            <input class="form-control " id="myInput" type="text" placeholder="Search..">
        </form>
        <form method="post" action="SMachinery_Details.php">
            <input type="submit" value="Advanced Search" class="btn btn-light push">
        </form>
        <br>
        <br>
        <form method="post" action="pics.html">
            <input type="submit" value="More Info" class="btn btn-light push">
        </form>

       <?php echo "<table id='Equi_Table' class=\"table table-dark table-hover\"><thead><tr><th>Equipment ID</th><th>Equipment Name</th><th>Used For</th><th>Cost(Rs)</th></tr></thead><tbody>"; ?>
	    <?php while ($row = mysqli_fetch_array($select_query_result))
        { ?>
            <?php echo "<thread>"."<tr><td>". $row["Equipment_ID"]. "</td><td>". $row["Equipment_Name"]. "</td><td>".$row["Used_For"]. "</td><td>". $row["Cost"]."</td></tr>"."</thread>"; ?>

		<?php } ?>


        <hr/>
    </div>

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#Equi_Table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }
    </script>
</body>
</html>	
         		 