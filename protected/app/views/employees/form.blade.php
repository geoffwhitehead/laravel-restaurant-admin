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
            <li><a href="{{ URL::to('employees?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
        {{ Form::open(array('url'=>'employees/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> Employees</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Group Id" class=" control-label col-md-4 text-left"> Group Id <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='group_id' rows='5' id='group_id' code='{$group_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Site ID" class=" control-label col-md-4 text-left"> Site ID <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='organisation_id' rows='5' id='organisation_id' code='{$organisation_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Username" class=" control-label col-md-4 text-left"> Username <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('username', $row['username'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Email" class=" control-label col-md-4 text-left"> Email </label>

                    <div class="col-md-6">
                        {{ Form::text('email', $row['email'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="First Name" class=" control-label col-md-4 text-left"> First Name </label>

                    <div class="col-md-6">
                        {{ Form::text('first_name', $row['first_name'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Last Name" class=" control-label col-md-4 text-left"> Last Name </label>

                    <div class="col-md-6">
                        {{ Form::text('last_name', $row['last_name'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address Street" class=" control-label col-md-4 text-left"> Address Street </label>

                    <div class="col-md-6">
                        {{ Form::text('address_street', $row['address_street'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address Town" class=" control-label col-md-4 text-left"> Address Town </label>

                    <div class="col-md-6">
                        {{ Form::text('address_town', $row['address_town'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address County" class=" control-label col-md-4 text-left"> Address County </label>

                    <div class="col-md-6">
                        {{ Form::text('address_county', $row['address_county'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address Postcode" class=" control-label col-md-4 text-left"> Address Postcode </label>

                    <div class="col-md-6">
                        {{ Form::text('address_postcode', $row['address_postcode'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Employment Start" class=" control-label col-md-4 text-left"> Employment Start </label>

                    <div class="col-md-6">

                        {{ Form::text('employment_start', $row['employment_start'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }}
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
            </fieldset>
        </div>


        <div class="form-group">

            <label for="ipt" class=" control-label col-md-4 text-left"> </label>

            <div class="col-md-8">
                @if($row['id'] !='')
                    {{ Lang::get('core.notepassword') }}
                @else
                    Create Password
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.newpassword') }} </label>

            <div class="col-md-8">
                <input name="password" type="password" id="password" class="form-control input-sm" value=""
                @if($row['id'] =='')
                       required
                        @endif
                        />
            </div>
        </div>

        <div class="form-group">
            <label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.conewpassword') }} </label>

            <div class="col-md-8">
                <input name="password_confirmation" type="password" id="password_confirmation"
                       class="form-control input-sm" value=""
                @if($row['id'] =='')
                       required
                        @endif
                        />
            </div>
        </div>

    </div>

    <div style="clear:both"></div>

    <div class="form-group">
        <label class="col-sm-4 text-right">&nbsp;</label>

        <div class="col-sm-8">
            <input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} "/>
            <input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  "/>
            <button type="button"
                    onclick="location.href='{{ URL::to('employees?md='.$masterdetail["filtermd"].$trackUri) }}' "
                    id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
        </div>

    </div>

    {{ Form::close() }}
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#group_id").jCombo("{{ URL::to('employees/comboselect?filter=tb_groups:group_id:group_id|name|level') }}",
                {selected_value: '{{ $row["group_id"] }}'});

        $("#organisation_id").jCombo("{{ URL::to('employees/comboselect?filter=sites:id:id|address_city') }}",
                {selected_value: '{{ $row["organisation_id"] }}'});

    });
</script>