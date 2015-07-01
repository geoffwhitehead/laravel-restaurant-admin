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
            <li><a href="{{ URL::to('maintenance?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
        {{ Form::open(array('url'=>'maintenance/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> Service & Maintainance</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Check Name" class=" control-label col-md-4 text-left"> Check Name <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('check_name', $row['check_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Description" class=" control-label col-md-4 text-left"> Description <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('description', $row['description'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Check Frequency" class=" control-label col-md-4 text-left"> Check Frequency </label>

                    <div class="col-md-6">
                        <select name='check_frequency' rows='5' id='check_frequency' code='{$check_frequency}'
                                class='select2 '></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Site" class=" control-label col-md-4 text-left"> Site </label>

                    <div class="col-md-6">
                        <select name='site_id' rows='5' id='site_id' code='{$site_id}'
                                class='select2 '></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Department" class=" control-label col-md-4 text-left"> Department <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='department_id' rows='5' id='department_id' code='{$department_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Equipment / Appliance" class=" control-label col-md-4 text-left"> Equipment /
                        Appliance </label>

                    <div class="col-md-6">
                        <select name='equipment_id' rows='5' id='equipment_id' code='{$equipment_id}'
                                class='select2 '></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Monitored?" class=" control-label col-md-4 text-left"> Monitored? </label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='monitor_in_checks'
                                   value='0'  @if($row['monitor_in_checks'] == '0') checked="checked" @endif > No
                        </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='monitor_in_checks'
                                   value='1'  @if($row['monitor_in_checks'] == '1') checked="checked" @endif > Yes
                        </label>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                @if (Input::get('id') != "")
                    <div class="form-group  ">
                        <label for="Active" class=" control-label col-md-4 text-left"> Active </label>

                        <div class="col-md-6">

                            <label class='radio radio-inline'>
                                <input type='radio' name='active' value='0'  @if($row['active'] == '0')
                                       checked="checked" @endif > No </label>
                            <label class='radio radio-inline'>
                                <input type='radio' name='active' value='1'  @if($row['active'] == '1')
                                       checked="checked" @endif > Yes </label>
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
                @if (Input::get('id') != "")
                    <input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} "/>
                @else
                    <input type="submit" name="submit" class="btn btn-primary"
                           value="{{ Lang::get('core.sb_save') }}  "/>
                @endif
                <button type="button"
                        onclick="location.href='{{ URL::to('maintenance?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#check_frequency").jCombo("{{ URL::to('maintenance/comboselect?filter=check_time_periods:id:name') }}",
                {selected_value: '{{ $row["check_frequency"] }}'});

        $("#site_id").jCombo("{{ URL::to('maintenance/comboselect?filter=sites:id:address_city') }}",
                {selected_value: '{{ $row["site_id"] }}'});

        $("#department_id").jCombo("{{ URL::to('maintenance/comboselect?filter=departments:id:name') }}",
                {selected_value: '{{ $row["department_id"] }}'});

        $("#equipment_id").jCombo("{{ URL::to('maintenance/comboselect?filter=equipment:id:name') }}",
                {selected_value: '{{ $row["equipment_id"] }}'});

    });
</script>