<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('suppliers?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('suppliers?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('suppliers/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
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
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  