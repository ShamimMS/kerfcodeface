<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.doctor.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Image'); ?></label>
                                        <div class="image-upload">
                                            <div class="thumb">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview"
                                                        style="background-image: url(<?php echo e(getImage(getFilePath('doctorProfile') . '/' . @$doctor->image, getFileSize('doctorProfile'))); ?>)">
                                                        <button type="button" class="remove-image"><i
                                                                class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="avatar-edit mt-0">
                                                    <input type="file" class="profilePicUpload" name="image"
                                                        id="profilePicUpload1" accept=".png, .jpg, .jpeg" required>
                                                    <label for="profilePicUpload1"
                                                        class="btn btn--success btn-block btn-lg"><?php echo app('translator')->get('Upload'); ?></label>
                                                    <small><?php echo app('translator')->get('Support Images'); ?>:
                                                        <b><?php echo app('translator')->get('jpeg'); ?>, <?php echo app('translator')->get('jpg'); ?>.</b> <?php echo app('translator')->get(', resized into 400x400px'); ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Name'); ?></label>
                                            <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                                                class="form-control " required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Username'); ?></label>
                                            <input type="text" name="username" value="<?php echo e(old('username')); ?>"
                                                class="form-control " required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('E-mail'); ?></label>
                                            <input type="text" name="email" value="<?php echo e(old('email')); ?>"
                                                class="form-control " required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo app('translator')->get('Mobile'); ?>
                                                <i class="fa fa-info-circle text--primary" title="<?php echo app('translator')->get('Add the country code by general setting. Otherwise, SMS won\'t send to that number.'); ?>">
                                                </i>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><?php echo e($general->country_code); ?></span>
                                                <input type="number" name="mobile" value="<?php echo e(old('mobile')); ?>"
                                                    class="form-control" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group select2-wrapper" id="select2-wrapper-one">
                                            <label><?php echo app('translator')->get('Department'); ?></label>
                                            <select class="select2-basic-one form-control" name="department" required>
                                                <option disabled selected><?php echo app('translator')->get('Select One'); ?></option>
                                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($department->id == @$doctor->department_id): echo 'selected'; endif; ?> value="<?php echo e($department->id); ?>">
                                                        <?php echo e(__($department->name)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group select2-wrapper" id="select2-wrapper-two">
                                            <label><?php echo app('translator')->get('Location'); ?></label>
                                            <select class="select2-basic-two form-control" name="location" required>
                                                <option disabled selected><?php echo app('translator')->get('Select One'); ?></option>
                                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($location->id == @$doctor->location_id): echo 'selected'; endif; ?> value="<?php echo e($location->id); ?>">
                                                        <?php echo e(__($location->name)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> <?php echo app('translator')->get('Fees'); ?></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><?php echo e($general->cur_sym); ?></span>
                                                <input type="number" name="fees" value="<?php echo e(old('fees')); ?>"
                                                    class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> <?php echo app('translator')->get('Qualification'); ?></label>
                                            <input type="text" name="qualification" value="<?php echo e(old('qualification')); ?>"
                                                class="form-control" required />

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> <?php echo app('translator')->get('Address'); ?></label>
                                            <textarea name="address" class="form-control" required><?php echo e(old('address')); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> <?php echo app('translator')->get('About'); ?></label>
                                    <textarea name="about" class="form-control" required><?php echo e(old('about')); ?></textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="<?php echo e(route('admin.doctor.index')); ?>" class="btn btn-sm btn-outline--primary"><i class="la la-undo"></i>
        <?php echo app('translator')->get('Back'); ?> </a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            'use strict';
            $('.select2-basic-one').select2({
                dropdownParent: $('#select2-wrapper-one')
            });
            $('.select2-basic-two').select2({
                dropdownParent: $('#select2-wrapper-two')
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .select2-wrapper {
            position: relative;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/admin/doctor/form.blade.php ENDPATH**/ ?>