 <?php $__env->startSection('content'); ?>
<div class="wrapperdiv">
    <div class="formcontainer">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Book</h2>
                </div>
            </div>
        </div>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Oops! There were some problems with your input.</strong>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

        <form
            action="<?php echo e(route('books.update', $book->id)); ?>"
            method="POST"
            enctype="multipart/form-data"
        >
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-control"
                            >Title</label
                        >
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-control"
                                value="<?php echo e($book->title); ?>"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author" class="col-sm-2 col-form-control"
                            >Author</label
                        >
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="author"
                                id="author"
                                class="form-control"
                                value="<?php echo e($book->author); ?>"
                            >

                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            for="type"
                            class="col-sm-2 col-form-control"
                            >Type</label
                        >
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="type"
                                id="type"
                                class="form-control"
                                value="<?php echo e($book->type); ?>"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Coverpage" class="col-sm-2 col-form-control"
                            >Coverpage</label
                        >
                        <div class="col-sm-10">
                            <input
                                type="file"
                                name="Coverpage"
                                id="Coverpager"
                                class="form-control-file"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>

                        <div class="col-sm-10">
                            <button
                                type="submit"
                                name="submit"
                                id="submit"
                                class="btn btn-primary"
                            >
                                SUBMIT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('books.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Booklist\resources\views/books/edit.blade.php ENDPATH**/ ?>