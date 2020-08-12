
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row">
<a data-toggle="modal" data-target="#add-appointment" data-href="<?php echo url("/appointment/create");?>" class="btn btn-info add-appointment">Add Appointment</a>
<div id="calendar_details">
</div>
<div class="modal fade" id="add-appointment">
        <div class="modal-dialog">
          <div class="modal-content" >
		    <form action="<?php echo e(route('appointment.store')); ?>" method="POST" id="form" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title">Add Appointment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="appointment-form">

			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
            </div>
		 </form>
          </div>
        </div>
      </div>
	  
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\appointment\resources\views/view.blade.php ENDPATH**/ ?>