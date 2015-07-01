<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('sfbbmonthly?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('sfbbmonthly?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('sfbbmonthly/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
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
						<td width='30%' class='label-view text-right'>Problems</td>
						<td>{{ $row->problems }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Date</td>
						<td>{{ $row->date }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Site Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->site_id,'site_id','1:sites:id:address_city') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Problem Details</td>
						<td>{{ $row->problem_details }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Problem Remedy</td>
						<td>{{ $row->problem_remedy }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>New Staff</td>
						<td>{{ $row->new_staff }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>New Staff Trained</td>
						<td>{{ $row->new_staff_trained }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Menu Changed</td>
						<td>{{ $row->menu_changed }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Review Methods</td>
						<td>{{ $row->review_methods }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Changes</td>
						<td>{{ $row->changes }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>New Supply</td>
						<td>{{ $row->new_supply }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Affected Methods Comments</td>
						<td>{{ $row->affected_methods_comments }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>New Equipment</td>
						<td>{{ $row->new_equipment }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>New Equipment Comments</td>
						<td>{{ $row->new_equipment_comments }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Other Changes</td>
						<td>{{ $row->other_changes }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created By</td>
						<td>{{ SiteHelpers::gridDisplayView($row->created_by,'created_by','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created On</td>
						<td>{{ $row->created_on }} </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  