<!DOCTYPE html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>


<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::sra.sradetailtitle'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('admin::sra.sradetailtitle'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>


<style type="text/css">
    .zoom {
      cursor: zoom-in;
      transition: transform 0.2s ease-in-out;

    }

    .zoom-in {
      cursor: zoom-out;
      transform: scale(1.5);

    }

    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 50% !important; /* Full height */
    overflow: scroll !important;
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }

  /* Modal Content (image) */
  .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
  }

  /* Caption of Modal Image */

  /* Add Animation */
  .modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
  }

  @-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
  }

  @keyframes  zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
  }

  /* The Close Button */
  .close {
    position: absolute;
    top: 100px;
    right: 45px;
    color: #fff !important;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }

  /* 100% Image Width on Smaller Screens */
  @media  only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  }
  .tabs {
    position: relative;
    /*background: #ccc;*/
    height: 450.75rem;
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
    border:1px solid #bdc3c7;
    opacity: 0;
    transition: all 0.35s;
    width:100%;
  }
  .tab-switch:checked + .tab-label {
    background: #fff;
    color: #2c3e50;
    border-bottom: 0;
    border-right: 0.125rem solid #fff;
    transition: all 0.35s;
    z-index: 1;

  }
  .tab-switch:checked + label + .tab-content {
    z-index: 2;
    opacity: 1;
    transition: all 0.35s;
  }
  th,td {
          border-bottom: none !important;
          height: 30px !important;
          font-size:18px !important;
      }
      h4{
        font-size:18px !important;
        font-weight: bold !important;
      }

  .panel-default>.panel-heading {
    color: #fff;
    background-color: #1269db ;
    border-color: #e4e5e7;
    padding: 0;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  .panel-default>.panel-heading a {
    display: block;
    padding: 10px 15px;
    color:#fff;
  }


  .panel-default>.panel-heading a:after {
    content: "";
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    float: right;
    transition: transform .25s linear;
    -webkit-transition: -webkit-transform .25s linear;
    color:#fff;
  }

  .panel-default>.panel-heading a[aria-expanded="true"] {
    background-color: #1269db ;
    color:#fff;
  }

  .panel-default>.panel-heading a[aria-expanded="true"]:after {
    content: "\2212";
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
    color:#fff;
  }

  .panel-default>.panel-heading a[aria-expanded="false"]:after {
    content: "\002b";
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
    color:#fff;
  }


  .accordion-option {
    width: 100%;
    float: left;
    clear: both;
    margin: 15px 0;
  }

  .accordion-option .title {
    font-size: 20px;
    font-weight: bold;
    float: left;
    padding: 0;
    margin: 0;
  }

  .accordion-option .toggle-accordion {
    float: right;
    font-size: 16px;
    color: #6a6c6f;
  }

  .accordion-option .toggle-accordion:before {
    content: "Expand All";
  }

  .accordion-option .toggle-accordion.active:before {
    content: "Collapse All";
  }

  </style>

<?php $__env->startSection('content'); ?>

    <?php $access = 'readonly'; ?>
    <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
        <?php
        $access = '';
        ?>
    <?php endif; ?>



    <div class="row">
        <div class="col-md-12">
            <!-- tab start-->
            <div class="card">
                <div class="card-body">
                    <div class="tabs">
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-1" class="tab-switch">
                            <a href="index.php/sra/detail/<?php echo e($hid); ?>" class="tab-label"
                                style="color:#495057!important;">Electricity</a>
                            <div class="tab-content">
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
                            <a href="index.php/sra/elections/<?php echo e($hid); ?>" class="tab-label"
                                style="color:#495057!important;">Election</a>
                            <div class="tab-content">Election Details</div>
                        </div>
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-3" checked class="tab-switch">
                            <a href="index.php/sra/gumasta/<?php echo e($hid); ?>" class="tab-label"
                                style="color:#495057!important;">Gumasta</a>
                            <div class="tab-content"></div>
                        </div>
                        <!-- <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
                            <a href="index.php/sra/" class="tab-label" style="color:#495057!important;">Registarion Agreement
                                Details</a>
                            <div class="tab-content">Registarion Agreement</div>
                        </div> -->
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-5" checked class="tab-switch">
                            <label for="tab-1" class="tab-label">Photo Pass Details</label>
                            <div class="tab-content">
                                <!-- start-->
                                <div class="table-responsive" id="sra-table">
                                    <table class="table table-borderless table-responsive">
                                        <thead>
                                            <tr>
                                              <th>Cluster ID</th>
                                                <th>Hut ID</th>
                                               
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
                                                <td><?php echo e($data->ClusterId); ?></td>
                                                    <td><?php echo e($data->HUTSURVERYID); ?></td>
                                                    <?php $hid = $data->HUTSURVERYID; ?>
                                                    <td><?php echo e($data->SchemeName); ?></td>
                                                    <td><?php echo e($data->HUTOWNERNAME); ?></td>
                                                    <td><?php echo e($data->Address); ?></td>
                                                    <td><?php echo e($data->PropertyType); ?></td>
                                                    <td><?php echo e($data->FLOORNUM); ?></td>
                                                    <td><?php echo e(round($data->HUTLENGTH, 2)); ?></td>
                                                    <td><?php echo e(round($data->HUTWIDTH, 2)); ?></td>
                                                    <td><?php echo e(round($data->Area, 2)); ?></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="padding:10px;">
                                    <div class="clearfix"></div>
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                      <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                          <h4 class="panel-title">
                                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Details For Year 2000 or Before


                                          </a>
                                        </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="headingOne">
                                          <div class="panel-body" style="background-color: #dbd7d2;padding-bottom:5px;">
                                              <!-- comparison code Start -->
                                    <?php
                                    $area_sims = $application_no_sims = $address_sims = $name_sims = $type_sims = $application_no_sims =  $landownership_sims = '';
                                    // print_r($results[0]);die;
                                    foreach ($query as $data) {
                                        $name_sims = $data->HUTOWNERNAME;
                                        $address_sims = $data->Address;
                                        $application_no_sims = 'Not Available';
                                        $landownership_sims = 'Not Available';
                                        $type_sims = $data->PropertyType;
                                        $area_sims = $data->Area;
                                    }
                                    $name_int = $address_int = $application_no_int = $landownership_int = $type_int = $area_int = '';
                                    $name_doc = $address_doc = $application_no_doc = $landownership_doc = $type_doc = $area_doc = '';
                                    $match_name = $match_address = $match_application_no = $match_landownership = $match_area = $match_type = [];
                                    // print_r($results[0]);

                                    $name_int = isset($results[0]->NameOfSlumOwner) ? $results[0]->NameOfSlumOwner : '';
                                    $address_int = isset($results[0]->SlumNameAdd) ? $results[0]->SlumNameAdd : '';
                                    $application_no_int = isset($results[0]->ApplicationNo) ? $results[0]->ApplicationNo : '';
                                    $type_int = isset($results[0]->UseOfSlum) ? $results[0]->UseOfSlum : '';
                                    $landownership_int = isset($results[0]->LandOwnership) ? $results[0]->LandOwnership : '';
                                    $area_int = isset($results[0]->LandArea) ? $results[0]->LandArea : '';

                                    foreach ($query3 as $data) {
                                        // if ($data->year == '2000') {

                                        $name_doc = $data->name_as_per_survey_receipt;
                                        $address_doc = $data->address_as_per_survey_receipt;
                                        $application_no_doc = $data->survey_receipt_no;
                                        $type_doc = $data->usage_type_of_hut;
                                        $landownership_doc = $data->land_ownership;
                                        $area_doc = $data->area_of_hut;
                                    }
// die;
                                    $match_name_array = $match_address_array = $match_application_no_array = $match_type_array = array();

                                    $highestPercentageOfType = $highestPercentageOfAddress = $highestPercentageOfName = $highestPercentageOfApplicationNo = 0;
                                    $highestPercentageType = $highestPercentageAddress = $highestPercentageName = $highestPercentageApplicationNo = '';
                                    $color_type = $color_address = $color_name = $color_application_no = 'red';


                                    if ($type_int == 0)
                                        $type_int_data = 'Residential';
                                    elseif ($type_int == 1)
                                        $type_int_data = 'Commercial';
                                    else
                                        $type_int_data = 'Other';

                                    array_push($match_name_array,$name_sims);
                                    array_push($match_address_array,$address_sims);
                                    array_push($match_application_no_array,$application_no_sims);
                                    array_push($match_type_array,$type_sims);


                                    array_push($match_name_array,$name_doc);
                                    array_push($match_address_array,$address_doc);
                                    array_push($match_application_no_array,$application_no_doc);
                                    array_push($match_type_array,$type_doc);


                                    array_push($match_name_array,$name_int);
                                    array_push($match_address_array,$address_int);
                                    array_push($match_application_no_array,$application_no_int);
                                    array_push($match_type_array,$type_int_data);
// print_r($match_type_array);die;
                                    $highestPercentageOfName = $per =0;
                                    $highestPercentageName = $match_string ="";
                                    $res = array();


                                    $res = \SraHelper::instance()->integration_return_value_percentage_data($match_name_array);
                                    // print_r($res);
                                    $match_str = $res['match_string'];$per = $res['percentage'];
                                    if(count($res) > 0){
                                        if($per > 0){
                                        $highestPercentageOfName = $per;
                                        $highestPercentageName = $match_str;
                                        }
                                        if($per == 0){
                                        $highestPercentageOfName = $per;
                                        $highestPercentageName = $match_str;
                                        }
                                        if($per < 0){
                                        $highestPercentageOfName = 0;
                                        $highestPercentageName = $match_str;
                                        }
                                    }


                                    if($highestPercentageName == 'Not Available')
                                        $highestPercentageOfName = 0;


                                    if($highestPercentageOfName == 100 )
                                        $color_name = '#238823';
                                    elseif($highestPercentageOfName >= 50)
                                        $color_name = '#FFBF00';
                                    else
                                        $color_name = '#d2222d';


                                    $highestPercentageOfAddress = $per =0;
                                    $highestPercentageAddress = $match_string ="";
                                    $res = array();


                                    $res = \SraHelper::instance()->integration_return_value_percentage_data($match_address_array);
                                    // print_r($res);
                                    $match_str = $res['match_string'];$per = $res['percentage'];
                                    if(count($res) > 0){
                                        if($per > 0){
                                        $highestPercentageOfAddress = $per;
                                        $highestPercentageAddress = $match_str;
                                        }
                                        if($per == 0){
                                        $highestPercentageOfAddress = $per;
                                        $highestPercentageAddress = $match_str;
                                        }
                                        if($per < 0){
                                        $highestPercentageOfAddress = 0;
                                        $highestPercentageAddress = $match_str;
                                        }
                                    }


                                    if($highestPercentageAddress == 'Not Available')
                                        $highestPercentageOfAddress = 0;


                                    if($highestPercentageOfAddress == 100 )
                                        $color_address = '#238823';
                                    elseif($highestPercentageOfAddress >= 50)
                                        $color_address = '#FFBF00';
                                    else
                                        $color_address = '#d2222d';

                                    $highestPercentageOfType = $per =0;
                                    $highestPercentageType = $match_string ="";
                                    $res = array();


                                    $res = \SraHelper::instance()->integration_return_value_percentage_data($match_type_array);
                                    // print_r($res);
                                    $match_str = $res['match_string'];$per = $res['percentage'];
                                    if(count($res) > 0){
                                        if($per > 0){
                                        $highestPercentageOfType = $per;
                                        $highestPercentageType = $match_str;
                                        }
                                        if($per == 0){
                                        $highestPercentageOfType = $per;
                                        $highestPercentageType = $match_str;
                                        }
                                        if($per < 0){
                                        $highestPercentageOfType = 0;
                                        $highestPercentageType = $match_str;
                                        }
                                    }


                                    if($highestPercentageType == 'Not Available')
                                        $highestPercentageOfType = 0;


                                    if($highestPercentageOfType == 100 )
                                        $color_type = '#238823';
                                    elseif($highestPercentageOfType >= 50)
                                        $color_type = '#FFBF00';
                                    else
                                        $color_type = '#d2222d';

                                    $highestPercentageOfApplicationNo = $per =0;
                                    $highestPercentageApplicationNo = $match_string ="";
                                    $res = array();


                                    $res = \SraHelper::instance()->integration_return_value_percentage_data($match_application_no_array);
                                    // print_r($res);
                                    $match_str = $res['match_string'];$per = $res['percentage'];
                                    if(count($res) > 0){
                                        if($per > 0){
                                        $highestPercentageOfApplicationNo = $per;
                                        $highestPercentageApplicationNo = $match_str;
                                        }
                                        if($per == 0){
                                        $highestPercentageOfApplicationNo = $per;
                                        $highestPercentageApplicationNo = $match_str;
                                        }
                                        if($per < 0){
                                        $highestPercentageOfApplicationNo = 0;
                                        $highestPercentageApplicationNo = $match_str;
                                        }
                                    }


                                    if($highestPercentageApplicationNo == 'Not Available')
                                        $highestPercentageOfApplicationNo = 0;


                                    if($highestPercentageOfApplicationNo == 100 )
                                        $color_application_no = '#238823';
                                    elseif($highestPercentageOfApplicationNo >= 50)
                                        $color_application_no = '#FFBF00';
                                    else
                                        $color_application_no = '#d2222d';
                                ?>
                                <div class="col-md-12">

                                    <br/>

                                    <!-- comparison code end -->
                                    <div class="row">
                                        <div class="col-md-9">
                                            <!-- Sims data nad OCR start-->
                                            <h4>SIMS Data</h4>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive" id="sra-table">
                                                        <table class="table table-borderless table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th width="10%">Application Number</th>
                                                                    <th width="20%">Owner Name</th>
                                                                    <th width="20%">Address</th>
                                                                    
                                                                    <th width="10%">Use Of Slum</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>

                                                                    <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <td width="10%">Not Available</td>
                                                                        <td width="20%"><?php echo e($data->HUTOWNERNAME); ?></td>
                                                                        <td width="20%"><?php echo e($data->Address); ?></td>
                                                                        
                                                                        <td width="10%"><?php echo e($data->PropertyType); ?></td>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>SIMS OCR</h4>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive" id="sra-table">

                                                            <table class="table table-borderless table-responsive">
                                                            <thead>
                                                                <tr>
                                                                     <th width="10%">Application Number</th>
                                                                    <th width="20%">Owner Name</th>
                                                                    <th width="20%">Address</th>
                                                                    
                                                                    <th width="10%">Use Of Slum</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  if(count($query3)>=1){ ?>
                                                                    <?php $__currentLoopData = $query3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <tr>
                                                                            <td width="10%"><?php echo e($row->survey_receipt_no); ?></td>
                                                                            <td width="20%"><?php echo e($row->name_as_per_survey_receipt); ?></td>
                                                                            <td width="20%"><?php echo e($row->address_as_per_survey_receipt); ?></td>
                                                                            
                                                                            <td width="10%"><?php echo e($row->usage_type_of_hut); ?></td>
                                                                            <?php $document = $row->survey_receipt_image; ?>
                                                                        </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php }else{ ?>
                                                                    <tr>
                                                                        <td width="10%">Not Available</td>
                                                                        <td width="20%">Not Available</td>
                                                                        <td width="20%">Not Available</td>
                                                                        <td width="10%">Not Available</td>
                                                                        
                                                                    </tr>
                                                                <?php } ?>




                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>
                                            </div>

                                            <!-- sims data and OCR end -->
                                        </div>
                                        <div class="col-md-3">
                                            <!-- ocr image start-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php
                            if(count($query3)>0){
                            ?>
                                                    <img src="http://localhost/Newfolder/sraservices/images/<?php echo e($hid); ?>_survey_receipt.jpeg"
                                                        onerror="this.onerror=null; this.src='http://sra-uat.apniamc.in/images/noimage.jpg';"
                                                        style="height: 320px; width: 250px;" id="myImg">

                                                    <?php }else{ ?>
                                                    <img src="http://sra-uat.apniamc.in/images/noimage.jpg"
                                                        style="height:320px;width:250px;">
                                                    <?php } ?>
                                                    <!-- start-->
                                                    <div id="myModal" class="modal">
                                                        <span class="close">&times;</span>
                                                        <img class="modal-content" id="img01">

                                                    </div>
                                                    <script>
                                                        // Get the modal
                                                        var modal = document.getElementById("myModal");

                                                        // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                        var img = document.getElementById("myImg");
                                                        var modalImg = document.getElementById("img01");
                                                        var captionText = document.getElementById("caption");
                                                        img.onclick = function() {
                                                            modal.style.display = "block";
                                                            modalImg.src = this.src;
                                                            modalImg.classList.add("zoom");
                                                            captionText.innerHTML = this.alt;
                                                        }

                                                        // Get the <span> element that closes the modal
                                                        var span = document.getElementsByClassName("close")[0];

                                                        // When the user clicks on <span> (x), close the modal
                                                        span.onclick = function() {
                                                            modal.style.display = "none";
                                                            modalImg.classList.remove("zoom");
                                                        }
                                                         // Zoom in and out on double-click
                                                        modalImg.ondblclick = function() {
                                                        if (modalImg.classList.contains("zoom")) {
                                                            modalImg.classList.remove("zoom");
                                                            modalImg.classList.add("zoom-in");
                                                        } else if (modalImg.classList.contains("zoom-in")) {
                                                            modalImg.classList.remove("zoom-in");
                                                            modalImg.classList.add("zoom");
                                                        }
                                                        }
                                                    </script>
                                                    <!-- end -->
                                                </div>
                                            </div>
                                            <!-- ocr image end -->
                                        </div>
                                    </div>
                                    


                                    <?php if(count($query3) >= 1){ ?>
                                    <h4>Integration Data</h4>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive" id="sra-table">
                                                <table class="table table-borderless table-responsive">
                                                    <thead>
                                                        <tr>
                                                             <th width="10%">Application Number</th>
                                                                    <th width="20%">Owner Name</th>
                                                                    <th width="20%">Address</th>
                                                            
                                                            <th width="10%">Use Of Slum</th>
                                                            <th width="10%">Image 1</th>
                                                            <th width="10%">Image 2</th>


                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>

                                                            <?php if(isset($result->ApplicationNo)): ?>
            <td width="10%"><?php echo e($result->ApplicationNo); ?></td>
        <?php else: ?>
            <td width="10%"></td>
        <?php endif; ?>

        <?php if(isset($result->NameOfSlumOwner)): ?>
            <td width="20%"><?php echo e($result->NameOfSlumOwner); ?></td>
        <?php else: ?>
            <td width="20%"></td>
        <?php endif; ?>

        <?php if(isset($result->SlumNameAdd)): ?>
            <td width="20%"><?php echo e($result->SlumNameAdd); ?></td>
        <?php else: ?>
            <td width="10%"></td>
        <?php endif; ?>

        
        <?php if(isset($result->UseOfSlum)): ?>
            <?php if($result->UseOfSlum == 0): ?>
                <td width="10%">Residential</td>
            <?php elseif($result->UseOfSlum == 1): ?>
                <td width="10%">Commercial</td>
            <?php else: ?>
                <td width="10%">Other</td>
            <?php endif; ?>
        <?php else: ?>
            <td width="10%"></td>
        <?php endif; ?>

                                                            <?php if(isset($result->SlumImage)): ?>
                                                            <td width="10%">
                                                            <?php
                                                            $thumbnailClass = 'thumbnail_' . $results[0]->SlumImage;
                                                            $thumbnailSrc = 'data:image/png;base64,' . base64_encode($results[0]->SlumImage);
                                                            ?>
                                                            <div id="myModal1" class="modal">
                                                                <span class="close">&times;</span>
                                                                <img class="modal-content" id="img02">

                                                            </div>
                                                            <img class="<?php echo e($thumbnailClass); ?> thumbnail" src="<?php echo e($thumbnailSrc); ?>"
                                                                width='150' height='150' id="myImg1" />
                                                            </td>

                                                        <?php else: ?>
                                                            <td width="10%"></td>
                                                        <?php endif; ?>

                                                        <script>
                                                            // Get the modal
                                                            var modal = document.getElementById("myModal1");

                                                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                            var img = document.getElementById("myImg1");
                                                            var modalImg = document.getElementById("img02");
                                                            var captionText = document.getElementById("caption");
                                                            img.onclick = function() {
                                                                modal.style.display = "block";
                                                                modalImg.src = this.src;
                                                                modalImg.classList.add("zoom");
                                                                captionText.innerHTML = this.alt;
                                                            }

                                                            // Get the <span> element that closes the modal
                                                            var span = document.getElementsByClassName("close")[1];

                                                            // When the user clicks on <span> (x), close the modal
                                                            span.onclick = function() {
                                                                modalImg.classList.remove("zoom");
                                                                modal.style.display = "none";
                                                            }
                                                             // Zoom in and out on double-click
                                                            modalImg.ondblclick = function() {
                                                            if (modalImg.classList.contains("zoom")) {
                                                                modalImg.classList.remove("zoom");
                                                                modalImg.classList.add("zoom-in");
                                                            } else if (modalImg.classList.contains("zoom-in")) {
                                                                modalImg.classList.remove("zoom-in");
                                                                modalImg.classList.add("zoom");
                                                            }
                                                            }
                                                        </script>




                                                            <?php if(isset($result->OfficeUseImage)): ?>
                                                            <td width="10%">
                                                            <?php
                                                            $thumbnailClass = 'thumbnail_' . $results[0]->OfficeUseImage;
                                                            $thumbnailSrc = 'data:image/png;base64,' . base64_encode($results[0]->OfficeUseImage);
                                                            ?>
                                                            <div id="myModal2" class="modal">
                                                                <span class="close">&times;</span>
                                                                <img class="modal-content" id="img03">

                                                            </div>
                                                            <img class="<?php echo e($thumbnailClass); ?> thumbnail" src="<?php echo e($thumbnailSrc); ?>"
                                                                width='150' height='150' id="myImg2" />
                                                            </td>

                                                        <?php else: ?>
                                                            <td width="10%"></td>
                                                        <?php endif; ?>

                                                        <script>
                                                            // Get the modal
                                                            var modal = document.getElementById("myModal2");

                                                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                            var img = document.getElementById("myImg2");
                                                            var modalImg = document.getElementById("img03");
                                                            var captionText = document.getElementById("caption");
                                                            img.onclick = function() {
                                                                modal.style.display = "block";
                                                                modalImg.src = this.src;
                                                                modalImg.classList.add("zoom");
                                                                captionText.innerHTML = this.alt;
                                                            }

                                                            // Get the <span> element that closes the modal
                                                            var span = document.getElementsByClassName("close")[2];

                                                            // When the user clicks on <span> (x), close the modal
                                                            span.onclick = function() {
                                                                modalImg.classList.remove("zoom");
                                                                modal.style.display = "none";
                                                            }
                                                             // Zoom in and out on double-click
                                                                modalImg.ondblclick = function() {
                                                                if (modalImg.classList.contains("zoom")) {
                                                                    modalImg.classList.remove("zoom");
                                                                    modalImg.classList.add("zoom-in");
                                                                } else if (modalImg.classList.contains("zoom-in")) {
                                                                    modalImg.classList.remove("zoom-in");
                                                                    modalImg.classList.add("zoom");
                                                                }
                                                                }
                                                        </script>


                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                        <h4>Integration Data</h4>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive" id="sra-table">
                                                <table class="table table-borderless table-responsive">
                                                    <thead>
                                                        <tr>
                                                             <th width="10%">Application Number</th>
                                                                    <th width="20%">Owner Name</th>
                                                                    <th width="20%">Address</th>
                                                            
                                                            <th width="10%">Use Of Slum</th>
                                                            <th width="10%">Image-1</th>
                                                            <th width="10%">Image-2</th>


                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td width="10%">Not Available</td>
                                                            <td width="20%">Not Available</td>
                                                                <td width="20%">Not Available</td>
                                                                
                                                                <td width="10%">Not Available</td>
                                                                <td width="10%">Not Available</td>
                                                                <td width="10%">Not Available</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                        <?php } ?>
                                    <!-- Recommendation Start -->
                                    <br />
                                    <h4>Recommendation by Vendor</h4>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive" id="sra-table">
                                                <table class="table table-borderless table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th width="10%" style="background-color:<?= $color_application_no ?>;color: #fff !important;padding: 5px !important;">
                                                                Application Number (<?php echo e(round($highestPercentageOfApplicationNo)); ?>%)
                                                            </th>
                                                            <th width="20%" style="background-color:<?= $color_name ?>;color: #fff !important;padding: 5px !important;">
                                                               Owner Name (<?php echo e(round($highestPercentageOfName)); ?>%)
                                                            </th>
                                                            <th width="20%" style="background-color:<?= $color_address ?>;color: #fff !important;padding: 5px !important;">
                                                                Address (<?php echo e(round($highestPercentageOfAddress)); ?>%)
                                                            </th>

                                                            <th width="10%" style="background-color:<?= $color_type ?>;color: #fff !important;padding: 5px !important;">
                                                                Use Of Slum (<?php echo e(round($highestPercentageOfType)); ?>%)
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        
                                                        <?php if(count($query3)>=1){ ?>
                                                            <tr>

                                                                <td width="20%"><?= $highestPercentageApplicationNo ?>
                                                                </td>


                                                                <td width="20%"><?= $highestPercentageName ?></td>

                                                                <td width="20%"><?= $highestPercentageAddress ?></td>




                                                                <td width="20%"><?= $highestPercentageType ?></td>

                                                            </tr>

                                                            <?php } else{ ?>
                                                                

                                                                <?php } ?>

                                                        
                                                        <tr>
                                                            
                                                        </tr>
                                                        <?php if (count($query_data_vendor) > 0) { ?>
                                                        <tr>
                                                            <td width="10%">
                                                              <?php
                                                              if($query_data[0]->eligibility_application_no == 0){
                                                                echo "Not Available";
                                                              }
                                                              if($query_data[0]->eligibility_application_no == 1){
                                                                echo "Eligible";
                                                              }
                                                              if($query_data[0]->eligibility_application_no == 2){
                                                                echo "Auto";
                                                              }
                                                            ?>
                                                            </td>



                                                                <td width="10%">
                                                                  <?php
                                                                  if($query_data[0]->eligibility_name == 0){
                                                                    echo "Not Available";
                                                                  }
                                                                  if($query_data[0]->eligibility_name == 1){
                                                                    echo "Manual";
                                                                  }
                                                                  if($query_data[0]->eligibility_name == 2){
                                                                    echo "Auto";
                                                                  }
                                                                ?>
                                                                 </td>

                                                                 <td width="10%">
                                                                    <?php
                                                                    if($query_data[0]->eligibility_address == 0){
                                                                      echo "Not Available";
                                                                    }
                                                                    if($query_data[0]->eligibility_address == 1){
                                                                      echo "Manual";
                                                                    }
                                                                    if($query_data[0]->eligibility_address == 2){
                                                                      echo "Auto";
                                                                    }
                                                                  ?>
                                                                   </td>



                                                                   <td width="10%">
                                                                    <?php
                                                                    if($query_data[0]->eligibility_use == 0){
                                                                      echo "Not Available";
                                                                    }
                                                                    if($query_data[0]->eligibility_use == 1){
                                                                      echo "Manual";
                                                                    }
                                                                    if($query_data[0]->eligibility_use == 2){
                                                                      echo "Auto";
                                                                    }
                                                                  ?>
                                                                   </td>
                                                                </tr>
                                                            <?php
                                                            }else{
                                                              ?>
                                                            </td>
                                                        <tr>
                                                            <td width="10%">
                                                            <?php
                                                              if(isset($highestPercentageOfApplicationNo) && $highestPercentageOfApplicationNo == 100)
                                                              {
                                                                ?>
                                                                  <input type="text" class="form-control" name="elg1" value="Auto" readyonly>
                                                                <?php
                                                              }else{
                                                                ?>
                                                                <select name="elg1" class="form-control"
                                                                    style="padding: 2px 1rem !important;">
                                                                    <option value="0">-- Select Option --</option>
                                                                    <option value="1"
                                                                        <?php echo e(isset($highestPercentageOfApplicationNo) && $highestPercentageOfApplicationNo < 100 ? 'selected' : ''); ?>>
                                                                        Manual</option>
                                                                    <option value="2"
                                                                        <?php echo e(isset($highestPercentageOfApplicationNo) && $highestPercentageOfApplicationNo == 100 ? 'selected' : ''); ?>>
                                                                        Auto</option>
                                                                </select>
                                                                <?php
                                                                  }
                                                                  ?>
                                                            </td>
                                                            <td width="10%">
                                                              <?php
                                                            if(isset($highestPercentageOfName) && $highestPercentageOfName == 100)
                                                              {
                                                                ?>
                                                                  <input type="text" class="form-control" name="elg2" value="Auto" readyonly>
                                                                <?php
                                                              }else{
                                                                ?>
                                                                <select name="elg2" class="form-control"
                                                                    style="padding: 2px 1rem !important;">
                                                                    <option value="0">-- Select Option --</option>
                                                                    <option value="1"
                                                                        <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : ''); ?>>
                                                                        Manual</option>
                                                                    <option value="2"
                                                                        <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : ''); ?>>
                                                                        Auto</option>
                                                                </select>
                                                                <?php
                                                                  }
                                                                  ?>
                                                            </td>
                                                            <td width="10%">
                                                            <?php
                                                            if(isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100)
                                                              {
                                                                ?>
                                                                  <input type="text" class="form-control" name="elg3" value="Auto" readyonly>
                                                                <?php
                                                              }else{
                                                                ?>
                                                                <select name="elg3" class="form-control"
                                                                    style="padding: 2px 1rem !important;">
                                                                    <option value="0">-- Select Option --</option>
                                                                    <option value="1"
                                                                        <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : ''); ?>>
                                                                        Manual</option>
                                                                    <option value="2"
                                                                        <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : ''); ?>>
                                                                        Auto</option>
                                                                </select>
                                                                <?php
                                                                  }
                                                                  ?>
                                                            </td>


                                                            <td width="10%">
                                                            <?php
                                                            if(isset($highestPercentageOfType) && $highestPercentageOfType == 100)
                                                              {
                                                                ?>
                                                                  <input type="text" class="form-control" name="elg2" value="Auto" readyonly>
                                                                <?php
                                                              }else{
                                                                ?>
                                                                <select name="elg6" class="form-control"
                                                                    style="padding: 2px 1rem !important;">
                                                                    <option value="0">-- Select Option --</option>
                                                                    <option value="1"
                                                                        <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : ''); ?>>
                                                                        Manual</option>
                                                                    <option value="2"
                                                                        <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : ''); ?>>
                                                                        Auto</option>
                                                                </select>
                                                                <?php
                                                                  }
                                                                  ?>
                                                            </td>

                                                        </tr>
                                                        <?php } ?>
                                                        <tr>
                                                          <?php
                                                           if(isset($highestPercentageAddress) && isset($highestPercentageApplicationNo ) ){
                                                                $remark = "Photopass Document with Applicant Number".$highestPercentageApplicationNo." and address " .$highestPercentageApplicationNo;
                                                              }else{
                                                                  $remark = "";
                                                              }
                              
                                                          ?>
                                                            <form method="POST" enctype="multipart/form-data"
                                                                action="<?php echo e(route('admin.sra.storeremark_photopass', ['hid' => $hid])); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                                                                <input type="hidden" name="year" value="1">
                                                                <input type="hidden" name="user" value="vendor">

                                                                <td colspan="6">
                                                                    <hr /><b>Remark :</b>
                                                                </td>
                                                        </tr>


                                                        <?php if (count($query_data) > 0) { ?>
                                                            <td width="10%"><?php echo isset($query_data[0]->remark_application_no) ? $query_data[0]->remark_application_no : ''; ?></td>
                                                            <td width="10%"><?php echo isset($query_data[0]->remark_name) ? $query_data[0]->remark_name : ''; ?></td>
                                                            <td width="20%"><?php echo isset($query_data[0]->remark_address) ? $query_data[0]->remark_address : ''; ?></td>
                                                            <td width="10%"><?php echo isset($query_data[0]->remark_use) ? $query_data[0]->remark_use : ''; ?></td>
                                                        <?php } else { ?>
                                                            <tr>
                                                                <td width="10%"><input type="text" name="remark1" value="<?php echo isset($query_data[0]->remark_application_no) ? $query_data[0]->remark_application_no : ''; ?>"required></td>
                                                                <td width="10%"><input type="text" name="remark2" value="<?php echo isset($query_data[0]->remark_name) ? $query_data[0]->remark_name : ''; ?>"required></td>
                                                                <td width="20%"><input type="text" name="remark3" value="<?php echo isset($query_data[0]->remark_address) ? $query_data[0]->remark_address : ''; ?>"required></td>

                                                                <td width="10%"><input type="text" name="remark6" value="<?php echo isset($query_data[0]->remark_use) ? $query_data[0]->remark_use : ''; ?>"required></td>
                                                            </tr>
                                                        <?php } ?>

                                                        <tr>
                                                            <tr>
                                                            <td colspan="6"><hr/></td>
                                                          </tr>
                                                        <td ><b>Section Status :</b></td>
                                                        <td ><b>Section Remark :</b></td>

                                                      </tr>
                                                      <tr>
                                                        <td width="10%">
                                                         <?php if (count($query_data) > 0) {
                                                           if($query_data[0]->overall_eligibility == 0){
                                                             echo "Not Available";
                                                           }
                                                           if($query_data[0]->overall_eligibility == 1){
                                                             echo "Verified";
                                                           }
                                                           if($query_data[0]->overall_eligibility == 2){
                                                             echo "Not Matched";
                                                           }
                                                           if($query_data[0]->overall_eligibility == 3){
                                                             echo "Unavailable";
                                                           }
                                                           ?>

                                                         <?php } else { ?>

                                                           <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                                             <option value="0">-- Select Option --</option>
                                                             <option value="1" <?php echo e(isset($query_data[0]->overall_eligibility) && ($query_data[0]->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                                                             <option value="2" <?php echo e(isset($query_data[0]->overall_eligibility) && ($query_data[0]->overall_eligibility == 2) ? 'selected' : ''); ?>>Not Matched</option>
                                                             <option value="3" <?php echo e(isset($query_data[0]->overall_eligibility) && ($query_data[0]->overall_eligibility == 3) ? 'selected' : ''); ?>>Unavailable</option>
                                                            </select>
                                                         <?php } ?>
                                                         </td>
                                                         <td width="10%" colspan="5">
                                                           <?php if (count($query_data) > 0) { ?>
                                                             <?php echo e(isset($query_data[0]->overall_remark) ? $query_data[0]->overall_remark : 'Not Available'); ?>

                                                           <?php } else  { ?>
                                                           <textarea name="remark" <?php echo e(isset($query_data[0]->overall_remark) ? 'readonly' : ''); ?> cols="100"><?php echo e(isset($query_data[0]->overall_remark) ? $query_data[0]->overall_remark : $remark); ?></textarea>
                                                         <?php } ?>
                                                         </td>
                                                   </tr>
                                                   <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>

                                                   <?php if (count($query_data) <= 0) { ?>
                                                        <tr>
                                                            <td colspan="6"><button id="submitBtn" type="submit"
                                                                    class="btn btn-primary ml-auto btn-actions btn-create">Submit</button>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    <?php endif; ?>

                                                        </form>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- recommendation end -->

                                     <!-- ca recommendation start -->
                    <?php if ($currentUser->hasAccess('admin.sra.ca_remark')) : ?>
                    <br/>
                    <h4>Conclusion of CA</h4>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive" id="sra-table">
                                <table class="table table-borderless table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="10%" style="background-color:<?= $color_application_no ?>;color: #fff !important;padding: 5px !important;">
                                               Application Number (<?php echo e(round($highestPercentageOfApplicationNo)); ?>%)
                                            </th>
                                            <th width="20%" style="background-color:<?= $color_name ?>;color: #fff !important;padding: 5px !important;">
                                              Owner Name (<?php echo e(round($highestPercentageOfName)); ?>%)
                                            </th>
                                            <th width="10%" style="background-color:<?= $color_address ?>;color: #fff !important;padding: 5px !important;">
                                                Address (<?php echo e(round($highestPercentageOfAddress)); ?>%)
                                            </th>

                                            <th width="10%" style="background-color:<?= $color_type ?>;color: #fff !important;padding: 5px !important;">
                                                Use Of Slum (<?php echo e(round($highestPercentageOfType)); ?>%)
                                            </th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        
                                        <tr>

                                            <td width="20%"><?= $highestPercentageApplicationNo ?>
                                            </td>


                                            <td width="20%"><?= $highestPercentageName ?></td>

                                            <td width="20%"><?= $highestPercentageAddress ?></td>




                                            <td width="20%"><?= $highestPercentageType ?></td>

                                        </tr>

                                        
                                        <tr>
                                            
                                        </tr>
                                        <?php if (count($query_data_vendor) > 0) { ?>
                                        <tr>
                                            <td width="10%">
                                              <?php
                                              if($query_data[0]->eligibility_application_no == 0){
                                                echo "Not Available";
                                              }
                                              if($query_data[0]->eligibility_application_no == 1){
                                                echo "Manual";
                                              }
                                              if($query_data[0]->eligibility_application_no == 2){
                                                echo "Auto";
                                              }
                                            ?>
                                            </td>



                                                <td width="10%">
                                                  <?php
                                                  if($query_data[0]->eligibility_name == 0){
                                                    echo "Not Available";
                                                  }
                                                  if($query_data[0]->eligibility_name == 1){
                                                    echo "Manual";
                                                  }
                                                  if($query_data[0]->eligibility_name == 2){
                                                    echo "Auto";
                                                  }
                                                ?>
                                                 </td>

                                                 <td width="10%">
                                                    <?php
                                                    if($query_data[0]->eligibility_address == 0){
                                                      echo "Not Available";
                                                    }
                                                    if($query_data[0]->eligibility_address == 1){
                                                      echo "Manual";
                                                    }
                                                    if($query_data[0]->eligibility_address == 2){
                                                      echo "Auto";
                                                    }
                                                  ?>
                                                   </td>





                                                   <td width="10%">
                                                    <?php
                                                    if($query_data[0]->eligibility_use == 0){
                                                      echo "Not Available";
                                                    }
                                                    if($query_data[0]->eligibility_use == 1){
                                                      echo "Manual";
                                                    }
                                                    if($query_data[0]->eligibility_use == 2){
                                                      echo "Auto";
                                                    }
                                                  ?>
                                                   </td>
                                                </tr>
                                            <?php
                                            }else{
                                              ?>
                                            </td>
                                        <tr>
                                            <td width="10%">
                                            <?php
                                                if(isset($highestPercentageOfApplicationNo) && $highestPercentageOfApplicationNo == 100)
                                                  {
                                                    ?>
                                                      <input type="text" class="form-control" name="elg1" value="Auto" readyonly>
                                                    <?php
                                                  }else{
                                                    ?>
                                                <select name="elg1" class="form-control"
                                                    style="padding: 2px 1rem !important;">
                                                    <option value="0">-- Select Option --</option>
                                                    <option value="1"
                                                        <?php echo e(isset($highestPercentageOfApplicationNo) && $highestPercentageOfApplicationNo < 100 ? 'selected' : ''); ?>>
                                                        Manual</option>
                                                    <option value="2"
                                                        <?php echo e(isset($highestPercentageOfApplicationNo) && $highestPercentageOfApplicationNo == 100 ? 'selected' : ''); ?>>
                                                        Auto</option>
                                                </select>
                                                <?php
                                                  }
                                                  ?>
                                            </td>
                                            <td width="10%">
                                            <?php
                                                if(isset($highestPercentageOfName) && $highestPercentageOfName == 100)
                                                  {
                                                    ?>
                                                      <input type="text" class="form-control" name="elg2" value="Auto" readyonly>
                                                    <?php
                                                  }else{
                                                    ?>
                                                <select name="elg2" class="form-control"
                                                    style="padding: 2px 1rem !important;">
                                                    <option value="0">-- Select Option --</option>
                                                    <option value="1"
                                                        <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : ''); ?>>
                                                        Manual</option>
                                                    <option value="2"
                                                        <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : ''); ?>>
                                                        Auto</option>
                                                </select>
                                                <?php
                                                  }
                                                  ?>
                                            </td>
                                            <td width="10%">
                                            <?php
                                                if(isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100)
                                                  {
                                                    ?>
                                                      <input type="text" class="form-control" name="elg3" value="Auto" readyonly>
                                                    <?php
                                                  }else{
                                                    ?>
                                                <select name="elg3" class="form-control"
                                                    style="padding: 2px 1rem !important;">
                                                    <option value="0">-- Select Option --</option>
                                                    <option value="1"
                                                        <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : ''); ?>>
                                                        Manual</option>
                                                    <option value="2"
                                                        <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : ''); ?>>
                                                        Auto</option>
                                                </select>
                                                <?php
                                                  }
                                                  ?>
                                            </td>
                                            <td width="10%">
                                            <?php
                                                if(isset($highestPercentageOfArea) && $highestPercentageOfArea == 100)
                                                  {
                                                    ?>
                                                      <input type="text" class="form-control" name="elg4" value="Auto" readyonly>
                                                    <?php
                                                  }else{
                                                    ?>
                                                <select name="elg4" class="form-control"
                                                    style="padding: 2px 1rem !important;">
                                                    <option value="0">-- Select Option --</option>
                                                    <option value="1"
                                                        <?php echo e(isset($highestPercentageOfArea) && $highestPercentageOfArea < 100 ? 'selected' : ''); ?>>
                                                        Manual</option>
                                                    <option value="2"
                                                        <?php echo e(isset($highestPercentageOfArea) && $highestPercentageOfArea == 100 ? 'selected' : ''); ?>>
                                                        Auto</option>
                                                </select>
                                                <?php
                                                  }
                                                  ?>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <form method="POST" enctype="multipart/form-data"
                                                action="<?php echo e(route('admin.sra.storeremark_photopass', ['hid' => $hid])); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                                                <input type="hidden" name="year" value="1">
                                                <input type="hidden" name="user" value="ca">
                                                <td colspan="6">
                                                    <hr /><b>Remark :</b>
                                                </td>
                                        </tr>


                                        <?php if (count($query_data_ca) > 0) { ?>
                                            <td width="10%"><?php echo isset($query_data_ca[0]->remark_application_no) ? $query_data_ca[0]->remark_application_no : ''; ?></td>
                                            <td width="10%"><?php echo isset($query_data_ca[0]->remark_name) ? $query_data_ca[0]->remark_name : ''; ?></td>
                                            <td width="20%"><?php echo isset($query_data_ca[0]->remark_address) ? $query_data_ca[0]->remark_address : ''; ?></td>

                                            <td width="10%"><?php echo isset($query_data_ca[0]->remark_use) ? $query_data_ca[0]->remark_use : ''; ?></td>
                                        <?php } else { ?>
                                            <tr>
                                                <td width="10%"><input type="text" name="remark1_ca" value="<?php echo isset($query_data_ca[0]->remark_application_no) ? $query_data_ca[0]->remark_application_no : ''; ?>"required></td>
                                                <td width="10%"><input type="text" name="remark2_ca" value="<?php echo isset($query_data_ca[0]->remark_name) ? $query_data_ca[0]->remark_name : ''; ?>"required></td>
                                                <td width="20%"><input type="text" name="remark3_ca" value="<?php echo isset($query_data_ca[0]->remark_address) ? $query_data_ca[0]->remark_address : ''; ?>"required></td>
                                                <td width="10%"><input type="text" name="remark6_ca" value="<?php echo isset($query_data_ca[0]->remark_use) ? $query_data_ca[0]->remark_use : ''; ?>"required></td>
                                            </tr>
                                        <?php } ?>

                                        <tr>
                                            <tr>
                                            <td colspan="6"><hr/></td>
                                          </tr>
                                        <td ><b>Section Status :</b></td>
                                        <td ><b>Section Remark :</b></td>
                                        
                                      </tr>
                                      <tr>
                                        <td width="10%">
                                         <?php if (count($query_data_ca) > 0) {
                                           if($query_data_ca[0]->overall_eligibility == 0){
                                             echo "Not Available";
                                           }
                                           if($query_data_ca[0]->overall_eligibility == 1){
                                             echo "Verified";
                                           }
                                           if($query_data_ca[0]->overall_eligibility == 2){
                                             echo "Not Matched";
                                           }
                                              if($query_data_ca[0]->overall_eligibility == 3){
                                             echo "Unavailable";
                                           }
                                           ?>

                                         <?php } else { ?>

                                           <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                             <option value="0">-- Select Option --</option>
                                             <option value="1" <?php echo e(isset($query_data_ca[0]->overall_eligibility) && ($query_data_ca[0]->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                                             <option value="2" <?php echo e(isset($query_data_ca[0]->overall_eligibility) && ($query_data_ca[0]->overall_eligibility == 2) ? 'selected' : ''); ?>>Not Matched</option>
                                             <option value="3" <?php echo e(isset($query_data_ca[0]->overall_eligibility) && ($query_data_ca[0]->overall_eligibility == 2) ? 'selected' : ''); ?>>Unavailable</option>

                                           </select>
                                         <?php } ?>
                                         </td>
                                         <td width="10%" colspan="5">
                                           <?php if (count($query_data_ca) > 0) { ?>
                                             <?php echo e(isset($query_data_ca[0]->overall_remark) ? $query_data_ca[0]->overall_remark : 'Not Available'); ?>

                                           <?php } else  { ?>
                                           <textarea name="remark" <?php echo e(isset($query_data_ca[0]->overall_remark) ? 'readonly' : ''); ?> cols="100"><?php echo e(isset($query_data_ca[0]->overall_remark) ? $query_data_ca[0]->overall_remark : $remark); ?></textarea>
                                         <?php } ?>
                                         </td>
                                   </tr>


                                        <tr>
                                           <?php if (count($query_data_ca) <= 0) { ?>

                                            <td colspan="6"><button id="submitBtn" type="submit"
                                                    class="btn btn-primary ml-auto btn-actions btn-create">Submit</button>
                                            </td>
                                            <?php } ?>

                                        </tr>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>
                    <!-- ca recommendation end -->


                                </div>

                </div>
                                          </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                    
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingFour">
                                          <h4 class="panel-title">
                                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Overall Remark
                                          </a>
                                        </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                          <div class="panel-body" style="background-color: #e2e5de;padding-bottom:5px;">
                                            <!-- content start-->
                                              <div class="row">
                                                <div class="col-md-9">
                                                  <br/>
                                            <div class="card">
                                              <div class="card-body">
                                                <div class="table-responsive" id="sra-table">
                                                  <table class="table table-borderless table-responsive">
                                                    <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.store_overall_remark')); ?>">
                                                    <?php echo csrf_field(); ?>

                                                    <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                                                    <input type="hidden" name="user" value="<?php echo e(auth()->user()->id); ?>">
                                                    <input type="hidden" name="type" value="photopass">
                                                    <tr>
                                                      <td>
                                                        <div class="form-group">
                                                        <label>Status:</label>
                                                        <select name="elg" class="form-control">
                                                              <?php if(count($overall_remark) == 0){ ?>
                                                             <option value="0">-- Select Option --</option>
                                                             <option value="1" >Verified</option>
                                                             <option value="2" >Not Matched</option>
                                                             <option value="3" >Unavailable</option>
                                                          <?php }else{ ?>
                                                            <?php if($overall_remark[0]->photopass_status == 0){ ?>
                                                                <option value="0" selected="">-- Select Option --</option>
                                                              <?php }else{ ?>
                                                                <option value="0">-- Select Option --</option>
                                                              <?php } ?>
                                                              <?php if($overall_remark[0]->photopass_status == 1){ ?>
                                                                <option value="1" selected="">Verified</option>
                                                              <?php }else{ ?>
                                                                <option value="1" >Verified</option>
                                                              <?php } ?>
                                                              <?php if($overall_remark[0]->photopass_status == 2){ ?>
                                                                <option value="2" selected="">Not Matched</option>
                                                              <?php }else{ ?>
                                                                <option value="2" >Not Matched</option>
                                                              <?php } ?>
                                                              <?php if($overall_remark[0]->photopass_status == 3){ ?>
                                                                <option value="3" selected="">Unavailable</option>
                                                              <?php }else{ ?>
                                                                <option value="3" >Unavailable</option>
                                                              <?php } ?>
                                                          <?php } ?>
                                                            </select>
                                                          </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                      <td>
                                                        <div class="form-group">
                                                        <label>Remark:</label>
                                                        <?php if(count($overall_remark) == 0){ ?>
                                                          <textarea name="remark" cols="100" class="form-control"> </textarea>
                                                        <?php }else{ ?>
                                                           <textarea name="remark" cols="100" class="form-control"><?php echo e($overall_remark[0]->photopass_remark); ?></textarea>
                                                        <?php } ?>
                                                      </div>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td>

                                                      <?php if(count($overall_remark) == 0){ ?>
                                                        <button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button>
                                                      <?php } ?>
                                                      </td>
                                                    </tr>
                                                  </form>
                                                  </table>
                                                </div>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                        </div></div>

                                          
                                </div>

                        </div>
                        <div class="tab">
                            <input type="radio" name="css-tabs" id="tab-5" class="tab-switch">
                             <a href="index.php/sra/agreement/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Registration Agreement Details</a>
                            <div class="tab-content">Registration Agreement Details</div>
                          </div>
                          <div class="tab">
                                <input type="radio" name="css-tabs" id="tab-7" class="tab-switch">
                                <a href="index.php/sra/adhar/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Aadhar Card</a>
                                <div class="tab-content">Registration Agreement Details</div>
                              </div>
                            <div class="tab">
                                <input type="radio" name="css-tabs" id="tab-6" class="tab-switch">
                                 <a href="index.php/sra/final/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Final Submission</a>
                                <div class="tab-content">Final submission Details</div>
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
<script type="text/javascript">
    $(document).ready(function() {

      $(".toggle-accordion").on("click", function() {
        var accordionId = $(this).attr("accordion-id"),
          numPanelOpen = $(accordionId + ' .collapse.in').length;

        $(this).toggleClass("active");

        if (numPanelOpen == 0) {
          openAllPanels(accordionId);
        } else {
          closeAllPanels(accordionId);
        }
      })

      /*openAllPanels = function(aId) {
        console.log("setAllPanelOpen");
        $(aId + ' .panel-collapse:not(".in")').collapse('show');
      }
      closeAllPanels = function(aId) {
        console.log("setAllPanelclose");
        $(aId + ' .panel-collapse.in').collapse('hide');
      }*/

    });
    </script>

<script>
    $(document).ready(function() {
        // Hide success message after 5 seconds
        setTimeout(function() {
            $('.alert-success').fadeOut('slow');
        }, 5000);
    });
</script>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/sra/photopass.blade.php ENDPATH**/ ?>