<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Products</h2>
    <ul>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($product->name); ?> - $<?php echo e($product->price); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yanaepowell/Herd/Shoppingcart/resources/views/Products.blade.php ENDPATH**/ ?>