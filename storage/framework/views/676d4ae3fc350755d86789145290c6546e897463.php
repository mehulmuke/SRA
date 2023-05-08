<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::sra.electricitytitle'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('admin::sra.electricitytitle'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean(trans('admin::sra.electricitytitle'))); ?></h4>
                    </div>
                </div>
                <div class="card-body">

<style type="text/css">
    table {
      writing-mode: horizontal-tb;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      white-space: nowrap;
      padding: 5px;
    }


.table-wrapper {
    overflow-x: scroll;
    width: 100%;
    margin: 0 auto;
}

  </style>
  

  <style>
    /* Style the modal background */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
    }
    .full-image {
        max-width: 125%;
        max-height: 100vh;
    }
    /* Style the modal content */
    .modal-content {
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 90%;
        max-height: 90%;
    }

    /* Style the close button */
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #fff;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
    }
</style>
<div class="table-responsive" id="sra-table">

<table class="table table-hover table-striped table-responsive">
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
        <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <td><?php echo e($data->HUTSURVERYID); ?></td>
            <?php $hid = $data->HUTSURVERYID ?>




            <td><?php echo e($data->ClusterId); ?></td>


            <td><?php echo e($data->SchemeName); ?></td>


            


            


            

            <td><?php echo e($data->FLOORNUM); ?></td>



            <td><?php echo e(round($data->HUTLENGTH,2)); ?></td>


            <td><?php echo e(round($data->HUTWIDTH,2)); ?></td>


            <td><?php echo e(round($data->Area,2)); ?></td>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
    </tbody>
</table>
</div>

 
 <br><br>
 <div class="col-md-12">
 <div class="card">
 <div class="card-header" style="background-color: #ddf0f6; ">
     <div class="d-flex align-items-center">
         <h3 class="card-title"><i class="fas fa-list"></i> &nbsp;Year 2000 or Before</h3>
     </div>
 </div>
 <div class="card-body">
     <div class="table-wrapper">
         <!-- sims data and ocr section start -->
          <table class="display table table-bordered">
                <thead>
                  <tr>
                    <th width="45%" style="background-color: rgba(0,0,0,.05);padding:10px;"></th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Owner Name</th>
                    <th width="50%" style="background-color: rgba(0,0,0,.05);padding:10px;">Address </th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Category</th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Service Provider</th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">CA No</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Bill Date</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Document</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="25%">
                      <b>SIMS Data</b>
                    </td>
                    <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
                    <td width="25%"><?php echo e($data->HUTOWNERNAME); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td width="50%"><?php echo e($data->Address); ?> </td>
                    <td width="25%"><?php echo e($data->PropertyType); ?></td>
                    <td width="25%">Adan Elec</td>
                    <td width="25%">-</td>
                    <td width="15%">-</td>
                    <td width="15%">-</td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tr>
                  <tr>
                    <td width="25%">
                      <b>SIMS OCR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                    </td>
                    <td width="25%">-</td>
                    <td width="50%"><?= $address; ?> </td>
                    <td width="25%"><?= $category; ?></td>
                    <td width="25%"><?= $service_provider; ?></td>
                    <td width="25%"> <?= $ca_no; ?></td>
                    <td width="15%">-</td>
                    <td width="15%">
                      <img src="http://localhost/sraservices_old/public/storage/media/rnynt00Evsb9kdC10GKVB517AHISla1O9KAYZYrl.jpg" height="200" width="200">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
         </div>
 
                 
 
                 <br/>
                 <div class="table-wrapper">
              <table class="display table table-bordered">
                <thead>
                  <tr>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;"></th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Owner Name</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Address </th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Category</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Service Provider</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">CA No</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Legacy CA No</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">NAME_FIRST_CONS</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">FIRST_BILL</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Change Name Date</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">CHANGE_DATE</th>
                    
                  </tr>
                </thead>
                <tbody>
                 <?php
                 foreach ($new_result as $key => $result) {
                        if(gettype($result) == 'array')
                        {    foreach($result as $data)
                            {
 
                                if(isset($data->CA)){
                                 $mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                                 $showData1 ='';
                                 $mi_year = substr($mi_date,0,4);
 
                                 if($mi_year >= 1990 && $mi_year < 2000 )
                                 {
                                     $showData1 = 1;
                                 }
                                 if($showData1 == 1 )
                                 {
 
 
                                // if($data->CA == '000102411935'){
                                ?>
                  <tr>
                    <td width="25%">
                      <b>Integration <br /> Service </b>
                    </td>
                    <td width="15%"><?php echo e(isset($data->NAME) ? $data->NAME : '-'); ?> </td>
                    <td width="15%"> <?php echo e($data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE); ?></td>
                    <td width="15%">Residential</td>
                    <td width="15%">Adan Elec</td>
                    <td width="15%"><?php echo e($data->CA); ?></td>
                    <td width="15%"><?php echo e($data->LEGACY_CUSTOMER); ?></td>
                    <td width="15%"><?php echo e(isset($data->FIRST_BILL) ? $data->FIRST_BILL : ''); ?></td>
                    <td width="15%"><?php echo e(isset($data->NAME_FIRST_CONS) ? $data->NAME_FIRST_CONS : ''); ?></td>
                    <td width="15%">-</td>
                    <td width="15%"><?php echo e(isset($data->CHANGE_DATE) ? $data->CHANGE_DATE : ''); ?></td>
                    
                  </tr>
 
                  <?php  }}}}}?>
 
                 </table> 
             </div>
             
     </div>
 </div>
 
 
 
 
 
