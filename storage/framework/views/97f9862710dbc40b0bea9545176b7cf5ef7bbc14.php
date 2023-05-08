

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
                <input type="radio" name="css-tabs" id="tab-6" class="tab-switch">
                 <a href="index.php/sra/documentlisting/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Hut Documents</a>
                <div class="tab-content">Hut Documents</div>
            </div>
           <div class="tab">
            <input type="radio" name="css-tabs" id="tab-1" class="tab-switch">
            <a href="index.php/sra/detail/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important; font-size:16px !important;">Electricity</a>

            <div class="tab-content">Electricity Details</div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-2" checked class="tab-switch">
            <label for="tab-2" class="tab-label"style="color:#fff !important;font-size:16px !important;">Election</label>
            <div class="tab-content">
            <!-- election start-->
            <!-- start -->
                              <!-- body start -->
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
                            <!-- content start-->
                             <!-- Year 2000 start -->
                  <?php
                      // $dat_2000 = $recomm_remarks;
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
                    $match_name_array = $match_address_array = $match_number_array = $match_type_array = $match_const_array = $match_srno_array = $match_part_array = array();

                    foreach($query as $data)
                    {
                      $name_sims = $data->HUTOWNERNAME;
                      array_push($match_name_array,$data->HUTOWNERNAME);
                      $address_sims = $data->Address;
                      array_push($match_address_array,$data->Address);
                      $num_sims = 'Not Available';
                      array_push($match_number_array,'Not Available');
                      $type_sims = 'Voting Card';
                      array_push($match_type_array,'Voting Card');
                      $cont_no_sims = 'Not Available';
                      array_push($match_const_array,'Not Available');
                      $sr_no_sims = 'Not Available';
                      array_push($match_srno_array,'Not Available');
                      $part_no_sims = 'Not Available';
                      array_push($match_part_array,'Not Available');

                    }

                    $match_name  = $match_address = $match_num = $match_type = $match_const = $match_sr = $match_part = array();
                    $name_2000 = $address2000 = $voterid2000 = $int_name = $int_address = $int_num = $int_cont_no = $int_sr_no = $int_part_no = $int_type = 'Not Available'; 
                    //$int_type = 'Voting Card';
                    foreach($query3 as $voter) {
                            //curl start

                            $name_2000 = $voter->voter_name;
                            $elector_name = "(".$name_2000.")";
                            $search = array('search' => $elector_name);
                            $search_string = json_encode($search);
                           
                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                              CURLOPT_URL => 'https://docbrains.in/api/search/public?organization=election',
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => '',
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 0,
                              CURLOPT_FOLLOWLOCATION => true,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => 'POST',
                              CURLOPT_SSL_VERIFYHOST => 0,
                              CURLOPT_SSL_VERIFYPEER =>0,
                              CURLOPT_POSTFIELDS =>json_encode($search),
                              CURLOPT_HTTPHEADER => array(
                                'Content-Type: application/json'
                              ),
                            ));

                            $response = curl_exec($curl);
                            curl_close($curl);
                            
                            $year_2000 = json_decode($response, true);
                            if($year_2000['result']['count'] > 0){
                            	
                                $text_2000 = (string)$year_2000['result']['data'][0]['found_text'];
                                $pattern = '/Elector s Name\s+([A-Za-z ]+)/';
                                $arr = preg_match($pattern, $text_2000, $matches);
                                $name_2000 = isset($match) ? $matches[0] : '';
                                $address_2000 = (string)$year_2000['result']['data'][0]['found_text'];
                                $voterid_2000 = (string)$year_2000['result']['data'][0]['voter_details']['voter_id'];
                                $int_name = isset($name2000)?str_replace("Elector s Name","",$name2000):'Not Available';
                                array_push($match_name_array,$int_name);
                                $int_address = $address_2000;
                                array_push($match_address_array,$int_address);
                                $int_num = $voterid_2000;
                                array_push($match_number_array,$int_num);
                                if($name_2000 == ''){
                                $int_type = 'Not Available';
                                }else{
                                $int_type = 'Voting Card';	
                                }
                                array_push($match_type_array,$int_type);
                                $int_cont_no = 'Not Available';
                                array_push($match_const_array,$int_cont_no);
                                $int_sr_no = 'Not Available' ;
                                array_push($match_srno_array,$int_sr_no);
                                $int_part_no = 'Not Available';
                                array_push($match_part_array,$int_part_no);
                            }else{
                            	
                                $name_2000 = 'Not Available';
                                $address_2000 = 'Not Available';
                                $voterid_2000 = 'Not Available';
                                $int_name = $name_2000;
                                array_push($match_name_array,$int_name);
                                $int_address = $address_2000;
                                array_push($match_address_array,$int_address);
                                $int_num = $voterid_2000;
                                array_push($match_number_array,$int_num);
                                $int_type = 'Not Available';
                                array_push($match_type_array,$int_type);
                                $int_cont_no = 'Not Available';
                                array_push($match_const_array,$int_cont_no);
                                $int_sr_no = 'Not Available' ;
                                array_push($match_srno_array,$int_sr_no);
                                $int_part_no = 'Not Available';
                                array_push($match_part_array,$int_part_no);
                            }

                        }
                    
                        
                    
                  //print_r($match_number_array);
                 
                    $elector_name_new = isset($query3[0]->voter_name) ? $query3[0]->voter_name : 'Not Available';
                    array_push($match_name_array,$elector_name_new);
                    $elector_address_new = isset($query3[0]->address) ? $query3[0]->address : 'Not Available';
                    array_push($match_address_array,$elector_address_new);
                    $elector_num_new =  isset($query3[0]->voter_id) ? $query3[0]->voter_id : 'Not Available';
                    array_push($match_number_array,$elector_num_new);
                    $elector_const_new = isset($query3[0]->constitution_no) ? $query3[0]->constitution_no : 'Not Available';
                    array_push($match_const_array,$elector_const_new);
                    $elector_sr_new = isset($query3[0]->sr_no) ? $query3[0]->sr_no : 'Not Available';
                    array_push($match_srno_array,$elector_sr_new);
                    $elector_part_new = isset($query3[0]->part_no) ? $query3[0]->part_no : 'Not Available';
                    array_push($match_part_array,$elector_part_new);
                    if(isset($query3[0]->voter_name)){
                    	if($query3[0]->voter_name == ""){
                    		array_push($match_type_array,'Not Available');	
                    	}else{
                    		array_push($match_type_array,'Voting Card');		
                    	}	
                    }else{
                    	array_push($match_type_array,'Not Available');
                    }
                    //print_r($match_number_array);
                    
                    //For Name

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

                    if($highestPercentageName == 'Not Available')
                      $color_name = '#d2222d';

                
                    //For Address
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
                    
                    if($highestPercentageAddress == 'Not Available')
                      $color_address = '#d2222d';
                   

                   //For Number
                   
                   $highestPercentageOfNum = $per =0;
	                $highestPercentageNum = $match_string ="";
	                $res = array();
	                
	                
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_number_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfNum = $per;
	                  $highestPercentageNum = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfNum = $per;
	                  $highestPercentageNum = $match_str;
	                  } 
	                  if($per < 0){
	                  $highestPercentageOfNum = 0;
	                  $highestPercentageNum = $match_str;
	                  } 
	                }
                    if($highestPercentageNum == 'Not Available') 
                  		$highestPercentageOfNum = 0;



                   
                   if($highestPercentageOfNum == 100 )
                     $color_num = '#238823';
                   elseif($highestPercentageOfNum >= 50)
                     $color_num = '#FFBF00';
                   else  
                     $color_num = '#d2222d';
                  
                    if($highestPercentageNum == 'Not Available')
                      $color_num = '#d2222d';


                    //For Type
                    $highestPercentageOfType = $per =0;
	                $highestPercentageType = $match_string ="";
	                $res = array();
	                
	                

	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_type_array);
	                
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

                    if($highestPercentageType == 'Not Available')
                      $color_type = '#d2222d';
                
                    //For Const
                   
                  	$highestPercentageOfconst = $per =0;
	                $highestPercentageConst = $match_string ="";
	                $res = array();
	                
	                //print_r($match_const_array);
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_const_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfconst = $per;
	                  $highestPercentageConst = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfconst = $per;
	                  $highestPercentageConst = $match_str;
	                  }  
	                  if($per < 0){
	                  $highestPercentageOfconst = 0;
	                  $highestPercentageConst = $match_str;
	                  }
	                }
                    if($highestPercentageConst == 'Not Available') 
                  		$highestPercentageOfconst = 0;

                    
                    if($highestPercentageOfconst == 100 )
                      $color_const = '#238823';
                    elseif($highestPercentageOfconst >= 50)
                      $color_const = '#FFBF00';
                    else  
                      $color_const = '#d2222d';

                    if($highestPercentageConst == 'Not Available')
                      $color_const = '#d2222d';

                    
                    //For SR
                    $highestPercentageOfSrno = $per =0;
	                $highestPercentageSr = $match_string ="";
	                $res = array();
	                
	                
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_srno_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfSrno = $per;
	                  $highestPercentageSr = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfSrno = $per;
	                  $highestPercentageSr = $match_str;
	                  }  
	                  if($per < 0){
	                  $highestPercentageOfSrno = 0;
	                  $highestPercentageSr = $match_str;
	                  }
	                }
                    if($highestPercentageSr == 'Not Available') 
                  		$highestPercentageOfSrno = 0;

                    
                    if($highestPercentageOfSrno == 100 )
                      $color_sr = '#238823';
                    elseif($highestPercentageOfSrno >= 50)
                      $color_sr = '#FFBF00';
                    else  
                      $color_sr = '#d2222d';
                    
                    if($highestPercentageSr == 'Not Available')
                      $color_sr = '#d2222d';
                    
                    //For Part
                   	$highestPercentageOfPart = $per =0;
	                $highestPercentagePart = $match_string ="";
	                $res = array();
	                
	                
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_part_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfPart = $per;
	                  $highestPercentagePart = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfPart = $per;
	                  $highestPercentagePart = $match_str;
	                  }  
	                  if($per < 0){
	                  $highestPercentageOfPart = 0;
	                  $highestPercentagePart = $match_str;
	                  }
	                }
                    if($highestPercentagePart == 'Not Available') 
                  		$highestPercentageOfPart = 0;

                    if($highestPercentageOfPart == 100 )
                      $color_part = '#238823';
                    elseif($highestPercentageOfPart >= 50)
                      $color_part = '#FFBF00';
                    else  
                      $color_part = '#d2222d';
                      
                    if($highestPercentagePart == 'Not Available')
                      $color_part = '#d2222d';
                    
                ?>
     
                
                <?php $access = 'readonly' ?>
                <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                  <?php
                    $access = '';
                  ?>
                <?php endif; ?>
              
              
              <div class="col-md-12">
                
                <br/>
                <div class="row">

              <div class="col-md-9">
                <h4>SIMS Data</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Elector Number</th>
                            <th width="10%">Document Type</th>
                            <th width="10%">Constitution No.</th>
                            <th width="10%">Sr No.</th>
                            <th width="10%">Part No.</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                        
                          <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <td width="10%"><?php echo e($data->HUTOWNERNAME); ?></td>
                              <td width="20%"><?php echo e($data->Address); ?> </td>
                              <td width="10%">Not Available </td>
                              <td width="10%">Voting Card</td>
                              <td width="10%">Not Available </td>
                              <td width="10%">Not Available </td>
                              <td width="10%">Not Available </td>
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
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Elector Number</th>
                            <th width="10%">Document Type</th>
                            <th width="10%">Constitution No.</th>
                            <th width="10%">Sr No.</th>
                            <th width="10%">Part No.</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        
                          <?php
                          if(count($query3)>=1)
                          {

                          foreach($query3 as $voter) {
                            echo "<tr>";
                            echo "<td width='10%'>" . (isset($voter->voter_name) ? $voter->voter_name : 'Not Available') . "</td>";
                            echo "<td width='20%'>" . (isset($voter->address) ? $voter->address : 'Not Available') . "</td>";
                            echo "<td width='10%'>" . (isset($voter->voter_id) ? $voter->voter_id : 'Not Available') . "</td>";
                            echo "<td width='10%'>".(isset($voter) ? 'Voting Card' : 'Not Available')."</td>";
                            echo "<td width='10%'>" . (isset($voter->constitution_no) ? $voter->constitution_no : 'Not Available') . "</td>";
                            echo "<td width='10%'>" . (isset($voter->sr_no) ? $voter->sr_no : 'Not Available') . "</td>";
                            echo "<td width='10%'>" . (isset($voter->part_no) ? $voter->part_no : 'Not Available') . "</td>";
                            echo "</tr>";
                          }   
                        }
                        else{
                          echo "<tr>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "<td width='20%'>Not Available</td>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "</tr>";

                        }     
                          ?>



                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                 <!-- image start-->
                 <div class="card">
                            <div class="card-body">
                            <?php 
                            if(count($query3)==1){
                            ?>
                            <img src="http://sra-uat.apniamc.in/images/<?php echo e($hid); ?>_voter_id1.jpeg" style="height:320px;width:100%;" id="myImg" onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';">
                            <?php }else{ ?>
                              <img src="http://sra-uat.apniamc.in/images/noimage.jpg" style="height:320px;width:100%;" >
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
                            img.onclick = function(){
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
                    </div>
                    </div>

                          
                          <h4>Integration Data</h4>
                          <div class="card">
                            <div class="card-body">
                              <div class="table-responsive" id="sra-table">
                                <table class="table table-borderless table-responsive">
                                  <thead>
                                    <tr>
                                      <th width="10%">Owner Name</th>
                                      <th width="20%">Address </th>
                                      <th width="10%">Elector Number</th>
                                      <th width="10%">Document Type</th>
                                      <th width="10%">Constitution No.</th>
                                      <th width="10%">Sr No.</th>
                                      <th width="10%">Part No.</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                  //   $count1 = $showData1 = 0;
                                  //   foreach ($new_result as $key => $result)
                                        //{
                                  ///if(isset($election_data[0]) && $election_no != ''){
                                      // print_r($election_data[0]);die;
                              ?>

                                              <tr>
                                                  <td width="10%"><?php echo e(isset($name2000)?str_replace("Elector s Name","",$name2000):'Not Available'); ?></td>
                                                  <td width="20%"><?php echo e(isset($address2000)?$address2000:'Not Available'); ?> </td>
                                                  <td width="10%"><?php echo e(isset($voterid2000)?$voterid2000:'Not Available'); ?></td>
                                                  <td width="10%">
                                                  	<?php if(isset($name2000)){
			                                    		if($name2000 != '' && $name2000 != 'Not Available'){
			                                    			echo "Voting Card";
			                                    		}else{
			                                    			echo "Not Available";
			                                    		}
			                                    	}else{
			                                    		echo "Not Available";
			                                    	}
			                                    	?>
                                                  </td>
                                                  <td width="10%">Not Available</td>
                                                  <td width="10%">Not Available</td>
                                                  <td width="10%">Not Available</td>
                                              </tr>
                                            <?php // }} ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <!-- Recommendation Start -->
                                <br/>

                <!-- Recomendatioon start -->
                <h4>Recommendation by Vendor</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                        <thead>
                        <thead>
                            <tr>
                              <th width="10%" style="background:<?= $color_name; ?>;color:#fff;">Owner Name(<?php echo e(round($highestPercentageOfName)); ?>%)</th>
                              <th width="20%" style="background:<?= $color_address; ?>;color:#fff;">Address(<?php echo e(round($highestPercentageOfAddress)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_num; ?>;color:#fff;">Elector Number(<?php echo e(round($highestPercentageOfNum)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_type; ?>;color:#fff;">Document Type(<?php echo e(round($highestPercentageOfType)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_const; ?>;color:#fff;">Constitution No.(<?php echo e(round($highestPercentageOfconst)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_sr; ?>;color:#fff;">Sr No.(<?php echo e(round($highestPercentageOfSrno)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_part; ?>;color:#fff;">Part No.(<?php echo e(round($highestPercentageOfPart)); ?>%)</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td width="10%"><?= $highestPercentageName; ?></td>
                              <td width="10%"><?= $highestPercentageAddress; ?></td>
                              <td width="10%"><?= $highestPercentageNum; ?></td>
                              <td width="10%"><?= $highestPercentageType; ?></td>
                              <td width="10%"><?= $highestPercentageConst; ?></td>
                              <td width="10%"><?= $highestPercentageSr; ?></td>
                              <td width="10%"><?= $highestPercentagePart; ?></td>
                            </tr>    
                          </tbody>


                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark_election')); ?>">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="1">
                          <input type="hidden" name="user" value="vendor">
                          <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">

                          <!-- <tr>
                            <td colspan="7"><hr/><b>Eligible / Not Eligible :</b></td>
                          </tr> -->
                          <tr>
                                  <?php if (isset($data_2000) ) { ?>
                                    <td>
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
                                     <td width="10%">
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
                                      if($data_2000->eligibility_number == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_number == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_number == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_type == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_type == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_type == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_const_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_const_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_const_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_sr_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_sr_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_sr_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_part_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_part_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_part_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                          <?php } ?>
                          </tr>
                          <tr>
                            <td colspan="7"><hr/><b>Remark :</b></td>
                          </tr>
                          <tr>
                                <td width="10%">
                                    <?php if(isset($data_2000->remark_name)): ?>
                                        <?php echo e($data_2000->remark_name); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark1" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="20%">
                                    <?php if(isset($data_2000->remark_address)): ?>
                                        <?php echo e($data_2000->remark_address); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark2" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_2000->remark_number)): ?>
                                        <?php echo e($data_2000->remark_number); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark3" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_2000->remark_type)): ?>
                                        <?php echo e($data_2000->remark_type); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark4" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_2000->remark_const_no)): ?>
                                        <?php echo e($data_2000->remark_const_no); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark5" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_2000->remark_sr_no)): ?>
                                        <?php echo e($data_2000->remark_sr_no); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark6" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_2000->remark_part_no)): ?>
                                        <?php echo e($data_2000->remark_part_no); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark7" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7"><hr/></td>
                              </tr>
                          <tr>
                            <td ><b>Section Status :</b></td>
                            <td ><b>Section Remark :</b></td>
                            <?php

                            if(count($query3)>0){
                                $remark1 = "Election Document with ID ". $query3[0]->voter_id." and address " .$query3[0]->address;
                            }else{
                                $remark1 = "";
                            }
                        ?>
                           

                          </tr>
                          <tr>
                            <td width="10%">
                              <?php if(isset($data_2000->overall_eligibility)): ?>
                                <?php echo e($data_2000->overall_eligibility === 1 ? 'Verified' : ($data_2000->overall_eligibility === 2 ? 'Not Matched' : 'Unavailable')); ?>

                              <?php else: ?>
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($data_2000->overall_eligibility) && ($data_2000->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                                  <option value="2" <?php echo e(isset($data_2000->overall_eligibility) && ($data_2000->overall_eligibility == 2) ? 'selected' : ''); ?>>Not Matched</option>
                                  <option value="3" <?php echo e(isset($data_2000->overall_eligibility) && ($data_2000->overall_eligibility == 3) ? 'selected' : ''); ?>>Unavailable</option>
                                </select>
                              <?php endif; ?>
                            </td> 
                            <td width="10%" colspan="6">
                              <?php if(isset($data_2000->overall_remark)): ?>
                                <?php echo e($data_2000->overall_remark); ?>

                              <?php else: ?>
                              <textarea class="form-control" style="height:auto!important;"  name="remark" <?php echo e(isset($data_2000->overall_remark) ? 'readonly' : ''); ?> cols="100"><?php echo e(isset($data_2000->overall_remark) ? $data_2000->overall_remark : $remark1); ?></textarea>                              <?php endif; ?>
                            </td>
                          </tr>

                        <tr>
                        <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                            <td colspan="6"><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create" <?php if(isset($data_2000->overall_remark)): ?> hidden <?php endif; ?>>Submit</button></td>
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
                        <thead>
                        <thead>
                          <tr>
                            <th width="10%" style="background:<?= $color_name; ?>;color:#fff;">Owner Name(<?php echo e(round($highestPercentageOfName)); ?>%)</th>
                              <th width="20%" style="background:<?= $color_address; ?>;color:#fff;">Address(<?php echo e(round($highestPercentageOfAddress)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_num; ?>;color:#fff;">Elector Number(<?php echo e(round($highestPercentageOfNum)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_type; ?>;color:#fff;">Document Type(<?php echo e(round($highestPercentageOfType)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_const; ?>;color:#fff;">Constitution No.(<?php echo e(round($highestPercentageOfconst)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_sr; ?>;color:#fff;">Sr No.(<?php echo e(round($highestPercentageOfSrno)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_part; ?>;color:#fff;">Part No.(<?php echo e(round($highestPercentageOfPart)); ?>%)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="10%"><?= $highestPercentageName; ?></td>
                            <td width="10%"><?= $highestPercentageAddress; ?></td>
                            <td width="10%"><?= $highestPercentageNum; ?></td>
                            <td width="10%"><?= $highestPercentageType; ?></td>
                            <td width="10%"><?= $highestPercentageConst; ?></td>
                            <td width="10%"><?= $highestPercentageSr; ?></td>
                            <td width="10%"><?= $highestPercentagePart; ?></td>
                          </tr>    
                        </tbody>

        
                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark_election')); ?>">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="1">
                          <input type="hidden" name="user" value="ca">
                          <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                        <!-- <tr>
                          <td colspan="7"><hr/><b>Eligible / Not Eligible :</b></td>
                        </tr>
                        <tr> -->
                        <tr>
                           <?php if (isset($data_2000_ca) ) { ?>
                                    <td>
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
                                     <td width="10%">
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
                                      if($data_2000_ca->eligibility_number == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_number == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_number == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_type == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_type == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_type == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_const_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_const_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_const_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_sr_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_sr_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_sr_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_part_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_part_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_part_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                          <?php } ?>
                          </tr>
                        <tr>
                          <td colspan="7"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                              <td width="10%">
                                  <?php if(isset($data_2000_ca->remark_name)): ?>
                                      <?php echo e($data_2000_ca->remark_name); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark1_ca" value="" >
                                  <?php endif; ?>
                              </td>
                              <td width="20%">
                                  <?php if(isset($data_2000_ca->remark_address)): ?>
                                      <?php echo e($data_2000_ca->remark_address); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark2_ca" value="" >
                                  <?php endif; ?>
                              </td>
                              <td width="10%">
                                  <?php if(isset($data_2000_ca->remark_number)): ?>
                                      <?php echo e($data_2000_ca->remark_number); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark3_ca" value="" >
                                  <?php endif; ?>
                              </td>
                              <td width="10%">
                                  <?php if(isset($data_2000_ca->remark_type)): ?>
                                      <?php echo e($data_2000_ca->remark_type); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark4_ca" value="" >
                                  <?php endif; ?>
                              </td>
                              <td width="10%">
                                  <?php if(isset($data_2000_ca->remark_const_no)): ?>
                                      <?php echo e($data_2000_ca->remark_const_no); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark5_ca" value="" >
                                  <?php endif; ?>
                              </td>
                              <td width="10%">
                                  <?php if(isset($data_2000_ca->remark_sr_no)): ?>
                                      <?php echo e($data_2000_ca->remark_sr_no); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark6_ca" value="" >
                                  <?php endif; ?>
                              </td>
                              <td width="10%">
                                  <?php if(isset($data_2000_ca->remark_part_no)): ?>
                                      <?php echo e($data_2000_ca->remark_part_no); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark7_ca" value="" >
                                  <?php endif; ?>
                              </td>
                          </tr>
                          <tr>
                                <td colspan="7"><hr/></td>
                              </tr>
                          <tr>
                            <td ><b>Section Status:</b></td>
                            <td ><b>Section Remark :</b></td>
             
                              
                          </tr>
                          <tr>
                          <td width="10%">
                            <?php if(isset($data_2000_ca->overall_eligibility)): ?>
                              <?php echo e($data_2000_ca->overall_eligibility == 1 ? 'Verified' : ($data_2000_ca->overall_eligibility == 2 ? 'Not Matched' : 'Unavailable')); ?>

                            <?php else: ?>
                              <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1">Verified</option>
                                <option value="2">Not Matched</option>
                                <option value="3">Unavailable</option>
                              </select>
                            <?php endif; ?>
                          </td>

                              <!-- <td width="10%"><input type="text" name="remark" value = "<?php echo e(isset($data_2000_ca->overall_remark) ? $data_2000_ca->overall_remark : ''); ?>" <?php echo e(isset($data_2000_ca->overall_remark) ? 'readonly' : ''); ?>></td> -->
                              <td width="10%" colspan="6">
                                      <?php if(isset($data_2000_ca->overall_remark)): ?>
                                        <?php echo e($data_2000_ca->overall_remark); ?>

                                      <?php else: ?>
                                      <textarea class="form-control" style="height:auto!important;" name="remark" cols="100"> <?php echo e(isset($data_2000_ca->overall_remark) ? $data_2000_ca->overall_remark :  $remark1); ?></textarea>
                                      <?php endif; ?>
                                    </td>
                            </tr>
                        <!-- <tr>
                          <td colspan="6"><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                        </tr> -->
                        <tr>
                         
                            <?php if(!isset($data_2000_ca->overall_remark)): ?>
                              <td colspan="6"><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                            <?php endif; ?>
                         
                        </tr>

                        </tbody>
                      </table>
                         </form>
                    </div>
                  </div>
                </div>
                <?php endif; ?>                         


                <!-- Recmmenatioon End -->
              </div>
                            <!-- content end -->
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
                            <!-- content start-->
                            <!-- Year 2000 start -->
              <?php
              	$match_name_array = $match_address_array = $match_number_array = $match_type_array = $match_const_array = $match_srno_array = $match_part_array = array();
                 foreach($query as $data)
                 {
                   $name_sims = $data->HUTOWNERNAME;
                      array_push($match_name_array,$data->HUTOWNERNAME);
                      $address_sims = $data->Address;
                      array_push($match_address_array,$data->Address);
                      $num_sims = 'Not Available';
                      array_push($match_number_array,'Not Available');
                      $type_sims = 'Voting Card';
                      array_push($match_type_array,'Voting Card');
                      $cont_no_sims = 'Not Available';
                      array_push($match_const_array,'Not Available');
                      $sr_no_sims = 'Not Available';
                      array_push($match_srno_array,'Not Available');
                      $part_no_sims = 'Not Available';
                      array_push($match_part_array,'Not Available');

                 }
                 $match_name  = $match_address = $match_num = $match_type = $match_const = $match_sr = $match_part = array();
                 $name_2011 = $address2011 = $voterid2011 = $int_name = $int_address = $int_num = $int_cont_no = $int_sr_no = $int_part_no = $int_type = 'Not Available'; 
                    //$int_type = 'Voting Card';
                 foreach($query4 as $voter) {
                            //curl start

                            $name_2011 = $voter->voter_name;
                            $elector_name = "(".$name_2011.")";
                            $search = array('search' => $elector_name);
                            $search_string = json_encode($search);
                           
                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                              CURLOPT_URL => 'https://docbrains.in/api/search/public?organization=election',
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => '',
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 0,
                              CURLOPT_FOLLOWLOCATION => true,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => 'POST',
                              CURLOPT_SSL_VERIFYHOST => 0,
                              CURLOPT_SSL_VERIFYPEER =>0,
                              CURLOPT_POSTFIELDS =>json_encode($search),
                              CURLOPT_HTTPHEADER => array(
                                'Content-Type: application/json'
                              ),
                            ));

                            $response = curl_exec($curl);
                            curl_close($curl);
                            
                            $year2011 = json_decode($response, true);
                            if($year2011['result']['count'] > 0){
                                $text2011 = (string)$year2011['result']['data'][0]['found_text'];
                                $pattern = '/Elector s Name\s+([A-Za-z ]+)/';
                                $arr = preg_match($pattern, $text2011, $matches);
                                $name2011 = isset($match) ? $matches[0] : '';
                                $address2011 = (string)$year2011['result']['data'][0]['found_text'];
                                $voterid2011 = (string)$year2011['result']['data'][0]['voter_details']['voter_id'];
                                $int_name = isset($name2011)?str_replace("Elector s Name","",$name2011):'Not Available';
                                array_push($match_name_array,$int_name);
                                $int_address = $address2011;
                                array_push($match_address_array,$int_address);
                                $int_num = $voterid2011;
                                array_push($match_number_array,$int_num);
                                if($name2011 == ''){
                                $int_type = 'Not Available';
                                }else{
                                $int_type = 'Voting Card';	
                                }
                                
                                array_push($match_type_array,$int_type);
                                $int_cont_no = 'Not Available';
                                array_push($match_const_array,$int_cont_no);
                                $int_sr_no = 'Not Available' ;
                                array_push($match_srno_array,$int_sr_no);
                                $int_part_no = 'Not Available';
                                array_push($match_part_array,$int_part_no);
                            }else{
                                $name2011 = 'Not Available';
                                $address2011 = 'Not Available';
                                $voterid2011 = 'Not Available';
                                $int_name = $name2011;
                                array_push($match_name_array,$int_name);
                                $int_address = $address2011;
                                array_push($match_address_array,$int_address);
                                $int_num = $voterid2011;
                                array_push($match_number_array,$int_num);
                                $int_type = 'Not Available';
                                array_push($match_type_array,$int_type);
                                $int_cont_no = 'Not Available';
                                array_push($match_const_array,$int_cont_no);
                                $int_sr_no = 'Not Available' ;
                                array_push($match_srno_array,$int_sr_no);
                                $int_part_no = 'Not Available';
                                array_push($match_part_array,$int_part_no);
                            }
                            
                            
                            

                            

                            
                        }

                 /*$int_name = isset($election_data[0]->elector_name) ? $election_data[0]->elector_name : 'No data Available';
                 $int_address = 'No data Available';
                 $int_num = 'No data Available';
                 $int_type = 'Voting Card';
                 $int_cont_no = isset($election_data[0]->cont_no) ? $election_data[0]->cont_no : '';
                 $int_sr_no = isset($election_data[0]->sr_no) ? $election_data[0]->sr_no : '';
                 $int_part_no = isset($election_data[0]->part_no) ? $election_data[0]->part_no : '';
                 */
                  $elector_name_new = isset($query4[0]->voter_name) ? $query4[0]->voter_name : 'Not Available';
                    array_push($match_name_array,$elector_name_new);
                    $elector_address_new = isset($query4[0]->address) ? $query4[0]->address : 'Not Available';
                    array_push($match_address_array,$elector_address_new);
                    $elector_num_new =  isset($query4[0]->voter_id) ? $query4[0]->voter_id : 'Not Available';
                    array_push($match_number_array,$elector_num_new);
                    $elector_const_new = isset($query4[0]->constitution_no) ? $query4[0]->constitution_no : 'Not Available';
                    array_push($match_const_array,$elector_const_new);
                    $elector_sr_new = isset($query4[0]->sr_no) ? $query4[0]->sr_no : 'Not Available';
                    array_push($match_srno_array,$elector_sr_new);
                    $elector_part_new = isset($query4[0]->part_no) ? $query4[0]->part_no : 'Not Available';
                    array_push($match_part_array,$elector_part_new);
                    if(isset($query4[0]->voter_name)){
                    	array_push($match_type_array,'Voting Card');		
                    }else{
                    	array_push($match_type_array,'Not Available');
                    }
                    
                    //print_r($match_type_array);
                    //For Name

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

                    if($highestPercentageName == 'Not Available')
                      $color_name = '#d2222d';

                
                    //For Address
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
                    
                    if($highestPercentageAddress == 'Not Available')
                      $color_address = '#d2222d';
                   

                   //For Number
                   
                   $highestPercentageOfNum = $per =0;
	                $highestPercentageNum = $match_string ="";
	                $res = array();
	                
	                
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_number_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfNum = $per;
	                  $highestPercentageNum = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfNum = $per;
	                  $highestPercentageNum = $match_str;
	                  }  
	                  if($per < 0){
	                  $highestPercentageOfNum = 0;
	                  $highestPercentageNum = $match_str;
	                  }
	                }
                    if($highestPercentageNum == 'Not Available') 
                  		$highestPercentageOfNum = 0;



                   
                   if($highestPercentageOfNum == 100 )
                     $color_num = '#238823';
                   elseif($highestPercentageOfNum >= 50)
                     $color_num = '#FFBF00';
                   else  
                     $color_num = '#d2222d';
                  
                    if($highestPercentageNum == 'Not Available')
                      $color_num = '#d2222d';


                    //For Type
                    $highestPercentageOfType = $per =0;
	                $highestPercentageType = $match_string ="";
	                $res = array();
	                
	                

	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_type_array);
	                
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

                    if($highestPercentageType == 'Not Available')
                      $color_type = '#d2222d';
                
                    //For Const
                   
                  	$highestPercentageOfconst = $per =0;
	                $highestPercentageConst = $match_string ="";
	                $res = array();
	                
	                //print_r($match_const_array);
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_const_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfconst = $per;
	                  $highestPercentageConst = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfconst = $per;
	                  $highestPercentageConst = $match_str;
	                  } 
	                  if($per < 0){
	                  $highestPercentageOfconst = 0;
	                  $highestPercentageConst = $match_str;
	                  } 
	                }
                    if($highestPercentageConst == 'Not Available') 
                  		$highestPercentageOfconst = 0;

                    
                    if($highestPercentageOfconst == 100 )
                      $color_const = '#238823';
                    elseif($highestPercentageOfconst >= 50)
                      $color_const = '#FFBF00';
                    else  
                      $color_const = '#d2222d';

                    if($highestPercentageConst == 'Not Available')
                      $color_const = '#d2222d';

                    
                    //For SR
                    $highestPercentageOfSrno = $per =0;
	                $highestPercentageSr = $match_string ="";
	                $res = array();
	                
	                
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_srno_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfSrno = $per;
	                  $highestPercentageSr = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfSrno = $per;
	                  $highestPercentageSr = $match_str;
	                  } 
	                  if($per < 0){
	                  $highestPercentageOfSrno = 0;
	                  $highestPercentageSr = $match_str;
	                  } 
	                }
                    if($highestPercentageSr == 'Not Available') 
                  		$highestPercentageOfSrno = 0;

                    
                    if($highestPercentageOfSrno == 100 )
                      $color_sr = '#238823';
                    elseif($highestPercentageOfSrno >= 50)
                      $color_sr = '#FFBF00';
                    else  
                      $color_sr = '#d2222d';
                    
                    if($highestPercentageSr == 'Not Available')
                      $color_sr = '#d2222d';
                    
                    //For Part
                   	$highestPercentageOfPart = $per =0;
	                $highestPercentagePart = $match_string ="";
	                $res = array();
	                
	                
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_part_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfPart = $per;
	                  $highestPercentagePart = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfPart = $per;
	                  $highestPercentagePart = $match_str;
	                  } 
	                  if($per < 0){
	                  $highestPercentageOfPart = 0;
	                  $highestPercentagePart = $match_str;
	                  } 
	                }
                    if($highestPercentagePart == 'Not Available') 
                  		$highestPercentageOfPart = 0;

                    if($highestPercentageOfPart == 100 )
                      $color_part = '#238823';
                    elseif($highestPercentageOfPart >= 50)
                      $color_part = '#FFBF00';
                    else  
                      $color_part = '#d2222d';
                      
                    if($highestPercentagePart == 'Not Available')
                      $color_part = '#d2222d';
                    
                ?>
     

                                <!-- Year 2000 start -->

                                <div class="col-md-12">
                                    
                                    <br/>
                            <div class="row">

                              <div class="col-md-9">
                                    <h4>SIMS Data</h4>
                                    <div class="card">
                                      <div class="card-body">
                                        <div class="table-responsive" id="sra-table">
                                          <table class="table table-borderless table-responsive">
                                            <thead>
                                              <tr>
                                                <th width="10%">Owner Name</th>
                                                <th width="20%">Address </th>
                                                <th width="10%">Elector Number</th>
                                                <th width="10%">Document Type</th>
                                                <th width="10%">Constitution No.</th>
                                                <th width="10%">Sr No.</th>
                                                <th width="10%">Part No.</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                              <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td width="10%"><?php echo e($data->HUTOWNERNAME); ?></td>
                                                <td width="20%"><?php echo e($data->Address); ?> </td>
                                                <td width="10%">Not Available </td>
                                                <td width="10%">Voting Card</td>
                                                <td width="10%">Not Available </td>
                                                <td width="10%">Not Available </td>
                                                <td width="10%">Not Available </td>
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
                                                <th width="10%">Owner Name</th>
                                                <th width="20%">Address </th>
                                                <th width="10%">Elector Number</th>
                                                <th width="10%">Document Type</th>
                                                <th width="10%">Constitution No.</th>
                                                <th width="10%">Sr No.</th>
                                                <th width="10%">Part No.</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php

                                              // if()
                                              // print_r($query4);
                                              if(count($query4)>=1){

                                            foreach($query4 as $voter) {
                                              

                                              echo "<tr>";
                                              echo "<td width='10%'>" . (isset($voter->voter_name) ? $voter->voter_name : 'Not Available') . "</td>";
                                              echo "<td width='20%'>" . (isset($voter->address) ? $voter->address : 'Not Available') . "</td>";
                                              echo "<td width='10%'>" . (isset($voter->voter_id) ? $voter->voter_id : 'Not Available') . "</td>";
                                              echo "<td width='10%'>".(isset($voter->voter_name) ? 'Voting Card' : 'Not Available')."</td>";
                                              echo "<td width='10%'>" . (isset($voter->constitution_no) ? $voter->constitution_no : 'Not Available') . "</td>";
                                              echo "<td width='10%'>" . (isset($voter->sr_no) ? $voter->sr_no : 'Not Available') . "</td>";
                                              echo "<td width='10%'>" . (isset($voter->part_no) ? $voter->part_no : 'Not Available') . "</td>";
                                              echo "</tr>";
                                            }   
                                          }
                                          else{
                                            echo "<tr>";
                                            echo "<td width='10%'>Not Available</td>";
                                            echo "<td width='20%'>Not Available</td>";
                                            echo "<td width='10%'>Not Available</td>";
                                            echo "<td width='10%'>Not Available</td>";
                                            echo "<td width='10%'>Not Available</td>";
                                            echo "<td width='10%'>Not Available</td>";
                                            echo "<td width='10%'>Not Available</td>";
                                            echo "</tr>";
                  
                                          }     
                                            ?>

                                          

                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                    <div class="col-md-3">
                                     <!-- image start-->
                 <div class="card">
                          <div class="card-body">
                          <?php 
                            if(count($query4)==1){
                            ?>
                            <img src="http://sra-uat.apniamc.in/images/<?php echo e($hid); ?>_voter_id2.jpeg" style="height:320px;width:100%;" id="myImg" onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';">
                            <?php }else{ ?>
                              <img src="http://sra-uat.apniamc.in/images/noimage.jpg" style="height:320px;width:100%;" >
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
                            img.onclick = function(){
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
                          </div>
                        </div>

                                   

                                     
                                <h4>Integration Data</h4>
                                <div class="card">
                                  <div class="card-body">
                                    <div class="table-responsive" id="sra-table">
                                      <table class="table table-borderless table-responsive">
                                        <thead>
                                          <tr>
                                            <th width="10%">Owner Name</th>
                                            <th width="20%">Address </th>
                                            <th width="10%">Elector Number</th>
                                            <th width="10%">Document Type</th>
                                            <th width="10%">Constitution No.</th>
                                            <th width="10%">Sr No.</th>
                                            <th width="10%">Part No.</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                         
                                       
                                             
                                      
                                                <tr>
                                                  <td width="10%"><?php echo e(isset($name2011)?str_replace("Elector s Name","",$name2011):'Not Available'); ?></td>
                                                  <td width="20%"><?php echo e(isset($address2011)?$address2011:'Not Available'); ?> </td>
                                                  <td width="10%"><?php echo e(isset($voterid2011)?$voterid2011:'Not Available'); ?></td>
                                                  <td width="10%">
                                                  	<?php if(isset($name2011)){
			                                    		if($name2011 != '' && $name2011 != 'Not Available'){
			                                    			echo "Voting Card";
			                                    		}else{
			                                    			echo "Not Available";
			                                    		}
			                                    	}else{
			                                    		echo "Not Available";
			                                    	}
			                                    	?>
                                                  </td>
                                                  <td width="10%">Not Available</td>
                                                  <td width="10%">Not Available</td>
                                                  <td width="10%">Not Available</td>
                                                  
                                                </tr>
                                                
                                               

                                                 



                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>

                 <!-- Recomendatioon start -->
                 <h4>Recommendation by Vendor</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                        <thead>
                            <tr>
                              <th width="10%" style="background:<?= $color_name; ?>;color:#fff;">Owner Name(<?php echo e(round($highestPercentageOfName)); ?>%)</th>
                              <th width="20%" style="background:<?= $color_address; ?>;color:#fff;">Address(<?php echo e(round($highestPercentageOfAddress)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_num; ?>;color:#fff;">Elector Number(<?php echo e(round($highestPercentageOfNum)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_type; ?>;color:#fff;">Document Type(<?php echo e(round($highestPercentageOfType)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_const; ?>;color:#fff;">Constitution No.(<?php echo e(round($highestPercentageOfconst)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_sr; ?>;color:#fff;">Sr No.(<?php echo e(round($highestPercentageOfSrno)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_part; ?>;color:#fff;">Part No.(<?php echo e(round($highestPercentageOfPart)); ?>%)</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td width="10%"><?= ucfirst($highestPercentageName); ?></td>
                              <td width="10%"><?= ucfirst($highestPercentageAddress); ?></td>
                              <td width="10%"><?= strtoupper($highestPercentageNum); ?></td>
                              <td width="10%"><?= $highestPercentageType; ?></td>
                              <td width="10%"><?= $highestPercentageConst; ?></td>
                              <td width="10%"><?= $highestPercentageSr; ?></td>
                              <td width="10%"><?= $highestPercentagePart; ?></td>
                            </tr>    
                          </tbody>

                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark_election')); ?>">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="2">
                          <input type="hidden" name="user" value="vendor">
                          <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">

                          <!-- <tr>
                            <td colspan="7"><hr/><b>Eligible / Not Eligible :</b></td>
                          </tr> -->
                          <tr>
                            <?php if (isset($data_2000_2011) ) { ?>
                                    <td>
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
                                     <td width="10%">
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
                                      if($data_2000_2011->eligibility_number == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_number == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_number == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_type == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_type == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_type == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_const_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_const_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_const_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_sr_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_sr_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_sr_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_part_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_part_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_part_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                          <?php } ?>
                          </tr>
                          <tr>
                            <td colspan="7"><hr/><b>Remark :</b></td>
                          </tr>
                          <tr>
                                <td width="10%">
                                    <?php if(isset($data_2000_2011->remark_name)): ?>
                                        <span><?php echo e($data_2000_2011->remark_name); ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark1" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="20%">
                                    <?php if(isset($data_2000_2011->remark_address)): ?>
                                        <span><?php echo e($data_2000_2011->remark_address); ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark2" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_2000_2011->remark_number)): ?>
                                        <span><?php echo e($data_2000_2011->remark_number); ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark3" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_2000_2011->remark_type)): ?>
                                        <span><?php echo e($data_2000_2011->remark_type); ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark4" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_2000_2011->remark_const_no)): ?>
                                        <span><?php echo e($data_2000_2011->remark_const_no); ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark5" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_2000_2011->remark_sr_no)): ?>
                                        <span><?php echo e($data_2000_2011->remark_sr_no); ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark6" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_2000_2011->remark_part_no)): ?>
                                        <span><?php echo e($data_2000_2011->remark_part_no); ?></span>
                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark7" value="" <?= $access ?>>
                                    <?php endif; ?>
                                </td>
                            </tr>

                            <tr>
                          <td colspan="7"><hr/></td>
                        </tr>
                          <tr>
                            <td ><b>Section Status :</b></td>
                            <td ><b>Section Remark :</b></td>
                            <?php

                            if(count($query4)>0){
                                $remark2 = "Election Document with ID ". $query4[0]->voter_id." and address " .$query4[0]->address;
                            }else{
                                $remark2 = "";
                            }
                        ?>
                            
                          </tr>
                          <tr>
                            <td width="10%">
                                <?php if(isset($data_2000_2011->overall_eligibility)): ?>
                                    <?php if($data_2000_2011->overall_eligibility == 1): ?>
                                    Verified
                                    <?php elseif($data_2000_2011->overall_eligibility == 2): ?>
                                    Not Matched
                                    <?php elseif($data_2000_2011->overall_eligibility == 3): ?>
                                    Unavailable
                                    <?php endif; ?>
                                <?php else: ?>
                                    <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                        <option value="0">-- Select Option --</option>
                                        <option value="1" <?php echo e(isset($data_2000_2011->overall_eligibility) && ($data_2000_2011->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                                        <option value="2" <?php echo e(isset($data_2000_2011->overall_eligibility) && ($data_2000_2011->overall_eligibility == 2) ? 'selected' : ''); ?>>Not Matched</option>
                                        <option value="3" <?php echo e(isset($data_2000_2011->overall_eligibility) && ($data_2000_2011->overall_eligibility == 3) ? 'selected' : ''); ?>>Unavailable</option>
                                    </select>
                                <?php endif; ?>
                            </td> 
                            <td width="10%" colspan="6">
                                <?php if(isset($data_2000_2011->overall_remark)): ?>
                                    <?php echo e($data_2000_2011->overall_remark); ?>

                                <?php else: ?>
                                <textarea class="form-control" style="height:auto!important;"  name="remark" <?php echo e(isset($data_2000_2011->overall_remark) ? 'readonly' : ''); ?> cols="100"><?php echo e(isset($data_2000_2011->overall_remark) ? $data_2000_2011->overall_remark : $remark2); ?></textarea>                                <?php endif; ?>
                            </td>
                        </tr>

                              <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                                <?php if(!isset($data_2000_2011->overall_remark)): ?>
                                  <td colspan="6"><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
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
                        <thead>
                          <tr>
                            <th width="10%" style="background:<?= $color_name; ?>;color:#fff;">Owner Name(<?php echo e(round($highestPercentageOfName)); ?>%)</th>
                              <th width="20%" style="background:<?= $color_address; ?>;color:#fff;">Address(<?php echo e(round($highestPercentageOfAddress)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_num; ?>;color:#fff;">Elector Number(<?php echo e(round($highestPercentageOfNum)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_type; ?>;color:#fff;">Document Type(<?php echo e(round($highestPercentageOfType)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_const; ?>;color:#fff;">Constitution No.(<?php echo e(round($highestPercentageOfconst)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_sr; ?>;color:#fff;">Sr No.(<?php echo e(round($highestPercentageOfSrno)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_part; ?>;color:#fff;">Part No.(<?php echo e(round($highestPercentageOfPart)); ?>%)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="10%"><?= $highestPercentageName; ?></td>
                            <td width="10%"><?= $highestPercentageAddress; ?></td>
                            <td width="10%"><?= $highestPercentageNum; ?></td>
                            <td width="10%"><?= $highestPercentageType; ?></td>
                            <td width="10%"><?= $highestPercentageConst; ?></td>
                            <td width="10%"><?= $highestPercentageSr; ?></td>
                            <td width="10%"><?= $highestPercentagePart; ?></td>
                          </tr>    
                        </tbody>
        
                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark_election')); ?>">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="2">
                          <input type="hidden" name="user" value="ca">
                          <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                        <!-- <tr>
                          <td colspan="7"><hr/><b>Eligible / Not Eligible :</b></td>
                        </tr>
                        <tr> -->
                        <tr>
                          <?php if (isset($data_2000_2011_ca) ) { ?>
                                    <td>
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
                                     <td width="10%">
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
                                      if($data_2000_2011_ca->eligibility_number == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_number == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_number == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_type == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_type == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_type == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_const_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_const_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_const_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_sr_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_sr_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_sr_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_part_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_part_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_part_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                          <?php } ?>
                          </tr>
                        <tr>
                          <td colspan="7"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                            <td width="10%">
                                <?php if(isset($data_2000_2011_ca->remark_name)): ?>
                                    <?php echo e($data_2000_2011_ca->remark_name); ?>

                                <?php else: ?>
                                    <input type="text" class="form-control" name="remark1_ca" value="">
                                <?php endif; ?>
                            </td>
                            <td width="20%">
                                <?php if(isset($data_2000_2011_ca->remark_address)): ?>
                                    <?php echo e($data_2000_2011_ca->remark_address); ?>

                                <?php else: ?>
                                    <input type="text" class="form-control" name="remark2_ca" value="">
                                <?php endif; ?>
                            </td>
                            <td width="10%">
                                <?php if(isset($data_2000_2011_ca->remark_number)): ?>
                                    <?php echo e($data_2000_2011_ca->remark_number); ?>

                                <?php else: ?>
                                    <input type="text" class="form-control" name="remark3_ca" value="">
                                <?php endif; ?>
                            </td>
                            <td width="10%">
                                <?php if(isset($data_2000_2011_ca->remark_type)): ?>
                                    <?php echo e($data_2000_2011_ca->remark_type); ?>

                                <?php else: ?>
                                    <input type="text" class="form-control" name="remark4_ca" value="">
                                <?php endif; ?>
                            </td>
                            <td width="10%">
                                <?php if(isset($data_2000_2011_ca->remark_const_no)): ?>
                                    <?php echo e($data_2000_2011_ca->remark_const_no); ?>

                                <?php else: ?>
                                    <input type="text" class="form-control" name="remark5_ca" value="">
                                <?php endif; ?>
                            </td>
                            <td width="10%">
                                <?php if(isset($data_2000_2011_ca->remark_sr_no)): ?>
                                    <?php echo e($data_2000_2011_ca->remark_sr_no); ?>

                                <?php else: ?>
                                    <input type="text" class="form-control" name="remark6_ca" value="">
                                <?php endif; ?>
                            </td>
                            <td width="10%">
                                <?php if(isset($data_2000_2011_ca->remark_part_no)): ?>
                                    <?php echo e($data_2000_2011_ca->remark_part_no); ?>

                                <?php else: ?>
                                    <input type="text" class="form-control" name="remark7_ca" value="">
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                          <td colspan="7"><hr/></td>
                        </tr>
                          <tr>
                            <td ><b>Section Status :</b></td>
                            <td ><b>Section Remark :</b></td>
                             
                          </tr>
                          <tr>
                        <td width="10%">
                          <?php if(isset($data_2000_2011_ca->overall_eligibility)): ?>
                            <?php echo e($data_2000_2011_ca->overall_eligibility == 1 ? 'Verified' : ($data_2000_2011_ca->overall_eligibility == 2 ? 'Not Matched' : 'Unavailable')); ?>

                          <?php else: ?>
                            <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" <?php echo e(isset($data_2000_2011_ca->overall_eligibility) && ($data_2000_2011_ca->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                              <option value="2" <?php echo e(isset($data_2000_2011_ca->overall_eligibility) && ($data_2000_2011_ca->overall_eligibility == 2) ? 'selected' : ''); ?>> Not Matched</option>
                              <option value="3" <?php echo e(isset($data_2000_2011_ca->overall_eligibility) && ($data_2000_2011_ca->overall_eligibility == 3) ? 'selected' : ''); ?>> Unavailable</option>
                            </select>
                          <?php endif; ?>
                        </td> 
                        <td width="10%" colspan="6">
                          <?php if(isset($data_2000_2011_ca->overall_remark)): ?>
                            <?php echo e($data_2000_2011_ca->overall_remark); ?>

                          <?php else: ?>
                          <textarea class="form-control" style="height:auto!important;"  name="remark" cols="100"><?php echo e(isset($data_2000_2011_ca->overall_remark) ? $data_2000_2011_ca->overall_remark : $remark2); ?></textarea>
                           <?php endif; ?>
                        </td>
                      </tr>

                        <tr>
                         
                            <?php if(!isset($data_2000_2011_ca->overall_remark)): ?>
                              <td colspan="6"><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                            <?php endif; ?>
                          
                        </tr>

                        </tbody>
                      </table>
                         </form>
                    </div>
                  </div>
                </div>
                <?php endif; ?>                         

                <!-- Recmmenatioon End -->
              </div>
                            <!-- content end -->
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
                            <!-- content start-->
                            <?php
                            $match_name_array = $match_address_array = $match_number_array = $match_type_array = $match_const_array = $match_srno_array = $match_part_array = array();
                 foreach($query as $data)
                 {
                   $name_sims = $data->HUTOWNERNAME;
                      array_push($match_name_array,$data->HUTOWNERNAME);
                      $address_sims = $data->Address;
                      array_push($match_address_array,$data->Address);
                      $num_sims = 'Not Available';
                      array_push($match_number_array,'Not Available');
                      $type_sims = 'Voting Card';
                      array_push($match_type_array,'Voting Card');
                      $cont_no_sims = 'Not Available';
                      array_push($match_const_array,'Not Available');
                      $sr_no_sims = 'Not Available';
                      array_push($match_srno_array,'Not Available');
                      $part_no_sims = 'Not Available';
                      array_push($match_part_array,'Not Available');


                 }

                 $match_name  = $match_address = $match_num = $match_type = $match_const = $match_sr = $match_part = array();
                  $namecurrent1 = $addresscurrent = $voteridcurrent = $int_name = $int_address = $int_num = $int_cont_no = $int_sr_no = $int_part_no = $int_type ='Not Available'; 
                 foreach($query5 as $voter) {
                            //curl start

                            $namecurrent = $voter->voter_name;
                            $elector_name = "(".$namecurrent.")";
                            $search = array('search' => $elector_name);
                            $search_string = json_encode($search);
                           
                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                              CURLOPT_URL => 'https://docbrains.in/api/search/public?organization=election',
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => '',
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 0,
                              CURLOPT_FOLLOWLOCATION => true,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => 'POST',
                              CURLOPT_SSL_VERIFYHOST => 0,
                              CURLOPT_SSL_VERIFYPEER =>0,
                              CURLOPT_POSTFIELDS =>json_encode($search),
                              CURLOPT_HTTPHEADER => array(
                                'Content-Type: application/json'
                              ),
                            ));

                            $response = curl_exec($curl);
                            curl_close($curl);
                            
                            $yearcurrent = json_decode($response, true);
                            if($yearcurrent['result']['count'] > 0){
                                $textcurrent = (string)$yearcurrent['result']['data'][0]['found_text'];
                                $pattern = '/Elector s Name\s+([A-Za-z ]+)/';
                                $arr = preg_match($pattern, $textcurrent, $matches);
                                $namecurrent = isset($match) ? $matches[0] : '';
                                $addresscurrent = (string)$yearcurrent['result']['data'][0]['found_text'];
                                $voteridcurrent = (string)$yearcurrent['result']['data'][0]['voter_details']['voter_id'];
                                $int_name = isset($namecurrent)?str_replace("Elector s Name","",$namecurrent):'Not Available';
                                array_push($match_name_array,$int_name);
                                $int_address = $addresscurrent;
                                array_push($match_address_array,$int_address);
                                $int_num = $voteridcurrent;
                                array_push($match_number_array,$int_num);
                                if($namecurrent == ''){
                                $int_type = 'Not Available';
                                }else{
                                $int_type = 'Voting Card';	
                                }
                                array_push($match_type_array,$int_type);
                                $int_cont_no = 'Not Available';
                                array_push($match_const_array,$int_cont_no);
                                $int_sr_no = 'Not Available' ;
                                array_push($match_srno_array,$int_sr_no);
                                $int_part_no = 'Not Available';
                                array_push($match_part_array,$int_part_no);
                            }else{
                                $namecurrent = 'Not Available';
                                $addresscurrent = 'Not Available';
                                $voteridcurrent = 'Not Available';
                                $int_name = $namecurrent;
                                array_push($match_name_array,$int_name);
                                $int_address = $addresscurrent;
                                array_push($match_address_array,$int_address);
                                $int_num = $voteridcurrent;
                                array_push($match_number_array,$int_num);
                                $int_type = 'Not Available';
                                array_push($match_type_array,$int_type);
                                $int_cont_no = 'Not Available';
                                array_push($match_const_array,$int_cont_no);
                                $int_sr_no = 'Not Available' ;
                                array_push($match_srno_array,$int_sr_no);
                                $int_part_no = 'Not Available';
                                array_push($match_part_array,$int_part_no);
                            }

                        }
                 
                 $elector_name_new = isset($query5[0]->voter_name) ? $query5[0]->voter_name : 'Not Available';
                    array_push($match_name_array,$elector_name_new);
                    $elector_address_new = isset($query5[0]->address) ? $query5[0]->address : 'Not Available';
                    array_push($match_address_array,$elector_address_new);
                    $elector_num_new =  isset($query5[0]->voter_id) ? $query5[0]->voter_id : 'Not Available';
                    array_push($match_number_array,$elector_num_new);
                    $elector_const_new = isset($query5[0]->constitution_no) ? $query5[0]->constitution_no : 'Not Available';
                    array_push($match_const_array,$elector_const_new);
                    $elector_sr_new = isset($query5[0]->sr_no) ? $query5[0]->sr_no : 'Not Available';
                    array_push($match_srno_array,$elector_sr_new);
                    $elector_part_new = isset($query5[0]->part_no) ? $query5[0]->part_no : 'Not Available';
                    array_push($match_part_array,$elector_part_new);
                    if(isset($query5[0]->voter_name)){
                    	if($query5[0]->voter_name == ""){
                    		array_push($match_type_array,'Not Available');	
                    	}else{
                    		array_push($match_type_array,'Voting Card');		
                    	}	
                    }else{
                    	array_push($match_type_array,'Not Available');
                    }
                  //For Name

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

                    if($highestPercentageName == 'Not Available')
                      $color_name = '#d2222d';

                
                    //For Address
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
                    
                    if($highestPercentageAddress == 'Not Available')
                      $color_address = '#d2222d';
                   

                   //For Number
                   
                   $highestPercentageOfNum = $per =0;
	                $highestPercentageNum = $match_string ="";
	                $res = array();
	                
	                
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_number_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfNum = $per;
	                  $highestPercentageNum = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfNum = $per;
	                  $highestPercentageNum = $match_str;
	                  }  
	                  if($per < 0){
	                  $highestPercentageOfNum = 0;
	                  $highestPercentageNum = $match_str;
	                  }
	                }
                    if($highestPercentageNum == 'Not Available') 
                  		$highestPercentageOfNum = 0;



                   
                   if($highestPercentageOfNum == 100 )
                     $color_num = '#238823';
                   elseif($highestPercentageOfNum >= 50)
                     $color_num = '#FFBF00';
                   else  
                     $color_num = '#d2222d';
                  
                    if($highestPercentageNum == 'Not Available')
                      $color_num = '#d2222d';


                    //For Type
                    $highestPercentageOfType = $per =0;
	                $highestPercentageType = $match_string ="";
	                $res = array();
	                
	                

	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_type_array);
	                
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

                    if($highestPercentageType == 'Not Available')
                      $color_type = '#d2222d';
                
                    //For Const
                   
                  	$highestPercentageOfconst = $per =0;
	                $highestPercentageConst = $match_string ="";
	                $res = array();
	                
	                //print_r($match_const_array);
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_const_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfconst = $per;
	                  $highestPercentageConst = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfconst = $per;
	                  $highestPercentageConst = $match_str;
	                  }  
	                  if($per < 0){
	                  $highestPercentageOfconst = 0;
	                  $highestPercentageConst = $match_str;
	                  }
	                }
                    if($highestPercentageConst == 'Not Available') 
                  		$highestPercentageOfconst = 0;

                    
                    if($highestPercentageOfconst == 100 )
                      $color_const = '#238823';
                    elseif($highestPercentageOfconst >= 50)
                      $color_const = '#FFBF00';
                    else  
                      $color_const = '#d2222d';

                    if($highestPercentageConst == 'Not Available')
                      $color_const = '#d2222d';

                    
                    //For SR
                    $highestPercentageOfSrno = $per =0;
	                $highestPercentageSr = $match_string ="";
	                $res = array();
	                
	                
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_srno_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfSrno = $per;
	                  $highestPercentageSr = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfSrno = $per;
	                  $highestPercentageSr = $match_str;
	                  } 
	                  if($per < 0){
	                  $highestPercentageOfSrno = 0;
	                  $highestPercentageSr = $match_str;
	                  } 
	                }
                    if($highestPercentageSr == 'Not Available') 
                  		$highestPercentageOfSrno = 0;

                    
                    if($highestPercentageOfSrno == 100 )
                      $color_sr = '#238823';
                    elseif($highestPercentageOfSrno >= 50)
                      $color_sr = '#FFBF00';
                    else  
                      $color_sr = '#d2222d';
                    
                    if($highestPercentageSr == 'Not Available')
                      $color_sr = '#d2222d';
                    
                    //For Part
                   	$highestPercentageOfPart = $per =0;
	                $highestPercentagePart = $match_string ="";
	                $res = array();
	                
	                
	                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_part_array);
	               // print_r($res);
	                $match_str = $res['match_string'];$per = $res['percentage'];
	                if(count($res) > 0){
	                  if($per > 0){
	                  $highestPercentageOfPart = $per;
	                  $highestPercentagePart = $match_str;
	                  }
	                  if($per == 0){
	                  $highestPercentageOfPart = $per;
	                  $highestPercentagePart = $match_str;
	                  } 
	                  if($per < 0){
	                  $highestPercentageOfPart = 0;
	                  $highestPercentagePart = $match_str;
	                  } 
	                }
                    if($highestPercentagePart == 'Not Available') 
                  		$highestPercentageOfPart = 0;

                    if($highestPercentageOfPart == 100 )
                      $color_part = '#238823';
                    elseif($highestPercentageOfPart >= 50)
                      $color_part = '#FFBF00';
                    else  
                      $color_part = '#d2222d';
                      
                    if($highestPercentagePart == 'Not Available')
                      $color_part = '#d2222d';
                    
                ?>
              <!-- Year 2000 start -->
              <div class="col-md-12">
                
                <br/>
                <div class="row">

                <div class="col-md-9">
                <h4>SIMS Data</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Elector Number</th>
                            <th width="10%">Document Type</th>
                            <th width="10%">Constitution No.</th>
                            <th width="10%">Sr No.</th>
                            <th width="10%">Part No.</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <td width="10%"><?php echo e($data->HUTOWNERNAME); ?></td>
                              <td width="20%"><?php echo e($data->Address); ?> </td>
                              <td width="10%">Not Available </td>
                              <td width="10%">Voting Card </td>
                              <td width="10%">Not Available </td>
                              <td width="10%">Not Available </td>
                              <td width="10%">Not Available </td>
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
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Elector Number</th>
                            <th width="10%">Document Type</th>
                            <th width="10%">Constitution No.</th>
                            <th width="10%">Sr No.</th>
                            <th width="10%">Part No.</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          if(count($query5)>=1)
                          {
                          foreach($query5 as $voter) {
                            echo "<tr>";
                            echo "<td width='10%'>" . (isset($voter->voter_name) ? $voter->voter_name : 'Not available') . "</td>";
                            echo "<td width='20%'>" . (isset($voter->address) ? $voter->address : 'Not available') . "</td>";
                            echo "<td width='10%'>" . (isset($voter->voter_id) ? $voter->voter_id : 'Not available') . "</td>";
                            echo "<td width='10%'>".(isset($voter->voter_name) ? 'Voting Card' : 'Not Available')."</td>";
                            echo "<td width='10%'>" . (isset($voter->constitution_no) ? $voter->constitution_no : 'Not available') . "</td>";
                            echo "<td width='10%'>" . (isset($voter->sr_no) ? $voter->sr_no : 'Not available') . "</td>";
                            echo "<td width='10%'>" . (isset($voter->part_no) ? $voter->part_no : 'Not available') . "</td>";
                            echo "</tr>";
                          }    
                        }  
                        else{
                          echo "<tr>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "<td width='20%'>Not Available</td>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "<td width='10%'>Not Available</td>";
                          echo "</tr>";

                        }                  
                          
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
            
                <div class="col-md-3">
                      <!-- image start-->
                      <div class="card">
                          <div class="card-body">
                            <?php 
                            if(count($query5)==1){
                            ?>
                            <img src="http://sra-uat.apniamc.in/images/<?php echo e($hid); ?>_voter_id3.jpeg" style="height:320px;width:100%;" id="myImg" onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';">
                            <?php }else{ ?>
                              <img src="http://sra-uat.apniamc.in/images/noimage.jpg" style="height:320px;width:100%;" >
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
                            img.onclick = function(){
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
                  </div>
                </div>
                 
                 <h4>Integration Data</h4>
                 <div class="card">
                   <div class="card-body">
                     <div class="table-responsive" id="sra-table">
                       <table class="table table-borderless table-responsive">
                         <thead>
                           <tr>
                             <th width="10%">Owner Name</th>
                             <th width="20%">Address </th>
                             <th width="10%">Elector Number</th>
                             <th width="10%">Document Type</th>
                             <th width="10%">Constitution No.</th>
                             <th width="10%">Sr No.</th>
                             <th width="10%">Part No.</th>
                           </tr>
                         </thead>
                         <tbody>
                           <?php
                         //   $count1 = $showData1 = 0;
                         //   foreach ($new_result as $key => $result)
                             // {
                          // print_r($election_data);
                         //if(isset($election_data[0]) && $election_no != ''){
                             // print_r($election_data[0]);die;
                     ?>

                                  <tr>
                                    <td width="10%"><?php echo e(isset($namecurrent)?str_replace("Elector s Name","",$namecurrent):'Not Available'); ?></td>
                                    <td width="20%"><?php echo e(isset($addresscurrent)?$addresscurrent:'Not Available'); ?> </td>
                                    <td width="10%"><?php echo e(isset($voteridcurrent)?$voteridcurrent:'Not Available'); ?></td>
                                    <td width="10%">
                                    	<?php if(isset($namecurrent)){
                                    		if($namecurrent != '' && $namecurrent != 'Not Available'){
                                    			echo "Voting Card";
                                    		}else{
                                    			echo "Not Available";
                                    		}
                                    	}else{
                                    		echo "Not Available";
                                    	}
                                    	?>
                                    </td>
                                    <td width="10%">Not Available</td>
                                    <td width="10%">Not Available</td>
                                    <td width="10%">Not Available</td>

                                    
                                  </tr>

                                   <?php  //} ?>



                         </tbody>
                       </table>
                     </div>
                   </div>
                 </div>

                <!-- Recomendatioon start -->
                <h4>Recommendation by Vendor</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                        <thead>
                            <tr>
                              <th width="10%" style="background:<?= $color_name; ?>;color:#fff;">Owner Name(<?php echo e(round($highestPercentageOfName)); ?>%)</th>
                              <th width="20%" style="background:<?= $color_address; ?>;color:#fff;">Address(<?php echo e(round($highestPercentageOfAddress)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_num; ?>;color:#fff;">Elector Number(<?php echo e(round($highestPercentageOfNum)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_type; ?>;color:#fff;">Document Type(<?php echo e(round($highestPercentageOfType)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_const; ?>;color:#fff;">Constitution No.(<?php echo e(round($highestPercentageOfconst)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_sr; ?>;color:#fff;">Sr No.(<?php echo e(round($highestPercentageOfSrno)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_part; ?>;color:#fff;">Part No.(<?php echo e(round($highestPercentageOfPart)); ?>%)</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td width="10%"><?= $highestPercentageName; ?></td>
                              <td width="10%"><?= $highestPercentageAddress; ?></td>
                              <td width="10%"><?= $highestPercentageNum; ?></td>
                              <td width="10%"><?= $highestPercentageType; ?></td>
                              <td width="10%"><?= $highestPercentageConst; ?></td>
                              <td width="10%"><?= $highestPercentageSr; ?></td>
                              <td width="10%"><?= $highestPercentagePart; ?></td>
                            </tr>    
                          </tbody>

                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark_election')); ?>">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="3">
                          <input type="hidden" name="user" value="vendor">
                          <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                        <!-- <tr>
                          <td colspan="7"><hr/><b>Eligible / Not Eligible :</b></td>
                        </tr>
                        <tr> -->
                        <tr>
                          <?php if (isset($data_current) ) { ?>
                                    <td>
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
                                     <td width="10%">
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
                                      if($data_current->eligibility_number == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_number == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_number == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_type == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_type == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_type == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_const_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_const_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_const_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_sr_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_sr_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_sr_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_part_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_part_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_part_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                          <?php } ?>
                          </tr>
                        <tr>
                          <td colspan="7"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                              <td width="10%">
                                  <?php if(isset($data_current->remark_name)): ?>
                                      <?php echo e($data_current->remark_name); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark1" value="" <?= $access ?>>
                                  <?php endif; ?>
                              </td>
                              <td width="20%">
                                  <?php if(isset($data_current->remark_address)): ?>
                                      <?php echo e($data_current->remark_address); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark2" value="" <?= $access ?>>
                                  <?php endif; ?>
                              </td>
                              <td width="10%">
                                  <?php if(isset($data_current->remark_number)): ?>
                                      <?php echo e($data_current->remark_number); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark3" value="" <?= $access ?>>
                                  <?php endif; ?>
                              </td>
                              <td width="10%">
                                  <?php if(isset($data_current->remark_type)): ?>
                                      <?php echo e($data_current->remark_type); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark4" value="" <?= $access ?>>
                                  <?php endif; ?>
                              </td>
                              <td width="10%">
                                  <?php if(isset($data_current->remark_const_no)): ?>
                                      <?php echo e($data_current->remark_const_no); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark5" value="" <?= $access ?>>
                                  <?php endif; ?>
                              </td>
                              <td width="10%">
                                  <?php if(isset($data_current->remark_sr_no)): ?>
                                      <?php echo e($data_current->remark_sr_no); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark6" value="" <?= $access ?>>
                                  <?php endif; ?>
                              </td>
                              <td width="10%">
                                  <?php if(isset($data_current->remark_part_no)): ?>
                                      <?php echo e($data_current->remark_part_no); ?>

                                  <?php else: ?>
                                      <input type="text" class="form-control" name="remark7" value="" <?= $access ?>>
                                  <?php endif; ?>
                              </td>
                        </tr>
                        <tr>
                          <td colspan="7"><hr/></td>
                        </tr>
                          <tr>
                            <td ><b>Section Status :</b></td>
                            <td ><b>Section Remark :</b></td>
                            <?php

                            if(count($query5)>0){
                                $remark3 = "Election Document with ID ". $query5[0]->voter_id." and address " .$query5[0]->address;
                            }else{
                                $remark3 = "";
                            }
                        ?>
                            
                          </tr>
                          <tr>
                            <td width="10%">
                              <?php if(isset($data_current->overall_eligibility)): ?>
                                <!-- <?php echo e($data_current->overall_remark); ?> -->
                                <?php echo e($data_current->overall_eligibility === 1 ? 'Verified' : ($data_current->overall_eligibility === 2 ? ' Not Matched' : ' Unavailable')); ?>


                              <?php else: ?>
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" <?php echo e(isset($data_current->overall_eligibility) && ($data_current->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                                  <option value="2" <?php echo e(isset($data_current->overall_eligibility) && ($data_current->overall_eligibility == 2) ? 'selected' : ''); ?>> Not Matched</option>
                                  <option value="3" <?php echo e(isset($data_current->overall_eligibility) && ($data_current->overall_eligibility == 3) ? 'selected' : ''); ?>> Unavailable</option>
                                </select>
                              <?php endif; ?>
                            </td> 
                            <td width="10%" colspan="6">
                              <?php if(isset($data_current->overall_remark)): ?>
                                <?php echo e($data_current->overall_remark); ?>

                              <?php else: ?>
                              <textarea class="form-control" style="height:auto!important;"  name="remark" <?php echo e(isset($data_current->overall_remark) ? 'readonly' : ''); ?> cols="100"><?php echo e(isset($data_current->overall_remark) ? $data_current->overall_remark :  $remark3); ?></textarea>                              <?php endif; ?>
                            </td>
                          </tr>

                        <tr>
                              <?php if ($currentUser->hasAccess('admin.sra.vendor_remark')) : ?>
                                <?php if(!isset($data_current->overall_remark)): ?>
                                  <td colspan="6"><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                                <?php endif; ?>
                              <?php endif; ?>
                            </tr>

                        </tbody>
                      </table>
                         </form>
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
                        <thead>
                                <tr>
                                  <th width="10%" style="background:<?= $color_name; ?>;color:#fff;">Owner Name(<?php echo e(round($highestPercentageOfName)); ?>%)</th>
                              <th width="20%" style="background:<?= $color_address; ?>;color:#fff;">Address(<?php echo e(round($highestPercentageOfAddress)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_num; ?>;color:#fff;">Elector Number(<?php echo e(round($highestPercentageOfNum)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_type; ?>;color:#fff;">Document Type(<?php echo e(round($highestPercentageOfType)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_const; ?>;color:#fff;">Constitution No.(<?php echo e(round($highestPercentageOfconst)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_sr; ?>;color:#fff;">Sr No.(<?php echo e(round($highestPercentageOfSrno)); ?>%)</th>
                              <th width="10%" style="background:<?= $color_part; ?>;color:#fff;">Part No.(<?php echo e(round($highestPercentageOfPart)); ?>%)</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td width="10%"><?= $highestPercentageName; ?></td>
                                  <td width="10%"><?= $highestPercentageAddress; ?></td>
                                  <td width="10%"><?= $highestPercentageNum; ?></td>
                                  <td width="10%"><?= $highestPercentageType; ?></td>
                                  <td width="10%"><?= $highestPercentageConst; ?></td>
                                  <td width="10%"><?= $highestPercentageSr; ?></td>
                                  <td width="10%"><?= $highestPercentagePart; ?></td>
                                </tr>    
                              </tbody>
  
                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storeremark_election')); ?>">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="3">
                          <input type="hidden" name="user" value="ca">
                          <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                        <!-- <tr>
                          <td colspan="7"><hr/><b>Eligible / Not Eligible :</b></td>
                        </tr>
                        <tr> -->
                        <tr>
                          <?php if (isset($data_current_ca) ) { ?>
                                    <td>
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
                                     <td width="10%">
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
                                      if($data_current_ca->eligibility_number == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_number == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_number == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_type == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_type == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_type == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_const_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_const_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_const_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_sr_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_sr_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_sr_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_part_no == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_part_no == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_part_no == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : ''); ?>>Manual</option>
                                <option value="2" <?php echo e(isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : ''); ?>>Auto</option>
                              </select>
                            </td>
                          <?php } ?>
                          </tr>
                        <tr>
                          <td colspan="7"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                                <td width="10%">
                                    <?php if(isset($data_current_ca->remark_name)): ?>
                                        <?php echo e($data_current_ca->remark_name); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark1_ca" value="<?php echo e(isset($data_current_ca->remark_name) ? $data_current_ca->remark_name : ''); ?>" <?php echo e(isset($data_current_ca->remark_name) ? 'readonly' : ''); ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="20%">
                                    <?php if(isset($data_current_ca->remark_address)): ?>
                                        <?php echo e($data_current_ca->remark_address); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark2_ca" value="<?php echo e(isset($data_current_ca->remark_address) ? $data_current_ca->remark_address : ''); ?>" <?php echo e(isset($data_current_ca->remark_address) ? 'readonly' : ''); ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_current_ca->remark_number)): ?>
                                        <?php echo e($data_current_ca->remark_number); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark3_ca" value="<?php echo e(isset($data_current_ca->remark_number) ? $data_current_ca->remark_number : ''); ?>" <?php echo e(isset($data_current_ca->remark_number) ? 'readonly' : ''); ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_current_ca->remark_type)): ?>
                                        <?php echo e($data_current_ca->remark_type); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark4_ca" value="<?php echo e(isset($data_current_ca->remark_type) ? $data_current_ca->remark_type : ''); ?>" <?php echo e(isset($data_current_ca->remark_type) ? 'readonly' : ''); ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_current_ca->remark_const_no)): ?>
                                        <?php echo e($data_current_ca->remark_const_no); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark5_ca" value="<?php echo e(isset($data_current_ca->remark_const_no) ? $data_current_ca->remark_const_no : ''); ?>" <?php echo e(isset($data_current_ca->remark_const_no) ? 'readonly' : ''); ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_current_ca->remark_sr_no)): ?>
                                        <?php echo e($data_current_ca->remark_sr_no); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark6_ca" value="<?php echo e(isset($data_current_ca->remark_sr_no) ? $data_current_ca->remark_sr_no : ''); ?>" <?php echo e(isset($data_current_ca->remark_sr_no) ? 'readonly' : ''); ?>>
                                    <?php endif; ?>
                                </td>
                                <td width="10%">
                                    <?php if(isset($data_current_ca->remark_part_no)): ?>
                                        <?php echo e($data_current_ca->remark_part_no); ?>

                                    <?php else: ?>
                                        <input type="text" class="form-control" name="remark7_ca" value="<?php echo e(isset($data_current_ca->remark_part_no) ? $data_current_ca->remark_part_no : ''); ?>" <?php echo e(isset($data_current_ca->remark_part_no) ? 'readonly' : ''); ?>>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                          <td colspan="7"><hr/></td>
                        </tr>
                          <tr>
                            <td ><b>Section Status :</b></td>
                            <td ><b>Section Remark :</b></td>
                              
                          </tr>
                          <tr>
                          <td width="10%">
                            <?php if(isset($data_current_ca->overall_eligibility)): ?>
                              <!-- <?php echo e($data_current_ca->overall_remark); ?> -->
                              <?php echo e($data_current_ca->overall_eligibility === 1 ? 'Verified' : ($data_current_ca->overall_eligibility === 2 ? ' Not Matched' : ' Unavailable')); ?>


                            <?php else: ?>
                              <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" <?php echo e(isset($data_current_ca->overall_eligibility) && ($data_current_ca->overall_eligibility == 1) ? 'selected' : ''); ?>>Verified</option>
                                <option value="2" <?php echo e(isset($data_current_ca->overall_eligibility) && ($data_current_ca->overall_eligibility == 2) ? 'selected' : ''); ?>> Not Matched</option>
                                <option value="3" <?php echo e(isset($data_current_ca->overall_eligibility) && ($data_current_ca->overall_eligibility == 3) ? 'selected' : ''); ?>> Unavailable</option>
                              </select>
                            <?php endif; ?>
                          </td> 
                          <td width="10%" colspan="6">
                            <?php if(isset($data_current_ca->overall_remark)): ?>
                              <?php echo e($data_current_ca->overall_remark); ?>

                            <?php else: ?>
                            <textarea class="form-control" style="height:auto!important;"  name="remark" <?php echo e(isset($data_current_ca->overall_remark) ? 'readonly' : ''); ?> cols="100"><?php echo e(isset($data_current_ca->overall_remark) ? $data_current_ca->overall_remark :  $remark3); ?></textarea>                            <?php endif; ?>
                          </td>


                            </tr>
                        <tr>
                        <?php if(!isset($data_current_ca->overall_remark)): ?>
                              <td colspan="6"><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                            <?php endif; ?>                        </tr>
                        </tbody>
                      </table>
                         </form>
                    </div>
                  </div>
                </div>
                <?php endif; ?>

                <!-- Recmmenatioon End -->
              </div>
                            <!-- content end -->
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
                            <!-- content start-->
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
                                    <input type="hidden" name="type" value="election">
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
                                            <?php if($overall_remark[0]->election_status == 0){ ?>
                                                <option value="0" selected="">-- Select Option --</option>
                                              <?php }else{ ?>
                                                <option value="0">-- Select Option --</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->election_status == 1){ ?>
                                                <option value="1" selected="">Verified</option>
                                              <?php }else{ ?>
                                                <option value="1" >Verified</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->election_status == 2){ ?>
                                                <option value="2" selected="">Not Matched</option>
                                              <?php }else{ ?>
                                                <option value="2" >Not Matched</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->election_status == 3){ ?>
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
                                           <textarea name="remark" cols="100" class="form-control"><?php echo e($overall_remark[0]->election_remark); ?></textarea>
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
                            <!-- content end -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- accordion end -->
                       
              
              
            <!-- election end -->
            </div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
            <a href="index.php/sra/gumasta/<?php echo e($hid); ?>" class="tab-label" style="color:#495057!important;font-size:16px !important;">Gumasta</a>
            <div class="tab-content">Gumasta Details</div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
             <a href="index.php/sra/" class="tab-label" style="color:#495057!important;font-size:16px !important;">Photo Pass Details</a>
            <div class="tab-content">Photo Pass Details</div>
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
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/sra/election.blade.php ENDPATH**/ ?>