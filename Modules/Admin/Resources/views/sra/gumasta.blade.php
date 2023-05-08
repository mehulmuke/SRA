
@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('admin::sra.sradetailtitle')))
    <li class="nav-item">
        <a href="#">
            {{ clean(trans('admin::sra.sradetailtitle')) }}
        </a>
    </li>
@endcomponent
<?php 
 function wordSimilarity2($s1,$s2) {

                  $words1 = preg_split('/\s+/',$s1);
                  $words2 = preg_split('/\s+/',$s2);
                  $diffs1 = array_diff($words2,$words1);
                  $diffs2 = array_diff($words1,$words2);

                  $diffsLength = strlen(join("",$diffs1).join("",$diffs2));
                  $wordsLength = strlen(join("",$words1).join("",$words2));
                  if(!$wordsLength) return 0;

                  $differenceRate = ( $diffsLength / $wordsLength );
                  $similarityRate = 1 - $differenceRate;
                  return $similarityRate;

              }
              function wordSimilarity3($s1, $s2, $s3 = null) {
                  $words1 = preg_split('/\s+/', $s1);
                  $words2 = preg_split('/\s+/', $s2);
                  $diffs1 = array_diff($words2, $words1);
                  $diffs2 = array_diff($words1, $words2);
                  
                  if ($s3) {
                      $words3 = preg_split('/\s+/', $s3);
                      $diffs3 = array_diff($words2, $words3);
                      $diffs4 = array_diff($words1, $words3);
                      $diffsLength = strlen(join("", $diffs1) . join("", $diffs2) . join("", $diffs3) . join("", $diffs4));
                      $wordsLength = strlen(join("", $words1) . join("", $words2) . join("", $words3));
                  } else {
                      $diffsLength = strlen(join("", $diffs1) . join("", $diffs2));
                      $wordsLength = strlen(join("", $words1) . join("", $words2));
                  }
                  
                  if (!$wordsLength) return 0;
                  
                  $differenceRate = ($diffsLength / $wordsLength);
                  $similarityRate = 1 - $differenceRate;
                  return $similarityRate;
              }
?>
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

