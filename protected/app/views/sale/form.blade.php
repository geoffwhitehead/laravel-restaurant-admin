<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-title">
            <h3> {{ $pageTitle }}
                <small>{{ $pageNote }}</small>
            </h3>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
            <li><a href="{{ URL::to('sale?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
            <li class="active">{{ Lang::get('core.addedit') }} </li>
        </ul>

    </div>

    <div class="page-content-wrapper">
        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        <ul class="parsley-error-list">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        {{ Form::open(array('url'=>'sale/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-3">
            <fieldset>
                <legend> Sale</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Site Id" class=" control-label col-md-4 text-left"> Site Id <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='site_id' rows='5' id='site_id' code='{$site_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Barperson Id" class=" control-label col-md-4 text-left"> Barperson Id <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='barperson_id' rows='5' id='barperson_id' code='{$barperson_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Sale Date" class=" control-label col-md-4 text-left"> Sale Date <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">

                        {{ Form::text('sale_date', $row['sale_date'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Report Total Sale" class=" control-label col-md-4 text-left"> Report Total Sale <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('report_total_sale', $row['report_total_sale'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Report Card Sale" class=" control-label col-md-4 text-left"> Report Card Sale <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('report_card_sale', $row['report_card_sale'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Report Voucher Sale" class=" control-label col-md-4 text-left"> Report Voucher Sale
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('report_voucher_sale',$morpeth_voucher_sale[0]->amt,array('value'=>$morpeth_voucher_sale[0]->amt,'class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number' , 'id'=>'report-voucher-sale'  ,'readonly')) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Report Voucher Qty" class=" control-label col-md-4 text-left"> Report Voucher Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('report_voucher_qty', $morpeth_voucher_count[0]->amt,array('value'=>$morpeth_voucher_count[0]->amt,'class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly')) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Deposits Used Amount" class=" control-label col-md-4 text-left"> Deposits Used Amount
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('deposits_used_amount', $morpeth_deposit_sale[0]->amt,array('value'=>$morpeth_deposit_sale[0]->amt,'class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly')) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Deposits Used Qty" class=" control-label col-md-4 text-left"> Deposits Used Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('deposits_used_qty', $morpeth_deposit_count[0]->amt,array('value'=>$morpeth_deposit_count[0]->amt,'class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly')) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Expected Cash Sale" class=" control-label col-md-4 text-left"> Expected Cash Sale <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('expected_cash_sale', $row['expected_cash_sale'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'=>'true' ,'id' => 'expected-cash-sale'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Total Cash Invoices" class=" control-label col-md-4 text-left"> Total Cash Invoices
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('total_cash_invoices', $morpeth_invoices[0]->amt,array('value'=>$morpeth_invoices[0]->amt,'class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'  ,'id' => 'total-cash-invoices', 'readonly'=>'true',)) }}

                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Rem After Bills" class=" control-label col-md-4 text-left"> Cash Rem After Bills
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_rem_after_bills', $row['cash_rem_after_bills'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'=>'true'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Expected Cash Taken" class=" control-label col-md-4 text-left"> Expected Cash Taken
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('expected_cash_taken', $row['expected_cash_taken'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'=>'true'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken" class=" control-label col-md-4 text-left"> Cash Taken <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken', $row['cash_taken'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'=>'true'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Variance" class=" control-label col-md-4 text-left"> Cash Variance <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_variance', $row['cash_variance'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'=>'true'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Created By" class=" control-label col-md-4 text-left"> Created By </label>

                    <div class="col-md-6">
                        {{ Form::text('created_by', $row['created_by'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group hidethis " style="display:none;">
                    <label for="Created On" class=" control-label col-md-4 text-left"> Created On </label>

                    <div class="col-md-6">
                        {{ Form::text('created_on', $row['created_on'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group hidethis " style="display:none;">
                    <label for="Updated By" class=" control-label col-md-4 text-left"> Updated By </label>

                    <div class="col-md-6">
                        {{ Form::text('updated_by', $row['updated_by'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group hidethis " style="display:none;">
                    <label for="Updated On" class=" control-label col-md-4 text-left"> Updated On </label>

                    <div class="col-md-6">
                        {{ Form::text('updated_on', $row['updated_on'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-3">
            <fieldset>
                <legend> Sale Info</legend>

                <div class="form-group  ">
                    <label for="Correction Qty" class=" control-label col-md-4 text-left"> Correction Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('correction_qty', $row['correction_qty'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Correction Amt" class=" control-label col-md-4 text-left"> Correction Amt <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('correction_amt', $row['correction_amt'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Transactions Qty" class=" control-label col-md-4 text-left"> Transactions Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('transactions_qty', $row['transactions_qty'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Staff Disc Qty" class=" control-label col-md-4 text-left"> Staff Disc Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('staff_disc_qty', $row['staff_disc_qty'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Staff Disc Amt" class=" control-label col-md-4 text-left"> Staff Disc Amt <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('staff_disc_amt', $row['staff_disc_amt'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div class="form-group  ">
                    <label for="Take Away" class=" control-label col-md-4 text-left"> Take Away </label>

                    <div class="col-md-6">
                        {{ Form::text('take_away', $row['take_away'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Eat In" class=" control-label col-md-4 text-left"> Eat In </label>

                    <div class="col-md-6">
                        {{ Form::text('eat_in', $row['eat_in'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Card Tips Inc" class=" control-label col-md-4 text-left"> Card Tips Inc <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('card_tips_inc', $row['card_tips_inc'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-3">
            <fieldset>
                <legend> Cash Taken</legend>

                <div class="form-group  ">
                    <label for="Cash Taken 5p" class=" control-label col-md-4 text-left"> Cash Taken 5p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_5p', $row['cash_taken_5p'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken 10p" class=" control-label col-md-4 text-left"> Cash Taken 10p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_10p', $row['cash_taken_10p'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken 20p" class=" control-label col-md-4 text-left"> Cash Taken 20p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_20p', $row['cash_taken_20p'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken 50p" class=" control-label col-md-4 text-left"> Cash Taken 50p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_50p', $row['cash_taken_50p'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken £1" class=" control-label col-md-4 text-left"> Cash Taken £1 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_£1', $row['cash_taken_£1'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken £5" class=" control-label col-md-4 text-left"> Cash Taken £5 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_£5', $row['cash_taken_£5'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken £10" class=" control-label col-md-4 text-left"> Cash Taken £10 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_£10', $row['cash_taken_£10'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken £20" class=" control-label col-md-4 text-left"> Cash Taken £20 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_£20', $row['cash_taken_£20'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken £50" class=" control-label col-md-4 text-left"> Cash Taken £50 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_£50', $row['cash_taken_£50'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-3">
            <fieldset>
                <legend> Float</legend>

                <div class="form-group  ">
                    <label for="Float Left 5p" class=" control-label col-md-4 text-left"> Float Left 5p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('float_left_5p', $row['float_left_5p'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Float Left 10p" class=" control-label col-md-4 text-left"> Float Left 10p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('float_left_10p', $row['float_left_10p'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Float Left 20p" class=" control-label col-md-4 text-left"> Float Left 20p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('float_left_20p', $row['float_left_20p'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Float Left 50p" class=" control-label col-md-4 text-left"> Float Left 50p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('float_left_50p', $row['float_left_50p'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Float Left £1" class=" control-label col-md-4 text-left"> Float Left £1 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('float_left_£1', $row['float_left_£1'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Float Left £5" class=" control-label col-md-4 text-left"> Float Left £5 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('float_left_£5', $row['float_left_£5'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Float Left £10" class=" control-label col-md-4 text-left"> Float Left £10 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('float_left_£10', $row['float_left_£10'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Float Left £20" class=" control-label col-md-4 text-left"> Float Left £20 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('float_left_£20', $row['float_left_£20'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Float Left £50" class=" control-label col-md-4 text-left"> Float Left £50 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('float_left_£50', $row['float_left_£50'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Float Total Amount" class=" control-label col-md-4 text-left"> Float Total Amount <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('float_total_amount', $row['float_total_amount'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number' , 'readonly'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-12">
            <fieldset>
                <legend> Comments</legend>
                <div style="clear:both"></div>

                <div class="form-group  ">
                    <label for="Correction Comments" class=" control-label col-md-4 text-left"> Correction
                        Comments </label>

                    <div class="col-md-6">
                        {{ Form::text('correction_comments', $row['correction_comments'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Variance Comments" class=" control-label col-md-4 text-left"> Cash Variance
                        Comments </label>

                    <div class="col-md-6">
                        {{ Form::text('cash_variance_comments', $row['cash_variance_comments'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Staff Disc Comments" class=" control-label col-md-4 text-left"> Staff Disc
                        Comments </label>

                    <div class="col-md-6">
                        {{ Form::text('staff_disc_comments', $row['staff_disc_comments'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </fieldset>
        </div>

            <div class="form-group">
                <label class="col-sm-4 text-right">&nbsp;</label>

                <div class="col-sm-8">


                    <input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} "/>
                    <input type="submit" name="submit" class="btn btn-primary"
                           value="{{ Lang::get('core.sb_save') }}  "/>
                    <button type="button"
                            onclick="location.href='{{ URL::to('sale?md='.$masterdetail["filtermd"].$trackUri) }}' "
                            id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
                </div>

            </div>

            {{ Form::close() }}
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            $("#site_id").jCombo("{{ URL::to('sale/comboselect?filter=sites:id:id|name|address_city') }}",
                    {selected_value: '{{ $row["site_id"] }}'});

            $("#barperson_id").jCombo("{{ URL::to('sale/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
                    {selected_value: '{{ $row["barperson_id"] }}'});
        });
        $(".form-control").focusout(function() {
            $('#expected-cash-sale').val(('#expected-cash-sale').val()+1);
            $('#report-voucher-sale').val(())
        })


    </script>
