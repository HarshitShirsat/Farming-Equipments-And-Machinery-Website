<!DOCTYPE html>
<html><head><title>Buy</title>
    <style>
        body{
            text-align: center;
            background-image:url("/Myproject/img/green.jpg");
        }p{font-family: "Times New Roman";color:yellow;}
        h3{color:lawngreen;}
        h1{
            font-family: "Showcard Gothic";
            text-align: center;color:orangered;
        }
        .mk{
            text-align:left;color:#f24216;font-family:stencil;border-collapse: collapse;
            border: 0px solid;padding:4px;}
        div{
            background-color:green;
            top:100px;
            right:100px;left:160px;width:1000px;height:900px;position:sticky;}
        table{
            text-align:center;margin-right:auto;margin-left:auto;
            font-family:Calibri;color:#2b2524;border-collapse: collapse;}
        table, th, td {color:black;
            border: 1px solid black;padding:10px;
        }
        th{background-color: lightcoral}
        /*td{background-color: wheat}*/
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body><div>

    <h1>BUY AN EQUIPMENT:</h1>
    <center>
    <?php
    $d=mysqli_connect('localhost','root','','farmer_machinery_and_equipment') or die("Error connecting to MySQL server.");
    $rq=mysqli_query($d,"Select distinct(Equipment_Name) from Machinery_Details");
    echo "<form method='POST' action=''><h2 style='color:lawngreen'><br>Select the name of the Machinery/Equipment:</h2><br><select name='mach'><option disabled selected value> -- Select a Machinery/Equipment -- </option>";
    while($rop=mysqli_fetch_array($rq,MYSQLI_NUM)){
        echo "<option value='$rop[0]'>$rop[0]</option>";}
    echo "</select>     <input type='submit' value='  OK  ' class='btn btn-dark'></form><br><br>";
    if(isset($_POST["mach"]))
    {
        $dw=$_POST["mach"];
        echo "<h2 style='color: yellow'>Machinery/Equipment: $dw</h2>";
        echo "<form method='post' action='/Testproject/MachineryDetails/pics.html'> <input type='submit' value='More Info' class='btn btn-light push'></form><br>";

//        $q=mysqli_query($d,"Select distinct(D.Dealer_ID),MND.Manufacturer_ID,D.Dealer_Name,D.Location_Of_Store,S.Quantity ,MCD.Cost,MND.Manufacturer_Name from Dealer_Details D,Manufacturer_Details MND,Machinery_Details MCD,Manufactured_From MF, Sells S  where MCD.Equipment_Name='$dw'and D.Dealer_ID=S.Dealer_ID and MF.Equipment_ID=MCD.Equipment_ID and MCD.Equipment_ID=S.Equipment_ID and MCD.Equipment_ID=S.Equipment_ID");
        $q=mysqli_query($d,"Select distinct (D.Dealer_ID),MND.Manufacturer_ID,D.Dealer_Name,D.Location_Of_Store,MF.Quantity ,MCD.Cost,MND.Manufacturer_Name,MCD.Equipment_ID 
                                   from Dealer_Details D,Manufacturer_Details MND,Machinery_Details MCD,Manufactured_From MF ,Sells S  
                                   where MCD.Equipment_Name='$dw'and D.Dealer_ID=S.Dealer_ID and MF.Equipment_ID=MCD.Equipment_ID and MCD.Equipment_ID=S.Equipment_ID and MCD.Equipment_ID=S.Equipment_ID and MF.Manufacturer_ID=MND.Manufacturer_ID");
        echo "<h3>Select the Dealer:</h3><form action='./BillGenerate.php' method='post'>";
        echo "<table class=\"table  table-light table-hover\"><tr><th>Option</th><th>Dealer Name</th><th>Location</th><th>Pieces</th><th>Cost</th><th>Manufacturer Name</th></tr>";
        while($row=mysqli_fetch_array($q,MYSQLI_NUM))
        {
            echo "<tr><td><input type='radio' name='radio1' value='$row[0],$row[1],$row[7]' checked></td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
        }

//        $m=mysqli_query($d,"Select /*D.Dealer_ID,D.Dealer_Name,D.Location_Of_Store*/ MCD.Cost,MND.Manufacturer_Name,MND.Manufacturer_ID from /*Dealer_Details D*/Manufacturer_Details MND,Machinery_Details MCD,Manufactured_From MF/* Sells S*/  where MCD.Equipment_Name='$dw'and /*D.Dealer_ID=S.Dealer_ID and */MF.Equipment_ID=MCD.Equipment_ID and MF.Manufacturer_ID=MND.Manufacturer_ID");

//        echo "<table><tr><th>Option</th><th>Cost</th><th>Manufacturer Name</th><th>Manufacturer ID</th></tr>";
//        while($row=mysqli_fetch_array($m,MYSQLI_NUM))
//        {
//            echo "<tr><td><input type='radio' name='radio2' value='$row[0],$row[2]' checked></td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
//        }
//        echo "<h3>Select the Manufacturer:</h3><form action='./BillGenerate.php' method='post'>";*/
        mysqli_close($d);

    }
    else
    {
        echo "";
    }
/*    if(isset($_POST['submit']))
    {
        $sql="INSERT INTO FARMER_OWNED_EQUIPMENTS(Equipment_ID,Dealer_ID,Manufacturer_ID) values('$row[0]') "
    }*/
    ?>
    </table><br><h3 style='color:yellow'>Pieces:
        <input type='number' id='Qty' name='Qty' min=0 value=0 ></h3>
    <br><h3 style='color:yellow';>Enter the Date:  <input type="date" name="dat" max='<?php echo date('Y-m-d'); ?>' value='<?php echo date('Y-m-d'); ?>'></h3><br><input type='Submit' value='Buy' class="btn btn-dark">  <input type="reset" value="Reset" class="btn btn-dark"</h3></form>
        <br><br><p style="text-align:right;color:yellow"><a href="/Testproject/start.html">HOME</a></p></center>
</div>
</body>
</html>