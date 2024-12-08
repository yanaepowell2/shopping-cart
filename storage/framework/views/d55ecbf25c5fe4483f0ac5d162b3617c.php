<?php $__env->startSection('title', 'Cart'); ?>

<?php $__env->startSection('content'); ?>
  <h2>Your Cart</h2>
  <?php if(count($cartItems) > 0): ?>
    <table class="table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($item->product->name); ?></td>
            <td><?php echo e($item->quantity); ?></td>
            <td>$<?php echo e($item->price); ?></td>
            <td>$<?php echo e($item->quantity * $item->price); ?></td>
            <td>
              <form action="/cart/remove/<?php echo e($item->id); ?>" method="POST">
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <button class="btn btn-danger">Remove</button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <a href="/checkout" class="btn btn-success">Proceed to Checkout</a>
  <?php else: ?>
    <p>Your cart is empty.</p>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yanaepowell/Herd/Shoppingcart/resources/views/cart.blade.php ENDPATH**/ ?>