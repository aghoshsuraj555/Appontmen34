<section class="message">
<div class="container">
<div class="row">
<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session()->get('error')); ?>

    </div>
<?php endif; ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
</div>
</div>
</section> 
<div id='calendar'></div>
<div class="modal fade" id="show">
        <div class="modal-dialog">
          <div class="modal-content" >
		   <div class="modal-header">
              <h4 class="modal-title">View Appointment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div class="row">
			<div class="col-md-11 offset-md-1">
            <table class="view-appointment">
			<tr>
			<td>
			Patient Name
			</td>
			<td id="patientname">
			</td>
			</tr>
			<tr>
			<td>
			Patient Email
			</td>
			<td id="patient_email">
			</td>
			</tr>
			<tr>
			<td>
			Appointment Start Time
			</td>
			<td id="start_time">
			</td>
			</tr>
			<tr>
			<td>
			Appointment End Time
			</td>
			<td id="finish_time">
			</td>
			</tr>
			<tr>
			<td>
			Appointment Title
			</td>
			<td id="app_title">
			</td>
			</tr>
			</table>
			</div>
			</div>
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              <button class="btn btn-danger" id="delete" value="">Delete</button>
            </div>
          </div>
        </div>
      </div>
<script>
$(document).ready(function() {	
$('#calendar').fullCalendar({
events : [
<?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
{
title : '<?php echo e($appointment->patient_name); ?>',
start : '<?php echo e($appointment->appointment_start_time); ?>',
ends : '<?php echo e($appointment->appointment_end_time); ?>',
patient_email : '<?php echo e($appointment->patient_email); ?>',
app_title : '<?php echo e($appointment->appointment_title); ?>',
app_id : '<?php echo e($appointment->appointment_id); ?>',
},
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
],
eventClick: function(calEvent, jsEvent, view) {
$('#start_time').html(moment(calEvent.start).format('DD-MM-YYYY </br> h:mm A'));
$('#finish_time').html(moment(calEvent.ends).format('DD-MM-YYYY </br> h:mm A'));
$('#patientname').html(calEvent.title);
$('#patient_email').html(calEvent.patient_email);
$('#app_title').html(calEvent.app_title);
$('#delete').val(calEvent.app_id);
$('#show').modal('show');

}
});
});

</script><?php /**PATH D:\wamp64\www\appointment\resources\views/calendar.blade.php ENDPATH**/ ?>