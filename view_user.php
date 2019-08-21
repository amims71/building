<?php include "header.php"; ?>
<body>
<style>
    .button {
        text-align: center;
        padding-top: 20px;
        clear: both;
    }
</style>

<div id="modal-add" class="modal fade" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="reg.php" class="form-horizontal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Add Users</h3>
                            <div class="row"> <!--First row option starts here-->
                                <div class="col-sm-6">
                                    <!--  user Name Section starts here  -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Name </label>

                                        <div class="col-sm-8"><input type="text" placeholder=" Name " name="name"
                                                                     class="form-control required" required>
                                        </div>
                                    </div>  <!--  End of Name Section starts here  -->


                                    <!--  Email Address Section  -->

                                    <div class="form-group"><label class="col-sm-4 control-label">Email Address </label>

                                        <div class="col-sm-8"><input type="email" placeholder=" Email Address "
                                                                     name="email"
                                                                     class="form-control" required>
                                        </div>
                                    </div>
                                    <!--  Password Section  -->

                                    <div class="form-group"><label class="col-sm-4 control-label">Password </label>

                                        <div class="col-sm-8"><input type="password" placeholder=" password "
                                                                     name="pass"
                                                                     class="form-control" required>
                                        </div>
                                    </div>

                                </div> <!--End of  First colum section -->
                                <!--starting second column section-->
                                <div class="col-sm-6">
                                    <!-- Mobile Number Section  -->

                                    <div class="form-group"><label class="col-sm-4 control-label">Mobile Number </label>

                                        <div class="col-sm-8"><input type="Number" placeholder="Mobile Number "
                                                                     name="phone"
                                                                     class="form-control" required>
                                        </div>
                                    </div>




                                    <!-- user Type  -->

                                    <div class="form-group"><label class="col-sm-4 control-label"> User Type </label>

                                        <div class="col-sm-8">
                                            <select class="select2_demo_3 form-control" name="type" required>
                                                <option></option>
                                                <option value="2">Client </option>
                                                <option value="3">Staff</option>

                                            </select>

                                            <!--
                                            </select> -->

                                        </div>
                                    </div>
                                    <!--  company Name Section starts here  -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Company  Name </label>

                                        <div class="col-sm-8"><input type="text" placeholder=" Company Name " name="cname"
                                                                     class="form-control required" required>
                                        </div>
                                    </div>  <!--  End of Name Section starts here  -->


                                    <!--  Floor Section  -->

                                    <div class="form-group"><label class="col-sm-4 control-label">Floor  </label>

                                        <div class="col-sm-8"><input type="number" placeholder=" Floor Number "
                                                                     name="floor"
                                                                     class="form-control" required>
                                        </div>
                                    </div>

                                    <input type="hidden" name="token" value="123">
                                    <input type="hidden" name="pc" value="1">
                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                                    <input type="hidden" name="utoken" value="<?php echo $_SESSION['utoken']; ?>">




                                </div> <!--Ending second column option -->


                            </div> <!--First Row ends here -->

                            <div class="button">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="button text-center">
                                            <div class="form-group">
                                                <p><strong>Note:</strong> <font color="red">All Fields must be filled</font></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="button text-center">
                                            <div class="form-group">
                                                <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                                                <button id="add-user" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

