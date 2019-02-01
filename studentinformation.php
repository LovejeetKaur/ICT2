
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <script>
            function viewdetail(fname, mname, lname, dateofbirth, mobileno, address, country, gender, photo, lastlogin)
            {
                var ans = "<table class=\"table table-bordered\">";
                ans += "<tr><td> Fname</td><td>" + fname + "</td> </tr>";
                ans += "<tr><td>Mname</td><td>" + mname + "</td> </tr>";
                ans += "<tr><td>Lname</td><td>" + lname + "</td> </tr>";
                ans += "<tr><td>Last Login</td><td>" + lastlogin + "</td> </tr>";

                ans += "<tr><td>Date of Birth</td><td>" + dateofbirth + "</td> </tr>";
                ans += "<tr><td>Mobile no</td><td>" + mobileno + "</td> </tr>";
                ans += "<tr><td>address</td><td>" + address + "</td> </tr>";
                ans += "<tr><td>Conutry</td><td>" + country + "</td> </tr>";
                ans += "<tr><td>Gender</td><td>" + gender + "</td> </tr>";
                ans += "<tr><td>Photo</td><td><img src=\"" + photo + "\"  style=\"width:100px;;height:100px;\" /></td> </tr>";


                ans += "</table>";
                document.getElementById("content").innerHTML = ans;
                $("#myModal").modal("show");

            }

        </script>

    </head> 
    <body class="cbp-spmenu-push">
        <div class="main-content">



            <?php include 'adminheader.php'; ?>
            <?php include 'adminside.php'; ?>



            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="tables">

                        <h2 class="title1">All Students</h2>


                        <div class="bs-example widget-shadow" data-example-id="hoverable-table"> 

                            <table class="table table-hover"> <thead> 
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>First Name</th> 
                                        <th>Middle Name</th> 
                                        <th>Last Name</th>
                                        <th>Last Login</th> 
                                        <th> Email</th>
                                        <th>Phone no</th>
                                        <th></th>
                                    </tr> </thead> 

                                <tbody> 
                                    <?php
                                    include "connection.php";
                                    $s = "select * from stu_reg";

                                    $result = mysqli_query($conn, $s);
                                    $flag = 0;
                                    $count = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <th scope = "row"><?php echo $count ?></th> 
                                            <td><img src="<?php echo $row["photo"]; ?>" style="width:50px;height:50px;" /></td>

                                            <td><?php echo $row["fname"]; ?></td>
                                            <td><?php echo $row["mname"]; ?></td>
                                            <td><?php echo $row["lname"]; ?></td>
                                            <td><?php echo $row["lastlogin"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                            <td><?php echo $row["mobileno"]; ?></td>
                                            <td><input type="button" onclick="viewdetail('<?php echo $row["fname"] ?>', '<?php echo $row["mname"] ?>', '<?php echo $row["lname"] ?>', '<?php echo $row["dateofbirth"] ?>', '<?php echo $row["mobileno"] ?>', '<?php echo $row["address"] ?>', '<?php echo $row["country"] ?>', '<?php echo $row["gender"] ?>', '<?php echo $row["photo"] ?>', '<?php echo $row["lastlogin"] ?>')" value="View Detail" class="btn btn-sm btn-primary" /></td>
                                            <td><a href="deletestudent.php?email=<?php echo $row["email"] ?>"><input type="button" value="Delete" class="btn btn-sm btn-primary" /></a></td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer-->
            <div class="footer">
                <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
            </div>
            <!--//footer-->
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Detail</h4>
                    </div>
                    <div class="modal-body">
                        <div id="content"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- side nav js -->
        <script src='js/SidebarNav.min.js' type='text/javascript'></script>
        <script>
                                                $('.sidebar-menu').SidebarNav()
        </script>
        <!-- //side nav js -->

        <!-- Classie --><!-- for toggle left push menu script -->
        <script src="js/classie.js"></script>
        <script>
                                                var menuLeft = document.getElementById('cbp-spmenu-s1'),
                                                        showLeftPush = document.getElementById('showLeftPush'),
                                                        body = document.body;

                                                showLeftPush.onclick = function () {
                                                    classie.toggle(this, 'active');
                                                    classie.toggle(body, 'cbp-spmenu-push-toright');
                                                    classie.toggle(menuLeft, 'cbp-spmenu-open');
                                                    disableOther('showLeftPush');
                                                };

                                                function disableOther(button) {
                                                    if (button !== 'showLeftPush') {
                                                        classie.toggle(showLeftPush, 'disabled');
                                                    }
                                                }
        </script>
        <!-- //Classie --><!-- //for toggle left push menu script -->

        <!--scrolling js-->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!--//scrolling js-->

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.js"></script>

    </body>
</html>