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
            <li><a href="{{ URL::to('assign?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
        {{ Form::open(array('url'=>'assign/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> Assign an Employee</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                @if ($row['id'] == "")
                    <div class="form-group  ">
                        <label for="User Id" class=" control-label col-md-4 text-left"> User Id </label>

                        <div class="col-md-6">
                            <select name='user_id' rows='5' id='user_id' code='{$user_id}'
                                    class='select2 '></select>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Site Id" class=" control-label col-md-4 text-left"> Site Id </label>

                        <div class="col-md-6">
                            <select name='site_id' rows='5' id='site_id' code='{$site_id}'
                                    class='select2 '></select>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Department Id" class=" control-label col-md-4 text-left"> Department Id </label>

                        <div class="col-md-6">
                            <select name='department_id' rows='5' id='department_id' code='{$department_id}'
                                    class='select2 '></select>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                @endif
                @if ($row['id'] != "")
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
                @if ($row['id'] != "")
                    <input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} "/>
                @else
                    <input type="submit" name="submit" class="btn btn-primary"
                           value="{{ Lang::get('core.sb_save') }}  "/>
                @endif
                <button type="button"
                        onclick="location.href='{{ URL::to('assign?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#user_id").jCombo("{{ URL::to('assign/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
                {selected_value: '{{ $row["user_id"] }}'});

        $("#site_id").jCombo("{{ URL::to('assign/comboselect?filter=sites:id:name|address_city') }}",
                {selected_value: '{{ $row["site_id"] }}'});

        $("#department_id").jCombo("{{ URL::to('assign/comboselect?filter=departments:id:id|name') }}",
                {selected_value: '{{ $row["department_id"] }}'});

    });
</script>