$sql="SELECT * FROM users ";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($result)) {

    ?>
<div id="modal-delete<?php echo $row['uid'];?>" class="modal fade" aria-hidden="true;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="delete.php" method="POST">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="m-t-none m-b">Are you sure, you want to delete <?php echo $row['name'];?> from user?</h3>
                    </div>
                </div>
                <input type="hidden" name="token" value="123">
                <input type="hidden" name="pc" value="1">
                <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                <input type="hidden" name="utoken" value="<?php echo $_SESSION['utoken']; ?>">
                <input type="hidden" name="duid" value="<?php echo $row['uid'];?>">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="button text-center">
                            <div class="form-group">
                                <!-- <button class="btn btn-white">Cancel</button> -->
                                <button type="button" class="btn btn-white" data-dismiss="modal">No</button>

                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div id="modal-edit<?php echo $row['uid'];?>" class="modal fade" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="reg.php" class="form-horizontal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Edit Users</h3>
                            <div class="row"> <!--First row option starts here-->
                                <div class="col-sm-6">
                                    <!--  user Name Section starts here  -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Name </label>

                                        <div class="col-sm-8"><input type="text" placeholder=" Name " name="name"
                                                                     class="form-control required" value="<?php echo $row['name'];?>" required>
                                        </div>
                                    </div>  <!--  End of Name Section starts here  -->


                                    <!--  Email Address Section  -->

                                    <div class="form-group"><label class="col-sm-4 control-label">Email Address </label>

                                        <div class="col-sm-8"><input type="email" placeholder=" Email Address "
                                                                     name="email"
                                                                     class="form-control" value="<?php echo $row['email'];?>" required>
                                        </div>
                                    </div>
                                    <!--  Password Section  -->

                                    <div class="form-group"><label class="col-sm-4 control-label">Password </label>

                                        <div class="col-sm-8"><input type="password" placeholder=" password "
                                                                     name="pass"
                                                                     class="form-control" value="*******" required>
                                        </div>
                                    </div>

                                </div> <!--End of  First colum section -->
                                <!--starting second column section-->
                                <div class="col-sm-6">
                                    <!-- Mobile Number Section  -->

                                    <div class="form-group"><label class="col-sm-4 control-label">Mobile Number </label>

                                        <div class="col-sm-8"><input type="Number" placeholder="Mobile Number "
                                                                     name="phone"
                                                                     class="form-control" value="<?php echo $row['phone'];?>" required>
                                        </div>
                                    </div>




                                    <!-- user Type  -->

                                    <div class="form-group"><label class="col-sm-4 control-label"> User Type </label>

                                        <div class="col-sm-8">
                                            <select class="select2_demo_3 form-control" name="type" required>
                                                <option value="value="<?php echo $row['type'];?>><?php $type=$row['type']; if($type=="2"){echo "Client";}else if($type=="3"){echo "Staff";}else if($type=="1"){echo "Admin";} ?></option>
                                                <option value="2">Client </option>
                                                <option value="3">Staff</option>

                                            </select>

                                            <!--
                                            </select> -->

                                        </div>
                                    </div>
                                    <!--  company Name Section starts here  -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Company  Name </label>

                                        <div class="col-sm-8"><input type="text" placeholder=" Company Name " name="cname"
                                                                     class="form-control required" required>
                                        </div>
                                    </div>  <!--  End of Name Section starts here  -->


                                    <!--  Floor Section  -->

                                    <div class="form-group"><label class="col-sm-4 control-label">Floor  </label>

                                        <div class="col-sm-8"><input type="number" placeholder=" Floor Number "
                                                                     name="floor"
                                                                     class="form-control" required>
                                        </div>
                                    </div>

                                    <input type="hidden" name="token" value="123">
                                    <input type="hidden" name="pc" value="1">
                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                                    <input type="hidden" name="utoken" value="<?php echo $_SESSION['utoken']; ?>">




                                </div> <!--Ending second column option -->


                            </div> <!--First Row ends here -->

                            <div class="button">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="button text-center">
                                            <div class="form-group">
                                                <p><strong>Note:</strong> <font color="red">All Fields must be filled</font></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="button text-center">
                                            <div class="form-group">
                                                <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                                                <button id="add-user" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
}
?>



