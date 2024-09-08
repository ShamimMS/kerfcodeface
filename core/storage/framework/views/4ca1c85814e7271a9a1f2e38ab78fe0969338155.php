<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="<?php echo e(route('doctor.info.speciality.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="payment-method-item">
                                    <div class="payment-method-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card border--primary mt-3">
                                                    <div class="card-header bg--primary d-flex justify-content-between">
                                                        <h5 class="text-white"><?php echo app('translator')->get('Speciality'); ?></h5>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-light float-end add-speciality-data">
                                                            <i class="la la-fw la-plus"></i><?php echo app('translator')->get('Add New'); ?></button>
                                                    </div>
                                                </div>
                                                <div class="card-body addedField">
                                                    <?php if($specialities != null || !empty($specialities)): ?>
                                                        <?php $__empty_1 = true; $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <div class="row align-items-center speciality-data">
                                                                <div class="col-xl-11">
                                                                    <div class="form-group">
                                                                        <div class="input-group mb-md-0 mb-4">
                                                                            <div class="col-md-12 p-0">
                                                                                <label> <?php echo app('translator')->get('Enter Speciality'); ?></label>
                                                                                <input type="text" class="form-control"
                                                                                    value="<?php echo e($speciality); ?>"
                                                                                    name="speciality[]" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-1 mt-md-0 mt-2 text-right">
                                                                    <span class="input-group-btn">
                                                                        <button
                                                                            class="btn btn--danger btn-lg removeBtn removeBtn--style w-100"
                                                                            type="button">
                                                                            <i class="fa fa-times mr-0"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <span class="text-center"><?php echo app('translator')->get('Data not found'); ?></span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer  <?php if(!$specialities): ?> d-none <?php endif; ?>">
                        <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .removeBtn--style {
            margin-top: 10px;
        }

        @media(max-width: 1199px) {
            .removeBtn--style {
                margin-bottom: 15px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';

        (function($) {
            $('.add-speciality-data').on('click', function() {
                var html = `<div class="row align-items-center speciality-data">
                    <div class="col-md-11 mt-4">
                        <div class="form-group">
                            <input name="speciality[]" class="form-control" type="text" placeholder="<?php echo app('translator')->get('Enter your special skill'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-1 mt-md-0 text-right">
                            <button class="btn btn--danger removeBtn removeBtn--style w-100 h-45" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                    </div>
                </div>`;
                $('.addedField').append(html)
            });

            $(document).on('click', '.removeBtn', function() {
                $(this).closest('.speciality-data').remove();
            });


            $('.add-speciality-data').on('click', function(){
                $('.card-footer').removeClass('d-none')
            })

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('doctor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/doctor/info/speciality.blade.php ENDPATH**/ ?>