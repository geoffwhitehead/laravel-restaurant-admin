<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('deposit?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('deposit?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('deposit/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>Id</td>
						<td>{{ $row->id }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Site</td>
						<td>{{ SiteHelpers::gridDisplayView($row->site_id,'site_id','1:sites:id:id|name|address_city') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Booking Date Time</td>
						<td>{{ $row->booking_date_time }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Booking Name</td>
						<td>{{ $row->booking_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Booking Phone</td>
						<td>{{ $row->booking_phone }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Booking Covers</td>
						<td>{{ $row->booking_covers }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Deposit Amount</td>
						<td>{{ $row->deposit_amount }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Payment Method</td>
						<td>{{ SiteHelpers::gridDisplayView($row->payment_method,'payment_method','1:payment_methods:id:invoice_type') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Purchased Sale</td>
						<td>{{ SiteHelpers::gridDisplayView($row->purchased_sale_id,'purchased_sale_id','1:sales:id:id|site_id|sale_date') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Used Sale</td>
						<td>{{ SiteHelpers::gridDisplayView($row->used_sale_id,'used_sale_id','1:sales:id:id|site_id|sale_date') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Confirmed Used By</td>
						<td>{{ SiteHelpers::gridDisplayView($row->confirmed_used_by,'confirmed_used_by','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Confirmed Used On</td>
						<td>{{ $row->confirmed_used_on }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Used</td>
						<td>{{ $row->used }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>No Show?</td>
						<td>{{ $row->no_show_flag }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created By</td>
						<td>{{ SiteHelpers::gridDisplayView($row->created_by,'created_by','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created On</td>
						<td>{{ $row->created_on }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Updated By</td>
						<td>{{ SiteHelpers::gridDisplayView($row->updated_by,'updated_by','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Updated On</td>
						<td>{{ $row->updated_on }} </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  