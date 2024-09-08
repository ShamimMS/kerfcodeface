<?php $__env->startSection('content'); ?>
    <div class="page-wrapper default-version">
        <?php echo $__env->make('doctor.partials.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('doctor.partials.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="body-wrapper">
            <div class="bodywrapper__inner">
                <?php echo $__env->make('doctor.partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('panel'); ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('doctor.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/doctor/layouts/app.blade.php ENDPATH**/ ?>