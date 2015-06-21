<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('voucher?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('voucher?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('voucher/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
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
						<td width='30%' class='label-view text-right'>Voucher Reference Number</td>
						<td>{{ $row->voucher_ref }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Authorized By</td>
						<td>{{ SiteHelpers::gridDisplayView($row->authorized_by,'authorized_by','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Authorized On</td>
						<td>{{ $row->authorized_on }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Amount</td>
						<td>{{ $row->amount }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Charity</td>
						<td>{{ $row->charity }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Paypal Payment Reference</td>
						<td>{{ $row->paypal_payment_ref }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Paypal Payee Name</td>
						<td>{{ $row->paypal_payee_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Paypal Payment Date</td>
						<td>{{ $row->paypal_payment_date }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Used</td>
						<td>{{ $row->used }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Sale Used</td>
						<td>{{ SiteHelpers::gridDisplayView($row->used_sale_id,'used_sale_id','1:sales:id:id|sale_date') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Notes</td>
						<td>{{ $row->notes }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Site Used</td>
						<td>{{ SiteHelpers::gridDisplayView($row->site_used,'site_used','1:sites:id:address_city') }} </td>
						
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
				
					<tr>
						<td width='30%' class='label-view text-right'>Active</td>
						<td>{{ $row->active }} </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  