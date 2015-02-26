<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('invoice?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('invoice?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('invoice/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
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
						<td width='30%' class='label-view text-right'>Invoice Date</td>
						<td>{{ $row->invoice_date }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Site Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->site_id,'site_id','1:sites:id:id|address_city') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Supplier Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->supplier_id,'supplier_id','1:suppliers:id:supplier_name|account_ref|site_id') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Payment Method Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->payment_method_id,'payment_method_id','1:payment_methods:id:invoice_type') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Amount</td>
						<td>{{ $row->amount }}
						 </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Comments</td>
						<td>{{ $row->comments }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken</td>
						<td>{{ $row->cash_taken }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken Sale Id</td>
						<td>{{ $row->cash_taken_sale_id }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Active</td>
						<td>{{ $row->active }} </td>
						
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
