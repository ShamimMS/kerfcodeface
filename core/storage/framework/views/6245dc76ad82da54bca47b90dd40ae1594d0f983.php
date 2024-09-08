<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Doctor'); ?></th>
                                    <th><?php echo app('translator')->get('Login at'); ?></th>
                                    <th><?php echo app('translator')->get('IP'); ?></th>
                                    <th><?php echo app('translator')->get('Location'); ?></th>
                                    <th><?php echo app('translator')->get('Browser | OS'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $loginLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <span class="fw-bold"><?php echo e(@$log->doctor->name); ?></span>
                                            <br>
                                            <span class="small"> <a
                                                    href="<?php echo e(route('admin.doctor.detail', $log->doctor_id)); ?>"><span>@</span><?php echo e(@$log->doctor->username); ?></a>
                                            </span>
                                        </td>
                                        <td>
                                            <?php echo e(showDateTime($log->created_at)); ?> <br> <?php echo e(diffForHumans($log->created_at)); ?>

                                        </td>
                                        <td><?php echo e($log->doctor_ip); ?> </td>
                                        <td><?php echo e(__($log->city)); ?> <br> <?php echo e(__($log->country)); ?></td>
                                        <td>
                                            <?php echo e(__($log->browser)); ?> <br> <?php echo e(__($log->os)); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <?php if($loginLogs->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($loginLogs)); ?>

                    </div>
                <?php endif; ?>
            </div><!-- card end -->
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-form','data' => ['placeholder' => 'Search here']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Search here']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/admin/doctor/logins.blade.php ENDPATH**/ ?>