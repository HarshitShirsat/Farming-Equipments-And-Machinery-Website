<?php
$con = mysqli_connect("localhost", "root", "", "farmer_machinery_and_equipment") or die(mysqli_error($con));
if(isset($_POST['deletedata']))
{

//    $farmer=$_POST['fid'];
    $equip=$_POST['eid'];
    $dealer=$_POST['did'];
    $manu=$_POST['mid'];

    $query="DELETE from Farmer_Owned_Equipment where  Equipment_ID='$equip' and Dealer_ID='$dealer' and Manufacturer_ID='$manu'";
    $result=mysqli_query($con,$query);
    if($result)
    {

        echo '<script> alert("Data deleted");</script>';
        header('Location:Farmer_Owned_Equipment.php');

    }
    else
    {
        echo '<script> alert("data not found");</script>';
    }
}
?>