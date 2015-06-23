
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('event?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'event/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> Events</legend>
									
								  <div class="form-group  " >
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-6">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
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
									<label for="Shift Start" class=" control-label col-md-4 text-left"> Shift Start </label>
									<div class="col-md-6">
									  
				{{ Form::text('shift_start', $row['shift_start'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Shift End" class=" control-label col-md-4 text-left"> Shift End </label>
									<div class="col-md-6">
									  
				{{ Form::text('shift_end', $row['shift_end'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Clock In Time" class=" control-label col-md-4 text-left"> Clock In Time </label>
									<div class="col-md-6">
									  
				{{ Form::text('clock_in_time', $row['clock_in_time'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Clock Out Time" class=" control-label col-md-4 text-left"> Clock Out Time </label>
									<div class="col-md-6">
									  
				{{ Form::text('clock_out_time', $row['clock_out_time'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
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
									<label for="Manager Conf On" class=" control-label col-md-4 text-left"> Manager Conf On </label>
									<div class="col-md-6">
									  
				{{ Form::text('manager_conf_on', $row['manager_conf_on'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
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
									<label for="Admin Conf On" class=" control-label col-md-4 text-left"> Admin Conf On </label>
									<div class="col-md-6">
									  
				{{ Form::text('admin_conf_on', $row['admin_conf_on'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
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
								  </div> 					
								  <div class="form-group  " >
									<label for="Paid On" class=" control-label col-md-4 text-left"> Paid On </label>
									<div class="col-md-6">
									  
				{{ Form::text('paid_on', $row['paid_on'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
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
									<label for="Created On" class=" control-label col-md-4 text-left"> Created On </label>
									<div class="col-md-6">
									  
				{{ Form::text('created_on', $row['created_on'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Updated By" class=" control-label col-md-4 text-left"> Updated By </label>
									<div class="col-md-6">
									  <select name='updated_by' rows='5' id='updated_by' code='{$updated_by}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Updated On" class=" control-label col-md-4 text-left"> Updated On </label>
									<div class="col-md-6">
									  
				{{ Form::text('updated_on', $row['updated_on'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Active" class=" control-label col-md-4 text-left"> Active </label>
									<div class="col-md-6">
									  {{ Form::text('active', $row['active'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
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
				<button type="button" onclick="location.href='{{ URL::to('event?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#employee_id").jCombo("{{ URL::to('event/comboselect?filter=tb_users:id:id') }}",
		{  selected_value : '{{ $row["employee_id"] }}' });
		
		$("#site_id").jCombo("{{ URL::to('event/comboselect?filter=sites:id:id') }}",
		{  selected_value : '{{ $row["site_id"] }}' });
		
		$("#manager_conf_id").jCombo("{{ URL::to('event/comboselect?filter=tb_users:id:id') }}",
		{  selected_value : '{{ $row["manager_conf_id"] }}' });
		
		$("#admin_conf_id").jCombo("{{ URL::to('event/comboselect?filter=tb_users:id:id') }}",
		{  selected_value : '{{ $row["admin_conf_id"] }}' });
		
		$("#created_by").jCombo("{{ URL::to('event/comboselect?filter=tb_users:id:id') }}",
		{  selected_value : '{{ $row["created_by"] }}' });
		
		$("#updated_by").jCombo("{{ URL::to('event/comboselect?filter=tb_users:id:id') }}",
		{  selected_value : '{{ $row["updated_by"] }}' });
		 
	});
	</script>		 