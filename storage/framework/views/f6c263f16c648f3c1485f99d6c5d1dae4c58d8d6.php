<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding:10px;
}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

<table>
<thead>
<th>Sl:No</th>
<th>Client Name</th>
<th>Client Logo</th>
<th>Physician Name</th>
<th>Patient Name</</th>
<th>Action</th>
</thead>
<tbody>
<?php
$i=1;
?>
<?php $__currentLoopData = $patient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patients): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td>
<?php echo e($i++); ?>

</td>
<td>
<?php echo e($users->name); ?>

</td>
<td>
<img src="<?php echo e(URL::to('/')); ?>/storage/uploads/<?php echo e($users->image); ?>" height="100px" width="100px" />
</td>
<td>
<?php echo e($users->email); ?>

</td>
<td>
<img src="<?php echo e(URL::to('/')); ?>/storage/uploads/<?php echo e($users->image); ?>" height="100px" width="100px" />
</td>
<td>
<?php echo e($users->gender); ?>

</td>
<td>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>

            </div>
        </div>
    </body>
</html>
<?php /**PATH D:\wamp64\www\appointment\resources\views/welcome.blade.php ENDPATH**/ ?>