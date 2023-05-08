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
                <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
                <label for="tab-1" class="tab-label">Electricity</label>
                <div class="tab-content">
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
              <!-- body end -->
              <!-- year start-->

              <!-- Year 2000 start -->             
              <!-- Script for Match the Data to SIMS -->
              <?php
                $integration_name = array();
                $integration_address = array();
                $integration_bill_date = array();
                $integration_ca = array();
                $integration_service_provider = array();
                $integration_category = array();


                foreach($query as $data)
                {
                  $name_sims = $data->HUTOWNERNAME;
                  $address_sims = $data->Address;
                  $category_sims = $data->PropertyType;
                  $service_provider_sims = 'Adan Elec';
                  $ca_sims = 'Not Available';
                  $bill_date_sims = 'Not Available';
                }
                // echo $name_sims;die;
                foreach ($new_result as $key => $result) {
                  if(gettype($result) == 'array')
                  {    
                    foreach($result as $data)
                    {
                      if(isset($data->CA)){
                        $mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                        $mi_year = substr($mi_date,0,4);
                       
                        if($mi_year >= 1990 && $mi_year < 2000 )
                        {
                          $integration_name[] = $data->NAME;
                          $integration_address[] = $data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE;
                          $integration_category[] = 'Residential';
                          $integration_service_provider[] = 'Adan Elec';
                          $integration_ca[] = $data->CA;
                          $integration_bill_date[] = $data->MI_DATE;

                        }
                        // echo "AS";die;
                      }
                      
                    }
                  }
                }

                //For Name
                $match_data = similar_text($name_sims,$name,$percent);
                $match_name[$name] = number_format($percent,2);

                foreach($integration_name as $data)
                {
                  $match_data = similar_text($name_sims, $data, $percent);
                  $match_name[$data] = number_format($percent,2);
                }
                $highestPercentageOfName = 0;
                $highestPercentageName = "";

                foreach ($match_name as $name => $percentage) {
                    if ($percentage > $highestPercentageOfName) {
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
                $match_data = similar_text($address_sims,$address,$percent);
                $match_address[$address] = number_format($percent,2);

                foreach($integration_address as $data)
                {
                  $match_data = similar_text($address_sims, $data, $percent);
                  $match_address[$data] = number_format($percent,2);
                }
                $highestPercentageOfAddress = 0;
                $highestPercentageAddress = "";

                foreach ($match_address as $address_key => $percentage) {
                    if ($percentage > $highestPercentageOfAddress) {
                        $highestPercentageOfAddress = $percentage;
                        $highestPercentageAddress = $address_key;
                    }
                }
                if($highestPercentageOfAddress == 100 )
                  $color_address = 'green';
                elseif($highestPercentageOfAddress >= 50)
                  $color_address = 'orange';
                else  
                  $color_address = 'red';

                //For Category
                $match_data = similar_text($category_sims,$category,$percent);
                $match_category[$category] = number_format($percent,2);

                foreach($integration_category as $data)
                {
                  $match_data = similar_text($category_sims, $data, $percent);
                  $match_category[$data] = number_format($percent,2);
                }
                $highestPercentageOfCategory = 0;
                $highestPercentageCategory = "";

                foreach ($match_category as $category_key => $percentage) {
                    if ($percentage > $highestPercentageOfCategory) {
                        $highestPercentageOfCategory = $percentage;
                        $highestPercentageCategory = $category_key;
                    }
                }
                if($highestPercentageOfCategory == 100 )
                  $color_category = 'green';
                elseif($highestPercentageOfCategory >= 50)
                  $color_category = 'orange';
                else  
                  $color_category = 'red';


                //For Service_provider
                $match_data = similar_text($service_provider_sims,$service_provider,$percent);
                $match_service_provider[$service_provider] = number_format($percent,2);

                foreach($integration_service_provider as $data)
                {
                  $match_data = similar_text($service_provider_sims, $data, $percent);
                  $match_service_provider[$data] = number_format($percent,2);
                }
                $highestPercentageOfservice_provider = 0;
                $highestPercentageservice_provider = "";

                foreach ($match_service_provider as $service_provider_key => $percentage) {
                    if ($percentage > $highestPercentageOfservice_provider) {
                        $highestPercentageOfservice_provider = $percentage;
                        $highestPercentageservice_provider = $service_provider_key;
                    }
                }
                if($highestPercentageOfservice_provider == 100 )
                  $color_service_provider = 'green';
                elseif($highestPercentageOfservice_provider >= 50)
                  $color_service_provider = 'orange';
                else  
                  $color_service_provider = 'red';
                
                //For CA             
                $match_data = similar_text($ca_sims,$ca_no,$percent);
                $match_ca[$ca_no] = number_format($percent,2);

                foreach($integration_ca as $data)
                {
                  $match_data = similar_text($ca_sims, $data, $percent);
                  $match_ca[$data] = number_format($percent,2);
                }
                $highestPercentageOfca = 0;
                $highestPercentageca = "";
                
                foreach ($match_ca as $ca_key => $percentage) {
                    if ($percentage > $highestPercentageOfca) {
                        $highestPercentageOfca = $percentage;
                        $highestPercentageca = $ca_key;
                    }
                }
              
                if($highestPercentageOfca == 100 )
                  $color_ca = 'green';
                elseif($highestPercentageOfca >= 50)
                  $color_ca = 'orange';
                else  
                  $color_ca = 'red';

              //For bill_date 
              $match_data = similar_text($bill_date_sims,$bill_date,$percent);
              $match_bill_date[$bill_date] = number_format($percent,2);

              // print_r($integration_bill_date);die;
              foreach($integration_bill_date as $data)
              {
                $match_data = similar_text($bill_date_sims, $data, $percent);
                $match_bill_date[$data] = number_format($percent,2);
              }
              $highestPercentageOfbill_date = 0;
              $highestPercentagebill_date = "";

              foreach ($match_bill_date as $bill_date_key => $percentage) {
                  if ($percentage > $highestPercentageOfbill_date) {
                      $highestPercentageOfbill_date = $percentage;
                      $highestPercentagebill_date = $bill_date_key;
                  }
              }
              if($highestPercentageOfbill_date == 100 )
                $color_bill_date = 'green';
              elseif($highestPercentageOfbill_date >= 50)
                $color_bill_date = 'orange';
              else  
                $color_bill_date = 'red';
              ?>
              <!-- End script -->

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
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            <th width="10%">Document</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach($query as $data)
                              <td width="10%">{{$data->HUTOWNERNAME}}</td>
                              <td width="20%">{{$data->Address}} </td>
                              <td width="10%">{{$data->PropertyType}}</td>
                              <td width="10%">Adan Elec</td>
                              <td width="10%">-</td>
                              <td width="10%">-</td>
                              <td width="10%">-</td>
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
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            <th width="10%">Document</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="10%">-</td>
                            <td width="20%"><?= $address; ?> </td>
                            <td width="10%"><?= $category; ?></td>
                            <td width="10%"><?= $service_provider; ?></td>
                            <td width="10%"> <?= $ca_no; ?></td>
                            <td width="10%">-</td>
                            <td width="10%">
                              <img src="http://localhost/sraservices_old/public/storage/media/rnynt00Evsb9kdC10GKVB517AHISla1O9KAYZYrl.jpg" height="80" width="80">
                            </td>
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
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="5%">Legacy CA No</th>
                            <th width="5%">NAME_FIRST_CONS</th>
                            <th width="5%">FIRST_BILL</th>
                            <th width="5%">Change Name Date</th>
                            <th width="5%">CHANGE_DATE</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count1 = $showData1 = 0;
                          foreach ($new_result as $key => $result) {
                            if(gettype($result) == 'array')
                            {    
                              foreach($result as $data)
                              {
                                if(isset($data->CA)){
                                  $mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                                  $mi_year = substr($mi_date,0,4);
                                  $count1++;
                                  if($mi_year >= 1990 && $mi_year < 2000 )
                                  {
                                    $showData1 = 1;
                                  }
                                  if($showData1 == 1)
                                  {
                                  ?>
                                    <tr>
                                      <td width="10%">{{isset($data->NAME) ? $data->NAME : '-' }} </td>
                                      <td width="20%"> {{$data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE }}</td>
                                      <td width="10%">Residential</td>
                                      <td width="10%">Adan Elec</td>
                                      <td width="10%">{{$data->CA}}</td>
                                      <td width="5%">{{$data->LEGACY_CUSTOMER }}</td>
                                      <td width="5%">{{isset($data->FIRST_BILL) ? $data->FIRST_BILL : '' }}</td>
                                      <td width="5%">{{isset($data->NAME_FIRST_CONS) ? $data->NAME_FIRST_CONS : '' }}</td>
                                      <td width="5%">-</td>
                                      <td width="5%">{{isset($data->CHANGE_DATE) ? $data->CHANGE_DATE : '' }}</td>
                                    </tr>
                                  <?php  }
                                  
                                }
                                
                              }
                            }
                          }
                          if($count1 > 0 && $showData1 == 0){ ?>
                                    <tr>
                                      <td width="10%">No Data Available </td>
                                      <td width="20%">No Data Available</td>
                                      <td width="10%">No Data Available</td>
                                      <td width="10%">No Data Available</td>
                                      <td width="10%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <br/>
                <!-- Recomendatioon start -->
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
                    
                  ?>
                <?php //if($showData1 == 1){?>
                 
                <h4>Recommendation by Vendor</h4>
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
                              <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                              <td width="20%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                              <td width="10%" style="background:<?= $color_category; ?>"><?= $highestPercentageCategory; ?></td>
                              <td width="10%" style="background:<?= $color_service_provider; ?>"><?= $highestPercentageservice_provider; ?></td>
                              <td width="10%" style="background:<?= $color_ca; ?>"><?= $highestPercentageca; ?></td>
                              <td width="10%" style="background:<?= $color_bill_date; ?>"><?= $highestPercentagebill_date; ?></td>                     
                        </tr>
                     
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark') }}">
                        @csrf
                        <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                        <input type="hidden" name="year" value="1">
                        <input type="hidden" name="user" value="vendor">

                        
                        <tr>
                          <td width="10%">
                          <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfCategory) && $highestPercentageOfCategory < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2" {{ isset($highestPercentageOfCategory) && $highestPercentageOfCategory == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfservice_provider) && $highestPercentageOfservice_provider < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2"  {{ isset($highestPercentageOfservice_provider) && $highestPercentageOfservice_provider == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfca) && $highestPercentageOfca < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2" {{ isset($highestPercentageOfca) && $highestPercentageOfca == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfbill_date) && $highestPercentageOfbill_date < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2" {{ isset($highestPercentageOfbill_date) && $highestPercentageOfbill_date == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td> 
                        </tr>
                        <tr>
                          <td colspan="6"><hr/><b>Remark :</b></td>
                        </tr>
                        <?php $access = 'readonly' ?>
                        @hasAccess('admin.sra.vendor_remark')
                          <?php
                            $access = '';
                          ?>
                        @endHasAccess

                        <tr>
                          <td width="10%"><input type="text" name="remark1" value = "{{ isset($data_2000->remark_name) ? $data_2000->remark_name : '' }}" {{ isset($data_2000->remark_name) ? 'readonly' : '' }} <?= $access ?>></td>
                          <td width="20%"><input type="text" name="remark2" value = "{{ isset($data_2000->remark_address) ? $data_2000->remark_address : '' }}" {{ isset($data_2000->remark_address) ? 'readonly' : '' }} <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark3" value = "{{ isset($data_2000->remark_category) ? $data_2000->remark_category : '' }}" {{ isset($data_2000->remark_category) ? 'readonly' : '' }} <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark4" value = "{{ isset($data_2000->remark_serviceprovider) ? $data_2000->remark_serviceprovider : '' }}" {{ isset($data_2000->remark_serviceprovider) ? 'readonly' : '' }} <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark5" value = "{{ isset($data_2000->remark_ca) ? $data_2000->remark_ca : '' }}" {{ isset($data_2000->remark_ca) ? 'readonly' : '' }} <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark6" value = "{{ isset($data_2000->remark_billdate) ? $data_2000->remark_billdate : '' }}" {{ isset($data_2000->remark_billdate) ? 'readonly' : '' }} <?= $access ?>></td> 
                        </tr>
                        <tr>
                          <td ><hr/><b>Overall Eligibility :</b></td>
                          <td ><hr/><b>Overall Remark :</b></td>
                          @hasAccess('admin.sra.vendor_remark')
                            <td rowspan='2'><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                          @endHasAccess
                        </tr>
                        <tr>
                             <td width="10%">
                                <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($data_2000_ca->overall_eligibility) && ($data_2000->overall_eligibility == 1) ? 'selected' : '' }} >Manual</option>
                                  <option value="2" {{ isset($data_2000_ca->overall_eligibility) &&($data_2000->overall_eligibility == 2) ? 'selected' : '' }}>Auto</option>
                                </select>
                              </td> 
                              <td width="10%"><input type="text" name="remark" value = "{{ isset($data_2000->overall_remark) ? $data_2000->overall_remark : '' }}" {{ isset($data_2000->overall_remark) ? 'readonly' : '' }}></td>

                        </tr>
                       
                        <tr>
                          <!-- <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td> -->
                        </tr>
                        </form>
                        </tbody>
                      </table>
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
                                <th width="10%">Category</th>
                                <th width="10%">Service Provider</th>
                                <th width="10%">CA No</th>
                                <th width="10%">Bill Date</th>
                              </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                  <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                                  <td width="20%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                                  <td width="10%" style="background:<?= $color_category; ?>"><?= $highestPercentageCategory; ?></td>
                                  <td width="10%" style="background:<?= $color_service_provider; ?>"><?= $highestPercentageservice_provider; ?></td>
                                  <td width="10%" style="background:<?= $color_ca; ?>"><?= $highestPercentageca; ?></td>
                                  <td width="10%" style="background:<?= $color_bill_date; ?>"><?= $highestPercentagebill_date; ?></td>                     
                            </tr>
                        
                            <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark') }}">
                            @csrf
                            <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                            <input type="hidden" name="year" value="1">
                            <input type="hidden" name="user" value="ca">

                            
                            <tr>
                              <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfCategory) && $highestPercentageOfCategory < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfCategory) && $highestPercentageOfCategory == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfservice_provider) && $highestPercentageOfservice_provider < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2"  {{ isset($highestPercentageOfservice_provider) && $highestPercentageOfservice_provider == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfca) && $highestPercentageOfca < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfca) && $highestPercentageOfca == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfbill_date) && $highestPercentageOfbill_date < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfbill_date) && $highestPercentageOfbill_date == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td> 
                            </tr>
                            <tr>
                              <td colspan="6"><hr/><b>Remark :</b></td>
                            </tr>
                            <tr>
                              <td width="10%"><input type="text" name="remark1_ca" value = "{{ isset($data_2000_ca->remark_name) ? $data_2000_ca->remark_name : '' }}" {{ isset($data_2000_ca->remark_name) ? 'readonly' : '' }}></td>
                              <td width="20%"><input type="text" name="remark2_ca" value = "{{ isset($data_2000_ca->remark_address) ? $data_2000_ca->remark_address : '' }}" {{ isset($data_2000_ca->remark_address) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark3_ca" value = "{{ isset($data_2000_ca->remark_category) ? $data_2000_ca->remark_category : '' }}" {{ isset($data_2000_ca->remark_category) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark4_ca"  value = "{{ isset($data_2000_ca->remark_serviceprovider) ? $data_2000_ca->remark_serviceprovider : '' }}" {{ isset($data_2000_ca->remark_serviceprovider) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark5_ca" value = "{{ isset($data_2000_ca->remark_ca) ? $data_2000_ca->remark_ca : '' }}" {{ isset($data_2000_ca->remark_ca) ? 'readonly' : '' }} ></td>
                              <td width="10%"><input type="text" name="remark6_ca" value = "{{ isset($data_2000_ca->remark_billdate) ? $data_2000_ca->remark_billdate : '' }}" {{ isset($data_2000_ca->remark_billdate) ? 'readonly' : '' }}></td> 
                            </tr>
                            <tr>
                              <td ><hr/><b>Overall Eligibility :</b></td>
                              <td ><hr/><b>Overall Remark :</b></td>
                              <td rowspan='2'><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
                            </tr>
                            <tr>
                                <td width="10%">
                                    <select name="elg" class="form-control" style="padding: 2px 1rem !important;">
                                      <option value="0">-- Select Option --</option>
                                      <option value="1" {{ isset($data_2000_ca->overall_eligibility) && ($data_2000_ca->overall_eligibility == 1) ? 'selected' : '' }} >Manual</option>
                                      <option value="2"  {{ isset($data_2000_ca->overall_eligibility) && ($data_2000_ca->overall_eligibility == 2) ? 'selected' : '' }} >Auto</option>
                                    </select>
                                  </td> 
                                  <td width="10%"><input type="text" name="remark" value = "{{ isset($data_2000_ca->overall_remark) ? $data_2000_ca->overall_remark : '' }}" {{ isset($data_2000_ca->overall_remark) ? 'readonly' : '' }}></td>

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

                  @endHasAccess
                </div>
               
              <?php //}?>
                <!-- Recmmenatioon End -->
              </div>
              <!-- Year 2000 start -->  
              <!-- Year 2001 or Before Year 2011 start -->     
              <!-- Script for Match the Data to SIMS -->
              <?php
                  $integration_name = array();
                  $integration_address = array();
                  $integration_bill_date = array();
                  $integration_ca = array();
                  $integration_service_provider = array();
                  $integration_category = array();

                foreach($query as $data)
                {
                  $name_sims = $data->HUTOWNERNAME;
                  $address_sims = $data->Address;
                  $category_sims = $data->PropertyType;
                  $service_provider_sims = 'Adan Elec';
                  $ca_sims = 'Not Available';
                  $bill_date_sims = 'Not Available';
                }
                // echo $name_sims;die;
                foreach ($new_result as $key => $result) {
                  if(gettype($result) == 'array')
                  {    
                    foreach($result as $data)
                    {
                      if(isset($data->NAME)){
                        $mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                        $mi_year = substr($mi_date,0,4);
                        $count1++;
                        if($mi_year >= 2000 && $mi_year < 2011 )
                        {
                          // print_r($data);die;
                          $integration_name[] = $data->NAME;
                          $integration_address[] = $data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE;
                          $integration_category[] = 'Residential';
                          $integration_service_provider[] = 'Adan Elec';
                          $integration_ca[] = $data->CA;
                          $integration_bill_date[] = $data->MI_DATE;

                        }
                      }
                      
                    }
                  }
                }
                //For Name
                $match_data = similar_text($name_sims,$name,$percent);
                $match_name[$name] = number_format($percent,2);

                foreach($integration_name as $data)
                {
                  $match_data = similar_text($name_sims, $data, $percent);
                  $match_name[$data] = number_format($percent,2);
                }
                $highestPercentageOfName = 0;
                $highestPercentageName = "";

                foreach ($match_name as $name => $percentage) {
                    if ($percentage > $highestPercentageOfName) {
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
                $match_data = similar_text($address_sims,$address,$percent);
                $match_address[$address] = number_format($percent,2);

                foreach($integration_address as $data)
                {
                  $match_data = similar_text($address_sims, $data, $percent);
                  $match_address[$data] = number_format($percent,2);
                }
                $highestPercentageOfAddress = 0;
                $highestPercentageAddress = "";

                foreach ($match_address as $address_key => $percentage) {
                    if ($percentage > $highestPercentageOfAddress) {
                        $highestPercentageOfAddress = $percentage;
                        $highestPercentageAddress = $address_key;
                    }
                }
                if($highestPercentageOfAddress == 100 )
                  $color_address = 'green';
                elseif($highestPercentageOfAddress >= 50)
                  $color_address = 'orange';
                else  
                  $color_address = 'red';

                //For Category
                $match_data = similar_text($category_sims,$category,$percent);
                $match_category[$category] = number_format($percent,2);

                foreach($integration_category as $data)
                {
                  $match_data = similar_text($category_sims, $data, $percent);
                  $match_category[$data] = number_format($percent,2);
                }
                $highestPercentageOfCategory = 0;
                $highestPercentageCategory = "";

                foreach ($match_category as $category_key => $percentage) {
                    if ($percentage > $highestPercentageOfCategory) {
                        $highestPercentageOfCategory = $percentage;
                        $highestPercentageCategory = $category_key;
                    }
                }
                if($highestPercentageOfCategory == 100 )
                  $color_category = 'green';
                elseif($highestPercentageOfCategory >= 50)
                  $color_category = 'orange';
                else  
                  $color_category = 'red';


                //For Service_provider
                $match_data = similar_text($service_provider_sims,$service_provider,$percent);
                $match_service_provider[$service_provider] = number_format($percent,2);

                foreach($integration_service_provider as $data)
                {
                  $match_data = similar_text($service_provider_sims, $data, $percent);
                  $match_service_provider[$data] = number_format($percent,2);
                }
                $highestPercentageOfservice_provider = 0;
                $highestPercentageservice_provider = "";

                foreach ($match_service_provider as $service_provider_key => $percentage) {
                    if ($percentage > $highestPercentageOfservice_provider) {
                        $highestPercentageOfservice_provider = $percentage;
                        $highestPercentageservice_provider = $service_provider_key;
                    }
                }
                if($highestPercentageOfservice_provider == 100 )
                  $color_service_provider = 'green';
                elseif($highestPercentageOfservice_provider >= 50)
                  $color_service_provider = 'orange';
                else  
                  $color_service_provider = 'red';
                
                //For CA             
                $match_data = similar_text($ca_sims,$ca_no,$percent);
                $match_ca[$ca_no] = number_format($percent,2);

                foreach($integration_ca as $data)
                {
                  $match_data = similar_text($ca_sims, $data, $percent);
                  $match_ca[$data] = number_format($percent,2);
                }
                $highestPercentageOfca = 0;
                $highestPercentageca = "";
                
                foreach ($match_ca as $ca_key => $percentage) {
                    if ($percentage > $highestPercentageOfca) {
                        $highestPercentageOfca = $percentage;
                        $highestPercentageca = $ca_key;
                    }
                }
              
                if($highestPercentageOfca == 100 )
                  $color_ca = 'green';
                elseif($highestPercentageOfca >= 50)
                  $color_ca = 'orange';
                else  
                  $color_ca = 'red';

              //For bill_date 
              $match_data = similar_text($bill_date_sims,$bill_date,$percent);
              $match_bill_date[$bill_date] = number_format($percent,2);

              // print_r($integration_bill_date);die;
              foreach($integration_bill_date as $data)
              {
                $match_data = similar_text($bill_date_sims, $data, $percent);
                $match_bill_date[$data] = number_format($percent,2);
              }
              $highestPercentageOfbill_date = 0;
              $highestPercentagebill_date = "";

              foreach ($match_bill_date as $bill_date_key => $percentage) {
                  if ($percentage > $highestPercentageOfbill_date) {
                      $highestPercentageOfbill_date = $percentage;
                      $highestPercentagebill_date = $bill_date_key;
                  }
              }
              if($highestPercentageOfbill_date == 100 )
                $color_bill_date = 'green';
              elseif($highestPercentageOfbill_date >= 50)
                $color_bill_date = 'orange';
              else  
                $color_bill_date = 'red';
                // die;
              ?>
              <!-- End script -->
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
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            <th width="10%">Document</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach($query as $data)
                              <td width="10%">{{$data->HUTOWNERNAME}}</td>
                              <td width="20%">{{$data->Address}} </td>
                              <td width="10%">{{$data->PropertyType}}</td>
                              <td width="10%">Adan Elec</td>
                              <td width="10%">Not Available</td>
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
                            <th width="10%">Owner Name</th>
                            <th width="20%">Address </th>
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            <th width="10%">Document</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="10%"><?= $name; ?></td>
                            <td width="20%"><?= $address; ?> </td>
                            <td width="10%"><?= $category; ?></td>
                            <td width="10%"><?= $service_provider; ?></td>
                            <td width="10%"> <?= $ca_no; ?></td>
                            <td width="10%"> <?= $bill_date ?></td>
                            <td width="10%">
                              <img src="http://localhost/sraservices_old/public/storage/media/rnynt00Evsb9kdC10GKVB517AHISla1O9KAYZYrl.jpg" height="80" width="80">
                            </td>
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
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="5%">Legacy CA No</th>
                            <th width="5%">NAME_FIRST_CONS</th>
                            <th width="5%">FIRST_BILL</th>
                            <th width="5%">Change Name Date</th>
                            <th width="5%">CHANGE_DATE</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count1 = $showData1 = 0;
                          foreach ($new_result as $key => $result) {
                            if(gettype($result) == 'array')
                            {    
                              foreach($result as $data)
                              {
                                if(isset($data->CA)){
                                  $mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                                  $mi_year = substr($mi_date,0,4);
                                  $count1++;
                                  if($mi_year >= 2000 && $mi_year < 2011 )
                                  {
                                    $showData1 = 1;
                                  }
                                  if($showData1 == 1)
                                  {
                                  ?>
                                    <tr>
                                      <td width="10%">{{isset($data->NAME) ? $data->NAME : '-' }} </td>
                                      <td width="20%"> {{$data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE }}</td>
                                      <td width="10%">Residential</td>
                                      <td width="10%">Adan Elec</td>
                                      <td width="10%">{{$data->CA}}</td>
                                      <td width="5%">{{$data->LEGACY_CUSTOMER }}</td>
                                      <td width="5%">{{isset($data->FIRST_BILL) ? $data->FIRST_BILL : '' }}</td>
                                      <td width="5%">{{isset($data->NAME_FIRST_CONS) ? $data->NAME_FIRST_CONS : '' }}</td>
                                      <td width="5%">-</td>
                                      <td width="5%">{{isset($data->CHANGE_DATE) ? $data->CHANGE_DATE : '' }}</td>
                                    </tr>
                                  <?php  }
                                  
                                }
                                
                              }
                            }
                          }
                          if($count1 > 0 && $showData1 == 0){ ?>
                                    <tr>
                                      <td width="10%">No Data Available </td>
                                      <td width="20%">No Data Available</td>
                                      <td width="10%">No Data Available</td>
                                      <td width="10%">No Data Available</td>
                                      <td width="10%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Recommendation Start -->
                <br/>
                <?php if($showData1 == 1){?>
                <h4>Recommendation by Vendor</h4>
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
                              <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                              <td width="20%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                              <td width="10%" style="background:<?= $color_category; ?>"><?= $highestPercentageCategory; ?></td>
                              <td width="10%" style="background:<?= $color_service_provider; ?>"><?= $highestPercentageservice_provider; ?></td>
                              <td width="10%" style="background:<?= $color_ca; ?>"><?= $highestPercentageca; ?></td>
                              <td width="10%" style="background:<?= $color_bill_date; ?>"><?= $highestPercentagebill_date; ?></td>                     

                             
                        </tr>
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark') }}">
                        @csrf
                        <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                        <input type="hidden" name="year" value="2">
                        <input type="hidden" name="user" value="vendor">

                        
                        <tr>
                          <td width="10%">
                          <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfCategory) && $highestPercentageOfCategory < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2" {{ isset($highestPercentageOfCategory) && $highestPercentageOfCategory == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfservice_provider) && $highestPercentageOfservice_provider < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2"  {{ isset($highestPercentageOfservice_provider) && $highestPercentageOfservice_provider == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfca) && $highestPercentageOfca < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2" {{ isset($highestPercentageOfca) && $highestPercentageOfca == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td>
                          <td width="10%">
                          <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                              <option value="0">-- Select Option --</option>
                              <option value="1" {{ isset($highestPercentageOfbill_date) && $highestPercentageOfbill_date < 100 ? 'selected' : '' }}>Manual</option>
                              <option value="2" {{ isset($highestPercentageOfbill_date) && $highestPercentageOfbill_date == 100 ? 'selected' : '' }}>Auto</option>
                          </select>
                          </td> 
                        </tr>
                        <tr>
                          <td colspan="6"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                        @hasAccess('admin.sra.vendor_remark')
                          <?php
                            $access = '';
                          ?>
                        @endHasAccess

                          <td width="10%"><input type="text" name="remark1" value = "{{ isset($data_2000_2011->remark_name) ? $data_2000_2011->remark_name : '' }}" {{ isset($data_2000_2011->remark_name) ? 'readonly' : '' }}  <?= $access ?>></td>
                          <td width="20%"><input type="text" name="remark2" value = "{{ isset($data_2000_2011->remark_address) ? $data_2000_2011->remark_address : '' }}" {{ isset($data_2000_2011->remark_address) ? 'readonly' : '' }}  <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark3" value = "{{ isset($data_2000_2011->remark_category) ? $data_2000_2011->remark_category : '' }}" {{ isset($data_2000_2011->remark_category) ? 'readonly' : '' }}  <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark4" value = "{{ isset($data_2000_2011->remark_serviceprovider) ? $data_2000_2011->remark_serviceprovider : '' }}" {{ isset($data_2000_2011->remark_serviceprovider) ? 'readonly' : '' }}  <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark5" value = "{{ isset($data_2000_2011->remark_ca) ? $data_2000_2011->remark_ca : '' }}" {{ isset($data_2000_2011->remark_ca) ? 'readonly' : '' }}  <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark6" value = "{{ isset($data_2000_2011->remark_billdate) ? $data_2000_2011->remark_billdate : '' }}" {{ isset($data_2000_2011->remark_billdate) ? 'readonly' : '' }}  <?= $access ?>></td> 
                        </tr>
                        <tr>
                          <td><hr/><b>Overall Eligibility :</b></td>
                          <td><hr/><b>Overall Remark :</b></td>
                          @hasAccess('admin.sra.vendor_remark')
                            <td rowspan="2"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
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
                              <td width="10%"><input type="text" name="remark"  value = "{{ isset($data_2000_2011->overall_remark) ? $data_2000_2011->overall_remark : '' }}" {{ isset($data_2000_2011->overall_remark) ? 'readonly' : '' }}></td>
                        </tr>
                     
                        </form>
                        
                        </tbody>
                      </table>
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
                                <th width="10%">Category</th>
                                <th width="10%">Service Provider</th>
                                <th width="10%">CA No</th>
                                <th width="10%">Bill Date</th>
                              </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                  <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                                  <td width="20%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                                  <td width="10%" style="background:<?= $color_category; ?>"><?= $highestPercentageCategory; ?></td>
                                  <td width="10%" style="background:<?= $color_service_provider; ?>"><?= $highestPercentageservice_provider; ?></td>
                                  <td width="10%" style="background:<?= $color_ca; ?>"><?= $highestPercentageca; ?></td>
                                  <td width="10%" style="background:<?= $color_bill_date; ?>"><?= $highestPercentagebill_date; ?></td>                     
                            </tr>
                        
                            <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark') }}">
                            @csrf
                            <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                            <input type="hidden" name="year" value="2">
                            <input type="hidden" name="user" value="ca">

                            
                            <tr>
                              <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfCategory) && $highestPercentageOfCategory < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfCategory) && $highestPercentageOfCategory == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfservice_provider) && $highestPercentageOfservice_provider < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2"  {{ isset($highestPercentageOfservice_provider) && $highestPercentageOfservice_provider == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfca) && $highestPercentageOfca < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfca) && $highestPercentageOfca == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfbill_date) && $highestPercentageOfbill_date < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfbill_date) && $highestPercentageOfbill_date == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td> 
                            </tr>
                            <tr>
                              <td colspan="6"><hr/><b>Remark :</b></td>
                            </tr>
                            <tr>
                              <td width="10%"><input type="text" name="remark1_ca" value = "{{ isset($data_2000_2011_ca->remark_name) ? $data_2000_2011_ca->remark_name : '' }}" {{ isset($data_2000_2011_ca->remark_name) ? 'readonly' : '' }}></td>
                              <td width="20%"><input type="text" name="remark2_ca" value = "{{ isset($data_2000_2011_ca->remark_address) ? $data_2000_2011_ca->remark_address : '' }}" {{ isset($data_2000_2011_ca->remark_address) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark3_ca" value = "{{ isset($data_2000_2011_ca->remark_category) ? $data_2000_2011_ca->remark_category : '' }}" {{ isset($data_2000_2011_ca->remark_category) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark4_ca"  value = "{{ isset($data_2000_2011_ca->remark_serviceprovider) ? $data_2000_2011_ca->remark_serviceprovider : '' }}" {{ isset($data_2000_2011_ca->remark_serviceprovider) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark5_ca" value = "{{ isset($data_2000_2011_ca->remark_ca) ? $data_2000_2011_ca->remark_ca : '' }}" {{ isset($data_2000_2011_ca->remark_ca) ? 'readonly' : '' }} ></td>
                              <td width="10%"><input type="text" name="remark6_ca" value = "{{ isset($data_2000_2011_ca->remark_billdate) ? $data_2000_2011_ca->remark_billdate : '' }}" {{ isset($data_2000_2011_ca->remark_billdate) ? 'readonly' : '' }}></td> 
                            </tr>
                            <tr>
                              <td ><hr/><b>Overall Eligibility :</b></td>
                              <td ><hr/><b>Overall Remark :</b></td>
                              <td rowspan='2'><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
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
                          
                            <tr>
                              <!-- <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td> -->
                            </tr>
                            </form>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  @endHasAccess
                </div>
              <?php } ?>
                <!-- Recommendation  End -->
              </div>
              <!-- Year 2001 or Before Year 2011 start -->
              <!-- Current Year start -->              
               <!-- Script for Match the Data to SIMS -->
               <?php
                $integration_name = array();
                $integration_address = array();
                $integration_bill_date = array();
                $integration_ca = array();
                $integration_service_provider = array();
                $integration_category = array();


                foreach($query as $data)
                {
                  $name_sims = $data->HUTOWNERNAME;
                  $address_sims = $data->Address;
                  $category_sims = $data->PropertyType;
                  $service_provider_sims = 'Adan Elec';
                  $ca_sims = 'Not Available';
                  $bill_date_sims = 'Not Available';
                }
                // echo $name_sims;die;
                foreach ($new_result as $key => $result) {
                  if(gettype($result) == 'array')
                  {    
                    foreach($result as $data)
                    {
                      if(isset($data->CA)){
                        $mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                        $mi_year = substr($mi_date,0,4);
                       
                        if($mi_year >= 2011)
                        {
                          $integration_name[] = $data->NAME;
                          $integration_address[] = $data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE;
                          $integration_category[] = 'Residential';
                          $integration_service_provider[] = 'Adan Elec';
                          $integration_ca[] = $data->CA;
                          $integration_bill_date[] = $data->MI_DATE;

                        }
                        // echo "AS";die;
                      }
                      
                    }
                  }
                }

                //For Name
                $match_data = similar_text($name_sims,$name,$percent);
                $match_name[$name] = number_format($percent,2);

                foreach($integration_name as $data)
                {
                  $match_data = similar_text($name_sims, $data, $percent);
                  $match_name[$data] = number_format($percent,2);
                }
                $highestPercentageOfName = 0;
                $highestPercentageName = "";

                foreach ($match_name as $name => $percentage) {
                    if ($percentage > $highestPercentageOfName) {
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
                $match_data = similar_text($address_sims,$address,$percent);
                $match_address[$address] = number_format($percent,2);

                foreach($integration_address as $data)
                {
                  $match_data = similar_text($address_sims, $data, $percent);
                  $match_address[$data] = number_format($percent,2);
                }
                $highestPercentageOfAddress = 0;
                $highestPercentageAddress = "";

                foreach ($match_address as $address_key => $percentage) {
                    if ($percentage > $highestPercentageOfAddress) {
                        $highestPercentageOfAddress = $percentage;
                        $highestPercentageAddress = $address_key;
                    }
                }
                if($highestPercentageOfAddress == 100 )
                  $color_address = 'green';
                elseif($highestPercentageOfAddress >= 50)
                  $color_address = 'orange';
                else  
                  $color_address = 'red';

                //For Category
                $match_data = similar_text($category_sims,$category,$percent);
                $match_category[$category] = number_format($percent,2);

                foreach($integration_category as $data)
                {
                  $match_data = similar_text($category_sims, $data, $percent);
                  $match_category[$data] = number_format($percent,2);
                }
                $highestPercentageOfCategory = 0;
                $highestPercentageCategory = "";

                foreach ($match_category as $category_key => $percentage) {
                    if ($percentage > $highestPercentageOfCategory) {
                        $highestPercentageOfCategory = $percentage;
                        $highestPercentageCategory = $category_key;
                    }
                }
                if($highestPercentageOfCategory == 100 )
                  $color_category = 'green';
                elseif($highestPercentageOfCategory >= 50)
                  $color_category = 'orange';
                else  
                  $color_category = 'red';


                //For Service_provider
                $match_data = similar_text($service_provider_sims,$service_provider,$percent);
                $match_service_provider[$service_provider] = number_format($percent,2);

                foreach($integration_service_provider as $data)
                {
                  $match_data = similar_text($service_provider_sims, $data, $percent);
                  $match_service_provider[$data] = number_format($percent,2);
                }
                $highestPercentageOfservice_provider = 0;
                $highestPercentageservice_provider = "";

                foreach ($match_service_provider as $service_provider_key => $percentage) {
                    if ($percentage > $highestPercentageOfservice_provider) {
                        $highestPercentageOfservice_provider = $percentage;
                        $highestPercentageservice_provider = $service_provider_key;
                    }
                }
                if($highestPercentageOfservice_provider == 100 )
                  $color_service_provider = 'green';
                elseif($highestPercentageOfservice_provider >= 50)
                  $color_service_provider = 'orange';
                else  
                  $color_service_provider = 'red';
                
                //For CA             
                $match_data = similar_text($ca_sims,$ca_no,$percent);
                $match_ca[$ca_no] = number_format($percent,2);

                foreach($integration_ca as $data)
                {
                  $match_data = similar_text($ca_sims, $data, $percent);
                  $match_ca[$data] = number_format($percent,2);
                }
                $highestPercentageOfca = 0;
                $highestPercentageca = "";
                
                foreach ($match_ca as $ca_key => $percentage) {
                    if ($percentage > $highestPercentageOfca) {
                        $highestPercentageOfca = $percentage;
                        $highestPercentageca = $ca_key;
                    }
                }
              
                if($highestPercentageOfca == 100 )
                  $color_ca = 'green';
                elseif($highestPercentageOfca >= 50)
                  $color_ca = 'orange';
                else  
                  $color_ca = 'red';

              //For bill_date 
              $match_data = similar_text($bill_date_sims,$bill_date,$percent);
              $match_bill_date[$bill_date] = number_format($percent,2);

              // print_r($integration_bill_date);die;
              foreach($integration_bill_date as $data)
              {
                $match_data = similar_text($bill_date_sims, $data, $percent);
                $match_bill_date[$data] = number_format($percent,2);
              }
              $highestPercentageOfbill_date = 0;
              $highestPercentagebill_date = "";

              foreach ($match_bill_date as $bill_date_key => $percentage) {
                  if ($percentage > $highestPercentageOfbill_date) {
                      $highestPercentageOfbill_date = $percentage;
                      $highestPercentagebill_date = $bill_date_key;
                  }
              }
              if($highestPercentageOfbill_date == 100 )
                $color_bill_date = 'green';
              elseif($highestPercentageOfbill_date >= 50)
                $color_bill_date = 'orange';
              else  
                $color_bill_date = 'red';
              ?>
              <!-- End script -->
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
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            <th width="10%">Document</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach($query as $data)
                              <td width="10%">{{$data->HUTOWNERNAME}}</td>
                              <td width="20%">{{$data->Address}} </td>
                              <td width="10%">{{$data->PropertyType}}</td>
                              <td width="10%">Adan Elec</td>
                              <td width="10%">-</td>
                              <td width="10%">-</td>
                              <td width="10%">-</td>
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
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="10%">Bill Date</th>
                            <th width="10%">Document</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="10%">-</td>
                            <td width="20%"><?= $address; ?> </td>
                            <td width="10%"><?= $category; ?></td>
                            <td width="10%"><?= $service_provider; ?></td>
                            <td width="10%"> <?= $ca_no; ?></td>
                            <td width="10%">-</td>
                            <td width="10%">
                              <img src="http://localhost/sraservices_old/public/storage/media/rnynt00Evsb9kdC10GKVB517AHISla1O9KAYZYrl.jpg" height="80" width="80">
                            </td>
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
                            <th width="10%">Category</th>
                            <th width="10%">Service Provider</th>
                            <th width="10%">CA No</th>
                            <th width="5%">Legacy CA No</th>
                            <th width="5%">NAME_FIRST_CONS</th>
                            <th width="5%">FIRST_BILL</th>
                            <th width="5%">Change Name Date</th>
                            <th width="5%">CHANGE_DATE</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count1 = $showData1 = 0;
                          foreach ($new_result as $key => $result) {
                            if(gettype($result) == 'array')
                            {    
                              foreach($result as $data)
                              {
                                if(isset($data->CA)){
                                  $mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                                  $mi_year = substr($mi_date,0,4);
                                  $count1++;
                                  if($mi_year >= 2011)
                                  {
                                    $showData1 = 1;
                                  }
                                  if($showData1 == 1)
                                  {
                                  ?>
                                    <tr>
                                      <td width="10%">{{isset($data->NAME) ? $data->NAME : '-' }} </td>
                                      <td width="20%"> {{$data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE }}</td>
                                      <td width="10%">Residential</td>
                                      <td width="10%">Adan Elec</td>
                                      <td width="10%">{{$data->CA}}</td>
                                      <td width="5%">{{$data->LEGACY_CUSTOMER }}</td>
                                      <td width="5%">{{isset($data->FIRST_BILL) ? $data->FIRST_BILL : '' }}</td>
                                      <td width="5%">{{isset($data->NAME_FIRST_CONS) ? $data->NAME_FIRST_CONS : '' }}</td>
                                      <td width="5%">-</td>
                                      <td width="5%">{{isset($data->CHANGE_DATE) ? $data->CHANGE_DATE : '' }}</td>
                                    </tr>
                                  <?php  }
                                  
                                }
                                
                              }
                            }
                          }
                          if($count1 > 0 && $showData1 == 0){ ?>
                                    <tr>
                                      <td width="10%">No Data Available </td>
                                      <td width="20%">No Data Available</td>
                                      <td width="10%">No Data Available</td>
                                      <td width="10%">No Data Available</td>
                                      <td width="10%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                      <td width="5%">No Data Available</td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <br/>
                <!-- recommendation start -->
                 <br/>
                 <?php if($showData1 == 1){?>
                 <h4>Recommendation by Vendor</h4>
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
                              <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                              <td width="20%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                              <td width="10%" style="background:<?= $color_category; ?>"><?= $highestPercentageCategory; ?></td>
                              <td width="10%" style="background:<?= $color_service_provider; ?>"><?= $highestPercentageservice_provider; ?></td>
                              <td width="10%" style="background:<?= $color_ca; ?>"><?= $highestPercentageca; ?></td>
                              <td width="10%" style="background:<?= $color_bill_date; ?>"><?= $highestPercentagebill_date; ?></td>   
                        </tr>
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark') }}">
                        @csrf
                        <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                        <input type="hidden" name="year" value="3">
                        <input type="hidden" name="user" value="vendor">
                        <tr>
                          <td colspan="6"><hr/><b>Remark :</b></td>
                        </tr>
                        <tr>
                        @hasAccess('admin.sra.vendor_remark')
                          <?php
                            $access = '';
                          ?>
                        @endHasAccess
                         
                          <td width="10%"><input type="text" name="remark1" value = "{{ isset($data_current->remark_name) ? $data_current->remark_name : '' }}" {{ isset($data_current->remark_name) ? 'readonly' : '' }}  <?= $access ?>></td>
                          <td width="20%"><input type="text" name="remark2" value = "{{ isset($data_current->remark_address) ? $data_current->remark_address : '' }}" {{ isset($data_current->remark_address) ? 'readonly' : '' }} <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark3" value = "{{ isset($data_current->remark_category) ? $data_current->remark_category : '' }}" {{ isset($data_current->remark_category) ? 'readonly' : '' }} <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark4" value = "{{ isset($data_current->remark_serviceprovider) ? $data_current->remark_serviceprovider : '' }}" {{ isset($data_current->remark_serviceprovider) ? 'readonly' : '' }} <?= $access ?> ></td>
                          <td width="10%"><input type="text" name="remark5" value = "{{ isset($data_current->remark_ca) ? $data_current->remark_ca : '' }}" {{ isset($data_current->remark_ca) ? 'readonly' : '' }} <?= $access ?>></td>
                          <td width="10%"><input type="text" name="remark6" value = "{{ isset($data_current->remark_billdate) ? $data_current->remark_billdate : '' }}" {{ isset($data_current->remark_billdate) ? 'readonly' : '' }} <?= $access ?>></td> 
                        </tr>
                        <tr>
                          <td><hr/><b>Overall Eligibility :</b></td>
                          <td><hr/><b>Overall Remark :</b></td>
                          @hasAccess('admin.sra.vendor_remark')

                            <td rowspan="2"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
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
                              
                            <td width="10%"><input type="text" name="remark"  value = "{{ isset($data_current->overall_remark) ? $data_current->overall_remark : '' }}" {{ isset($data_current->overall_remark) ? 'readonly' : '' }}></td>

                        </tr>
                     
                        </form>
                        
                        </tbody>
                      </table>
                      
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
                                <th width="10%">Category</th>
                                <th width="10%">Service Provider</th>
                                <th width="10%">CA No</th>
                                <th width="10%">Bill Date</th>
                              </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                  <td width="10%" style="background:<?= $color_name; ?>"><?= $highestPercentageName; ?></td>
                                  <td width="20%" style="background:<?= $color_address; ?>"><?= $highestPercentageAddress; ?></td>
                                  <td width="10%" style="background:<?= $color_category; ?>"><?= $highestPercentageCategory; ?></td>
                                  <td width="10%" style="background:<?= $color_service_provider; ?>"><?= $highestPercentageservice_provider; ?></td>
                                  <td width="10%" style="background:<?= $color_ca; ?>"><?= $highestPercentageca; ?></td>
                                  <td width="10%" style="background:<?= $color_bill_date; ?>"><?= $highestPercentagebill_date; ?></td>                     
                            </tr>
                        
                            <form method="post" enctype="multipart/form-data" action="{{ route('admin.sra.storeremark') }}">
                            @csrf
                            <input type="hidden" name="hutid" value="<?php echo $hid;?>">
                            <input type="hidden" name="year" value="3">
                            <input type="hidden" name="user" value="ca">

                            
                            <tr>
                              <td width="10%">
                              <select name="elg1" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfName) && $highestPercentageOfName < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfName) && $highestPercentageOfName == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg2" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfAddress) && $highestPercentageOfAddress == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg3" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfCategory) && $highestPercentageOfCategory < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfCategory) && $highestPercentageOfCategory == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg4" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfservice_provider) && $highestPercentageOfservice_provider < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2"  {{ isset($highestPercentageOfservice_provider) && $highestPercentageOfservice_provider == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg5" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfca) && $highestPercentageOfca < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfca) && $highestPercentageOfca == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td>
                              <td width="10%">
                              <select name="elg6" class="form-control" style="padding: 2px 1rem !important;">
                                  <option value="0">-- Select Option --</option>
                                  <option value="1" {{ isset($highestPercentageOfbill_date) && $highestPercentageOfbill_date < 100 ? 'selected' : '' }}>Manual</option>
                                  <option value="2" {{ isset($highestPercentageOfbill_date) && $highestPercentageOfbill_date == 100 ? 'selected' : '' }}>Auto</option>
                              </select>
                              </td> 
                            </tr>
                            <tr>
                              <td colspan="6"><hr/><b>Remark :</b></td>
                            </tr>
                            <tr>
                              <td width="10%"><input type="text" name="remark1_ca" value = "{{ isset($data_current_ca->remark_name) ? $data_current_ca->remark_name : '' }}" {{ isset($data_current_ca->remark_name) ? 'readonly' : '' }}></td>
                              <td width="20%"><input type="text" name="remark2_ca" value = "{{ isset($data_current_ca->remark_address) ? $data_current_ca->remark_address : '' }}" {{ isset($data_current_ca->remark_address) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark3_ca" value = "{{ isset($data_current_ca->remark_category) ? $data_current_ca->remark_category : '' }}" {{ isset($data_current_ca->remark_category) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark4_ca"  value = "{{ isset($data_current_ca->remark_serviceprovider) ? $data_current_ca->remark_serviceprovider : '' }}" {{ isset($data_current_ca->remark_serviceprovider) ? 'readonly' : '' }}></td>
                              <td width="10%"><input type="text" name="remark5_ca" value = "{{ isset($data_current_ca->remark_ca) ? $data_current_ca->remark_ca : '' }}" {{ isset($data_current_ca->remark_ca) ? 'readonly' : '' }} ></td>
                              <td width="10%"><input type="text" name="remark6_ca" value = "{{ isset($data_current_ca->remark_billdate) ? $data_current_ca->remark_billdate : '' }}" {{ isset($data_current_ca->remark_billdate) ? 'readonly' : '' }}></td> 
                            </tr>
                            <tr>
                              <td ><hr/><b>Overall Eligibility :</b></td>
                              <td ><hr/><b>Overall Remark :</b></td>
                              <td rowspan='2'><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td>
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
                          
                            <tr>
                              <!-- <td colspan="6"><button id="submitBtn" type ="submit" class="btn btn-primary ml-auto btn-actions btn-create">Submit</button></td> -->
                            </tr>
                            </form>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  @endHasAccess
                </div>
                <?php } ?>
                <!-- Recommendation end -->
              </div>
              <!-- Current Year start -->  
              <!-- year end -->
              <!-- end -->
            </div>
          </div>
          <div class="tab">
            <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
            <a href="index.php/sra/elections/{{$hid}}" class="tab-label" style="color:#495057!important;">Election</a>
            <div class="tab-content">Election Details</div>
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