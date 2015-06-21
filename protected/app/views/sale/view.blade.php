<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('sale?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('sale?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>

		</div>
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>Id</td>
						<td>{{ $row->id }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Site Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->site_id,'site_id','1:sites:id:address_city') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Barperson Id</td>
						<td>{{ SiteHelpers::gridDisplayView($row->barperson_id,'barperson_id','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Sale Date</td>
						<td>{{ $row->sale_date }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Report Total Sale</td>
						<td>{{ $row->report_total_sale }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Actual Total Sale</td>
						<td>{{ $row->actual_total_sale }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Report Card Sale</td>
						<td>{{ $row->report_card_sale }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Report Voucher Sale</td>
						<td>{{ $row->report_voucher_sale }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Report Voucher Qty</td>
						<td>{{ $row->report_voucher_qty }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Deposits Used Amount</td>
						<td>{{ $row->deposits_used_amount }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Deposits Used Qty</td>
						<td>{{ $row->deposits_used_qty }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Expected Cash Sale</td>
						<td>{{ $row->expected_cash_sale }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Total Cash Invoices</td>
						<td>{{ $row->total_cash_invoices }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Rem After Bills</td>
						<td>{{ $row->cash_rem_after_bills }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Expected Cash Taken</td>
						<td>{{ $row->expected_cash_taken }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken</td>
						<td>{{ $row->cash_taken }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Variance</td>
						<td>{{ $row->cash_variance }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Variance Comments</td>
						<td>{{ $row->cash_variance_comments }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Correction Amt</td>
						<td>{{ $row->correction_amt }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Correction Qty</td>
						<td>{{ $row->correction_qty }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Correction Comments</td>
						<td>{{ $row->correction_comments }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Transactions Qty</td>
						<td>{{ $row->transactions_qty }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Staff Disc Amt</td>
						<td>{{ $row->staff_disc_amt }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Staff Disc Qty</td>
						<td>{{ $row->staff_disc_qty }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Staff Disc Comments</td>
						<td>{{ $row->staff_disc_comments }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Take Away</td>
						<td>{{ $row->take_away }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Eat In</td>
						<td>{{ $row->eat_in }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Card Tips Inc</td>
						<td>{{ $row->card_tips_inc }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Card Tips Taken</td>
						<td>{{ $row->card_tips_taken }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken 5p</td>
						<td>{{ $row->cash_taken_5p }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken 10p</td>
						<td>{{ $row->cash_taken_10p }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken 20p</td>
						<td>{{ $row->cash_taken_20p }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken 50p</td>
						<td>{{ $row->cash_taken_50p }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken £1</td>
						<td>{{ $row->cash_taken_£1 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken £5</td>
						<td>{{ $row->cash_taken_£5 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken £10</td>
						<td>{{ $row->cash_taken_£10 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken £20</td>
						<td>{{ $row->cash_taken_£20 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Taken £50</td>
						<td>{{ $row->cash_taken_£50 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Float Left 5p</td>
						<td>{{ $row->float_left_5p }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Float Left 10p</td>
						<td>{{ $row->float_left_10p }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Float Left 20p</td>
						<td>{{ $row->float_left_20p }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Float Left 50p</td>
						<td>{{ $row->float_left_50p }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Float Left £1</td>
						<td>{{ $row->float_left_£1 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Float Left £5</td>
						<td>{{ $row->float_left_£5 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Float Left £10</td>
						<td>{{ $row->float_left_£10 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Float Left £20</td>
						<td>{{ $row->float_left_£20 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Float Left £50</td>
						<td>{{ $row->float_left_£50 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Float Total Amount</td>
						<td>{{ $row->float_total_amount }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Sale Checked On</td>
						<td>{{ $row->sale_checked_on }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Refund Qty</td>
						<td>{{ $row->refund_qty }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Refund Amt</td>
						<td>{{ $row->refund_amt }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Refund Details</td>
						<td>{{ $row->refund_details }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Deposit Balance</td>
						<td>{{ $row->deposit_balance }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created By</td>
						<td>{{ SiteHelpers::gridDisplayView($row->created_by,'created_by','1:tb_users:id:id|first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cash Checked Amt</td>
						<td>{{ $row->cash_checked_amt }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Sale Checked By</td>
						<td>{{ SiteHelpers::gridDisplayView($row->sale_checked_by,'sale_checked_by','1:tb_users:id:id|first_name|last_name') }} </td>
						
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
	  