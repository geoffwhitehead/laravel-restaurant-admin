<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('employees?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('employees?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('employees/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
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
						<td width='30%' class='label-view text-right'>Group Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->group_id,'group_id','1:tb_groups:group_id:name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Organisation Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->organisation_id,'organisation_id','1:sites:id:id|address_city') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Username</td>
						<td>{{ $row->username }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Email</td>
						<td>{{ $row->email }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>First Name</td>
						<td>{{ $row->first_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Last Name</td>
						<td>{{ $row->last_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Address Street</td>
						<td>{{ $row->address_street }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Address Town</td>
						<td>{{ $row->address_town }} </td>
						
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
						<td width='30%' class='label-view text-right'>Employment Start</td>
						<td>{{ $row->employment_start }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Employment End</td>
						<td>{{ $row->employment_end }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Avatar</td>
						<td>{{ SiteHelpers::showUploadedFile($row->avatar,'/uploads/users/') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Active</td>
						<td>{{ $row->active }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Last Login</td>
						<td>{{ $row->last_login }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created At</td>
						<td>{{ $row->created_at }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Updated At</td>
						<td>{{ $row->updated_at }} </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  