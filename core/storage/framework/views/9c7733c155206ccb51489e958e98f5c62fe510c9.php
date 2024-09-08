<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('S.N.'); ?></th>
                                    <th><?php echo app('translator')->get('Patient'); ?> | <?php echo app('translator')->get('Mobile'); ?></th>
                                    <th><?php echo app('translator')->get('Doctor'); ?></th>
                                    <th><?php echo app('translator')->get('Added By'); ?></th>
                                    <?php if(request()->routeIs('admin.appointment.trashed')): ?>
                                        <th><?php echo app('translator')->get('Trashed By'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('Booking Date'); ?></th>
                                    <th><?php echo app('translator')->get('Time / Serial No'); ?></th>
                                    <th><?php echo app('translator')->get('Payment Status'); ?></th>
                                    <?php if(!request()->routeIs('admin.appointment.trashed')): ?>
                                        <th><?php echo app('translator')->get('Service'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($appointments->firstItem() + $loop->index); ?></td>
                                        <td> <span class="fw-bold d-block"> <?php echo e(__($appointment->name)); ?></span>
                                            <?php echo e($appointment->mobile); ?> </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.doctor.detail', $appointment->doctor_id)); ?>">
                                                <?php echo e(__($appointment->doctor->name)); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <?php if($appointment->added_staff_id): ?>
                                                <a href="<?php echo e(route('admin.staff.detail', $appointment->staff->id)); ?>"><?php echo e(__(@$appointment->staff->name)); ?></a>
                                                 <br> <span
                                                    class="text--small badge badge--primary"><?php echo app('translator')->get('Staff'); ?></span>
                                            <?php elseif($appointment->added_assistant_id): ?>
                                                <a href="<?php echo e(route('admin.assistant.detail', $appointment->assistant->id)); ?>"> <?php echo e(__(@$appointment->assistant->name)); ?></a>
                                                <br> <span
                                                    class="text--small badge badge--dark"><?php echo app('translator')->get('Assistant'); ?></span>
                                            <?php elseif($appointment->added_doctor_id): ?>
                                               <a href="<?php echo e(route('admin.doctor.detail', $appointment->doctor->id)); ?>"> <?php echo e(__(@$appointment->doctor->name)); ?></a> <br> <span
                                                    class="text--small badge badge--success"><?php echo app('translator')->get('Doctor'); ?></span>
                                            <?php elseif($appointment->added_admin_id): ?>
                                                <?php echo e(__(@$appointment->admin->name)); ?> <br> <span
                                                    class="text--small badge badge--primary"><?php echo app('translator')->get('Admin'); ?></span>
                                            <?php elseif($appointment->site): ?>
                                                <span class="text--small badge badge--info"><?php echo app('translator')->get('Site'); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <?php if(request()->routeIs('admin.appointment.trashed')): ?>
                                            <td>
                                                <?php if($appointment->delete_by_admin): ?>
                                                    <span class="text--small badge badge--primary"><?php echo app('translator')->get('Admin'); ?></span>
                                                <?php elseif($appointment->delete_by_staff): ?>
                                                    <a href="<?php echo e(route('admin.staff.detail', $appointment->deletedByStaff->id)); ?>"> <?php echo e(__($appointment->deletedByStaff->name)); ?></a>
                                                    <br>
                                                    <span class="text--small badge badge--dark"><?php echo app('translator')->get('Staff'); ?></span>
                                                <?php elseif($appointment->delete_by_assistant): ?>
                                                    <a href="<?php echo e(route('admin.assistant.detail', $appointment->deletedByAssistant->id)); ?>"> <?php echo e(__($appointment->deletedByAssistant->name)); ?></a>
                                                    <br>
                                                    <span class="text--small badge badge--success"><?php echo app('translator')->get('Assistant'); ?></span>
                                                <?php elseif($appointment->delete_by_doctor): ?>
                                                    <a href="<?php echo e(route('admin.doctor.detail', $appointment->deletedByDoctor->id)); ?>"> <?php echo e(__($appointment->deletedByDoctor->name)); ?></a>
                                                    <br>
                                                    <span class="text--small badge badge--info"><?php echo app('translator')->get('Doctor'); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <span class="fw-bold"><?php echo e(showDateTime($appointment->booking_date, 'y-m-d')); ?></span>
                                        </td>
                                        <td><?php echo e($appointment->time_serial); ?></td>
                                        <td> <?php  echo $appointment->paymentBadge;  ?> </td>
                                        <?php if(!request()->routeIs('admin.appointment.trashed')): ?>
                                            <td> <?php  echo $appointment->serviceBadge;  ?> </td>
                                        <?php endif; ?>

                                        <td>
                                            <div class="button--group">
                                                <button class="btn btn-sm btn-outline--primary detailBtn"
                                                    data-route="<?php echo e(route('admin.appointment.dealing', $appointment->id)); ?>"
                                                    data-resourse="<?php echo e($appointment); ?>">
                                                    <i class="las la-desktop"></i> <?php echo app('translator')->get('Details'); ?>
                                                </button>

                                                <?php if(request()->routeIs('admin.appointment.new')): ?>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline--danger confirmationBtn"
                                                        <?php if(!$appointment->is_delete && !$appointment->payment_status): ?> ''  <?php else: ?> disabled <?php endif; ?>
                                                        data-action="<?php echo e(route('admin.appointment.remove', $appointment->id)); ?>"
                                                        data-question="<?php echo app('translator')->get('Are you sure to remove this appointment'); ?>?">
                                                        <i class="la la-trash"></i> <?php echo app('translator')->get('Trash'); ?>
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
                <?php if($appointments->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo paginateLinks($appointments) ?>
                    </div>
                <?php endif; ?>
            </div><!-- card end -->
        </div>
    </div>

    <?php echo $__env->make('partials.appointment_done', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
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

    <a href="<?php echo e(route('admin.appointment.form')); ?>" type="button" class="btn btn-sm btn-outline--primary h-45">
        <i class="las la-plus"></i><?php echo app('translator')->get('Make New'); ?>
    </a>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/admin/appointment/index.blade.php ENDPATH**/ ?>