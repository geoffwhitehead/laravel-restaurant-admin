
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('site?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'site/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> Sites</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-6">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Company Id" class=" control-label col-md-4 text-left"> Company Id <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='company_id' rows='5' id='company_id' code='{$company_id}' 
							class='select2 '  required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Name" class=" control-label col-md-4 text-left"> Name <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('name', $row['name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Address Street" class=" control-label col-md-4 text-left"> Address Street <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('address_street', $row['address_street'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Address City" class=" control-label col-md-4 text-left"> Address City <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('address_city', $row['address_city'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Address Postcode" class=" control-label col-md-4 text-left"> Address Postcode <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('address_postcode', $row['address_postcode'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Phone" class=" control-label col-md-4 text-left"> Phone <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('phone', $row['phone'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Report Email" class=" control-label col-md-4 text-left"> Report Email <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('report_email', $row['report_email'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Manager Email" class=" control-label col-md-4 text-left"> Manager Email <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('manager_email', $row['manager_email'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Reservation Email" class=" control-label col-md-4 text-left"> Reservation Email <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('reservation_email', $row['reservation_email'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
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
									<label for="Created By" class=" control-label col-md-4 text-left"> Created By </label>
									<div class="col-md-6">
									  <select name='created_by' rows='5' id='created_by' code='{$created_by}' 
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
									<label for="Updated By" class=" control-label col-md-4 text-left"> Updated By </label>
									<div class="col-md-6">
									  <select name='updated_by' rows='5' id='updated_by' code='{$updated_by}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Active" class=" control-label col-md-4 text-left"> Active </label>
									<div class="col-md-6">
									  <textarea name='active' rows='2' id='active' class='form-control '  
				           >{{ $row['active'] }}</textarea> 
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
				<button type="button" onclick="location.href='{{ URL::to('site?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#company_id").jCombo("{{ URL::to('site/comboselect?filter=companies:id:id|company_name') }}",
		{  selected_value : '{{ $row["company_id"] }}' });
		
		$("#created_by").jCombo("{{ URL::to('site/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["created_by"] }}' });
		
		$("#updated_by").jCombo("{{ URL::to('site/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["updated_by"] }}' });
		 
	});
	</script>		 