<section class="message">
<div class="container">
<div class="row">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
@foreach($appointments as $appointment)
{
title : '{{ $appointment->patient_name }}',
start : '{{ $appointment->appointment_start_time }}',
ends : '{{ $appointment->appointment_end_time }}',
patient_email : '{{ $appointment->patient_email }}',
app_title : '{{ $appointment->appointment_title }}',
app_id : '{{ $appointment->appointment_id }}',
},
@endforeach
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

</script>