@extends('admin::layout')


@component('admin::include.page.header')
    @slot('title', clean(trans('admin::sra.sradetailtitle')))
    <li class="nav-item">
        <a href="#">
            {{ clean(trans('admin::sra.sradetailtitle')) }}
        </a>
    </li>
@endcomponent

<style type="text/css">

.zoom {
  cursor: zoom-in;
  transition: transform 0.2s ease-in-out;

}

.zoom-in {
  cursor: zoom-out;
  transform: scale(1.5);

}

.rotate-buttons {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
}

.rotate-buttons button {
  background: #fff;
  color: #000;
  border: none;
  border-radius: 50%;
  font-size: 24px;
  padding: 10px 12px;
  cursor: pointer;
  margin-right: 10px;
}

.rotate-buttons button:focus {
  outline: none;
}

.rotate-buttons button:hover {
  background: #000;
  color: #fff;
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
@media only screen and (max-width: 700px){
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
th ,td {
      border-bottom:none !important;
      height: 30px !important;
    }


/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: black;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Create four equal columns that floats next to eachother */
.column {
  float: left;
  width: 25%;
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
th,td {
        border-bottom: none !important;
        height: 30px !important;
        font-size:16px !important;
    
 

    }
    h4{
      font-size:18px !important;
      font-weight: bold !important;
    }

</style>

@section('content')
 @if (session('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
      @endif
      
<?php $access = 'readonly' ?>
@hasAccess('admin.sra.vendor_remark')
  <?php
    $access = '';
  ?>
@endHasAccess

              <?php
            

                  $match_name_array = $match_address_array = $match_uid_array = $match_dob_array = array();
               

                  //  foreach($query as $data){
                  //  $sims_name = $data->HUTOWNERNAME;
                  //  $sims_uid = isset($data->UIDNO) ? $data->UIDNO : 'Not Available';
                  //  $sims_address = $data->Address;
                  //  $sims_dob = 'Not Available'; // replace this with the actual DOB property if it exists in $data
                  //  }

                   $int_dob = $int_address = $int_uid = $int_name = 'Not Available';
                    if(count($adhar_details) > 0){
                      
                          $int_uid = $adhar_details[0]->uid_no ?? 'Not Available';
                          $int_name = $adhar_details[0]->owner_name ?? 'Not Available';
                          $int_address = $adhar_details[0]->owner_address ?? 'Not Available';
                          $int_dob = $adhar_details[0]->birth_date ?? 'Not Available';
                         
                    }
                    
                    if(count($query) > 0){
                      foreach($query as $data)
                      {
                        $sims_name = strtolower($data->HUTOWNERNAME);
                         array_push($match_name_array,$sims_name);
                        $sims_address = strtolower($data->Address);
                         array_push($match_address_array,$sims_address);
                        $sims_uid = strtolower($data->UIDNO);
                         array_push($match_uid_array,$sims_uid);
                        $sims_dob = 'Not Available';
                         array_push($match_dob_array,'Not Available');
                      }
                    }  else{
                      array_push($match_name_array,'Not Available');
                       array_push($match_address_array,'Not Available');
                       array_push($match_uid_array,'Not Available');
                        array_push($match_dob_array,'Not Available');
                    }      

                    $ocr_uid = isset($documents[0]->uid) ? $documents[0]->uid : 'Not Available';
                    array_push($match_uid_array,$ocr_uid);
                    $ocr_name = isset($documents[0]->name) ? $documents[0]->name : 'Not Available';
                    array_push($match_name_array,$ocr_name);
                    $ocr_address = isset($documents[0]->address) ? $documents[0]->address : 'Not Available';
                    array_push($match_address_array,$ocr_address);
                    $ocr_dob = isset($documents[0]->dob) ? (new DateTime($documents[0]->dob))->format('d-F-Y') : 'Not Available';
                    array_push($match_dob_array,$ocr_dob);

                    array_push($match_name_array, $int_name);
                    array_push($match_uid_array, $int_uid);
                    array_push($match_address_array, $int_address);
                    array_push($match_dob_array, $int_dob);

                                                   
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


                   //For Address
                $highestPercentageOfUID = $per =0;
                $highestPercentageUID  = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_uid_array);
               // print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfUID  = $per;
                  $highestPercentageUID  = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfUID  = $per;
                  $highestPercentageUID  = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfUID  = 0;
                  $highestPercentageUID  = $match_str;
                  }  
                }

                
                if($highestPercentageUID  == 'Not Available') 
                  $highestPercentageOfUID  = 0;
                

                if($highestPercentageOfUID  == 100 )
                  $color_uid = '#238823';
                elseif($highestPercentageOfUID  >= 50)
                  $color_uid = '#FFBF00';
                else  
                  $color_uid = '#d2222d';


                  $highestPercentageOfdate = $per = 0;
                  $highestPercentagedate  = $match_string ="";
                  $res = array();

                  // print_r($match_dob_array);die;
                  
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_dob_array);
                   $match_str = $res['match_string'];$per = $res['percentage'];
                   if(count($res) > 0){
                     if($per > 0){
                      $highestPercentageOfdate  = $per;
                     $highestPercentagedate  = $match_str;
                     }
                     if($per == 0){
                      $highestPercentageOfdate  = $per;
                     $highestPercentagedate  = $match_str;
                     }
                      if($per < 0){
                      $highestPercentageOfdate  = 0;
                     $highestPercentagedate  = $match_str;
                     }  
                   }   
                   
                   if($highestPercentagedate  == 'Not Available') 
                    $highestPercentageOfdate  = 0;

                   if($highestPercentageOfdate  == 100 )
                    $color_date = '#238823';
                   elseif($highestPercentageOfdate  >= 50)
                    $color_date = '#FFBF00';
                   else  
                    $color_date = '#d2222d';
                  //  echo "in";die;
                             
                ?>

    <div class="row">
        <div class="col-md-12">
          <!-- tab start-->
           <div class="card">
            <div class="card-body">
            <div class="tabs">
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-6" class="tab-switch">
                 <a href="index.php/sra/documentlisting/{{$hid}}" class="tab-label" style="color:#495057!important; font-size:16px !important;">Hut Documents</a>
                <div class="tab-content">Hut Documents</div>
            </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-1"  class="tab-switch">
                <a href="index.php/sra/detail/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Electricity</a>
                <div class="tab-content">
                </div>   
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
                <a href="index.php/sra/elections/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Election</a>
                <div class="tab-content">Election Details</div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
                <a href="index.php/sra/gumasta/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Gumasta</a>
                <div class="tab-content"></div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
                <a href="#" class="tab-label" style="color:#495057!important;font-size:16px !important;">Photo Pass Details</a>
                <div class="tab-content">Photo Pass Details</div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
                <a href="index.php/sra/agreement/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Registration Agreement Details</a>
                <div class="tab-content">Registration Agreement Details</div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-5" checked class="tab-switch">
                 <label for="tab-1" class="tab-label" style="color:#fff !important;font-size:16px !important;">Aadhar Card</label>
                <div class="tab-content">
                  <!-- start-->
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
                                      @foreach($query as $data)
                                        <td>{{$data->HUTSURVERYID}}</td>
                                        <?php $hid = $data->HUTSURVERYID ?>
                                        <td>{{$data->ClusterId}}</td>
                                        <td>{{$data->SchemeName}}</td>
                                        <td>{{$data->HUTOWNERNAME}}</td>
                                        <td>{{$data->Address}}</td>
                                        <td>{{$data->PropertyType}}</td>
                                        <td>{{$data->FLOORNUM}}</td>
                                        <td>{{round($data->HUTLENGTH,2)}}</td>
                                        <td>{{round($data->HUTWIDTH,2)}}</td>
                                        <td>{{round($data->Area,2)}}</td>
                                      @endforeach
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
                             <?php 
                   $date = isset($documents[0]->aggrement_date)?$documents[0]->aggrement_date:'';
                   $year = substr($date, 0,4);
                   $year_val = '';
                   ?>
                   <?php if($year < 2000){?>
                    <!-- Year 2000 or Before -->
                    Current Year
                    <?php $year_val = '1';?>
                   <?php } ?>
                   <?php if($year >= 2000 && $year < 2011){?>
                    <!-- Year 2001 or Before Year 2011 -->
                    Current Year
                    <?php $year_val = '2';?>
                   <?php } ?>
                   <?php if($year >= 2011){?>
                    Current Year
                    <?php $year_val = '3';?>
                   <?php } ?>
                          </a>
                        </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body" style="background-color: #dbd7d2;padding-bottom:5px;">
                            <!-- content start-->
                             <div class="col-md-12">
                <hr/>
               
                <br/>
                <!-- comparison code start-->
             
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
                            <th width="10%">UID No</th>
                            <th width="20%">Owner Name</th>
                            <th width="10%">Dob</th>
                            <th width="30%">Address</th>
                            <!-- <th width="10%">Address</th> -->
                            <!-- <th width="10%">Relationship</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            @foreach($query as $data)
                              <td width="10%">{{isset($data->UIDNO)?$data->UIDNO:'Not Available'}} </td>
                              <td width="20%">{{$data->HUTOWNERNAME}}</td>
                              <td width="10%">Not Available</td>
                              <td width="30%">{{$data->Address}}</td>
                              <!-- <td width="10%">Not Available</td> -->
                              <!-- <td width="10%">Not Available</td> -->
                            @endforeach
                           
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
                            <th width="10%">UID No</th>
                            <th width="20%">Owner Name</th>
                            <th width="10%">Dob</th>
                            <th width="30%">Address</th>
                            <!-- <th width="10%">Address</th> -->
                            <!-- <th width="10%">Relationship</th> -->
                              </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="10%">{{ isset($documents[0]->uid)?$documents[0]->uid:'Not Available'; }}</td>
                            <td width="20%">{{ isset($documents[0]->name)?$documents[0]->name:'Not Available'; }}</td>
                            <td width="10%">
                            <?php 
                            if(isset($documents[0]->dob)){
                              $datetime = new DateTime($documents[0]->dob);
  
                              // Calling the format() function with a 
                              // specified format 'd-m-Y'
                              echo $datetime->format('d-F-Y');
                            }else{
                              echo "Not Available";
                            }
                            ?>
                            </td>
                            <td width="30%">{{ isset($documents[0]->address)?$documents[0]->address:'Not Available'; }}</td>
                            <!-- <td width="10%">{{ isset($documents[0]->purchaser_name  )?$documents[0]->purchaser_name :'Not Available'; }}</td>
                            <td width="10%">{{ isset($documents[0]->relationship)?$documents[0]->relationship:'Not Available'; }}</td> -->
                            {{-- <td width="10%">
                              <img src="http://localhost/sraservices_old/public/storage/media/rnynt00Evsb9kdC10GKVB517AHISla1O9KAYZYrl.jpg" height="80" width="80">
                            </td> --}}
                          </tr>
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
                            if(isset($documents[0])){
                              $img = explode(',', $documents[0]->file);
                            
                            ?>

                            <?php
                                $img_url = "http://sra-uat.apniamc.in/images/" . $img[0];
                                // $mime_type = mime_content_type($img_url);
                                $mime_type = pathinfo($img_url, PATHINFO_EXTENSION);
                                // echo $mime_type;
                                if ((strpos($mime_type, 'image') !== false) || strpos($mime_type,'jpeg') !== false) {
                                    // echo "<img src=\"$img_url\" data-src=\"$img_url\"  style=\"height:320px;width:250px;\" id=\"myImg\">";
                                    foreach($img as $img_new){
                                      // print_r($img);
                                      $i = 1;
                                      echo '<div class="column">';
                                      echo '<img src="http://sra-uat.apniamc.in/images/'.$img_new.'" onclick="openModal();currentSlide('.$i.')" class="hover-shadow"  style="height:320px;width:auto;">' ;
                                      echo '</div>';
                                      $i++;
                                      break;
                                    }
                                } elseif ($mime_type === 'pdf') {
                                    echo "<img src=\"http://sra-uat.apniamc.in/images/pdf_img.png\" data-src=\"$img_url\" width=\"250\" height=\"375\" id=\"myImg_pdf\" >";
                                }
                                
                            ?>
                            <div id="myModal" class="modal">
                              <span class="close cursor" onclick="closeModal()">&times;</span>

                                  <div class="modal-content" id="img01">
                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>

                                      <div id="caption"></div>
                                      <!-- <a class="zoom-in" onclick="zoomIn()">+</a> -->
                                    <!-- <a class="zoom-out" onclick="zoomOut()">-</a> -->

                                      <?php
                                        foreach($img as $img_new){
                                          // print_r($img);
                                          echo '<div class="mySlides">';
                                          echo '<img src="http://sra-uat.apniamc.in/images/'.$img_new.'" style="width:100%" id="myImg">';
                                          echo '</div>';
                                        }
                                        ?>

                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>     
                                    <div class="rotate-buttons">
                                      <button onclick="rotateImage(90)" class="rotate-cw">&#8634;</button>
                                      <button onclick="rotateImage(-90)" class="rotate-ccw">&#8635;</button>
                                    </div>
                                  </div>

                            </div>

                            <!-- start-->
                            <div id="myModal_pdf" class="modal">
                              <span class="close" onclick="closeModal_pdf()">&times;</span>
                              <embed class="modal-content"  id="img012" width="500" height="375" type='application/pdf'>
                              <div id="caption"></div>
                            </div>
                            <script>
                                // Get the modal
                                var modal = document.getElementById("myModal_pdf");

                                // Get the image and insert it inside the modal - use its "alt" text as a caption
                                var img = document.getElementById("myImg_pdf");
                                var modalImg = document.getElementById("img012");
                                var captionText = document.getElementById("caption");
                                img.onclick = function(){
                                  modal.style.display = "block";
                                  // alert(this.src);
                                  // modalImg.src = this.src;
                                  modalImg.src = this.getAttribute("data-src");;

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

                            <!-- <img src="http://sra-uat.apniamc.in/images/{{ $img[0] }}" style="height:320px;width:250px;" id="myImg"> -->
                            <?php }else{ ?>
                              <img src="http://sra-uat.apniamc.in/images/noimage.jpg" style="height:320px;width:100%;" >
                            <?php } ?>
                            
                                                        <!-- end -->
                          </div>
                        </div>
                      <!-- ocr image end -->
                    </div>
                </div>
                                
                                {{-- Integration part --}}
                                <h4>Manual Data</h4>
                                <div class="card">
                                  <div class="card-body">
                                    <div class="table-responsive" id="sra-table">
                                      <table class="table table-borderless table-responsive">
                                        <thead>
                                            <tr>
                                            <th width="10%">UID No</th>
                                            <th width="20%">Owner Name</th>
                                            <th width="10%">Dob</th>
                                            <th width="30%">Address</th>
                                              <!-- <th width="10%">Purchaser</th>
                                              <th width="10%">Relationship</th> -->
                                              </tr>
                                        </thead>
                                        <tbody>
                                          <?php if(count($adhar_details) > 0){ ?>
                                            <tr>
                                                        <td width="10%"><?php echo $adhar_details[0]->uid_no; ?></td>
                                                        <td width="10%"><?php echo $adhar_details[0]->owner_name; ?></td>
                                                        <td width="20%"><?php echo $adhar_details[0]->birth_date; ?></td>
                                                        <td width="20%"><?php echo $adhar_details[0]->owner_address; ?></td>
                                                        
                                                    </tr>
                                                   
                                                  
                                          <?php }else {?>
                                          <form method="POST" enctype="multipart/form-data" action="{{ route('admin.sra.storemanualdata_adhar') }}">
                                          @csrf
                                          <input type="hidden" id="hut_id" name="hut_id" value=<?= $hid; ?> required>
                                          <input type="hidden" id="year" name="year" value="1">
                                                    <tr>
                                                        <td width="10%"><input type="text" class="form-control"  name="uid_no"><br/></td>
                                                        <td width="10%"><input type="text" class="form-control"  name="owner_name"><br/></td>
                                                        <td width="20%"><input type="text" class="form-control"  name="birth_date"><br/></td>
                                                        <td width="20%"><input type="text" class="form-control"  name="owner_address"><br/></td>
                                                       
                                                    </tr>
                                                  
                                                    <tr>
                                                       @hasAccess('admin.sra.vendor_remark')
                                                        <td colspan="5"><button id="submitBtn2000" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Manual Data</button></td>
                                                        @endHasAccess
                                                      </tr>
                                          </form>
                                        <?php } ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <!-- Recommendation Start -->
                                <br/>
                                <h4>Recommendation by Vendor</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                        <table class="table table-borderless table-responsive">
                            <thead>
                                <tr>
                                    <th width="10%" style="background-color:<?= $color_uid; ?>; color: #fff !important;padding: 5px !important;">UID No ({{round($highestPercentageOfUID)}}%)</th>
                                    <th width="20%" style="background-color:<?= $color_name; ?>; color: #fff !important;padding: 5px !important;">Owner Name ({{round($highestPercentageOfName1)}}%)</th>
                                    <th width="20%" style="background-color:<?= $color_date; ?>; color: #fff !important;padding: 5px !important;">Dob ({{round($highestPercentageOfdate)}}%)</th>
                                    <th width="30%" style="background-color:<?= $color_address; ?>; color: #fff !important;padding: 5px !important;">Address ({{round($highestPercentageOfAddress1)}}%)</th>
                                   
                                  </tr>
                                  <tr>
                                <td width="10%">{{ isset($highestPercentageUID )?$highestPercentageUID:'Not Available'}}</td>
                                 <td width="10%">{{ isset($highestPercentageName1)?$highestPercentageName1:'Not Available'}}</td>
                                <td width="20%">{{ isset($highestPercentagedate)?$highestPercentagedate:'Not Available'}}</td>
                                <td width="30%">{{ isset($highestPercentageAddress1)?$highestPercentageAddress1:'Not Available'}}</td>
                               
                              </tr>
                              <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_adhar') }}">
                              @csrf
                              <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="{{$year_val}}">
                              <input type="hidden" name="user" value="vendor">
                              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                              <tr>
                                <td colspan="6"><!-- <hr/><b>Eligible / Not Eligible : --></b></td> 
                              </tr>
                              <tr>
                                  <?php if (count($query_data) > 0) { ?>
                                    <td width="10%">
                                      <?php 
                                      if($query_data[0]->eligibility_uid == 0){
                                        echo "Not Available";
                                      }
                                      if($query_data[0]->eligibility_uid == 1){
                                        echo "Manual";
                                      }
                                      if($query_data[0]->eligibility_uid == 2){
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
                                      if($query_data[0]->eligibility_dob == 0){
                                        echo "Not Available";
                                      }
                                      if($query_data[0]->eligibility_dob == 1){
                                        echo "Manual";
                                      }
                                      if($query_data[0]->eligibility_dob == 2){
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
                                     
                                   <?php } else { ?>
                                <td width="10%">
                                 
                                <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfUID) && $highestPercentageOfUID < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfUID) && $highestPercentageOfUID == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName1) && $highestPercentageOfName1 < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName1) && $highestPercentageOfName1 == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfdate) && $highestPercentageOfdate < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfdate) && $highestPercentageOfdate == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2"  {{ isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                              
                                 <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/><b>Remark :</b></td>
                              </tr>

                              <tr>
                                <?php if (count($query_data) > 0) {  ?>
                                <td width="10%">{{ isset($query_data[0]->remark_uid)?$query_data[0]->remark_uid:''}}</td>
                                <td width="10%">{{ isset($query_data[0]->remark_name)?$query_data[0]->remark_name:''}}</td>
                                <td width="20%">{{ isset($query_data[0]->remark_dob)?$query_data[0]->remark_dob:''}}</td>
                                <td width="20%">{{ isset($query_data[0]->remark_address)?$query_data[0]->remark_address:''}}</td>
                              
                                <?php }else { ?>

                                <td width="10%"><input type="text" class="form-control"  name="remark1" value="{{ isset($query_data[0]->remark_uid)?$query_data[0]->remark_uid:''}}" ></td>
                                <td width="10%"><input type="text" class="form-control"  name="remark2" value="{{ isset($query_data[0]->remark_name)?$query_data[0]->remark_name:''}}" ></td>
                                <td width="20%"><input type="text" class="form-control"  name="remark3" value="{{ isset($query_data[0]->remark_dob)?$query_data[0]->remark_dob:''}}" ></td>
                                <td width="20%"><input type="text" class="form-control"  name="remark4" value="{{ isset($query_data[0]->remark_address)?$query_data[0]->remark_address:''}}" ></td>
                               
                                <?php } ?>

                              </tr>
                              <tr>
                                <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                            <td ><b>Section Status :</b></td>
                            <td ><b>Section Remark :</b></td>
                            <?php

                            if(count($documents)>0){
                                $remark = "Aadhar Document with UID".$documents[0]->uid." and address " .$documents[0]->address;
                            }else{
                                $remark = "";
                            }
                        ?>
                            
                          </tr>
                          <tr>
                             <td width="10%">
                              <?php if (count($query_data) > 0) { 
                                if($query_data[0]->overall_eligibility == 0){
                                  echo "Unavailable";
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
                                  <option value="1" {{ isset($query_data[0]->overall_eligibility) && ($query_data[0]->overall_eligibility == 1) ? 'selected' : '' }}>Verified</option>
                                  <option value="2" {{ isset($query_data[0]->overall_eligibility) && ($query_data[0]->overall_eligibility == 2) ? 'selected' : '' }}>Not Matched</option>
                                  <option value="3" {{ isset($query_data[0]->overall_eligibility) && ($query_data[0]->overall_eligibility == 3) ? 'selected' : '' }}>Unavailable</option>
                                </select>
                              <?php } ?>
                              </td> 
                              <td width="10%" colspan="5">
                                <?php if (count($query_data) > 0) { ?>
                                  {{ isset($query_data[0]->overall_remark) ? $query_data[0]->overall_remark : 'Not Available' }}
                                <?php } else  { ?>
                                <textarea class="form-control" style="height:auto!important;"  name="remark" {{ isset($query_data[0]->overall_remark) ? 'readonly' : '' }} cols="100">{{ isset($query_data[0]->overall_remark) ? $query_data[0]->overall_remark : $remark }}</textarea>
                              <?php } ?>
                              </td>
                        </tr>
                              <tr>
                                <?php if(!isset($query_data[0])){?>
                                  @hasAccess('admin.sra.vendor_remark')
                                <td colspan="5"><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                                @endHasAccess
                                <?php } ?>
                              </tr>
                            </form>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <!-- recommendation end -->
                    
                    <!-- ca recommendation start -->
                    @hasAccess('admin.sra.ca_remark')
                    <br/>
                    <h4>Conclusion of CA</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                        <table class="table table-borderless table-responsive">
                            <thead>
                            <tr>
                                    <th width="10%" style="background-color:<?= $color_uid; ?>; color: #fff !important;padding: 5px !important;">UID No ({{round($highestPercentageOfUID)}}%)</th>
                                    <th width="20%" style="background-color:<?= $color_name; ?>; color: #fff !important;padding: 5px !important;">Owner Name ({{round($highestPercentageOfName1)}}%)</th>
                                    <th width="20%" style="background-color:<?= $color_date; ?>; color: #fff !important;;padding: 5px !important;">Dob ({{round($highestPercentageOfdate)}}%)</th>
                                    <th width="30%" style="background-color:<?= $color_address; ?>; color: #fff !important;padding: 5px !important;">Address ({{round($highestPercentageOfAddress1)}}%)</th>
                                   
                                  </tr>
                                  <tr>
                                <td width="10%">{{ isset($highestPercentageUID)?$highestPercentageUID:'Not Available'}}</td>
                                 <td width="10%">{{ isset($highestPercentageName1)?$highestPercentageName1:'Not Available'}}</td>
                                <td width="10%">{{ isset($highestPercentagedate)?$highestPercentagedate:'Not Available'}}</td>
                                <td width="20%">{{ isset($highestPercentageAddress1)?$highestPercentageAddress1:'Not Available'}}</td>
                               
                              </tr>
                              <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_adhar') }}">
                              @csrf
                              <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="{{$year_val}}">
                              <input type="hidden" name="user" value="ca">
                              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                              <tr>
                                <td colspan="6"><!-- <hr/><b>Eligible / Not Eligible :</b> --></td> 
                              </tr>
                              <tr>
                                <?php if (count($recomm_remarks_ca) > 0) { ?>
                                    <td width="10%">
                                      <?php 
                                      if($recomm_remarks_ca[0]->eligibility_uid == 0){
                                        echo "Not Available";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_uid == 1){
                                        echo "Manual";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_uid == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($recomm_remarks_ca[0]->eligibility_name == 0){
                                        echo "Not Available";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_name == 1){
                                        echo "Manual";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($recomm_remarks_ca[0]->eligibility_dob == 0){
                                        echo "Not Available";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_dob == 1){
                                        echo "Manual";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_dob == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($recomm_remarks_ca[0]->eligibility_address == 0){
                                        echo "Not Available";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_address == 1){
                                        echo "Manual";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_address == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                   
                                   
                                   <?php  } else { ?>
                                <td width="10%">
                                <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfUID) && $highestPercentageOfUID < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfUID) && $highestPercentageOfUID == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName1) && $highestPercentageOfName1 < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName1) && $highestPercentageOfName1 == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfdate) && $highestPercentageOfdate < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfdatehighestPercentageOfdate) && $highestPercentageOfdate == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2"  {{ isset($highestPercentageOfAddress1) && $highestPercentageOfAddress1 == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                             
                              <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/><b>Remark :</b></td>
                              </tr>

                              <tr>
                                 <?php if (count($recomm_remarks_ca) > 0) { ?>
                                <td width="10%">{{ isset($recomm_remarks_ca[0]->remark_uid)?$recomm_remarks_ca[0]->remark_uid:''}}</td>
                                <td width="10%">{{ isset($recomm_remarks_ca[0]->remark_name)?$recomm_remarks_ca[0]->remark_name:''}}</td>
                                <td width="20%">{{ isset($recomm_remarks_ca[0]->remark_dob)?$recomm_remarks_ca[0]->remark_dob:''}}</td>
                                <td width="20%">{{ isset($recomm_remarks_ca[0]->remark_address)?$recomm_remarks_ca[0]->remark_address:''}}</td>
                                
                                <?php }else { ?>
                                <td width="10%"><input type="text" class="form-control"  name="remark1_ca" value="{{ isset($recomm_remarks_ca[0]->remark_uid)?$recomm_remarks_ca[0]->remark_uid:''}}" ></td>
                                <td width="10%"><input type="text" class="form-control"  name="remark2_ca" value="{{ isset($recomm_remarks_ca[0]->remark_name)?$recomm_remarks_ca[0]->remark_name:''}}" ></td>
                                <td width="20%"><input type="text" class="form-control"  name="remark3_ca" value="{{ isset($recomm_remarks_ca[0]->remark_dob)?$recomm_remarks_ca[0]->remark_dob:''}}" ></td>
                                <td width="20%"><input type="text" class="form-control"  name="remark4_ca" value="{{ isset($recomm_remarks_ca[0]->remark_address)?$recomm_remarks_ca[0]->remark_address:''}}" ></td>
                              
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
                              <?php if (count($recomm_remarks_ca) > 0) { 
                                if($recomm_remarks_ca[0]->overall_eligibility == 0){
                                  echo "Not Available";
                                }
                                if($recomm_remarks_ca[0]->overall_eligibility == 1){
                                  echo "Verified";
                                }
                                if($recomm_remarks_ca[0]->overall_eligibility == 2){
                                  echo "Not Matched";
                                }
                                if($recomm_remarks_ca[0]->overall_eligibility == 3){
                                  echo "Unavailable";
                                }
                                ?>

                              <?php } else { ?>

                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($recomm_remarks_ca[0]->overall_eligibility) && ($recomm_remarks_ca[0]->overall_eligibility == 1) ? 'selected' : '' }}>Verified</option>
                                  <option value="2" {{ isset($recomm_remarks_ca[0]->overall_eligibility) && ($recomm_remarks_ca[0]->overall_eligibility == 2) ? 'selected' : '' }}>Not Matched</option>
                                  <option value="3" {{ isset($recomm_remarks_ca[0]->overall_eligibility) && ($recomm_remarks_ca[0]->overall_eligibility == 3) ? 'selected' : '' }}>Unavailable</option>
                                </select>
                              <?php } ?>
                              </td> 
                              <td width="10%" colspan="5">
                                <?php if (count($recomm_remarks_ca) > 0) { ?>
                                  {{ isset($recomm_remarks_ca[0]->overall_remark) ? $recomm_remarks_ca[0]->overall_remark : 'Not Available' }}
                                <?php } else  { ?>
                                <textarea class="form-control" style="height:auto!important;"  name="remark" {{ isset($recomm_remarks_ca[0]->overall_remark) ? 'readonly' : '' }} cols="100">{{ isset($recomm_remarks_ca[0]->overall_remark) ? $recomm_remarks_ca[0]->overall_remark : $remark  }}</textarea>
                              <?php } ?>
                               </td>
                        </tr>
                              <tr>
                                <?php if(!isset($recomm_remarks_ca[0])){?>
                                <td colspan="5"><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                                <?php } ?>
                              </tr>
                            </form>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    @endHasAccess 
                    <!-- ca recommendation end -->

                
              </div>
                  <!-- end -->
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
                                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.store_overall_remark') }}">
                                    @csrf
                                    <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                                    <input type="hidden" name="user" value="{{auth()->user()->id}}">
                                    <input type="hidden" name="type" value="adhar">
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
                                            <?php if($overall_remark[0]->adhar_status == 0){ ?>
                                                <option value="0" selected="">-- Select Option --</option>
                                              <?php }else{ ?>
                                                <option value="0">-- Select Option --</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->adhar_status == 1){ ?>
                                                <option value="1" selected="">Verified</option>
                                              <?php }else{ ?>
                                                <option value="1" >Verified</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->adhar_status == 2){ ?>
                                                <option value="2" selected="">Not Matched</option>
                                              <?php }else{ ?>
                                                <option value="2" >Not Matched</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->adhar_status == 3){ ?>
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
                                           <textarea name="remark" cols="100" class="form-control">{{$overall_remark[0]->adhar_remark}}</textarea>
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
                             
                </div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-6" class="tab-switch">
                 <a href="index.php/sra/final/{{$hid}}" class="tab-label" style="color:#495057!important;">Final Submission</a>
                <div class="tab-content">Final submission Details</div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



<style>
  .tab-switch:checked + .tab-label {
    background: #1269db !important;
    color: white !important;
  }
  .tab-label{
    background: white !important;
  }
</style>


<script>
// Open the Modal
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

// Close the Modal
function closeModal_pdf() {
  document.getElementById("myModal_pdf").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  var img = document.getElementById("myImg");

  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  // Zoom in/out functionality
    var currentZoom = 1;
    img.addEventListener("click", function() {
      if (currentZoom == 1) {
        img.classList.add("zoom-in");
        currentZoom++;
      } else {
        img.classList.remove("zoom-in");
        currentZoom--;
      }
    });
}
function zoomIn() {
  var img = document.getElementsByClassName("mySlides")[slideIndex-1].getElementsByTagName("img")[0];
  var currWidth = img.clientWidth;
  var currHeight = img.clientHeight;
  img.style.width = (currWidth + 100) + "px";
  img.style.height = (currHeight + 100) + "px";
}

function zoomOut() {
  var img = document.getElementsByClassName("mySlides")[slideIndex-1].getElementsByTagName("img")[0];
  var currWidth = img.clientWidth;
  var currHeight = img.clientHeight;
  img.style.width = (currWidth - 100) + "px";
  img.style.height = (currHeight - 100) + "px";
}
//Need to Check this code for rotation
//After apply effect of rotation zoom - in & zoom - out is not wokring
function rotateImage(degrees) {
  var img = document.getElementsByClassName("mySlides")[slideIndex-1].getElementsByTagName("img")[0];
  var currentRotation = parseInt(img.getAttribute("data-rotation"));
  if (isNaN(currentRotation)) {
    currentRotation = 0;
  }
  var newRotation = currentRotation + degrees;
  img.setAttribute("data-rotation", newRotation);
  img.style.transform = "rotate(" + newRotation + "deg)";
  img.addEventListener("click", function() {
      if (currentZoom == 1) {
        img.classList.add("zoom-in");
        currentZoom++;
      } else {
        img.classList.remove("zoom-in");
        currentZoom--;
      }
    });
}

</script>
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