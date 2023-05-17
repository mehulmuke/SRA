<!DOCTYPE html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
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
      font-size:18px !important;
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
                <a href="index.php/sra/photopass/{{ $hid }}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Photo Pass Details</a>
                <div class="tab-content">Photo Pass Details</div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-5" checked class="tab-switch">
                 <label for="tab-1" class="tab-label" style="color:#fff !important;font-size:16px !important;">Registration Agreement Details</label>
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
                                      @foreach($query as $data)
                                      <td>{{$data->ClusterId}}</td>
                                        <td>{{$data->HUTSURVERYID}}</td>
                                        <?php $hid = $data->HUTSURVERYID ?>
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
                    Details For Year 2000 or Before

                    <?php $year_val = '1';?>
                   <?php } ?>
                   <?php if($year >= 2000 && $year < 2011){?>
                    Details For Year Between 2000 To 2011

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
   

                <?php
                  $match_sr_no_array = $match_doc_array = $match_date_array = $match_seller_array = $match_purchaser_array = $match_relationship_array = array();
                  $match_sr_no_int_array = $match_doc_int_array = $match_date_int_array = $match_seller_int_array = $match_purchaser_int_array = $match_relationship_int_array = array();
                  $res_int1 = $res_int2 = $res_int3 = $res_int4 = $res_int5 = $res_int6 = array();
                  $match_int_str = "";
                  $integration_sr_no = $integration_doc = $integration_date = $integration_seller =  $integration_relationship = $integration_purchaser = array();
                  $match_sr_no = $match_doc = $match_date = $match_seller = $match_purchaser = $match_relationship = array();

                  $sims_sr_no = 'Not Available';
                  array_push($match_sr_no_array, $sims_sr_no);
                  $sims_document = 'Not Available';
                  array_push($match_doc_array, $sims_document);
                  $sims_aggrement_date = 'Not Available';
                  array_push($match_date_array, $sims_aggrement_date);
                  $sims_seller_name = 'Not Available';
                  array_push($match_seller_array, $sims_seller_name);
                  $sims_purchaser_name = 'Not Available';
                  array_push($match_purchaser_array, $sims_purchaser_name);
                  $sims_relationship = 'Not Available';
                  array_push($match_relationship_array, $sims_relationship);

                  //ocr data
                  $ocr_sr_no = isset($documents[0]->sr_no)?$documents[0]->sr_no:'Not Available';
                  array_push($match_sr_no_array, $ocr_sr_no);
                  $ocr_document = isset($documents[0]->document)?$documents[0]->document:'Not Available';
                  array_push($match_doc_array, $ocr_document);
                  $ocr_aggrement_date = isset($documents[0]->aggrement_date)?$documents[0]->aggrement_date:'Not Available';
                  array_push($match_date_array, $ocr_aggrement_date);
                  $ocr_seller_name = isset($documents[0]->seller_name)?$documents[0]->seller_name:'Not Available';
                  array_push($match_seller_array, $ocr_seller_name);
                  $ocr_purchaser_name = isset($documents[0]->purchaser_name)?$documents[0]->purchaser_name:'Not Available';
                  array_push($match_purchaser_array, $ocr_purchaser_name);
                  $ocr_relationship = isset($documents[0]->relationship)?$documents[0]->relationship:'Not Available';
                  array_push($match_relationship_array, $ocr_relationship);

                  if(count($query_data2) > 0){
                    foreach($query_data2 as $data)
                    {
                      // print_r($data);
                      array_push($match_sr_no_int_array,$data->sr_no);
                      array_push($match_doc_int_array,$data->document);
                      array_push($match_date_int_array,$data->agreement_date);
                      array_push($match_seller_int_array,$data->seller_name);
                      array_push($match_purchaser_int_array,$data->purchaser_name);
                      array_push($match_relationship_int_array,$data->relationship);
                    }
                    $res_int1 = \SraHelper::instance()->integration_return_single_value($match_sr_no_int_array);
                    array_push($match_sr_no_array,$res_int1);
                    $res_int2 = \SraHelper::instance()->integration_return_single_value($match_doc_int_array);
                    array_push($match_doc_array,$res_int2);
                    $res_int3 = \SraHelper::instance()->integration_return_single_value($match_date_int_array);
                    array_push($match_date_array,$res_int3);
                    $res_int4 = \SraHelper::instance()->integration_return_single_value($match_seller_int_array);
                    array_push($match_seller_array,$res_int4);
                    $res_int5 = \SraHelper::instance()->integration_return_single_value($match_purchaser_int_array);
                    array_push($match_purchaser_array,$res_int5);
                    $res_int6 = \SraHelper::instance()->integration_return_single_value($match_relationship_int_array);
                    array_push($match_relationship_array,$res_int6);

                }else{
                      array_push($match_sr_no_array,'Not Available');
                      array_push($match_doc_array,'Not Available');
                      array_push($match_date_array,'Not Available');
                      array_push($match_seller_array,'Not Available');
                      array_push($match_purchaser_array,'Not Available');
                      array_push($match_relationship_array,'Not Available');
                }    
                $highestPercentageOfSrno = $per =0;
                $highestPercentageSrno = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_sr_no_array);
               // print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfSrno = $per;
                  $highestPercentageSrno = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfSrno = $per;
                  $highestPercentageSrno = $match_str;
                  }  
                  if($per < 0){
                  $highestPercentageOfSrno = 0;
                  $highestPercentageSrno = $match_str;
                  }
                }
                

                if($highestPercentageSrno == 'Not Available') 
                  $highestPercentageOfSrno = 0;
                

                if($highestPercentageOfSrno == 100 )
                  $color_srno = '#238823';
                elseif($highestPercentageOfSrno >= 50)
                  $color_srno = '#FFBF00';
                else  
                  $color_srno = '#d2222d';

                  
                  $highestPercentageOfDoc = $per =0;
                  $highestPercentagedoc = $match_string ="";
                  $res = array();
                  
                  
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_doc_array);
                 // print_r($res);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                  if(count($res) > 0){
                    if($per > 0){
                    $highestPercentageOfDoc = $per;
                    $highestPercentagedoc = $match_str;
                    }
                    if($per == 0){
                    $highestPercentageOfDoc = $per;
                    $highestPercentagedoc = $match_str;
                    }  
                    if($per < 0){
                    $highestPercentageOfDoc = 0;
                    $highestPercentagedoc = $match_str;
                    }
                  }
                  
  
                  if($highestPercentagedoc == 'Not Available') 
                    $highestPercentageOfDoc = 0;
                  
  
                  if($highestPercentageOfDoc == 100 )
                    $color_doc = '#238823';
                  elseif($highestPercentageOfDoc >= 50)
                    $color_doc = '#FFBF00';
                  else  
                    $color_doc = '#d2222d';
  
                    
                $highestPercentageOfSname = $per =0;
                $highestPercentagesname = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_seller_array);
               // print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfSname = $per;
                  $highestPercentagesname = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfSname = $per;
                  $highestPercentagesname = $match_str;
                  }
                  if($per < 0){
                    $highestPercentageOfSname = 0;
                    $highestPercentagesname = $match_str;
                    }  
                }
                

                if($highestPercentagesname == 'Not Available') 
                  $highestPercentageOfSname = 0;

                if($highestPercentageOfSname == 100 )
                  $color_sname = '#238823';
                elseif($highestPercentageOfSname >= 50)
                  $color_sname = '#FFBF00';
                else  
                  $color_sname = '#d2222d';

                  $highestPercentageOfPname = $per =0;
                  $highestPercentagepname = $match_string ="";
                  $res = array();
                  
                  
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_purchaser_array);
                 // print_r($res);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                  if(count($res) > 0){
                    if($per > 0){
                    $highestPercentageOfPname = $per;
                    $highestPercentagepname = $match_str;
                    }
                    if($per == 0){
                    $highestPercentageOfPname = $per;
                    $highestPercentagepname = $match_str;
                    }
                    if($per < 0){
                    $highestPercentageOfPname = 0;
                    $highestPercentagepname = $match_str;
                    }  
                  }
                  
  
                  if($highestPercentagepname == 'Not Available') 
                    $highestPercentageOfPname = 0;
                  
  
                  if($highestPercentageOfPname == 100 )
                    $color_pname = '#238823';
                  elseif($highestPercentageOfPname >= 50)
                    $color_pname = '#FFBF00';
                  else  
                    $color_pname = '#d2222d';
  
                    $highestPercentageOfRname = $per =0;
                    $highestPercentagername = $match_string ="";
                    $res = array();
                    
                    
                    $res = \SraHelper::instance()->integration_return_value_percentage_data($match_relationship_array);
                   // print_r($res);
                    $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfRname = $per;
                      $highestPercentagername = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfRname = $per;
                      $highestPercentagername = $match_str;
                      }
                      if($per < 0){
                      $highestPercentageOfRname = 0;
                      $highestPercentagername = $match_str;
                      }  
                    }
                    
    
                    if($highestPercentagername == 'Not Available') 
                      $highestPercentageOfRname = 0;
                    
    
                    if($highestPercentageOfRname == 100 )
                      $color_rname = '#238823';
                    elseif($highestPercentageOfRname >= 50)
                      $color_rname = '#FFBF00';
                    else  
                      $color_rname = '#d2222d';
    
                      
                $highestPercentageOfDate = $per =0;
                $highestPercentagedate = $match_string ="";
                $res = array();
                
                
                $res = \SraHelper::instance()->integration_return_value_percentage_data($match_date_array);
               // print_r($res);
                $match_str = $res['match_string'];$per = $res['percentage'];
                if(count($res) > 0){
                  if($per > 0){
                  $highestPercentageOfDate = $per;
                  $highestPercentagedate = $match_str;
                  }
                  if($per == 0){
                  $highestPercentageOfDate = $per;
                  $highestPercentagedate = $match_str;
                  }  
                  if($per < 0){
                    $highestPercentageOfDate = 0;
                    $highestPercentagedate = $match_str;
                    }
                }
                

                if($highestPercentagedate == 'Not Available') 
                  $highestPercentageOfDate = 0;
                

                if($highestPercentageOfDate == 100 )
                  $color_date = '#238823';
                elseif($highestPercentageOfDate >= 50)
                  $color_date = '#FFBF00';
                else  
                  $color_date = '#d2222d';

                  // die;
                ?>
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
                            <th width="10%">#</th>
                            <th width="10%">Type</th>
                            <th width="20%">Date</th>
                            <th width="20%">Seller</th>
                            <th width="10%">Purchaser</th>
                            <th width="10%">Relationship</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            @foreach($query as $data)
                              <td width="10%">Not Available</td>
                              <td width="10%">Not Available</td>
                              <td width="20%">Not Available</td>
                              <td width="20%">Not Available</td>
                              <td width="10%">Not Available</td>
                              <td width="10%">Not Available</td>
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
                              <th width="10%">#</th>
                              <th width="10%">Type</th>
                              <th width="20%">Date</th>
                              <th width="20%">Seller</th>
                              <th width="10%">Purchaser</th>
                              <th width="10%">Relationship</th>
                              </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="10%">{{ isset($documents[0]->sr_no)?$documents[0]->sr_no:'Not Available'; }}</td>
                            <td width="10%">{{ isset($documents[0]->document)?$documents[0]->document:'Not Available'; }}</td>
                            <td width="20%">
                            <?php 
                            if(isset($documents[0]->aggrement_date)){
                              $datetime = new DateTime($documents[0]->aggrement_date);
  
                              // Calling the format() function with a 
                              // specified format 'd-m-Y'
                              echo $datetime->format('d-F-Y');
                            }else{
                              echo "Not Available";
                            }
                            ?>
                            </td>
                            <td width="20%">{{ isset($documents[0]->seller_name)?$documents[0]->seller_name:'Not Available'; }}</td>
                            <td width="10%">{{ isset($documents[0]->purchaser_name  )?$documents[0]->purchaser_name :'Not Available'; }}</td>
                            <td width="10%">{{ isset($documents[0]->relationship)?$documents[0]->relationship:'Not Available'; }}</td>
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
                          <div class="card-body" style="text-align: center;">
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
                                      echo '<img src="http://sra-uat.apniamc.in/images/'.$img_new.'" onclick="openModal();currentSlide('.$i.')" class="hover-shadow"  style=\"height:320px;width:100%;\">' ;
                                      echo '</div>';
                                      $i++;
                                      break;
                                    }
                                } elseif ($mime_type === 'pdf') {
                                    echo "<img src=\"http://sra-uat.apniamc.in/images/pdf_img.png\" data-src=\"$img_url\" width=\"100%\" height=\"100%\" id=\"myImg_pdf\" >";
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
                                  </div>

                            </div>

                            <!-- start-->
                            <div id="myModal_pdf" class="modal" style="left:5%;height:60% !important;">
                              <div class="row">
                                  <div class="col-md-1"></div>
                                  <div class="col-md-10">
                                    <div style="left:15px;"><span class="close" onclick="closeModal_pdf()">&times;</span></div>
                                    <embed class="modal-content"  id="img012" width="500" height="375" type='application/pdf' style="max-width:90%;">
                                    <div id="caption"></div>
                                  </div>
                                  <div class="col-md-1">
                                    
                                  </div>
                                </div>
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
                                      <?php if(count($query_data2) > 0){ ?>
                                      <table class="table table-borderless table-responsive">
                                        <thead>
                                            <tr>
                                              <th width="10%">#</th>
                                              <th width="10%">Type</th>
                                              <th width="20%">Date</th>
                                              <th width="20%">Seller</th>
                                              <th width="10%">Purchaser</th>
                                              <th width="10%">Relationship</th>
                                              </tr>
                                        </thead>
                                        <tbody>
                                         
                                            <tr>
                                                        <td width="10%"><?php echo $query_data2[0]->sr_no; ?></td>
                                                        <td width="10%"><?php echo $query_data2[0]->document; ?></td>
                                                        <td width="20%"><?php echo $query_data2[0]->agreement_date; ?></td>
                                                        <td width="20%"><?php echo $query_data2[0]->seller_name; ?></td>
                                                        <td width="10%"><?php echo $query_data2[0]->purchaser_name; ?></td>
                                                        <td width="10%"><?php echo $query_data2[0]->relationship; ?></td>
                                                    </tr>
                                                     <tr>
                                                        <td width="10%"><?php echo $query_data2[1]->sr_no; ?></td>
                                                        <td width="10%"><?php echo $query_data2[1]->document; ?></td>
                                                        <td width="20%"><?php echo $query_data2[1]->agreement_date; ?></td>
                                                        <td width="20%"><?php echo $query_data2[1]->seller_name; ?></td>
                                                        <td width="10%"><?php echo $query_data2[1]->purchaser_name; ?></td>
                                                        <td width="10%"><?php echo $query_data2[1]->relationship; ?></td>
                                                    </tr>
                                                   <tr>
                                                        <td width="10%"><?php echo $query_data2[2]->sr_no; ?></td>
                                                        <td width="10%"><?php echo $query_data2[2]->document; ?></td>
                                                        <td width="20%"><?php echo $query_data2[2]->agreement_date; ?></td>
                                                        <td width="20%"><?php echo $query_data2[2]->seller_name; ?></td>
                                                        <td width="10%"><?php echo $query_data2[2]->purchaser_name; ?></td>
                                                        <td width="10%"><?php echo $query_data2[2]->relationship; ?></td>
                                                    </tr>
                                          <?php }else {?>
                                            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.sra.storemanualdata_agreement') }}">
                                              @csrf
                                              <input type="hidden" id="hut_id" name="hut_id" value=<?= $hid; ?> required>
                                              <input type="hidden" id="year" name="year" value="1">
                                              <table id="manual-data-table">
                                                  <tr>
                                                      <th width="10%">#</th>
                                                      <th width="10%">Type</th>
                                                      <th width="20%">Date</th>
                                                      <th width="20%">Seller</th>
                                                      <th width="10%">Purchaser</th>
                                                      <th width="10%">Relationship</th>
                                                  </tr>
                                                  <tr class="manual-data-row">
                                                      <td width="10%"><input type="text" class="form-control" name="sr_no1"></td>
                                                      <td width="10%"><input type="text" class="form-control" name="type_doc1"></td>
                                                      <td width="20%"><input type="text" class="form-control" name="agg_date1"></td>
                                                      <td width="20%"><input type="text" class="form-control" name="name_seller1"></td>
                                                      <td width="10%"><input type="text" class="form-control" name="name_purchaser1"></td>
                                                      <td width="10%"><input type="text" class="form-control" name="relationship1"></td>
                                                  </tr>
                                              </table>
                                              <br>
                                              <button type="button" class="btn btn-primary" id="add-row-btn">Add More</button>
                                              @hasAccess('admin.sra.vendor_remark')
                                                  <button id="submitBtn2000" type="submit" class="btn btn-primary ml-auto btn-actions btn-create">Manual Data</button>
                                              @endHasAccess
                                          </form>
                                          
                                          <script>
                                              $(document).ready(function () {
                                                  var rowNumber = 1;
                                          
                                                  $('#add-row-btn').click(function () {
                                                      var newRowHtml = '<tr class="manual-data-row">'
                                                              + '<td><input type="text" class="form-control" name="sr_no' + (rowNumber + 1) + '"></td>'
                                                              + '<td><input type="text" class="form-control" name="type_doc' + (rowNumber + 1) + '"></td>'
                                                              + '<td><input type="text" class="form-control" name="agg_date' + (rowNumber + 1) + '"></td>'
                                                              + '<td><input type="text" class="form-control" name="name_seller' + (rowNumber + 1) + '"></td>'
                                                              + '<td><input type="text" class="form-control" name="name_purchaser' + (rowNumber + 1) + '"></td>'
                                                              + '<td><input type="text" class="form-control" name="relationship' + (rowNumber + 1) + '"></td>'
                                                              + '</tr>';
                                                      $('#manual-data-table').append(newRowHtml);
                                                      rowNumber++;
                                                  });
                                              });
                                          </script>
                                          
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
                                    <th width="10%" style="background-color:<?= $color_srno; ?>;color:#fff;padding: 5px !important;"># ({{round($highestPercentageOfSrno)}}%)</th>
                                    <th width="10%" style="background-color:<?= $color_doc; ?>;color:#fff;padding: 5px !important;">Type ({{round($highestPercentageOfDoc)}}%) </th>
                                    <th width="20%" style="background-color:<?= $color_date; ?>;color:#fff;padding: 5px !important;">Date ({{round($highestPercentageOfDate)}}%)</th>
                                    <th width="20%" style="background-color:<?= $color_sname; ?>;color:#fff;padding: 5px !important;">Seller ({{round($highestPercentageOfSname)}}%)</th>
                                    <th width="10%" style="background-color:<?= $color_pname; ?>;color:#fff;padding: 5px !important;">Purchaser ({{round($highestPercentageOfPname)}}%)</th>
                                    <th width="10%" style="background-color:<?= $color_rname; ?>;color:#fff;padding: 5px !important;">Relationship ({{round($highestPercentageOfRname)}}%)</th>
                                  </tr>
                                  <tr>
                                <td width="10%">{{ isset($highestPercentageSrno)?$highestPercentageSrno:'Not Available'}}</td>
                                 <td width="10%">{{ isset($highestPercentagedoc)?$highestPercentagedoc:'Not Available'}}</td>
                                <td width="20%">{{ isset($highestPercentagedate)?$highestPercentagedate:'Not Available'}}</td>
                                <td width="20%">{{ isset($highestPercentagesname)?$highestPercentagesname:'Not Available'}}</td>
                                <td width="10%">{{ isset($highestPercentagepname)?$highestPercentagepname:'Not Available'}}</td>
                                <td width="10%">{{ isset($highestPercentagername)?$highestPercentagername:'Not Available'}}</td>
                              </tr>
                              <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_agreement') }}">
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
                                      if($query_data[0]->eligibility_srno == 0){
                                        echo "Not Available";
                                      }
                                      if($query_data[0]->eligibility_srno == 1){
                                        echo "Manual";
                                      }
                                      if($query_data[0]->eligibility_srno == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($query_data[0]->eligibility_type == 0){
                                        echo "Not Available";
                                      }
                                      if($query_data[0]->eligibility_type == 1){
                                        echo "Manual";
                                      }
                                      if($query_data[0]->eligibility_type == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($query_data[0]->eligibility_aggrement_date == 0){
                                        echo "Not Available";
                                      }
                                      if($query_data[0]->eligibility_aggrement_date == 1){
                                        echo "Manual";
                                      }
                                      if($query_data[0]->eligibility_aggrement_date == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($query_data[0]->eligibility_seller_name == 0){
                                        echo "Not Available";
                                      }
                                      if($query_data[0]->eligibility_seller_name == 1){
                                        echo "Manual";
                                      }
                                      if($query_data[0]->eligibility_seller_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($query_data[0]->eligibility_purchaser_name == 0){
                                        echo "Not Available";
                                      }
                                      if($query_data[0]->eligibility_purchaser_name == 1){
                                        echo "Manual";
                                      }
                                      if($query_data[0]->eligibility_purchaser_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($query_data[0]->eligibility_relationship == 0){
                                        echo "Not Available";
                                      }
                                      if($query_data[0]->eligibility_relationship == 1){
                                        echo "Manual";
                                      }
                                      if($query_data[0]->eligibility_relationship == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                   <?php } else { ?>
                                <td width="10%">
                                <?php
                                  if(isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg1" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                  }
                                ?>
                                </td>
                                <td width="10%">
                                <?php
                                  if(isset($highestPercentageOfDoc) && $highestPercentageOfDoc == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg2" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfDoc) && $highestPercentageOfDoc < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfDoc) && $highestPercentageOfDoc == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                  }
                                ?>
                                </td>
                                <td width="10%">
                                <?php
                                  if(isset($highestPercentageOfDate) && $highestPercentageOfDate == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg3" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfDate) && $highestPercentageOfDate < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfDate) && $highestPercentageOfDate == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                  }
                                ?>
                                </td>
                                <td width="10%">
                                <?php
                                  if(isset($highestPercentageOfSname) && $highestPercentageOfSname == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg4" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfSname) && $highestPercentageOfSname < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2"  {{ isset($highestPercentageOfSname) && $highestPercentageOfSname == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                    }
                                ?>
                                </td>
                                <td width="10%">
                                <?php
                                  if(isset($highestPercentageOfPname) && $highestPercentageOfPname == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg5" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfPname) && $highestPercentageOfPname < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfPname) && $highestPercentageOfPname == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                    }
                                ?>
                                </td>
                                <td width="10%">
                                <?php
                                  if(isset($highestPercentageOfRname) && $highestPercentageOfRname == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg6" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfRname) && $highestPercentageOfRname < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfRname) && $highestPercentageOfRname == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                    }
                                ?>
                                </td>
                                 <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/><b>Remark :</b></td>
                              </tr>

                              <tr>
                                <?php if (count($query_data) > 0) { ?>
                                <td width="10%">{{ isset($query_data[0]->remark_srno)?$query_data[0]->remark_srno:''}}</td>
                                <td width="10%">{{ isset($query_data[0]->remark_type)?$query_data[0]->remark_type:''}}</td>
                                <td width="20%">{{ isset($query_data[0]->remark_aggrement_date)?$query_data[0]->remark_aggrement_date:''}}</td>
                                <td width="20%">{{ isset($query_data[0]->remark_seller_name)?$query_data[0]->remark_seller_name:''}}</td>
                                <td width="10%">{{ isset($query_data[0]->remark_purchaser_name)?$query_data[0]->remark_purchaser_name:''}}</td>
                                <td width="10%">{{ isset($query_data[0]->remark_relationship)?$query_data[0]->remark_relationship:''}}</td>
                                <?php }else { ?>

                                <td width="10%"><input type="text" class="form-control"  name="remark1" value="{{ isset($query_data[0]->remark_srno)?$query_data[0]->remark_srno:''}}" required></td>
                                <td width="10%"><input type="text" class="form-control"  name="remark2" value="{{ isset($query_data[0]->remark_type)?$query_data[0]->remark_type:''}}" required></td>
                                <td width="20%"><input type="text" class="form-control"  name="remark3" value="{{ isset($query_data[0]->remark_aggrement_date)?$query_data[0]->remark_aggrement_date:''}}" required></td>
                                <td width="20%"><input type="text" class="form-control"  name="remark4" value="{{ isset($query_data[0]->remark_seller_name)?$query_data[0]->remark_seller_name:''}}" required></td>
                                <td width="10%"><input type="text" class="form-control"  name="remark5" value="{{ isset($query_data[0]->remark_purchaser_name)?$query_data[0]->remark_purchaser_name:''}}" required></td>
                                <td width="10%"><input type="text" class="form-control"  name="remark6" value="{{ isset($query_data[0]->remark_relationship)?$query_data[0]->remark_relationship:''}}" required></td>
                                <?php } ?>

                              </tr>
                              <tr>
                                <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                            <td ><b>Section Status :</b></td>
                            <td ><b>Section Remark :</b></td>
                            <?php
                          if(isset($highestPercentagepname) && isset($highestPercentagesname) && isset($highestPercentagedate) ){
                              $remark = "Agreement Document with Dated ".$highestPercentagedate. " with seller " .$highestPercentagesname. " and purcharser ".$highestPercentagepname;
                          }else{
                              $remark = "";
                          }
                          // print_r($remark);die;
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
                                    <th width="10%" style="background-color:<?= $color_srno; ?>;color:#fff;padding: 5px !important;">#  ({{round($highestPercentageOfSrno)}}%)</th>
                                    <th width="10%" style="background-color:<?= $color_doc; ?>;color:#fff;padding: 5px !important;">Type ({{round($highestPercentageOfDoc)}}%)</th>
                                    <th width="20%" style="background-color:<?= $color_date; ?>;color:#fff;padding: 5px !important;"> Date ({{round($highestPercentageOfDate)}}%)</th>
                                    <th width="20%" style="background-color:<?= $color_sname; ?>;color:#fff;padding: 5px !important;">Seller ({{round($highestPercentageOfSname)}}%)</th>
                                    <th width="10%" style="background-color:<?= $color_pname; ?>;color:#fff;padding: 5px !important;">Purchaser ({{round($highestPercentageOfPname)}}%)</th>
                                    <th width="10%" style="background-color:<?= $color_rname; ?>;color:#fff;padding: 5px !important;">Relationship ({{round($highestPercentageOfRname)}}%)</th>
                                  </tr>
                                  <tr>
                                <td width="10%">{{ isset($highestPercentageSrno)?$highestPercentageSrno:'Not Available'}}</td>
                                 <td width="10%">{{ isset($highestPercentagedoc)?$highestPercentagedoc:'Not Available'}}</td>
                                <td width="20%">{{ isset($highestPercentagedate)?$highestPercentagedate:'Not Available'}}</td>
                                <td width="20%">{{ isset($highestPercentagesname)?$highestPercentagesname:'Not Available'}}</td>
                                <td width="10%">{{ isset($highestPercentagepname)?$highestPercentagepname:'Not Available'}}</td>
                                <td width="10%">{{ isset($highestPercentagername)?$highestPercentagername:'Not Available'}}</td>
                              </tr>
                              <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_agreement') }}">
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
                                      if($recomm_remarks_ca[0]->eligibility_srno == 0){
                                        echo "Not Available";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_srno == 1){
                                        echo "Manual";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_srno == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($recomm_remarks_ca[0]->eligibility_type == 0){
                                        echo "Not Available";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_type == 1){
                                        echo "Manual";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_type == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($recomm_remarks_ca[0]->eligibility_aggrement_date == 0){
                                        echo "Not Available";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_aggrement_date == 1){
                                        echo "Manual";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_aggrement_date == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($recomm_remarks_ca[0]->eligibility_seller_name == 0){
                                        echo "Not Available";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_seller_name == 1){
                                        echo "Manual";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_seller_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($recomm_remarks_ca[0]->eligibility_purchaser_name == 0){
                                        echo "Not Available";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_purchaser_name == 1){
                                        echo "Manual";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_purchaser_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($recomm_remarks_ca[0]->eligibility_relationship == 0){
                                        echo "Not Available";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_relationship == 1){
                                        echo "Manual";
                                      }
                                      if($recomm_remarks_ca[0]->eligibility_relationship == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                   <?php } else { ?>
                                <td width="10%">
                                <?php
                                  if(isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg1" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                      <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                          <option value="0">-- Select Option --</option>
                                          <option value="1" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : '' }}>Manual</option>
                                          <option value="2" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : '' }}>Auto</option>
                                      </select>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td width="10%">
                                  <?php
                                if(isset($highestPercentageOfDoc) && $highestPercentageOfDoc == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg2" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfDoc) && $highestPercentageOfDoc < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfDoc) && $highestPercentageOfDoc == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                    }
                                ?>
                                </td>
                                <td width="10%">
                                <?php
                                if(isset($highestPercentageOfDate) && $highestPercentageOfDate == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg3" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfDate) && $highestPercentageOfDate < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfDate) && $highestPercentageOfDate == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                    }
                                ?>
                                </td>
                                <td width="10%">
                                <?php
                                if(isset($highestPercentageOfSname) && $highestPercentageOfSname == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg4" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfSname) && $highestPercentageOfSname < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2"  {{ isset($highestPercentageOfSname) && $highestPercentageOfSname == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                    }
                                ?>
                                </td>
                                <td width="10%">
                                <?php
                                if(isset($highestPercentageOfPname) && $highestPercentageOfPname == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg5" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfPname) && $highestPercentageOfPname < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfPname) && $highestPercentageOfPname == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                    }
                                ?>
                                </td>
                                <td width="10%">
                                <?php
                                if(isset($highestPercentageOfRname) && $highestPercentageOfRname == 100)
                                    {
                                      ?>
                                        <input type="text" class="form-control" name="elg6" value="Auto" readyonly>
                                      <?php
                                    }else{
                                      ?>
                                <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfRname) && $highestPercentageOfRname < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfRname) && $highestPercentageOfRname == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                <?php
                                }
                                ?>
                                </td>
                              <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/><b>Remark :</b></td>
                              </tr>

                              <tr>
                                 <?php if (count($recomm_remarks_ca) > 0) { ?>
                                <td width="10%">{{ isset($recomm_remarks_ca[0]->remark_srno)?$recomm_remarks_ca[0]->remark_srno:''}}</td>
                                <td width="10%">{{ isset($recomm_remarks_ca[0]->remark_type)?$recomm_remarks_ca[0]->remark_type:''}}</td>
                                <td width="20%">{{ isset($recomm_remarks_ca[0]->remark_aggrement_date)?$recomm_remarks_ca[0]->remark_aggrement_date:''}}</td>
                                <td width="20%">{{ isset($recomm_remarks_ca[0]->remark_seller_name)?$recomm_remarks_ca[0]->remark_seller_name:''}}</td>
                                <td width="10%">{{ isset($recomm_remarks_ca[0]->remark_purchaser_name)?$recomm_remarks_ca[0]->remark_purchaser_name:''}}</td>
                                <td width="10%">{{ isset($recomm_remarks_ca[0]->remark_relationship)?$recomm_remarks_ca[0]->remark_relationship:''}}</td>
                                <?php }else { ?>
                                <td width="10%"><input type="text" class="form-control"  name="remark1_ca" value="{{ isset($recomm_remarks_ca[0]->remark_srno)?$recomm_remarks_ca[0]->remark_srno:''}}" required></td>
                                <td width="10%"><input type="text" class="form-control"  name="remark2_ca" value="{{ isset($recomm_remarks_ca[0]->remark_type)?$recomm_remarks_ca[0]->remark_type:''}}" required></td>
                                <td width="20%"><input type="text" class="form-control"  name="remark3_ca" value="{{ isset($recomm_remarks_ca[0]->remark_aggrement_date)?$recomm_remarks_ca[0]->remark_aggrement_date:''}}" required></td>
                                <td width="20%"><input type="text" class="form-control"  name="remark4_ca" value="{{ isset($recomm_remarks_ca[0]->remark_seller_name)?$recomm_remarks_ca[0]->remark_seller_name:''}}" required></td>
                                <td width="10%"><input type="text" class="form-control"  name="remark5_ca" value="{{ isset($recomm_remarks_ca[0]->remark_purchaser_name)?$recomm_remarks_ca[0]->remark_purchaser_name:''}}" required></td>
                                <td width="10%"><input type="text" class="form-control"  name="remark6_ca" value="{{ isset($recomm_remarks_ca[0]->remark_relationship)?$recomm_remarks_ca[0]->remark_relationship:''}}" required></td>
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
                                <textarea class="form-control" style="height:auto!important;"  name="remark" {{ isset($recomm_remarks_ca[0]->overall_remark) ? 'readonly' : '' }} cols="100">{{ isset($recomm_remarks_ca[0]->overall_remark) ? $recomm_remarks_ca[0]->overall_remark :  $remark }}</textarea>
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
                                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.store_overall_remark') }}" name="myForm" id="myForm" onsubmit="return validateForm();">
                                    @csrf
                                    <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                                    <input type="hidden" name="user" value="{{auth()->user()->id}}">
                                    <input type="hidden" name="type" value="agreement">
                                    <tr>
                                      <td>
                                        <div class="form-group">
                                        <label>Status:</label>
                                        <select name="elg" class="form-control" required>
                                          <?php if(count($overall_remark) == 0){ ?>
                                             <option value="0">-- Select Option --</option>
                                             <option value="1" >Verified</option>
                                             <option value="2" >Not Matched</option>
                                             <option value="3" >Unavailable</option>
                                          <?php }else{ ?>
                                            <?php if($overall_remark[0]->agreement_status == 0){ ?>
                                                <option value="0" selected="">-- Select Option --</option>
                                              <?php }else{ ?>
                                                <option value="0">-- Select Option --</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->agreement_status == 1){ ?>
                                                <option value="1" selected="">Verified</option>
                                              <?php }else{ ?>
                                                <option value="1" >Verified</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->agreement_status == 2){ ?>
                                                <option value="2" selected="">Not Matched</option>
                                              <?php }else{ ?>
                                                <option value="2" >Not Matched</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->agreement_status == 3){ ?>
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
                                          <textarea name="remark" cols="100" class="form-control" required> </textarea>
                                        <?php }else{ ?>
                                           <textarea name="remark" cols="100" class="form-control">{{$overall_remark[0]->agreement_remark}}</textarea>
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
                <input type="radio" name="css-tabs" id="tab-7" class="tab-switch">
                 <a href="index.php/sra/adhar/{{$hid}}" class="tab-label" style="color:#495057!important;">Aadhar Card</a>
                <div class="tab-content">Aadhar Card Details</div>
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
<!-- Warning Msg Script -->
<script>
   function validateForm() {
   
    var remarkValue = document.forms["myForm"]["remark"].value;
    if (remarkValue.trim() === "") {
      alert("Please enter an overall remark.");
      return false;
    }

   

   }
  </script>
  <script>
    $(document).ready(function() {
        // Hide success message after 5 seconds
        setTimeout(function() {
            $('.alert-success').fadeOut('slow');
        }, 5000);
    });
</script>






