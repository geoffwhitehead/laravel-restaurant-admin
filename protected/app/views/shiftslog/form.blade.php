
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('shiftslog?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
        <li class="active">{{ Lang::get('core.addedit') }} </li>
      </ul>
	  	  
    </div>
 
 	<div class="page-content-wrapper">
		@if(Session::has('message'))	  
			   {{ Session::get('message') }}
		@endif	
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		 {{ Form::open(array('url'=>'shiftslog/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> ShiftsLog</legend>
									
								  <div class="form-group  " >
									<label for="Employee Id" class=" control-label col-md-4 text-left"> Employee Id </label>
									<div class="col-md-6">
									  <select name='employee_id' rows='5' id='employee_id' code='{$employee_id}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Site Id" class=" control-label col-md-4 text-left"> Site Id </label>
									<div class="col-md-6">
									  <select name='site_id' rows='5' id='site_id' code='{$site_id}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Created By" class=" control-label col-md-4 text-left"> Created By </label>
									<div class="col-md-6">
									  <select name='created_by' rows='5' id='created_by' code='{$created_by}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Date Created" class=" control-label col-md-4 text-left"> Date Created </label>
									<div class="col-md-6">
									  
				{{ Form::text('date_created', $row['date_created'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Shift Date" class=" control-label col-md-4 text-left"> Shift Date </label>
									<div class="col-md-6">
									  
				{{ Form::text('shift_date', $row['shift_date'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Shift Start" class=" control-label col-md-4 text-left"> Shift Start </label>
									<div class="col-md-6">
									  {{ Form::text('shift_start', $row['shift_start'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Shift End" class=" control-label col-md-4 text-left"> Shift End </label>
									<div class="col-md-6">
									  {{ Form::text('shift_end', $row['shift_end'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Clock In" class=" control-label col-md-4 text-left"> Clock In </label>
									<div class="col-md-6">
									  {{ Form::text('clock_in', $row['clock_in'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Clock Out" class=" control-label col-md-4 text-left"> Clock Out </label>
									<div class="col-md-6">
									  {{ Form::text('clock_out', $row['clock_out'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Hours Worked" class=" control-label col-md-4 text-left"> Hours Worked </label>
									<div class="col-md-6">
									  {{ Form::text('hours_worked', $row['hours_worked'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Manager Conf Flag" class=" control-label col-md-4 text-left"> Manager Conf Flag </label>
									<div class="col-md-6">
									  {{ Form::text('manager_conf_flag', $row['manager_conf_flag'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Manager Conf Id" class=" control-label col-md-4 text-left"> Manager Conf Id </label>
									<div class="col-md-6">
									  <select name='manager_conf_id' rows='5' id='manager_conf_id' code='{$manager_conf_id}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Admin Conf Flag" class=" control-label col-md-4 text-left"> Admin Conf Flag </label>
									<div class="col-md-6">
									  {{ Form::text('admin_conf_flag', $row['admin_conf_flag'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Admin Conf Id" class=" control-label col-md-4 text-left"> Admin Conf Id </label>
									<div class="col-md-6">
									  <select name='admin_conf_id' rows='5' id='admin_conf_id' code='{$admin_conf_id}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Paid" class=" control-label col-md-4 text-left"> Paid </label>
									<div class="col-md-6">
									  {{ Form::text('paid', $row['paid'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} " />
				<input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  " />
				<button type="button" onclick="location.href='{{ URL::to('shiftslog?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#employee_id").jCombo("{{ URL::to('shiftslog/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["employee_id"] }}' });
		
		$("#site_id").jCombo("{{ URL::to('shiftslog/comboselect?filter=sites:id:id|address_city') }}",
		{  selected_value : '{{ $row["site_id"] }}' });
		
		$("#created_by").jCombo("{{ URL::to('shiftslog/comboselect?filter=tb_users:id:id') }}",
		{  selected_value : '{{ $row["created_by"] }}' });
		
		$("#manager_conf_id").jCombo("{{ URL::to('shiftslog/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["manager_conf_id"] }}' });
		
		$("#admin_conf_id").jCombo("{{ URL::to('shiftslog/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["admin_conf_id"] }}' });
		 
	});
	</script>		 