<?php
include "connection.php";
session_start();

$email = $_SESSION["insemail"];

$s = "select * from insurance where email='" . $email . "'";

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

        function editmodal(inpid, name, duration, requirements, monthlycharges, benefits)
        {

            document.getElementById("eininpid").value = inpid;

            document.getElementById("einname").value = name;
            document.getElementById("einduration").value = duration;
            document.getElementById("einrequirements").value = requirements;
            document.getElementById("einmonthlycharges").value = monthlycharges;
            document.getElementById("einbenefits").value = benefits;
            $("#myModal1").modal("show");

        }

        function editprofile(inid, name, email, phone, address, country, registeringcountry, password)
        {
            $("#myModal2").modal("show");


            document.getElementById("ename").value = name;
            document.getElementById("ephone").value = phone;
            document.getElementById("eaddress").value = address;
            document.getElementById("ecountry").value = country;
            document.getElementById("eregisteringcountry").value = registeringcountry;
            document.getElementById("epassword").value = password;


        }

        function editprofilepic()
        {
            $("#myModal3").modal("show");
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
        <h1 class="mainhead">Insurance DashBoard</h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="studentinfo">
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Insurance ID :</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["inid"] ?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><h4 class="showtexttitle">Insurance Company Name :</h4></div>
                        <div class="col-sm-8"><h4 class="showtext"><?php echo $row["name"] ?></h4></div>
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
                        <div class="col-sm-12" style="text-align:right;"><button class="btn btn-lg btn-primary"  onclick="editprofile('<?php echo $row["inid"] ?>', '<?php echo $row["name"] ?>', '<?php echo $row["email"] ?>', '<?php echo $row["phone"] ?>', '<?php echo $row["address"] ?>', '<?php echo $row["country"] ?>', '<?php echo $row["registeringcountry"] ?>', '<?php echo $row["password"] ?>')">Edit</button></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="studentinfo" style="text-align:center;background:#a3a375;">
                    <img src="<?php echo $row["photo"] ?>" style="width:180px;height:180px;border:1px solid #000;" >
                    <div class="row">
                        <div class="col-sm-12" style="text-align:center;margin-top:20px;"><button class="btn btn-small btn-primary"  onclick="editprofilepic()" >Edit Photo</button></div>
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
                        $s = "select * from insuranceplans where inid='" . $_SESSION["inid"] . "'";

                        $result = mysqli_query($conn, $s);
                        $flag = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-sm-3" >
                                <div  style="text-align:center;box-shadow:1px 1px 1px #000;height:220px;width:200px;margin:50px auto;background: #ffffff">
                                    <img src="images/insurance.png" style="width:100px;height:100px;margin-top:5%;" />
                                    <h2 style="color:#000;margin-top:20px;font-size: 15px;"><?php echo $row["name"]; ?></h2>
                                    <button class="btn btn-small btn-primary" onclick="editmodal('<?php echo $row["inpid"]; ?>', '<?php echo $row["name"]; ?>', '<?php echo $row["duration"]; ?>', '<?php echo $row["requirements"]; ?>', '<?php echo $row["monthlycharges"]; ?>', '<?php echo $row["benefits"]; ?>')">Edit</button>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="col-sm-3" onclick="openadddocument()">
                            <div  style="text-align:center;box-shadow:1px 1px 1px #000;height:220px;width:220px;margin:50px auto;background: #b8daff;">
                                <img src="images/add.png" style="width:100px;height:100px;margin-top:10%;" />
                                <h4 style="color:#000;margin-top:20px;">ADD New Insurance Plan</h4>
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
                <h4 class="modal-title" style="color: #000;text-align: center;">ADD Insurance plan</h4>
            </div>
            <div class="modal-body">
                <form action="addinsuranceplan.php" method="POST" enctype="multipart/form-data" >

                    <div class="form-group">
                        <label for="name">Enter Plan Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Plan Name" name="name">
                    </div>

                    <input type="text" hidden="" id="inid" value="<?php echo $row["inid"]; ?>" placeholder="Enter Document Name" name="inid">

                    <div class="form-group">
                        <label >Monthly Charges</label>
                        <input type="text" class="form-control" id="monthlycharges" placeholder="Choose Document" name="monthlycharges">
                    </div>

                    <div class="form-group">
                        <label >Plan Duration</label>
                        <select id="planduration" name="planduration" class="input_field search_form_Location">
                            <option>Select Duration</option>
                            <option>1 year</option>
                            <option>2 year</option>
                            <option>3 year</option>
                            <option>4 year</option>
                        </select> 
                    </div>
                    
                    <div class="form-group">
                        <label >Requirements</label>
                        <input type="text" class="form-control" id="requirements" placeholder="Choose Document" name="requirements">
                    </div>
                    <div class="form-group">
                        <label >Benefits</label>
                        <input type="text" class="form-control" id="benefits" placeholder="Choose Document" name="benefits">
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


                <h4 class="modal-title" style="color: #000;text-align: center;">Edit Insurance Plan</h4>
            </div>
            <div class="modal-body">
                <form action="editinsuranceplan.php" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="name">Enter Plan Name</label>
                        <input type="text" class="form-control" id="einname" placeholder="Enter Plan Name" name="name" />
                    </div>
                    <input type="text" hidden="" id="eininpid" placeholder="Enter Plan Name" name="inpid" >

                    <div class="form-group">
                        <label >Monthly Charges</label>
                        <input type="text" class="form-control" id="einmonthlycharges" placeholder="Choose Document" name="monthlycharges">
                    </div>

                    <div class="form-group">
                        <label >Plan Duration</label>
                        <select id="einduration" name="duration" class="input_field search_form_Location">
                            <option>Select Duration</option>
                            <option>1 year</option>
                            <option>2 year</option>
                            <option>3 year</option>
                            <option>4 year</option>
                        </select> 
                    </div>



                    <div class="form-group">
                        <label >Requirements</label>
                        <input type="text" class="form-control" id="einrequirements" placeholder="Choose Document" name="requirements">
                    </div>
                    <div class="form-group">
                        <label >Benefits</label>
                        <input type="text" class="form-control" id="einbenefits" placeholder="Choose Document" name="benefits">
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

                <form id="search_form" class="search_form" method="post" enctype="multipart/form-data" action="editinsurance.php" >
                    <input id="ename" name="name" class="input_field search_form_name" type="text" placeholder="Name of company" required="required" data-error="company name is required.">
                    <input id="epassword" name="password" class="input_field search_form_name" type="password" placeholder="Password" required="required" data-error="company name is required.">
                    <input id="ephone" name="phone" class="input_field search_form_Contact No" type="number" placeholder="Contact No." required="required" data-error="Contact No is required.">
                    <input id="eaddress" name="address" class="input_field search_form_Location" type="text" placeholder="Location" required="required" data-error="Lacation is required.">
                    <select id="ecountry" style="margin-top: 20px;" class="input_field search_form_Location" name="country" >
                        <Option>Australia </Option>
                        <option>U.S.A</option>
                        <Option>U.K</Option>
                        <Option>German</Option>
                        <Option>Canada</Option>
                    </select>
                    <select  id="eregisteringcountry" class="input_field search_form_Location" name="registeringcountry">
                        <Option>Australia </Option>
                        <option>U.S.A</option>
                        <Option>U.K</Option>
                        <Option>German</Option>
                        <Option>Canada</Option>
                    </select>                                       

                    <div>
                        <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Submit</button>
                    </div>
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


                <h4 class="modal-title" style="color: #000;text-align: center;">Edit Profile</h4>
            </div>
            <div class="modal-body" style="background: #ced4da">
                <form id="search_form" action="editprofilepicins.php" method="POST" enctype="multipart/form-data">

                    <label>Edit Profile Pic</label>
                    <input type="file" name="photo"  class="input_field search_form_Location"/> 
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

