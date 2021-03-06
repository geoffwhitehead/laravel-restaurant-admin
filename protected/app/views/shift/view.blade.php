<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('shift?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('shift?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('shift/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
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
						<td width='30%' class='label-view text-right'>Employee Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->employee_id,'employee_id','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Site Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->site_id,'site_id','1:sites:id:id|name|address_city') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Shift Start</td>
						<td>{{ $row->shift_start }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Shift End</td>
						<td>{{ $row->shift_end }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Clock In Time</td>
						<td>{{ $row->clock_in_time }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Clock Out Time</td>
						<td>{{ $row->clock_out_time }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Manager Conf Flag</td>
						<td>{{ $row->manager_conf_flag }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Manager Conf Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->manager_conf_id,'manager_conf_id','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Manager Conf On</td>
						<td>{{ $row->manager_conf_on }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Admin Conf Flag</td>
						<td>{{ $row->admin_conf_flag }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Admin Conf Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->admin_conf_id,'admin_conf_id','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Admin Conf On</td>
						<td>{{ $row->admin_conf_on }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Paid</td>
						<td>{{ $row->paid }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Paid On</td>
						<td>{{ $row->paid_on }} </td>
						
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
	  