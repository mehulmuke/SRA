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

</style>
@section('content')

    <div class="row">
        <div class="col-md-12">
          <!-- tab start-->
           <div class="card">
            <div class="card-body">
            <div class="tabs">
           <div class="tab">
            <input type="radio" name="css-tabs" id="tab-1" class="tab-switch">
            <a href="index.php/sra/detail/{{$hid}}" class="tab-label" style="color:#495057!important;">Electricity</a>

            <div class="tab-content">Electricity Details</div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-2" checked class="tab-switch">
            <label for="tab-2" class="tab-label">Election</label>
            <div class="tab-content">
            <!-- election start-->
            <!-- start -->
                              <!-- body start -->
                              <div class="table-responsive" id="sra-table">
                                <table class="table table-borderless table-responsive">
                                  <thead>
                                      <tr>
                                        <th>HUT ID</th>
                                        <th>Cluster ID</th>
                                        <th>Scheme Name</th>
                                        <th>Floor Num</th>
                                        <th>HUT Length Sq.Mtr</th>
                                        <th>HUT Width Sq.Mtr</th>
                                        <th>Area Sq.Mtr</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      @foreach($query as $data)
                                        <td>{{$data->HUTSURVERYID}}</td>
                                        <?php $hid = $data->HUTSURVERYID ?>
                                        <td>{{$data->ClusterId}}</td>
                                        <td>{{$data->SchemeName}}</td>
                                        <td>{{$data->FLOORNUM}}</td>
                                        <td>{{round($data->HUTLENGTH,2)}}</td>
                                        <td>{{round($data->HUTWIDTH,2)}}</td>
                                        <td>{{round($data->Area,2)}}</td>
                                      @endforeach
                                  </tr>
                                  </tbody>
                                </table>
                              </div>
                            
                        
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
                    foreach($query as $data)
                    {
                      $name_sims = $data->HUTOWNERNAME;
                      $address_sims = $data->Address;
                      $num_sims = 'No data Available';
                      $type_sims = 'Voting Card';
                      $cont_no_sims = 'No data Available';
                      $sr_no_sims = 'No data Available';
                      $part_no_sims = 'No data Available';

                    }
                    
                    $int_name = $election_data[0]->elector_name;
                    $int_address = 'No data Available';
                    $int_num = 'No data Available';
                    $int_type = 'Voting Card';
                    $int_cont_no = $election_data[0]->cont_no;
                    $int_sr_no = $election_data[0]->sr_no;
                    $int_part_no = $election_data[0]->part_no;

                    //For Name
                    $elector_name_new = $election_data[0]->elector_name;

                    $match_data = similar_text($name_sims,$elector_name_new,$percent);
                    $match_name[$elector_name_new] = number_format($percent,2);

                    $match_data = similar_text($name_sims,$int_name,$percent);
                    $match_name[$int_name] = number_format($percent,2);

                    $highestPercentageOfName = 0;
                    $highestPercentageName = "";
    
                    foreach ($match_name as $name => $percentage) {
                        if ($percentage >= $highestPercentageOfName) {
                            $highestPercentageOfName = $percentage;
                            $highestPercentageName = $name;
                        }
                    }
                    if($highestPercentageOfName == 100 )
                      $color_name = 'green';
                    elseif($highestPercentageOfName >= 50)
                      $color_name = 'orange';
                    else  
                      $color_name = 'red';


                    //For Address
                    $elector_address_new = 'No data Available';

                    $match_data = similar_text($address_sims,$elector_address_new,$percent);
                    $match_address[$elector_name_new] = number_format($percent,2);

                    $match_data = similar_text($address_sims,$int_address,$percent);
                    $match_address[$int_address] = number_format($percent,2);

                    $highestPercentageOfAddress = 0;
                    $highestPercentageAddress = "";
    
                    foreach ($match_address as $name => $percentage) {
                        if ($percentage >= $highestPercentageOfAddress) {
                            $highestPercentageOfAddress = $percentage;
                            $highestPercentageAddress = $name;
                        }
                    }
                    if($highestPercentageOfAddress == 100 )
                      $color_address = 'green';
                    elseif($highestPercentageOfAddress >= 50)
                      $color_address = 'orange';
                    else  
                      $color_address = 'red';

                   //For Number
                   $elector_num_new = 'No data Available';

                   $match_data = similar_text($num_sims,$elector_num_new,$percent);
                   $match_num[$elector_num_new] = number_format($percent,2);

                   $match_data = similar_text($num_sims,$int_num,$percent);
                   $match_num[$int_num] = number_format($percent,2);

                   $highestPercentageOfNum = 0;
                   $highestPercentageNum = "";
   
                   foreach ($match_num as $num => $percentage) {
                       if ($percentage >= $highestPercentageOfNum) {
                           $highestPercentageOfNum = $percentage;
                           $highestPercentageNum = $num;
                       }
                   }
                   if($highestPercentageOfNum == 100 )
                     $color_num = 'green';
                   elseif($highestPercentageOfNum >= 50)
                     $color_num = 'orange';
                   else  
                     $color_num = 'red';

                    //For Type
                    $elector_type_new = 'Voting Card';

                    $match_data = similar_text($type_sims,$elector_type_new,$percent);
                    $match_type[$elector_type_new] = number_format($percent,2);
 
                    $match_data = similar_text($type_sims,$int_type,$percent);
                    $match_type[$int_type] = number_format($percent,2);
 
                    $highestPercentageOfType = 0;
                    $highestPercentageType = "";
    
                    foreach ($match_type as $type => $percentage) {
                        if ($percentage >= $highestPercentageOfType) {
                            $highestPercentageOfType = $percentage;
                            $highestPercentageType = $type;
                        }
                    }
                    if($highestPercentageOfType == 100 )
                      $color_type = 'green';
                    elseif($highestPercentageOfType >= 50)
                      $color_type = 'orange';
                    else  
                      $color_type = 'red';
                  
                    //For Const
                    $elector_const_new = $election_data[0]->cont_no;

                    $match_data = similar_text($cont_no_sims,$elector_const_new,$percent);
                    $match_const[$elector_const_new] = number_format($percent,2);

                    $match_data = similar_text($cont_no_sims,$int_cont_no,$percent);
                    $match_const[$int_cont_no] = number_format($percent,2);

                    $highestPercentageOfconst = 0;
                    $highestPercentageConst = "";
                    foreach ($match_const as $const => $percentage) {
                        if ($percentage >= $highestPercentageOfconst) {
                            $highestPercentageOfconst = $percentage;
                            $highestPercentageConst = $const;
                        }
                    }
                    if($highestPercentageOfconst == 100 )
                      $color_const = 'green';
                    elseif($highestPercentageOfconst >= 50)
                      $color_const = 'orange';
                    else  
                      $color_const = 'red';
                    
                    //For SR
                    $elector_sr_new = $election_data[0]->sr_no;
                    $match_data = similar_text($sr_no_sims,$elector_sr_new,$percent);
                    $match_sr[$elector_sr_new] = number_format($percent,2);

                    $match_data = similar_text($sr_no_sims,$int_sr_no,$percent);
                    $match_sr[$int_sr_no] = number_format($percent,2);

                    $highestPercentageOfSrno = 0;
                    $highestPercentageSr = "";
    
                    foreach ($match_sr as $sr => $percentage) {
                        if ($percentage >= $highestPercentageOfSrno) {
                            $highestPercentageOfSrno = $percentage;
                            $highestPercentageSr = $sr;
                        }
                    }
                    if($highestPercentageOfSrno == 100 )
                      $color_sr = 'green';
                    elseif($highestPercentageOfSrno >= 50)
                      $color_sr = 'orange';
                    else  
                      $color_sr = 'red';
                    //For Part
                    $elector_part_new = $election_data[0]->part_no;
                    $match_data = similar_text($part_no_sims,$elector_part_new,$percent);
                    $match_part[$elector_part_new] = number_format($percent,2);

                    $match_data = similar_text($part_no_sims,$int_part_no,$percent);
                    $match_part[$int_part_no] = number_format($percent,2);

                    $highestPercentageOfPart = 0;
                    $highestPercentagePart = "";
    
                    foreach ($match_part as $part => $percentage) {
                        if ($percentage >= $highestPercentageOfPart) {
                            $highestPercentageOfPart = $percentage;
                            $highestPercentagePart = $part;
                        }
                    }
                    if($highestPercentageOfPart == 100 )
                      $color_part = 'green';
                    elseif($highestPercentageOfPart >= 50)
                      $color_part = 'orange';
                    else  
                      $color_part = 'red';

                ?>
                
                <?php $access = 'readonly' ?>
                @hasAccess('admin.sra.vendor_remark')
                  <?php
                    $access = '';
                  ?>
                @endHasAccess

              
              <div class="col-md-12">
                <hr/>
                <div class="d-flex align-items-center">
                   <h3 class="card-title"><i class="fas fa-list"></i> &nbsp;Year 2000 or Before</h3>
                </div>
                <hr/>
                <br/>
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
                        
                          @foreach($query as $data)
                              <td width="10%">{{$data->HUTOWNERNAME}}</td>
                              <td width="20%">{{$data->Address}} </td>
                              <td width="10%">No data Available </td>
                              <td width="10%">Voting Card</td>
                              <td width="10%">No data Available </td>
                              <td width="10%">No data Available </td>
                              <td width="10%">No data Available </td>
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
                            <td width="10%"><?= $election_data[0]->elector_name ?></td>
                            <td width="20%">No data Available </td>
                            <td width="10%"><?= $election_no ?></td>
                            <td width="10%">Voting Card</td>
                            <td width="10%"><?= $election_data[0]->cont_no ?></td>
                            <td width="10%"><?= $election_data[0]->sr_no ?></td>
                            <td width="10%"><?= $election_data[0]->part_no ?></td>
                            {{-- <td width="10%">
                              <img src="http://localhost/sraservices_old/public/storage/media/rnynt00Evsb9kdC10GKVB517AHISla1O9KAYZYrl.jpg" height="80" width="80">
                            </td> --}}
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                          {{-- Integration part --}}
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
                                        {
                                  if(isset($election_data[0]) && $election_no != ''){
                                      // print_r($election_data[0]);die;
                              ?>

                                              <tr>
                                                  <td width="10%"><?= $election_data[0]->elector_name ?></td>
                                                  <td width="20%">No data Available </td>
                                                  <td width="10%"><?= $election_no ?></td>
                                                  <td width="10%">Voting Card</td>
                                                  <td width="10%"><?= $election_data[0]->cont_no ?></td>
                                                  <td width="10%"><?= $election_data[0]->sr_no ?></td>
                                                  <td width="10%"><?= $election_data[0]->part_no ?></td>
                                              </tr>
                                            <?php  }} ?>
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
                            <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                            <td width="10%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                            <td width="10%" style="background:<?= $color_num; ?>"><?= $highestPercentageNum; ?></td>
                            <td width="10%" style="background:<?= $color_type; ?>"><?= $highestPercentageType; ?></td>
                            <td width="10%" style="background:<?= $color_const; ?>"><?= $highestPercentageConst; ?></td>
                            <td width="10%" style="background:<?= $color_sr; ?>"><?= $highestPercentageSr; ?></td>
                            <td width="10%" style="background:<?= $color_part; ?>"><?= $highestPercentagePart; ?></td>
                        </tr>
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_election') }}">
                          @csrf
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="1">
                          <input type="hidden" name="user" value="vendor">

                          <tr>
                            <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                          </tr>
                          <tr>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  {{ isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="6"><hr/><b>Remark :</b></td>
                          </tr>
                          <tr>
                              <td width="10%"><input type="text" name="remark1" value = "{{ isset($data_2000->remark_name) ? $data_2000->remark_name : '' }}" {{ isset($data_2000->remark_name) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="20%"><input type="text" name="remark2" value = "{{ isset($data_2000->remark_address) ? $data_2000->remark_address : '' }}" {{ isset($data_2000->remark_address) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark3" value = "{{ isset($data_2000->remark_number) ? $data_2000->remark_number : '' }}" {{ isset($data_2000->remark_number) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark4" value = "{{ isset($data_2000->remark_type) ? $data_2000->remark_type : '' }}" {{ isset($data_2000->remark_type) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark5" value = "{{ isset($data_2000->remark_const_no) ? $data_2000->remark_const_no : '' }}" {{ isset($data_2000->remark_const_no) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark6" value = "{{ isset($data_2000->remark_sr_no) ? $data_2000->remark_sr_no : '' }}" {{ isset($data_2000->remark_sr_no) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark7" value = "{{ isset($data_2000->remark_part_no) ? $data_2000->remark_part_no : '' }}" {{ isset($data_2000->remark_part_no) ? 'readonly' : '' }}  <?= $access ?>></td>

                          </tr>
                          <tr>
                            <td ><hr/><b>Overall Eligibility :</b></td>
                            <td ><hr/><b>Overall Remark :</b></td>
                            @hasAccess('admin.sra.vendor_remark')
                              <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                            @endHasAccess

                          </tr>
                          <tr>
                             <td width="10%">
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($data_2000->overall_eligibility) && ($data_2000->overall_eligibility == 1) ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($data_2000->overall_eligibility) && ($data_2000->overall_eligibility == 2) ? 'selected' : '' }}>Auto</option>
                                </select>
                              </td> 
                              <td width="10%"><input type="text" name="remark" value = "{{ isset($data_2000->overall_remark) ? $data_2000->overall_remark : '' }}" {{ isset($data_2000->overall_remark) ? 'readonly' : '' }}></td>
                        </tr>
                        </form>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                @hasAccess('admin.sra.ca_remark')
                <h4>Conclusion of CA</h4>
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
                            <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                            <td width="10%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                            <td width="10%" style="background:<?= $color_num; ?>"><?= $highestPercentageNum; ?></td>
                            <td width="10%" style="background:<?= $color_type; ?>"><?= $highestPercentageType; ?></td>
                            <td width="10%" style="background:<?= $color_const; ?>"><?= $highestPercentageConst; ?></td>
                            <td width="10%" style="background:<?= $color_sr; ?>"><?= $highestPercentageSr; ?></td>
                            <td width="10%" style="background:<?= $color_part; ?>"><?= $highestPercentagePart; ?></td>
                        </tr>                           
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_election') }}">
                          @csrf
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="1">
                          <input type="hidden" name="user" value="ca">
                        <tr>
                          <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                        </tr>
                        <tr>
                        <tr>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  {{ isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                          </tr>
                        <tr>
                          <td colspan="6"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                              <td width="10%"><input type="text" name="remark1_ca" value = "{{ isset($data_2000_ca->remark_name) ? $data_2000_ca->remark_name : '' }}" {{ isset($data_2000_ca->remark_name) ? 'readonly' : '' }} ></td>
                              <td width="20%"><input type="text" name="remark2_ca" value = "{{ isset($data_2000_ca->remark_address) ? $data_2000_ca->remark_address : '' }}" {{ isset($data_2000_ca->remark_address) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark3_ca" value = "{{ isset($data_2000_ca->remark_number) ? $data_2000_ca->remark_number : '' }}" {{ isset($data_2000_ca->remark_number) ? 'readonly' : '' }} ></td>
                              <td width="10%"><input type="text" name="remark4_ca" value = "{{ isset($data_2000_ca->remark_type) ? $data_2000_ca->remark_type : '' }}" {{ isset($data_2000_ca->remark_type) ? 'readonly' : '' }} ></td>
                              <td width="10%"><input type="text" name="remark5_ca" value = "{{ isset($data_2000_ca->remark_const_no) ? $data_2000_ca->remark_const_no : '' }}" {{ isset($data_2000_ca->remark_const_no) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark6_ca" value = "{{ isset($data_2000_ca->remark_sr_no) ? $data_2000_ca->remark_sr_no : '' }}" {{ isset($data_2000_ca->remark_sr_no) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark7_ca" value = "{{ isset($data_2000_ca->remark_part_no) ? $data_2000_ca->remark_part_no : '' }}" {{ isset($data_2000_ca->remark_part_no) ? 'readonly' : '' }} ></td>

                          </tr>
                          <tr>
                            <td ><hr/><b>Overall Eligibility :</b></td>
                            <td ><hr/><b>Overall Remark :</b></td>
                              <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                          </tr>
                          <tr>
                             <td width="10%">
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($data_2000_ca->overall_eligibility) && ($data_2000_ca->overall_eligibility == 1) ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($data_2000_ca->overall_eligibility) && ($data_2000_ca->overall_eligibility == 2) ? 'selected' : '' }}>Auto</option>
                                </select>
                              </td> 
                              <td width="10%"><input type="text" name="remark" value = "{{ isset($data_2000_ca->overall_remark) ? $data_2000_ca->overall_remark : '' }}" {{ isset($data_2000_ca->overall_remark) ? 'readonly' : '' }}></td>
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
              <!-- Year 2000 start -->
              <?php
                 foreach($query as $data)
                 {
                   $name_sims = $data->HUTOWNERNAME;
                   $address_sims = $data->Address;
                   $num_sims = 'No data Available';
                   $type_sims = 'Voting Card';
                   $cont_no_sims = 'No data Available';
                   $sr_no_sims = 'No data Available';
                   $part_no_sims = 'No data Available';

                 }
                 
                 $int_name = $election_data[0]->elector_name;
                 $int_address = 'No data Available';
                 $int_num = 'No data Available';
                 $int_type = 'Voting Card';
                 $int_cont_no = $election_data[0]->cont_no;
                 $int_sr_no = $election_data[0]->sr_no;
                 $int_part_no = $election_data[0]->part_no;

                 //For Name
                 $elector_name_new = $election_data[0]->elector_name;

                 $match_data = similar_text($name_sims,$elector_name_new,$percent);
                 $match_name[$elector_name_new] = number_format($percent,2);

                 $match_data = similar_text($name_sims,$int_name,$percent);
                 $match_name[$int_name] = number_format($percent,2);

                 $highestPercentageOfName = 0;
                 $highestPercentageName = "";
 
                 foreach ($match_name as $name => $percentage) {
                     if ($percentage >= $highestPercentageOfName) {
                         $highestPercentageOfName = $percentage;
                         $highestPercentageName = $name;
                     }
                 }
                 if($highestPercentageOfName == 100 )
                   $color_name = 'green';
                 elseif($highestPercentageOfName >= 50)
                   $color_name = 'orange';
                 else  
                   $color_name = 'red';


                 //For Address
                 $elector_address_new = 'No data Available';

                 $match_data = similar_text($address_sims,$elector_address_new,$percent);
                 $match_address[$elector_name_new] = number_format($percent,2);

                 $match_data = similar_text($address_sims,$int_address,$percent);
                 $match_address[$int_address] = number_format($percent,2);

                 $highestPercentageOfAddress = 0;
                 $highestPercentageAddress = "";
 
                 foreach ($match_address as $name => $percentage) {
                     if ($percentage >= $highestPercentageOfAddress) {
                         $highestPercentageOfAddress = $percentage;
                         $highestPercentageAddress = $name;
                     }
                 }
                 if($highestPercentageOfAddress == 100 )
                   $color_address = 'green';
                 elseif($highestPercentageOfAddress >= 50)
                   $color_address = 'orange';
                 else  
                   $color_address = 'red';

                //For Number
                $elector_num_new = 'No data Available';

                $match_data = similar_text($num_sims,$elector_num_new,$percent);
                $match_num[$elector_num_new] = number_format($percent,2);

                $match_data = similar_text($num_sims,$int_num,$percent);
                $match_num[$int_num] = number_format($percent,2);

                $highestPercentageOfNum = 0;
                $highestPercentageNum = "";

                foreach ($match_num as $num => $percentage) {
                    if ($percentage >= $highestPercentageOfNum) {
                        $highestPercentageOfNum = $percentage;
                        $highestPercentageNum = $num;
                    }
                }
                if($highestPercentageOfNum == 100 )
                  $color_num = 'green';
                elseif($highestPercentageOfNum >= 50)
                  $color_num = 'orange';
                else  
                  $color_num = 'red';

                 //For Type
                 $elector_type_new = 'Voting Card';

                 $match_data = similar_text($type_sims,$elector_type_new,$percent);
                 $match_type[$elector_type_new] = number_format($percent,2);

                 $match_data = similar_text($type_sims,$int_type,$percent);
                 $match_type[$int_type] = number_format($percent,2);

                 $highestPercentageOfType = 0;
                 $highestPercentageType = "";
 
                 foreach ($match_type as $type => $percentage) {
                     if ($percentage >= $highestPercentageOfType) {
                         $highestPercentageOfType = $percentage;
                         $highestPercentageType = $type;
                     }
                 }
                 if($highestPercentageOfType == 100 )
                   $color_type = 'green';
                 elseif($highestPercentageOfType >= 50)
                   $color_type = 'orange';
                 else  
                   $color_type = 'red';
               
                 //For Const
                 $elector_const_new = $election_data[0]->cont_no;

                 $match_data = similar_text($cont_no_sims,$elector_const_new,$percent);
                 $match_const[$elector_const_new] = number_format($percent,2);

                 $match_data = similar_text($cont_no_sims,$int_cont_no,$percent);
                 $match_const[$int_cont_no] = number_format($percent,2);

                 $highestPercentageOfconst = 0;
                 $highestPercentageConst = "";
                 foreach ($match_const as $const => $percentage) {
                     if ($percentage >= $highestPercentageOfconst) {
                         $highestPercentageOfconst = $percentage;
                         $highestPercentageConst = $const;
                     }
                 }
                 if($highestPercentageOfconst == 100 )
                   $color_const = 'green';
                 elseif($highestPercentageOfconst >= 50)
                   $color_const = 'orange';
                 else  
                   $color_const = 'red';
                 
                 //For SR
                 $elector_sr_new = $election_data[0]->sr_no;
                 $match_data = similar_text($sr_no_sims,$elector_sr_new,$percent);
                 $match_sr[$elector_sr_new] = number_format($percent,2);

                 $match_data = similar_text($sr_no_sims,$int_sr_no,$percent);
                 $match_sr[$int_sr_no] = number_format($percent,2);

                 $highestPercentageOfSrno = 0;
                 $highestPercentageSr = "";
 
                 foreach ($match_sr as $sr => $percentage) {
                     if ($percentage >= $highestPercentageOfSrno) {
                         $highestPercentageOfSrno = $percentage;
                         $highestPercentageSr = $sr;
                     }
                 }
                 if($highestPercentageOfSrno == 100 )
                   $color_sr = 'green';
                 elseif($highestPercentageOfSrno >= 50)
                   $color_sr = 'orange';
                 else  
                   $color_sr = 'red';
                 //For Part
                 $elector_part_new = $election_data[0]->part_no;
                 $match_data = similar_text($part_no_sims,$elector_part_new,$percent);
                 $match_part[$elector_part_new] = number_format($percent,2);

                 $match_data = similar_text($part_no_sims,$int_part_no,$percent);
                 $match_part[$int_part_no] = number_format($percent,2);

                 $highestPercentageOfPart = 0;
                 $highestPercentagePart = "";
 
                 foreach ($match_part as $part => $percentage) {
                     if ($percentage >= $highestPercentageOfPart) {
                         $highestPercentageOfPart = $percentage;
                         $highestPercentagePart = $part;
                     }
                 }
                 if($highestPercentageOfPart == 100 )
                   $color_part = 'green';
                 elseif($highestPercentageOfPart >= 50)
                   $color_part = 'orange';
                 else  
                   $color_part = 'red';
              ?>
                                <!-- Year 2000 start -->
                                <div class="col-md-12">
                                    <hr/>
                                    <div class="d-flex align-items-center">
                                       <h3 class="card-title"><i class="fas fa-list"></i> &nbsp;Year 2001 or Before Year 2011</h3>
                                    </div>
                                    <hr/>
                                    <br/>
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
                                              @foreach($query as $data)
                                                <td width="10%">{{$data->HUTOWNERNAME}}</td>
                                                <td width="20%">{{$data->Address}} </td>
                                                <td width="10%">No data Available </td>
                                                <td width="10%">Voting Card</td>
                                                <td width="10%">No data Available </td>
                                                <td width="10%">No data Available </td>
                                                <td width="10%">No data Available </td>
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
                                                <td width="10%"><?= $election_data[0]->elector_name ?></td>
                                                <td width="20%">No data Available </td>
                                                <td width="10%"><?= $election_no ?></td>
                                                <td width="10%">Voting Card</td>
                                                <td width="10%"><?= $election_data[0]->cont_no ?></td>
                                                <td width="10%"><?= $election_data[0]->sr_no ?></td>
                                                <td width="10%"><?= $election_data[0]->part_no ?></td>
                                                {{-- <td width="10%">
                                                  <img src="http://localhost/sraservices_old/public/storage/media/rnynt00Evsb9kdC10GKVB517AHISla1O9KAYZYrl.jpg" height="80" width="80">
                                                </td> --}}
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>

                                     {{-- Integration part --}}
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
                                             {
                                        if(isset($election_data[0]) && $election_no != ''){
                                            // print_r($election_data[0]);die;
                                    ?>

                                                    <tr>
                                                        <td width="10%"><?= $election_data[0]->elector_name ?></td>
                                                        <td width="20%">No data Available </td>
                                                        <td width="10%"><?= $election_no ?></td>
                                                        <td width="10%">Voting Card</td>
                                                        <td width="10%"><?= $election_data[0]->cont_no ?></td>
                                                        <td width="10%"><?= $election_data[0]->sr_no ?></td>
                                                        <td width="10%"><?= $election_data[0]->part_no ?></td>
                                                    </tr>
                                                  <?php  }} ?>



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
                            <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                            <td width="10%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                            <td width="10%" style="background:<?= $color_num; ?>"><?= $highestPercentageNum; ?></td>
                            <td width="10%" style="background:<?= $color_type; ?>"><?= $highestPercentageType; ?></td>
                            <td width="10%" style="background:<?= $color_const; ?>"><?= $highestPercentageConst; ?></td>
                            <td width="10%" style="background:<?= $color_sr; ?>"><?= $highestPercentageSr; ?></td>
                            <td width="10%" style="background:<?= $color_part; ?>"><?= $highestPercentagePart; ?></td>
                        </tr>
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_election') }}">
                          @csrf
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="2">
                          <input type="hidden" name="user" value="vendor">

                          <tr>
                            <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                          </tr>
                          <tr>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  {{ isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="6"><hr/><b>Remark :</b></td>
                          </tr>
                          <tr>
                              <td width="10%"><input type="text" name="remark1" value = "{{ isset($data_2000_2011->remark_name) ? $data_2000_2011->remark_name : '' }}" {{ isset($data_2000_2011->remark_name) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="20%"><input type="text" name="remark2" value = "{{ isset($data_2000_2011->remark_address) ? $data_2000_2011->remark_address : '' }}" {{ isset($data_2000_2011->remark_address) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark3" value = "{{ isset($data_2000_2011->remark_number) ? $data_2000_2011->remark_number : '' }}" {{ isset($data_2000_2011->remark_number) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark4" value = "{{ isset($data_2000_2011->remark_type) ? $data_2000_2011->remark_type : '' }}" {{ isset($data_2000_2011->remark_type) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark5" value = "{{ isset($data_2000_2011->remark_const_no) ? $data_2000_2011->remark_const_no : '' }}" {{ isset($data_2000_2011->remark_const_no) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark6" value = "{{ isset($data_2000_2011->remark_sr_no) ? $data_2000_2011->remark_sr_no : '' }}" {{ isset($data_2000_2011->remark_sr_no) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark7" value = "{{ isset($data_2000_2011->remark_part_no) ? $data_2000_2011->remark_part_no : '' }}" {{ isset($data_2000_2011->remark_part_no) ? 'readonly' : '' }}  <?= $access ?>></td>

                          </tr>
                          <tr>
                            <td ><hr/><b>Overall Eligibility :</b></td>
                            <td ><hr/><b>Overall Remark :</b></td>
                            @hasAccess('admin.sra.vendor_remark')
                              <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                            @endHasAccess
                          </tr>
                          <tr>
                             <td width="10%">
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($data_2000_2011->overall_eligibility) && ($data_2000_2011->overall_eligibility == 1) ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($data_2000_2011->overall_eligibility) && ($data_2000_2011->overall_eligibility == 2) ? 'selected' : '' }}>Auto</option>
                                </select>
                              </td> 
                              <td width="10%"><input type="text" name="remark" value = "{{ isset($data_2000_2011->overall_remark) ? $data_2000_2011->overall_remark : '' }}" {{ isset($data_2000_2011->overall_remark) ? 'readonly' : '' }}></td>
                        </tr>
                        </form>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                @hasAccess('admin.sra.ca_remark')
                <h4>Conclusion of CA</h4>
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
                            <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                            <td width="10%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                            <td width="10%" style="background:<?= $color_num; ?>"><?= $highestPercentageNum; ?></td>
                            <td width="10%" style="background:<?= $color_type; ?>"><?= $highestPercentageType; ?></td>
                            <td width="10%" style="background:<?= $color_const; ?>"><?= $highestPercentageConst; ?></td>
                            <td width="10%" style="background:<?= $color_sr; ?>"><?= $highestPercentageSr; ?></td>
                            <td width="10%" style="background:<?= $color_part; ?>"><?= $highestPercentagePart; ?></td>
                        </tr>                           
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_election') }}">
                          @csrf
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="2">
                          <input type="hidden" name="user" value="ca">
                        <tr>
                          <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                        </tr>
                        <tr>
                        <tr>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  {{ isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                          </tr>
                        <tr>
                          <td colspan="6"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                              <td width="10%"><input type="text" name="remark1_ca" value = "{{ isset($data_2000_2011_ca->remark_name) ? $data_2000_2011_ca->remark_name : '' }}" {{ isset($data_2000_2011_ca->remark_name) ? 'readonly' : '' }} ></td>
                              <td width="20%"><input type="text" name="remark2_ca" value = "{{ isset($data_2000_2011_ca->remark_address) ? $data_2000_2011_ca->remark_address : '' }}" {{ isset($data_2000_2011_ca->remark_address) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark3_ca" value = "{{ isset($data_2000_2011_ca->remark_number) ? $data_2000_2011_ca->remark_number : '' }}" {{ isset($data_2000_2011_ca->remark_number) ? 'readonly' : '' }} ></td>
                              <td width="10%"><input type="text" name="remark4_ca" value = "{{ isset($data_2000_2011_ca->remark_type) ? $data_2000_2011_ca->remark_type : '' }}" {{ isset($data_2000_2011_ca->remark_type) ? 'readonly' : '' }} ></td>
                              <td width="10%"><input type="text" name="remark5_ca" value = "{{ isset($data_2000_2011_ca->remark_const_no) ? $data_2000_2011_ca->remark_const_no : '' }}" {{ isset($data_2000_2011_ca->remark_const_no) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark6_ca" value = "{{ isset($data_2000_2011_ca->remark_sr_no) ? $data_2000_2011_ca->remark_sr_no : '' }}" {{ isset($data_2000_2011_ca->remark_sr_no) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark7_ca" value = "{{ isset($data_2000_2011_ca->remark_part_no) ? $data_2000_2011_ca->remark_part_no : '' }}" {{ isset($data_2000_2011_ca->remark_part_no) ? 'readonly' : '' }} ></td>

                          </tr>
                          <tr>
                            <td ><hr/><b>Overall Eligibility :</b></td>
                            <td ><hr/><b>Overall Remark :</b></td>
                              <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                          </tr>
                          <tr>
                             <td width="10%">
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($data_2000_2011_ca->overall_eligibility) && ($data_2000_2011_ca->overall_eligibility == 1) ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($data_2000_2011_ca->overall_eligibility) && ($data_2000_2011_ca->overall_eligibility == 2) ? 'selected' : '' }}>Auto</option>
                                </select>
                              </td> 
                              <td width="10%"><input type="text" name="remark" value = "{{ isset($data_2000_2011_ca->overall_remark) ? $data_2000_2011_ca->overall_remark : '' }}" {{ isset($data_2000_2011_ca->overall_remark) ? 'readonly' : '' }}></td>
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
              <?php
                 foreach($query as $data)
                 {
                   $name_sims = $data->HUTOWNERNAME;
                   $address_sims = $data->Address;
                   $num_sims = 'No data Available';
                   $type_sims = 'Voting Card';
                   $cont_no_sims = 'No data Available';
                   $sr_no_sims = 'No data Available';
                   $part_no_sims = 'No data Available';

                 }
                 
                 $int_name = $election_data[0]->elector_name;
                 $int_address = 'No data Available';
                 $int_num = 'No data Available';
                 $int_type = 'Voting Card';
                 $int_cont_no = $election_data[0]->cont_no;
                 $int_sr_no = $election_data[0]->sr_no;
                 $int_part_no = $election_data[0]->part_no;

                 //For Name
                 $elector_name_new = $election_data[0]->elector_name;

                 $match_data = similar_text($name_sims,$elector_name_new,$percent);
                 $match_name[$elector_name_new] = number_format($percent,2);

                 $match_data = similar_text($name_sims,$int_name,$percent);
                 $match_name[$int_name] = number_format($percent,2);

                 $highestPercentageOfName = 0;
                 $highestPercentageName = "";
 
                 foreach ($match_name as $name => $percentage) {
                     if ($percentage >= $highestPercentageOfName) {
                         $highestPercentageOfName = $percentage;
                         $highestPercentageName = $name;
                     }
                 }
                 if($highestPercentageOfName == 100 )
                   $color_name = 'green';
                 elseif($highestPercentageOfName >= 50)
                   $color_name = 'orange';
                 else  
                   $color_name = 'red';


                 //For Address
                 $elector_address_new = 'No data Available';

                 $match_data = similar_text($address_sims,$elector_address_new,$percent);
                 $match_address[$elector_name_new] = number_format($percent,2);

                 $match_data = similar_text($address_sims,$int_address,$percent);
                 $match_address[$int_address] = number_format($percent,2);

                 $highestPercentageOfAddress = 0;
                 $highestPercentageAddress = "";
 
                 foreach ($match_address as $name => $percentage) {
                     if ($percentage >= $highestPercentageOfAddress) {
                         $highestPercentageOfAddress = $percentage;
                         $highestPercentageAddress = $name;
                     }
                 }
                 if($highestPercentageOfAddress == 100 )
                   $color_address = 'green';
                 elseif($highestPercentageOfAddress >= 50)
                   $color_address = 'orange';
                 else  
                   $color_address = 'red';

                //For Number
                $elector_num_new = 'No data Available';

                $match_data = similar_text($num_sims,$elector_num_new,$percent);
                $match_num[$elector_num_new] = number_format($percent,2);

                $match_data = similar_text($num_sims,$int_num,$percent);
                $match_num[$int_num] = number_format($percent,2);

                $highestPercentageOfNum = 0;
                $highestPercentageNum = "";

                foreach ($match_num as $num => $percentage) {
                    if ($percentage >= $highestPercentageOfNum) {
                        $highestPercentageOfNum = $percentage;
                        $highestPercentageNum = $num;
                    }
                }
                if($highestPercentageOfNum == 100 )
                  $color_num = 'green';
                elseif($highestPercentageOfNum >= 50)
                  $color_num = 'orange';
                else  
                  $color_num = 'red';

                 //For Type
                 $elector_type_new = 'Voting Card';

                 $match_data = similar_text($type_sims,$elector_type_new,$percent);
                 $match_type[$elector_type_new] = number_format($percent,2);

                 $match_data = similar_text($type_sims,$int_type,$percent);
                 $match_type[$int_type] = number_format($percent,2);

                 $highestPercentageOfType = 0;
                 $highestPercentageType = "";
 
                 foreach ($match_type as $type => $percentage) {
                     if ($percentage >= $highestPercentageOfType) {
                         $highestPercentageOfType = $percentage;
                         $highestPercentageType = $type;
                     }
                 }
                 if($highestPercentageOfType == 100 )
                   $color_type = 'green';
                 elseif($highestPercentageOfType >= 50)
                   $color_type = 'orange';
                 else  
                   $color_type = 'red';
               
                 //For Const
                 $elector_const_new = $election_data[0]->cont_no;

                 $match_data = similar_text($cont_no_sims,$elector_const_new,$percent);
                 $match_const[$elector_const_new] = number_format($percent,2);

                 $match_data = similar_text($cont_no_sims,$int_cont_no,$percent);
                 $match_const[$int_cont_no] = number_format($percent,2);

                 $highestPercentageOfconst = 0;
                 $highestPercentageConst = "";
                 foreach ($match_const as $const => $percentage) {
                     if ($percentage >= $highestPercentageOfconst) {
                         $highestPercentageOfconst = $percentage;
                         $highestPercentageConst = $const;
                     }
                 }
                 if($highestPercentageOfconst == 100 )
                   $color_const = 'green';
                 elseif($highestPercentageOfconst >= 50)
                   $color_const = 'orange';
                 else  
                   $color_const = 'red';
                 
                 //For SR
                 $elector_sr_new = $election_data[0]->sr_no;
                 $match_data = similar_text($sr_no_sims,$elector_sr_new,$percent);
                 $match_sr[$elector_sr_new] = number_format($percent,2);

                 $match_data = similar_text($sr_no_sims,$int_sr_no,$percent);
                 $match_sr[$int_sr_no] = number_format($percent,2);

                 $highestPercentageOfSrno = 0;
                 $highestPercentageSr = "";
 
                 foreach ($match_sr as $sr => $percentage) {
                     if ($percentage >= $highestPercentageOfSrno) {
                         $highestPercentageOfSrno = $percentage;
                         $highestPercentageSr = $sr;
                     }
                 }
                 if($highestPercentageOfSrno == 100 )
                   $color_sr = 'green';
                 elseif($highestPercentageOfSrno >= 50)
                   $color_sr = 'orange';
                 else  
                   $color_sr = 'red';
                 //For Part
                 $elector_part_new = $election_data[0]->part_no;
                 $match_data = similar_text($part_no_sims,$elector_part_new,$percent);
                 $match_part[$elector_part_new] = number_format($percent,2);

                 $match_data = similar_text($part_no_sims,$int_part_no,$percent);
                 $match_part[$int_part_no] = number_format($percent,2);

                 $highestPercentageOfPart = 0;
                 $highestPercentagePart = "";
 
                 foreach ($match_part as $part => $percentage) {
                     if ($percentage >= $highestPercentageOfPart) {
                         $highestPercentageOfPart = $percentage;
                         $highestPercentagePart = $part;
                     }
                 }
                 if($highestPercentageOfPart == 100 )
                   $color_part = 'green';
                 elseif($highestPercentageOfPart >= 50)
                   $color_part = 'orange';
                 else  
                   $color_part = 'red';
              ?>
              <!-- Year 2000 start -->
              <div class="col-md-12">
                <hr/>
                <div class="d-flex align-items-center">
                   <h3 class="card-title"><i class="fas fa-list"></i> &nbsp;Current Year</h3>
                </div>
                <hr/>
                <br/>
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
                            @foreach($query as $data)
                              <td width="10%">{{$data->HUTOWNERNAME}}</td>
                              <td width="20%">{{$data->Address}} </td>
                              <td width="10%">No data Available </td>
                              <td width="10%">Voting Card</td>
                              <td width="10%">No data Available </td>
                              <td width="10%">No data Available </td>
                              <td width="10%">No data Available </td>
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
                            <td width="10%"><?= $election_data[0]->elector_name ?></td>
                              <td width="20%">No data Available </td>
                              <td width="10%"><?= $election_no ?></td>
                              <td width="10%">Voting Card</td>
                              <td width="10%"><?= $election_data[0]->cont_no ?></td>
                              <td width="10%"><?= $election_data[0]->sr_no ?></td>
                              <td width="10%"><?= $election_data[0]->part_no ?></td>
                            {{-- <td width="10%">
                              <img src="http://localhost/sraservices_old/public/storage/media/rnynt00Evsb9kdC10GKVB517AHISla1O9KAYZYrl.jpg" height="80" width="80">
                            </td> --}}
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                 {{-- Integration part --}}
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
                              {
                         if(isset($election_data[0]) && $election_no != ''){
                             // print_r($election_data[0]);die;
                     ?>

                                     <tr>
                                         <td width="10%"><?= $election_data[0]->elector_name ?></td>
                                         <td width="20%">No data Available  </td>
                                         <td width="10%"><?= $election_no ?></td>
                                         <td width="10%">Voting Card</td>
                                         <td width="10%"><?= $election_data[0]->cont_no ?></td>
                                         <td width="10%"><?= $election_data[0]->sr_no ?></td>
                                         <td width="10%"><?= $election_data[0]->part_no ?></td>
                                     </tr>
                                   <?php  }} ?>



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
                            <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                            <td width="10%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                            <td width="10%" style="background:<?= $color_num; ?>"><?= $highestPercentageNum; ?></td>
                            <td width="10%" style="background:<?= $color_type; ?>"><?= $highestPercentageType; ?></td>
                            <td width="10%" style="background:<?= $color_const; ?>"><?= $highestPercentageConst; ?></td>
                            <td width="10%" style="background:<?= $color_sr; ?>"><?= $highestPercentageSr; ?></td>
                            <td width="10%" style="background:<?= $color_part; ?>"><?= $highestPercentagePart; ?></td>
                        </tr>                           
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_election') }}">
                          @csrf
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="3">
                          <input type="hidden" name="user" value="vendor">
                        <tr>
                          <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                        </tr>
                        <tr>
                        <tr>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  {{ isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                          </tr>
                        <tr>
                          <td colspan="6"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                              <td width="10%"><input type="text" name="remark1" value = "{{ isset($data_current->remark_name) ? $data_current->remark_name : '' }}" {{ isset($data_current->remark_name) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="20%"><input type="text" name="remark2" value = "{{ isset($data_current->remark_address) ? $data_current->remark_address : '' }}" {{ isset($data_current->remark_address) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark3" value = "{{ isset($data_current->remark_number) ? $data_current->remark_number : '' }}" {{ isset($data_current->remark_number) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark4" value = "{{ isset($data_current->remark_type) ? $data_current->remark_type : '' }}" {{ isset($data_current->remark_type) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark5" value = "{{ isset($data_current->remark_const_no) ? $data_current->remark_const_no : '' }}" {{ isset($data_current->remark_const_no) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark6" value = "{{ isset($data_current->remark_sr_no) ? $data_current->remark_sr_no : '' }}" {{ isset($data_current->remark_sr_no) ? 'readonly' : '' }}  <?= $access ?>></td>
                              <td width="10%"><input type="text" name="remark7" value = "{{ isset($data_current->remark_part_no) ? $data_current->remark_part_no : '' }}" {{ isset($data_current->remark_part_no) ? 'readonly' : '' }}  <?= $access ?>></td>

                          </tr>
                          <tr>
                            <td ><hr/><b>Overall Eligibility :</b></td>
                            <td ><hr/><b>Overall Remark :</b></td>
                            @hasAccess('admin.sra.vendor_remark')
                              <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                            @endHasAccess
                          </tr>
                          <tr>
                             <td width="10%">
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($data_current->overall_eligibility) && ($data_current->overall_eligibility == 1) ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($data_current->overall_eligibility) && ($data_current->overall_eligibility == 2) ? 'selected' : '' }}>Auto</option>
                                </select>
                              </td> 
                              <td width="10%"><input type="text" name="remark" value = "{{ isset($data_current->overall_remark) ? $data_current->overall_remark : '' }}" {{ isset($data_current->overall_remark) ? 'readonly' : '' }}></td>
                        </tr>

                        </tbody>
                      </table>
                         </form>
                    </div>
                  </div>
                </div>
                @hasAccess('admin.sra.ca_remark')
                <h4>Conclusion of CA</h4>
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
                            <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                            <td width="10%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                            <td width="10%" style="background:<?= $color_num; ?>"><?= $highestPercentageNum; ?></td>
                            <td width="10%" style="background:<?= $color_type; ?>"><?= $highestPercentageType; ?></td>
                            <td width="10%" style="background:<?= $color_const; ?>"><?= $highestPercentageConst; ?></td>
                            <td width="10%" style="background:<?= $color_sr; ?>"><?= $highestPercentageSr; ?></td>
                            <td width="10%" style="background:<?= $color_part; ?>"><?= $highestPercentagePart; ?></td>
                        </tr>                           
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark_election') }}">
                          @csrf
                          <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                          <input type="hidden" name="year" value="3">
                          <input type="hidden" name="user" value="ca">
                        <tr>
                          <td colspan="6"><hr/><b>Eligible / Not Eligible :</b></td>
                        </tr>
                        <tr>
                        <tr>
                            <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="20%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1"  {{ isset($highestPercentageOfNum) && $highestPercentageOfNum < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfNum) && $highestPercentageOfNum == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfType) && $highestPercentageOfType < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfType) && $highestPercentageOfType == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfconst) && $highestPercentageOfconst == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfSrno) && $highestPercentageOfSrno == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                            <td width="10%">
                              <select name="elg7" class="form-control" style="padding: 2px 1rem !important;">
                                <option value="0">-- Select Option --</option>
                                <option value="1" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart < 100 ? 'selected' : '' }}>Manual</option>
                                <option value="2" {{ isset($highestPercentageOfPart) && $highestPercentageOfPart == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                            </td>
                          </tr>
                        <tr>
                          <td colspan="6"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                              <td width="10%"><input type="text" name="remark1_ca" value = "{{ isset($data_current_ca->remark_name) ? $data_current_ca->remark_name : '' }}" {{ isset($data_current_ca->remark_name) ? 'readonly' : '' }} ></td>
                              <td width="20%"><input type="text" name="remark2_ca" value = "{{ isset($data_current_ca->remark_address) ? $data_current_ca->remark_address : '' }}" {{ isset($data_current_ca->remark_address) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark3_ca" value = "{{ isset($data_current_ca->remark_number) ? $data_current_ca->remark_number : '' }}" {{ isset($data_current_ca->remark_number) ? 'readonly' : '' }} ></td>
                              <td width="10%"><input type="text" name="remark4_ca" value = "{{ isset($data_current_ca->remark_type) ? $data_current_ca->remark_type : '' }}" {{ isset($data_current_ca->remark_type) ? 'readonly' : '' }} ></td>
                              <td width="10%"><input type="text" name="remark5_ca" value = "{{ isset($data_current_ca->remark_const_no) ? $data_current_ca->remark_const_no : '' }}" {{ isset($data_current_ca->remark_const_no) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark6_ca" value = "{{ isset($data_current_ca->remark_sr_no) ? $data_current_ca->remark_sr_no : '' }}" {{ isset($data_current_ca->remark_sr_no) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark7_ca" value = "{{ isset($data_current_ca->remark_part_no) ? $data_current_ca->remark_part_no : '' }}" {{ isset($data_current_ca->remark_part_no) ? 'readonly' : '' }} ></td>

                          </tr>
                          <tr>
                            <td ><hr/><b>Overall Eligibility :</b></td>
                            <td ><hr/><b>Overall Remark :</b></td>
                              <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                          </tr>
                          <tr>
                             <td width="10%">
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($data_current_ca->overall_eligibility) && ($data_current_ca->overall_eligibility == 1) ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($data_current_ca->overall_eligibility) && ($data_current_ca->overall_eligibility == 2) ? 'selected' : '' }}>Auto</option>
                                </select>
                              </td> 
                              <td width="10%"><input type="text" name="remark" value = "{{ isset($data_current_ca->overall_remark) ? $data_current_ca->overall_remark : '' }}" {{ isset($data_current_ca->overall_remark) ? 'readonly' : '' }}></td>
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
            <!-- election end -->
            </div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
            <a href="index.php/sra/" class="tab-label" style="color:#495057!important;">Gumasta</a>
            <div class="tab-content">Gumasta Details</div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
             <a href="index.php/sra/" class="tab-label" style="color:#495057!important;">Photo Pass Details</a>
            <div class="tab-content">Photo Pass Details</div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-5" class="tab-switch">
            <a href="index.php/sra/" class="tab-label" style="color:#495057!important;">Registration Agreement Details</a>
            <div class="tab-content">Registration Agreement Details</div>
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