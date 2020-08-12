         		 <div class="row">
			<div class="col-md-12">
             <?php echo csrf_field(); ?>
            <input type="hidden" name="_method" value="POST"/>
			<div class="row">
			<div class="col-md-6">
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control required" name="name" value="<?php echo e(old('name')); ?>" id="name"/>
           </div>
           </div>
		   <div class="col-md-6">
		    <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control email required" name="email" value="<?php echo e(old('email')); ?>" id="email"/>
           </div>
            </div>
			<div class="col-md-6">
            <div class="form-group">
            <label for="time">Appointment Date</label>
            <input type="text" class="form-control datepicker required" name="date" value="<?php echo e(old('date')); ?>" autocomplete="off" id="date"/>
           </div>
           </div>
		   <div class="col-md-6">
            <div class="form-group">
            <label for="time">Appointment Time</label>
            <input type="text" class="form-control timepicker required" name="time" value="<?php echo e(old('time')); ?>" id="time"/>
           </div>
           </div>
		   	<div class="col-md-6">
            <div class="form-group">
            <label for="title">Appointment Title</label>
            <input type="text" class="form-control required" name="title" value="<?php echo e(old('title')); ?>" id="title"/>
           </div>
           </div>
            </div>
           </div>
			</div>	
<?php /**PATH D:\wamp64\www\appointment\resources\views/modal/add.blade.php ENDPATH**/ ?>