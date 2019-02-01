<?php
session_start();
include "connection.php";
$email = $_SESSION["uniemail"];

$s = "select * from uni_reg where email='" . $email . "'";

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

        function editmodal(cid, coursename, courseduration, coursetype, coursefees)
        {

            document.getElementById("ecid").value = cid;
            document.getElementById("ecoursename").value = coursename;
            document.getElementById("ecourseduration").value = courseduration;
            document.getElementById("ecoursetype").value = coursetype;
            document.getElementById("ecoursefees").value = coursefees;

            $("#myModal1").modal("show");

        }

        function editprofile(uid, uniname, email, phone, address, country, registeringcountry, password, website)
        {
            $("#myModal2").modal("show");
            document.getElementById("euniname").value = uniname;
            document.getElementById("ephone").value = phone;
            document.getElementById("eaddress").value = address;
            document.getElementById("ecountry").value = country;
            document.getElementById("eRegistering_Country").value = registeringcountry;
            document.getElementById("epassword").value = password;
            document.getElementById("ewebsite").value = website;



        }

        function editprofilepic()
        {
            $("#myModal3").modal("show");
        }
        function editvideo()
        {
            $("#myModal4").modal("show");
        }


    </script>

    <h1 style="color: #0069d9;text-align: center;">

        <?php
        if (isset($_REQUEST["er"])) {
            echo $_REQUEST["er"];
        }
        ?>

    </h1>
    <div class="main_body" style="min-height:600px;margin-top:10px;padding:50px;">
        <h1 class="mainhead">University DashBoard</h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="studentinfo">
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">University ID :</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["uid"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">University Name :</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["universityname"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Email :</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["email"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Phone no:</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["phone"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Address:</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["address"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Country:</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["country"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Registering Country:</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["registeringcountry"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="text-align:right;"><button class="btn btn-lg btn-primary"  onclick="editprofile('<?php echo $row["uid"] ?>', '<?php echo $row["universityname"] ?>', '<?php echo $row["email"] ?>', '<?php echo $row["phone"] ?>', '<?php echo $row["address"] ?>', '<?php echo $row["country"] ?>', '<?php echo $row["registeringcountry"] ?>', '<?php echo $row["password"] ?>', '<?php echo $row["website"] ?>')">Edit</button></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">

                        <div class="studentinfo" style="text-align:center;background:#a3a375;">
                            <img src="<?php echo $row["photo"] ?>" style="width:90%;height:180px;border:1px solid #000;" >
                            <div class="row">
                                <div class="col-sm-12" style="text-align:center;margin-top:20px;"><button class="btn btn-small btn-primary"  onclick="editprofilepic()" >Edit Photo</button></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="studentinfo" style="text-align:center;background:#a3a375;">
                            <img src="images/video.png" style="width:90%;height:180px;border:1px solid #000;" >
                            <div class="row">
                                <div class="col-sm-12" style="text-align:center;margin-top:20px;"><button class="btn btn-small btn-primary"  onclick="editvideo()" >Edit Video</button></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1 style="color: #000;margin: 20px;">Courses Offered</h1>
                <div style="margin: 20px;background: #6b6b47    ;">
                    <div class="row" >

                        <?php
                        $s = "select * from course where uid='" . $_SESSION["uid"] . "'";

                        $result = mysqli_query($conn, $s);
                        $flag = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-sm-3" >
                                <div  style="text-align:center;box-shadow:1px 1px 1px #000;height:220px;width:200px;margin:50px auto;background: #ffffff">
                                    <img src="images/course.png" style="width:100px;height:100px;margin-top:5%;" />
                                    <h2 style="color:#000;margin-top:20px;font-size: 15px;"><?php echo $row["coursename"]; ?></h2>
                                    <button class="btn btn-small btn-primary" onclick="editmodal('<?php echo $row["cid"]; ?>', '<?php echo $row["coursename"]; ?>', '<?php echo $row["courseduration"]; ?>', '<?php echo $row["type"]; ?>', '<?php echo $row["coursefees"]; ?>')">Edit</button>

                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="col-sm-3" onclick="openadddocument()">
                            <div  style="text-align:center;box-shadow:1px 1px 1px #000;height:220px;width:220px;margin:50px auto;background: #b8daff;">
                                <img src="images/add.png" style="width:100px;height:100px;margin-top:10%;" />
                                <h4 style="color:#000;margin-top:20px;">ADD Corse</h4>
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


        <h1 style="color: #0069d9;text-align: center;">

            <?php
            if (isset($_REQUEST["er"])) {
                echo $_REQUEST["er"];
            }
            ?>

        </h1>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">


                <h4 class="modal-title" style="color: #000;text-align: center;">ADD Course</h4>
            </div>
            <div class="modal-body">
                <form action="addcourse.php" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="name">Enter Course Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Document Name" name="coursename">
                    </div>
                    <input type="text" hidden="" id="uid" value="<?php echo $row["uid"]; ?>" placeholder="Enter Document Name" name="uid">


                    <div class="form-group">
                        <label >Course Duration</label>
                        <select id="courseduration" name="courseduration" class="input_field search_form_Location">
                            <option>Select Duration</option>
                            <option>1 year</option>
                            <option>2 year</option>
                            <option>3 year</option>
                            <option>4 year</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label >Course Type</label>
                        <select id="coursetype" name="coursetype" class="input_field search_form_Location">
                            <option>Select Type</option>
                            <option>Diploma</option>
                            <option>Bachelor</option>
                            <option>Mater</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label >Course Fees</label>
                        <input type="text" class="form-control" id="coursefees" placeholder="Choose Document" name="coursefees">
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


                <h4 class="modal-title" style="color: #000;text-align: center;">Edit Course</h4>
            </div>
            <div class="modal-body">
                <form action="editcourse.php" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="name">Course Name</label>
                        <input type="text" hidden="" id="ecid" placeholder="Enter Document Name" name="cid">
                        <input type="text" class="form-control" id="ecoursename" placeholder="Enter " name="coursename">
                    </div>


                    <div class="form-group">
                        <label >Course Duration</label>
                        <select id="ecourseduration" name="courseduration" class="input_field search_form_Location">
                            <option>Select Duration</option>
                            <option>1 year</option>
                            <option>2 year</option>
                            <option>3 year</option>
                            <option>4 year</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label >Course Type</label>
                        <select id="ecoursetype" name="coursetype" class="input_field search_form_Location">
                            <option>Select Type</option>
                            <option>Diploma</option>
                            <option>Bachelor</option>
                            <option>Mater</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label >Course Fees</label>
                        <input type="text" class="form-control" id="ecoursefees" placeholder="Choose Document" name="coursefees">
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
                <form id="search_form1" action="editprofileuni.php" method="GET">

                    <input id="euniname" name="uniname" class="input_field search_form_name" type="text" placeholder="Name of University and College" required="required" data-error="University name and College name is required.">
                    <input id="epassword" name="password" class="input_field search_form_email" type="password" placeholder="Password" required="required" data-error="Email is required.">

                    <input id="ephone" name="phone" class="input_field search_form_name" type="text" placeholder="Contact No." required="required" data-error="Contact No is required.">
                    <input id="ewebsite" name="website" class="input_field search_form_Location" type="text" placeholder="Website" required="required" data-error="Email is required.">


                    <input id="eaddress" name="address" class="input_field search_form_Location" type="text" placeholder="Location" required="required" data-error="Lacation is required.">


                    <select id="ecountry" name="country" class="input_field search_form_Location" style="margin-top: 20px;">
                        <option>Select Country</option>    
                        <option>Australia</option>
                        <option>Canada</option>
                        <option>German</option>
                        <option>UK</option> 
                        <option>US</option> 
                    </select>

                    <select id="eRegistering_Country" name="registeringcountry" class="input_field search_form_Location">
                        <option>Select Registering Country</option>
                        <option>Australia</option>
                        <option>Canada</option>
                        <option>German</option>
                        <option>UK</option> 
                        <option>US</option> 
                    </select>


                    <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Edit</button>



                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="myModal3" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">


                <h4 class="modal-title" style="color: #000;text-align: center;">Edit Profile Pic</h4>
            </div>
            <div class="modal-body" style="background: #ced4da">
                <form id="search_form" action="editprofilepicuni.php" method="POST" enctype="multipart/form-data">

                    <label>Edit Profile Pic</label>
                    <input type="file" name="photo" id="photo" class="input_field search_form_Location"/> 
                    <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Edit</button>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>  
<div id="myModal4" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">


                <h4 class="modal-title" style="color: #000;text-align: center;">Edit Video</h4>
            </div>
            <div class="modal-body" style="background: #ced4da">
                <form id="search_form" action="editvideo.php" method="POST" enctype="multipart/form-data">

                    <label>Edit Video</label>
                    <input type="file" name="photo" id="photo" class="input_field search_form_Location"/> 
                    <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Edit</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>  



<?php
include "footer.php";
?>

