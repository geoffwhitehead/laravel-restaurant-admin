
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('voucher?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'voucher/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> Vouchers</legend>
									
								  <div class="form-group  " >
									<label for="Voucher Ref" class=" control-label col-md-4 text-left"> Voucher Ref <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('voucher_ref', $row['voucher_ref'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Authorised By" class=" control-label col-md-4 text-left"> Authorised By <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='authorised_by' rows='5' id='authorised_by' code='{$authorised_by}' 
							class='select2 '  required  ></select> 
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
									<label for="Amount" class=" control-label col-md-4 text-left"> Amount <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('amount', $row['amount'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Sale Id" class=" control-label col-md-4 text-left"> Sale Id </label>
									<div class="col-md-6">
									  <select name='sale_id' rows='5' id='sale_id' code='{$sale_id}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Paypal Payment Ref" class=" control-label col-md-4 text-left"> Paypal Payment Ref </label>
									<div class="col-md-6">
									  {{ Form::text('paypal_payment_ref', $row['paypal_payment_ref'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Paypal Payee Name" class=" control-label col-md-4 text-left"> Paypal Payee Name </label>
									<div class="col-md-6">
									  {{ Form::text('paypal_payee_name', $row['paypal_payee_name'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Paypal Payment Date" class=" control-label col-md-4 text-left"> Paypal Payment Date </label>
									<div class="col-md-6">
									  
				{{ Form::text('paypal_payment_date', $row['paypal_payment_date'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Charity" class=" control-label col-md-4 text-left"> Charity <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='charity' value ='0' requred @if($row['charity'] == '0') checked="checked" @endif > No </label>
					<label class='radio radio-inline'>
					<input type='radio' name='charity' value ='1' requred @if($row['charity'] == '1') checked="checked" @endif > Yes </label> 
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
				<button type="button" onclick="location.href='{{ URL::to('voucher?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#authorised_by").jCombo("{{ URL::to('voucher/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
		{  selected_value : '{{ $row["authorised_by"] }}' });
		
		$("#sale_id").jCombo("{{ URL::to('voucher/comboselect?filter=sales:id:id|site_id|sale_date') }}",
		{  selected_value : '{{ $row["sale_id"] }}' });
		 
	});
	</script>		 