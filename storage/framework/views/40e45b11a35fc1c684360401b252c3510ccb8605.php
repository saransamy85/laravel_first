<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <title>Login</title>
</head>

<body>
    <section id="cont">
        <div class="container">
            <div class="row">
                <div class="col" id="logo">
                    <img src="<?php echo e(asset('images/1.png')); ?>" height="100%" width="100%">
                </div>
                <div class="col" id="login-form">
                    <form action="<?php echo e(route('check')); ?>" method="POST">
                        <?php if(Session::get('fail')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(Session::get('fail')); ?>

                        </div>
                        <?php endif; ?>
                        <?php echo csrf_field(); ?>
                        <div id="inner-form" class="w-100">
                            <h4 class="text-center">LOGIN</h4>
                            <div class="form-group">
                                <label for="username">username</label>
                                <input type="text" class="form-control" name="uname">
                                <span class="text-danger"><?php $__errorArgs = ['uname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control" name="pwd">
                                <span class="text-danger"><?php $__errorArgs = ['pwd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success w-100" value="login">
                            </div>
                            <br>
                            <a href="<?php echo e(route('register')); ?>">I don't have an account. Create new</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html><?php /**PATH E:\Laravel_Tutorials\loginex\resources\views/login.blade.php ENDPATH**/ ?>