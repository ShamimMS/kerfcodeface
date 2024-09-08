<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Doctor'); ?></th>
                                    <th><?php echo app('translator')->get('Mobile | Email'); ?></th>
                                    <th><?php echo app('translator')->get('Joined At'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <span class="fw-bold"><?php echo e($item->name); ?></span>
                                            <br>
                                            <small>
                                                <a href="<?php echo e(route('admin.staff.detail', $item->id)); ?>"><span>@</span><?php echo e($item->username); ?></a>
                                            </small>
                                        </td>

                                        <td><span class="d-block fw-bold"><?php echo e($general->country_code . $item->mobile); ?></span> <?php echo e($item->email); ?></td>
                                        <td>
                                            <?php echo e(showDateTime($item->created_at)); ?> <br>
                                            <?php echo e(diffForHumans($item->created_at)); ?>

                                        </td>

                                        <td> <?php echo $item->statusBadge ?> </td>
                                        <td>
                                            <div class="button--group">
                                                <a href="<?php echo e(route('admin.staff.detail', $item->id)); ?>"
                                                    class="btn btn-sm btn-outline--primary">
                                                    <i class="las la-desktop"></i> <?php echo app('translator')->get('Details'); ?>
                                                </a>

                                                <?php if($item->status == Status::ACTIVE): ?>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline--danger confirmationBtn"
                                                        data-action="<?php echo e(route('admin.staff.status', $item->id)); ?>"
                                                        data-question="<?php echo app('translator')->get('Are you sure to Inactive this staff?'); ?>">
                                                        <i class="la la-eye-slash"></i> <?php echo app('translator')->get('Inactive'); ?>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline--success ms-1 confirmationBtn"
                                                        data-action="<?php echo e(route('admin.staff.status', $item->id)); ?>"
                                                        data-question="<?php echo app('translator')->get('Are you sure to Active this staff?'); ?>">
                                                        <i class="la la-eye"></i> <?php echo app('translator')->get('Active'); ?>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
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
                <?php if($staff->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($staffs)); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b = $component; } ?>
<?php $component = App\View\Components\ConfirmationModal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ConfirmationModal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b)): ?>
<?php $component = $__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b; ?>
<?php unset($__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <a href="<?php echo e(route('admin.staff.form')); ?>" type="button" class="btn btn-sm btn-outline--primary h-45">
        <i class="las la-plus"></i><?php echo app('translator')->get('Add New'); ?>
    </a>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/admin/staff/index.blade.php ENDPATH**/ ?>