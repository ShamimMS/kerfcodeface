<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('S.N.'); ?></th>
                                    <th><?php echo app('translator')->get('Image'); ?></th>
                                    <th><?php echo app('translator')->get('Name'); ?></th>
                                    <th><?php echo app('translator')->get('Details'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($departments->firstItem() + $loop->index); ?></td>
                                        <td>
                                            <div class="avatar avatar--md">
                                                <img src="<?php echo e(getImage(getFilePath('department') . '/' . $department->image, getFileSize('department'))); ?>"
                                                    alt="<?php echo app('translator')->get('Image'); ?>">
                                            </div>
                                        </td>
                                        <td><?php echo e(__($department->name)); ?></td>
                                        <td><?php echo e(strLimit(__($department->details), 30)); ?></td>

                                        <td>
                                            <?php
                                                $department->image_with_path = getImage(getFilePath('department') . '/' . $department->image, getFileSize('department'));
                                            ?>

                                            <button type="button" class="btn btn-sm btn-outline--primary editBtn cuModalBtn"
                                                data-resource="<?php echo e($department); ?>" data-modal_title="<?php echo app('translator')->get('Edit Department'); ?>"
                                                data-has_status="1">
                                                <i class="la la-pencil"></i><?php echo app('translator')->get('Edit'); ?>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php if($departments->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo paginateLinks($departments) ?>
                    </div>
                <?php endif; ?>
            </div><!-- card end -->
        </div>
    </div>

    <!--Cu Modal -->
    <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.department.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Image'); ?></label>
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview"
                                                    style="background-image: url(<?php echo e(getImage(getFilePath('department'), getFileSize('department'))); ?>)">
                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1"
                                                    accept=".png, .jpg, .jpeg" required>
                                                <label for="profilePicUpload1" class="bg--success"><?php echo app('translator')->get('Upload Image'); ?></label>
                                                <small class="mt-2 "><?php echo app('translator')->get('Supported files'); ?>:
                                                    <b><?php echo app('translator')->get('png'); ?>,<?php echo app('translator')->get('jpg'); ?>,<?php echo app('translator')->get('jpeg'); ?>.</b>
                                                    <?php echo app('translator')->get('Image will be resized into'); ?> <?php echo e(getFileSize('department')); ?> </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Name'); ?></label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Details'); ?></label>
                                    <textarea name="details" rows="10" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary h-45 w-100"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

    <button type="button" class="btn btn-sm btn-outline--primary h-45 cuModalBtn" data-modal_title="<?php echo app('translator')->get('Add New Department'); ?>"> <i class="las la-plus"></i><?php echo app('translator')->get('Add New'); ?>
    </button>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";

            $('.editBtn').on('click', function() {
                $('#cuModal').find('[name=image]').removeAttr('required');
                $('#cuModal').find('[name=image]').closest('.form-group').find('label').first().removeClass('required');
            });

            var placeHolderImage = "<?php echo e(getImage(getFilePath('department'), getFileSize('department'))); ?>";

            $('#cuModal').on('hidden.bs.modal', function() {
                $('#cuModal').find('.profilePicPreview').css({
                    'background-image' : `url(${placeHolderImage})`
                });
                $('#cuModal').find('[name=image]').attr('required', 'required');
                $('#cuModal').find('[name=image]').closest('.form-group').find('label').first().addClass('required');
            });

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u549211671/domains/cfuat.in/public_html/kerfapthost/core/resources/views/admin/department/index.blade.php ENDPATH**/ ?>