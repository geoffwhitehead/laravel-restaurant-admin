
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('companies?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'companies/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> Companies</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-6">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Company Name" class=" control-label col-md-4 text-left"> Company Name <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('company_name', $row['company_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Reg Address Street" class=" control-label col-md-4 text-left"> Reg Address Street <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('reg_address_street', $row['reg_address_street'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Reg Address City" class=" control-label col-md-4 text-left"> Reg Address City <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('reg_address_city', $row['reg_address_city'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Reg Address County" class=" control-label col-md-4 text-left"> Reg Address County <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('reg_address_county', $row['reg_address_county'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Reg Address Postcode" class=" control-label col-md-4 text-left"> Reg Address Postcode <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('reg_address_postcode', $row['reg_address_postcode'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Company Number" class=" control-label col-md-4 text-left"> Company Number <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {{ Form::text('company_number', $row['company_number'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Vat Number" class=" control-label col-md-4 text-left"> Vat Number </label>
									<div class="col-md-6">
									  {{ Form::text('vat_number', $row['vat_number'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Incorporation Date" class=" control-label col-md-4 text-left"> Incorporation Date <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
				{{ Form::text('incorporation_date', $row['incorporation_date'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Active" class=" control-label col-md-4 text-left"> Active </label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='active' value ='0'  @if($row['active'] == '0') checked="checked" @endif > Inactive </label>
					<label class='radio radio-inline'>
					<input type='radio' name='active' value ='1'  @if($row['active'] == '1') checked="checked" @endif > Active </label> 
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
				<button type="button" onclick="location.href='{{ URL::to('companies?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		 
	});
	</script>		 