<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title', 'Home'); ?> - In The Loop</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">In The Loop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item <?php if(request()->is('/')): ?> active <?php endif; ?>">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item <?php if(request()->is('products*')): ?> active <?php endif; ?>">
          <a class="nav-link" href="/products">Products</a>
        </li>
        <li class="nav-item <?php if(request()->is('cart*')): ?> active <?php endif; ?>">
          <a class="nav-link" href="/cart">Cart</a>
        </li>
        <li class="nav-item <?php if(request()->is('orders*')): ?> active <?php endif; ?>">
          <a class="nav-link" href="/orders">Orders</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <?php echo $__env->yieldContent('content'); ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html><?php /**PATH /Users/yanaepowell/Herd/Shoppingcart/resources/views/app.blade.php ENDPATH**/ ?>