<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('supplier?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('supplier?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('supplier/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
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
						<td width='30%' class='label-view text-right'>Supplier Name</td>
						<td>{{ $row->supplier_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Address Street</td>
						<td>{{ $row->address_street }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Address City</td>
						<td>{{ $row->address_city }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Address County</td>
						<td>{{ $row->address_county }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Address Postcode</td>
						<td>{{ $row->address_postcode }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Contact Name</td>
						<td>{{ $row->contact_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Contact Number</td>
						<td>{{ $row->contact_number }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Contact Email</td>
						<td>{{ $row->contact_email }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Vat Number</td>
						<td>{{ $row->vat_number }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Active</td>
						<td>{{ $row->active }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Site Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->site_id,'site_id','1:sites:id:id|name|address_city') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Account Ref</td>
						<td>{{ $row->account_ref }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Default Pay Method</td>
						<td>{{ SiteHelpers::gridDisplayView($row->default_pay_method,'default_pay_method','1:payment_methods:id:invoice_type') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Credit Limit</td>
						<td>{{ $row->credit_limit }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Credit Terms</td>
						<td>{{ $row->credit_terms }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Account Rep Name</td>
						<td>{{ $row->account_rep_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Account Rep Phone</td>
						<td>{{ $row->account_rep_phone }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Account Rep Email</td>
						<td>{{ $row->account_rep_email }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Delivery Info</td>
						<td>{{ $row->delivery_info }} </td>
						
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
	  