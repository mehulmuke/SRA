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

<style>
    table {
      writing-mode: horizontal-tb;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      padding: 5px;
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
        <th>Scheme Name</th>
        <th>Cluster ID</th>
        <th>HUT Owner Name</th>
        <th>Address</th>
        <th>Property Type</th>
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


            <td><?php echo e($data->SchemeName); ?></td>


            <td><?php echo e($data->ClusterId); ?></td>


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
<br><br>
<div class="rows" style="display:flex">
    <div class="table-responsive col-sm-4" id="sra-table">
    <table class="display table table-striped table-hover translations-table">
                <thead>
                    <tr>
                        <th data-sort><h2><b><?php echo e(clean(trans('admin::sra.election.heading_sims'))); ?></b></h2></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo e(clean(trans('admin::sra.electricity.service_provider'))); ?> : <?= $service_provider; ?> </td>
                    </tr>
                    <tr>
                        <td><?php echo e(clean(trans('admin::sra.electricity.ca_no'))); ?> : <?= $ca_no; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(clean(trans('admin::sra.electricity.category'))); ?> : <?= $category; ?> </td>
                    </tr>
                    <tr>
                        <td><?php echo e(clean(trans('admin::sra.electricity.address'))); ?> : <?= $address; ?> </td>
                    </tr>
                    <?php $id = 2 ?>


                    <?php $__currentLoopData = $query1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <?php if($value->DocumentContent): ?>
                            <?php if($value->DOCCategory == 'DOC2'): ?>
                                <tr>
                                    <td> <?php echo e($value->DOCCategory); ?> : &nbsp;
                                    <img class="thumbnail_<?php echo e($value->DOCCategory); ?>" src="data:image/png;base64,<?php echo e(base64_encode($value->DocumentContent)); ?>" width='100' height='100'></td>
                                </tr>
                            <?php endif; ?>
                        <?php else: ?>
                           
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php if($missing_status == 0){?>
                            <tr>
                               <td> <p><b>No image data found.</b></p></td>
                            </tr>
                            <tr>
                                <td> <button class="btn btn-primary ml-auto btn-actions btn-create" onclick="window.location.href='<?php echo e(route('admin.sra.manualdataelectricity_missing', ['hid' => $hid])); ?>'">Remark as Missing Document</button></td>
                            </tr>
                      <?php } ?>
                      <?php if($missing_status > 0){?>
                      <tr><td>Documents:</td></tr>
                                <?php foreach($missing_images as $image){ 
                                        if(isset($image)){?>

                                            <tr>
                                                <td><img class='thumbnail' src='<?php echo e(url("images/$image->file")); ?>' width='100' height='100' /></td>
                                            </tr>
                                <?php 
                                        } 
                                    }
                                }
                                    ?>
                    <!-- <tr>
                       <td> <button class="btn btn-primary ml-auto btn-actions btn-create" onclick="window.location.href='<?php echo e(route('admin.sra.manualdata', ['id' => $id, 'hid' => $hid])); ?>'">Uplode Electricity bill</button></td>
                    </tr> -->


                </tbody>
            </table>
    </div>
        <div class="table-responsive col-sm-4" id="sra-table">
            <table class="display table table-striped table-hover translations-table">
                <thead>
                    <tr>
                        <th data-sort><h2><b><?php echo e(clean(trans('admin::sra.election.heading_auto'))); ?></b></h2></th>
                    </tr>
                </thead>
                <tbody>
                 <?php
                 foreach ($new_result as $key => $result) {
                        if(gettype($result) == 'array')
                        {    foreach($result as $data)
                            {

                                if(isset($data->CA)){


                                // if($data->CA == '000102411935'){
                                ?>
                                   <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.CA'))); ?> : <?= $data->CA ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.MI_DATE'))); ?> : <?= $data->MI_DATE ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.MO_DATE'))); ?> : <?= $data->MO_DATE ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.LEGACY_CUSTOMER'))); ?> : <?= $data->LEGACY_CUSTOMER ?> </td>
                                </tr>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.NAME'))); ?> : <?= $data->NAME ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.HOUSE_NO'))); ?> : <?= $data->HOUSE_NO ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.ADDRESS1'))); ?> : <?= $data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3 ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.PIN_CODE'))); ?> : <?= $data->PIN_CODE ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.TARIFF'))); ?> : <?= $data->TARIFF ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.FLAG_MIGR'))); ?> : <?= $data->FLAG_MIGR ?> </td>
                                </tr>

                    <?php
                                }
                            }
                        }
                        else{
                            if($key == 'ARREARS')
                            {
                            ?>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.ARREARS'))); ?> : <?= $result ?> </td>
                                </tr>
                            <?php
                            }
                            if($key == 'ARREARSSpecified')
                            {
                            ?>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.ARREARSSpecified'))); ?> : <?= $result ?> </td>
                                </tr>
                            <?php
                            }
                            if($key == 'FLAG')
                            {
                            ?>
                                <tr>
                                    <td><?php echo e(clean(trans('admin::sra.electricity.FLAG'))); ?> : <?= $result ?> </td>
                                </tr>
                            <?php
                            }
                        }
                        // echo $key;die;

                    }
                    // }
                    ?>

                </tbody>
            </table>
        </div>

        
       <!--  <div class="table-responsive col-sm-4" id="sra-table">
            <table class="display table table-striped table-hover translations-table">
                <thead>
                    <tr>
                        <th data-sort><h2><b><?php echo e(clean(trans('admin::sra.election.heading_manual'))); ?></b></h2></th>
                    </tr>
                </thead>
                <tbody>
                    <form method="POST" action='<?php echo e(route('admin.sra.electricity', [ 'hid' => $hid ])); ?>'>
                        <?php echo csrf_field(); ?>
                        <div class="form-group row" style="padding-top:0px">
                            <tr>
                                <th style="height: auto !important;padding: 10px !important;margin: 10px !important;" >Eligibility :   <select class="form-control" id="status" name="status" required>
                                        <option value="">Select Option</option>
                                        <option value="auto">Auto</option>
                                        <option value="manual">Manual</option>

                                </select></th>
                            </tr>
                             <tr>
                                <th><?php echo e(clean(trans('admin::sra.electricity.remark'))); ?> : <textarea class="form-control" style="height: auto !important;padding: 10px !important;margin: 10px !important;" type="text" id="remark" name="remark" required></textarea></th>
                            </tr>
                            <tr>
                                <th><button class="btn btn-primary ml-auto btn-actions btn-create" type="submit">SUBMIT</button></th>
                            </tr>
                        </div>
                    </form>

                </tbody>
            </table>
        </div> -->
    </div>





                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices_working\Modules/Admin/Resources/views/sra/electricity.blade.php ENDPATH**/ ?>