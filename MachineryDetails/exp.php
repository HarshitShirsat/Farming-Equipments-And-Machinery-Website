<div class="container">
    <h1>Add Equipment</h1><br>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="myform form ">
                <form enctype="multipart/form-data" method="post" name="login">
                    <div class="form-group">
                        <input type="text" name="id"  class="form-control my-input" placeholder="Equipment ID">
                    </div>
                    <div class="form-group">
                        <input type="text" name="name"  class="form-control my-input"  placeholder="Equipment Name">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image"  class="form" id="image" placeholder="Image">
                    </div>

                    <div class="text-center ">
                        <button type="submit" name="add" id="insert" class=" btn btn-block send-button tx-tfm">Submit</button>
                    </div>

                    <div class="col-md-12 ">
                        <div class="login-or">
                            <hr class="hr-or">

                        </div>
                    </div>



                </form>
                <?php

                $con = mysqli_connect("localhost", "root", "", "farmer_machinery_and_equipment") or die(mysqli_error($con));

                if(isset($_POST["add"]))
                {
                    $n=$_POST["id"];
                    $n1=$_POST["name"];
                    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

                    try{
                        $qry=mysqli_query($con,"INSERT INTO `Machinery_Details`(`Equipment_Id`,`Equipment_Name`,`Image` ) 
          values('$n','$n1','$file')")or die(mysqli_error($con));
                    }
                    catch (mysqli_sql_exception $e) {

                        echo "package doesnt exist";

                    }
                    if($qry==true)
                    {
                        {
                            echo "
    <script>
    alert('Equipment added Successfully');
    window.location='/Testproject/MachineryDetails/exp.php';
    </script>
  ";
                        }
                    }

                }
                ?>

                <script>
                    $(document).ready(function(){
                        $('#insert').click(function(){
                            var image_name = $('#image').val();
                            if(image_name == '')
                            {
                                alert("Please Select Image");
                                return false;
                            }
                            else
                            {
                                var extension = $('#image').val().split('.').pop().toLowerCase();
                                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                                {
                                    alert('Invalid Image File');
                                    $('#image').val('');
                                    return false;
                                }
                            }
                        });
                    });


                    <?php
                    $connect = mysqli_connect("localhost", "root", "", "farmer_machinery_and_equipment");
                    $query ="SELECT Equipment_ID,Equipment_Name,Image from machinery_details";
                    $result = mysqli_query($connect, $query);
                    ?>

                    <div class="container-fluid">





                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark" style="text-align: center;">Equipment Management</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-striped table-light" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                        <tr>
                        <td>Equipment Id</td>
                        <td>Equipment Name</td>
                        <td>Image</td>



                        <td>Delete</td>

                        </tr>
                        </thead>
                        <?php
                        while($row = mysqli_fetch_array($result))
                        {
                            echo '  
                               <tr>  
                                    <td>'.$row["Equipment_ID"].'</td>  
                                    <td>'.$row["Equipment_Name"].'</td>  
                                      <td>
<img style="width:25%; height=25%;" src="data:image/jpeg;base64,'.base64_encode($row["image"]).'"/>
                                     </td>    
                                  
                                     
                                    <td><a class="btn btn-info" href="equipmentdelete.php?id='.$row['Equipment_ID'].'">Delete</a></td>
 
                                    
                               </tr>  
                               ';
                        }
                        ?>
                        </table>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
