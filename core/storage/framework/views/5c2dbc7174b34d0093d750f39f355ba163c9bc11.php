<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-flex p-3 bg--primary align-items-center">
                        <div class="avatar avatar--lg">
                            <img src="<?php echo e(getImage(getFilePath('doctorProfile').'/'. $doctor->image,getFileSize('doctorProfile'))); ?>" alt="<?php echo app('translator')->get('Image'); ?>">
                        </div>
                        <div class="ps-3">
                            <h4 class="text--white"><?php echo e(__($doctor->name)); ?></h4>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Name'); ?>
                            <span class="fw-bold"><?php echo e(__($doctor->name)); ?></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Username'); ?>
                            <span  class="fw-bold"><?php echo e(__($doctor->username)); ?></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Email'); ?>
                            <span  class="fw-bold"><?php echo e($doctor->email); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Mobile'); ?>
                            <span  class="fw-bold"><?php echo e($doctor->mobile); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Department'); ?>
                            <span  class="fw-bold"><?php echo e($doctor->department->name); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Location'); ?>
                            <span  class="fw-bold"><?php echo e($doctor->location->name); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Qualification'); ?>
                            <span  class="fw-bold"><?php echo e($doctor->qualification); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Fees'); ?>
                            <span  class="fw-bold"><?php echo e($doctor->fees); ?> <?php echo e(__($general->cur_text)); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-50 border-bottom pb-2"><?php echo app('translator')->get('Profile Information'); ?></h5>

                    <form action="<?php echo e(route('doctor.info.profile.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row d-flex justify-content-center items-center">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview" style="background-image: url(<?php echo e(getImage(getFilePath('doctorProfile').'/'.$doctor->image,getFileSize('doctorProfile'))); ?>)">
                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success"><?php echo app('translator')->get('Upload Image'); ?></label>
                                                <small class="mt-2  "><?php echo app('translator')->get('Supported files'); ?>: <b><?php echo app('translator')->get('jpeg'); ?>, <?php echo app('translator')->get('jpg'); ?>.</b> <?php echo app('translator')->get('Image will be resized into 400x400px'); ?> </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn--primary h-45 w-100"><?php echo app('translator')->get('Submit'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="<?php echo e(route('doctor.password')); ?>" class="btn btn-sm btn-outline--primary"><i class="las la-key"></i><?php echo app('translator')->get('Password Setting'); ?></a>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('doctor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/doctor/info/profile.blade.php ENDPATH**/ ?>