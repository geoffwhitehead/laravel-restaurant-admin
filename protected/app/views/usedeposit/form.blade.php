
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('usedeposit?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'usedeposit/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
<div class="col-md-12">
						<fieldset><legend> Use Deposit</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-6">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',  )) }}
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Booking Date Time" class=" control-label col-md-4 text-left"> Booking Date Time </label>
									<div class="col-md-6">
									  {{Form::text ('booking_date_time', $row['booking_date_time'], array ('class'=>'form-control', 'placeholder'=>'', 'readonly'))}}
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Booking Name" class=" control-label col-md-4 text-left"> Booking Name </label>
									<div class="col-md-6">
									  {{ Form::text('booking_name', $row['booking_name'],array('class'=>'form-control', 'placeholder'=>'', 'readonly'   )) }}
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Booking Phone" class=" control-label col-md-4 text-left"> Booking Phone </label>
									<div class="col-md-6">
									  {{ Form::text('booking_phone', $row['booking_phone'],array('class'=>'form-control', 'placeholder'=>'',  'readonly'  )) }}
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Booking Covers" class=" control-label col-md-4 text-left"> Booking Covers </label>
									<div class="col-md-6">
									  {{ Form::text('booking_covers', $row['booking_covers'],array('class'=>'form-control', 'placeholder'=>'', 'readonly' )) }}
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Deposit Amount" class=" control-label col-md-4 text-left"> Deposit Amount </label>
									<div class="col-md-6">
									  {{ Form::text('deposit_amount', $row['deposit_amount'],array('class'=>'form-control', 'placeholder'=>'', 'readonly' )) }}
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
				<input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  " />
				<button type="button" onclick="location.href='{{ URL::to('usedeposit?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		 
	});
	</script>		 