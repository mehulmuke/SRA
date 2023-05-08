<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::sra.electiontitle'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('admin::sra.electiontitle'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean(trans('admin::sra.electiontitle'))); ?></h4>

                    </div>
                </div>
                <div class="card-body">
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
                                        <th data-sort><h2><b><?php echo e(clean(trans('admin::sra.election.heading_sims'))); ?></b></h2> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo e(clean(trans('admin::sra.election.voter_id'))); ?> : <?= $election_no ?> </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(clean(trans('admin::sra.election.voter_name'))); ?> : <?= $elector_name ?></td>
                                    </tr>

                                   <?php if($missing_status == 0){?>
                                    <tr>
                                       <td> <button class="btn btn-primary ml-auto btn-actions btn-create" onclick="window.location.href='<?php echo e(route('admin.sra.manualdataelection_missing', ['hid' => $hid])); ?>'">Remark as Missing Document</button></td>
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

                                </tbody>


                            </table>


                    </div>
                        <div class="table-responsive col-sm-4" id="sra-table">
                            <table class="display table table-striped table-hover translations-table">
                                <thead>
                                    <?php
                                        if(isset($election_data[0]) && $election_no != ''){
                                            // print_r($election_data[0]);die;
                                    ?>
                                    <tr>
                                        <th data-sort><h2><b><?php echo e(clean(trans('admin::sra.election.heading_auto'))); ?></b></h2></th>
                                    </tr>
                                <?php } ?>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($election_data[0]) && $election_no != ''){
                                            // print_r($election_data[0]);die;
                                    ?>
                                        <tr>
                                            <td><?php echo e(clean(trans('admin::sra.election.voter_id'))); ?> : <?= $election_data[0]->voter_id ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(clean(trans('admin::sra.election.voter_name'))); ?> : <?= $election_data[0]->elector_name ?></td>                                    </tr>
                                        <tr>
                                            <td><?php echo e(clean(trans('admin::sra.election.constitution_no'))); ?> : <?= $election_data[0]->cont_no ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(clean(trans('admin::sra.election.part_no'))); ?> : <?= $election_data[0]->part_no ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(clean(trans('admin::sra.election.sr_no'))); ?> :  <?= $election_data[0]->sr_no ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(clean(trans('admin::sra.election.pdf'))); ?> : <a href="http://localhost/sraservices/public/pdfs/<?= $file_path ?>" target="_blank"><i class="fa fa-file-pdf"></i></a></td>
                                        </tr>
                                    <?php
                                        }
                                        else{
                                            ?>
                                            
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                      <!--   <div class="table-responsive col-sm-4" id="sra-table">
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

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Admin/Resources/views/sra/election.blade.php ENDPATH**/ ?>