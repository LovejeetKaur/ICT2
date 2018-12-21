<?php
session_start();
include "connection.php";
$email = $_SESSION["email"];

$s = "select * from stu_reg where email='" . $email . "'";

$result = mysqli_query($conn, $s);
$flag = 0;
if ($row = mysqli_fetch_array($result)) {
    include "header.php";
    ?>

    <script>
        function openadddocument()
        {

            $("#myModal").modal("show");

        }

        function editmodal(did, name, path)
        {

            document.getElementById("edid").value = did;
            document.getElementById("ename").value = name;

            $("#myModal1").modal("show");

        }

        function editprofile(fname, mname, lname, dateofbirth, mobileno, address, country, gender)
        {
            $("#myModal2").modal("show");
            document.getElementById("fname").value = fname;
            document.getElementById("mname").value = mname;
            document.getElementById("lname").value = lname;
            document.getElementById("dateofbirth").value = dateofbirth;
                        document.getElementById("mobileno").value = mobileno;

            document.getElementById("address").value = address;
            document.getElementById("country").value = country;
            document.getElementById("gender").value = gender;

        }


    </script>


    <div class="main_body" style="min-height:600px;margin-top:160px;padding:50px;">
        <h1 class="mainhead">DashBoard</h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="studentinfo">
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Student Name :</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["fname"] . " " . $row["mname"] . " " . $row["lname"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Date of Birth :</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["dateofbirth"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Address :</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["address"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Country:</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["country"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Email:</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["email"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Phone:</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["mobileno"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="text-align:right;"><button class="btn btn-lg btn-primary"  onclick="editprofile('<?php echo $row["fname"] ?>', '<?php echo $row["mname"] ?>', '<?php echo $row["lname"] ?>', '<?php echo $row["dateofbirth"] ?>', '<?php echo $row["mobileno"] ?>', '<?php echo $row["mobileno"] ?>', '<?php echo $row["address"] ?>', '<?php echo $row["country"] ?>', '<?php echo $row["gender"] ?>')">Edit</button></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="studentinfo" style="text-align:center;background:#eeeeee;">
                    <img src="images/dummy.png" style="width:180px;height:180px;border:1px solid #000;" >
                    <div class="row">
                        <div class="col-sm-12" style="text-align:center;margin-top:20px;"><button class="btn btn-small btn-primary" >Edit Photo</button></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1 style="color: #000;margin: 20px;">Uploaded Documents</h1>
                <div style="margin: 20px;background: #ffe8a1;">
                    <div class="row" >

                        <?php
                        $s = "select * from documents where email='" . $email . "'";

                        $result = mysqli_query($conn, $s);
                        $flag = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-sm-3" >
                                <div  style="text-align:center;box-shadow:1px 1px 1px #000;height:220px;width:200px;margin:50px auto;background: #ffffff">
                                    <img src="images/document.png" style="width:100px;height:100px;margin-top:10%;" />
                                    <h2 style="color:#000;margin-top:20px;"><?php echo $row["name"]; ?></h2>
                                    <button class="btn btn-small btn-primary" onclick="editmodal('<?php echo $row["did"]; ?>', '<?php echo $row["name"]; ?>', '<?php echo $row["path"]; ?>')">Edit</button>

                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="col-sm-3" onclick="openadddocument()">
                            <div  style="text-align:center;box-shadow:1px 1px 1px #000;height:220px;width:220px;margin:50px auto;background: #b8daff;">
                                <img src="images/add.png" style="width:100px;height:100px;margin-top:10%;" />
                                <h4 style="color:#000;margin-top:20px;">ADD MORE</h4>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>



    <?php
}
?>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">


                <h4 class="modal-title" style="color: #000;text-align: center;">ADD DOCUMENT</h4>
            </div>
            <div class="modal-body">
                <form action="adddocument.php" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="name">Enter Document Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Document Name" name="name">
                    </div>
                    <div class="form-group">
                        <label >Document</label>
                        <input type="file" class="form-control" id="photo" placeholder="Choose Document" name="photo">
                    </div>

                    <button type="submit" class="btn btn-primary">ADD</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">


                <h4 class="modal-title" style="color: #000;text-align: center;">Edit DOCUMENT</h4>
            </div>
            <div class="modal-body">
                <form action="editdocument.php" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="name">Enter Document Name</label>
                        <input type="text" hidden="" id="edid" placeholder="Enter Document Name" name="edid">

                        <input type="text" class="form-control" id="ename" placeholder="Enter Document Name" name="ename">
                    </div>
                    <div class="form-group">
                        <label >Choose New Document</label>
                        <input type="file" class="form-control" id="photo" placeholder="Choose New Document" name="photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">


                <h4 class="modal-title" style="color: #000;text-align: center;">Edit Profile</h4>
            </div>
            <div class="modal-body" style="background: #ced4da">
                <form id="search_form" action="editprofile.php" method="GET">
                    <input id="fname" name="fname" class="input_field search_form_name" type="text" placeholder="First Name" required="required" data-error="first name is required.">
                    <input id="mname" name="mname" class="input_field search_form_name" type="text" placeholder="Middle Name">
                    <input id="lname" name="lname" class="input_field search_form_name" type="text" placeholder="Last Name" required="required" data-error="Last name is required.">
                    <input id="dateofbirth" name="dateofbirth" class="input_field search_form_D.O.B" type="date" placeholder="D.O.B(DD/MM/YYYY)" required="required"
                           data-error="D.O.B is required.">

                    
                    <input id="mobileno" name="mobileno" class="input_field search_form_Mobile No." type="Mobile No" placeholder="Mobile No." required="required"
                           data-error="Mobile No is 		                                   required.">


                    <input id="address" name="address" class="input_field search_form_Address"  type="text" placeholder="Address" required="required" data-error="address is required."/>

                    <br>
                    <input id="country"  name="country" class="input_field search_form_Address" type="text" placeholder="Country" required="required" data-error="address is required."/>
                    <input id="gender"  name="gender" class="input_field search_form_Address" type="text" placeholder="Gender" required="required" data-error="address is required."/>

                    

                    <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Edit</button>
              
                    

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<h1 style="color: #0069d9;text-align: center;">

    <?php
    echo $_REQUEST["er"];
    ?>

</h1>

<?php
include "footer.php";
?>

