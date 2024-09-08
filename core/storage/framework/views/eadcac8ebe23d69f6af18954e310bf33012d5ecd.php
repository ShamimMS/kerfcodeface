<?php $__env->startSection('panel'); ?>
<div class="row mb-none-30">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.appointment.book.details')); ?>">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Select Doctor'); ?></label>
                            <select name="doctor_id" class="select2-basic" required>
                                <option selected disabled><?php echo app('translator')->get('Select One'); ?></option>
                                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-resourse="<?php echo e($item); ?>" value="<?php echo e($item->id); ?>"><?php echo e(__($item->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="alert alert-warning d-flex align-items-center p-3" role="alert">
                            <i class="las la-exclamation-circle"></i>
                            <small>
                                <?php echo app('translator')->get('This appointment service must be paid in cash.'); ?>
                            </small>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/admin/appointment/form.blade.php ENDPATH**/ ?>