@keyframes zoom {
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
                    foreach($intgrate_data as $data)
                    {
                      if($data->year == 1)
                      {
                        $int_data_2000 = $data;
                      }
                      if($data->year == 2)
                      {
                        $int_data_2000_2011 = $data;
                      }
                      if($data->year == 3)
                      {
                        $int_data_current = $data;
                      }
                    }
                     $match_name_array = $match_address_array = $match_license_array = $match_date_array = $match_valid_array = $match_org_array = array();
                    foreach($query as $data)
                    {
                      $name_sims = $data->HUTOWNERNAME;
                       array_push($match_name_array,$data->HUTOWNERNAME);
                      $address_sims = $data->Address;
                       array_push($match_address_array,$data->Address);
                      $org_sims = 'Not Available';
                       array_push($match_org_array,'Not Available');
                      $license_no_sims = 'Not Available';
                       array_push($match_license_array,'Not Available');
                      $license_issue_date_sims = 'Not Available';
                       array_push($match_date_array,'Not Available');
                      $valid_upto_sims = 'Not Available';
                       array_push($match_valid_array,'Not Available');

                    }
                   $match_name = $match_address = $match_lic_no = $match_data = $match_license_issue_date = $match_valid_upto = array();

                $name_int=$address_int=$license_issue_date_int=$license_no_int=$valid_upto_int = $organization_int = '';
                $name_doc=$address_doc=$license_issue_date_doc=$license_no_doc=$valid_upto_doc = $organization_doc ='';
                    if(count($intgrate_data) > 0){
                       foreach($intgrate_data as $data)
                      {
                        if($data->year == '1')
                        {
                          $name_int = $data->name;
                          array_push($match_name_array,$data->name);
                          $organization_int = $data->organisation_name;
                          array_push($match_org_array,$data->organisation_name);
                          $address_int = $data->address;
                          array_push($match_address_array,$data->address);
                          $license_no_int = $data->License_no;
                          array_push($match_license_array,$data->License_no);
                          $license_issue_date_int = $data->License_issue_date;
                          array_push($match_date_array,$data->License_issue_date);
                          $valid_upto_int = $data->License_exp_date;
                          array_push($match_valid_array,$data->License_exp_date);
                        }
                      }
                    }else{
                      array_push($match_name_array,'Not Available');
                      array_push($match_address_array,'Not Available');
                       array_push($match_org_array,'Not Available');
                       array_push($match_license_array,'Not Available');
                       array_push($match_date_array,'Not Available');
                       array_push($match_valid_array,'Not Available');
                    }

                     if(count($documents) > 0){
                      foreach($documents as $data)
                    {
                      if($data->year == '2000')
                      {
                        $name_doc = $data->owner_name;
                         array_push($match_name_array,$data->owner_name);
                        $organization_doc = $data->organization_name;
                         array_push($match_org_array,$data->organization_name);
                        $address_doc = $data->address;
                         array_push($match_address_array,$data->address);
                        $license_no_doc = $data->license_number;
                         array_push($match_license_array,$data->license_number);
                        $license_issue_date_doc = $data->license_issue_date;
                         array_push($match_date_array,$data->license_issue_date);
                        $valid_upto_doc = $data->valid_upto;
                         array_push($match_valid_array,$data->valid_upto);
                      }
                    }
                     }else{
                      array_push($match_name_array,'Not Available');
                      array_push($match_address_array,'Not Available');
                       array_push($match_org_array,'Not Available');
                       array_push($match_license_array,'Not Available');
                       array_push($match_date_array,'Not Available');
                       array_push($match_valid_array,'Not Available');
                     }
                   
                    
                    if($name_sims != 'Not Available')
                {

                  //new code start
                  $highestPercentageOfName = $per =0;
                  $highestPercentageName = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_name_array);
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
                }

                if($address_sims != 'Not Available')
                {

                 $highestPercentageOfAddress = $per =0;
                  $highestPercentageAddress = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_address_array);
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

                  //end
                  if($highestPercentageOfAddress == 100 )
                    $color_address = '#238823';
                  elseif($highestPercentageOfAddress >= 50)
                    $color_address = '#FFBF00';
                  else  
                    $color_address = '#d2222d';
                }
                

                //license start
                 
                $highestPercentageOfLicNo = $per =0;
                  $highestPercentageLicNo = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_license_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfLicNo = $per;
                      $highestPercentageLicNo = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfLicNo = $per;
                      $highestPercentageLicNo = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfLicNo = 0;
                      $highestPercentageLicNo = $match_str;
                      }
                    }
                  if($highestPercentageLicNo == 'Not Available') 
                  $highestPercentageOfLicNo = 0;

                                    
                  if($highestPercentageOfLicNo == 100 )
                    $color_lic_no = '#238823';
                  elseif($highestPercentageOfLicNo >= 50)
                    $color_lic_no = '#FFBF00';
                  else  
                    $color_lic_no = '#d2222d';
                
                  //licence end

               
                  //licence date start
                  $highestPercentageOfIssueDate = $per =0;
                  $highestPercentageIssueDate = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_date_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfIssueDate = $per;
                      $highestPercentageIssueDate = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfIssueDate = $per;
                      $highestPercentageIssueDate = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfIssueDate = 0;
                      $highestPercentageIssueDate = $match_str;
                      }
                    }
                  if($highestPercentageIssueDate == 'Not Available') 
                  $highestPercentageOfIssueDate = 0;
                 
                
                  if($highestPercentageOfIssueDate == 100 )
                    $color_issue_date = '#238823';
                  elseif($highestPercentageOfIssueDate >= 50)
                    $color_issue_date = '#FFBF00';
                  else  
                    $color_issue_date = '#d2222d';
                
                //licence date end

              
                  //valid start
                  $highestPercentageOfvalidUpto = $per =0;
                  $highestPercentagevalideUpto = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_valid_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfvalidUpto = $per;
                      $highestPercentagevalideUpto = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfvalidUpto = $per;
                      $highestPercentagevalideUpto = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfvalidUpto = 0;
                      $highestPercentagevalideUpto = $match_str;
                      }
                    }
                  if($highestPercentagevalideUpto == 'Not Available') 
                  $highestPercentageOfvalidUpto = 0;
                 
                  if($highestPercentageOfvalidUpto == 100 )
                    $color_valid = '#238823';
                  elseif($highestPercentageOfvalidUpto >= 50)
                    $color_valid = '#FFBF00';
                  else  
                    $color_valid = '#d2222d';

                  //valid end

                //organization start
                 $highestPercentageOfOrg = $per =0;
                  $highestPercentageOrg = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_org_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfOrg = $per;
                      $highestPercentageOrg = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfOrg = $per;
                      $highestPercentageOrg = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfOrg = 0;
                      $highestPercentageOrg = $match_str;
                      }
                    }
                  if($highestPercentageOrg == 'Not Available') 
                  $highestPercentageOfOrg = 0;

                  if($highestPercentageOfOrg == 100 )
                    $color_org_name = '#238823';
                  elseif($highestPercentageOfOrg >= 50)
                    $color_org_name = '#FFBF00';
                  else  
                    $color_org_name = '#d2222d';
                  //end

                if($highestPercentageLicNo == '')
                  $highestPercentageLicNo = 'Not Available';
                if($highestPercentageOrg == '')
                  $highestPercentageOrg = 'Not Available';
                if($highestPercentageIssueDate == '')
                  $highestPercentageIssueDate = 'Not Available';
                if($highestPercentageName == '')
                  $highestPercentageName = 'Not Available';
                if($highestPercentageAddress == '')
                  $highestPercentageAddress = 'Not Available';
                if($highestPercentagevalideUpto == '')
                  $highestPercentagevalideUpto = 'Not Available';
                ?>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-3" checked class="tab-switch">
                <label for="tab-1" class="tab-label" style="color:#fff !important;font-size:16px !important;">Gumasta</label>
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
                          Details For Year 2000 or Before

                          </a>
                        </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body" style="background-color: #dbd7d2;padding-bottom:5px;">
                            <!-- content start-->
                             <!-- Year 2000 start -->
                          <div class="col-md-12">
                           
                            <br/>
                            <div class="row">
                              <div class="col-md-9">
                                <!-- Sims start-->
                                <h4>SIMS Data</h4>
                            <div class="card">
                              <div class="card-body">
                                <div class="table-responsive" id="sra-table">
                                  <table class="table table-borderless table-responsive">
                                    <thead>
                                      <tr>
                                        <th width="10%">Number</th>
                                        <th width="10%">Issued Date</th>
                                        <th width="20%">Organization</th>
                                        <th width="20%">Owner Name</th>
                                        <th width="20%">Address</th>
                                        <th width="10%">Valid Up To</th>
                                        {{-- <th width="10%">Part No.</th> --}}
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>

                                        @foreach($query as $data)
                                          <td width="10%">Not Available</td>
                                          <td width="10%">Not Available</td>
                                          <td width="20%">Not Available</td>
                                          <td width="20%">{{$data->HUTOWNERNAME}}</td>
                                          <td width="20%">{{$data->Address}}</td>
                                          <td width="10%">Not Available</td>
                                          {{-- <td width="10%">{{$data->PropertyType}}</td> --}}
                                        @endforeach
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
                                        <th width="10%">Number</th>
                                        <th width="10%">Issued Date</th>
                                        <th width="20%">Organization</th>
                                        <th width="20%">Owner Name</th>
                                        <th width="20%">Address</th>
                                        <th width="10%">Valid Up To</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                      @if(count($documents) >= 1)
                                      @foreach($documents as $doc)
                                          @if($doc->year == '2000')
                                              <td width="10%">{{ $doc->license_number }}</td>
                                              <td width="10%">{{ $doc->license_issue_date }}</td>
                                              <td width="20%">{{ $doc->organization_name }}</td>
                                              <th width="20%">{{ $doc->owner_name }}</th>
                                              <td width="20%">{{ $doc->address }}</td>
                                              <td width="10%">{{ $doc->valid_upto }}</td>
                                          @endif
                                      @endforeach
                                  @else
                                      <td width='10%'>Not Available</td>
                                      <td width='10%'>Not Available</td>
                                      <td width='20%'>Not Available</td>
                                      <td width='20%'>Not Available</td>
                                      <td width='20%'>Not Available</td>
                                      <td width='10%'>Not Available</td>
                                  @endif

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
                                <!-- ocr image start-->
                       <div class="card">
                          <div class="card-body">
                            <?php 
                            if(isset($documents[0])){
                            ?>
                            <img src="http://sra-uat.apniamc.in/images/{{$hid}}_gumasta1.jpeg" style="height:320px;width:100%;" id="myImg" onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';">
                            <?php }else{ ?>
                              <img src="http://sra-uat.apniamc.in/images/noimage.jpg" style="height:320px;width:100%;" >
                            <?php } ?>
                            <!-- start-->
                            <div id="myModal" class="modal">
                              <span class="close">&times;</span>
                              <img class="modal-content" id="img01">
                              <p class="modal-content" id="caption" style='display:none;'></p>

                              
                            </div>
                            <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg");
                            var modalImg = document.getElementById("img01");
                            var captionText = document.getElementById("caption");

                            // When the user clicks on the image, open the modal and display the image with zoom class and caption
                            img.onclick = function() {
                              modal.style.display = "block";
                              modalImg.src = this.src;
                              modalImg.classList.add("zoom");
                              captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks on <span> (x), close the modal and remove the zoom class
                            var closeButton = modal.querySelector('.close');
                            closeButton.addEventListener('click', function() {
                                // Hide the modal
                                modal.style.display = 'none';
                                modalImg.classList.remove("zoom");

                            });

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
                                <!-- end -->
                              </div>
                            </div>
                            
                            
                            <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.store_integration_gumasta') }}">
                            @csrf
                            <input type="hidden" name="hut_id" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="1">
                              
                                <h4>Manual Data</h4>
                                <div class="card">
                                  <div class="card-body">
                                    <div class="table-responsive" id="sra-table">
                                      <table class="table table-borderless table-responsive">
                                        <thead>
                                          <tr>
                                            <th width="10%">Number</th>
                                        <th width="10%">Issued Date</th>
                                        <th width="20%">Organization</th>
                                        <th width="20%">Owner Name</th>
                                        <th width="20%">Address</th>
                                        <th width="10%">Valid Up To</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                               <?php if(!isset($int_data_2000)){ ?>
                                                <td width="10%"><input type="text" class="form-control" name="License_no" value = "{{ isset($int_data_2000->License_no) ? $int_data_2000->License_no : '' }}" {{ isset($int_data_2000->License_no) ? 'readonly' : '' }} ></td>
                                                <td width="10%"><input type="text" class="form-control" name="License_issue_date"  value = "{{ isset($int_data_2000->License_issue_date) ? $int_data_2000->License_issue_date : '' }}" {{ isset($int_data_2000->License_issue_date) ? 'readonly' : '' }} ></td>
                                                <td width="20%"><input type="text" class="form-control" name="organisation_name"  value = "{{ isset($int_data_2000->organisation_name) ? $int_data_2000->organisation_name : '' }}" {{ isset($int_data_2000->organisation_name) ? 'readonly' : '' }} ></td>
                                                <td width="20%"><input type="text" class="form-control" name="name"  value = "{{ isset($int_data_2000->name) ? $int_data_2000->name : '' }}" {{ isset($int_data_2000->name) ? 'readonly' : '' }} ></td>
                                                <td width="20%"><input type="text" class="form-control" name="address"  value = "{{ isset($int_data_2000->address) ? $int_data_2000->address : '' }}" {{ isset($int_data_2000->address) ? 'readonly' : '' }} ></td>
                                                <td width="10%"><input type="text" class="form-control" name="License_exp_date"  value = "{{ isset($int_data_2000->License_exp_date) ? $int_data_2000->License_exp_date : '' }}" {{ isset($int_data_2000->License_exp_date) ? 'readonly' : '' }} ></td>
                                               <?php }else { ?>
                                                <td width="10%">{{ isset($int_data_2000->License_no) ? $int_data_2000->License_no : '' }} </td>
                                                <td width="10%">{{ isset($int_data_2000->License_issue_date) ? $int_data_2000->License_issue_date : '' }}</td>
                                                <td width="20%">{{ isset($int_data_2000->organisation_name) ? $int_data_2000->organisation_name : '' }}</td>
                                                <td width="20%">{{ isset($int_data_2000->name) ? $int_data_2000->name : '' }}</td>
                                                <td width="20%">{{ isset($int_data_2000->address) ? $int_data_2000->address : '' }}</td>
                                                <td width="10%">{{ isset($int_data_2000->License_exp_date) ? $int_data_2000->License_exp_date : '' }}</td>
                                               <?php } ?>
                                                
                                            </tr>
                                            <tr>
                                              <?php 
                                                if(!isset($int_data_2000))
                                                {
                                                  ?>
                                                   <td colspan="5"><br/><button id="submitBtn2000" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Manual Data</button></td>
                                                  <?php
                                                } ?>
                                                
                                            </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </form>
                                <!-- Recommendation Start -->
                                <br/>
                                <!-- Recomendatioon start -->

                <h4>Recommendation by Vendor</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                        <table class="table table-borderless table-responsive">
                            <thead>
                              <tr>
                                <th width="10%" style="background-color:<?= $color_lic_no; ?>;color:#fff;padding: 5px !important;" >Number({{$highestPercentageOfLicNo}}%)</th>
                                <th width="10%" style="background-color:<?= $color_issue_date; ?>;color:#fff;padding: 5px !important;" >Issued Date({{$highestPercentageOfIssueDate}}%)</th>
                                <th width="20%" style="background-color:<?= $color_org_name; ?>;color:#fff;padding: 5px !important;" >Organization({{$highestPercentageOfOrg}}%)</th>
                                <th width="20%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;" >Owner Name({{$highestPercentageOfName}}%)</th>
                                <th width="20%"  style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;" >Address({{$highestPercentageOfAddress}}%) </th></th>
                                <th width="10%"  style="background-color:<?= $color_valid; ?>;color:#fff;padding: 5px !important;" >Valid Up to({{$highestPercentageOfvalidUpto}}%)</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @foreach($results as $data) --}}
                              <tr>
                                <td width="10%"><?= $highestPercentageLicNo ?></td>
                                 <td width="10%"><?= $highestPercentageIssueDate ?></td>
                                <td width="20%"><?= $highestPercentageOrg ?></td>
                                <td width="20%"><?= $highestPercentageName ?></td>
                                <td width="20%"><?= $highestPercentageAddress ?></td>
                                <td width="10%"><?= $highestPercentagevalideUpto ?></td>
                              </tr>
                              {{-- @endforeach --}}
                              <tr>
                                {{-- <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td> --}}
                              </tr>
                              <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_gumasta') }}">
                              @csrf
                              <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="1">
                              <input type="hidden" name="user" value="vendor">
                              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                               <tr>
                                <!-- <td colspan="5"><hr/><b>Eligible / Not Eligible :</b></td> -->
                              </tr>
                              <tr>
                                 <?php if (isset($data_2000) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_licanse_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_licanse_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_licanse_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_licanse_issue_date == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_licanse_issue_date == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_licanse_issue_date == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000->eligibility_owner_org_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_owner_org_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_owner_org_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
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
                                      if($data_2000->eligibility_validity == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000->eligibility_validity == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000->eligibility_validity == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>

                                <td width="10%">
                                <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2"  {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/><b>Remark :</b></td>
                              </tr>
                              <tr>
                                 <?php if (isset($data_2000) ) { ?>
                                  <td width="10%">{{ isset($data_2000->remark_licanse_name) ? $data_2000->remark_licanse_name : '' }}</td>
                                <td width="10%">{{ isset($data_2000->remark_licanse_issue_date) ? $data_2000->remark_licanse_issue_date : '' }}</td>
                                <td width="20%">{{ isset($data_2000->remark_owner_org_name) ? $data_2000->remark_owner_org_name : '' }}</td>
                                <td width="20%">{{ isset($data_2000->remark_owner_name) ? $data_2000->remark_owner_name : '' }}</td>
                                <td width="20%">{{ isset($data_2000->remark_address) ? $data_2000->remark_address : '' }}</td>
                                <td width="10%">{{ isset($data_2000->remark_validity) ? $data_2000->remark_validity : '' }}</td>
                                 <?php }else{ ?>
                                <td width="10%"><input type="text" class="form-control" name="remark1" value = "{{ isset($data_2000->remark_licanse_name) ? $data_2000->remark_licanse_name : '' }}" {{ isset($data_2000->remark_licanse_name) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="10%"><input type="text" class="form-control" name="remark2" value = "{{ isset($data_2000->remark_licanse_issue_date) ? $data_2000->remark_licanse_issue_date : '' }}" {{ isset($data_2000->remark_licanse_issue_date) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="20%"><input type="text" class="form-control" name="remark3" value = "{{ isset($data_2000->remark_owner_org_name) ? $data_2000->remark_owner_org_name : '' }}" {{ isset($data_2000->remark_owner_org_name) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="20%"><input type="text" class="form-control" name="remark6" value = "{{ isset($data_2000->remark_owner_name) ? $data_2000->remark_owner_name : '' }}" {{ isset($data_2000->remark_owner_name) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="20%"><input type="text" class="form-control" name="remark4" value = "{{ isset($data_2000->remark_address) ? $data_2000->remark_address : '' }}" {{ isset($data_2000->remark_address) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="10%"><input type="text" class="form-control" name="remark5" value = "{{ isset($data_2000->remark_validity) ? $data_2000->remark_validity : '' }}" {{ isset($data_2000->remark_validity) ? 'readonly' : '' }} <?= $access ?>></td>
                              <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                              <tr>
                                <td ><b>Section Status :</b></td>
                                <td ><b>Section Remark :</b></td>
                                  
                                <?php 
                                if(count($documents3)>0){
                                  $remark = "Gumasta Document with License number ".$documents3[0]->license_number. " license issue date " .$documents3[0]->license_issue_date. " and organization name ".$documents3[0]->organization_name;
                              }else{
                                  $remark = "";
                              }
                              // print_r($remark);die;
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
                                        echo " Not Matched";
                                      }  if($data_2000->overall_eligibility == 3){
                                        echo " Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                      <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                        <option value="0">-- Select Option --</option>
                                        <option value="1" {{ isset($data_2000->overall_eligibility) && ($data_2000->overall_eligibility == 1) ? 'selected' : '' }} >Verified</option>
                                        <option value="2" {{ isset($data_2000->overall_eligibility) &&($data_2000->overall_eligibility == 2) ? 'selected' : '' }}> Not Matched</option>
                                        <option value="3" {{ isset($data_2000->overall_eligibility) &&($data_2000->overall_eligibility == 2) ? 'selected' : '' }}> Unavailable</option>

                                      </select>
                                      <?php } ?>
                                    </td> 
                                    <td width="10%" colspan="5">
                                      <?php if (isset($data_2000) ) { ?>
                                        {{ isset($data_2000->overall_remark) ? $data_2000->overall_remark : 'Not Available' }}
                                      <?php }else { ?>
                                        <textarea class="form-control" style="height: auto !important;" name="remark" cols="100" {{ isset($data_2000->overall_remark) ? 'readonly' : '' }}>{{ isset($data_2000->overall_remark) ? $data_2000->overall_remark : $remark  }}</textarea>
                                      <?php } ?>
                                    </td>
                                  
                              </tr>
                              <tr>
                                @hasAccess('admin.sra.vendor_remark')
                                  @if(!isset($data_2000))
                                    <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                                  @endif
                                @endHasAccess
                              </tr>
                            </tbody>
                          </table>
                          </form>

                    </div>
                  </div>
                </div>
                @hasAccess('admin.sra.ca_remark')
                <h4>Conclution of CA</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                        <table class="table table-borderless table-responsive">
                            <thead>
                            <tr>
                                <th width="10%" style="background-color:<?= $color_lic_no; ?>;color:#fff;padding: 5px !important;" >Number({{$highestPercentageOfLicNo}}%)</th>
                                <th width="10%" style="background-color:<?= $color_issue_date; ?>;color:#fff;padding: 5px !important;" >Issued Date({{$highestPercentageOfIssueDate}}%)</th>
                                <th width="20%" style="background-color:<?= $color_org_name; ?>;color:#fff;padding: 5px !important;" >Organization({{$highestPercentageOfOrg}}%)</th>
                                <th width="20%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;" >Owner Name({{$highestPercentageOfName}}%)</th>
                                <th width="20%"  style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;" >Address({{$highestPercentageOfAddress}}%) </th></th>
                                <th width="10%"  style="background-color:<?= $color_valid; ?>;color:#fff;padding: 5px !important;" >Valid Up to({{$highestPercentageOfvalidUpto}}%)</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @foreach($results as $data) --}}
                              <tr>
                                <td width="10%"><?= $highestPercentageLicNo ?></td>
                                 <td width="10%"><?= $highestPercentageIssueDate ?></td>
                                <td width="20%"><?= $highestPercentageOrg ?></td>
                                <td width="20%"><?= $highestPercentageName ?></td>
                                <td width="20%"><?= $highestPercentageAddress ?></td>
                                <td width="10%"><?= $highestPercentagevalideUpto ?></td>
                              </tr>
                              {{-- @endforeach --}}
                              <tr>
                                {{-- <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td> --}}
                              </tr>
                              <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_gumasta') }}">
                              @csrf
                              <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="1">
                              <input type="hidden" name="user" value="ca">
                              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                               <tr>
                              <!-- <td colspan="5"><hr/><b>Eligible / Not Eligible :</b></td> -->
                              </tr>
                              <tr>
                                <?php if (isset($data_2000_ca) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_licanse_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_licanse_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_licanse_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_licanse_issue_date == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_licanse_issue_date == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_licanse_issue_date == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_ca->eligibility_owner_org_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_owner_org_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_owner_org_name == 2){
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
                                      if($data_2000_ca->eligibility_validity == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_ca->eligibility_validity == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_ca->eligibility_validity == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                                <td width="10%">
                                <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2"  {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/><b>Remark :</b></td>
                              </tr>
                              <tr>
                                <?php if (isset($data_2000_ca) ) { ?>
                                  <td width="10%">{{ isset($data_2000_ca->remark_licanse_name) ? $data_2000_ca->remark_licanse_name : '' }}</td>
                                <td width="10%">{{ isset($data_2000_ca->remark_licanse_issue_date) ? $data_2000_ca->remark_licanse_issue_date : '' }}</td>
                                <td width="20%">{{ isset($data_2000_ca->remark_owner_org_name) ? $data_2000_ca->remark_owner_org_name : '' }}</td>
                                <td width="20%">{{ isset($data_2000_ca->remark_owner_name) ? $data_2000_ca->remark_owner_name : '' }}</td>
                                <td width="20%">{{ isset($data_2000_ca->remark_address) ? $data_2000_ca->remark_address : '' }}</td>
                                <td width="10%">{{ isset($data_2000_ca->remark_validity) ? $data_2000_ca->remark_validity : '' }}</td>
                                 <?php }else{ ?>
                                <td width="10%"><input type="text" class="form-control" name="remark1_ca" value = "{{ isset($data_2000_ca->remark_licanse_name) ? $data_2000_ca->remark_licanse_name : '' }}" {{ isset($data_2000_ca->remark_licanse_name) ? 'readonly' : '' }} ></td>
                                <td width="10%"><input type="text" class="form-control" name="remark2_ca" value = "{{ isset($data_2000_ca->remark_licanse_issue_date) ? $data_2000_ca->remark_licanse_issue_date : '' }}" {{ isset($data_2000_ca->remark_licanse_issue_date) ? 'readonly' : '' }}></td>
                                <td width="20%"><input type="text" class="form-control" name="remark3_ca" value = "{{ isset($data_2000_ca->remark_owner_org_name) ? $data_2000_ca->remark_owner_org_name : '' }}" {{ isset($data_2000_ca->remark_owner_org_name) ? 'readonly' : '' }} ></td>
                                <td width="20%">
                                  <?php if(isset($data_2000_ca->remark_owner_name)){?>
                                    <input type="text" class="form-control" name="remark6_ca" value = "{{$data_2000_ca->remark_owner_name}}" >
                                  <?php } else { ?>
                                    <input type="text" class="form-control" name="remark6_ca" value = "" >
                                  <?php } ?>
                                </td>
                                <td width="20%"><input type="text" class="form-control" name="remark4_ca" value = "{{ isset($data_2000_ca->remark_address) ? $data_2000_ca->remark_address : '' }}" {{ isset($data_2000_ca->remark_address) ? 'readonly' : '' }}></td>
                                <td width="10%"><input type="text" class="form-control" name="remark5_ca" value = "{{ isset($data_2000_ca->remark_validity) ? $data_2000_ca->remark_validity : '' }}" {{ isset($data_2000_ca->remark_validity) ? 'readonly' : '' }} ></td>
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
                                        echo " Not Matched";
                                      }
                                      if($data_2000_ca->overall_eligibility == 3){
                                        echo " Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                      <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                        <option value="0">-- Select Option --</option>
                                        <option value="1" {{ isset($data_2000t_ca->overall_eligibility) && ($data_2000_ca->overall_eligibility == 1) ? 'selected' : '' }} >Verified</option>
                                        <option value="2" {{ isset($data_2000_ca->overall_eligibility) &&($data_2000_ca->overall_eligibility == 2) ? 'selected' : '' }}>Not Matched</option>
                                        <option value="3" {{ isset($data_2000_ca->overall_eligibility) &&($data_2000_ca->overall_eligibility == 3) ? 'selected' : '' }}> Unavailable </option>

                                      </select>
                                    <?php } ?>
                                    </td> 
                                    <td width="10%" colspan="5">
                                    <?php if (isset($data_2000_ca) ) { ?>
                                        {{ isset($data_2000_ca->overall_remark) ? $data_2000_ca->overall_remark : 'Not Available' }}
                                      <?php }else { ?>
                                        <textarea class="form-control" style="height: auto !important;" name="remark" cols="100" {{ isset($data_2000_ca->overall_remark) ? 'readonly' : '' }}>{{ isset($data_2000_ca->overall_remark) ? $data_2000_ca->overall_remark :  $remark  }}</textarea>                                    <?php } ?>
                                    </td>

                              </tr>
                              <tr>
                                @if(!isset($data_2000_ca))
                                 <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                                @endif
                              </tr>
                            </tbody>
                          </table>
                          </form>
                    </div>
                  </div>
                </div>
                @endHasAccess       
                               
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
              $match_name_array = $match_address_array = $match_license_array = $match_date_array = $match_valid_array = $match_org_array = array();
                foreach($query as $data)
                {
                  $name_sims = $data->HUTOWNERNAME;
                   array_push($match_name_array,$data->HUTOWNERNAME);
                  $address_sims = $data->Address;
                   array_push($match_address_array,$data->Address);
                  $org_sims = 'Not Available';
                   array_push($match_org_array,'Not Available');
                  $license_no_sims = 'Not Available';
                   array_push($match_license_array,'');
                  $license_issue_date_sims = 'Not Available';
                   array_push($match_date_array,'Not Available');
                  $valid_upto_sims = 'Not Available';
                   array_push($match_valid_array,'Not Available');


                }
               $match_name = $match_address = $match_lic_no = $match_data = $match_license_issue_date = $match_valid_upto = array();

                $name_int=$address_int=$license_issue_date_int=$license_no_int=$valid_upto_int = $organization_int = '';
                $name_doc=$address_doc=$license_issue_date_doc=$license_no_doc=$valid_upto_doc = $organization_doc ='';
                if(count($intgrate_data) > 0){
                  foreach($intgrate_data as $data)
                  {
                    if($data->year == '2')
                    {
                      $name_int = $data->name;
                      array_push($match_name_array,$data->name);
                      $organization_int = $data->organisation_name;
                      array_push($match_org_array,$data->organisation_name);
                      $address_int = $data->address;
                      array_push($match_address_array,$data->address);
                      $license_no_int = $data->License_no;
                      array_push($match_license_array,$data->License_no);
                      $license_issue_date_int = $data->License_issue_date;
                      array_push($match_date_array,$data->License_issue_date);
                      $valid_upto_int = $data->License_exp_date;
                      array_push($match_valid_array,$data->License_exp_date);
                    }
                  }
                }else{
                      array_push($match_name_array,'Not Available');
                      array_push($match_address_array,'Not Available');
                       array_push($match_org_array,'Not Available');
                       array_push($match_license_array,'Not Available');
                       array_push($match_date_array,'Not Available');
                       array_push($match_valid_array,'Not Available');
                }

                 if(count($documents) > 0){
                    foreach($documents as $data)
                    {
                      if($data->year == '2011')
                      {
                        $name_doc = $data->owner_name;
                         array_push($match_name_array,$data->owner_name);
                        $organization_doc = $data->organization_name;
                         array_push($match_org_array,$data->organization_name);
                        $address_doc = $data->address;
                         array_push($match_address_array,$data->address);
                        $license_no_doc = $data->license_number;
                         array_push($match_license_array,$data->license_number);
                        $license_issue_date_doc = $data->license_issue_date;
                         array_push($match_date_array,$data->license_issue_date);
                        $valid_upto_doc = $data->valid_upto;
                         array_push($match_valid_array,$data->valid_upto);
                      }
                    }
                  }else{
                      array_push($match_name_array,'Not Available');
                      array_push($match_address_array,'Not Available');
                       array_push($match_org_array,'Not Available');
                       array_push($match_license_array,'Not Available');
                       array_push($match_date_array,'Not Available');
                       array_push($match_valid_array,'Not Available');
                  }
                if($name_sims != 'Not Available')
                {

                  $highestPercentageOfName = $per =0;
                  $highestPercentageName = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_name_array);
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
                }

                if($address_sims != 'Not Available')
                {

                  $highestPercentageOfAddress = $per =0;
                  $highestPercentageAddress = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_address_array);
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

                  //end
                  if($highestPercentageOfAddress == 100 )
                    $color_address = '#238823';
                  elseif($highestPercentageOfAddress >= 50)
                    $color_address = '#FFBF00';
                  else  
                    $color_address = '#d2222d';
                }
                

                //license start
                  $highestPercentageOfLicNo = $per =0;
                  $highestPercentageLicNo = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_license_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfLicNo = $per;
                      $highestPercentageLicNo = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfLicNo = $per;
                      $highestPercentageLicNo = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfLicNo = 0;
                      $highestPercentageLicNo = $match_str;
                      }
                    }
                  if($highestPercentageLicNo == 'Not Available') 
                  $highestPercentageOfLicNo = 0;

                  if($highestPercentageOfLicNo == 100 )
                    $color_lic_no = '#238823';
                  elseif($highestPercentageOfLicNo >= 50)
                    $color_lic_no = '#FFBF00';
                  else  
                    $color_lic_no = '#d2222d';
                
                  //licence end

                  //licence date start
                  $highestPercentageOfIssueDate = $per =0;
                  $highestPercentageIssueDate = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_date_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfIssueDate = $per;
                      $highestPercentageIssueDate = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfIssueDate = $per;
                      $highestPercentageIssueDate = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfIssueDate = 0;
                      $highestPercentageIssueDate = $match_str;
                      }
                    }
                  if($highestPercentageIssueDate == 'Not Available') 
                  $highestPercentageOfIssueDate = 0;
                
                  if($highestPercentageOfIssueDate == 100 )
                    $color_issue_date = '#238823';
                  elseif($highestPercentageOfIssueDate >= 50)
                    $color_issue_date = '#FFBF00';
                  else  
                    $color_issue_date = '#d2222d';
                
                //licence date end

               
                  //valid start
                  $highestPercentageOfvalidUpto = $per =0;
                  $highestPercentagevalideUpto = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_valid_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfvalidUpto = $per;
                      $highestPercentagevalideUpto = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfvalidUpto = $per;
                      $highestPercentagevalideUpto = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfvalidUpto = 0;
                      $highestPercentagevalideUpto = $match_str;
                      }
                    }
                  if($highestPercentagevalideUpto == 'Not Available') 
                  $highestPercentageOfvalidUpto = 0;
                 
                  if($highestPercentageOfvalidUpto == 100 )
                    $color_valid = '#238823';
                  elseif($highestPercentageOfvalidUpto >= 50)
                    $color_valid = '#FFBF00';
                  else  
                    $color_valid = '#d2222d';

                //organization start
                 $highestPercentageOfOrg = $per =0;
                  $highestPercentageOrg = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_org_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfOrg = $per;
                      $highestPercentageOrg = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfOrg = $per;
                      $highestPercentageOrg = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfOrg = 0;
                      $highestPercentageOrg = $match_str;
                      }
                    }
                  if($highestPercentageOrg == 'Not Available') 
                  $highestPercentageOfOrg = 0;


                  if($highestPercentageOfOrg == 100 )
                    $color_org_name = '#238823';
                  elseif($highestPercentageOfOrg >= 50)
                    $color_org_name = '#FFBF00';
                  else  
                    $color_org_name = '#d2222d';
                  //end

                if($highestPercentageLicNo == '')
                  $highestPercentageLicNo = 'Not Available';
                if($highestPercentageOrg == '')
                  $highestPercentageOrg = 'Not Available';
                if($highestPercentageIssueDate == '')
                  $highestPercentageIssueDate = 'Not Available';
                if($highestPercentageName == '')
                  $highestPercentageName = 'Not Available';
                if($highestPercentageAddress == '')
                  $highestPercentageAddress = 'Not Available';
                if($highestPercentagevalideUpto == '')
                  $highestPercentagevalideUpto = 'Not Available';

              ?>
              <div class="col-md-12">
            
                
                <br/>
                <div class="row">
                    <div class="col-md-9">
                    <!-- Sims start-->
                     <h4>SIMS Data</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%">Number</th>
                            <th width="10%">Issued Date</th>
                            <th width="20%">Organization</th>
                            <th width="20%">Owner Name</th>
                            <th width="20%">Address</th>
                            <th width="10%">Valid Up To</th>
                            {{-- <th width="10%">Part No.</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            @foreach($query as $data)
                              <td width="10%">Not Available</td>
                              <td width="10%">Not Available</td>
                              <th width="20%">Not Available</th>
                              <td width="20%">{{$data->HUTOWNERNAME}}</td>                              
                              <td width="20%">{{$data->Address}}</td>
                              <td width="10%">Not Available</td>
                              {{-- <td width="10%">{{$data->PropertyType}}</td> --}}
                            @endforeach
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                    <!-- Sims End -->
                    <!-- Ocr start-->
                    <h4>SIMS OCR</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                      <table class="table table-borderless table-responsive">
                        <thead>
                          <tr>
                            <th width="10%">Number</th>
                                        <th width="10%">Issued Date</th>
                                        <th width="20%">Organization</th>
                                        <th width="20%">Owner Name</th>
                                        <th width="20%">Address</th>
                                        <th width="10%">Valid Up To</th>
                            {{-- <th width="10%">Use Of Slum</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          @if(count($documents) >= 1)
                          @foreach($documents as $doc)
                              @if($doc->year == '2011')
                                  <td width="10%">{{ $doc->license_number }}</td>
                                  <td width="10%">{{ $doc->license_issue_date }}</td>
                                  <td width="20%">{{ $doc->organization_name }}</td>
                                  <td width="20%">{{ $doc->owner_name }}</td>
                                  <td width="20%">{{ $doc->address }}</td>
                                  <td width="10%">{{ $doc->valid_upto }}</td>
                              @endif
                          @endforeach
                      @else
                          <td width='10%'>Not Available</td>
                          <td width='10%'>Not Available</td>
                          <td width='20%'>Not Available</td>
                          <td width='20%'>Not Available</td>
                          <td width='20%'>Not Available</td>
                          <td width='10%'>Not Available</td>
                      @endif

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                    <!-- ocr end -->
                    </div>
                    <div class="col-md-3">
                       <div class="card">
                          <div class="card-body">
                            <?php 
                            if(isset($documents)){
                            ?>
                            <img src="http://sra-uat.apniamc.in/images/{{$hid}}_gumasta2.jpeg" style="height:320px;width:100%;" id="myImg2" onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';">
                            <?php }else{ ?>
                              <img src="http://sra-uat.apniamc.in/images/noimage.jpg" style="height:320px;width:100%" >
                            <?php } ?>
                            <!-- start-->
                            <div id="myModal1" class="modal">
                              <span class="close">&times;</span>
                              <img class="modal-content" id="img02">
                              
                            </div>
                            <script>
                            // Get the modal
                            var modal = document.getElementById("myModal1");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg2");
                            var modalImg = document.getElementById("img02");
                            var captionText = document.getElementById("caption");
                            img.onclick = function(){
                              modal.style.display = "block";
                              modalImg.src = this.src;
                              modalImg.classList.add("zoom");
                              captionText.innerHTML = this.alt;
                            }

                           // Get the close button and add a click event listener
                           var closeButton = modal.querySelector('.close');
                            closeButton.addEventListener('click', function() {
                                // Hide the modal
                                modal.style.display = 'none';
                                modalImg.classList.remove("zoom");

                            });
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
               
                

                          <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.store_integration_gumasta') }}">
                            @csrf
                            <input type="hidden" name="hut_id" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="2">
                              
                                <h4>Manual Data</h4>
                                <div class="card">
                                  <div class="card-body">
                                    <div class="table-responsive" id="sra-table">
                                      <table class="table table-borderless table-responsive">
                                        <thead>
                                          <tr>
                                            <th width="10%">Number</th>
                                        <th width="10%">Issued Date</th>
                                        <th width="20%">Organization</th>
                                        <th width="20%">Owner Name</th>
                                        <th width="20%">Address</th>
                                        <th width="10%">Valid Up To</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                              <?php if(!isset($int_data_2000_2011)){ ?>
                                                <td width="10%"><input type="text" class="form-control" name="License_no" value = "{{ isset($int_data_2000_2011->License_no) ? $int_data_2000_2011->License_no : '' }}" {{ isset($int_data_2000_2011->License_no) ? 'readonly' : '' }} ></td>
                                                <td width="10%"><input type="text" class="form-control" name="License_issue_date"  value = "{{ isset($int_data_2000_2011->License_issue_date) ? $int_data_2000_2011->License_issue_date : '' }}" {{ isset($int_data_2000_2011->License_issue_date) ? 'readonly' : '' }} ></td>
                                                <td width="20%"><input type="text" class="form-control" name="organisation_name"  value = "{{ isset($int_data_2000_2011->organisation_name) ? $int_data_2000_2011->organisation_name : '' }}" {{ isset($int_data_2000_2011->organisation_name) ? 'readonly' : '' }} ></td>
                                                <td width="20%"><input type="text" class="form-control" name="name"  value = "{{ isset($int_data_2000_2011->name) ? $int_data_2000_2011->name : '' }}" {{ isset($int_data_2000_2011->name) ? 'readonly' : '' }} ></td>
                                                <td width="20%"><input type="text" class="form-control" name="address"  value = "{{ isset($int_data_2000_2011->address) ? $int_data_2000_2011->address : '' }}" {{ isset($int_data_2000_2011->address) ? 'readonly' : '' }} ></td>
                                                <td width="10%"><input type="text" class="form-control" name="License_exp_date"  value = "{{ isset($int_data_2000_2011->License_exp_date) ? $int_data_2000_2011->License_exp_date : '' }}" {{ isset($int_data_2000_2011->License_exp_date) ? 'readonly' : '' }} ></td>
                                              <?php }else{ ?>
                                                <td width="10%">{{ isset($int_data_2000_2011->License_no) ? $int_data_2000_2011->License_no : '' }}</td>
                                                <td width="10%">{{ isset($int_data_2000_2011->License_issue_date) ? $int_data_2000_2011->License_issue_date : '' }}</td>
                                                <td width="20%">{{ isset($int_data_2000_2011->organisation_name) ? $int_data_2000_2011->organisation_name : '' }}</td>
                                                <td width="20%">{{ isset($int_data_2000_2011->name) ? $int_data_2000_2011->name : '' }}</td>
                                                <td width="20%">{{ isset($int_data_2000_2011->address) ? $int_data_2000_2011->address : '' }}</td>
                                                <td width="10%">{{ isset($int_data_2000_2011->License_exp_date) ? $int_data_2000_2011->License_exp_date : '' }}</td>
                                              <?php } ?>
                                            </tr>
                                            <tr>
                                              <?php 
                                                if(!isset($int_data_2000_2011))
                                                {
                                                  ?>
                                                   <td colspan="5"><br/><button id="submitBtn2000" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Manual Data</button></td>
                                                  <?php
                                                } ?>
                                                
                                            </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </form>
                                <!-- Recommendation Start -->
                                <br/>

                <!-- Recomendatioon start -->
                <h4>Recommendation by Vendor</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                        <table class="table table-borderless table-responsive">
                            <thead>
                            <tr>
                                <th width="10%" style="background-color:<?= $color_lic_no; ?>;color:#fff;padding: 5px !important;" >Number({{$highestPercentageOfLicNo}}%)</th>
                                <th width="10%" style="background-color:<?= $color_issue_date; ?>;color:#fff;padding: 5px !important;" >Issued Date({{$highestPercentageOfIssueDate}}%)</th>
                                <th width="20%" style="background-color:<?= $color_org_name; ?>;color:#fff;padding: 5px !important;" >Organization({{$highestPercentageOfOrg}}%)</th>
                                <th width="20%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;" >Owner Name({{$highestPercentageOfName}}%)</th>
                                <th width="20%"  style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;" >Address({{$highestPercentageOfAddress}}%) </th></th>
                                <th width="10%"  style="background-color:<?= $color_valid; ?>;color:#fff;padding: 5px !important;" >Valid Up to({{$highestPercentageOfvalidUpto}}%)</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @foreach($results as $data) --}}
                             <tr>
                                <td width="10%"><?= $highestPercentageLicNo ?></td>
                                 <td width="10%"><?= $highestPercentageIssueDate ?></td>
                                <td width="20%"><?= $highestPercentageOrg ?></td>
                                <td width="20%"><?= $highestPercentageName ?></td>
                                <td width="20%"><?= $highestPercentageAddress ?></td>
                                <td width="10%"><?= $highestPercentagevalideUpto ?></td>
                              </tr>
                              {{-- @endforeach --}}
                              <tr>
                                {{-- <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td> --}}
                              </tr>
                              <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_gumasta') }}">
                              @csrf
                              <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="2">
                              <input type="hidden" name="user" value="vendor">
                              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                              <tr>
                              <!-- <td colspan="5"><hr/><b>Eligible / Not Eligible :</b></td> -->
                              </tr>
                              <tr>
                                 <?php if (isset($data_2000_2011) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_licanse_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_licanse_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_licanse_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011->eligibility_licanse_issue_date == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_licanse_issue_date == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_licanse_issue_date == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="20%">
                                      <?php 
                                      if($data_2000_2011->eligibility_owner_org_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_owner_org_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_owner_org_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                       <td width="20%">
                                      <?php 
                                      if($data_2000_2011->eligibility_owner_org_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_owner_org_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_owner_org_name == 2){
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
                                      if($data_2000_2011->eligibility_validity == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011->eligibility_validity == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011->eligibility_validity == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                                <td width="10%">
                                <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2"  {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/><b>Remark :</b></td>
                              </tr>
                              <tr>
                                 <?php if (isset($data_2000_2011) ) { ?>
                                  <td width="10%">{{ isset($data_2000_2011->remark_licanse_name) ? $data_2000_2011->remark_licanse_name : '' }}</td>
                                <td width="10%">{{ isset($data_2000_2011->remark_licanse_issue_date) ? $data_2000_2011->remark_licanse_issue_date : '' }}</td>
                                <td width="20%">{{ isset($data_2000_2011->remark_owner_org_name) ? $data_2000_2011->remark_owner_org_name : '' }}</td>
                                <td width="20%">{{ isset($data_2000_2011->remark_owner_name) ? $data_2000_2011->remark_owner_name : '' }}</td>
                                <td width="20%">{{ isset($data_2000_2011->remark_address) ? $data_2000_2011->remark_address : '' }}</td>
                                <td width="10%">{{ isset($data_2000_2011->remark_validity) ? $data_2000_2011->remark_validity : '' }}</td>
                                 <?php }else{ ?>
                                <td width="10%"><input type="text" class="form-control" name="remark1" value = "{{ isset($data_2000_2011->remark_licanse_name) ? $data_2000_2011->remark_licanse_name : '' }}" {{ isset($data_2000_2011->remark_licanse_name) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="10%"><input type="text" class="form-control" name="remark2" value = "{{ isset($data_2000_2011->remark_licanse_issue_date) ? $data_2000_2011->remark_licanse_issue_date : '' }}" {{ isset($data_2000_2011->remark_licanse_issue_date) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="20%"><input type="text" class="form-control" name="remark3" value = "{{ isset($data_2000_2011->remark_owner_org_name) ? $data_2000_2011->remark_owner_org_name : '' }}" {{ isset($data_2000_2011->remark_owner_org_name) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="20%"><input type="text" class="form-control" name="remark6" value = "{{ isset($data_2000_2011->remark_owner_name) ? $data_2000_2011->remark_owner_name : '' }}" {{ isset($data_2000_2011->remark_owner_name) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="20%"><input type="text" class="form-control" name="remark4" value = "{{ isset($data_2000_2011->remark_address) ? $data_2000_2011->remark_address : '' }}" {{ isset($data_2000_2011->remark_address) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="10%"><input type="text" class="form-control" name="remark5" value = "{{ isset($data_2000_2011->remark_validity) ? $data_2000_2011->remark_validity : '' }}" {{ isset($data_2000_2011->remark_validity) ? 'readonly' : '' }} <?= $access ?>></td>
                              <?php } ?>
                              </tr>
                              <tr>
                                <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                              <tr>
                                <td ><b>Section Status :</b></td>
                                <td ><b>Section Remark :</b></td>
                                <?php    
                                if(count($documents1)>0){
                                  $remark1 = "Gumasta Document with License number ".$documents1[0]->license_number. " license issue date " .$documents1[0]->license_issue_date. " and organization name ".$documents1[0]->organization_name;
                              }else{
                                  $remark1 = "";
                              }
                              // print_r($remark);die;
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
                                        echo " Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                      <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                        <option value="0">-- Select Option --</option>
                                        <option value="1" {{ isset($data_2000_2011->overall_eligibility) && ($data_2000_2011->overall_eligibility == 1) ? 'selected' : '' }} >Verified</option>
                                        <option value="2" {{ isset($data_2000_2011->overall_eligibility) &&($data_2000_2011->overall_eligibility == 2) ? 'selected' : '' }}>Not Matched</option>
                                        <option value="3" {{ isset($data_2000_2011->overall_eligibility) &&($data_2000_2011->overall_eligibility == 3) ? 'selected' : '' }}> Unavailable</option>

                                      </select>
                                    <?php } ?>
                                    </td> 
                                    <td width="10%" colspan="5">
                                       <?php if (isset($data_2000_2011) ) { ?>
                                        {{ isset($data_2000_2011->overall_remark) ? $data_2000_2011->overall_remark : 'Not Available' }}
                                      <?php }else { ?>
                                        <textarea class="form-control" style="height: auto !important;" name="remark" cols="100" {{ isset($data_2000_2011->overall_remark) ? 'readonly' : '' }}>{{ isset($data_2000_2011->overall_remark) ? $data_2000_2011->overall_remark : $remark1 }}</textarea>                                    <?php } ?>
                                    </td>

                              </tr>
                              <tr>
                                 @hasAccess('admin.sra.vendor_remark')
                                  @if(!isset($data_2000_2011))
                                  <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                                  @endif
                                @endHasAccess
                              </tr>
                            </tbody>
                          </table>
                          </form>
                    </div>
                  </div>
                </div>
                @hasAccess('admin.sra.ca_remark')
                <h4>Conclution of CA</h4>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                        <table class="table table-borderless table-responsive">
                            <thead>
                            <tr>
                                <th width="10%" style="background-color:<?= $color_lic_no; ?>;color:#fff;padding: 5px !important;" >Number({{$highestPercentageOfLicNo}}%)</th>
                                <th width="10%" style="background-color:<?= $color_issue_date; ?>;color:#fff;padding: 5px !important;" >Issued Date({{$highestPercentageOfIssueDate}}%)</th>
                                <th width="20%" style="background-color:<?= $color_org_name; ?>;color:#fff;padding: 5px !important;" >Organization({{$highestPercentageOfOrg}}%)</th>
                                <th width="20%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;" >Owner Name({{$highestPercentageOfName}}%)</th>
                                <th width="20%"  style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;" >Address({{$highestPercentageOfAddress}}%) </th></th>
                                <th width="10%"  style="background-color:<?= $color_valid; ?>;color:#fff;padding: 5px !important;" >Valid Up to({{$highestPercentageOfvalidUpto}}%)</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @foreach($results as $data) --}}
                              <tr>
                                <td width="10%"><?= $highestPercentageLicNo ?></td>
                                 <td width="10%"><?= $highestPercentageIssueDate ?></td>
                                <td width="20%"><?= $highestPercentageOrg ?></td>
                                <td width="20%"><?= $highestPercentageName ?></td>
                                <td width="20%"><?= $highestPercentageAddress ?></td>
                                <td width="10%"><?= $highestPercentagevalideUpto ?></td>
                              </tr>
                              {{-- @endforeach --}}
                              <tr>
                                {{-- <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td> --}}
                              </tr>
                              <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_gumasta') }}">
                              @csrf
                              <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="2">
                              <input type="hidden" name="user" value="ca">
                              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                              <tr>
                              <!-- <td colspan="5"><hr/><b>Eligible / Not Eligible :</b></td> -->
                              </tr>
                              <tr>
                                <?php if (isset($data_2000_2011_ca) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_licanse_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_licanse_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_licanse_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_licanse_issue_date == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_licanse_issue_date == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_licanse_issue_date == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_2000_2011_ca->eligibility_owner_org_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_owner_org_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_owner_org_name == 2){
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
                                      if($data_2000_2011_ca->eligibility_validity == 0){
                                        echo "Not Available";
                                      }
                                      if($data_2000_2011_ca->eligibility_validity == 1){
                                        echo "Manual";
                                      }
                                      if($data_2000_2011_ca->eligibility_validity == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>
                                <td width="10%">
                                <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2"  {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/><b>Remark :</b></td>
                              </tr>
                              <tr>
                                 <?php if (isset($data_2000_2011_ca) ) { ?>
                                  <td width="10%">{{ isset($data_2000_2011_ca->remark_licanse_name) ? $data_2000_2011_ca->remark_licanse_name : '' }}</td>
                                <td width="10%">{{ isset($data_2000_2011_ca->remark_licanse_issue_date) ? $data_2000_2011_ca->remark_licanse_issue_date : '' }}</td>
                                <td width="20%">{{ isset($data_2000_2011_ca->remark_owner_org_name) ? $data_2000_2011_ca->remark_owner_org_name : '' }}</td>
                                <td width="20%">{{ isset($data_2000_2011_ca->remark_owner_name) ? $data_2000_2011_ca->remark_owner_name : '' }}</td>
                                <td width="20%">{{ isset($data_2000_2011_ca->remark_address) ? $data_2000_2011_ca->remark_address : '' }}</td>
                                <td width="10%">{{ isset($data_2000_2011_ca->remark_validity) ? $data_2000_2011_ca->remark_validity : '' }}</td>
                                 <?php }else{ ?>
                                <td width="10%"><input type="text" class="form-control" name="remark1_ca" value = "{{ isset($data_2000_2011_ca->remark_licanse_name) ? $data_2000_2011_ca->remark_licanse_name : '' }}" {{ isset($data_2000_2011_ca->remark_licanse_name) ? 'readonly' : '' }}></td>
                                <td width="10%"><input type="text" class="form-control" name="remark2_ca" value = "{{ isset($data_2000_2011_ca->remark_licanse_issue_date) ? $data_2000_2011_ca->remark_licanse_issue_date : '' }}" {{ isset($data_2000_2011_ca->remark_licanse_issue_date) ? 'readonly' : '' }} ></td>
                                <td width="20%"><input type="text" class="form-control" name="remark3_ca" value = "{{ isset($data_2000_2011_ca->remark_owner_org_name) ? $data_2000_2011_ca->remark_owner_org_name : '' }}" {{ isset($data_2000_2011_ca->remark_owner_org_name) ? 'readonly' : '' }}></td>
                                 <td width="20%">
                                  <?php if(isset($data_2000_2011_ca->remark_owner_name)){?>
                                    <input type="text" class="form-control" name="remark6_ca" value = "{{$data_2000_2011_ca->remark_owner_name}}" >
                                  <?php } else { ?>
                                    <input type="text" class="form-control" name="remark6_ca" value = "" >
                                  <?php } ?>
                                </td>
                                <td width="20%"><input type="text" class="form-control" name="remark4_ca" value = "{{ isset($data_2000_2011_ca->remark_address) ? $data_2000_2011_ca->remark_address : '' }}" {{ isset($data_2000_2011_ca->remark_address) ? 'readonly' : '' }} ></td>
                                <td width="10%"><input type="text" class="form-control" name="remark5_ca" value = "{{ isset($data_2000_2011_ca->remark_validity) ? $data_2000_2011_ca->remark_validity : '' }}" {{ isset($data_2000_2011_ca->remark_validity) ? 'readonly' : '' }} ></td>
                              <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                              <tr>
                                <td ><b>Section Eligibility :</b></td>
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
                                        echo " Not Matched";
                                      }
                                      if($data_2000_2011_ca->overall_eligibility == 3){
                                        echo " Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                      <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                        <option value="0">-- Select Option --</option>
                                        <option value="1" {{ isset($data_2000_2011_ca->overall_eligibility) && ($data_2000_2011_ca->overall_eligibility == 1) ? 'selected' : '' }} >Verified</option>
                                        <option value="2" {{ isset($data_2000_2011_ca->overall_eligibility) &&($data_2000_2011_ca->overall_eligibility == 2) ? 'selected' : '' }}>Not Matched</option>
                                        <option value="2" {{ isset($data_2000_2011_ca->overall_eligibility) &&($data_2000_2011_ca->overall_eligibility == 2) ? 'selected' : '' }}> Unavailable</option>
                                      </select>
                                    <?php } ?>
                                    </td> 
                                    <td width="10%" colspan="5">
                                      <?php if (isset($data_2000_2011_ca) ) { ?>
                                        {{ isset($data_2000_2011_ca->overall_remark) ? $data_2000_2011_ca->overall_remark : 'Not Available' }}
                                      <?php }else { ?>
                                        <textarea class="form-control" style="height: auto !important;" name="remark" cols="100" {{ isset($data_2000_2011_ca->overall_remark) ? 'readonly' : '' }}>{{ isset($data_2000_2011_ca->overall_remark) ? $data_2000_2011_ca->overall_remark : $remark1 }}</textarea>                                    <?php } ?>
                                    </td>

                              </tr>
                              <tr>
                                @if(!isset($data_2000_2011_ca))

                                  <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                                @endif
                              </tr>
                            </tbody>
                          </table>
                          </form>
                    </div>
                  </div>
                </div>
                @endHasAccess
               

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
                            <!-- Year 2000 start -->
              <?php
             
             
              $match_name_array = $match_address_array = $match_license_array = $match_date_array = $match_valid_array = $match_org_array = array();
                foreach($query as $data)
                {
                  $name_sims = $data->HUTOWNERNAME;
                   array_push($match_name_array,$data->HUTOWNERNAME);
                  $address_sims = $data->Address;
                   array_push($match_address_array,$data->Address);
                  $org_sims = 'Not Available';
                   array_push($match_org_array,'Not Available');
                  $license_no_sims = 'Not Available';
                   array_push($match_license_array,'');
                  $license_issue_date_sims = 'Not Available';
                   array_push($match_date_array,'Not Available');
                  $valid_upto_sims = 'Not Available';
                   array_push($match_valid_array,'Not Available');

                }
                
                $match_name = $match_address = $match_lic_no = $match_data = $match_license_issue_date = $match_valid_upto = array();

                $name_int=$address_int=$license_issue_date_int=$license_no_int=$valid_upto_int = $organization_int = '';
                $name_doc=$address_doc=$license_issue_date_doc=$license_no_doc=$valid_upto_doc = $organization_doc ='';
                //print_r($intgrate_data);die;
                  if(count($intgrate_data) > 0){
                    foreach($intgrate_data as $data)
                    {
                      if($data->year == '3')
                      {
                        $name_int = $data->name;
                        array_push($match_name_array,$data->name);
                        $organization_int = $data->organisation_name;
                        array_push($match_org_array,$data->organisation_name);
                        $address_int = $data->address;
                        array_push($match_address_array,$data->address);
                        $license_no_int = $data->License_no;
                        array_push($match_license_array,$data->License_no);
                        $license_issue_date_int = $data->License_issue_date;
                        array_push($match_date_array,$data->License_issue_date);
                        $valid_upto_int = $data->License_exp_date;
                        array_push($match_valid_array,$data->License_exp_date);
                      }
                    }
                   }else{
                      array_push($match_name_array,'Not Available');
                      array_push($match_address_array,'Not Available');
                       array_push($match_org_array,'Not Available');
                       array_push($match_license_array,'Not Available');
                       array_push($match_date_array,'Not Available');
                       array_push($match_valid_array,'Not Available');
                    }

                     if(count($documents) > 0){
                      foreach($documents as $data)
                      {
                        if($data->year == '2023')
                        {
                          $name_doc = $data->owner_name;
                           array_push($match_name_array,$data->owner_name);
                          $organization_doc = $data->organization_name;
                           array_push($match_org_array,$data->organization_name);
                          $address_doc = $data->address;
                           array_push($match_address_array,$data->address);
                          $license_no_doc = $data->license_number;
                           array_push($match_license_array,$data->license_number);
                          $license_issue_date_doc = $data->license_issue_date;
                           array_push($match_date_array,$data->license_issue_date);
                          $valid_upto_doc = $data->valid_upto;
                           array_push($match_valid_array,$data->valid_upto);
                        }
                      }
                    }else{
                      array_push($match_name_array,'Not Available');
                      array_push($match_address_array,'Not Available');
                       array_push($match_org_array,'Not Available');
                       array_push($match_license_array,'Not Available');
                       array_push($match_date_array,'Not Available');
                       array_push($match_valid_array,'Not Available');
                     }
                
                  if($name_sims != 'Not Available')
                {

                  //new code start
                  $highestPercentageOfName = $per =0;
                  $highestPercentageName = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_name_array);
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
                }

                if($address_sims != 'Not Available')
                {

                 $highestPercentageOfAddress = $per =0;
                  $highestPercentageAddress = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_address_array);
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

                  //end
                  if($highestPercentageOfAddress == 100 )
                    $color_address = '#238823';
                  elseif($highestPercentageOfAddress >= 50)
                    $color_address = '#FFBF00';
                  else  
                    $color_address = '#d2222d';
                }
                

                //license start
                 
                $highestPercentageOfLicNo = $per =0;
                  $highestPercentageLicNo = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_license_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfLicNo = $per;
                      $highestPercentageLicNo = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfLicNo = $per;
                      $highestPercentageLicNo = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfLicNo = 0;
                      $highestPercentageLicNo = $match_str;
                      }
                    }
                  if($highestPercentageLicNo == 'Not Available') 
                  $highestPercentageOfLicNo = 0;

                                    
                  if($highestPercentageOfLicNo == 100 )
                    $color_lic_no = '#238823';
                  elseif($highestPercentageOfLicNo >= 50)
                    $color_lic_no = '#FFBF00';
                  else  
                    $color_lic_no = '#d2222d';
                
                  //licence end

               
                  //licence date start
                  $highestPercentageOfIssueDate = $per =0;
                  $highestPercentageIssueDate = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_date_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfIssueDate = $per;
                      $highestPercentageIssueDate = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfIssueDate = $per;
                      $highestPercentageIssueDate = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfIssueDate = 0;
                      $highestPercentageIssueDate = $match_str;
                      }
                    }
                  if($highestPercentageIssueDate == 'Not Available') 
                  $highestPercentageOfIssueDate = 0;
                 
                
                  if($highestPercentageOfIssueDate == 100 )
                    $color_issue_date = '#238823';
                  elseif($highestPercentageOfIssueDate >= 50)
                    $color_issue_date = '#FFBF00';
                  else  
                    $color_issue_date = '#d2222d';
                
                //licence date end

              
                  //valid start
                  $highestPercentageOfvalidUpto = $per =0;
                  $highestPercentagevalideUpto = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_valid_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfvalidUpto = $per;
                      $highestPercentagevalideUpto = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfvalidUpto = $per;
                      $highestPercentagevalideUpto = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfvalidUpto = 0;
                      $highestPercentagevalideUpto = $match_str;
                      }
                    }
                  if($highestPercentagevalideUpto == 'Not Available') 
                  $highestPercentageOfvalidUpto = 0;
                 
                  if($highestPercentageOfvalidUpto == 100 )
                    $color_valid = '#238823';
                  elseif($highestPercentageOfvalidUpto >= 50)
                    $color_valid = '#FFBF00';
                  else  
                    $color_valid = '#d2222d';

                  //valid end

                //organization start
                 $highestPercentageOfOrg = $per =0;
                  $highestPercentageOrg = $match_string ="";
                  $res = array();
                  $res = \SraHelper::instance()->integration_return_value_percentage_data($match_org_array);
                  $match_str = $res['match_string'];$per = $res['percentage'];
                    if(count($res) > 0){
                      if($per > 0){
                      $highestPercentageOfOrg = $per;
                      $highestPercentageOrg = $match_str;
                      }
                      if($per == 0){
                      $highestPercentageOfOrg = $per;
                      $highestPercentageOrg = $match_str;
                      }  
                      if($per < 0){
                      $highestPercentageOfOrg = 0;
                      $highestPercentageOrg = $match_str;
                      }
                    }
                  if($highestPercentageOrg == 'Not Available') 
                  $highestPercentageOfOrg = 0;

                  if($highestPercentageOfOrg == 100 )
                    $color_org_name = '#238823';
                  elseif($highestPercentageOfOrg >= 50)
                    $color_org_name = '#FFBF00';
                  else  
                    $color_org_name = '#d2222d';
                  //end

                if($highestPercentageLicNo == '')
                  $highestPercentageLicNo = 'Not Available';
                if($highestPercentageOrg == '')
                  $highestPercentageOrg = 'Not Available';
                if($highestPercentageIssueDate == '')
                  $highestPercentageIssueDate = 'Not Available';
                if($highestPercentageName == '')
                  $highestPercentageName = 'Not Available';
                if($highestPercentageAddress == '')
                  $highestPercentageAddress = 'Not Available';
                if($highestPercentagevalideUpto == '')
                  $highestPercentagevalideUpto = 'Not Available';
                ?>
              <div class="col-md-12">
               
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
                            <th width="10%">Number</th>
                                        <th width="10%">Issued Date</th>
                                        <th width="20%">Organization</th>
                                        <th width="20%">Owner Name</th>
                                        <th width="20%">Address</th>
                                        <th width="10%">Valid Up To</th>
                            {{-- <th width="10%">Part No.</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            @foreach($query as $data)
                              <td width="10%">Not Available</td>
                              <td width="10%">Not Available</td>
                              <td width="20%">Not Available</td>
                              <td width="20%">{{$data->HUTOWNERNAME}}</td>
                              <td width="20%">{{$data->Address}}</td>
                              <td width="10%">Not Available</td>
                              {{-- <td width="10%">{{$data->PropertyType}}</td> --}}
                            @endforeach
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
                            <th width="10%">Number</th>
                            <th width="10%">Issued Date</th>
                            <th width="20%">Organization</th>
                            <th width="20%">Owner Name</th>
                            <th width="20%">Address</th>
                            <th width="10%">Valid Up To</th>
                            {{-- <th width="10%">Use Of Slum</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          @if(count($documents) >= 1)
                          @foreach($documents as $doc)
                            @if($doc->year == '2023')
                            <td width="10%"><?= $doc->license_number ?></td>
                            <td width="10%"><?= $doc->license_issue_date ?></td>
                            <td width="20%"><?= $doc->organization_name ?></td>
                            <td width="20%"><?= $doc->owner_name ?></td>
                            <td width="20%"><?= $doc->address ?></td>
                            <td width="10%"><?= $doc->valid_upto ?></td>
                            
                            @endif
                          @endforeach
                          @else
                            <td width='10%'>Not Available</td>
                            <td width='10%'>Not Available</td>
                            <td width='20%'>Not Available</td>
                            <td width='20%'>Not Available</td>
                            <td width='20%'>Not Available</td>
                            <td width='10%'>Not Available</td>
                        @endif
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
                            if(isset($documents)){
                            ?>
                            <img src="http://sra-uat.apniamc.in/images/{{$hid}}_gumasta3.jpeg" style="height:320px;width:100%;" id="myImg3"  onerror="this.onerror=null;this.src='http://sra-uat.apniamc.in/images/noimage.jpg';">
                            <?php }else{ ?>
                              <img src="http://sra-uat.apniamc.in/images/noimage.jpg" style="height:320px;width:100%;" >
                            <?php } ?>
                            <!-- start-->
                            <div id="myModal3" class="modal">
                              <span class="close">&times;</span>
                              <img class="modal-content" id="img03">
                              
                            </div>
                            <script>
                            // Get the modal
                            var modal = document.getElementById("myModal3");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg3");
                            var modalImg = document.getElementById("img03");
                            var captionText = document.getElementById("caption");
                            img.onclick = function(){
                              modal.style.display = "block";
                              modalImg.src = this.src;
                              modalImg.classList.add("zoom");
                              captionText.innerHTML = this.alt;
                            }

                            // Get the close button and add a click event listener
                            var closeButton = modal.querySelector('.close');
                            closeButton.addEventListener('click', function() {
                                // Hide the modal
                                modalImg.classList.remove("zoom");

                                modal.style.display = 'none';
                            });
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
                      <!-- image end -->
                    </div>
                 </div>
                  <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.store_integration_gumasta') }}">
                            @csrf
                            <input type="hidden" name="hut_id" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="3">
                              
                                <h4>Manual Data</h4>
                                <div class="card">
                                  <div class="card-body">
                                    <div class="table-responsive" id="sra-table">
                                      <table class="table table-borderless table-responsive">
                                        <thead>
                                          <tr>
                                            <th width="10%">Number</th>
                                            <th width="10%">Issued Date</th>
                                            <th width="20%">Organization</th>
                                            <th width="20%">Owner Name</th>
                                            <th width="20%">Address</th>
                                            <th width="10%">Valid Up To</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                              <?php if(!isset($int_data_current)){ ?>
                                                <td width="10%"><input type="text" class="form-control" name="License_no" value = "{{ isset($int_data_current->License_no) ? $int_data_current->License_no : '' }}" {{ isset($int_data_current->License_no) ? 'readonly' : '' }} ></td>
                                                <td width="10%"><input type="text" class="form-control" name="License_issue_date"  value = "{{ isset($int_data_current->License_issue_date) ? $int_data_current->License_issue_date : '' }}" {{ isset($int_data_current->License_issue_date) ? 'readonly' : '' }} ></td>
                                                <td width="20%"><input type="text" class="form-control" name="organisation_name"  value = "{{ isset($int_data_current->organisation_name) ? $int_data_current->organisation_name : '' }}" {{ isset($int_data_current->organisation_name) ? 'readonly' : '' }} ></td>
                                                <td width="20%"><input type="text" class="form-control" name="name"  value = "{{ isset($int_data_current->name) ? $int_data_current->name : '' }}" {{ isset($int_data_current->name) ? 'readonly' : '' }} ></td>
                                                <td width="20%"><input type="text" class="form-control" name="address"  value = "{{ isset($int_data_current->address) ? $int_data_current->address : '' }}" {{ isset($int_data_current->address) ? 'readonly' : '' }} ></td>
                                                <td width="10%"><input type="text" class="form-control" name="License_exp_date"  value = "{{ isset($int_data_current->License_exp_date) ? $int_data_current->License_exp_date : '' }}" {{ isset($int_data_current->License_exp_date) ? 'readonly' : '' }} ></td>
                                                <?php }else { ?>
                                                <td width="10%">{{ isset($int_data_current->License_no) ? $int_data_current->License_no : '' }} </td>
                                                <td width="10%">{{ isset($int_data_current->License_issue_date) ? $int_data_current->License_issue_date : '' }}</td>
                                                <td width="20%">{{ isset($int_data_current->organisation_name) ? $int_data_current->organisation_name : '' }}</td>
                                                <td width="20%">{{ isset($int_data_current->name) ? $int_data_current->name : '' }}</td>
                                                <td width="20%">{{ isset($int_data_current->address) ? $int_data_current->address : '' }}</td>
                                                <td width="10%">{{ isset($int_data_current->License_exp_date) ? $int_data_current->License_exp_date : '' }}</td>
                                               <?php } ?>
                                            </tr>
                                            <tr>
                                              <?php 
                                                if(!isset($int_data_current))
                                                {
                                                  ?>
                                                   <td colspan="5"><br/><button id="submitBtn2000" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Manual Data</button></td>
                                                  <?php
                                                } ?>
                                                
                                            </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <br/>
                              <!-- Recomendatioon start -->
                              <h4>Recommendation by Vendor</h4>
                              <div class="card">
                                <div class="card-body">
                                  <!-- start -->
                                  <div class="table-responsive" id="sra-table">
                        <table class="table table-borderless table-responsive">
                            <thead>
                            <tr>
                                <th width="10%" style="background-color:<?= $color_lic_no; ?>;color:#fff;padding: 5px !important;" >Number({{$highestPercentageOfLicNo}}%)</th>
                                <th width="10%" style="background-color:<?= $color_issue_date; ?>;color:#fff;padding: 5px !important;" >Issued Date({{$highestPercentageOfIssueDate}}%)</th>
                                <th width="20%" style="background-color:<?= $color_org_name; ?>;color:#fff;padding: 5px !important;" >Organization({{$highestPercentageOfOrg}}%)</th>
                                <th width="20%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;" >Owner Name({{$highestPercentageOfName}}%)</th>
                                <th width="20%"  style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;" >Address({{$highestPercentageOfAddress}}%) </th></th>
                                <th width="10%"  style="background-color:<?= $color_valid; ?>;color:#fff;padding: 5px !important;" >Valid Up to({{$highestPercentageOfvalidUpto}}%)</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @foreach($results as $data) --}}
                              <tr>
                                <td width="10%"><?= $highestPercentageLicNo ?></td>
                                 <td width="10%"><?= $highestPercentageIssueDate ?></td>
                                <td width="20%"><?= $highestPercentageOrg ?></td>
                                <td width="20%"><?= $highestPercentageName ?></td>
                                <td width="20%"><?= $highestPercentageAddress ?></td>
                                <td width="10%"><?= $highestPercentagevalideUpto ?></td>
                              </tr>
                              {{-- @endforeach --}}
                              <tr>
                                {{-- <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td> --}}
                              </tr>
                              <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_gumasta') }}">
                              @csrf
                              <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="3">
                              <input type="hidden" name="user" value="vendor">
                              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                              <tr>
                              <!-- <td colspan="5"><hr/><b>Eligible / Not Eligible :</b></td> -->
                              </tr>
                              <tr>
                                 <?php if (isset($data_current) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_licanse_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_licanse_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_licanse_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="10%">
                                      <?php 
                                      if($data_current->eligibility_licanse_issue_date == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_licanse_issue_date == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_licanse_issue_date == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                     <td width="20%">
                                      <?php 
                                      if($data_current->eligibility_owner_org_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_owner_org_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_owner_org_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="20%">
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
                                      if($data_current->eligibility_validity == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current->eligibility_validity == 1){
                                        echo "Manual";
                                      }
                                      if($data_current->eligibility_validity == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else { ?>

                                <td width="10%">
                                <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="20%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="20%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="20%">
                                <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2"  {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/><b>Remark :</b></td>
                              </tr>
                              <tr>
                                <?php if (isset($data_current) ) { ?>
                                  <td width="10%">{{ isset($data_current->remark_licanse_name) ? $data_current->remark_licanse_name : '' }}</td>
                                <td width="10%">{{ isset($data_current->remark_licanse_issue_date) ? $data_current->remark_licanse_issue_date : '' }}</td>
                                <td width="20%">{{ isset($data_current->remark_owner_org_name) ? $data_current->remark_owner_org_name : '' }}</td>
                                <td width="20%">{{ isset($data_current->remark_owner_name) ? $data_current->remark_owner_name : '' }}</td>
                                <td width="20%">{{ isset($data_current->remark_address) ? $data_current->remark_address : '' }}</td>
                                <td width="10%">{{ isset($data_current->remark_validity) ? $data_current->remark_validity : '' }}</td>
                                 <?php }else{ ?>
                                <td width="10%"><input type="text" class="form-control" name="remark1" value = "{{ isset($data_current->remark_licanse_name) ? $data_current->remark_licanse_name : '' }}" {{ isset($data_current->remark_licanse_name) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="10%"><input type="text" class="form-control" name="remark2" value = "{{ isset($data_current->remark_licanse_issue_date) ? $data_current->remark_licanse_issue_date : '' }}" {{ isset($data_current->remark_licanse_issue_date) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="20%"><input type="text" class="form-control" name="remark3" value = "{{ isset($data_current->remark_owner_org_name) ? $data_current->remark_owner_org_name : '' }}" {{ isset($data_current->remark_owner_org_name) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="20%"><input type="text" class="form-control" name="remark6" value = "{{ isset($data_current->remark_owner_name) ? $data_current->remark_owner_name : '' }}" {{ isset($data_current->remark_owner_name) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="20%"><input type="text" class="form-control" name="remark4" value = "{{ isset($data_current->remark_address) ? $data_current->remark_address : '' }}" {{ isset($data_current->remark_address) ? 'readonly' : '' }} <?= $access ?>></td>
                                <td width="10%"><input type="text" class="form-control" name="remark5" value = "{{ isset($data_current->remark_validity) ? $data_current->remark_validity : '' }}" {{ isset($data_current->remark_validity) ? 'readonly' : '' }} <?= $access ?>></td>
                              <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                              <tr>
                                <td ><b>Section Eligibility :</b></td>
                                <td ><b>Section Remark :</b></td>
                                <?php
                                if(count($documents2)>0){
                                  $remark2 = "Gumasta Document with License number ".$documents2[0]->license_number. " license issue date " .$documents2[0]->license_issue_date. " and organization name ".$documents2[0]->organization_name;
                              }else{
                                  $remark2 = "";
                              }
                              // print_r($remark);die;
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
                                        echo " Not Matched";
                                      }
                                      if($data_current->overall_eligibility == 3){
                                        echo " Unavailable";
                                      }
                                        ?>
                                       <?php }else { ?>
                                      <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                        <option value="0">-- Select Option --</option>
                                        <option value="1" {{ isset($data_current->overall_eligibility) && ($data_current->overall_eligibility == 1) ? 'selected' : '' }} >Verified</option>
                                        <option value="2" {{ isset($data_current->overall_eligibility) &&($data_current->overall_eligibility == 2) ? 'selected' : '' }}>Not Matched</option>
                                        <option value="3" {{ isset($data_current->overall_eligibility) &&($data_current->overall_eligibility == 3) ? 'selected' : '' }}>Unavailable</option>

                                      </select>
                                    <?php } ?>
                                    </td> 
                                    <td width="10%" colspan="5">
                                      <?php if (isset($data_current) ) { ?>
                                        {{ isset($data_current->overall_remark) ? $data_current->overall_remark : 'Not Available' }}
                                      <?php }else { ?>
                                        <textarea class="form-control" style="height: auto !important;" class="form-control" name="remark" cols="100" {{ isset($data_current->overall_remark) ? 'readonly' : '' }}>{{ isset($data_current->overall_remark) ? $data_current->overall_remark :  $remark2 }}</textarea>                                    <?php } ?>
                                    </td>

                              </tr>
                              <tr>
                                @hasAccess('admin.sra.vendor_remark')
                                  @if(!isset($data_current))
                                    <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                                  @endif
                                @endHasAccess
                              </tr>
                            </tbody>
                          </table>
                          </form>
                    </div>
                                  <!-- end -->
                                </div>
                              </div>
                              <!-- recommendation by vendor end -->
                              <!-- recommendation by ca start-->
                              @hasAccess('admin.sra.ca_remark')
                              <h4>Conclution of CA</h4>
                              <div class="card">
                                <div class="card-body">
                                  <!-- start-->
                                  <div class="table-responsive" id="sra-table">
                        <table class="table table-borderless table-responsive">
                            <thead>
                            <tr>
                               <th width="10%" style="background-color:<?= $color_lic_no; ?>;color:#fff;padding: 5px !important;" >Number({{$highestPercentageOfLicNo}}%)</th>
                                <th width="10%" style="background-color:<?= $color_issue_date; ?>;color:#fff;padding: 5px !important;" >Issued Date({{$highestPercentageOfIssueDate}}%)</th>
                                <th width="20%" style="background-color:<?= $color_org_name; ?>;color:#fff;padding: 5px !important;" >Organization({{$highestPercentageOfOrg}}%)</th>
                                <th width="20%" style="background-color:<?= $color_name; ?>;color:#fff;padding: 5px !important;" >Owner Name({{$highestPercentageOfName}}%)</th>
                                <th width="20%"  style="background-color:<?= $color_address; ?>;color:#fff;padding: 5px !important;" >Address({{$highestPercentageOfAddress}}%) </th></th>
                                <th width="10%"  style="background-color:<?= $color_valid; ?>;color:#fff;padding: 5px !important;" >Valid Up to({{$highestPercentageOfvalidUpto}}%)</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @foreach($results as $data) --}}
                              <tr>
                                <td width="10%"><?= $highestPercentageLicNo ?></td>
                                 <td width="10%"><?= $highestPercentageIssueDate ?></td>
                                <td width="20%"><?= $highestPercentageName ?></td>
                                <td width="20%"><?= $highestPercentageName ?></td>
                                <td width="20%"><?= $highestPercentageAddress ?></td>
                                <td width="10%"><?= $highestPercentagevalideUpto ?></td>
                              </tr>
                              <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_gumasta') }}">
                              @csrf
                              <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                              <input type="hidden" name="year" value="3">
                              <input type="hidden" name="user" value="ca">
                              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                              <tr>
                                 <?php if (isset($data_current_ca) ) { ?>
                                  <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_licanse_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_licanse_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_licanse_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="10%">
                                      <?php 
                                      if($data_current_ca->eligibility_licanse_issue_date == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_licanse_issue_date == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_licanse_issue_date == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="20%">
                                      <?php 
                                      if($data_current_ca->eligibility_owner_org_name == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_owner_org_name == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_owner_org_name == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                    <td width="20%">
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
                                      if($data_current_ca->eligibility_validity == 0){
                                        echo "Not Available";
                                      }
                                      if($data_current_ca->eligibility_validity == 1){
                                        echo "Manual";
                                      }
                                      if($data_current_ca->eligibility_validity == 2){
                                        echo "Auto";
                                      }
                                      ?>
                                    </td>
                                 <?php }else{ ?>
                                  <td width="10%">
                                <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfLicNo) && $highestPercentageOfLicNo == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfIssueDate) && $highestPercentageOfIssueDate == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="20%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="20%">
                                <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="20%">
                                <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2"  {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                <td width="10%">
                                <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                    <option value="0">-- Select Option --</option>
                                    <option value="1" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto < 100 ? 'selected' : '' }}>Manual</option>
                                    <option value="2" {{ isset($highestPercentageOfvalidUpto) && $highestPercentageOfvalidUpto == 100 ? 'selected' : '' }}>Auto</option>
                                </select>
                                </td>
                                 <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/><b>Remark :</b></td>
                              </tr>
                              <tr>
                                <?php if (isset($data_current_ca) ) { ?>
                                  <td width="10%">{{ isset($data_current_ca->remark_licanse_name) ? $data_current_ca->remark_licanse_name : '' }}</td>
                                <td width="10%">{{ isset($data_current_ca->remark_licanse_issue_date) ? $data_current_ca->remark_licanse_issue_date : '' }}</td>
                                <td width="20%">{{ isset($data_current_ca->remark_owner_org_name) ? $data_current_ca->remark_owner_org_name : '' }}</td>
                                <td width="20%">{{ isset($data_current_ca->remark_owner_name) ? $data_current_ca->remark_owner_name : '' }}</td>
                                <td width="20%">{{ isset($data_current_ca->remark_address) ? $data_current_ca->remark_address : '' }}</td>
                                <td width="10%">{{ isset($data_current_ca->remark_validity) ? $data_current_ca->remark_validity : '' }}</td>
                                 <?php }else{ ?>
                                <td width="10%"><input type="text" class="form-control" name="remark1_ca" value = "{{ isset($data_current_ca->remark_licanse_name) ? $data_current_ca->remark_licanse_name : '' }}" {{ isset($data_current_ca->remark_licanse_name) ? 'readonly' : '' }} ></td>
                                <td width="10%"><input type="text" class="form-control" name="remark2_ca" value = "{{ isset($data_current_ca->remark_licanse_issue_date) ? $data_current_ca->remark_licanse_issue_date : '' }}" {{ isset($data_current_ca->remark_licanse_issue_date) ? 'readonly' : '' }} ></td>
                                <td width="20%"><input type="text" class="form-control" name="remark3_ca" value = "{{ isset($data_current_ca->remark_owner_org_name) ? $data_current_ca->remark_owner_org_name : '' }}" {{ isset($data_current_ca->remark_owner_org_name) ? 'readonly' : '' }} ></td>
                               
                                 <td width="20%">
                                  <?php if(isset($data_current_ca->remark_owner_name)){?>
                                    <input type="text" class="form-control" name="remark6_ca" value = "{{$data_current_ca->remark_owner_name}}" >
                                  <?php } else { ?>
                                    <input type="text" class="form-control" name="remark6_ca" value = "" >
                                  <?php } ?>
                                </td>
                                <td width="20%"><input type="text" class="form-control" name="remark4_ca" value = "{{ isset($data_current_ca->remark_address) ? $data_current_ca->remark_address : '' }}" {{ isset($data_current_ca->remark_address) ? 'readonly' : '' }}></td>
                                <td width="10%"><input type="text" class="form-control" name="remark5_ca" value = "{{ isset($data_current_ca->remark_validity) ? $data_current_ca->remark_validity : '' }}" {{ isset($data_current_ca->remark_validity) ? 'readonly' : '' }}></td>
                              <?php } ?>
                              </tr>
                              <tr>
                                <td colspan="6"><hr/></td>
                              </tr>
                              <tr>
                                <td ><b>Section Eligibility :</b></td>
                                <td ><b>Section Remark :</b></td>
                                  
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
                                        <option value="1" {{ isset($data_current_ca->overall_eligibility) && ($data_current_ca->overall_eligibility == 1) ? 'selected' : '' }} >Verified</option>
                                        <option value="2" {{ isset($data_current_ca->overall_eligibility) &&($data_current_ca->overall_eligibility == 2) ? 'selected' : '' }}>Not Matched</option>
                                        <option value="3" {{ isset($data_current_ca->overall_eligibility) &&($data_current_ca->overall_eligibility == 3) ? 'selected' : '' }}>Unavailable</option>

                                      </select>
                                    <?php } ?>
                                    </td> 
                                    <td width="10%" colspan="5">
                                      <?php if (isset($data_current_ca) ) { ?>
                                        {{ isset($data_current_ca->overall_remark) ? $data_current_ca->overall_remark : 'Not Available' }}
                                      <?php }else { ?>
                                        <textarea class="form-control" style="height: auto !important;" name="remark" cols="100" {{ isset($data_current_ca->overall_remark) ? 'readonly' : '' }}>{{ isset($data_current_ca->overall_remark) ? $data_current_ca->overall_remark :  $remark2 }}</textarea>
                                    <?php } ?>
                                    </td>

                              </tr>
                              <tr>
                              @if(!isset($data_current_ca))
                                <td rowspan='2'><br/><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                              @endif
                              </tr>
                            </form>
                            </tbody>
                          </table>
                        </div>
                                  <!-- end -->
                                </div>
                              </div>
                              @endHasAccess
                              <!-- ca end -->
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
                                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.store_overall_remark') }}">
                                    @csrf
                                    <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                                    <input type="hidden" name="user" value="{{auth()->user()->id}}">
                                    <input type="hidden" name="type" value="gumasta">
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
                                            <?php if($overall_remark[0]->gumasta_status == 0){ ?>
                                                <option value="0" selected="">-- Select Option --</option>
                                              <?php }else{ ?>
                                                <option value="0">-- Select Option --</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->gumasta_status == 1){ ?>
                                                <option value="1" selected="">Verified</option>
                                              <?php }else{ ?>
                                                <option value="1" >Verified</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->gumasta_status == 2){ ?>
                                                <option value="2" selected="">Not Matched</option>
                                              <?php }else{ ?>
                                                <option value="2" >Not Matched</option>
                                              <?php } ?>
                                              <?php if($overall_remark[0]->gumasta_status == 3){ ?>
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
                                           <textarea name="remark" cols="100" class="form-control">{{$overall_remark[0]->gumasta_remark}}</textarea>
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
                           
                           
              
                  <!-- end -->
                </div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
                <a href="#" class="tab-label" style="color:#495057!important;font-size:16px !important;">Photo Pass Details</a>
                <div class="tab-content">Photo Pass Details</div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-5" class="tab-switch">
                <a href="index.php/sra/agreement/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Registration Agreement Details</a>
                <div class="tab-content">Registration Agreement Details</div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-7" class="tab-switch">
                <a href="index.php/sra/adhar/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Aadhar Card</a>
                <div class="tab-content">Registration Agreement Details</div>
              </div>
              <div class="tab">
                <input type="radio" name="css-tabs" id="tab-6" class="tab-switch">
                 <a href="index.php/sra/final/{{$hid}}" class="tab-label" style="color:#495057!important;font-size:16px !important;">Final Submission</a>
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