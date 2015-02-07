
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('invoices?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'invoices/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> Invoices</legend>
									
								  <div class="form-group  " >
									<label for="Invoice Date" class=" control-label col-md-4 text-left"> Invoice Date <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('invoice_date', $row['invoice_date'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
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
									<label for="Supplier Account Id" class=" control-label col-md-4 text-left"> Supplier Account Id <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='supplier_account_id' rows='5' id='supplier_account_id' code='{$supplier_account_id}' 
							class='select2 '  required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Payment Method Id" class=" control-label col-md-4 text-left"> Payment Method Id <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='payment_method_id' rows='5' id='payment_method_id' code='{$payment_method_id}' 
							class='select2 '  required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Amount" class=" control-label col-md-4 text-left"> Amount <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('amount', $row['amount'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Comments" class=" control-label col-md-4 text-left"> Comments </label>
									<div class="col-md-6">
									  <textarea name='comments' rows='2' id='comments' class='form-control '  
				           >{{ $row['comments'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Cash Taken From Sale" class=" control-label col-md-4 text-left"> Cash Taken From Sale <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('cash_taken_from_sale', $row['cash_taken_from_sale'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
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
				<button type="button" onclick="location.href='{{ URL::to('invoices?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#site_id").jCombo("{{ URL::to('invoices/comboselect?filter=sites:id:id') }}",
		{  selected_value : '{{ $row["site_id"] }}' });
		
		$("#supplier_account_id").jCombo("{{ URL::to('invoices/comboselect?filter=suppliers:id:id') }}",
		{  selected_value : '{{ $row["supplier_account_id"] }}' });
		
		$("#payment_method_id").jCombo("{{ URL::to('invoices/comboselect?filter=payment_methods:id:id') }}",
		{  selected_value : '{{ $row["payment_method_id"] }}' });
		 
	});
	</script>		 