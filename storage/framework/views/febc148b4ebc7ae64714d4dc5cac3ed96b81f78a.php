<style>
 th, td {
  font-size: 18px !important;
  font-family: 'Times New Roman', Times, serif !important;
 
}
div label {
    color: #495057 !important;
    font-size: 18px !important;
}
</style>


<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::sra.uplodemissingdocument'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('admin::sra.uplodemissingdocument'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>
<?php $__env->startSection('content'); ?>
<div class="table-responsive" id="sra-table" >
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
                                      <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <td><?php echo e($data->ClusterId); ?></td>
                                        <td><?php echo e($data->HUTSURVERYID); ?></td>
                                        <?php $hid = $data->HUTSURVERYID ?>
                                        
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
    <div class="rows" style="display:flex">
        <div class="table-responsive col-sm-4" id="sra-table">
            <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('admin.sra.storemissingdocument')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="hut_id" name="hut_id" value="<?= $hut_id ?>" required>

                <div class="form-group">
                    <label>Category ID:</label>
                    <div class="checkbox-options">
                        <?php foreach ($category_options as $option) { ?>
                        <div class="checkbox-option">
                            <input type="checkbox" id="<?= $option ?>" name="category_id[]" value="<?= $option ?>">
                            <label for="<?= $option ?>"><?= $option ?></label>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="year">Year:</label>
                    <select id="year" name="year" required>
                        <?php foreach ($year_options as $option) { ?>
                            <option value="<?= $option ?>"><?= $option ?></option>
                        <?php } ?>
                    </select>
                </div> -->

                <div style='display:none;' id='voterIDdiv'>
                    <div class="card">
                        <div class="card-body">
                            <h3>Election Details</h3>
                            <div class="form-group">
                                <label for='voter_id'>Voter ID: </label>
                                <input class='form-control' type='text' name='voter_id' id='voter_id'>
                            </div>
                            <div class="form-group">
                                <label for='voter_name'>Voter Name: </label>
                                <input class='form-control' type='text' name='voter_name' id='voter_name'>
                            </div>
                            <div class="form-group">
                                <label for='constitution_no'>Constitution No.: </label>
                                <input class='form-control' type='text' name='constitution_no' id='constitution_no'>
                            </div>

                            <div class="form-group">
                                <label for='voting_srno'>Sr No: </label>
                                <input class='form-control' type='text' name='voting_srno' id='voting_srno'>
                            </div>

                            <div class="form-group">
                                <label for='part_no'>Part No.: </label>
                                <input class='form-control' type='text' name='part_no' id='part_no'>
                            </div>

                            <div class="form-group">
                                <label for='voting_add'>Address: </label>
                                <input class='form-control' type='text' name='voting_add' id='voting_add'>
                            </div>
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <select id="el_year" name="el_year" required>
                                    <?php foreach ($year_options as $option) { ?>
                                    <option value="<?= $option ?>"><?= $option ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div style='display:none;' id='Electirictydiv'>
                    <div class="card">
                        <div class="card-body">
                            <h3>Electricity Details</h3>

                            <div class="form-group">
                                <label for='elector_name'> Name: </label>
                                <input class='form-control' type='text' name='elector_name' id='elector_name'>
                            </div>
                            <div class="form-group">
                                <label for='elector_ca'> CA No: </label>
                                <input class='form-control' type='text' name='elector_ca' id='elector_ca'>
                            </div>
                            <div class="form-group">
                                <label for='bill_date'>Bill date: </label>
                                <input class='form-control' type='date' name='bill_date' id='bill_date'>
                            </div>
                            <div class="form-group">
                                <label for='elector_address'> Address: </label>
                                <!-- <input class='form-control' type='text' name='voter_id' id='voter_id'> -->
                                <textarea class='form-control' name='elector_address' id='elector_address'></textarea>
                            </div>
                            <div class="form-group">
                                <label for='category'>Category: </label>
                                <input class='form-control' type='text' name='category' id='category'>
                            </div>
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <select id="ec_year" name="ec_year" required>
                                    <?php foreach ($year_options as $option) { ?>
                                    <option value="<?= $option ?>"><?= $option ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div style='display:none;' id='photopassdiv'>
                    <div class="card">
                        <div class="card-body">
                            <h3>Photo Pass Details</h3>

                            <div class="form-group">
                                <label class='form-control' for='survey_receipt_no'>Survey Receipt No: </label>
                                <input class='form-control' type='text' name='survey_receipt_no'
                                    id='survey_receipt_no'>
                            </div>
                            <div class="form-group">
                                <label class='form-control' for='name_as_per_survey_receipt'>Name as per Survey Receipt:
                                </label>
                                <input class='form-control' type='text' name='name_as_per_survey_receipt'
                                    id='name_as_per_survey_receipt'>
                            </div>
                            <div class="form-group">
                                <label class='form-control' for='address_as_per_survey_receipt'>Address as per Survey
                                    Receipt: </label>
                                <textarea class='form-control' name='address_as_per_survey_receipt' id='address_as_per_survey_receipt'></textarea>
                            </div>
                            <div class="form-group">
                                <label class='form-control' for='usage_type_of_hut'>Usage/type of the hut as per Survey
                                    Receipt: </label>
                                <input class='form-control' type='text' name='usage_type_of_hut'
                                    id='usage_type_of_hut'>
                            </div>
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <select id="year" name="year" required>
                                    <?php foreach ($year_options as $option) { ?>
                                    <option value="<?= $option ?>"><?= $option ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div style='display:none;' id='gumastadiv'>
                    <div class="card">
                        <div class="card-body">
                            <h3>Gumasta Details</h3>

                            <div class="form-group">
                                <label for='license_number'>License Number: </label>
                                <input class='form-control' type='text' name='license_number' id='license_number'>
                            </div>
                            <div class="form-group">
                                <label for='license_issue_date'>License issue date: </label>
                                <input class='form-control' type='date' name='license_issue_date'
                                    id='license_issue_date'>
                            </div>
                            <div class="form-group">
                                <label for='owner_org_name'>Name of the Owner: </label>
                                <input class='form-control' type='text' name='owner_name' id='owner_name'>
                            </div>
                            <div class="form-group">
                                <label for='owner_org_name'>Name of the Organization: </label>
                                <input class='form-control' type='text' name='organization_name'
                                    id='organization_name'>
                            </div>
                            <div class="form-group">
                                <label for='address'> Address: </label>
                                <!-- <input class='form-control' type='text' name='voter_id' id='voter_id'> -->
                                <textarea class='form-control' name='address' id='address'></textarea>
                            </div>
                            <div class="form-group">
                                <label for='valid_upto'>License valid Up to: </label>
                                <input class='form-control' type='date' name='valid_upto' id='valid_upto'>
                            </div>
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <select id="g_year" name="g_year" required>
                                    <?php foreach ($year_options as $option) { ?>
                                    <option value="<?= $option ?>"><?= $option ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div style='display:none;' id='agreementdiv'>
                    <div class="card">
                        <div class="card-body">
                            <h3>Agreement Details</h3>
                            <div class="form-group">
                                <label for='sr_no'>SR Number: </label>
                                <input class='form-control' type='text' name='sr_no' id='sr_no'>
                            </div>
                            <div class="form-group">
                                <label for='document'>Document: </label>
                                <input class='form-control' type='text' name='document' id='document'>
                            </div>
                            <div class="form-group">
                                <label for='aggrement_date'>Agreement date: </label>
                                <input class='form-control' type='date' name='aggrement_date' id='aggrement_date'>
                            </div>
                            <div class="form-group">
                                <label for='seller_name'>Seller Name: </label>
                                <input class='form-control' type='text' name='seller_name' id='seller_name'>
                            </div>
                            <div class="form-group">
                                <label for='purchaser_name'> Purchaser Name: </label>
                                <!-- <input class='form-control' type='text' name='voter_id' id='voter_id'> -->
                                <input class='form-control' type='text' name='purchaser_name' id='purchaser_name'>

                                <!-- <textarea class='form-control' name='purchaser_name' id='purchaser_name'></textarea> -->
                            </div>
                            <div class="form-group">
                                <label for='relationship'>Relationship: </label>
                                <input class='form-control' type='text' name='relationship' id='relationship'>
                            </div>
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <select id="ag_year" name="ag_year" required>
                                    <?php foreach ($year_options as $option) { ?>
                                    <option value="<?= $option ?>"><?= $option ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Adhar card -->
        <div style='display:none;' id='adhardiv'>
                    <div class="card">
                        <div class="card-body">
                            <h3>Aadhar Details</h3>
                            <div class="form-group">
                                <label for='uid'>UID: </label>
                                <input class='form-control' type='text' name='uid' id='uid'>
                            </div>
                            <div class="form-group">
                                <label for='name'>Name : </label>
                                <input class='form-control' type='text' name='name' id='name'>
                            </div>
                            <div class="form-group">
                                <label for='dob'>DOB: </label>
                                <input class='form-control' type='text' name='dob' id='dob' placeholder="DD/MM/YYYY">
                            </div>
                            <div class="form-group">
                                <label for='address'>Address: </label>
                                <input class='form-control' type='text' name='address' id='address'>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <label for="document_type">Others:</label>
                <select id="document_type" name="document_type">
                    <option value="">Select Option</option>
                    <option value="passbook">Passbook</option>
                    <option value="tax_copy">Tax Copy</option>
                    <option value="bank_document">Bank Document</option>
                </select>
            </div>
            <div class="form-group" style="display:none;" id="upload_section">
                <label for="document_file">Upload Document:</label>
                <input type="file" id="document_file" name="document_file">
            </div>
            <script>
                var documentType = document.getElementById('document_type');
                var uploadSection = document.getElementById('upload_section');

                documentType.addEventListener('change', function() {
                    if (this.value === 'passbook' || this.value === 'tax_copy' || this.value === 'bank_document') {
                        uploadSection.style.display = 'block';
                    } else {
                        uploadSection.style.display = 'none';
                    }
                });
            </script>


                <?php foreach ($category_options as $option) { 
                if($option == 'Registeration Agreement'){
                    ?>
                <div class="form-group">
                    <label for="<?= $option ?>-image" id="<?= $option ?>-label" class="image-label"
                        style="display:none;"><?= $option ?> Images:</label>
                    <input class="form-control" type="file" id="<?= $option ?>-image" name="<?= $option ?>_image[]"
                        accept="image/*" class="category-image" multiple style="display:none;">
                </div>

                <?php 
                }
                elseif($option == 'Aadhar'){
                    ?>
                <div class="form-group">
                    <label for="<?= $option ?>-image" id="<?= $option ?>-label" class="image-label"
                        style="display:none;"><?= $option ?> Images:</label>
                    <input class="form-control" type="file" id="<?= $option ?>-image" name="<?= $option ?>_image[]"
                        accept="image/*" class="category-image" multiple style="display:none;">
                </div>

                <?php 
                }
                
                else{?>
                <div class="form-group">
                    <label for="<?= $option ?>-image" id="<?= $option ?>-label" class="image-label"
                        style="display:none;"><?= $option ?> Image:</label>
                    <input class='form-control' type="file" id="<?= $option ?>-image" name="<?= $option ?>_image"
                        accept="image/*" class="category-image" style="display:none;">
                </div>
                <?php }
        } ?>

       
            

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


            <script>
                // Get all category checkboxes and image inputs
                var categoryCheckboxes = document.querySelectorAll("input[name='category_id[]']");
                var imageInputs = document.querySelectorAll(".category-image");
                var imageLabels = document.querySelectorAll(".image-label");

                // Add an event listener to each category checkbox
                categoryCheckboxes.forEach(function(checkbox) {
                    checkbox.addEventListener("change", function() {
                        var imageInputId = document.getElementById(this.id + '-image');
                        var imageInputlabel = document.getElementById(this.id + '-label');
                        var voterId = document.getElementById('voterIDdiv');
                        var Electiricty = document.getElementById('Electirictydiv');
                        var photopass = document.getElementById('photopassdiv');
                        var gumasta = document.getElementById('gumastadiv');
                        var agreement = document.getElementById('agreementdiv');
                        var adhar = document.getElementById('adhardiv');




                        if (this.checked) {

                            if (this.id == 'Voting Card') {
                                voterId.style.display = 'block';
                            }
                            if (this.id == 'Lightbill') {
                                Electiricty.style.display = 'block';
                            }
                            if (this.id == 'Photo pass') {
                                photopass.style.display = 'block';
                            }
                            if (this.id == 'Gumasta') {
                                gumasta.style.display = 'block';
                            }
                            if (this.id == 'Registeration Agreement') {
                                agreement.style.display = 'block';
                            }
                            if (this.id == 'Aadhar') {
                                adhar.style.display = 'block';
                            }
                            imageInputId.style.display = 'block';
                            imageInputlabel.style.display = 'block';
                            
                        } else {

                            if (this.id == 'Voting Card') {
                                voterId.style.display = 'none';
                            }
                            if (this.id == 'Lightbill') {
                                Electiricty.style.display = 'none';
                            }
                            if (this.id == 'Photo pass') {
                                photopass.style.display = 'none';
                            }
                            if (this.id == 'Gumasta') {
                                gumasta.style.display = 'none';
                            }
                            if (this.id == 'Registeration Agreement') {
                                agreement.style.display = 'none';
                            }
                            if (this.id == 'Aadhar') {
                                adhar.style.display = 'none';
                            }
                            imageInputId.style.display = 'none';
                            imageInputlabel.style.display = 'none';
                        }
                    });
                });
            </script>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/sra/uplodemissingdocument.blade.php ENDPATH**/ ?>