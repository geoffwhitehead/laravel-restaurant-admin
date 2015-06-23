
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('sfbb?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'sfbb/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> SFBB Log</legend>
									
								  <div class="form-group  " >
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-6">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Date" class=" control-label col-md-4 text-left"> Date </label>
									<div class="col-md-6">
									  {{ Form::text('date', $row['date'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Opening Log" class=" control-label col-md-4 text-left"> Opening Log </label>
									<div class="col-md-6">
									  <select name='opening_log' rows='5' id='opening_log' code='{$opening_log}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Closing Log" class=" control-label col-md-4 text-left"> Closing Log </label>
									<div class="col-md-6">
									  <select name='closing_log' rows='5' id='closing_log' code='{$closing_log}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Notes" class=" control-label col-md-4 text-left"> Notes </label>
									<div class="col-md-6">
									  {{ Form::text('notes', $row['notes'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
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
				<button type="button" onclick="location.href='{{ URL::to('sfbb?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#opening_log").jCombo("{{ URL::to('sfbb/comboselect?filter=checks_log:id:id') }}",
		{  selected_value : '{{ $row["opening_log"] }}' });
		
		$("#closing_log").jCombo("{{ URL::to('sfbb/comboselect?filter=checks:id:id') }}",
		{  selected_value : '{{ $row["closing_log"] }}' });
		
		$("#created_by").jCombo("{{ URL::to('sfbb/comboselect?filter=tb_users:id:id') }}",
		{  selected_value : '{{ $row["created_by"] }}' });
		 
	});
	</script>		 