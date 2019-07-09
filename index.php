<?php include "header.php"; ?>

                <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-"><% <i class=" "></i></div>
                                <small>Total income</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Cost</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">></h1>
                                <div class="stat-percent font-bold text-">% <i class=" "></i></div>
                                <small>Total Costs</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly </span>
                                <h5>Active Users</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"> </h1>
                                <div class="stat-percent font-bold text-""% <i class=""></i></div>
                                <small>Total Active Users</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly </span>
                                <h5>Inactive Users</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"></h1>
                                <div class="stat-percent font-bold text-""% <i class=" "></i></div>
                                <small>Total Inactive Users</small>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
                 <div class="col-lg-9">
                    <div class="row">
                      <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Cost and Revenue</h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="barChart" height="220px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Active and Inactive User</h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="barChart1" height="220px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>










                               <div class="col-lg-3" >
                                 <div class="ibox-title">
                                     <h5>Equipment Details</h5>
                                 </div>
            <div class="ibox-content" height="240">
                                <div>
                                    <div>
                                        <span>Fit</span>
                                        <small class="pull-right"></small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: %;" class="progress-bar"></div>
                                    </div>

                                    <div>
                                        <span>Repaired</span>
                                        <small class="pull-right"></small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: %;" class="progress-bar"></div>
                                    </div>

                                    <div>
                                        <span>Under Repairment</span>
                                        <small class="pull-right"></small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: %;" class="progress-bar"></div>
                                    </div>
                                     <div>
                                        <span>Damaged</span>
                                        <small class="pull-right"></small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: %;" class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>

        </div>

    </div>


               <?php include "footer.php";  ?>


               <script type="text/javascript">
                   $(document).ready(function() {

         var barData = {
        labels: [],
        datasets: [
            {
                label: "Income",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: []
            },
            {
                label: "Cost",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: []
            }
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("barChart").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});

    ////////////////////////////2nd Bar Chart/////////////////////////////////////////////////
        var barData = {
        labels: [ ],
        datasets: [
            {
                label: "Active",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: []
            },
            {
                label: "Inactive",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: []
            }
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("barChart1").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});


        });
               </script>
