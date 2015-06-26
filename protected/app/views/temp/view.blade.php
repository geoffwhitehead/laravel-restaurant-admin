<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('temp?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('temp?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('temp/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
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
						<td width='30%' class='label-view text-right'>Check Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->check_id,'check_id','1:checks:id:check_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>File Upload Proof</td>
						<td>{{ $row->file_upload_proof }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Service Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->service_id,'service_id','1:service_contacts:id:name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Value</td>
						<td>{{ $row->value }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Comments</td>
						<td>{{ $row->comments }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Completed On</td>
						<td>{{ $row->completed_on }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Completed By</td>
						<td>{{ SiteHelpers::gridDisplayView($row->completed_by,'completed_by','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  