<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="mb-4">Available Properties</h1>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="<?php echo e(route('properties.index')); ?>" class="row g-3">
                <div class="col-md-5">
                    <select name="type" class="form-select">
                        <option value="">All Types</option>
                        <option value="Flat" <?php echo e(request('type') == 'Flat' ? 'selected' : ''); ?>>Flat</option>
                        <option value="Villa" <?php echo e(request('type') == 'Villa' ? 'selected' : ''); ?>>Villa</option>
                        <option value="Plot" <?php echo e(request('type') == 'Plot' ? 'selected' : ''); ?>>Plot</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="number" name="min_price" placeholder="Min Price" class="form-control" value="<?php echo e(request('min_price')); ?>">
                </div>
                <div class="col-md-5">
                    <input type="number" name="max_price" placeholder="Max Price" class="form-control" value="<?php echo e(request('max_price')); ?>">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="<?php echo e(route('properties.index')); ?>" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 property-card">
                <!-- <img src="<?php echo e(asset('storage/' . $property->image_path)); ?>" class="card-img-top" alt="<?php echo e($property->name); ?>" style="height: 200px; object-fit: cover;"> -->
                <img src="<?php echo e(asset('storage/' . $property->image_path)); ?>" ...>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($property->name); ?></h5>
                    <p class="card-text">
                        <strong>Type:</strong> <?php echo e($property->type); ?><br>
                        <strong>Price:</strong> ₹<?php echo e(number_format($property->price)); ?><br>
                        <strong>Area:</strong> <?php echo e($property->area_sqft); ?> sqft
                    </p>
                    <a href="<?php echo e(route('properties.show', $property)); ?>" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="alert alert-info">No properties found.</div>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="d-flex justify-content-center">
        <?php echo e($properties->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/chiragjain/Developer/real-estate/resources/views/properties/index.blade.php ENDPATH**/ ?>