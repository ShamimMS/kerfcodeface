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
                                    <th><?php echo app('translator')->get('Added By'); ?></th>
                                    <?php if(request()->routeIs('doctor.appointment.trashed')): ?>
                                        <th><?php echo app('translator')->get('Trashed By'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('Booking Date'); ?></th>
                                    <th><?php echo app('translator')->get('Time / Serial No'); ?></th>
                                    <th><?php echo app('translator')->get('Payment Status'); ?></th>
                                    <?php if(!request()->routeIs('doctor.appointment.trashed')): ?>
                                        <th><?php echo app('translator')->get('Service'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($appointments->firstItem() + $loop->index); ?></td>
                                        <td>
                                            <span class="fw-bold d-block"> <?php echo e(__($appointment->name)); ?></span>
                                            <?php echo e($appointment->mobile); ?>

                                        </td>
                                        <td> <?php  echo $appointment->addedByBadge;  ?> </td>
                                        <?php if(request()->routeIs('doctor.appointment.trashed')): ?>
                                            <td> <?php  echo $appointment->trashBadge;  ?> </td>
                                        <?php endif; ?>
                                        <td><?php echo e(showDateTime($appointment->booking_date)); ?></td>
                                        <td><?php echo e($appointment->time_serial); ?></td>
                                        <td> <?php  echo $appointment->paymentBadge;  ?> </td>
                                        <?php if(!request()->routeIs('doctor.appointment.trashed')): ?>
                                            <td> <?php  echo $appointment->serviceBadge;  ?> </td>
                                        <?php endif; ?>
                                        <td>
                                            <div class="button--group">
                                                <button class="btn btn-sm btn-outline--primary detailBtn"
                                                    data-route="<?php echo e(route('admin.appointment.dealing', $appointment->id)); ?>"
                                                    data-resourse="<?php echo e($appointment); ?>">
                                                    <i class="las la-desktop"></i> <?php echo app('translator')->get('Details'); ?>
                                                </button>
                                                <?php if(request()->routeIs('doctor.appointment.new')): ?>

                                                    <button type="button"
                                                        class="btn btn-sm btn-outline--danger confirmationBtn"
                                                        <?php if(!$appointment->is_delete && !$appointment->payment_status): ?> ''  <?php else: ?> disabled <?php endif; ?>
                                                        data-action="<?php echo e(route('doctor.appointment.remove', $appointment->id)); ?>"
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

    
    <div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Appointment Details'); ?></h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <ul class="list-group-flush list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            <?php echo app('translator')->get('Patient Name'); ?> :
                            <span class="name"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            <?php echo app('translator')->get('Booking Date'); ?> :
                            <span class="bookingDate"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            <?php echo app('translator')->get('Time or Serial no'); ?> :
                            <span class="timeSerial"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            <?php echo app('translator')->get('Contact No'); ?> :
                            <span class="mobile"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            <?php echo app('translator')->get('E-mail'); ?> :
                            <span class="email"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            <?php echo app('translator')->get('Age'); ?> :
                            <span class="age"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            <?php echo app('translator')->get('Fees'); ?> :
                            <span class="appointment_fees"></span>
                        </li>
                        <li class="list-group-item align-items-center fw-bold">
                            <?php echo app('translator')->get('Disease'); ?> :
                            <p class="disease text-end"></p>
                        </li>
                    </ul>
                    <hr>
                    <div>
                        <p class="text--warning text-center"><i class="las la-exclamation-triangle"></i> <?php echo app('translator')->get('Are you sure that the patient has paid'); ?>?
                        </p>
                        <p class="text-center text--success"><i class="las la-exclamation-triangle"></i> <?php echo app('translator')->get('If yes, then you can mark this as service done'); ?>.
                        </p>
                    </div>
                </div>

                <div class="modal-footer">

                    <form action="" class="dealing-route" method="post">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-outline--success btn-sm serviceDoneBtn"><i
                                class="las la-check"></i> <?php echo app('translator')->get('Done'); ?></button>
                        <button type="button" class="btn btn--dark btn-sm"
                            data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    </form>

                </div>
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

    <a href="<?php echo e(route('doctor.appointment.booking')); ?>" type="button" class="btn btn-sm btn-outline--primary h-45">
        <i class="las la-plus"></i><?php echo app('translator')->get('Make New'); ?>
    </a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";

            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');
                var resourse = $(this).data('resourse');
                $('.name').text(resourse.name);
                $('.email').text(resourse.email);
                $('.mobile').text(resourse.mobile);
                $('.bookingDate').text(resourse.booking_date);
                $('.timeSerial').text(resourse.time_serial);
                $('.age').text(resourse.age);
                $('.appointment_fees').text(resourse.doctor.fees + ' ' + `<?php echo e($general->cur_text); ?>`);
                $('.disease').text(resourse.disease);

                var route = $(this).data('route');
                $('.dealing-route').attr('action', route);

                if (resourse.is_delete == 1 || resourse.is_complete == 1) {
                    modal.find('.serviceDoneBtn').hide();
                } else if (!resourse.is_complete && resourse.payment_status != 2) {
                    modal.find('.serviceDoneBtn').show();
                } else {
                    modal.find('.serviceDoneBtn').show();
                }

                modal.modal('show');
            });

            $('.removeBtn').on('click', function() {
                var modal = $('#removeModal');
                var route = $(this).data('route');
                $('.remove-route').attr('action', route);
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('doctor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/doctor/appointment/index.blade.php ENDPATH**/ ?>