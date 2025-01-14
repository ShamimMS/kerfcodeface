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
<?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/partials/appointment_done.blade.php ENDPATH**/ ?>