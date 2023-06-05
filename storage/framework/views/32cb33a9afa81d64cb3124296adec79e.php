<?php $__env->startSection('content'); ?>
<div class="wrapperdiv">
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success text-center"><?php echo e($message); ?></div>
<?php endif; ?>
<h2 style="font-family: algerian">Book List Management</h2>
<p></p>
<p></p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Type</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php if(isset($books)): ?>
    <tbody>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="align-middle"><img src="<?php echo e(asset('uploads/'.$book->Coverpage )); ?>" class="img-thumbnail" /></td>
            <td class="align-middle"><?php echo e($book->title); ?></td>
            <td class="align-middle"><?php echo e($book->author); ?></td>
            <td class="align-middle"><?php echo e($book->type); ?></td>
            <td class="align-middle">
                <form action="<?php echo e(route('books.destroy', $book->id)); ?>" method="POST">
                    <a href="<?php echo e(route('books.show', $book->id)); ?>" class="btn btn-info">Show</a>
                    <a href="<?php echo e(route('books.edit', $book->id)); ?>" class="btn btn-primary">Edit</a>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    <?php endif; ?>
</table>
<div class="d-flex">
    <div class="mx-auto">
        <?php echo $books->links(); ?>

    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('books.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Booklist\resources\views/books/index.blade.php ENDPATH**/ ?>