<br><br>
<div class="col-md-12">
<div class="card">
<div class="card-header" style="background-color: #ddf0f6; ">
    <div class="d-flex align-items-center">
        <h3 class="card-title"><i class="fas fa-list"></i> &nbsp;Year 2001 or Before Year 2011</h3>
    </div>
</div>
<div class="card-body">
    <div class="table-wrapper">
        <!-- sims data and ocr section start -->
         <table class="display table table-bordered">
               <thead>
                 <tr>
                   <th width="45%" style="background-color: rgba(0,0,0,.05);padding:10px;"></th>
                   <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Owner Name</th>
                   <th width="50%" style="background-color: rgba(0,0,0,.05);padding:10px;">Address </th>
                   <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Category</th>
                   <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Service Provider</th>
                   <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">CA No</th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Bill Date</th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Document</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td width="25%">
                     <b>SIMS Data</b>
                   </td>
                   <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                   <td width="25%"><?php echo e($data->HUTOWNERNAME); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                   <td width="50%"><?php echo e($data->Address); ?> </td>
                   <td width="25%"><?php echo e($data->PropertyType); ?></td>
                   <td width="25%">Adan Elec</td>
                   <td width="25%">-</td>
                   <td width="15%">-</td>
                   <td width="15%">-</td>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </tr>
                 <tr>
                   <td width="25%">
                     <b>SIMS OCR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                   </td>
                   <td width="25%">-</td>
                   <td width="50%"><?= $address; ?> </td>
                   <td width="25%"><?= $category; ?></td>
                   <td width="25%"><?= $service_provider; ?></td>
                   <td width="25%"> <?= $ca_no; ?></td>
                   <td width="15%">-</td>
                   <td width="15%">
                     <img src="http://localhost/sraservices_old/public/storage/media/rnynt00Evsb9kdC10GKVB517AHISla1O9KAYZYrl.jpg" height="200" width="200">
                   </td>
                 </tr>
               </tbody>
             </table>
           </div>
        </div>

                

                <br/>
                <div class="table-wrapper">
             <table class="display table table-bordered">
               <thead>
                 <tr>
                   <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;"></th>
                   <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Owner Name</th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Address </th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Category</th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Service Provider</th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">CA No</th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Legacy CA No</th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">NAME_FIRST_CONS</th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">FIRST_BILL</th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Change Name Date</th>
                   <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">CHANGE_DATE</th>
                   
                 </tr>
               </thead>
               <tbody>
                <?php
                foreach ($new_result as $key => $result) {
                       if(gettype($result) == 'array')
                       {    foreach($result as $data)
                           {

                               if(isset($data->CA)){
                                $mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                                $showData2 ='';
                                $mi_year = substr($mi_date,0,4);

                                if($mi_year >= 2000 && $mi_year < 2011 )
                                {
                                    $showData2 = 1;
                                }
                                if($showData2 == 1 )
                                {


                               // if($data->CA == '000102411935'){
                               ?>
                 <tr>
                   <td width="25%">
                     <b>Integration <br /> Service </b>
                   </td>
                   <td width="15%"><?php echo e($data->NAME); ?> </td>
                   <td width="15%"> <?php echo e($data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE); ?></td>
                   <td width="15%">Residential</td>
                   <td width="15%">Adan Elec</td>
                   <td width="15%"><?php echo e($data->CA); ?></td>
                   <td width="15%"><?php echo e($data->LEGACY_CUSTOMER); ?></td>
                   <td width="15%"><?php echo e(isset($data->FIRST_BILL) ? $data->FIRST_BILL : ''); ?></td>
                   <td width="15%"><?php echo e(isset($data->NAME_FIRST_CONS) ? $data->NAME_FIRST_CONS : ''); ?></td>
                   <td width="15%">-</td>
                   <td width="15%"><?php echo e(isset($data->CHANGE_DATE) ? $data->CHANGE_DATE : ''); ?></td>
                   
                 </tr>

                 <?php  }}}}}?>

                </table> 
            </div>
            
    </div>
