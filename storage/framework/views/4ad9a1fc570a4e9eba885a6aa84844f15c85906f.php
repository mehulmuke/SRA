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
  color:#fff;
}

.accordion-option .toggle-accordion {
  float: right;
  font-size: 16px;
  color: #fff;
}

.accordion-option .toggle-accordion:before {
  content: "Expand All";
}

.accordion-option .toggle-accordion.active:before {
  content: "Collapse All";
}

</style>
<?php $__env->startSection('content'); ?>
      <?php if(session('message')): ?>
        <div class="alert alert-success">
          <?php echo e(session('message')); ?>

        </div>
      <?php endif; ?>
      
                     
<?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php $hid = $data->HUTSURVERYID ?>
                 <input type="hidden" name="hid_val" id="hid_val" value="<?php echo e($hid); ?>">
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-md-12">
          <!-- tab start-->
           <div class="card">
            <div class="card-body">
            <div class="tabs">
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-6" class="tab-switch">
                 <a href="index.php/sra/documentlisting/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Hut Documents</a>
                <div class="tab-content">Hut Documents</div>
            </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
                <label for="tab-1" class="tab-label"style="color:#fff!important;font-size:16px !important;">Electricity</label>
                <div class="tab-content">
                  
                  <!-- tab content start-->
                  <div class="table-responsive" id="sra-table">
                    <table class="table table-borderless table-responsive">
                      <thead>
                              <tr>
                          <th>Hut ID</th>
                          <th>Cluster ID</th>
                          <th>Scheme Name</th>
                          <th>Owner Name</th>
                          <th>Address</th>
                          <th>Categories</th>
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
                  </div>
                  <!-- accordion start-->
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

                            <!-- Year 2000 start --> 
                  <!-- Script for Match the Data to SIMS -->
              <?php
              $match_name_array = $match_address_array = $match_bill_array = $match_ca_array = $match_service_array = $match_cat_array = array();
              $match_name_int_array = $match_address_int_array = $match_bill_int_array = $match_ca_int_array = $match_service_int_array = $match_cat_int_array = array();
              $res_int1 = $res_int2 = $res_int3 = $res_int4 = $res_int5 = $res_int6 = array();
              $match_int_str = "";
              $integration_name = array();
                $integration_address = array();
                $integration_bill_date = array();
                $integration_ca = array();
                $integration_service_provider = array();
                $integration_category = array();
                $match_name = $match_address = $match_category = $match_service_provider = $match_ca = $match_bill_date = array();
                
                if(count($query) > 0){
                  foreach($query as $data)
                  {
                    $name_sims = strtolower($data->HUTOWNERNAME);
                     array_push($match_name_array,$data->HUTOWNERNAME);
                    $address_sims = strtolower($data->Address);
                     array_push($match_address_array,$data->Address);
                    $category_sims = strtolower($data->PropertyType);
                     array_push($match_cat_array,$data->PropertyType);
                    $service_provider_sims = 'Not Available';
                     array_push($match_service_array,'Not Available');
                    $ca_sims = 'Not Available';
                     array_push($match_ca_array,'Not Available');
                    $bill_date_sims = 'Not Available';
                     array_push($match_bill_array,'Not Available');
                  }
                }             
                $name = isset($query3[0]->elector_name) ? $query3[0]->elector_name : 'Not Available';
                array_push($match_name_array,$name);
                $address = isset($query3[0]->elector_address) ? $query3[0]->elector_address : 'Not Available';
                array_push($match_address_array,$address);
                $category = isset($query3[0]->category) ? $query3[0]->category : 'Not Available';
                array_push($match_cat_array,$category);
                if(count($query3) > 0){
                  $service_provider = isset($query3[0]->doc_type) ? $query3[0]->doc_type : 'Adani Electricity';
                }else{
                  $service_provider = 'Not Available';
                }
                //$service_provider = isset($query3[0]->doc_type) ? $query3[0]->doc_type : 'Not Available';
                array_push($match_service_array,$service_provider);
                 $ca_no = isset($query3[0]->ca_number) ? $query3[0]->ca_number : 'Not Available';
                 array_push($match_ca_array,$ca_no);
                 $bill_date = isset($query3[0]->bill_date) ? $query3[0]->bill_date : 'Not Available'; 
                 array_push($match_bill_array,$bill_date);

                //integration start
                 if(count($new_result) > 0){
                  
                   foreach ($new_result as $data) {
                            $integration_name[] = strtolower($data->owner_name);
                            array_push($match_name_int_array,$data->owner_name);
                            if($data->address == ",,"){
                              $integration_address[] = "";
                              array_push($match_address_int_array,"");
                            }else{
                              $integration_address[] = strtolower($data->address);
                              array_push($match_address_int_array,$data->address);
                            }
                            
                            $integration_category[] = strtolower($data->category);
                            array_push($match_cat_int_array,$data->category);
                            $integration_service_provider[] = strtolower($data->service_provider);
                            array_push($match_service_int_array,$data->service_provider);
                            $integration_ca[] = '';
                            array_push($match_ca_int_array, '');
                            $integration_bill_date[] = '';
                            array_push($match_bill_int_array,'');
                  }
                  $res_int1 = \SraHelper::instance()->integration_return_single_value($match_name_int_array);
                  array_push($match_name_array,$res_int1);
                  $res_int2 = \SraHelper::instance()->integration_return_single_value($match_address_int_array);
                  array_push($match_address_array,$res_int2);
                  //print_r($match_address_array);
                  $res_int3 = \SraHelper::instance()->integration_return_single_value($match_cat_int_array);
                  array_push($match_cat_array,$res_int3);
                  $res_int4 = \SraHelper::instance()->integration_return_single_value($match_service_int_array);
                  array_push($match_service_array,$res_int4);
                  $res_int5 = \SraHelper::instance()->integration_return_single_value($match_ca_int_array);
                  //print_r($res_int5);
                  array_push($match_ca_array,$res_int5);

                  $res_int6 = \SraHelper::instance()->integration_return_single_value($match_bill_int_array);
                  array_push($match_bill_array,$res_int6);
                
                }else{
                  //echo "out";
                  array_push($match_name_array,"Not Available");
                  array_push($match_address_array,"Not Available");
                  array_push($match_cat_array,"Not Available");
                  array_push($match_service_array,"Not Available");
                  array_push($match_ca_array, "Not Available");
                  array_push($match_bill_array,'Not Available');
                }

              
                //fetch most common name from integration start
                //print_r($match_ca_int_array);
                                  
                //fetch most common name end

                //integration end

                
                //For Name
              
                $highestPercentageOfName1 = $per =0;
                $highestPercentageName1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_name_array);
                
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfName1 = $per;
                  $highestPercentageName1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfName1 = $per;
                  $highestPercentageName1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfName1 = 0;
                  $highestPercentageName1 = $match_str;
                  }
                }
                

                if($highestPercentageName1 == 'Not Available') 
                  $highestPercentageOfName1 = 0;
                

                if($highestPercentageOfName1 == 100 )
                  $color_name = '#238823';
                elseif($highestPercentageOfName1 >= 50)
                  $color_name = '#FFBF00';
                else  
                  $color_name = '#d2222d';

                //For Address
                $highestPercentageOfAddress1 = $per =0;
                $highestPercentageAddress1 = $match_string ="";
                $res = array();
                
                
                //print_r($match_address_array);
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_address_array);
               // print_r($res);

                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfAddress1 = $per;
                  $highestPercentageAddress1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfAddress1 = $per;
                  $highestPercentageAddress1 = $match_str;
                  }
                  if($per < 0){
                  $highestPercentageOfAddress1 = 0;
                  $highestPercentageAddress1 = $match_str;
                  }  
                }

                
                if($highestPercentageAddress1 == 'Not Available') 
                  $highestPercentageOfAddress1 = 0;
                

                if($highestPercentageOfAddress1 == 100 )
                  $color_address = '#238823';
                elseif($highestPercentageOfAddress1 >= 50)
                  $color_address = '#FFBF00';
                else  
                  $color_address = '#d2222d';

                //For Category
                $highestPercentageOfCategory1 = $per =0;
                $highestPercentageCategory1 = $match_string ="";
                $res = array();
                
                //print_r($match_cat_array);
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_cat_array);
                
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfCategory1 = $per;
                  $highestPercentageCategory1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfCategory1 = $per;
                  $highestPercentageCategory1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfCategory1 = 0;
                  $highestPercentageCategory1 = $match_str;
                  }
                }


                if($highestPercentageCategory1 == 'Not Available') 
                  $highestPercentageOfCategory1 = 0;

                

                if($highestPercentageOfCategory1 == 100 )
                  $color_category = '#238823';
                elseif($highestPercentageOfCategory1 >= 50)
                  $color_category = '#FFBF00';
                else  
                  $color_category = '#d2222d';


                //For Service_provider
                
                $highestPercentageOfservice_provider1 = $per =0;
                $highestPercentageservice_provider1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_service_array);

                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfservice_provider1 = $per;
                  $highestPercentageservice_provider1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfservice_provider1 = $per;
                  $highestPercentageservice_provider1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfservice_provider1 = 0;
                  $highestPercentageservice_provider1 = $match_str;
                  }
                }

               
                if($highestPercentageservice_provider1 == 'Not Available') 
                  $highestPercentageOfservice_provider1 = 0;

                if($highestPercentageOfservice_provider1 == 100 )
                  $color_service_provider = '#238823';
                elseif($highestPercentageOfservice_provider1 >= 50)
                  $color_service_provider = '#FFBF00';
                else  
                  $color_service_provider = '#d2222d';


                //For CA   
               
                //start
                $highestPercentageOfca1 = $per =0;
                $highestPercentageca1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_ca_array);
               // print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfca1 = $per;
                  $highestPercentageca1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfca1 = $per;
                  $highestPercentageca1 = $match_str;
                  } 
                  if($per < 0){
                  $highestPercentageOfca1 = 0;
                  $highestPercentageca1 = $match_str;
                  } 
                }
                
              if($highestPercentageca1 == 'Not Available') 
                  $highestPercentageOfca1 = 0;

                if($highestPercentageOfca1 == 100 )
                  $color_ca = '#238823';
                elseif($highestPercentageOfca1 >= 50)
                  $color_ca = '#FFBF00';
                else  
                  $color_ca = '#d2222d';

              //For bill_date 
              
              //start
                $highestPercentageOfbill_date1 = $per =0;
                $highestPercentagebill_date1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_bill_array);
                //print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfbill_date1 = $per;
                  $highestPercentagebill_date1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfbill_date1 = $per;
                  $highestPercentagebill_date1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfbill_date1 = 0;
                  $highestPercentagebill_date1 = $match_str;
                  }
                }
                
                         
              if($highestPercentagebill_date1 == 'Not Available') 
                  $highestPercentageOfbill_date1 = 0;

              if($highestPercentageOfbill_date1 == 100 )
                $color_bill_date = '#238823';
              elseif($highestPercentageOfbill_date1 >= 50)
                $color_bill_date = '#FFBF00';
              else  
                $color_bill_date = '#d2222d';
              ?>
              <!-- End script -->
               <div class="col-md-12">
                <!-- <hr/>
                <div class="d-flex align-items-center" style="background-color: lightblue;">
                   <h3 class="card-title"><i class="fas fa-list"></i> &nbsp;Year 2000 or Before</h3>
                </div>
                <hr/> -->
                <br/>
                <div class="row">
                    <div class="col-md-9">
                      <!-- sims start-->
                      <h4>SIMS Data </h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <td width="10%"><?php echo e($data->HUTOWNERNAME); ?> <input type="hidden" name="oname" id="oname" value="<?php echo e($data->HUTOWNERNAME); ?>" /></td>
                              <td width="20%"><?php echo e($data->Address); ?> <input type="hidden" name="add" id="add" value="<?php echo e($data->Address); ?>" /></td>
                              <td width="10%"><?php echo e($data->PropertyType); ?><input type="hidden" name="ptype" id="ptype" value="<?php echo e($data->PropertyType); ?>" /></td>
                              <td width="10%">Not Available</td>
                              <td width="10%">Not Available</td>
                              <td width="10%">Not Available</td>
                             
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                      <!-- sims end -->
                      <!-- ocr start-->
                      <h4>SIMS OCR</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                           
                          </tr>
                        </thead>
                        <tbody>

                          <tr>
                            <?php if(count($query3) >= 1){?>
                              <?php $__currentLoopData = $query3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td width="10%"><?php echo e($data->elector_name); ?></td>
                            <td width="20%"><?php echo e($data->elector_address); ?> </td>
                            <td width="10%"><?php echo e($data->category); ?></td>
                            <td width="10%">Adani Electricity</td>
                            <td width="10%"><?php echo e($data->ca_number); ?></td>
                            <td width="10%"><?php echo e($data->bill_date); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php } else{ ?>
                               <td width="10%">Not Available</td>
                            <td width="20%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <?php } ?>
                             
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                      <!-- ocr end -->
                    </div>
                    <div class="col-md-3">
                      <!-- image start-->
                      <div class="card">
                            <div class="card-body">
                            <?php 
                            // if(count($query3)==1){
                            ?>
                            <img src="http://sra-uat.apniamc.in/images/<?php echo e($hid); ?>_light_bill1.jpeg" style="height:320px;width:100%;" id="myImg1" onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';">
                            <?php //}else{ ?>
                              <!-- <img src="http://sra-uat.apniamc.in/images/noimage.jpg" style="height:320px;width:250px;" > -->
                            <?php// } ?>
                            <!-- start-->
                            <div id="myModal1" class="modal">
                              <span class="close" id="close1">&times;</span>
                              <img class="modal-content" id="img011">
                              
                            </div>
                            <script>
                            // Get the modal
                            var modal = document.getElementById("myModal1");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg1");
                            var modalImg = document.getElementById("img011");
                            var captionText = document.getElementById("caption");
                            img.onclick = function(){
                              modal.style.display = "block";
                              modalImg.src = this.src;
                              modalImg.classList.add("zoom");
                              captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementById("close1");

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
                          </div>
                        </div>
                      <!-- image end -->
                    </div>
                </div>
                <!-- integration start-->
                
                
                <h4>Integration Data</h4>
                <div class="card">
                  <div class="card-body">
                    <input type="hidden" name="2000data" id="2000data" value="">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                             <th width="5%">Legacy CA No</th>
                            <th width="5%">First Consumer Name</th>
                            <th width="5%">First Bill</th>
                            <th width="5%">Change Name Date</th>
                            <th width="5%">Change Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count1 = $showData1 = $index = 0;
                          $data_address = "";
                          if(count($new_result) > 0){ 
                            foreach ($new_result as $data) {
                             //  if($data->year == "1"){
                                  $count1++;
                                  $showData1 = 1;
                                  
                                  $data_address = $data->address;
                                  
                                  if($data_address == ",,"){
                                     $data_address = "Not Available";
                                  }
                                 
                                  ?>
                                    <tr>
                                      <td>
                                        <?php if(isset($data->owner_name )){
                                          if($data->owner_name == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->owner_name;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                         </td>
                                      <td>
                                        <?php if(isset($data_address )){
                                          if($data_address == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data_address;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                      </td>
                                      <td>
                                        <?php if(isset($data->category )){
                                          if($data->category == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->category;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->service_provider )){
                                          if($data->service_provider == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->service_provider;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->legacy_ca_no )){
                                          if($data->legacy_ca_no == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->legacy_ca_no;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->first_consumer_name )){
                                          if($data->first_consumer_name == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->first_consumer_name;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->first_bill )){
                                          if($data->first_bill == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->first_bill;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->change_name_date )){
                                          if($data->change_name_date == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->change_name_date;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->change_date )){
                                          if($data->change_date == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->change_date;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                    </tr>
                                    <?php 
                                    
                                //}
                          }
                          if($count1 == 0 && $showData1 == 0){ ?>
                             <tr>
                                       
                                      <td width="10%">Not Available </td>
                                      <td width="20%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                            </tr>
                          <?php }

                          }else{ ?>
                            <tr>
                                       
                                      <td width="10%">Not Available </td>
                                      <td width="20%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                            </tr>
                          <?php }
                          
                          
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <br/>
                <!-- integration end -->
                <!-- Recomendatioon start -->
                <?php
                      // $dat_2000 = $recomm_remarks;
                //print_r($recomm_remarks);
                    foreach($recomm_remarks as $data)
                    {
                      if($data->year == 1)
                      {
                        $data_2000 = $data;
                      }
                      if($data->year == 2)
                      {
                        $data_2000_2011 = $data;
                      }
                      if($data->year == 3)
                      {
                        $data_current = $data;
                      }
                    }
                    foreach($recomm_remarks_ca as $data)
                    {
                      if($data->year == 1)
                      {
                        $data_2000_ca = $data;
                      }
                      if($data->year == 2)
                      {
                        $data_2000_2011_ca = $data;
                      }
                      if($data->year == 3)
                      {
                        $data_current_ca = $data;
                      }
                    }
                    
                  ?>
                <?php //if($showData1 == 1){?>

                <h4>Recommendation by Vendor</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <div id="loading" style="display: none;">
                        <img src="http://sra-uat.apniamc.in/images/loader.gif"/><b>Loading....</b>
                      </div>
                      
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;">Owner Name (<?php echo e(round($highestPercentageOfName1)); ?>%)</th>
                            <th width="20%" style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;">Address (<?php echo e(round($highestPercentageOfAddress1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_category; ?>;color:#fff;padding: 5px !important;">Category (<?php echo e(round($highestPercentageOfCategory1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_service_provider; ?>;color:#fff;padding: 5px !important;">Service Provider (<?php echo e(round($highestPercentageOfservice_provider1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_ca; ?>;color:#fff;padding: 5px !important;">CA No (<?php echo e(round($highestPercentageOfca1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_bill_date; ?>;color:#fff;padding: 5px !important;">Bill Date (<?php echo e(round($highestPercentageOfbill_date1)); ?>%)</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                        <tr>
                              <td width="10%" ><?= ucfirst($highestPercentageName1); ?></td>
                              <td width="20%" ><?= ucfirst($highestPercentageAddress1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageCategory1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageservice_provider1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageca1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentagebill_date1); ?></td>                     
                        </tr>
                        </tbody>
                      </table>
                      
                      <table class="table table-borderless table-responsive">
                        <tbody>
                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                        <input type="hidden" name="year" value="1">
                        <input type="hidden" name="user" value="vendor">
                        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">

                       <!--  <tr>
                            <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                        </tr> -->
                        <tr>
                          <?php if (isset($data_2000) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="20%">
                                      <?php 
                                      if($data_2000->eligibility_address == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_address == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_address == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_category == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_category == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_category == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_serviceprovider == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_serviceprovider == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_serviceprovider == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_ca == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_ca == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_ca == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_billdate == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_billdate == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_billdate == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                          <td width="10%">
                          <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2"  <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td> 
                        <?php } ?>
                        </tr>
                        <tr>
                          <td colspan="6"><hr/><b>Remark :</b></td>
                        </tr>
                        <?php $access = 'readonly' ?>
                        <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                          <?php
                            $access = '';
                          ?>
                        <?php endif; ?>

                        <tr>
                          <?php if (isset($data_2000) ) { ?>
                              <td width="10%"><?php echo e(isset($data_2000->remark_name) ? $data_2000->remark_name : ''); ?></td>
                              <td width="20%"><?php echo e(isset($data_2000->remark_address) ? $data_2000->remark_address : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000->remark_category) ? $data_2000->remark_category : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000->remark_serviceprovider) ? $data_2000->remark_serviceprovider : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000->remark_ca) ? $data_2000->remark_ca : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000->remark_billdate) ? $data_2000->remark_billdate : ''); ?></td> 
                              <?php } else{ ?>
                          <td width="10%"><input type="text" class="form-control" name="remark1" value = "<?php echo e(isset($data_2000->remark_name) ? $data_2000->remark_name : ''); ?>" <?php echo e(isset($data_2000->remark_name) ? 'readonly' : ''); ?> <?= $access ?>></td>
                          <td width="20%"><input type="text" class="form-control" name="remark2" value = "<?php echo e(isset($data_2000->remark_address) ? $data_2000->remark_address : ''); ?>" <?php echo e(isset($data_2000->remark_address) ? 'readonly' : ''); ?> <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark3" value = "<?php echo e(isset($data_2000->remark_category) ? $data_2000->remark_category : ''); ?>" <?php echo e(isset($data_2000->remark_category) ? 'readonly' : ''); ?> <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark4" value = "<?php echo e(isset($data_2000->remark_serviceprovider) ? $data_2000->remark_serviceprovider : ''); ?>" <?php echo e(isset($data_2000->remark_serviceprovider) ? 'readonly' : ''); ?> <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark5" value = "<?php echo e(isset($data_2000->remark_ca) ? $data_2000->remark_ca : ''); ?>" <?php echo e(isset($data_2000->remark_ca) ? 'readonly' : ''); ?> <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark6" value = "<?php echo e(isset($data_2000->remark_billdate) ? $data_2000->remark_billdate : ''); ?>" <?php echo e(isset($data_2000->remark_billdate) ? 'readonly' : ''); ?> <?= $access ?>></td> 
                        <?php } ?>
                        </tr>
                         <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                        <tr>
                          <td ><b>Section Status :</b></td>
                          <td ><b>Section Remark :</b></td>

                          <?php

                          if(count($query3)>0){
                              $remark1 = "Electricity Document with CA number ". $query3[0]->ca_number." and address " .$query3[0]->elector_address." and Bill Date " .$query3[0]->bill_date;
                          }else{
                              $remark1 = "";
                          }
                      ?>
                         
                        </tr>
                        <tr>
                             <td width="10%">
                              <?php if (isset($data_2000) ) { 
                                      if($data_2000->overall_eligibility == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->overall_eligibility == 1){
                                        echo "Verified";
                                      }
                                      if($data_2000->overall_eligibility == 2){
                                        echo "Not Matched";
                                      }
                                      if($data_2000->overall_eligibility == 3){
                                        echo "Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($data_2000_ca->overall_eligibility) && ($data_2000->overall_eligibility == 1) ? 'selected' : ''); ?> >Verified</option>
                                  <option value="2" <?php echo e(isset($data_2000_ca->overall_eligibility) &&($data_2000->overall_eligibility == 2) ? 'selected' : ''); ?>>Not Matched</option>
                                  <option value="3" <?php echo e(isset($data_2000_ca->overall_eligibility) &&($data_2000->overall_eligibility == 3) ? 'selected' : ''); ?>>Unavailable</option>
                                </select>
                              <?php } ?>
                              </td> 
                              <td width="10%" colspan="5">
                                <?php if (isset($data_2000) ) { ?>
                                        <?php echo e(isset($data_2000->overall_remark) ? $data_2000->overall_remark : 'Not Available'); ?>

                                <?php }else { ?>
                                  <textarea style="height:auto !important;" class="form-control" name="remark" cols="100" > <?php echo e(isset($data_2000->overall_remark) ? $data_2000->overall_remark : $remark1); ?></textarea>
                                
                              <?php } ?>
                              </td>

                        </tr>
                       <tr>
                           <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                                  <?php if(!isset($data_2000)): ?>
                                    <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                                  <?php endif; ?>
                                <?php endif; ?>
                         
                       </tr>
                        <tr>
                          <!-- <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td> -->
                        </tr>
                        </form>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  
                </div>
                <?php if ($currentUser->hasAccess('admin.sra.ca_remark')) : ?>
                    <h4>Conclusion of CA</h4>
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive" id="sra-table">
                          <table class="table table-borderless table-responsive">
                            <thead>
                              <tr>
                                <th width="10%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;">Owner Name (<?php echo e(round($highestPercentageOfName1)); ?>%)</th>
                            <th width="20%" style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;">Address (<?php echo e(round($highestPercentageOfAddress1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_category; ?>;color:#fff;padding: 5px !important;">Category (<?php echo e(round($highestPercentageOfCategory1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_service_provider; ?>;color:#fff;padding: 5px !important;">Service Provider (<?php echo e(round($highestPercentageOfservice_provider1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_ca; ?>;color:#fff;padding: 5px !important;">CA No (<?php echo e(round($highestPercentageOfca1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_bill_date; ?>;color:#fff;padding: 5px !important;">Bill Date (<?php echo e(round($highestPercentageOfbill_date1)); ?>%)</th>
                              </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                  <td width="10%" ><?= ucfirst($highestPercentageName1); ?></td>
                                  <td width="20%" ><?= ucfirst($highestPercentageAddress1); ?></td>
                                  <td width="10%" ><?= ucfirst($highestPercentageCategory1); ?></td>
                                  <td width="10%" ><?= ucfirst($highestPercentageservice_provider1); ?></td>
                                  <td width="10%"><?= ucfirst($highestPercentageca1); ?></td>
                                  <td width="10%" ><?= ucfirst($highestPercentagebill_date1); ?></td>                     
                            </tr>
                        
                            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                            <input type="hidden" name="year" value="1">
                            <input type="hidden" name="user" value="ca">
                            <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">

                            <!-- <tr>
                            <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                            </tr> -->
                            <tr>
                               <?php if (isset($data_2000_ca) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="20%">
                                      <?php 
                                      if($data_2000_ca->eligibility_address == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_address == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_address == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_category == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_category == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_category == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_serviceprovider == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_serviceprovider == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_serviceprovider == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_ca == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_ca == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_ca == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_billdate == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_billdate == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_billdate == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                              <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 < 100 ? 'selected' : ''); ?>>Manual</option>
                                  <option value="2" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 < 100 ? 'selected' : ''); ?>>Manual</option>
                                  <option value="2" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 < 100 ? 'selected' : ''); ?>>Manual</option>
                                  <option value="2" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 < 100 ? 'selected' : ''); ?>>Manual</option>
                                  <option value="2"  <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 < 100 ? 'selected' : ''); ?>>Manual</option>
                                  <option value="2" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 < 100 ? 'selected' : ''); ?>>Manual</option>
                                  <option value="2" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                              </td> 
                            <?php } ?>
                            </tr>
                            <tr>
                              <td colspan="6"><hr/><b>Remark :</b></td>
                            </tr>
                            <tr>
                              <?php if (isset($data_2000_ca) ) { ?>
                              <td width="10%"><?php echo e(isset($data_2000_ca->remark_name) ? $data_2000_ca->remark_name : ''); ?></td>
                              <td width="20%"><?php echo e(isset($data_2000_ca->remark_address) ? $data_2000_ca->remark_address : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_ca->remark_category) ? $data_2000_ca->remark_category : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_ca->remark_serviceprovider) ? $data_2000_ca->remark_serviceprovider : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_ca->remark_ca) ? $data_2000_ca->remark_ca : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_ca->remark_billdate) ? $data_2000_ca->remark_billdate : ''); ?></td> 
                              <?php } else{ ?>
                              <td width="10%"><input type="text" class="form-control" name="remark1_ca" value = "<?php echo e(isset($data_2000_ca->remark_name) ? $data_2000_ca->remark_name : ''); ?>" <?php echo e(isset($data_2000_ca->remark_name) ? 'readonly' : ''); ?>></td>
                              <td width="20%"><input type="text" class="form-control" name="remark2_ca" value = "<?php echo e(isset($data_2000_ca->remark_address) ? $data_2000_ca->remark_address : ''); ?>" <?php echo e(isset($data_2000_ca->remark_address) ? 'readonly' : ''); ?>></td>
                              <td width="10%"><input type="text" class="form-control" name="remark3_ca" value = "<?php echo e(isset($data_2000_ca->remark_category) ? $data_2000_ca->remark_category : ''); ?>" <?php echo e(isset($data_2000_ca->remark_category) ? 'readonly' : ''); ?>></td>
                              <td width="10%"><input type="text" class="form-control" name="remark4_ca"  value = "<?php echo e(isset($data_2000_ca->remark_serviceprovider) ? $data_2000_ca->remark_serviceprovider : ''); ?>" <?php echo e(isset($data_2000_ca->remark_serviceprovider) ? 'readonly' : ''); ?>></td>
                              <td width="10%"><input type="text" class="form-control" name="remark5_ca" value = "<?php echo e(isset($data_2000_ca->remark_ca) ? $data_2000_ca->remark_ca : ''); ?>" <?php echo e(isset($data_2000_ca->remark_ca) ? 'readonly' : ''); ?> ></td>
                              <td width="10%"><input type="text" class="form-control" name="remark6_ca" value = "<?php echo e(isset($data_2000_ca->remark_billdate) ? $data_2000_ca->remark_billdate : ''); ?>" <?php echo e(isset($data_2000_ca->remark_billdate) ? 'readonly' : ''); ?>></td> 
                            <?php } ?>
                            </tr>
                            <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                            <tr>
                              <td ><b>Section Status :</b></td>
                              <td ><b>Section Remark :</b></td>
                              
                            </tr>
                            <tr>
                                <td width="10%">
                                  <?php if (isset($data_2000_ca) ) { 
                                      if($data_2000_ca->overall_eligibility == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->overall_eligibility == 1){
                                        echo "Verified";
                                      }
                                      if($data_2000_ca->overall_eligibility == 2){
                                        echo "Not Matched";
                                      }
                                      if($data_2000_ca->overall_eligibility == 3){
                                        echo "Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                    <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                      <option value="0">-- Select Option --</option>
                                      <option value="1" <?php echo e(isset($data_2000_ca->overall_eligibility) && ($data_2000_ca->overall_eligibility == 1) ? 'selected' : ''); ?> >Verified</option>
                                      <option value="2"  <?php echo e(isset($data_2000_ca->overall_eligibility) && ($data_2000_ca->overall_eligibility == 2) ? 'selected' : ''); ?> >Not Matched</option>
                                      <option value="3"  <?php echo e(isset($data_2000_ca->overall_eligibility) && ($data_2000_ca->overall_eligibility == 3) ? 'selected' : ''); ?> >Unavailable</option>
                                    </select>
                                  <?php } ?>
                                  </td> 
                                  <td width="10%" colspan="5">
                                    <?php if (isset($data_2000_ca) ) { ?>
                                        <?php echo e(isset($data_2000_ca->overall_remark) ? $data_2000_ca->overall_remark : 'Not Available'); ?>

                                <?php }else { ?>
                                  <textarea style="height:auto !important;" class="form-control" name="remark" cols="100" > <?php echo e(isset($data_2000_ca->overall_remark) ? $data_2000_ca->overall_remark : $remark1); ?></textarea>
                                  <?php } ?>
                                  </td>

                            </tr>
                          
                            <tr>
                               <?php if ($currentUser->hasAccess('admin.sra.ca_remark')) : ?>
                                  <?php if(!isset($data_2000_ca)): ?>
                              <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                              <!-- <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td> -->
                              <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                            </form>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  <?php endif; ?>
              <?php //}?>
                <!-- Recmmenatioon End -->
              </div>
                  <!-- Year 2000 end --> 
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Details For Year Between 2000 To 2011
                          </a>
                        </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body" style="background-color: #e3dac9;padding-bottom:5px;">
                            <!-- Year 2001 or Before Year 2011 start -->     
                  <?php

              $match_name_array = $match_address_array = $match_bill_array = $match_ca_array = $match_service_array = $match_cat_array = array();
              $match_name_int_array = $match_address_int_array = $match_bill_int_array = $match_ca_int_array = $match_service_int_array = $match_cat_int_array = array();
              $res_int1 = $res_int2 = $res_int3 = $res_int4 = $res_int5 = $res_int6 = array();
              $match_int_str = "";
              $integration_name = array();
                $integration_address = array();
                $integration_bill_date = array();
                $integration_ca = array();
                $integration_service_provider = array();
                $integration_category = array();
                $match_name = $match_address = $match_category = $match_service_provider = $match_ca = $match_bill_date = array();
                if(count($query) > 0){
                  foreach($query as $data)
                  {
                    $name_sims = strtolower($data->HUTOWNERNAME);
                     array_push($match_name_array,$data->HUTOWNERNAME);
                    $address_sims = strtolower($data->Address);
                     array_push($match_address_array,$data->Address);
                    $category_sims = strtolower($data->PropertyType);
                     array_push($match_cat_array,$data->PropertyType);
                    $service_provider_sims = 'Not Available';
                     array_push($match_service_array,'Not Available');
                    $ca_sims = 'Not Available';
                     array_push($match_ca_array,'Not Available');
                    $bill_date_sims = 'Not Available';
                     array_push($match_bill_array,'Not Available');
                  }
                }
                                
                $name = isset($query4[0]->elector_name) ? $query4[0]->elector_name : 'Not Available';
                array_push($match_name_array,$name);
                $address = isset($query4[0]->elector_address) ? $query4[0]->elector_address : 'Not Available';
                array_push($match_address_array,$address);
                $category = isset($query4[0]->category) ? $query4[0]->category : 'Not Available';
                array_push($match_cat_array,$category);
                if(count($query4) > 0){
                  $service_provider = isset($query4[0]->doc_type) ? $query4[0]->doc_type : 'Adani Electricity';
                }else{
                  $service_provider = 'Not Available';
                }
                //$service_provider = isset($query4[0]->doc_type) ? $query4[0]->doc_type : 'Not Available';
                array_push($match_service_array,$service_provider);
                 $ca_no = isset($query4[0]->ca_number) ? $query4[0]->ca_number : 'Not Available';
                 array_push($match_ca_array,$ca_no);
                 $bill_date = isset($query4[0]->bill_date) ? $query4[0]->bill_date : 'Not Available'; 
                 array_push($match_bill_array,$bill_date);

                //integration start
                 //print_r($new_result_2);
                 if(count($new_result_2) > 0){
                   foreach ($new_result_2 as $data) {
                            $integration_name[] = strtolower($data->owner_name);
                            array_push($match_name_int_array,$data->owner_name);
                            if($data->address == ",,"){
                              $integration_address[] = "";
                              array_push($match_address_int_array,"");
                            }else{
                              $integration_address[] = strtolower($data->address);
                              array_push($match_address_int_array,$data->address);
                            }
                            
                            $integration_category[] = strtolower($data->category);
                            array_push($match_cat_int_array,$data->category);
                            $integration_service_provider[] = strtolower($data->service_provider);
                            array_push($match_service_int_array,$data->service_provider);
                            $integration_ca[] = $data->ca_no;
                            array_push($match_ca_int_array,$data->ca_no);
                            $integration_bill_date[] = '';
                            array_push($match_bill_int_array,'');
                  }
                  $res_int1 = \SraHelper::instance()->integration_return_single_value($match_name_int_array);
                  array_push($match_name_array,$res_int1);
                  //print_r($res_int1);
                  $res_int2 = \SraHelper::instance()->integration_return_single_value($match_address_int_array);
                  array_push($match_address_array,$res_int2);
                  
                  $res_int3 = \SraHelper::instance()->integration_return_single_value($match_cat_int_array);
                  array_push($match_cat_array,$res_int3);
                  $res_int4 = \SraHelper::instance()->integration_return_single_value($match_service_int_array);
                  array_push($match_service_array,$res_int4);
                  $res_int5 = \SraHelper::instance()->integration_return_single_value($match_ca_int_array);
                  array_push($match_ca_array,$res_int5);
                  $res_int6 = \SraHelper::instance()->integration_return_single_value($match_bill_int_array);
                  array_push($match_bill_array,$res_int6);
                }else{
                  //echo "out";
                  array_push($match_name_array,"Not Available");
                  array_push($match_address_array,"Not Available");
                  array_push($match_cat_array,"Not Available");
                  array_push($match_service_array,"Not Available");
                  array_push($match_ca_array, "Not Available");
                  array_push($match_bill_array,'Not Available');
                } 
               //print_r($match_address_int_array);
                //fetch most common name from integration start
                
                
                                  
                //fetch most common name end

                //integration end

                
                //For Name
              
                $highestPercentageOfName1 = $per =0;
                $highestPercentageName1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_name_array);
               // print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfName1 = $per;
                  $highestPercentageName1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfName1 = $per;
                  $highestPercentageName1 = $match_str;
                  }
                  if($per < 0){
                  $highestPercentageOfName1 = 0;
                  $highestPercentageName1 = $match_str;
                  }  
                }
                

                if($highestPercentageName1 == 'Not Available') 
                  $highestPercentageOfName1 = 0;
                

                if($highestPercentageOfName1 == 100 )
                  $color_name = '#238823';
                elseif($highestPercentageOfName1 >= 50)
                  $color_name = '#FFBF00';
                else  
                  $color_name = '#d2222d';

                //For Address
                $highestPercentageOfAddress1 = $per =0;
                $highestPercentageAddress1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_address_array);
               // print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfAddress1 = $per;
                  $highestPercentageAddress1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfAddress1 = $per;
                  $highestPercentageAddress1 = $match_str;
                  } 
                  if($per < 0){
                  $highestPercentageOfAddress1 = 0;
                  $highestPercentageAddress1 = $match_str;
                  } 
                }

                
                if($highestPercentageAddress1 == 'Not Available') 
                  $highestPercentageOfAddress1 = 0;
                

                if($highestPercentageOfAddress1 == 100 )
                  $color_address = '#238823';
                elseif($highestPercentageOfAddress1 >= 50)
                  $color_address = '#FFBF00';
                else  
                  $color_address = '#d2222d';

                //For Category
                $highestPercentageOfCategory1 = $per =0;
                $highestPercentageCategory1 = $match_string ="";
                $res = array();
                
                //print_r($match_cat_array);
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_cat_array);
               // print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfCategory1 = $per;
                  $highestPercentageCategory1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfCategory1 = $per;
                  $highestPercentageCategory1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfCategory1 = 0;
                  $highestPercentageCategory1 = $match_str;
                  }
                }


                if($highestPercentageCategory1 == 'Not Available') 
                  $highestPercentageOfCategory1 = 0;

                if($highestPercentageOfCategory1 == 100 )
                  $color_category = '#238823';
                elseif($highestPercentageOfCategory1 >= 50)
                  $color_category = '#FFBF00';
                else  
                  $color_category = '#d2222d';


                //For Service_provider
                
                $highestPercentageOfservice_provider1 = $per =0;
                $highestPercentageservice_provider1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_service_array);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfservice_provider1 = $per;
                  $highestPercentageservice_provider1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfservice_provider1 = $per;
                  $highestPercentageservice_provider1 = $match_str;
                  } 
                  if($per < 0){
                  $highestPercentageOfservice_provider1 = 0;
                  $highestPercentageservice_provider1 = $match_str;
                  } 
                }

               
                if($highestPercentageservice_provider1 == 'Not Available') 
                  $highestPercentageOfservice_provider1 = 0;

                if($highestPercentageOfservice_provider1 == 100 )
                  $color_service_provider = '#238823';
                elseif($highestPercentageOfservice_provider1 >= 50)
                  $color_service_provider = '#FFBF00';
                else  
                  $color_service_provider = '#d2222d';


                //For CA   
               
                //start
                $highestPercentageOfca1 = $per =0;
                $highestPercentageca1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_ca_array);
                //print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfca1 = $per;
                  $highestPercentageca1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfca1 = $per;
                  $highestPercentageca1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfca1 = 0;
                  $highestPercentageca1 = $match_str;
                  }
                }
                
              if($highestPercentageca1 == 'Not Available') 
                  $highestPercentageOfca1 = 0;

                if($highestPercentageOfca1 == 100 )
                  $color_ca = '#238823';
                elseif($highestPercentageOfca1 >= 50)
                  $color_ca = '#FFBF00';
                else  
                  $color_ca = '#d2222d';

              //For bill_date 
              
              //start
                $highestPercentageOfbill_date1 = $per =0;
                $highestPercentagebill_date1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_bill_array);
                //print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfbill_date1 = $per;
                  $highestPercentagebill_date1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfbill_date1 = $per;
                  $highestPercentagebill_date1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfbill_date1 = 0;
                  $highestPercentagebill_date1 = $match_str;
                  }
                }
                
                           
              if($highestPercentagebill_date1 == 'Not Available') 
                  $highestPercentageOfbill_date1 = 0;

              if($highestPercentageOfbill_date1 == 100 )
                $color_bill_date = '#238823';
              elseif($highestPercentageOfbill_date1 >= 50)
                $color_bill_date = '#FFBF00';
              else  
                $color_bill_date = '#d2222d';

              ?>
              <div class="col-md-12">
               <!--  <hr/>
                <div class="d-flex align-items-center" style="background-color: lightblue;">
                   <h3 class="card-title"><i class="fas fa-list"></i> &nbsp;Year 2001 or Before Year 2011</h3>
                </div>
                <hr/> -->
                <br/>
                <div class="row">
                    <div class="col-md-9">
                      <!-- sims start-->
                      <h4>SIMS Data</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <td width="10%"><?php echo e($data->HUTOWNERNAME); ?></td>
                              <td width="20%"><?php echo e($data->Address); ?> </td>
                              <td width="10%"><?php echo e($data->PropertyType); ?></td>
                              <td width="10%">Not Available</td>
                              <td width="10%">Not Available</td>
                              <td width="10%">Not Available</td>
                              
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                      <!-- sims end -->
                      <!-- ocr start-->
                      <h4>SIMS OCR</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                             <?php if(count($query4) >= 1){?>
                              <?php $__currentLoopData = $query4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td width="10%"><?php echo e($data->elector_name); ?></td>
                            <td width="20%"><?php echo e($data->elector_address); ?> </td>
                            <td width="10%"><?php echo e($data->category); ?></td>
                            <td width="10%">Adani Electricity</td>
                            <td width="10%"><?php echo e($data->ca_number); ?></td>
                            <td width="10%"><?php echo e($data->bill_date); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php } else{ ?>
                               <td width="10%">Not Available</td>
                            <td width="20%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <?php } ?>
                            
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                      <!-- ocr end -->
                    </div>
                    <div class="col-md-3">
                      <!-- image start-->
                      <!-- image start-->
                      <div class="card">
                            <div class="card-body">
                            <?php 
                            // if(count($query4)==1){
                            ?>
                            <img src="http://sra-uat.apniamc.in/images/<?php echo e($hid); ?>_light_bill2.jpeg" style="height:320px;width:100%;" id="myImg2" onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';">
                            <?php //}else{ ?>
                              <!-- <img src="http://sra-uat.apniamc.in/images/noimage.jpg" style="height:320px;width:250px;" > -->
                            <?php// } ?>
                            <!-- start-->
                            <div id="myModal2" class="modal">
                              <span class="close" id="close2">&times;</span>
                              <img class="modal-content" id="img012">
                              
                            </div>
                            <script>
                            // Get the modal
                            var modal = document.getElementById("myModal2");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg2");
                            var modalImg = document.getElementById("img012");
                            var captionText = document.getElementById("caption");
                            img.onclick = function(){
                              modal.style.display = "block";
                              modalImg.src = this.src;
                              modalImg.classList.add("zoom");
                              captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementById("close2");

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
                          </div>
                        </div>
                      <!-- image end -->
                      <!-- image end -->
                    </div>
                </div>
                <!-- integration start-->
                
                <h4>Integration Data</h4>
                 <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                             <th width="5%">Legacy CA No</th>
                            <th width="5%">First Consumer Name</th>
                            <th width="5%">First Bill</th>
                            <th width="5%">Change Name Date</th>
                            <th width="5%">Change Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count1 = $showData1 = $index = 0;
                          $data_address = "";

                          if(count($new_result_2) > 0){ 
                            
                            foreach ($new_result_2 as $data) {
                              
                               if($data->legacy_ca_no != ""){
                                
                                  $count1++;
                                  $showData1 = 1;
                                  
                                  $data_address = $data->address;
                                  
                                  if($data_address == ",,"){
                                     $data_address = "Not Available";
                                  }
                                 
                                  ?>
                                    <tr>
                                      <td>
                                        <?php if(isset($data->owner_name )){
                                          if($data->owner_name == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->owner_name;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                         
                                      </td>
                                      <td>
                                        <?php if(isset($data_address )){
                                          if($data_address == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data_address;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                      
                                    </td>
                                      <td>
                                        <?php if(isset($data->category )){
                                          if($data->category == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->category;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        
                                      </td>
                                      <td>
                                        <?php if(isset($data->service_provider )){
                                          if($data->service_provider == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->service_provider;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        
                                      </td>
                                      <td>
                                        <?php if(isset($data->legacy_ca_no )){
                                          if($data->legacy_ca_no == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->legacy_ca_no;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->first_consumer_name )){
                                          if($data->first_consumer_name == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->first_consumer_name;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        
                                      </td>
                                      <td>
                                        <?php if(isset($data->first_bill )){
                                          if($data->first_bill == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->first_bill;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->change_name_date )){
                                          if($data->change_name_date == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->change_name_date;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        
                                      </td>
                                      <td>
                                        <?php if(isset($data->change_date )){
                                          if($data->change_date == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->change_date;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                    </tr>
                                    <?php 
                                    
                                }
                          }
                          //echo "aaa".$count1;
                          if($count1 == 0 && $showData1 == 0){  ?>
                             <tr>
                                       
                                      <td width="10%">Not Available </td>
                                      <td width="20%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                            </tr>
                          <?php }

                          }else{ ?>
                            <tr>
                                       
                                      <td width="10%">Not Available </td>
                                      <td width="20%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                            </tr>
                          <?php }
                          
                          
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <br/>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Move In Date</th>
                            <th width="10%">Move Out Date
                            </th>
                            <th width="10%">Legacy Customer</th>
                            <th width="10%">House No</th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Tariff</th>
                            <th width="10%">Flag MIGR</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count1 = $showData1 = $index = 0;
                          $data_address = "";
                          if(count($new_result_2) > 0){ 
                            foreach ($new_result_2 as $data) {
                               if($data->ca_no != ""){
                                  $count1++;
                                  $showData1 = 1;
                                  
                                  $data_address = $data->address;
                                  
                                  if($data_address == ",,"){
                                     $data_address = "Not Available";
                                  }
                                 
                                  ?>
                                    <tr>
                                      <td>
                                        <?php if(isset($data->owner_name )){
                                          if($data->owner_name == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->owner_name;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                       </td>
                                      <td>
                                        <?php if(isset($data_address )){
                                          if($data_address == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data_address;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                     </td>
                                      <td>
                                        <?php if(isset($data->move_in_date )){
                                          if($data->move_in_date == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->move_in_date;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->move_out_date )){
                                          if($data->move_out_date == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->move_out_date;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                       </td>
                                      <td>
                                        <?php if(isset($data->legacy_customer )){
                                          if($data->legacy_customer == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->legacy_customer;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                      </td>
                                      <td>
                                         <?php if(isset($data->house_no )){
                                          if($data->house_no == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->house_no;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->category )){
                                          if($data->category == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->category;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        
                                      </td>
                                      <td>
                                        <?php if(isset($data->service_provider )){
                                          if($data->service_provider == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->service_provider;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                         <?php if(isset($data->ca_no )){
                                          if($data->ca_no == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->ca_no;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->tariff )){
                                          if($data->tariff == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->tariff;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                       </td>
                                      <td>
                                        <?php if(isset($data->flag_migr )){
                                          if($data->flag_migr == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->flag_migr;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                       </td>
                                    </tr>
                                    <?php 
                                    
                                }
                          }
                          if($count1 == 0 && $showData1 == 0){ ?>
                             <tr>
                                       
                                      <td width="10%">Not Available </td>
                                      <td width="20%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                            </tr>
                          <?php }

                          }else{ ?>
                            <tr>
                                       
                                      <td width="10%">Not Available </td>
                                      <td width="20%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                            </tr>
                          <?php }
                          
                          
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- integration end -->
                <!-- recommendation start-->
                <!-- Recommendation Start -->
                <br/>
                <?php //if($showData1 == 1){?>
                <h4>Recommendation by Vendor</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      
                      <table class="table table-borderless table-responsive">
                        <thead>
                           <tr>
                            <th width="10%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;">Owner Name (<?php echo e(round($highestPercentageOfName1)); ?>%)</th>
                            <th width="20%" style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;">Address (<?php echo e(round($highestPercentageOfAddress1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_category; ?>;color:#fff;padding: 5px !important;">Category (<?php echo e(round($highestPercentageOfCategory1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_service_provider; ?>;color:#fff;padding: 5px !important;">Service Provider (<?php echo e(round($highestPercentageOfservice_provider1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_ca; ?>;color:#fff;padding: 5px !important;">CA No (<?php echo e(round($highestPercentageOfca1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_bill_date; ?>;color:#fff;padding: 5px !important;">Bill Date (<?php echo e(round($highestPercentageOfbill_date1)); ?>%)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                               <td width="10%" ><?= ucfirst($highestPercentageName1); ?></td>
                              <td width="20%" ><?= ucfirst($highestPercentageAddress1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageCategory1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageservice_provider1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageca1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentagebill_date1); ?></td>                 

                             
                        </tr>
                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                        <input type="hidden" name="year" value="2">
                        <input type="hidden" name="user" value="vendor">
                        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                        <!-- <tr>
                            <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                        </tr> -->
                        
                        <tr>
                           <?php if (isset($data_2000_2011) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="20%">
                                      <?php 
                                      if($data_2000_2011->eligibility_address == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_address == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_address == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_category == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_category == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_category == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_serviceprovider == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_serviceprovider == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_serviceprovider == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_ca == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_ca == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_ca == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_billdate == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_billdate == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_billdate == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                          <td width="10%">
                          <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2"  <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td> 
                        <?php } ?>
                        </tr>
                        <tr>
                          <td colspan="6"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                        <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                          <?php
                            $access = '';
                          ?>
                        <?php endif; ?>
                         <?php if (isset($data_2000_2011) ) { ?>
                              <td width="10%"><?php echo e(isset($data_2000_2011->remark_name) ? $data_2000_2011->remark_name : ''); ?></td>
                              <td width="20%"><?php echo e(isset($data_2000_2011->remark_address) ? $data_2000_2011->remark_address : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_2011->remark_category) ? $data_2000_2011->remark_category : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_2011->remark_serviceprovider) ? $data_2000_2011->remark_serviceprovider : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_2011->remark_ca) ? $data_2000_2011->remark_ca : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_2011->remark_billdate) ? $data_2000_2011->remark_billdate : ''); ?></td> 
                              <?php } else{ ?>
                          <td width="10%"><input type="text" class="form-control" name="remark1" value = "<?php echo e(isset($data_2000_2011->remark_name) ? $data_2000_2011->remark_name : ''); ?>" <?php echo e(isset($data_2000_2011->remark_name) ? 'readonly' : ''); ?>  <?= $access ?>></td>
                          <td width="20%"><input type="text" class="form-control" name="remark2" value = "<?php echo e(isset($data_2000_2011->remark_address) ? $data_2000_2011->remark_address : ''); ?>" <?php echo e(isset($data_2000_2011->remark_address) ? 'readonly' : ''); ?>  <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark3" value = "<?php echo e(isset($data_2000_2011->remark_category) ? $data_2000_2011->remark_category : ''); ?>" <?php echo e(isset($data_2000_2011->remark_category) ? 'readonly' : ''); ?>  <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark4" value = "<?php echo e(isset($data_2000_2011->remark_serviceprovider) ? $data_2000_2011->remark_serviceprovider : ''); ?>" <?php echo e(isset($data_2000_2011->remark_serviceprovider) ? 'readonly' : ''); ?>  <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark5" value = "<?php echo e(isset($data_2000_2011->remark_ca) ? $data_2000_2011->remark_ca : ''); ?>" <?php echo e(isset($data_2000_2011->remark_ca) ? 'readonly' : ''); ?>  <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark6" value = "<?php echo e(isset($data_2000_2011->remark_billdate) ? $data_2000_2011->remark_billdate : ''); ?>" <?php echo e(isset($data_2000_2011->remark_billdate) ? 'readonly' : ''); ?>  <?= $access ?>></td> 
                        <?php } ?>
                        </tr>
                         <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                        <tr>
                          <td><b>Section Status :</b></td>
                          <td><b>Section Remark :</b></td>
                          <?php

                          if(count($query4)>0){
                              $remark2 = "Electricity Document with CA number ". $query4[0]->ca_number." and address " .$query4[0]->elector_address." and Bill Date " .$query4[0]->bill_date;
                          }else{
                              $remark2 = "";
                          }
                      ?>
                          

                        </tr>
                        <tr>
                             <td width="10%">
                               <?php if (isset($data_2000_2011) ) { 
                                      if($data_2000_2011->overall_eligibility == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->overall_eligibility == 1){
                                        echo "Verified";
                                      }
                                      if($data_2000_2011->overall_eligibility == 2){
                                        echo "Not Matched";
                                      }
                                      if($data_2000_2011->overall_eligibility == 3){
                                        echo "Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($data_2000_2011->overall_eligibility) && ($data_2000_2011->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                                  <option value="2" <?php echo e(isset($data_2000_2011->overall_eligibility) && ($data_2000_2011->overall_eligibility == 2) ? 'selected' : ''); ?>>Not Matched</option>
                                  <option value="3" <?php echo e(isset($data_2000_2011->overall_eligibility) && ($data_2000_2011->overall_eligibility == 3) ? 'selected' : ''); ?>>Unavailable</option>
                                </select>
                              <?php } ?>
                              </td> 
                              <td width="10%" colspan="5">
                                <?php if (isset($data_2000_2011) ) { ?>
                                        <?php echo e(isset($data_2000_2011->overall_remark) ? $data_2000_2011->overall_remark : 'Not Available'); ?>

                                <?php }else { ?>
                                  <textarea style="height:auto !important;" class="form-control" name="remark" cols="100" > <?php echo e(isset($data_2000_2011->overall_remark) ? $data_2000_2011->overall_remark : $remark2); ?></textarea>
                              <?php } ?>
                              </td>
                        </tr>
                        <tr>
                          <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                                  <?php if(!isset($data_2000_2011)): ?>
                                    <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                                  <?php endif; ?>
                                <?php endif; ?>
                        </tr>
                        </form>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                  
                </div>
                <?php if ($currentUser->hasAccess('admin.sra.ca_remark')) : ?>

                    <h4>Conclusion of CA</h4>
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive" id="sra-table">
                          <table class="table table-borderless table-responsive">
                            <thead>
                               <tr>
                            <th width="10%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;">Owner Name (<?php echo e(round($highestPercentageOfName1)); ?>%)</th>
                            <th width="20%" style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;">Address (<?php echo e(round($highestPercentageOfAddress1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_category; ?>;color:#fff;padding: 5px !important;">Category (<?php echo e(round($highestPercentageOfCategory1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_service_provider; ?>;color:#fff;padding: 5px !important;">Service Provider (<?php echo e(round($highestPercentageOfservice_provider1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_ca; ?>;color:#fff;padding: 5px !important;">CA No (<?php echo e(round($highestPercentageOfca1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_bill_date; ?>;color:#fff;padding: 5px !important;">Bill Date (<?php echo e(round($highestPercentageOfbill_date1)); ?>%)</th>
                          </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                  <td width="10%" ><?= ucfirst($highestPercentageName1); ?></td>
                              <td width="20%" ><?= ucfirst($highestPercentageAddress1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageCategory1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageservice_provider1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageca1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentagebill_date1); ?></td>               
                            </tr>
                        
                            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                            <input type="hidden" name="year" value="2">
                            <input type="hidden" name="user" value="ca">
                            <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                            <!-- <tr>
                            <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                            </tr> -->
                            
                            <tr>
                              <?php if (isset($data_2000_2011_ca) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="20%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_address == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_address == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_address == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_category == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_category == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_category == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_serviceprovider == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_serviceprovider == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_serviceprovider == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_ca == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_ca == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_ca == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_billdate == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_billdate == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_billdate == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                               <td width="10%">
                          <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2"  <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td> 
                            <?php } ?>
                            </tr>
                            <tr>
                              <td colspan="6"><hr/><b>Remark :</b></td>
                            </tr>
                            <tr>
                              <?php if (isset($data_2000_2011_ca) ) { ?>
                              <td width="10%"><?php echo e(isset($data_2000_2011_ca->remark_name) ? $data_2000_2011_ca->remark_name : ''); ?></td>
                              <td width="20%"><?php echo e(isset($data_2000_2011_ca->remark_address) ? $data_2000_2011_ca->remark_address : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_2011_ca->remark_category) ? $data_2000_2011_ca->remark_category : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_2011_ca->remark_serviceprovider) ? $data_2000_2011_ca->remark_serviceprovider : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_2011_ca->remark_ca) ? $data_2000_2011_ca->remark_ca : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_2000_2011_ca->remark_billdate) ? $data_2000_2011_ca->remark_billdate : ''); ?></td> 
                              <?php } else{ ?>
                              <td width="10%"><input type="text" class="form-control" name="remark1_ca" value = "<?php echo e(isset($data_2000_2011_ca->remark_name) ? $data_2000_2011_ca->remark_name : ''); ?>" <?php echo e(isset($data_2000_2011_ca->remark_name) ? 'readonly' : ''); ?>></td>
                              <td width="20%"><input type="text" class="form-control" name="remark2_ca" value = "<?php echo e(isset($data_2000_2011_ca->remark_address) ? $data_2000_2011_ca->remark_address : ''); ?>" <?php echo e(isset($data_2000_2011_ca->remark_address) ? 'readonly' : ''); ?>></td>
                              <td width="10%"><input type="text" class="form-control" name="remark3_ca" value = "<?php echo e(isset($data_2000_2011_ca->remark_category) ? $data_2000_2011_ca->remark_category : ''); ?>" <?php echo e(isset($data_2000_2011_ca->remark_category) ? 'readonly' : ''); ?>></td>
                              <td width="10%"><input type="text" class="form-control" name="remark4_ca"  value = "<?php echo e(isset($data_2000_2011_ca->remark_serviceprovider) ? $data_2000_2011_ca->remark_serviceprovider : ''); ?>" <?php echo e(isset($data_2000_2011_ca->remark_serviceprovider) ? 'readonly' : ''); ?>></td>
                              <td width="10%"><input type="text" class="form-control" name="remark5_ca" value = "<?php echo e(isset($data_2000_2011_ca->remark_ca) ? $data_2000_2011_ca->remark_ca : ''); ?>" <?php echo e(isset($data_2000_2011_ca->remark_ca) ? 'readonly' : ''); ?> ></td>
                              <td width="10%"><input type="text" class="form-control" name="remark6_ca" value = "<?php echo e(isset($data_2000_2011_ca->remark_billdate) ? $data_2000_2011_ca->remark_billdate : ''); ?>" <?php echo e(isset($data_2000_2011_ca->remark_billdate) ? 'readonly' : ''); ?>></td> 
                            <?php } ?>
                            </tr>
                            <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                            <tr>
                              <td ><b>Section Status :</b></td>
                              <td ><b>Section Remark :</b></td>
                              
                            </tr>
                            <tr>
                                <td width="10%">
                                  <?php if (isset($data_2000_2011_ca) ) { 
                                      if($data_2000_2011_ca->overall_eligibility == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->overall_eligibility == 1){
                                        echo "Verified";
                                      }
                                      if($data_2000_2011_ca->overall_eligibility == 2){
                                        echo "Not Matched";
                                      }
                                      if($data_2000_2011_ca->overall_eligibility == 3){
                                        echo "Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                    <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                      <option value="0">-- Select Option --</option>
                                      <option value="1" <?php echo e(isset($data_2000_2011_ca->overall_eligibility) && ($data_2000_2011_ca->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                                      <option value="2" <?php echo e(isset($data_2000_2011_ca->overall_eligibility) && ($data_2000_2011_ca->overall_eligibility == 2) ? 'selected' : ''); ?>>Not Matched</option>
                                      <option value="3" <?php echo e(isset($data_2000_2011_ca->overall_eligibility) && ($data_2000_2011_ca->overall_eligibility == 3) ? 'selected' : ''); ?>>Unavailable</option>
                                    </select>
                                  <?php } ?>
                                  </td> 
                                  <td width="10%" colspan="5">
                                    <?php if (isset($data_2000_2011_ca) ) { ?>
                                        <?php echo e(isset($data_2000_2011_ca->overall_remark) ? $data_2000_2011_ca->overall_remark : 'Not Available'); ?>

                                <?php }else { ?>
                                  <textarea style="height:auto !important;" class="form-control" name="remark" cols="100" > <?php echo e(isset($data_2000_2011_ca->overall_remark) ? $data_2000_2011_ca->overall_remark : $remark2); ?></textarea>
                                  <?php } ?>
                                  </td>

                            </tr>
                          
                            <tr>
                              <?php if ($currentUser->hasAccess('admin.sra.ca_remark')) : ?>
                                  <?php if(!isset($data_2000_2011_ca)): ?>
                              <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                              <!-- <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td> -->
                              <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                            </form>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  <?php endif; ?>
              <?php //} ?>
                <!-- Recommendation  End -->
                <!-- recommendation end -->
              </div>
                  <!-- Year 2001 or Before Year 2011 end -->     
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                          <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Current Year
                          </a>
                        </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body" style="background-color: #e2e5de;padding-bottom:5px;">
                            <!-- Current Year start -->
                  <!-- Script for Match the Data to SIMS -->
               <?php

              $match_name_array = $match_address_array = $match_bill_array = $match_ca_array = $match_service_array = $match_cat_array = array();
              $match_name_int_array = $match_address_int_array = $match_bill_int_array = $match_ca_int_array = $match_service_int_array = $match_cat_int_array = array();
              $res_int1 = $res_int2 = $res_int3 = $res_int4 = $res_int5 = $res_int6 = array();
              $match_int_str = "";
              $integration_name = array();
                $integration_address = array();
                $integration_bill_date = array();
                $integration_ca = array();
                $integration_service_provider = array();
                $integration_category = array();
                $match_name = $match_address = $match_category = $match_service_provider = $match_ca = $match_bill_date = array();
                if(count($query) > 0){
                  foreach($query as $data)
                  {
                    $name_sims = $data->HUTOWNERNAME;
                     array_push($match_name_array,$data->HUTOWNERNAME);
                    $address_sims = $data->Address;
                     array_push($match_address_array,$data->Address);
                    $category_sims = $data->PropertyType;
                     array_push($match_cat_array,$data->PropertyType);
                    $service_provider_sims = 'Not Available';
                     array_push($match_service_array,'Not Available');
                    $ca_sims = 'Not Available';
                     array_push($match_ca_array,'Not Available');
                    $bill_date_sims = 'Not Available';
                     array_push($match_bill_array,'Not Available');
                  }
                }
                                 
                $name = isset($query5[0]->elector_name) ? $query5[0]->elector_name : 'Not Available';
                array_push($match_name_array,$name);
                $address = isset($query5[0]->elector_address) ? $query5[0]->elector_address : 'Not Available';
                array_push($match_address_array,$address);
                $category = isset($query5[0]->category) ? $query5[0]->category : 'Not Available';
                array_push($match_cat_array,$category);
                if(count($query5) > 0){
                  $service_provider = isset($query5[0]->doc_type) ? $query5[0]->doc_type : 'Adani Electricity';
                }else{
                  $service_provider = 'Not Available';
                }
                
                array_push($match_service_array,$service_provider);
                 $ca_no = isset($query5[0]->ca_number) ? $query5[0]->ca_number : 'Not Available';
                 array_push($match_ca_array,$ca_no);
                 $bill_date = isset($query5[0]->bill_date) ? $query5[0]->bill_date : 'Not Available'; 
                 array_push($match_bill_array,$bill_date);

                //integration start
                if(count($new_result_3) > 0){
                 foreach ($new_result_3 as $data) {
                          $integration_name[] = $data->owner_name;
                          array_push($match_name_int_array,$data->owner_name);
                          if($data->address == ",,"){
                            $integration_address[] = "";
                            array_push($match_address_int_array,"");
                          }else{
                            $integration_address[] = $data->address;
                            array_push($match_address_int_array,$data->address);
                          }
                          
                          $integration_category[] = $data->category;
                          array_push($match_cat_int_array,$data->category);
                          $integration_service_provider[] = $data->service_provider;
                          array_push($match_service_int_array,$data->service_provider);
                          $integration_ca[] = $data->ca_no;
                          array_push($match_ca_int_array,$data->ca_no);
                          $integration_bill_date[] = '';
                          array_push($match_bill_int_array,'');
                }
                $res_int1 = \SraHelper::instance()->integration_return_single_value($match_name_int_array);
                array_push($match_name_array,$res_int1);
                $res_int2 = \SraHelper::instance()->integration_return_single_value($match_address_int_array);
                array_push($match_address_array,$res_int2);
                //print_r($match_address_array);
                $res_int3 = \SraHelper::instance()->integration_return_single_value($match_cat_int_array);
                array_push($match_cat_array,$res_int3);
                $res_int4 = \SraHelper::instance()->integration_return_single_value($match_service_int_array);
                array_push($match_service_array,$res_int4);
                $res_int5 = \SraHelper::instance()->integration_return_single_value($match_ca_int_array);
                array_push($match_ca_array,$res_int5);
                $res_int6 = \SraHelper::instance()->integration_return_single_value($match_bill_int_array);
                array_push($match_bill_array,$res_int6);
              }else{
                  //echo "out";
                  array_push($match_name_array,"Not Available");
                  array_push($match_address_array,"Not Available");
                  array_push($match_cat_array,"Not Available");
                  array_push($match_service_array,"Not Available");
                  array_push($match_ca_array, "Not Available");
                  array_push($match_bill_array,'Not Available');
                }
               //print_r($match_address_int_array);
                //fetch most common name from integration start
                
                
                                  
                //fetch most common name end

                //integration end

                
                //For Name
              
                $highestPercentageOfName1 = $per =0;
                $highestPercentageName1 = $match_string ="";
                $res = array();
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_name_array);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfName1 = $per;
                  $highestPercentageName1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfName1 = $per;
                  $highestPercentageName1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfName1 = 0;
                  $highestPercentageName1 = $match_str;
                  }
                }
                

                if($highestPercentageName1 == 'Not Available') 
                  $highestPercentageOfName1 = 0;
                

                if($highestPercentageOfName1 == 100 )
                  $color_name = '#238823';
                elseif($highestPercentageOfName1 >= 50)
                  $color_name = '#FFBF00';
                else  
                  $color_name = '#d2222d';

                //For Address
                $highestPercentageOfAddress1 = $per =0;
                $highestPercentageAddress1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_address_array);
               // print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfAddress1 = $per;
                  $highestPercentageAddress1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfAddress1 = $per;
                  $highestPercentageAddress1 = $match_str;
                  } 
                  if($per < 0){
                  $highestPercentageOfAddress1 = 0;
                  $highestPercentageAddress1 = $match_str;
                  } 
                }

                
                if($highestPercentageAddress1 == 'Not Available') 
                  $highestPercentageOfAddress1 = 0;
                

                if($highestPercentageOfAddress1 == 100 )
                  $color_address = '#238823';
                elseif($highestPercentageOfAddress1 >= 50)
                  $color_address = '#FFBF00';
                else  
                  $color_address = '#d2222d';

                //For Category
                $highestPercentageOfCategory1 = $per =0;
                $highestPercentageCategory1 = $match_string ="";
                $res = array();
                
                //print_r($match_cat_array);
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_cat_array);
                //print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfCategory1 = $per;
                  $highestPercentageCategory1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfCategory1 = $per;
                  $highestPercentageCategory1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfCategory1 = 0;
                  $highestPercentageCategory1 = $match_str;
                  }
                }


                if($highestPercentageCategory1 == 'Not Available') 
                  $highestPercentageOfCategory1 = 0;

                if($highestPercentageOfCategory1 == 100 )
                  $color_category = '#238823';
                elseif($highestPercentageOfCategory1 >= 50)
                  $color_category = '#FFBF00';
                else  
                  $color_category = '#d2222d';


                //For Service_provider
                
                $highestPercentageOfservice_provider1 = $per =0;
                $highestPercentageservice_provider1 = $match_string ="";
                $res = array();
                
               // print_r($match_service_array);
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_service_array);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfservice_provider1 = $per;
                  $highestPercentageservice_provider1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfservice_provider1 = $per;
                  $highestPercentageservice_provider1 = $match_str;
                  } 
                  if($per < 0){
                  $highestPercentageOfservice_provider1 = 0;
                  $highestPercentageservice_provider1 = $match_str;
                  } 
                }

               
                if($highestPercentageservice_provider1 == 'Not Available') 
                  $highestPercentageOfservice_provider1 = 0;

                if($highestPercentageOfservice_provider1 == 100 )
                  $color_service_provider = '#238823';
                elseif($highestPercentageOfservice_provider1 >= 50)
                  $color_service_provider = '#FFBF00';
                else  
                  $color_service_provider = '#d2222d';


                //For CA   
               
                //start
                $highestPercentageOfca1 = $per =0;
                $highestPercentageca1 = $match_string ="";
                $res = array();
                
                //print_r($match_address_array);
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_ca_array);
                //print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfca1 = $per;
                  $highestPercentageca1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfca1 = $per;
                  $highestPercentageca1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfca1 = 0;
                  $highestPercentageca1 = $match_str;
                  }
                }
                
              if($highestPercentageca1 == 'Not Available') 
                  $highestPercentageOfca1 = 0;

                if($highestPercentageOfca1 == 100 )
                  $color_ca = '#238823';
                elseif($highestPercentageOfca1 >= 50)
                  $color_ca = '#FFBF00';
                else  
                  $color_ca = '#d2222d';

              //For bill_date 
              
              //start
                $highestPercentageOfbill_date1 = $per =0;
                $highestPercentagebill_date1 = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_bill_array);
                //print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfbill_date1 = $per;
                  $highestPercentagebill_date1 = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfbill_date1 = $per;
                  $highestPercentagebill_date1 = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfbill_date1 = 0;
                  $highestPercentagebill_date1 = $match_str;
                  }
                }
                
                           
              if($highestPercentagebill_date1 == 'Not Available') 
                  $highestPercentageOfbill_date1 = 0;

              if($highestPercentageOfbill_date1 == 100 )
                $color_bill_date = '#238823';
              elseif($highestPercentageOfbill_date1 >= 50)
                $color_bill_date = '#FFBF00';
              else  
                $color_bill_date = '#d2222d';

              ?>
              <!-- End script -->
              <div class="col-md-12">
                <!-- <hr/>
                <div class="d-flex align-items-center" style="background-color: lightblue;">
                   <h3 class="card-title"><i class="fas fa-list"></i> &nbsp;Current Year</h3>
                </div>
                <hr/> -->
                <br/>
                <div class="row">
                    <div class="col-md-9">
                      <!-- sims start-->
                      <h4>SIMS Data</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <td width="10%"><?php echo e($data->HUTOWNERNAME); ?></td>
                              <td width="20%"><?php echo e($data->Address); ?> </td>
                              <td width="10%"><?php echo e($data->PropertyType); ?></td>
                              <td width="10%">Not Available</td>
                              <td width="10%">Not Available</td>
                              <td width="10%">Not Available</td>
                              
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                      <!-- sims end -->
                      <!-- ocr start-->
                      <h4>SIMS OCR</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                             <?php if(count($query5) >= 1){?>
                              <?php $__currentLoopData = $query5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td width="10%"><?php echo e(isset($data->elector_name)?$data->elector_name:'Not Available'); ?></td>
                            <td width="20%"><?php echo e($data->elector_address); ?> </td>
                            <td width="10%"><?php echo e($data->category); ?></td>
                            <td width="10%">Adani Electricity</td>
                            <td width="10%"><?php echo e($data->ca_number); ?></td>
                            <td width="10%"><?php echo e($data->bill_date); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php } else{ ?>
                               <td width="10%">Not Available</td>
                            <td width="20%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <td width="10%">Not Available</td>
                            <?php } ?>
                            
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                      <!-- ocr end -->
                    </div>
                    <div class="col-md-3">
                      <!-- image start-->
                      <!-- image start-->
                      <div class="card">
                            <div class="card-body">
                            <?php 
                            // if(count($query5)==1){
                            ?>
                            <img src="http://sra-uat.apniamc.in/images/<?php echo e($hid); ?>_light_bill3.jpeg" style="height:320px;width:100%;" id="myImg" onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';">
                            <?php //}else{ ?>
                              <!-- <img src="http://sra-uat.apniamc.in/images/noimage.jpg" style="height:320px;width:250px;" > -->
                            <?php// } ?>
                            <!-- start-->
                            <div id="myModal" class="modal">
                              <span class="close" id="close3">&times;</span>
                              <img class="modal-content" id="img01">
                              
                            </div>
                            <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg");
                            var modalImg = document.getElementById("img01");
                            var captionText = document.getElementById("caption");
                            img.onclick = function(){
                              modal.style.display = "block";
                              modalImg.src = this.src;
                              modalImg.classList.add("zoom");
                              captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementById("close3");

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
                          </div>
                        </div>
                      <!-- image end -->
                      <!-- image end -->
                    </div>
                </div>
                <!-- integration start-->
                
                <h4>Integration Data</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                         <tr>
                          
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Move In Date
                            </th>
                            <th width="10%">Move Out Date
                            </th>
                            <th width="10%">Legacy Customer</th>
                            <th width="10%">House_No</th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Tariff</th>
                            <th width="10%">Flag MIGR</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                          $count1 = $showData1 = $index = 0;
                          $data_address = "";
                          if(count($new_result_3) > 0){ 
                            foreach ($new_result_3 as $data) {
                               if($data->ca_no != ""){
                                  $count1++;
                                  $showData1 = 1;
                                  
                                  $data_address = $data->address;
                                  
                                  if($data_address == ",,"){
                                     $data_address = "Not Available";
                                  }
                                 
                                  ?>
                                    <tr>
                                      <td>
                                        <?php if(isset($data->owner_name )){
                                          if($data->owner_name == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->owner_name;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                         </td>
                                      <td>
                                        <?php if(isset($data_address )){
                                          if($data_address == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data_address;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                      </td>
                                      <td>
                                        <?php if(isset($data->move_in_date )){
                                          if($data->move_in_date == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->move_in_date;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->move_out_date )){
                                          if($data->move_out_date == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->move_out_date;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->legacy_customer )){
                                          if($data->legacy_customer == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->legacy_customer;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->house_no )){
                                          if($data->house_no == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->house_no;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->category )){
                                          if($data->category == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->category;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->service_provider )){
                                          if($data->service_provider == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->service_provider;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->ca_no )){
                                          if($data->ca_no == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->ca_no;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->tariff )){
                                          if($data->tariff == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->tariff;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                      <td>
                                        <?php if(isset($data->flag_migr )){
                                          if($data->flag_migr == ""){
                                            echo "Not Available";
                                          }else{
                                            echo $data->flag_migr;
                                          }
                                        }else{
                                          echo "Not Available";
                                        }   
                                        ?>
                                        </td>
                                    </tr>
                                    <?php 
                                    
                                }
                          }
                          if($count1 == 0 && $showData1 == 0){ ?>
                             <tr>
                                       
                                      <td width="10%">Not Available </td>
                                      <td width="20%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                            </tr>
                          <?php }

                          }else{ ?>
                            <tr>
                                       
                                      <td width="10%">Not Available </td>
                                      <td width="20%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="10%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                                      <td width="5%">Not Available</td>
                            </tr>
                          <?php }
                          
                          
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <br/>
                <!-- integration end -->
                <!-- recommendation start -->
                 <br/>
                 <?php //if($showData1 == 1){?>
                 <h4>Recommendation by Vendor</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      
                      <table class="table table-borderless table-responsive">
                        <thead>
                         <tr>
                            <th width="10%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;">Owner Name (<?php echo e(round($highestPercentageOfName1)); ?>%)</th>
                            <th width="20%" style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;">Address (<?php echo e(round($highestPercentageOfAddress1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_category; ?>;color:#fff;padding: 5px !important;">Category (<?php echo e(round($highestPercentageOfCategory1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_service_provider; ?>;color:#fff;padding: 5px !important;">Service Provider (<?php echo e(round($highestPercentageOfservice_provider1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_ca; ?>;color:#fff;padding: 5px !important;">CA No (<?php echo e(round($highestPercentageOfca1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_bill_date; ?>;color:#fff;padding: 5px !important;">Bill Date (<?php echo e(round($highestPercentageOfbill_date1)); ?>%)</th>
                          </tr>
                        </thead>
                        <tbody>

                        <tr>
                              <td width="10%" ><?= ucwords($highestPercentageName1); ?></td>
                              <td width="20%" ><?= ucwords($highestPercentageAddress1); ?></td>
                              <td width="10%" ><?= ucwords($highestPercentageCategory1); ?></td>
                              <td width="10%" ><?= ucwords($highestPercentageservice_provider1); ?></td>
                              <td width="10%" ><?= ucwords($highestPercentageca1); ?></td>
                              <td width="10%" ><?= ucwords($highestPercentagebill_date1); ?></td>   
                        </tr>
                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                        <input type="hidden" name="year" value="3">
                        <input type="hidden" name="user" value="vendor">
                        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                        <!-- <tr>
                            <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                            </tr> -->
                            
                            <tr>
                              <?php if (isset($data_current) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="20%">
                                      <?php 
                                      if($data_current->eligibility_address == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_address == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_address == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_category == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_category == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_category == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_serviceprovider == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_serviceprovider == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_serviceprovider == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_ca == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_ca == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_ca == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_billdate == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_billdate == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_billdate == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                              <td width="10%">
                          <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2"  <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td> 
                            <?php } ?>
                            </tr>
                        <tr>
                          <td colspan="6"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                        <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                          <?php
                            $access = '';
                          ?>
                        <?php endif; ?>
                         <?php if (isset($data_current) ) { ?>
                              <td width="10%"><?php echo e(isset($data_current->remark_name) ? $data_current->remark_name : ''); ?></td>
                              <td width="20%"><?php echo e(isset($data_current->remark_address) ? $data_current->remark_address : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_current->remark_category) ? $data_current->remark_category : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_current->remark_serviceprovider) ? $data_current->remark_serviceprovider : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_current->remark_ca) ? $data_current->remark_ca : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_current->remark_billdate) ? $data_current->remark_billdate : ''); ?></td> 
                              <?php } else{ ?>
                          <td width="10%"><input type="text" class="form-control" name="remark1" value = "<?php echo e(isset($data_current->remark_name) ? $data_current->remark_name : ''); ?>" <?php echo e(isset($data_current->remark_name) ? 'readonly' : ''); ?>  <?= $access ?>></td>
                          <td width="20%"><input type="text" class="form-control" name="remark2" value = "<?php echo e(isset($data_current->remark_address) ? $data_current->remark_address : ''); ?>" <?php echo e(isset($data_current->remark_address) ? 'readonly' : ''); ?> <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark3" value = "<?php echo e(isset($data_current->remark_category) ? $data_current->remark_category : ''); ?>" <?php echo e(isset($data_current->remark_category) ? 'readonly' : ''); ?> <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark4" value = "<?php echo e(isset($data_current->remark_serviceprovider) ? $data_current->remark_serviceprovider : ''); ?>" <?php echo e(isset($data_current->remark_serviceprovider) ? 'readonly' : ''); ?> <?= $access ?> ></td>
                          <td width="10%"><input type="text" class="form-control" name="remark5" value = "<?php echo e(isset($data_current->remark_ca) ? $data_current->remark_ca : ''); ?>" <?php echo e(isset($data_current->remark_ca) ? 'readonly' : ''); ?> <?= $access ?>></td>
                          <td width="10%"><input type="text" class="form-control" name="remark6" value = "<?php echo e(isset($data_current->remark_billdate) ? $data_current->remark_billdate : ''); ?>" <?php echo e(isset($data_current->remark_billdate) ? 'readonly' : ''); ?> <?= $access ?>></td> 
                        <?php } ?>
                        </tr>
                        <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                        <tr>
                          <td><b>Section Status :</b></td>
                          <td><b>Section Remark :</b></td>
                          <?php
                          
                          if(count($query5)>0){
                          
                              $remark3 = "Electricity Document with CA number ". $query5[0]->ca_number." and address " .$query5[0]->elector_address." and Bill Date " .$query5[0]->bill_date;
                          }else{
                              $remark3 = "";
                          }
                      ?>

                          
                        </tr>
                        <tr>
                             <td width="10%">
                              <?php if (isset($data_current) ) { 
                                      if($data_current->overall_eligibility == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->overall_eligibility == 1){
                                        echo "Verified";
                                      }
                                      if($data_current->overall_eligibility == 2){
                                        echo "Not Matched";
                                      }
                                      if($data_current->overall_eligibility == 3){
                                        echo "Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($data_current->overall_eligibility) && ($data_current->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                                  <option value="2" <?php echo e(isset($data_current->overall_eligibility) && ($data_current->overall_eligibility == 2) ? 'selected' : ''); ?>>Not Matched</option>
                                  <option value="3" <?php echo e(isset($data_current->overall_eligibility) && ($data_current->overall_eligibility == 3) ? 'selected' : ''); ?>>Unavailable</option>
                                </select>
                              <?php } ?>
                              </td> 
                              
                            <td width="10%" colspan="5">
                              <?php if (isset($data_current) ) { ?>
                                        <?php echo e(isset($data_current->overall_remark) ? $data_current->overall_remark : 'Not Available'); ?>

                                <?php }else { ?>
                                  <textarea style="height:auto !important;" class="form-control" name="remark" cols="100" > <?php echo e(isset($data_current->overall_remark) ? $data_current->overall_remark : $remark3); ?></textarea>
                            <?php } ?>
                            </td>

                        </tr>
                     <tr>
                       <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                                  <?php if(!isset($data_current)): ?>
                              <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                              <!-- <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td> -->
                              <?php endif; ?>
                                <?php endif; ?>
                     </tr>
                        </form>
                        
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                  
                </div>
                <?php if ($currentUser->hasAccess('admin.sra.ca_remark')) : ?>
                    <h4>Conclusion of CA</h4>
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive" id="sra-table">
                          <table class="table table-borderless table-responsive">
                            <thead>
                              <tr>
                            <th width="10%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;">Owner Name (<?php echo e(round($highestPercentageOfName1)); ?>%)</th>
                            <th width="20%" style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;">Address (<?php echo e(round($highestPercentageOfAddress1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_category; ?>;color:#fff;padding: 5px !important;">Category (<?php echo e(round($highestPercentageOfCategory1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_service_provider; ?>;color:#fff;padding: 5px !important;">Service Provider (<?php echo e(round($highestPercentageOfservice_provider1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_ca; ?>;color:#fff;padding: 5px !important;">CA No (<?php echo e(round($highestPercentageOfca1)); ?>%)</th>
                            <th width="10%" style="background-color:<?= $color_bill_date; ?>;color:#fff;padding: 5px !important;">Bill Date (<?php echo e(round($highestPercentageOfbill_date1)); ?>%)</th>
                          </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                  <td width="10%" ><?= ucfirst($highestPercentageName1); ?></td>
                              <td width="20%" ><?= ucfirst($highestPercentageAddress1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageCategory1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageservice_provider1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentageca1); ?></td>
                              <td width="10%" ><?= ucfirst($highestPercentagebill_date1); ?></td>                     
                            </tr>
                        
                            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                            <input type="hidden" name="year" value="3">
                            <input type="hidden" name="user" value="ca">
                            <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">

                            <!-- <tr>
                            <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                            </tr> -->
                            <tr>
                              <?php if (isset($data_current_ca) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="20%">
                                      <?php 
                                      if($data_current_ca->eligibility_address == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_address == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_address == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_category == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_category == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_category == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_serviceprovider == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_serviceprovider == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_serviceprovider == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_ca == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_ca == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_ca == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_billdate == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_billdate == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_billdate == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                             <td width="10%">
                          <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfName1) && $highestPercentageOfName1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfCategory1) && $highestPercentageOfCategory1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2"  <?php echo e(isset($highestPercentageOfservice_provider1) && $highestPercentageOfservice_provider1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfca1) && $highestPercentageOfca1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 < 100 ? 'selected' : ''); ?>>Manual</option>
                              <option value="2" <?php echo e(isset($highestPercentageOfbill_date1) && $highestPercentageOfbill_date1 == 100 ? 'selected' : ''); ?>>Auto</option>
                          </select>
                          </td> 
                        <?php } ?>
                            </tr>
                            <tr>
                              <td colspan="6"><hr/><b>Remark :</b></td>
                            </tr>
                            <tr>
                              <?php if (isset($data_current_ca) ) { ?>
                              <td width="10%"><?php echo e(isset($data_current_ca->remark_name) ? $data_current_ca->remark_name : ''); ?></td>
                              <td width="20%"><?php echo e(isset($data_current_ca->remark_address) ? $data_current_ca->remark_address : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_current_ca->remark_category) ? $data_current_ca->remark_category : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_current_ca->remark_serviceprovider) ? $data_current_ca->remark_serviceprovider : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_current_ca->remark_ca) ? $data_current_ca->remark_ca : ''); ?></td>
                              <td width="10%"><?php echo e(isset($data_current_ca->remark_billdate) ? $data_current_ca->remark_billdate : ''); ?></td> 
                              <?php } else{ ?>
                              <td width="10%"><input type="text" class="form-control" name="remark1_ca" value = "<?php echo e(isset($data_current_ca->remark_name) ? $data_current_ca->remark_name : ''); ?>" <?php echo e(isset($data_current_ca->remark_name) ? 'readonly' : ''); ?>></td>
                              <td width="20%"><input type="text" class="form-control" name="remark2_ca" value = "<?php echo e(isset($data_current_ca->remark_address) ? $data_current_ca->remark_address : ''); ?>" <?php echo e(isset($data_current_ca->remark_address) ? 'readonly' : ''); ?>></td>
                              <td width="10%"><input type="text" class="form-control" name="remark3_ca" value = "<?php echo e(isset($data_current_ca->remark_category) ? $data_current_ca->remark_category : ''); ?>" <?php echo e(isset($data_current_ca->remark_category) ? 'readonly' : ''); ?>></td>
                              <td width="10%"><input type="text" class="form-control" name="remark4_ca"  value = "<?php echo e(isset($data_current_ca->remark_serviceprovider) ? $data_current_ca->remark_serviceprovider : ''); ?>" <?php echo e(isset($data_current_ca->remark_serviceprovider) ? 'readonly' : ''); ?>></td>
                              <td width="10%"><input type="text" class="form-control" name="remark5_ca" value = "<?php echo e(isset($data_current_ca->remark_ca) ? $data_current_ca->remark_ca : ''); ?>" <?php echo e(isset($data_current_ca->remark_ca) ? 'readonly' : ''); ?> ></td>
                              <td width="10%"><input type="text" class="form-control" name="remark6_ca" value = "<?php echo e(isset($data_current_ca->remark_billdate) ? $data_current_ca->remark_billdate : ''); ?>" <?php echo e(isset($data_current_ca->remark_billdate) ? 'readonly' : ''); ?>></td> 
                            <?php } ?>
                            </tr>
                            <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                            <tr>
                              <td ><b>Section Status :</b></td>
                              <td ><b>Section Remark  :</b></td>
                              
                            </tr>
                            <tr>
                                <td width="10%">
                                  <?php if (isset($data_current_ca) ) { 
                                      if($data_current_ca->overall_eligibility == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->overall_eligibility == 1){
                                        echo "Verified";
                                      }
                                      if($data_current_ca->overall_eligibility == 2){
                                        echo "Not Matched";
                                      }
                                      if($data_current_ca->overall_eligibility == 3){
                                        echo "Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                    <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                      <option value="0">-- Select Option --</option>
                                      <option value="1" <?php echo e(isset($data_current_ca->overall_eligibility) && ($data_current_ca->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                                      <option value="2" <?php echo e(isset($data_current_ca->overall_eligibility) && ($data_current_ca->overall_eligibility == 2) ? 'selected' : ''); ?>>Not Matched</option>
                                      <option value="3" <?php echo e(isset($data_current_ca->overall_eligibility) && ($data_current_ca->overall_eligibility == 3) ? 'selected' : ''); ?>>Unavailable</option>
                                    </select>
                                  <?php } ?>
                                  </td> 
                                  <td width="10%" colspan="5">
                                    <?php if (isset($data_current_ca) ) { ?>
                                        <?php echo e(isset($data_current_ca->overall_remark) ? $data_current_ca->overall_remark : 'Not Available'); ?>

                                <?php }else { ?>
                                  <textarea style="height:auto !important;" class="form-control" name="remark" cols="100" > <?php echo e(isset($data_current_ca->overall_remark) ? $data_current_ca->overall_remark : $remark3); ?></textarea>
                                    
                                  <?php } ?>
                                  </td>

                            </tr>
                          
                            <tr>
                               <?php if ($currentUser->hasAccess('admin.sra.ca_remark')) : ?>
                                  <?php if(!isset($data_current_ca)): ?>
                              <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                              <!-- <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td> -->
                              <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                            </form>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  <?php endif; ?>
                <?php //} ?>
                <!-- Recommendation end -->
              </div>
                  <!-- Current Year end -->
                          </div>
                        </div>
                      </div>
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
                            <!-- start-->
                            <div class="col-md-12">
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
                                    <input type="hidden" name="type" value="electricity">
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
                                            <?php if($overall_remark[0]->electricity_status == 0){ ?>
                                                <option value="0" selected="">-- Select Option --</option>
                                              <?php }else{ ?>
                                                <option value="0">-- Select Option --</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->electricity_status == 1){ ?>
                                                <option value="1" selected="">Verified</option>
                                              <?php }else{ ?>
                                                <option value="1" >Verified</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->electricity_status == 2){ ?>
                                                <option value="2" selected="">Not Matched</option>
                                              <?php }else{ ?>
                                                <option value="2" >Not Matched</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->electricity_status == 3){ ?>
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
                                           <textarea name="remark" cols="100" class="form-control"><?php echo e($overall_remark[0]->electricity_remark); ?></textarea>
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
                            <!-- end -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- accordion end -->
                  <!-- year start-->

                  
                  
                  
                  <!-- year end -->
                  <!-- tab content end -->
                
                </div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
            <a href="index.php/sra/elections/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Election</a>
            <div class="tab-content">Election Details</div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
             <a href="index.php/sra/gumasta/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Gumasta</a>
            <div class="tab-content">Gumasta Details</div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
            <a href="#" class="tab-label" style="color:#495057!important;font-size:16px !important;">Photo Pass Details</a>
            <div class="tab-content">Photo Pass Details</div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-5" class="tab-switch">
             <a href="index.php/sra/agreement/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Registration Agreement Details</a>
            <div class="tab-content">Registration Agreement Details</div>
          </div>
          <div class="tab">
                <input type="radio" name="css-tabs" id="tab-7" class="tab-switch">
                <a href="index.php/sra/adhar/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Adhar Card</a>
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
  .tab-switch:checked + .tab-label {
    background: #1269db !important;
    color: white !important;
  }
  .tab-label{
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
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/sra/detail.blade.php ENDPATH**/ ?>