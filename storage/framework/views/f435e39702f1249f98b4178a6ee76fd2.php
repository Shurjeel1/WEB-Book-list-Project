<?php $__env->startSection('content'); ?>
<div class="wrapperdiv">
    <?php if($books): ?>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row pb-5">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="card" style="width: 20rem;">
                        <img src="<?php echo e(asset('uploads/'.$book->Coverpage )); ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($book->title); ?></h5>
                            <p class="card-text"><?php echo e($book->author); ?> | <?php echo e($book->type); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('books.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Booklist\resources\views/books/show.blade.php ENDPATH**/ ?>