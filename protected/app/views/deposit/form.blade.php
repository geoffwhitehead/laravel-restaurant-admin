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
            <li><a href="{{ URL::to('deposit?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
        {{ Form::open(array('url'=>'deposit/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> Deposits</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
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
                    <label for="Booking Date Time" class=" control-label col-md-4 text-left"> Booking Date Time <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">

                        {{ Form::text('booking_date_time', $row['booking_date_time'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Booking Name" class=" control-label col-md-4 text-left"> Booking Name <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('booking_name', $row['booking_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Booking Phone" class=" control-label col-md-4 text-left"> Booking Phone <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('booking_phone', $row['booking_phone'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>


                <div class="form-group  ">
                    <label for="Booking Covers" class=" control-label col-md-4 text-left"> Booking Covers <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('booking_covers', $row['booking_covers'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                @if($row['id'] == "")
                    <div class="form-group  ">
                        <label for="Deposit Amount" class=" control-label col-md-4 text-left"> Deposit Amount <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('deposit_amount', $row['deposit_amount'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>




                    <div class="form-group  ">
                        <label for="Payment Method" class=" control-label col-md-4 text-left"> Payment Method <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            <select name='payment_method' rows='5' id='payment_method' code='{$payment_method}'
                                    class='select2 ' required></select>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                @else
                    <div class="form-group  ">
                        <label for="Deposit Amount" class=" control-label col-md-4 text-left"> Deposit Amount <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('deposit_amount', $row['deposit_amount'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number', 'readonly'  )) }}
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group hidethis " style="display:none;">
                        <label for="Payment Method" class=" control-label col-md-4 text-left"> Payment Method <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            <select name='payment_method' rows='5' id='payment_method' code='{$payment_method}'
                                    class='select2 '></select>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                @endif
                @if($row['id'] != "")
                    <div class="form-group  ">
                        <label for="No Show" class=" control-label col-md-4 text-left"> No Show </label>

                        <div class="col-md-6">

                            <label class='radio radio-inline'>
                                <input type='radio' name='no_show_flag' value='0'  @if($row['no_show_flag'] == '0')
                                       checked="checked" @endif > No </label>
                            <label class='radio radio-inline'>
                                <input type='radio' name='no_show_flag' value='1'  @if($row['no_show_flag'] == '1')
                                       checked="checked" @endif > Yes </label>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
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
                        onclick="location.href='{{ URL::to('deposit?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#site_id").jCombo("{{ URL::to('deposit/comboselect?filter=sites:id:id|name|address_city') }}",
                {selected_value: '{{ $row["site_id"] }}'});

        $("#payment_method").jCombo("{{ URL::to('deposit/comboselect?filter=payment_methods:id:invoice_type') }}",
                {selected_value: '{{ $row["payment_method"] }}'});

    });
</script>







