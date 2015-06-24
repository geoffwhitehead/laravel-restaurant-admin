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
            <li><a href="{{ URL::to('invoice?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
        {{ Form::open(array('url'=>'invoices/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> Invoices</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Invoice Date" class=" control-label col-md-4 text-left"> Invoice Date <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">

                        {{ Form::text('invoice_date', $row['invoice_date'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>


                <!--i have made the options below only available for user below or = to level 3. This will be chosen automatially for other users based on their position-->
                @if(Session::get('lvl') <= GLOBAL_USER)

                    <div class="form-group  ">
                        <label for="Site" class=" control-label col-md-4 text-left"> Site <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            <select name='site_id' rows='5' id='site_id' code='{$site_id}'
                                    class='select2 ' required></select>
                        </div>

                        <div class="col-md-2">

                        </div>
                    </div>
                @else
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
                @endif





                <div class="form-group  ">
                    <label for="Supplier" class=" control-label col-md-4 text-left"> Supplier <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='supplier_id' rows='5' id='supplier_id' code='{$supplier_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Payment Method" class=" control-label col-md-4 text-left"> Payment Method <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='payment_method_id' rows='5' id='payment_method_id' code='{$payment_method_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-4"></div>
                    <div class="col-md-6">

                        <div class="alert alert-info" role="alert">
                            <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Info:</span>

                                <strong>Note: </strong>On selecting "CASH" as the payment method you are confirming that
                                the cash was taken from today's sale. If this isn't the case the till at the end of the
                                day will be down and you will have to detail this in the "cash variance" comments box in
                                the sale tab at the end of the day.</p>
                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="form-group  ">
                    <label for="Amount" class=" control-label col-md-4 text-left"> Amount <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('amount', $row['amount'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Comments" class=" control-label col-md-4 text-left"> Comments </label>

                    <div class="col-md-6">
                        {{ Form::text('comments', $row['comments'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                @if(Session::get('lvl') <= GLOBAL_USER)

                    <div class="form-group  ">
                        <label for="Cash Taken" class=" control-label col-md-4 text-left"> Cash Taken <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">

                            <label class='radio radio-inline'>
                                <input type='radio' name='cash_taken' value='0' requred @if($row['cash_taken'] == '0')
                                       checked="checked" @endif > No </label>
                            <label class='radio radio-inline'>
                                <input type='radio' name='cash_taken' value='1' requred @if($row['cash_taken'] == '1')
                                       checked="checked" @endif > Yes </label>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-4"></div>
                        <div class="col-md-6">

                            <div class="alert alert-info" role="alert">
                                <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Info:</span>

                                    <strong>Note: </strong>As an admin you are able to select whether cash invoices were
                                    taken from the sale or not. This is not available to standard users</p>
                            </div>

                        </div>
                        <div class="col-md-2"></div>
                    </div>
                @endif
                @if($row['id'] != "")
                    <div class="form-group  ">
                        <label for="Active" class=" control-label col-md-4 text-left"> Active </label>

                        <div class="col-md-6">

                            <label class='radio radio-inline'>
                                <input type='radio' name='active' value='0'  @if($row['active'] == '0')
                                       checked="checked" @endif > Inactive </label>
                            <label class='radio radio-inline'>
                                <input type='radio' name='active' value='1'  @if($row['active'] == '1')
                                       checked="checked" @endif > Active </label>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                @endif
            </fieldset>
        </div>


        <div style="clear:both"></div>

        <div class="form-group">
            <label class="col-sm-4 text-right">&nbsp;</label>

            <div class="col-sm-8">
                @if($row['id'] != "")
                    <input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} "/>
                @else
                    <input type="submit" name="submit" class="btn btn-primary"
                           value="{{ Lang::get('core.sb_save') }}  "/>
                @endif
                <button type="button"
                        onclick="location.href='{{ URL::to('invoice?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#site_id").jCombo("{{ URL::to('invoices/comboselect?filter=sites:id:id|address_city') }}",
                {selected_value: '{{ $row["site_id"] }}'});

        $("#supplier_id").jCombo("{{ URL::to('invoices/comboselect?filter=suppliers:id:supplier_name|account_ref|site_id') }}",
                {selected_value: '{{ $row["supplier_id"] }}'});

        $("#payment_method_id").jCombo("{{ URL::to('invoices/comboselect?filter=payment_methods:id:invoice_type') }}",
                {selected_value: '{{ $row["payment_method_id"] }}'});

    });
</script>
