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
        {{ Form::open(array('url'=>'invoice/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
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
                @if (Session::get('gid') <=3){

                <div class="form-group  ">
                    <label for="Site Id" class=" control-label col-md-4 text-left"> Site Id </label>

                    <div class="col-md-6">
                        <select name='site_id' rows='5' id='site_id' code='{$site_id}'
                                class='select2 '></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                }
                @endif
                <div class="form-group  ">
                    <label for="Supplier Id" class=" control-label col-md-4 text-left"> Supplier Id <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='supplier_id' rows='5' id='supplier_id' code='{$supplier_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Payment Method Id" class=" control-label col-md-4 text-left"> Payment Method Id <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6" id="payMethod">
                        <select name='payment_method_id' rows='5' id='payment_method_id' code='{$payment_method_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
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
                <div class="form-group  " id="cashRadio">
                    <label for="Cash Taken" class=" control-label col-md-4 text-left"> Cash Taken <span class="asterix"> * </span></label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='cash_taken' value='0' required @if($row['cash_taken'] == '0')
                                   checked="checked" @endif > No </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='cash_taken' value='1' required @if($row['cash_taken'] == '1')
                                   checked="checked" @endif > Yes </label>
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


        <div style="clear:both"></div>

        <div class="form-group">
            <label class="col-sm-4 text-right">&nbsp;</label>

            <div class="col-sm-8">
                <input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} "/>
                <input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  "/>
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
        $('#cashRadio :input').attr('disabled', true);

        $("#site_id").jCombo("{{ URL::to('invoice/comboselect?filter=sites:id:id|address_city') }}",
                {selected_value: '{{ $row["site_id"] }}'});

        $("#supplier_id").jCombo("{{ URL::to('invoice/comboselect?filter=suppliers:id:supplier_name|account_ref|site_id') }}",
                {selected_value: '{{ $row["supplier_id"] }}'});

        $("#payment_method_id").jCombo("{{ URL::to('invoice/comboselect?filter=payment_methods:id:invoice_type') }}",
                {selected_value: '{{ $row["payment_method_id"] }}'});


    });

    $("#payMethod").focusout(function () {
        if (($("#payment_method_id option:selected").val()) == 1) {
            $('#cashRadio :input').removeAttr('disabled');
        } else {
            $('#cashRadio :input').attr('disabled', true);
        }
    })

</script>