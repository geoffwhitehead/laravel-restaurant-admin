
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('supplieraccounts?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'supplieraccounts/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> SupplierAccounts</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-6">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Supplier Id" class=" control-label col-md-4 text-left"> Supplier Id <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='supplier_id' rows='5' id='supplier_id' code='{$supplier_id}' 
							class='select2 '  required  ></select> 
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
									<label for="Account Ref" class=" control-label col-md-4 text-left"> Account Ref <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('account_ref', $row['account_ref'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
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
									<label for="Default Payment Method" class=" control-label col-md-4 text-left"> Default Payment Method <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='default_payment_method' rows='5' id='default_payment_method' code='{$default_payment_method}' 
							class='select2 '  required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Credit Limit" class=" control-label col-md-4 text-left"> Credit Limit </label>
									<div class="col-md-6">
									  {{ Form::text('credit_limit', $row['credit_limit'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Credit Terms" class=" control-label col-md-4 text-left"> Credit Terms </label>
									<div class="col-md-6">
									  {{ Form::text('credit_terms', $row['credit_terms'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Account Rep Name" class=" control-label col-md-4 text-left"> Account Rep Name </label>
									<div class="col-md-6">
									  {{ Form::text('account_rep_name', $row['account_rep_name'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Account Rep Email" class=" control-label col-md-4 text-left"> Account Rep Email </label>
									<div class="col-md-6">
									  {{ Form::text('account_rep_email', $row['account_rep_email'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Account Rep Number" class=" control-label col-md-4 text-left"> Account Rep Number </label>
									<div class="col-md-6">
									  {{ Form::text('account_rep_number', $row['account_rep_number'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Delivery Info" class=" control-label col-md-4 text-left"> Delivery Info </label>
									<div class="col-md-6">
									  {{ Form::text('delivery_info', $row['delivery_info'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
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
				<button type="button" onclick="location.href='{{ URL::to('supplieraccounts?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#supplier_id").jCombo("{{ URL::to('supplieraccounts/comboselect?filter=suppliers:id:id|supplier_name') }}",
		{  selected_value : '{{ $row["supplier_id"] }}' });
		
		$("#site_id").jCombo("{{ URL::to('supplieraccounts/comboselect?filter=sites:id:id|address_city') }}",
		{  selected_value : '{{ $row["site_id"] }}' });
		
		$("#created_by").jCombo("{{ URL::to('supplieraccounts/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["created_by"] }}' });
		
		$("#default_payment_method").jCombo("{{ URL::to('supplieraccounts/comboselect?filter=payment_methods:id:invoice_type') }}",
		{  selected_value : '{{ $row["default_payment_method"] }}' });
		 
	});
	</script>		 