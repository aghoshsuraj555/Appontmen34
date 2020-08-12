         		 <div class="row">
			<div class="col-md-12">
             @csrf
            <input type="hidden" name="_method" value="POST"/>
			<div class="row">
			<div class="col-md-6">
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control required" name="name" value="{{old('name')}}" id="name"/>
           </div>
           </div>
		   <div class="col-md-6">
		    <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control email required" name="email" value="{{old('email')}}" id="email"/>
           </div>
            </div>
			<div class="col-md-6">
            <div class="form-group">
            <label for="time">Appointment Date</label>
            <input type="text" class="form-control datepicker required" name="date" value="{{old('date')}}" autocomplete="off" id="date"/>
           </div>
           </div>
		   <div class="col-md-6">
            <div class="form-group">
            <label for="time">Appointment Time</label>
            <input type="text" class="form-control timepicker required" name="time" value="{{old('time')}}" id="time"/>
           </div>
           </div>
		   	<div class="col-md-6">
            <div class="form-group">
            <label for="title">Appointment Title</label>
            <input type="text" class="form-control required" name="title" value="{{old('title')}}" id="title"/>
           </div>
           </div>
            </div>
           </div>
			</div>	
