<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::sra.sradetailtitle'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('admin::sra.sradetailtitle'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>


<style type="text/css">
    .green {
        color: green;
    }
    .tabs {
        position: relative;
        /*background: #ccc;*/
        height: 400.75rem;
    }

    .tabs::before,
    .tabs::after {
        content: "";
        display: table;
    }

    .tabs::after {
        clear: both;
    }

    .tab {
        float: left;
        border: 1px solid #bdc3c7;
    }

    .tab-switch {
        display: none;
    }

    .tab-label {
        position: relative;
        display: block;
        line-height: 2.75em;
        height: 3em;
        padding: 0 1.618em;
        background: #ccc;
        color: #fff;
        cursor: pointer;
        top: 0;
        transition: all 0.25s;
    }

    .tab-label:hover {
        top: -0.25rem;
        transition: top 0.25s;
    }

    .tab-content {
        position: absolute;
        z-index: 1;
        top: 2.75em;
        left: 0;
        background: #fff;
        color: #2c3e50;
        border: 1px solid #bdc3c7;
        opacity: 0;
        transition: all 0.35s;
        width: 100%;
    }

    .tab-switch:checked+.tab-label {
        background: #fff;
        color: #2c3e50;
        border-bottom: 0;
        border-right: 0.125rem solid #fff;
        transition: all 0.35s;
        z-index: 1;

    }

    .tab-switch:checked+label+.tab-content {
        z-index: 2;
        opacity: 1;
        transition: all 0.35s;
    }

    th,
    td {
        border-bottom: none !important;
        height: 30px !important;
        font-size:16px !important;
    }
    h4{
      font-size:18px !important;
      font-weight: bold !important;
    }
</style>

