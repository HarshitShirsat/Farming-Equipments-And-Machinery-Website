<?php
$con = mysqli_connect("localhost", "root", "", "farmer_machinery_and_equipment") or die(mysqli_error($con));
$select_query = "SELECT  Equipment_ID,  Dealer_ID, Manufacturer_ID, Quantity FROM Farmer_Owned_Equipment";
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

    <!--<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">-->
   <!-- <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">

    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
  <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->


    <title>Owned Equipments</title>
    <link rel="stylesheet" type="text/css" href="/Myproject/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="modal fade" id="deletemodal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3>Sell Equipment</h3>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="deleteuser.php" method="POST">
                <div class="modal-body">
                    <h4>Do you want to sell this equipment???</h4>

<!--                    <div class="form-group">-->

<!--                        <input type="hidden" name="fid" id="farmerid">-->
<!--                    </div>-->
                    <div class="form-group">

                        <br>
                        <input type="hidden" name="eid" id="equipmentid">
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="did" id="dealerid">
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="mid" id="manufacturerid">
                    </div>

                </div>


                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" name="updatedata" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" name="deletedata" class="btn btn-primary" >Yes</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="green ">
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
    <h1 style="text-align: center">EQUIPMENTS BOUGHT</h1>
    <form >
        <input class="form-control" id="myInput" type="text" placeholder="Search.." width="10">
    </form>

    <?php echo "<table id='Deal_Table' class=\"table table-light table-hover \"><thead><tr><th>Equipment ID</th><th>Dealer ID</th><th>Manufacturer ID</th><th>Piece(s)</th><th>Sell</th></tr></thead><tbody>"; ?>
    <?php while ($row = mysqli_fetch_array($select_query_result))
    { ?>
        <?php
        $m="Sell";
        echo "<thread>"."<tr><td>". $row["Equipment_ID"]. "</td><td>".$row["Dealer_ID"]. "</td><td>".$row["Manufacturer_ID"]. "</td><td>".$row["Quantity"]."</td><td><button type='button' class='btn btn-danger deletebtn'>$m</button></td></tr>". "</thread>"; ?>
    <?php }  ?>
    <hr/>
<!--    <form action="deletion.ph"></form>-->
</div>


<script>
    $(document).ready(function()
    {
        $('.deletebtn').on('click',function()
        {

            $('#deletemodal').modal('show');
            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function()
            {

                return $(this).text();
            }).get();
            console.log(data);
            // $('#farmerid').val(data[0]);
            $('#equipmentid').val(data[0]);
            $('#dealerid').val(data[1]);
            $('#manufacturerid').val(data[2]);

        });
    });
</script>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#Deal_Table tr").filter(function() {
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