<div id="modal-view" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="inc/update_user.php" class="form-horizontal"
                      enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">User Details</h3>


                            <div class="row"> <!--First row option starts here-->
                                <div class="col-sm-6">
                                    <!-- Name Section starts here  -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Name</label>

                                        <div class="col-sm-8"><input type="text" placeholder=" Name " name="name"
                                                                     class="form-control required"
                                                                     value="" disabled>
                                        </div>
                                    </div>  <!--  End of Name Section starts here  -->
                                    <!-- NId number section -->

                                    <div class="form-group"><label class="col-sm-4 control-label">NID</label>

                                        <div class="col-sm-8"><input type="Number"
                                                                     placeholder=" National Id Card Number "
                                                                     name="nid"
                                                                     class="form-control"
                                                                     value="" disabled>
                                        </div>
                                    </div>  <!-- NId number section -->

                                    <!--  Email Address Section  -->

                                    <div class="form-group"><label class="col-sm-4 control-label">Email
                                            Address</label>

                                        <div class="col-sm-8"><input type="email" placeholder=" Email Address "
                                                                     name="email"
                                                                     class="form-control"
                                                                     value="" disabled>
                                        </div>
                                    </div>


                                    <!-- Mobile Number Section  -->

                                    <div class="form-group"><label class="col-sm-4 control-label">Mobile
                                            Number</label>

                                        <div class="col-sm-8"><input type="Number" placeholder="Mobile Number "
                                                                     name="phone"
                                                                     class="form-control"
                                                                     value="" disabled>
                                        </div>
                                    </div>

                                    <!-- Address Section here  -->


                                    <div class="form-group"><label class="col-sm-4 control-label"> Address</label>

                                        <div class="col-sm-8"><textarea type="text" placeholder="  Address "
                                                                        name="address" class="form-control"
                                                                        disabled> </textarea>
                                        </div>
                                    </div>

                                    <!-- Age section   -->
                                    <div class="form-group" id="data_1">

                                        <label class="col-sm-4 control-label">Date of Birth</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i
                                                            class="fa fa-calendar"></i></span><input name="dob"
                                                                                                     type="text"
                                                                                                     class="form-control"
                                                                                                     value=""
                                                                                                     disabled>
                                            </div>
                                        </div>
                                    </div><!--  End of Age section   -->


                                    <!-- Gender  -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Gender </label>

                                        <div class="col-sm-8"><label class="radio-inline">
                                                <input type="radio" name="sex" value="male" disabled checked>Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="female" disabled>female
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="other" disabled>Others
                                            </label>
                                        </div>
                                    </div>  <!-- end of  Gender  -->

                                    <div class="form-group"><label class="col-sm-4 control-label"> Remarks </label>

                                        <div class="col-sm-8"><textarea type="text"
                                                                        name="remarks" class="form-control" disabled >  </textarea>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group"><label class="col-sm-4 control-label"> Height </label>

                                        <div class="col-sm-8"><input type="Number" placeholder="  Height "
                                                                     name="height"
                                                                     class="form-control"
                                                                     value="" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-sm-4 control-label"> Weight </label>

                                        <div class="col-sm-8"><input type="Number" placeholder="  Weight "
                                                                     name="weight"
                                                                     class="form-control"
                                                                     value="" disabled>
                                        </div>
                                    </div>
                                    <!-- Blood Group  -->

                                    <div class="form-group"><label class="col-sm-4 control-label"> Blood
                                            Group </label>

                                        <div class="col-sm-8">
                                            <select class="select2_demo_3 form-control" name="blood" disabled>
                                                <option value="></option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value=" ">Unknown</option>
                                            </select>

                                            <!--
                                            </select> -->

                                        </div>
                                    </div>

                                    <!-- reg_fee -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Registration
                                            Fee </label>

                                        <div class="col-sm-8"><input type="Number"
                                                                     placeholder="  Registration Fee  "
                                                                     name="reg_fee"
                                                                     class="form-control"
                                                                     value=""
                                                                     disabled>
                                        </div>
                                    </div>
                                    <!-- monthly_fee   -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Monthly
                                            Fee </label>

                                        <div class="col-sm-8"><input type="Number" placeholder="  Monthly Fee  "
                                                                     name="monthly_fee"
                                                                     class="form-control"
                                                                     value=" "
                                                                     disabled>
                                        </div>
                                    </div>
                                    <!-- Image    -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Upload
                                            Image </label>
                                        <div class="col-sm-8">
                                            <a href="" target="_blank"><img src=" " width="100px"
                                                 height="100px"></a>
                                        </div>
                                    </div>


                                    <!-- Enrollment Date    -->
                                    <div class="form-group" id="data_1">

                                        <label class="col-sm-4 control-label"> Enrollment Date </label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i
                                                            class="fa fa-calendar"></i></span><input type="text"
                                                                                                     class="form-control"
                                                                                                     name="date"
                                                                                                     value=""
                                                                                                     disabled>
                                            </div>
                                        </div>
                                    </div>  <!--  end of Enrollment Date    -->

                                </div> <!--Ending second column option -->


                            </div> <!--First Row ends here -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="button text-center">
                                        <div class="form-group">
                                            <input type="hidden" name="uid" value="">
                                            <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <!-- <button id="update" class="btn btn-primary">Submit</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- <div class="row  border-bottom "></div> -->

<!--   Put all the body contenet here -->


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5> User Information </h5>
                    <a class="btn-primary pull-right btn-sm" href="#modal-add" data-toggle="modal">Add User</a>

                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>

                                <th>Sl.</th>
                                <th> Name</th>
                                <th>Email Address</th>
                                <th>Mobile Number</th>
                                <th>User Type</th>
                                <th>Floor</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

<?php
$sql="SELECT * FROM users ";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    $sql2="SELECT * FROM company WHERE uid='".$row['uid']."' ";
    $result2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    if ($row['type']==2) {
        $row['type']="Client";
    } elseif ($row['type']==3) {
        $row['type']="Staff";
    } else{
        $row['type']="Admin";
    }
    ?>
    <tr>
        <td><?php echo $row['uid']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row2['floor']; ?></td>
        <td><?php echo $row2['name']; ?></td>
        <td><a href="#modal-delete<?php echo $row['uid'];?>" data-toggle="modal">delete</a> <a href="#modal-edit<?php echo $row['uid'];?>" data-toggle="modal">edit</a></td>
    </tr>

    <?php
}
?>

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!--  put footer at the end of page-wrapper -->
<?php include "footer.php"; ?>


<!-- Date picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>


<script src="js/plugins/select2/select2.full.min.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script type="text/javascript">


    $(".select2_demo_3").select2({
        placeholder: "Select User Type",
        allowClear: true,

    });


</script>
<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });


        $('#data_2 .input-group.date').datepicker({
            format: "M-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });

    });


</script>
