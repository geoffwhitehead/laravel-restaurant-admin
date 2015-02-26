
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('shift?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'shift/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> Shifts</legend>
									
								  <div class="form-group hidethis " style="display:none;">
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
                        </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} " />
				<input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  " />
				<button type="button" onclick="location.href='{{ URL::to('shift?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#employee_id").jCombo("{{ URL::to('shift/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["employee_id"] }}' });
		
		$("#site_id").jCombo("{{ URL::to('shift/comboselect?filter=sites:id:id|name|address_city') }}",
		{  selected_value : '{{ $row["site_id"] }}' });
		
		$("#manager_conf_id").jCombo("{{ URL::to('shift/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["manager_conf_id"] }}' });
		
		$("#admin_conf_id").jCombo("{{ URL::to('shift/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["admin_conf_id"] }}' });
		
		$("#created_by").jCombo("{{ URL::to('shift/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["created_by"] }}' });
		
		$("#updated_by").jCombo("{{ URL::to('shift/comboselect?filter=tb_users:id:id') }}",
		{  selected_value : '{{ $row["updated_by"] }}' });
		 
	});
	</script>		 