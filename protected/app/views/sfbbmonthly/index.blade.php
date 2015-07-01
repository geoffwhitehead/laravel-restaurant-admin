{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
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
            <li class="active">{{ $pageTitle }}</li>
        </ul>

    </div>


    <div class="page-content-wrapper">
        @if (Session::get('did') == GLOBAL_DEP or Session::get('did') == KITCHEN_DEP )
            @if ($count_recent[0]->cnt == 0)
                <div class="form container">
        {{ Form::open(array('url'=>'sfbbmonthly/save/', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> SFBB Monthly Log</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>
                    <div class="col-md-6">
                        {{ Form::text('id', "",array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Problems" class=" control-label col-md-4 text-left"> Problems </label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='problems' value='0'
                                   checked="checked"  > No </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='problems' value='1' > Yes </label>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Problem Details" class=" control-label col-md-4 text-left"> Problem Details </label>

                    <div class="col-md-6">
									  <textarea name='problem_details' rows='2' id='problem_details'
                                                class='form-control '
                                              >{{  "" }}</textarea>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Problem Remedy" class=" control-label col-md-4 text-left"> Problem Remedy </label>

                    <div class="col-md-6">
									  <textarea name='problem_remedy' rows='2' id='problem_remedy' class='form-control '
                                              ></textarea>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="New Staff" class=" control-label col-md-4 text-left"> New Staff </label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='new_staff' value='0'  checked="checked" > No </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='new_staff' value='1'  > Yes </label>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="New Staff Trained" class=" control-label col-md-4 text-left"> New Staff Trained </label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='new_staff_trained'
                                   value='0'  checked="checked"  > No
                        </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='new_staff_trained'
                                   value='1'  > Yes
                        </label>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Menu Changed" class=" control-label col-md-4 text-left"> Menu Changed </label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='menu_changed' value='0' checked="checked"  > No </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='menu_changed' value='1'  > Yes </label>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Review Methods" class=" control-label col-md-4 text-left"> Review Methods </label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='review_methods' value='0'   checked="checked"  > No </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='review_methods' value='1'  > Yes </label>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Changes" class=" control-label col-md-4 text-left"> Changes </label>

                    <div class="col-md-6">
									  <textarea name='changes' rows='2' id='changes' class='form-control '
                                              >{{  ""}}</textarea>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="New Supply" class=" control-label col-md-4 text-left"> New Supply </label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='new_supply' value='0'  checked="checked" > No </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='new_supply' value='1'  > Yes </label>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Affected Methods Comments" class=" control-label col-md-4 text-left"> Affected Methods
                        Comments </label>

                    <div class="col-md-6">
									  <textarea name='affected_methods_comments' rows='2' id='affected_methods_comments'
                                                class='form-control '
                                              ></textarea>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="New Equipment" class=" control-label col-md-4 text-left"> New Equipment </label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='new_equipment' value='0'   checked="checked" > No </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='new_equipment' value='1'  > Yes </label>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="New Equipment Comments" class=" control-label col-md-4 text-left"> New Equipment
                        Comments </label>

                    <div class="col-md-6">
									  <textarea name='new_equipment_comments' rows='2' id='new_equipment_comments'
                                                class='form-control '
                                              ></textarea>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Other Changes" class=" control-label col-md-4 text-left"> Other Changes </label>

                    <div class="col-md-6">
									  <textarea name='other_changes' rows='2' id='other_changes' class='form-control '
                                              ></textarea>
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
                <input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  "/>
            </div>

        </div>

        {{ Form::close() }}

</div>
    @else
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <span class="sr-only">Info:</span>

                    Your all good!  <strong> {{ SiteHelpers::gridDisplayView($count_recent[0]->created_by,'created_by','1:tb_users:id:first_name|last_name') }} </strong> site has already submitted a log within the last month.
                    Check the log below for details </p>
            </div>
        </div>
    @endif


        <div class="toolbar-line ">
            @if($access['is_add'] ==1)
                <a href="{{ URL::to('sfbbmonthly/add?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-info" title="{{ Lang::get('core.btn_create') }}">
                    <i class="fa fa-plus"></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
            @endif
            @if($access['is_remove'] ==1)
                <a href="javascript://ajax" onclick="SximoDelete();" class="tips btn btn-xs btn-danger"
                   title="{{ Lang::get('core.btn_remove') }}">
                    <i class="fa fa-trash-o"></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
            @endif
            @if($access['is_excel'] ==1)
                <a href="{{ URL::to('sfbbmonthly/download?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_download') }}">
                    <i class="fa fa-download"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
            @endif
            @if(Session::get('gid') ==1)
                <a href="{{ URL::to('module/config/sfbbmonthly') }}" class="tips btn btn-xs btn-default"
                   title="{{ Lang::get('core.btn_config') }}">
                    <i class="fa fa-cog"></i>&nbsp;{{ Lang::get('core.btn_config') }} </a>
            @endif

        </div>


        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        {{ $details }}

        {{ Form::open(array('url'=>'sfbbmonthly/destroy/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) }}
        <div class="table-responsive" style="min-height:300px;">
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th> No</th>
                    <th><input type="checkbox" class="checkall"/></th>

                    @foreach ($tableGrid as $t)
                        @if($t['view'] =='1')
                            <th>{{ $t['label'] }}</th>
                        @endif
                    @endforeach
                    <th>{{ Lang::get('core.btn_action') }}</th>
                </tr>
                </thead>

                <tbody>
                <tr id="sximo-quick-search">
                    <td> #</td>
                    <td></td>
                    @foreach ($tableGrid as $t)
                        @if($t['view'] =='1')
                            <td>
                                {{ SiteHelpers::transForm($t['field'] , $tableForm) }}
                            </td>
                        @endif
                    @endforeach
                    <td style="width:130px;">
                        <input type="hidden" value="Search">
                        <button type="button" class=" do-quick-search btn btn-xs btn-info"> GO</button>
                    </td>
                </tr>
                @foreach ($rowData as $row)
                    <tr>
                        <td width="50"> {{ ++$i }} </td>
                        <td width="50"><input type="checkbox" class="ids" name="id[]" value="{{ $row->id }}"/></td>
                        @foreach ($tableGrid as $field)
                            @if($field['view'] =='1')
                                <td>
                                    @if($field['attribute']['image']['active'] =='1')
                                        {{ SiteHelpers::showUploadedFile($row->$field['field'],$field['attribute']['image']['path']) }}
                                    @else
                                        {{--*/ $conn = (isset($field['conn']) ? $field['conn'] : array() ) /*--}}
                                        {{ SiteHelpers::gridDisplay($row->$field['field'],$field['field'],$conn) }}
                                    @endif
                                </td>
                            @endif
                        @endforeach
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fa fa-cog"></i> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu  icons-left pull-right">
                                    {{--*/ $id = SiteHelpers::encryptID($row->id) /*--}}
                                    @if($access['is_detail'] ==1)
                                        <li>
                                            <a href="{{ URL::to('sfbbmonthly/show/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                        class="fa  fa-search"></i> {{ Lang::get('core.btn_view') }}</a>
                                        </li>
                                    @endif
                                    @if($access['is_edit'] ==1)
                                        <li>
                                            <a href="{{ URL::to('sfbbmonthly/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                        class="fa fa-edit"></i> {{ Lang::get('core.btn_edit') }}</a>
                                        </li>
                                    @endif
                                    @foreach($subgrid as $md)
                                        <li>
                                            <a href="{{ URL::to($md['module'].'?md='.$md['master'].'+'.$md['master_key'].'+'.$md['module'].'+'.$md['key'].'+'.$id) }}"><i
                                                        class="icon-eye2"></i> {{ $md['title'] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>
            <input type="hidden" name="md" value="{{ $masterdetail['filtermd']}}"/>
        </div>
        {{ Form::close() }}
        @include('footer')
        @else
            <div class="alert alert-info col-md-12" role="alert">
                <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Info:</span>
                    You need to be logged in with global site access or in a kitchen department to view this page</p>
            </div>
        @endif
    </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $('.do-quick-search').click(function () {
            $('#SximoTable').attr('action', '{{ URL::to("sfbbmonthly/multisearch")}}');
            $('#SximoTable').submit();
        });

    });
</script>		