<?php include "header.php"; ?>
    <body>
<style>
    .button {
        text-align: center;
        padding-top: 20px;
        clear: both;
    }
</style>


<?php

$sql="SELECT * FROM ticket ";
$result=mysqli_query($con,$sql);
// print_r($result);
while ($row=mysqli_fetch_assoc($result)) {

    ?>
<div id="modal-assign<?php echo $row['tid'];?>" class="modal fade" aria-hidden="true;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="assign.php" method="POST">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="m-t-none m-b"> Assign a staff for <?php echo $row['title'];?> </h3>
                    </div>
                </div>
                <input type="hidden" name="token" value="123">
                <input type="hidden" name="pc" value="1">
                <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                <input type="hidden" name="tid" value="<?php echo $row['tid']; ?>">
                <input type="hidden" name="utoken" value="<?php echo $_SESSION['utoken']; ?>">
                      <div class="form-group"><label class="col-sm-4 control-label"> Staff Name </label>

                                        <div class="col-sm-8">
                                            <select class="select2_demo_3 form-control" name="assignedToUid" required>
                                                <option></option>

                                                <?php

    $sql="SELECT * FROM users WHERE  type='3'";
    $result2=mysqli_query($con,$sql);
    while ($row=mysqli_fetch_assoc($result2)) {
                                                ?>
                                                <option value="<?php echo $row['uid'];?>"><?php echo $row['name'];?> </option>
                                                <?php
    }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="button text-center">
                            <div class="form-group">
                                <!-- <button class="btn btn-white">Cancel</button> -->
                                <button type="button" class="btn btn-white" data-dismiss="modal">No</button>

                                <button type="submit" class="btn btn-primary">Assign</button>
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


<?php

$sql="SELECT * FROM ticket ";
$result=mysqli_query($con,$sql);
// print_r($result);
while ($row=mysqli_fetch_assoc($result)) {

    ?>
<div id="modal-delete<?php echo $row['tid'];?>" class="modal fade" aria-hidden="true;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="delete_ticket.php" method="POST">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="m-t-none m-b">Are you sure, you want to delete <?php echo $row['title'];?> from tickets?</h3>
                    </div>
                </div>
                <input type="hidden" name="token" value="123">
                <input type="hidden" name="pc" value="1">
                <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                <input type="hidden" name="utoken" value="<?php echo $_SESSION['utoken']; ?>">
                <input type="hidden" name="dtid" value="<?php echo $row['tid'];?>">
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

<?php
}
?>


<!-- <div class="row  border-bottom "></div> -->

<!--   Put all the body contenet here -->


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">

            <div class="ibox float-e-margins">


                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>

                                <th>Sl.</th>
                                <th >Title</th>
                                <th hidden> Description</th>

                                <th hidden>Type</th>
                                <th>Image</th>
                                <th>Assign to</th>
                                <th>Create By</th>
                                <th>Floor</th>
                                <th>Office Name</th>
                                <th hidden>Assign Time</th>
                                <th >Complete Time</th>


                                <th>Current Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

<?php
$sql="SELECT * FROM ticket ";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    $sql2="SELECT * FROM company WHERE uid='".$row['createdByUid']."' ";
    $sql3="SELECT * FROM users WHERE uid='".$row['createdByUid']."' ";

    $result2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    // print_r($row2);
    $result3=mysqli_query($con,$sql3);
    $row3=mysqli_fetch_assoc($result3);
    $epochAssign=$row['assignTime'];
    $epochComplete=$row['completeTime'];

    if ($row['status']=="Not Assigned") {
        $action='<a href="#modal-assign'.$row['tid'].'" data-toggle="modal">assign</a>';
    } else{
        $action='';
    }
    if(!file_exists("uploads/".$row['image'])){
        $row['image']="noimage.png";
    }
    ?>
    <tr>
        <td><?php echo $row['tid']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td hidden><?php echo $row['description']; ?></td>
        <td hidden><?php echo $row['type']; ?></td>
        <td><img src="uploads/<?php echo $row['image']; ?>" height="200px" width="200px"></td>
        <td><?php echo @$row['assignedToName']; ?></td>
        <td><?php echo $row3['name']; ?></td>
        <td><?php echo $row2['floor']; ?></td>
        <td><?php echo $row2['name']; ?></td>
        <td hidden><?php echo @date("Y-m-d H:i:s",$epochAssign); ?></td>
        <td><?php echo @date("Y-m-d H:i:s",$epochComplete); ?></td>
        <td><?php echo $row['status']; ?></td>
        <td> <?php echo $action; ?> </td>
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

<script>
        $(".select2_demo_3").select2({
        placeholder: "Select Staff",
        allowClear: true,

    });
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

    });


</script>

