<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <!-- <img src="<?php echo e(asset('storage/' . $property->image_path)); ?>" class="card-img-top" alt="<?php echo e($property->name); ?>" style="max-height: 500px; object-fit: cover;"> -->
                 <img src="<?php echo e(asset('storage/' . $property->image_path)); ?>" ...>
                <div class="card-body">

                    <h1 class="card-title"><?php echo e($property->name); ?></h1>
                    <p class="text-muted"><?php echo e($property->type); ?></p>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="p-3 border rounded">
                                <h5>Price</h5>
                                <p class="mb-0">₹<?php echo e(number_format($property->price)); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 border rounded">
                                <h5>Area</h5>
                                <p class="mb-0"><?php echo e($property->area_sqft); ?> sqft (<?php echo e($area_sqm); ?> sqm)</p>
                            </div>
                        </div>
                    </div>
                    
                    <h3>Address</h3>
                    <p><?php echo e($property->address); ?></p>
                    
                    <h3>Description</h3>
                    <p><?php echo e($property->description); ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Book a Viewing</h3>
                </div>
                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="<?php echo e(route('bookings.store', $property)); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Preferred Date/Time</label>
                            <input type="datetime-local" name="datetime" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Book Viewing</button>
                    </form>
                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/chiragjain/Developer/real-estate/resources/views/properties/show.blade.php ENDPATH**/ ?>