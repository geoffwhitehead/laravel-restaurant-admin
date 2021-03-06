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
        <div>
            <div class="col-md-12 alert alert-info" role="alert">
                <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Info:</span>
                    <strong>Step 1: </strong>Below are the currently unallocated cash invoices, vouchers, and
                    deposits. Ensure there aren't
                    any more to
                    be submitted before continuing. Extra records cannot be added to this sale once sale submitted.</p>
            </div>


            <div class="col-md-12">
                <legend> Cash Invoices</legend>
                <table class="table table-striped">

                    <?php
                    $arraySize = sizeof($used_invoices);
                    ?>

                    @if ($arraySize == 0)
                        <p>None</p>
                    @else

                        <thead>
                        <tr>
                            <th>id</th>
                            <th>invoice date</th>
                            <th>amount</th>
                        </tr>
                        @foreach($used_invoices as $ui)
                            <tr>
                                <th>{{$ui->id}}</th>
                                <th>{{$ui->invoice_date}}</th>
                                <th>{{$ui->amount}}</th>
                            </tr>
                        @endforeach
                        </thead>
                    @endif

                </table>
            </div>

            <div class="col-md-12">
                <legend> Deposits Used</legend>
                <table class="table table-striped">

                    <?php
                    $arraySize = sizeof($used_deposits);
                    ?>

                    @if ($arraySize == 0)
                        <p>None</p>
                    @else

                        <thead>

                        <tr>
                            <th>Booking Date / Time</th>
                            <th>Name</th>
                            <th>Covers</th>
                            <th>Deposit Amount</th>
                        </tr>
                        @foreach($used_deposits as $ud)
                            <tr>
                                <th>{{$ud->booking_date_time}}</th>
                                <th>{{$ud->booking_name}}</th>
                                <th>{{$ud->booking_covers}}</th>
                                <th>{{$ud->deposit_amount}}</th>
                            </tr>
                        @endforeach
                        </thead>
                    @endif
                </table>
            </div>
            <div class="col-md-12">
                <legend> Deposits Purchased</legend>
                <table class="table table-striped">

                    <?php
                    $arraySize = sizeof($purchased_deposits);
                    ?>

                    @if ($arraySize == 0)
                        <p>None</p>
                    @else

                        <thead>

                        <tr>
                            <th>Booking Date / Time</th>
                            <th>Name</th>
                            <th>Covers</th>
                            <th>Deposit Amount</th>
                        </tr>
                        @foreach($purchased_deposits as $pd)
                            <tr>
                                <th>{{$pd->booking_date_time}}</th>
                                <th>{{$pd->booking_name}}</th>
                                <th>{{$pd->booking_covers}}</th>
                                <th>{{$pd->deposit_amount}}</th>
                            </tr>
                        @endforeach
                        </thead>
                    @endif
                </table>
            </div>
            <div class="col-md-12">
                <legend> Vouchers Used</legend>
                <table class="table table-striped">
                    <?php
                    $arraySize = sizeof($used_vouchers);
                    ?>

                    @if ($arraySize == 0)
                        <p>None</p>
                    @else
                        <thead>
                        <tr>
                            <th>voucher_ref</th>
                            <th>date</th>
                            <th>amount</th>
                        </tr>
                        @foreach($used_vouchers as $uv)
                            <tr>
                                <th>{{$uv->voucher_ref}}</th>
                                <th>{{$uv->authorized_by}}</th>
                                <th>{{$uv->amount}}</th>
                            </tr>
                        @endforeach
                        </thead>
                    @endif
                </table>
            </div>

            <div class="col-md-12">
                <legend> Deposits Unused</legend>
                <table class="table table-striped">
                    <?php
                    $arraySize = sizeof($unused_due_deposits);
                    ?>

                    @if ($arraySize == 0)
                        <p>None</p>
                    @else
                        <thead>
                        <tr>
                            <th>Booking Date / Time</th>
                            <th>Name</th>
                            <th>Covers</th>
                            <th>Deposit Amount</th>

                        </tr>
                        @foreach($unused_due_deposits as $udd)
                            <tr>
                                <th>{{$udd->booking_date_time}}</th>
                                <th>{{$udd->booking_name}}</th>
                                <th>{{$udd->booking_covers}}</th>
                                <th>{{$udd->deposit_amount}}</th>
                            </tr>
                        @endforeach
                        </thead>
                    @endif


                </table>
            </div>

        </div>
        <div class="col-md-12 alert alert-info" role="alert">
            <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Info:</span>
                <strong>Step 2: </strong>Confirm you have logged into the correct site by checking the site
                id, then
                fill out all the fields
                in form below. If the cash variance is not 0 then a mistake may have been made. Recount and confirm
                this.</p>
        </div>
        {{ Form::open(array('url'=>'sale/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}



        <div class="col-md-3" id="sale-group">
            <fieldset>
                <legend> Sale</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>''  )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Site" class=" control-label col-md-4 text-left"> Site <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6 hidethis" style="display:none;">
                        {{ Form::text('site_id', Session::get('sid'), array('class'=>'form-control','placeholder'=>'','required'=>'true'  )) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::text('ignore', Session::get('site'), array( 'class'=>'form-control','placeholder'=>'', 'readonly'=>'true' )) }}
                    </div>

                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 alert alert-warning" role="alert">
                        <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                        <span class="sr-only">Warning:</span>
                        <strong>Warning:</strong> Are you signed into the correct site?
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <div class="form-group  ">
                    <label for="Sale Date" class=" control-label col-md-4 text-left"> Sale Date <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">

                        {{ Form::text('sale_date', date('Y-m-d'),['sale_date'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Barperson Id" class=" control-label col-md-4 text-left"> Barperson<span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='barperson_id' rows='5' id='barperson_id' code='{$barperson_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>

                <div class="form-group  ">
                    <label for="Report Total Sale" class=" control-label col-md-4 text-left">Total Sale<span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('report_total_sale', $row['report_total_sale'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'report-total-sale')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Actual Total Sale" class=" control-label col-md-4 text-left">Actual Sale<span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('actual_total_sale', $row['actual_total_sale'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'actual-total-sale', 'readonly')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Report Card Sale" class=" control-label col-md-4 text-left">Card Sale<span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('report_card_sale', $row['report_card_sale'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'report-card-sale')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Report Voucher Sale" class=" control-label col-md-4 text-left">Voucher Sale
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('report_voucher_sale',$voucher_sale[0]->amt,array('value'=>$voucher_sale[0]->amt,'class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number' , 'id'=>'voucher-sale'  ,'readonly')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Report Voucher Qty" class=" control-label col-md-4 text-left">Voucher Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('report_voucher_qty', $voucher_count[0]->amt,array('value'=>$voucher_count[0]->amt,'class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>

                <div class="form-group  ">
                    <label for="Expected Cash Sale" class=" control-label col-md-4 text-left"> Expected Cash
                        Sale <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('expected_cash_sale', $row['expected_cash_sale'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'=>'true' ,'id'=>'expected-cash-sale'  )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Total Cash Invoices" class=" control-label col-md-4 text-left"> Total Cash Invoices
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('total_cash_invoices', $invoices[0]->amt,array('value'=>$invoices[0]->amt,'class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'  ,'id' => 'total-cash-invoices', 'readonly'=>'true',)) }}

                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Rem After Bills" class=" control-label col-md-4 text-left"> Cash after Bills
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_rem_after_bills', $row['cash_rem_after_bills'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'=>'true', 'id'=>'cash-rem-after-bills'  )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Expected Cash Taken" class=" control-label col-md-4 text-left"> Expected Cash Taken
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('expected_cash_taken', $row['expected_cash_taken'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'=>'true', 'id'=>'expected-cash-taken'  )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>

                <div class="form-group  ">
                    <label for="Cash Variance" class=" control-label col-md-4 text-left"> Cash Variance <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_variance', $row['cash_variance'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'=>'true', 'id'=>'cash-variance')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-3" id="sale-info">
            <fieldset>
                <legend> Sale Info</legend>

                <div class="form-group  ">
                    <label for="Correction Qty" class=" control-label col-md-4 text-left"> Correction Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('correction_qty', $row['correction_qty'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'  )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Correction Amt" class=" control-label col-md-4 text-left"> Correction Amt <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('correction_amt', $row['correction_amt'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'correction-amt'  )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Transactions Qty" class=" control-label col-md-4 text-left"> Transactions Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('transactions_qty', $row['transactions_qty'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Staff Disc Qty" class=" control-label col-md-4 text-left"> Staff Disc Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('staff_disc_qty', $row['staff_disc_qty'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Staff Disc Amt" class=" control-label col-md-4 text-left"> Staff Disc Amt <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('staff_disc_amt', $row['staff_disc_amt'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number' , 'id'=>'staff-disc-amt' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Refund Qty" class=" control-label col-md-4 text-left"> Refund Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('refund_qty', $row['refund_qty'],array('class'=>'form-control cash-box', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number' , 'id'=>'refund-qty' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Refund Amt" class=" control-label col-md-4 text-left"> Refund Amt <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('refund_amt', $row['refund_amt'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number' , 'id'=>'refund-amt' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>

                <div class="form-group  ">
                    <label for="Take Away" class=" control-label col-md-4 text-left"> Take Away </label>

                    <div class="col-md-6">
                        {{ Form::text('take_away', $row['take_away'],array('class'=>'form-control decimal', 'placeholder'=>'', )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Eat In" class=" control-label col-md-4 text-left"> Eat In </label>

                    <div class="col-md-6">
                        {{ Form::text('eat_in', $row['eat_in'],array('class'=>'form-control decimal', 'placeholder'=>'',)) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Card Tips Inc" class=" control-label col-md-4 text-left"> Card Tips Inc <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('card_tips_inc', $row['card_tips_inc'],array('class'=>'form-control cash-box decimal', 'id'=>'card-tips-inc', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Card Tips % Taken" class=" control-label col-md-4 text-left"> Tips Taken (25%) <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('card_tips_taken', $row['card_tips_taken'],array('class'=>'form-control cash-box decimal', 'id'=>'card-tips-taken',  'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Deposits Used Amount" class=" control-label col-md-4 text-left"> Deposits Used Amount
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('deposits_used_amount', $deposit_sale[0]->amt,array('value'=>$deposit_sale[0]->amt,'class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly', 'id'=>'deposit-used-amt' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Deposits Used Qty" class=" control-label col-md-4 text-left"> Deposits Used Qty <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('deposits_used_qty', $deposit_count[0]->amt,array('value'=>$deposit_count[0]->amt,'class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Deposit Balance" class=" control-label col-md-4 text-left"> Deposit Balance <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('deposit_balance', $row['deposit_balance'],array('class'=>'form-control decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number')) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-3" id="cash-taken-group">
            <fieldset>
                <legend> Cash Taken</legend>

                <div class="form-group  ">
                    <label for="Cash Taken 5p" class=" control-label col-md-4 text-left"> Cash Taken 5p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_5p', $row['cash_taken_5p'],array('class'=>'form-control cash-box cash-taken decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'cash-taken-5p' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken 10p" class=" control-label col-md-4 text-left"> Cash Taken 10p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_10p', $row['cash_taken_10p'],array('class'=>'form-control cash-box cash-taken decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'cash-taken-10p' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken 20p" class=" control-label col-md-4 text-left"> Cash Taken 20p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_20p', $row['cash_taken_20p'],array('class'=>'form-control cash-box cash-taken decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'cash-taken-20p' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken 50p" class=" control-label col-md-4 text-left"> Cash Taken 50p <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_50p', $row['cash_taken_50p'],array('class'=>'form-control cash-box cash-taken decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'cash-taken-50p' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken £1" class=" control-label col-md-4 text-left"> Cash Taken £1 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_£1', $row['cash_taken_£1'],array('class'=>'form-control cash-box cash-taken decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'cash-taken-£1' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken £5" class=" control-label col-md-4 text-left"> Cash Taken £5 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_£5', $row['cash_taken_£5'],array('class'=>'form-control cash-box cash-taken decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'cash-taken-£5' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken £10" class=" control-label col-md-4 text-left"> Cash Taken £10 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_£10', $row['cash_taken_£10'],array('class'=>'form-control cash-box cash-taken decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'cash-taken-£10' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken £20" class=" control-label col-md-4 text-left"> Cash Taken £20 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_£20', $row['cash_taken_£20'],array('class'=>'form-control cash-box cash-taken decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'cash-taken-£20' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken £50" class=" control-label col-md-4 text-left"> Cash Taken £50 <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken_£50', $row['cash_taken_£50'],array('class'=>'form-control cash-box cash-taken decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'cash-taken-£50' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Taken" class=" control-label col-md-4 text-left"> Cash Taken <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('cash_taken', $row['cash_taken'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'=>'true', 'id'=>'cash-taken' )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-3">
            <div id="float-group">
                <fieldset>
                    <legend> Float</legend>

                    <div class="form-group  ">
                        <label for="Float Left 5p" class=" control-label col-md-4 text-left"> Float Left 5p <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('float_left_5p', $row['float_left_5p'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'float-5p' )) }}
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Float Left 10p" class=" control-label col-md-4 text-left"> Float Left 10p <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('float_left_10p', $row['float_left_10p'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'float-10p')) }}
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Float Left 20p" class=" control-label col-md-4 text-left"> Float Left 20p <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('float_left_20p', $row['float_left_20p'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number','id'=>'float-20p')) }}
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Float Left 50p" class=" control-label col-md-4 text-left"> Float Left 50p <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('float_left_50p', $row['float_left_50p'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'float-50p')) }}
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Float Left £1" class=" control-label col-md-4 text-left"> Float Left £1 <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('float_left_£1', $row['float_left_£1'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'float-£1')) }}
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Float Left £5" class=" control-label col-md-4 text-left"> Float Left £5 <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('float_left_£5', $row['float_left_£5'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'float-£5')) }}
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Float Left £10" class=" control-label col-md-4 text-left"> Float Left £10 <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('float_left_£10', $row['float_left_£10'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'float-£10')) }}
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Float Left £20" class=" control-label col-md-4 text-left"> Float Left £20 <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('float_left_£20', $row['float_left_£20'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'float-£20')) }}
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Float Left £50" class=" control-label col-md-4 text-left"> Float Left £50 <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('float_left_£50', $row['float_left_£50'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'id'=>'float-£50')) }}
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Float Total Amount" class=" control-label col-md-4 text-left"> Float Total<span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('float_total_amount', $row['float_total_amount'],array('class'=>'form-control cash-box decimal', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number' , 'readonly'=>'true', 'id'=>'float-total-amt')) }}
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>


                </fieldset>
            </div>
            <div class="form-group  ">
                <label for="Previous Float" class=" control-label col-md-4 text-left"> Previous Float <span
                            class="asterix"> * </span></label>


                <div class="col-md-6">
                    @if (array_key_exists(0, $yesterdays_float))
                        {{ Form::text('float_total_amount_prev', $yesterdays_float[0]->float_total_amount,array('class'=>'form-control cash-box decimal', 'placeholder'=>"", 'readonly', 'id'=>'float-previous')) }}
                    @else
                        {{ Form::text('float_total_amount_prev', '0',array('class'=>'form-control cash-box decimal', 'placeholder'=>"", 'readonly', 'id'=>'float-previous')) }}
                    @endif
                </div>
                <div class="col-md-1">

                </div>
            </div>
        </div>

        <div class="col-md-12 alert alert-info" role="alert">
            <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Info:</span>
                <strong>Step 3: </strong>Give details and reasons for any cash variance. Detail who received a staff
                discount. Give reasons
                for high corrections.</p>
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
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Cash Variance Comments" class=" control-label col-md-4 text-left"> Cash Variance
                        Comments </label>

                    <div class="col-md-6">
                        {{ Form::text('cash_variance_comments', $row['cash_variance_comments'],array('class'=>'form-control', 'placeholder'=>'',  )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Staff Disc Comments" class=" control-label col-md-4 text-left"> Staff Disc
                        Comments </label>

                    <div class="col-md-6">
                        {{ Form::text('staff_disc_comments', $row['staff_disc_comments'],array('class'=>'form-control', 'placeholder'=>'', 'id'=>'staff-disc-comments'  )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Refund Comments" class=" control-label col-md-4 text-left"> Refund
                        Comments </label>

                    <div class="col-md-6">
                        {{ Form::text('refund_details', $row['refund_details'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
            </fieldset>
        </div>

        <div class="form-group">
            <label class="col-sm-4 text-right">&nbsp;</label>

            <div class="col-sm-8">


                <input type="submit" name="submit" class="btn btn-primary"
                       value="{{ Lang::get('core.sb_save') }}  "/>
                <button type="button"
                        onclick="location.href='{{ URL::to('sale?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

            {{ Form::close() }}
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            $("#barperson_id").jCombo("{{ URL::to('sale/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
                    {selected_value: '{{ $row["barperson_id"] }}'});

            if ($('#total-cash-invoices').val() == "") {
                var zero = 0;
                $('#total-cash-invoices').val(zero.toFixed(2));
            }
            ;

            if ($('#voucher-sale').val() == "") {
                var zero = 0;
                $('#voucher-sale').val(zero.toFixed(2));
            }
            ;
            if ($('#deposit-used-amt').val() == "") {
                var zero = 0;
                $('#deposit-used-amt').val(zero.toFixed(2));
            }
            ;
        });

        //change to 2 decimal places
        $(".cash-box").focusout(function () {

            //calculate float
            $('#float-total-amt').val(0);
            var sum = 0;
            $('#float-group').find('.cash-box').each(function () {
                sum += Number($(this).val());
            });
            $('#float-total-amt').val(sum.toFixed(2));

            //cash taken
            $('#cash-taken').val(0);
            sum = 0;
            $('.cash-taken').each(function () {
                sum += Number($(this).val());
            });
            $('#cash-taken').val(sum.toFixed(2));

            //calculate expected cash sale / cash rem after bills / expected cash taken
            sum = 0;
            sum += Number($('#report-total-sale').val());
            sum -= Number($('#voucher-sale').val());
            //sum -= Number($('#deposit-used-amt').val()); - don't need this; the total sale staff enter from the till already has this reduction
            $('#actual-total-sale').val(sum.toFixed(2));
            sum -= Number($('#report-card-sale').val());
            sum += Number($('#card-tips-inc').val());
            $('#expected-cash-sale').val(sum.toFixed(2));
            sum -= Number($('#total-cash-invoices').val());
            $('#cash-rem-after-bills').val(sum.toFixed(2));
            sum += Number($('#float-previous').val());
            sum -= Number($('#float-total-amt').val());
            sum += Number($('#card-tips-taken').val());
            $('#expected-cash-taken').val(sum.toFixed(2));
            var variance = $('#cash-taken').val();
            variance -= $('#expected-cash-taken').val();
            $('#cash-variance').val(variance.toFixed(2));

            var tips = 0;
            if ($('#card-tips-inc').val() > 0) {
                tips = $('#card-tips-inc').val();
                tips = ((tips / 100) * 25);
            }
            $('#card-tips-taken').val(tips.toFixed(2));


        });
        $(".decimal").focusout(function () {
            //to 2 decimal places
            var num = Number($(this).val());
            var cleanNum = num.toFixed(2);
            $(this).val(cleanNum);
        });

    </script>
</div>