<?php $__env->startSection('content'); ?>
    <?php if(session('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <!-- tab start-->
            <div class="card">
                <div class="card-body">
                    <div class="tabs">
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-1" class="tab-switch">
                            <a href="index.php/sra/documentlisting/<?php echo e($hid); ?>" class="tab-label"
                                style="color:#495057!important; font-size:18px !important;
                               ">Hut Documents</a>
                            <div class="tab-content"></div>
                        </div>

                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
                            <a href="index.php/sra/detail/<?php echo e($hid); ?>" class="tab-label"
                                style="color:#495057!important;  font-size:18px !important;
                               ">Electricity</a>
                            <div class="tab-content"></div>
                        </div>
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
                            <a href="index.php/sra/elections/<?php echo e($hid); ?>" class="tab-label"
                                style="color:#495057!important;  font-size:18px !important;
                                ">Election</a>
                            <div class="tab-content">Election Details</div>
                        </div>
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
                            <a href="index.php/sra/gumasta/<?php echo e($hid); ?>" class="tab-label"
                                style="color:#495057!important;  font-size:18px !important;
                                ">Gumasta</a>
                            <div class="tab-content"></div>
                        </div>
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-5" class="tab-switch">
                            <a href="#" class="tab-label" style="color:#495057!important; font-size:18px !important;
                            ">Photo Pass Details</a>
                            <div class="tab-content">Photo Pass Details</div>
                        </div>
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-6" class="tab-switch">
                            <a href="index.php/sra/agreement/<?php echo e($hid); ?>" class="tab-label"
                                style="color:#495057!important; font-size:18px !important;
                                ">Registration Agreement Details</a>
                            <div class="tab-content"></div>
                        </div>
                        <div class="tab">
                <input type="radio" name="css-tabs" id="tab-8" class="tab-switch">
                <a href="index.php/sra/adhar/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Aadhar Card</a>
                <div class="tab-content">Registration Agreement Details</div>
              </div>
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-7" checked class="tab-switch">
                            <label for="tab-1" class="tab-label" style="color:#fff!important; font-size:18px !important;
                            ">Final Submission</label>
                            <div class="tab-content">
                                <br />
                                <div class="table-responsive" id="sra-table">
                                    <table class="table table-borderless table-responsive">
                                      <thead>
                                          <tr>
                                          <th>Hut ID</th>
                                          <th>Cluster ID</th>
                                          <th>Scheme Name</th>
                                          <th>Owner Name</th>
                                          <th>Address</th>
                                          <th>Category</th>
                                          <th>Floor</th>
                                          <th>Length</th>
                                          <th>Width</th>
                                          <th>Area</th>
    
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e($data->HUTSURVERYID); ?></td>
                                            <?php $hid = $data->HUTSURVERYID ?>
                                            <td><?php echo e($data->ClusterId); ?></td>
                                            <td><?php echo e($data->SchemeName); ?></td>
                                            <td><?php echo e($data->HUTOWNERNAME); ?></td>
                                            <td><?php echo e($data->Address); ?></td>
                                            <td><?php echo e($data->PropertyType); ?></td>
                                            <td><?php echo e($data->FLOORNUM); ?></td>
                                            <td><?php echo e(round($data->HUTLENGTH,2)); ?></td>
                                            <td><?php echo e(round($data->HUTWIDTH,2)); ?></td>
                                            <td><?php echo e(round($data->Area,2)); ?></td>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </tr>
                                      </tbody>
                                    </table>
                                  </div><br><br>
                                 
                                
                                <!-- overall remark start-->
                                <!-- electricity start-->
                                <div class="row" style="padding: 10px;">
                                    <div class="col-md-1"></div>
                                    <!-- Electricity remark -->
                                    <div class="col-md-5 ">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Electricity Remark</h4>
                                        </div>
                                        <div class="card-body" style="height: 300px; overflow-y: scroll;">
                                            <div class="table-responsive" id="sra-table">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:100px;"><b> Details For Year 2000 or Before</b></td>
                                                            <td style="width:1px;">:</td>
                                                            <td>
                                                                <?php if(isset($recommendation_electricity_1[0])): ?>
                                                                    <?php if($recommendation_electricity_1[0]->overall_eligibility == '1'): ?>
                                                                        <span style="color:green"><?php echo e($recommendation_electricity_1[0]->overall_remark); ?></span>
                                                                    <?php elseif($recommendation_electricity_1[0]->overall_eligibility == '2'): ?>
                                                                        <span style="color:orange"><?php echo e($recommendation_electricity_1[0]->overall_remark); ?></span>
                                                                    <?php elseif($recommendation_electricity_1[0]->overall_eligibility == '3'): ?>
                                                                        <span style="color:red"><?php echo e($recommendation_electricity_1[0]->overall_remark); ?></span>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    Not Available
                                                                <?php endif; ?>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td><b> Details For Year Between 2000 To 2011</b></td>
                                                            <td>:</td>
                                                            <td>
                                                            

                                                                <?php if(isset($recommendation_electricity_2[0])): ?>
                                                                    <?php if($recommendation_electricity_2[0]->overall_eligibility == '1'): ?>
                                                                        <span style="color:green"><?php echo e($recommendation_electricity_2[0]->overall_remark); ?></span>
                                                                    <?php elseif($recommendation_electricity_2[0]->overall_eligibility == '2'): ?>
                                                                        <span style="color:orange"><?php echo e($recommendation_electricity_2[0]->overall_remark); ?></span>
                                                                    <?php elseif($recommendation_electricity_2[0]->overall_eligibility == '3'): ?>
                                                                        <span style="color:red"><?php echo e($recommendation_electricity_2[0]->overall_remark); ?></span>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    Not Available
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        
                                                            <td><b>Current Year</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php if(isset($recommendation_electricity_3[0]->overall_remark)): ?>
                                                                    <?php if($recommendation_electricity_3[0]->overall_eligibility == '1'): ?>
                                                                        <span style="color:green"><?php echo e($recommendation_electricity_3[0]->overall_remark); ?></span>
                                                                    <?php elseif($recommendation_electricity_3[0]->overall_eligibility == '2'): ?>
                                                                        <span style="color:orange"><?php echo e($recommendation_electricity_3[0]->overall_remark); ?></span>
                                                                    <?php elseif($recommendation_electricity_3[0]->overall_eligibility == '3'): ?>
                                                                        <span style="color:red"><?php echo e($recommendation_electricity_3[0]->overall_remark); ?></span>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    Not Available
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               


                                    <!-- Election remark -->
                                    <div class="col-md-5">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Election Remark</h4>
                                            </div>
                                            <div class="card-body" style="height: 300px;overflow-y: scroll;">
                                                <div class="table-responsive" id="sra-table">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        <tr>
                                                            <td style="width:100px;"><b> Details For Year 2000 or Before</b></td>
                                                            <td style="width:1px;">:</td>
                                                            <td>
                                                                <?php if(isset($recommendation_election_1[0])): ?>
                                                                    <?php if($recommendation_election_1[0]->overall_eligibility == '1'): ?>
                                                                        <span style="color:green"><?php echo e($recommendation_election_1[0]->overall_remark); ?></span>
                                                                    <?php elseif($recommendation_election_1[0]->overall_eligibility == '2'): ?>
                                                                        <span style="color:orange"><?php echo e($recommendation_election_1[0]->overall_remark); ?></span>
                                                                    <?php elseif($recommendation_election_1[0]->overall_eligibility == '3'): ?>
                                                                        <span style="color:red"><?php echo e($recommendation_election_1[0]->overall_remark); ?></span>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    Not Available
                                                                <?php endif; ?>
                                                            </td>
                                                                 <tr>
                                                                    <td style="width:100px;"><b> Details For Year Between 2000 To 2011</b></td>
                                                                    <td style="width:1px;">:</td>
                                                                    <td>
                                                                        <?php if(isset($recommendation_election_2[0])): ?>
                                                                            <?php if($recommendation_election_2[0]->overall_eligibility == '1'): ?>
                                                                                <span style="color:green"><?php echo e($recommendation_election_2[0]->overall_remark); ?></span>
                                                                            <?php elseif($recommendation_election_2[0]->overall_eligibility == '2'): ?>
                                                                                <span style="color:orange"><?php echo e($recommendation_election_2[0]->overall_remark); ?></span>
                                                                            <?php elseif($recommendation_election_2[0]->overall_eligibility == '3'): ?>
                                                                                <span style="color:red"><?php echo e($recommendation_election_2[0]->overall_remark); ?></span>
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            Not Available
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width:100px;"><b>Current Year</b></td>
                                                                    <td style="width:1px;">:</td>
                                                                    <td>
                                                                        <?php if(isset($recommendation_election_3[0])): ?>
                                                                            <?php if($recommendation_election_3[0]->overall_eligibility == '1'): ?>
                                                                                <span style="color:green"><?php echo e($recommendation_election_3[0]->overall_remark); ?></span>
                                                                            <?php elseif($recommendation_election_3[0]->overall_eligibility == '2'): ?>
                                                                                <span style="color:orange"><?php echo e($recommendation_election_3[0]->overall_remark); ?></span>
                                                                            <?php elseif($recommendation_election_3[0]->overall_eligibility == '3'): ?>
                                                                                <span style="color:red"><?php echo e($recommendation_election_3[0]->overall_remark); ?></span>
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            Not Available
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-1"></div>
                                </div>

                                    <div class="row" style="padding: 10px;">
                                    <!-- election end-->
                                    <div class="col-md-1"></div>
                                    <!-- gumasta start-->

                                    <div class="col-md-5">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Gumasta Remark</h4>
                                            </div>

                                            <div class="card-body" style="height: 300px;overflow-y: scroll;">
                                                <div class="table-responsive" id="sra-table">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width:100px;"><b> Details For Year 2000 or Before
  </b>
                                                                    
                                                                </td>
                                                                <td style="width:1px;">:</td>
                                                                <td><?php
                                                                if (isset($recommendation_gumasta_1[0]->overall_remark)) {
                                                                    if ($recommendation_gumasta_1[0]->overall_eligibility == 1) {
                                                                        echo '<span style="color:green;">' . $recommendation_gumasta_1[0]->overall_remark . '</span>';
                                                                    } else if ($recommendation_gumasta_1[0]->overall_eligibility == 2) {
                                                                        echo '<span style="color:red;">' . $recommendation_gumasta_1[0]->overall_remark . '</span>';
                                                                    } else if ($recommendation_gumasta_1[0]->overall_eligibility == 3) {
                                                                        echo '<span style="color:orange;">' . $recommendation_gumasta_1[0]->overall_remark . '</span>';
                                                                    } else {
                                                                        echo $recommendation_gumasta_1[0]->overall_remark;
                                                                    }
                                                                } else {
                                                                    echo 'Not available';
                                                                }
                                                            ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b> Details For Year Between 2000 To 2011

 </b>
                                                                    
                                                                </td>
                                                                <td>:</td>
                                                                <td>
                                                                <?php
                                                                    if (isset($recommendation_gumasta_2[0]->overall_remark)) {
                                                                        if ($recommendation_gumasta_2[0]->overall_eligibility == 1) {
                                                                            echo '<span style="color:green;">' . $recommendation_gumasta_2[0]->overall_remark . '</span>';
                                                                        } else if ($recommendation_gumasta_2[0]->overall_eligibility == 2) {
                                                                            echo '<span style="color:red;">' . $recommendation_gumasta_2[0]->overall_remark . '</span>';
                                                                        } else if ($recommendation_gumasta_2[0]->overall_eligibility == 3) {
                                                                            echo '<span style="color:orange;">' . $recommendation_gumasta_2[0]->overall_remark . '</span>';
                                                                        } else {
                                                                            echo $recommendation_gumasta_2[0]->overall_remark;
                                                                        }
                                                                    } else {
                                                                        echo 'Not available';
                                                                    }
                                                                ?>
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Current Year  </b>
                                                                    
                                                                </td>
                                                                <td>:</td>
                                                                <td> <?php
                                                                if (isset($recommendation_gumasta_3[0]->overall_remark)) {
                                                                    if ($recommendation_gumasta_3[0]->overall_eligibility == 1) {
                                                                        echo '<span style="color:green;">' . $recommendation_gumasta_3[0]->overall_remark . '</span>';
                                                                    } else if ($recommendation_gumasta_3[0]->overall_eligibility == 2) {
                                                                        echo '<span style="color:red;">' . $recommendation_gumasta_3[0]->overall_remark . '</span>';
                                                                    } else if ($recommendation_gumasta_3[0]->overall_eligibility == 3) {
                                                                        echo '<span style="color:orange;">' . $recommendation_gumasta_3[0]->overall_remark . '</span>';
                                                                    } else {
                                                                        echo $recommendation_gumasta_3[0]->overall_remark;
                                                                    }
                                                                } else {
                                                                    echo 'Not available';
                                                                }
                                                            ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Photopass Remark</h4>
                                            </div>

                                            <div class="card-body" style="height: 300px;overflow-y: scroll;">
                                                <div class="table-responsive" id="sra-table">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width:100px;"><b> Details For Year 2000 or Before
  </b> </td>
                                                                <td style="width:1px;">:</td>
                                                                <td></td>

                                                            </tr>
                                                            <!-- <tr>
                                                                <td><b> Details For Year Between 2000 To 2011

 </b>
                                                                    <td>:</td>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Current Year  </b></td>
                                                                <td>:</td>
                                                                <td></td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>


                                <!-- gumasta end-->
                                <!-- photopass start-->
                                <div class="row" style="padding: 10px;">
                                    
                                    <div class="col-md-1"></div>
                                    <!-- adhaar start-->
                                    <div class="col-md-5">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Aadhaar Remark</h4>
                                            </div>

                                            <div class="card-body" style="height: 300px;overflow-y: scroll;">
                                            <div class="table-responsive" id="sra-table">
                                                <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                    <td style="width:100px;"><b>Current Year</b></td>
                                                    <?php
                                                    if (isset($query_adhar[0]->overall_remark)) {
                                                        if ($query_adhar[0]->overall_eligibility == 1) {
                                                        echo '<td style="color:green;">' . $query_adhar[0]->overall_remark . '</td>';
                                                        } else if ($query_adhar[0]->overall_eligibility == 2) {
                                                        echo '<td style="color:red;">' . $query_adhar[0]->overall_remark . '</td>';
                                                        } else if ($query_adhar[0]->overall_eligibility == 3) {
                                                        echo '<td style="color:orange;">' . $query_adhar[0]->overall_remark . '</td>';
                                                        } else {
                                                        echo '<td>' . $query_adhar[0]->overall_remark . '</td>';
                                                        }
                                                    } else {
                                                        echo '<td>Not available</td>';
                                                    }
                                                    ?>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- adhaar end -->
                                    <!-- agreement start-->

                                    <div class="col-md-5">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Registration Agreement Remark</h4>
                                            </div>
                                            <div class="card-body" style="height: 300px;overflow-y: scroll;">
                                                <div class="table-responsive" id="sra-table">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        <tr>
                                                            <td><b>Details For Year 2000 or Before</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php if (isset($recommendation_agreement[0]->overall_remark)) {
                                                                    $color = '';
                                                                    switch ($recommendation_agreement[0]->overall_eligibility) {
                                                                        case 1:
                                                                            $color = 'green';
                                                                            break;
                                                                        case 2:
                                                                            $color = 'red';
                                                                            break;
                                                                        case 3:
                                                                            $color = 'orange';
                                                                            break;
                                                                        default:
                                                                            $color = '';
                                                                    }
                                                                    echo '<span style="color: ' . $color . ';">' . $recommendation_agreement[0]->overall_remark . '</span>';
                                                                } else {
                                                                    echo 'Not Available';
                                                                } ?>
                                                            </td>
                                                        </tr>

                                                            
                                                            <tr>
                                                                <td><b>Details For Year Between 2000 To 2011</b></td>
                                                                <td>:</td>
                                                                <td>
                                                                    <?php if (isset($query_agreement_recomm[0]->overall_remark)) {
                                                                        if ($query_agreement_recomm[0]->year == '2') {
                                                                            echo $query_agreement_recomm[0]->overall_remark;
                                                                        } else {
                                                                            echo 'Not Available';
                                                                        }
                                                                    } else {
                                                                        echo 'Not Available';
                                                                    } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Current Year</b></td>
                                                                <td>:</td>
                                                                <td>
                                                                    <?php if (isset($query_agreement_recomm[0]->overall_remark)) {
                                                                        if ($query_agreement_recomm[0]->year == '3') {
                                                                            echo $query_agreement_recomm[0]->overall_remark;
                                                                        } else {
                                                                            echo 'Not Available';
                                                                        }
                                                                    } else {
                                                                        echo 'Not Available';
                                                                    } ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1"></div>
                                </div>                      

                            <!-- agreement end-->
                            <!-- agreement start-->
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-12">
                                  <div class="card">
                                  <div class="card-header">
                                    <h4>Overall Remark</h4>
                                  </div>
                                    
                                        <div class="card-body">
                                            <div class="table-responsive" id="sra-table">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:90px;"><b>Electricity </b> 
                                                                
                                                            </td>
                                                            <td style="width:1px;">:</td>
                                                            <td style="color:
                                                                <?php if(isset($overall_remark[0]->electricity_status)): ?>
                                                                    <?php if($overall_remark[0]->electricity_status == 1): ?>
                                                                        green
                                                                    <?php elseif($overall_remark[0]->electricity_status == 2): ?>
                                                                        red
                                                                    <?php elseif($overall_remark[0]->electricity_status == 3): ?>
                                                                        orange
                                                                    <?php else: ?>
                                                                        black
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    black
                                                                <?php endif; ?>"><?php echo e(isset($overall_remark[0]->electricity_remark) ? $overall_remark[0]->electricity_remark : 'Not Available'); ?></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="width:90px;"><b>Election </b>
                                                                
                                                            </td>
                                                            <td style="width:1px;">:</td>
                                                             <td style="color:
                                                                <?php if(isset($overall_remark[0]->election_status)): ?>
                                                                    <?php if($overall_remark[0]->election_status == 1): ?>
                                                                        green
                                                                    <?php elseif($overall_remark[0]->election_status == 2): ?>
                                                                        red
                                                                    <?php elseif($overall_remark[0]->election_status == 3): ?>
                                                                        orange
                                                                    <?php else: ?>
                                                                        black
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    black
                                                                <?php endif; ?>"><?php echo e(isset($overall_remark[0]->election_remark) ? $overall_remark[0]->election_remark : 'Not Available'); ?></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="width:90px;"><b>Gumasta</b></td>
                                                            <td style="width:1px;">:</td>
                                                            <td style="color:
                                                                <?php if(isset($overall_remark[0]->gumasta_status)): ?>
                                                                    <?php if($overall_remark[0]->gumasta_status == 1): ?>
                                                                        green
                                                                    <?php elseif($overall_remark[0]->gumasta_status == 2): ?>
                                                                        red
                                                                    <?php elseif($overall_remark[0]->gumasta_status == 3): ?>
                                                                        orange
                                                                    <?php else: ?>
                                                                        black
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    black
                                                                <?php endif; ?>">
                                                                <?php echo e(isset($overall_remark[0]->gumasta_remark) ? $overall_remark[0]->gumasta_remark : 'Not Available'); ?>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width:90px;"><b>Photopass  </b>
                                                                
                                                            </td>
                                                            <td style="width:1px;">:</td>
                                                            <td><?php echo e(isset($overall_remark[0]->photopass_remark) ? $overall_remark[0]->photopass_remark : 'Not Available'); ?></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="width:90px;"><b>Registration Agreement  </b>
                                                               
                                                            </td>
                                                           <td style="width:1px;">:</td>
                                                            
                                                            <td style="color:
                                                                <?php if(isset($overall_remark[0]->agreement_status)): ?>
                                                                    <?php if($overall_remark[0]->agreement_status == 1): ?>
                                                                        green
                                                                    <?php elseif($overall_remark[0]->agreement_status == 2): ?>
                                                                        red
                                                                    <?php elseif($overall_remark[0]->agreement_status == 3): ?>
                                                                        orange
                                                                    <?php else: ?>
                                                                        black
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    black
                                                                <?php endif; ?>"> <?php echo e(isset($overall_remark[0]->agreement_remark) ? $overall_remark[0]->agreement_remark : 'Not Available'); ?></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="width:90px;"><b>Aadhar </b>
                                                               
                                                            </td>
                                                           <td style="width:1px;">:</td>
                                                            
                                                            <td style="color:
                                                                <?php if(isset($overall_remark[0]->adhar_status)): ?>
                                                                    <?php if($overall_remark[0]->adhar_status == 1): ?>
                                                                        green
                                                                    <?php elseif($overall_remark[0]->adhar_status == 2): ?>
                                                                        red
                                                                    <?php elseif($overall_remark[0]->adhar_status == 3): ?>
                                                                        orange
                                                                    <?php else: ?>
                                                                        black
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    black
                                                                <?php endif; ?>"> <?php echo e(isset($overall_remark[0]->adhar_remark) ? $overall_remark[0]->adhar_remark : 'Not Available'); ?></td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                            <!-- agreement end-->
                            <!-- overall remark end -->

                            <!-- start-->
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <?php if ($currentUser->hasAccess('admin.sra.ca_remark')) : ?>
                                            <form method="POST" action="<?php echo e(route('admin.sra.final_ca_submit')); ?>">
                                                 <?php echo csrf_field(); ?>
                                                <input type="hidden" id="hut_id" name="hut_id" value="<?= $hid ?>"
                                                    required>
                                                <?php
                                                
                                                $status = $submit_status = 0;
                                                $remark = '';
                                                $final_remark = '';
                                                $final_remark .= (isset($recommendation_electricity_1[0]->overall_remark)) ? $recommendation_electricity_1[0]->overall_remark : '';
                                                $final_remark .= (isset($recommendation_electricity_2[0]->overall_remark)) ? $recommendation_electricity_2[0]->overall_remark : '';
                                                $final_remark .= (isset($recommendation_electricity_3[0]->overall_remark)) ? $recommendation_electricity_3[0]->overall_remark : '';
                                                $final_remark .= (isset($recommendation_election_1[0]->overall_remark)) ? $recommendation_election_1[0]->overall_remark : '';
                                                $final_remark .= (isset($recommendation_election_2[0]->overall_remark)) ? $recommendation_election_2[0]->overall_remark : '';
                                                $final_remark .= (isset($recommendation_election_3[0]->overall_remark)) ? $recommendation_election_3[0]->overall_remark : '';
                                                $final_remark .= (isset($recommendation_gumasta_1[0]->overall_remark)) ? $recommendation_gumasta_1[0]->overall_remark : '';
                                                $final_remark .= (isset($recommendation_gumasta_2[0]->overall_remark)) ? $recommendation_gumasta_2[0]->overall_remark : '';
                                                $final_remark .= (isset($recommendation_gumasta_3[0]->overall_remark)) ? $recommendation_gumasta_3[0]->overall_remark : '';
                                                $final_remark .= (isset($query_adhar[0]->overall_remark)) ? $query_adhar[0]->overall_remark : '';
                                                $final_remark .= (isset($query_agreement_recomm[0]->overall_remark)) ? $query_agreement_recomm[0]->overall_remark : '';

                                                // echo $remark;die;
                                                //print_r($sims_data);
                                                //echo "aaa:".$missing_doc_status;
                                                if (count($overall_ca_remark) > 0) {
                                                    foreach ($overall_ca_remark as $data) {
                                                        $remark = $data->remark;
                                                        $status = $data->overall_status;
                                                        $submit_status = $data->status;
                                                    }
                                                }
                                                $remark_vendor = $submit_status_vendor = $status_vendor = '';
                                                if (count($overall_remark_vendor) > 0) {
                                                    foreach ($overall_remark_vendor as $data) {
                                                        $remark_vendor = $data->overall_remark;
                                                        $status_vendor = $data->overall_status;
                                                        $submit_status_vendor = $data->status;
                                                    }
                                                }
                                                ?>

                                                 <div class="form-group">
                                                    <label>Overall Recommendation by Assistant:</label>
                                                        <?php
                                                        // echo $status;die;
                                                        $data_select_vendor = '';
                                                            if($status_vendor == 1)
                                                                $data_select_vendor = 'Eligible';
                                                            elseif($status_vendor == 2)
                                                                $data_select_vendor = 'Not Eligible';
                                                            elseif($status_vendor == 3)
                                                                $data_select_vendor = 'Undecided';
                                                            elseif($status_vendor == 4)
                                                                $data_select_vendor = 'Eligible with charges';
                                                            
                                                        echo "<input type='text' class='form-control' name='remark' id='remark' value= '$data_select_vendor' readonly>";
                                                        ?>
                                                </div>

                                                <div class="form-group">
                                                    <label>Final Remark:</label>
                                                    <?php if($remark_vendor == ""){ ?>
                                                    <textarea class='form-control' name='remark' id='remark' readonly></textarea>
                                                    <?php } else{ ?>
                                                    <textarea class='form-control' name='remark' id='remark' readonly><?php echo e($remark_vendor); ?></textarea>
                                                    <?php } ?>

                                                </div>
                                                <div class="form-group">
                                                    <label>Overall Recommendation:</label>
                                                    <select class='form-control' name="status" style="width:30%;">

                                                        <?php if($status == 0){ ?>
                                                        <option value="0" selected="">-- Select Status --</option>
                                                        <?php }else{ ?>
                                                        <option value="0">-- Select Status --</option>
                                                        <?php }?>
                                                        <?php if($status == 1){ ?>
                                                        <option value="1" selected="">Eligible</option>
                                                        <?php }else{ ?>
                                                        <option value="1">Eligible</option>
                                                        <?php }?>
                                                        <?php if($status == 2){ ?>
                                                        <option value="2" selected="">Not Eligible</option>
                                                        <?php }else{ ?>
                                                        <option value="2">Not Eligible</option>
                                                        <?php }?>
                                                        <?php if($status == 3){ ?>
                                                        <option value="3" selected="">Undecided</option>
                                                        <?php }else{ ?>
                                                        <option value="3">Undecided</option>
                                                        <?php }?>
                                                        <?php if($status == 4){ ?>
                                                        <option value="4" selected="">Eligible with charges</option>
                                                        <?php }else{ ?>
                                                        <option value="4">Eligible with charges</option>
                                                        <?php }?>
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label>Final Remark:</label>
                                                    <?php if($remark == ""){ ?>
                                                    <textarea class='form-control' name='remark' id='remark'><?php echo e($final_remark); ?></textarea>
                                                    <?php } else{ ?>
                                                    <textarea class='form-control' name='remark' id='remark'><?php echo e($remark); ?></textarea>
                                                    <?php } ?>


                                                </div>
                                                <div class="form-group">
                                                     
                                                        
                                                        <?php if($submit_status == 0){?>
                                                        <button type="submit" class="btn btn-primary" name="action"
                                                            value="submit">Submit</button>
                                                        <?php } ?>
                                                        
                                                    
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                                            <form method="POST" action="<?php echo e(route('admin.sra.final_submit')); ?>">
                                                 <?php echo csrf_field(); ?>
                                                <input type="hidden" id="hut_id" name="hut_id" value="<?= $hid ?>"
                                                    required>
                                                <?php
                                                
                                                $status = $submit_status = 0;
                                                $remark = '';
                                                //print_r($sims_data);
                                                //echo "aaa:".$missing_doc_status;
                                                if (count($sims_data) > 0) {
                                                    foreach ($sims_data as $data) {
                                                        $remark = $data->overall_remark;
                                                        $status = $data->overall_status;
                                                        $submit_status = $data->status;
                                                        
                                                    }
                                                }
                                                ?>

                                                <div class="form-group">
                                                    <label>Overall Recommendation::</label>
                                                    <select class='form-control' name="status" style="width:30%;">

                                                        <?php if($status == 0){ ?>
                                                        <option value="0" selected="">-- Select Status --</option>
                                                        <?php }else{ ?>
                                                        <option value="0">-- Select Status --</option>
                                                        <?php }?>
                                                        <?php if($status == 1){ ?>
                                                        <option value="1" selected="">Eligible</option>
                                                        <?php }else{ ?>
                                                        <option value="1">Eligible</option>
                                                        <?php }?>
                                                        <?php if($status == 2){ ?>
                                                        <option value="2" selected="">Not Eligible</option>
                                                        <?php }else{ ?>
                                                        <option value="2">Not Eligible</option>
                                                        <?php }?>
                                                        <?php if($status == 3){ ?>
                                                        <option value="3" selected="">Undecided</option>
                                                        <?php }else{ ?>
                                                        <option value="3">Undecided</option>
                                                        <?php }?>
                                                        <?php if($status == 4){ ?>
                                                        <option value="4" selected="">Eligible with charges</option>
                                                        <?php }else{ ?>
                                                        <option value="4">Eligible with charges</option>
                                                        <?php }?>
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label>Final Remark:</label>
                                                    <?php if($remark == ""){ ?>
                                                    <textarea class='form-control' name='remark' id='remark'></textarea>
                                                    <?php } else{ ?>
                                                    <textarea class='form-control' name='remark' id='remark'><?php echo e($remark); ?></textarea>
                                                    <?php } ?>


                                                </div>
                                                <div class="form-group">
                                                     
                                                        <?php if($missing_doc_status == 0){?>
                                                        <button type="submit" class="btn btn-primary" name="action"
                                                            value="missing">Document Missing</button>
                                                        <?php }else{ ?>
                                                        <?php if($submit_status == 0){?>
                                                        <button type="submit" class="btn btn-primary" name="action"
                                                            value="submit">Submit</button>
                                                        <?php } ?>
                                                        <?php } ?>
                                                  
                                                    
                                                </div>
                                            <?php endif; ?>
                                               
                                                
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- end -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>




<style>
    .tab-switch:checked+.tab-label {
        background: #1269db !important;
        color: white !important;
    }

    .tab-label {
        background: white !important;
    }
</style>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/sra/final.blade.php ENDPATH**/ ?>