<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="container">
    <h2>Upload Images</h2>
    <form method="POST" action="<?php echo e(route('uploadImage')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="image">Select Image(s):</label>
            <input type="file" name="image[]" id="image" multiple class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <hr>

    <h2>Saved Images</h2>
    <div class="row">
        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="<?php echo e(asset('storage/' . $image->path)); ?>" class="card-img-top" alt="<?php echo e($image->name); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($image->name); ?></h5>
                    <form method="POST" action="<?php echo e(route('deleteImage', $image->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
    </body>
</html>
<?php /**PATH C:\Users\shubh\OneDrive\Desktop\TEST1\blog\resources\views/index.blade.php ENDPATH**/ ?>