
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('usevoucher?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'usevoucher/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> Use Voucher </legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-6">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Voucher Ref" class=" control-label col-md-4 text-left"> Voucher Ref </label>
									<div class="col-md-6">
									  {{ Form::text('voucher_ref', $row['voucher_ref'],array('class'=>'form-control', 'placeholder'=>'', 'readonly'  )) }}
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Authorised By" class=" control-label col-md-4 text-left"> Authorised By </label>
									<div class="col-md-6">
									  <select name='authorised_by' rows='5' id='authorised_by' code='{$authorised_by}' class='select2 ' disabled></select>
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Date" class=" control-label col-md-4 text-left"> Date </label>
									<div class="col-md-6">
										{{ Form::text('date', $row['date'],array('class'=>'form-control', 'placeholder'=>'', 'readonly'  )) }}
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Amount" class=" control-label col-md-4 text-left"> Amount </label>
									<div class="col-md-6">
									  {{ Form::text('amount', $row['amount'],array('class'=>'form-control', 'placeholder'=>'','readonly')) }}
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Site Used" class=" control-label col-md-4 text-left"> Site Used <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='site_used' rows='5' id='site_used' code='{$site_used}' class='select2 ' required  ></select>
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Used" class=" control-label col-md-4 text-left"> Used <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='used' value ='0' requred @if($row['used'] == '0') checked="checked" @endif > No </label>
					<label class='radio radio-inline'>
					<input type='radio' name='used' value ='1' requred @if($row['used'] == '1') checked="checked" @endif > Yes </label> 
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
				<button type="button" onclick="location.href='{{ URL::to('usevoucher?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#authorised_by").jCombo("{{ URL::to('usevoucher/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["authorised_by"] }}' });
		
		$("#site_used").jCombo("{{ URL::to('usevoucher/comboselect?filter=sites:id:id|name|address_city') }}",
		{  selected_value : '{{ $row["site_used"] }}' });
		 
	});
	</script>		 