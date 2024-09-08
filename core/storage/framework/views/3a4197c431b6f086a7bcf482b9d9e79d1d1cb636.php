<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-4 mb-30">
            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body">
                    <div class="form-group">
                        <div class="image-upload">
                            <div class="thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview"
                                        style="background-image: url(<?php echo e(getImage(getFilePath('doctorProfile') . '/' . $doctor->image, getFileSize('doctorProfile'))); ?>)">
                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card b-radius--5 overflow-hidden mt-4">
                <div class="card-body p-0">
                    <h3 class="p-3"><?php echo app('translator')->get('My Information'); ?></h3>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Doctor'); ?>
                            <span class="fw-bold"><?php echo e(__($doctor->name)); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Username'); ?>
                            <span class="fw-bold"><?php echo e($doctor->username); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Email'); ?>
                            <span class="fw-bold"><?php echo e($doctor->email); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Status'); ?>
                            <span class="fw-bold"> <?php echo $doctor->statusBadge ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Feature'); ?>
                            <span class="fw-bold"> <?php echo $doctor->featureBadge ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Department'); ?>
                            <span class="fw-bold"> <?php echo e(__($doctor->department->name)); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Location'); ?>
                            <span class="fw-bold"> <?php echo e(__($doctor->location->name)); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Fees'); ?>
                            <span class="fw-bold"> <?php echo e(__($doctor->fees)); ?> <?php echo e($general->cur_text); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 mb-30">
            <form action="<?php echo e(route('doctor.appointment.store', $doctor->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card b-radius--10 overflow-hidden box--shadow1">
                    <div class="card-body p-0">
                        <div class="p-3 bg--white">
                            <div class="widget-two box--shadow2 b-radius--5 bg--white mb-4">
                                <i class="far fa-clock overlay-icon text--primary"></i>
                                <div class="widget-two__icon b-radius--5 bg--primary">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="widget-two__content">
                                    <?php if(($doctor->start_time == null || $doctor->end_time == null) && $doctor->max_serial): ?>
                                        <h3><?php echo e($doctor->max_serial); ?></h3>
                                        <p><?php echo app('translator')->get('Limit of Serial'); ?></p>
                                    <?php elseif($doctor->start_time && $doctor->end_time): ?>
                                        <h3><?php echo e($doctor->start_time); ?> - <?php echo e($doctor->end_time); ?></h3>
                                        <p><?php echo app('translator')->get('Limit Of Time'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-2 date-label"><?php echo app('translator')->get('Select Date'); ?></label>
                                <select name="booking_date" class="form-control" required>
                                    <option selected disabled><?php echo app('translator')->get('Select One'); ?></option>
                                    <?php $__currentLoopData = $availableDate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($date); ?>"><?php echo e(__($date)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <h3 class="py-2"><?php echo app('translator')->get('Available Schedule'); ?></h3>
                            <hr>
                            <div class="time-serial-parent mt-3">
                                <?php $__currentLoopData = $doctor->serial_or_slot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button type="button"
                                        class="btn btn--primary mr-2 mb-2 available-time item-<?php echo e(slug($item)); ?>"
                                        data-value="<?php echo e($item); ?>"><?php echo e(__($item)); ?></button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <input type="hidden" name="time_serial" required>
                        </div>
                    </div>
                </div>
                <div class="card b-radius--10 overflow-hidden box--shadow1 mt-4">
                    <div class="card-body p-0">
                        <div class="row p-3 bg--white">
                            <h3 class="py-2"><?php echo app('translator')->get('Patient Information'); ?></h3>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Full Name'); ?></label>
                                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Age'); ?></label>
                                    <div class="input-group">
                                        <input type="number" name="age" step="any" class="form-control"
                                            value="<?php echo e(old('age')); ?>" required>
                                        <span class="input-group-text">
                                            <?php echo app('translator')->get('Years'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('E-mail'); ?></label>
                                    <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Disease Details'); ?></label>
                                <textarea name="disease" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";

            $(".available-time").on('click', function() {
                $(this).parent('.time-serial-parent').find('.btn--success').removeClass(
                    'btn--success disabled').addClass('btn--primary');

                $('[name=time_serial]').val($(this).data('value'));
                $(this).removeClass('btn--primary');
                $(this).addClass('btn--success disabled');
            })

            function slug(text) {
                return text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            }

            $("select[name=booking_date]").on('change', function() {

                $('.available-time').removeClass('btn--success disabled').addClass('btn--primary');

                let url = "<?php echo e(route('doctor.appointment.available.date')); ?>";
                let data = {
                    date: $(this).val(),
                    doctor_id: '<?php echo e($doctor->id); ?>'
                }

                $.get(url, data, function(response) {
                    if (!response.length) {
                        $('.available-time').removeClass('btn--danger disabled');
                    } else {
                        $.each(response, function(key, value) {
                            var demo = slug(value);
                            $(`.item-${demo}`).addClass('btn--danger disabled');
                        });
                    }
                });
            });

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('doctor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/doctor/appointment/booking.blade.php ENDPATH**/ ?>