</div>



 
 <br><br>
 <div class="col-md-12">
 <div class="card">
 <div class="card-header" style="background-color: #ddf0f6; ">
     <div class="d-flex align-items-center">
         <h3 class="card-title"><i class="fas fa-list"></i> &nbsp;Current Year</h3>
     </div>
 </div>
 <div class="card-body">
     <div class="table-wrapper">
         <!-- sims data and ocr section start -->
          <table class="display table table-bordered">
                <thead>
                  <tr>
                    <th width="45%" style="background-color: rgba(0,0,0,.05);padding:10px;"></th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Owner Name</th>
                    <th width="50%" style="background-color: rgba(0,0,0,.05);padding:10px;">Address </th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Category</th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Service Provider</th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">CA No</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Bill Date</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Document</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="25%">
                      <b>SIMS Data</b>
                    </td>
                    <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
                    <td width="25%"><?php echo e($data->HUTOWNERNAME); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td width="50%"><?php echo e($data->Address); ?> </td>
                    <td width="25%"><?php echo e($data->PropertyType); ?></td>
                    <td width="25%">Adan Elec</td>
                    <td width="25%">-</td>
                    <td width="15%">-</td>
                    <td width="15%">-</td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tr>
                  <tr>
                    <td width="25%">
                      <b>SIMS OCR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                    </td>
                    <td width="25%">-</td>
                    <td width="50%"><?= $address; ?> </td>
                    <td width="25%"><?= $category; ?></td>
                    <td width="25%"><?= $service_provider; ?></td>
                    <td width="25%"> <?= $ca_no; ?></td>
                    <td width="15%">-</td>
                    <td width="15%">
                      <img src="http://localhost/sraservices_old/public/storage/media/rnynt00Evsb9kdC10GKVB517AHISla1O9KAYZYrl.jpg" height="200" width="200">
                    </td>
                  </tr>
                </tbody>
              </table>

             

 
                 
 
                 <br/>
                 <div class="table-wrapper">
              <table class="display table table-bordered">
                <thead>
                  <tr>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;"></th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Owner Name</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Address </th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Category</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Service Provider</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">CA No</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Legacy CA No</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">NAME_FIRST_CONS</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">FIRST_BILL</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Change Name Date</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">CHANGE_DATE</th>
                    
                  </tr>
                </thead>
                <tbody>
                 <?php
                 foreach ($new_result as $key => $result) {
                        if(gettype($result) == 'array')
                        {    foreach($result as $data)
                            {
 
                                if(isset($data->CA)){
                                 $mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                                 $showData ='';
                                 $mi_year = substr($mi_date,0,4);
 
                                 if($mi_year >= 2011)
                                 {
                                     $showData = 1;
                                 }
                                 if($showData == 1 )
                                 {
 
 
                                // if($data->CA == '000102411935'){
                                ?>
                  <tr>
                    <td width="25%">
                      <b>Integration <br /> Service </b>
                    </td>
                    <td width="15%"><?php echo e($data->NAME); ?> </td>
                    <td width="15%"> <?php echo e($data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE); ?></td>
                    <td width="15%">Residential</td>
                    <td width="15%">Adan Elec</td>
                    <td width="15%"><?php echo e($data->CA); ?></td>
                    <td width="15%"><?php echo e($data->LEGACY_CUSTOMER); ?></td>
                    <td width="15%"><?php echo e(isset($data->FIRST_BILL) ? $data->FIRST_BILL : ''); ?></td>
                    <td width="15%"><?php echo e(isset($data->NAME_FIRST_CONS) ? $data->NAME_FIRST_CONS : ''); ?></td>
                    <td width="15%">-</td>
                    <td width="15%"><?php echo e(isset($data->CHANGE_DATE) ? $data->CHANGE_DATE : ''); ?></td>
                    
                  </tr>
 
                  <?php  }}}}}?>
 
                 </table> 
             </div>
            <br/>
             

              
              <table class="display table table-bordered">
                <thead>
                  <tr>
                    <th width="45%" style="background-color: rgba(0,0,0,.05);padding:10px;"></th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Owner Name</th>
                    <th width="50%" style="background-color: rgba(0,0,0,.05);padding:10px;">Address </th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Category</th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">Service Provider</th>
                    <th width="25%" style="background-color: rgba(0,0,0,.05);padding:10px;">CA No</th>
                    <th width="15%" style="background-color: rgba(0,0,0,.05);padding:10px;">Bill Date</th>
                  </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td width="25%">
                            <b>Recommendation (Vendor)</b>
                        </td>
                        <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td width="25%"><?php echo e($data->HUTOWNERNAME); ?></td>
                        <td width="50%"><?php echo e($data->Address); ?></td>
                        <td width="25%"><?php echo e($data->PropertyType); ?></td>
                        <td width="25%">Adan Elec</td>
                        <td width="25%">-</td>
                        <td width="15%">-</td>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <tr>
                        <td width="25%">
                            <b>Eligible / Not Eligible</b>
                        </td>
                        <td width="25%">Manual</td>
                        <td width="50%">Manual</td>
                        <td width="25%">Manual</td>
                        <td width="25%">Manual</td>
                        <td width="25%">Manual</td>
                        <td width="15%">Manual</td>
                        
                    </tr>
                    <tr>
                        <td width="25%">
                            <b>Remark</b>
                        </td>
                        <td width="25%"><input type="text" name="remark1"></td>
                        <td width="50%"><input type="text" name="remark2"></td>
                        <td width="25%"><input type="text" name="remark3"></td>
                        <td width="25%"><input type="text" name="remark4"></td>
                        <td width="25%"><input type="text" name="remark5"></td>
                        <td width="15%"><input type="text" name="remark6"></td>
                        
                    </tr>
                    <tr>
                        <td width="25%">
                            <b>Action</b>
                        </td>
                        <td width="25%">
                            <button type="submit" name="submit1" class="btn btn-primary btn-sm btn-actions">Submit</button>
                        </td>
                        <td width="50%">
                            <button type="submit" name="submit2" class="btn btn-primary btn-sm btn-actions">Submit</button>
                        </td>
                        <td width="25%">
                            <button type="submit" name="submit3" class="btn btn-primary btn-sm btn-actions">Submit</button>
                        </td>
                        <td width="25%">
                            <button type="submit" name="submit4" class="btn btn-primary btn-sm btn-actions">Submit</button>
                        </td>
                        <td width="25%">
                            <button type="submit" name="submit5" class="btn btn-primary btn-sm btn-actions">Submit</button>
                        </td>
                        <td width="15%">
                            <button type="submit" name="submit6" class="btn btn-primary btn-sm btn-actions">Submit</button>
                        </td>
                        
                    </tr>
                </tbody>              
              </table>
            </div>
         </div>
                
     </div>
 </div>
 
 
                 </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Admin/Resources/views/sra/electricity.blade.php ENDPATH**/ ?>