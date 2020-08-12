<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel</title>

<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/jquery-ui.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/jquery.timepicker.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/fullcalendar.min.css')); ?>" rel="stylesheet">

</head>
<style>
.view-appointment td,.view-appointment th
{
border: 1px solid grey;
padding:20px;	
font-size:22px;	
}
.content-details .col-md-3
{
border: .5px solid grey;
padding:12px;	
}
@media (min-width: 576px)
{
.modal-dialog {
    max-width: 860px;
}
}
.active-title 
{
 background-color: #257c9a;
 color: #fff;	
}
.message
{
position:relative;
top:10px;	
}
.form-control:disabled, .form-control[readonly] {
    background-color: #ffff;
}
</style>
<body>
<?php echo $__env->yieldContent('content'); ?>
    </body>
<script src="<?php echo e(asset('js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>		
<script src="<?php echo e(asset('js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.timepicker.js')); ?>"></script>
<script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/fullcalendar.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script>
$(document).ready(function(){
$('.datepicker').datepicker({ 
dateFormat: 'dd-mm-yy',
changeMonth: true,
changeYear: true,
minDate:0
});
$('.timepicker').timepicker({
timeFormat: 'h:i a',
minTime: '9:00 am',
maxTime: '6:30 pm'	
});
calendar();
function calendar()
{
$.ajax({
type:'GET',
url:'<?php echo url("/calendar");?>',
success:function(data){
$('#calendar_details').html(data);
}
});
}
  $('#form').validate({
	ignore: [],
     debug: false,  
    rules: {
       email: {		
        Emailcheck: true
      },
	  name: {
        lettersonly: true
      },
	  date:{
		 checkweekend:true 
	  }
    },
    messages: {
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-zA-z .]+$/i.test(value);
}, "Enter a valid name.");
jQuery.validator.addMethod("checkweekend", function(value, element) {
  var v = value.split('-'),
        n = new Date(parseInt(v[2]), parseInt(v[1])-1, parseInt(v[0])); // Date(year,month,date)
        w = n.getDay();
    return this.optional(element) || w == 1 || w == 2 || w == 3 || w == 4 || w == 5;
}, "Weekend days not allowed"); 
$.validator.addMethod("Emailcheck", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address.');
 $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});	
$('.add-appointment').click(function(e){	
var url=$(this).attr('data-href');
$.ajax({
type:'GET',
async:false,
url:url,
success:function(data){
$('#appointment-form').html(data);
$(".datepicker").datepicker({ 
dateFormat: 'dd-mm-yy',
changeMonth: true,
changeYear: true,
minDate:0
});
$('.timepicker').timepicker({
timeFormat: 'h:i a',
minTime: '9:00 am',
maxTime: '6:30 pm'		
});
}
});
});
$("#form").on('submit',function(e){
$('#button').prop('disabled',true);		
e.preventDefault();
 if($("#form").valid()){   
$.ajax({
type: 'post',
url: $(this).attr('action'),
data: $(this).serialize(),
cache:false,		
success: function(response) {
setTimeout(function() {
$('.alert').fadeOut('fast');
}, 3000);
$('#calendar_details').html(response);
$('#add-appointment').modal('hide');
}
});
}
else
{
$('#button').prop('disabled',false);	
}	
}); 

$('#calendar_details').on('click','#delete',function(){
$('#show').modal('hide');	
var val=$(this).val();
$.ajax({
type: 'get',
url: '<?php echo url("/appointment/destroy");?>/'+val,
cache:false,		
success: function(response) {
setTimeout(function() {
$('.alert').fadeOut('fast');
}, 3000);
$('#calendar_details').html(response);

}
}); 
}); 

}); 
</script>	
</html><?php /**PATH D:\wamp64\www\appointment\resources\views/layouts/app.blade.php ENDPATH**/ ?>