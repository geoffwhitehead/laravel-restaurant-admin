
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('sfbbmonthly?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'sfbbmonthly/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> SFBB Monthly Log</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-6">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Date" class=" control-label col-md-4 text-left"> Date <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
				{{ Form::text('date', $row['date'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Problems" class=" control-label col-md-4 text-left"> Problems <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='problems' value ='0' requred @if($row['problems'] == '0') checked="checked" @endif > No </label>
					<label class='radio radio-inline'>
					<input type='radio' name='problems' value ='1' requred @if($row['problems'] == '1') checked="checked" @endif > Yes </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Problem Details" class=" control-label col-md-4 text-left"> Problem Details </label>
									<div class="col-md-6">
									  <textarea name='problem_details' rows='2' id='problem_details' class='form-control '  
				           >{{ $row['problem_details'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Site Id" class=" control-label col-md-4 text-left"> Site Id <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='site_id' rows='5' id='site_id' code='{$site_id}' 
							class='select2 '  required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Problem Remedy" class=" control-label col-md-4 text-left"> Problem Remedy </label>
									<div class="col-md-6">
									  <textarea name='problem_remedy' rows='2' id='problem_remedy' class='form-control '  
				           >{{ $row['problem_remedy'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="New Staff" class=" control-label col-md-4 text-left"> New Staff <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='new_staff' value ='0' requred @if($row['new_staff'] == '0') checked="checked" @endif > No </label>
					<label class='radio radio-inline'>
					<input type='radio' name='new_staff' value ='1' requred @if($row['new_staff'] == '1') checked="checked" @endif > Yes </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="New Staff Trained" class=" control-label col-md-4 text-left"> New Staff Trained <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='new_staff_trained' value ='0' requred @if($row['new_staff_trained'] == '0') checked="checked" @endif > No </label>
					<label class='radio radio-inline'>
					<input type='radio' name='new_staff_trained' value ='1' requred @if($row['new_staff_trained'] == '1') checked="checked" @endif > Yes </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Menu Changed" class=" control-label col-md-4 text-left"> Menu Changed <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='menu_changed' value ='0' requred @if($row['menu_changed'] == '0') checked="checked" @endif > No </label>
					<label class='radio radio-inline'>
					<input type='radio' name='menu_changed' value ='1' requred @if($row['menu_changed'] == '1') checked="checked" @endif > Yes </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Review Methods" class=" control-label col-md-4 text-left"> Review Methods <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='review_methods' value ='0' requred @if($row['review_methods'] == '0') checked="checked" @endif > No </label>
					<label class='radio radio-inline'>
					<input type='radio' name='review_methods' value ='1' requred @if($row['review_methods'] == '1') checked="checked" @endif > Yes </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Changes" class=" control-label col-md-4 text-left"> Changes </label>
									<div class="col-md-6">
									  <textarea name='changes' rows='2' id='changes' class='form-control '  
				           >{{ $row['changes'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="New Supply" class=" control-label col-md-4 text-left"> New Supply <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='new_supply' value ='0' requred @if($row['new_supply'] == '0') checked="checked" @endif > No </label>
					<label class='radio radio-inline'>
					<input type='radio' name='new_supply' value ='1' requred @if($row['new_supply'] == '1') checked="checked" @endif > Yes </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Affected Methods Comments" class=" control-label col-md-4 text-left"> Affected Methods Comments </label>
									<div class="col-md-6">
									  <textarea name='affected_methods_comments' rows='2' id='affected_methods_comments' class='form-control '  
				           >{{ $row['affected_methods_comments'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="New Equipment" class=" control-label col-md-4 text-left"> New Equipment <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='new_equipment' value ='0' requred @if($row['new_equipment'] == '0') checked="checked" @endif > No </label>
					<label class='radio radio-inline'>
					<input type='radio' name='new_equipment' value ='1' requred @if($row['new_equipment'] == '1') checked="checked" @endif > Yes </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="New Equipment Comments" class=" control-label col-md-4 text-left"> New Equipment Comments </label>
									<div class="col-md-6">
									  <textarea name='new_equipment_comments' rows='2' id='new_equipment_comments' class='form-control '  
				           >{{ $row['new_equipment_comments'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Other Changes" class=" control-label col-md-4 text-left"> Other Changes </label>
									<div class="col-md-6">
									  <textarea name='other_changes' rows='2' id='other_changes' class='form-control '  
				           >{{ $row['other_changes'] }}</textarea> 
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
								  </div> </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} " />
				<input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  " />
				<button type="button" onclick="location.href='{{ URL::to('sfbbmonthly?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#site_id").jCombo("{{ URL::to('sfbbmonthly/comboselect?filter=sites:id:name') }}",
		{  selected_value : '{{ $row["site_id"] }}' });
		
		$("#created_by").jCombo("{{ URL::to('sfbbmonthly/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["created_by"] }}' });
		 
	});
	</script>		 