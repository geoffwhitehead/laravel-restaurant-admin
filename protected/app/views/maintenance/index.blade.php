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


        {{ Form::open(array('url'=>'checkslog/save/', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> Submit a Service Record</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-1 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', "",array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Check Id" class=" control-label col-md-1 text-left"> Check Id <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='check_id' rows='5' id='check_id' code='{$check_id}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Certificate / Receipt Upload" class=" control-label col-md-1 text-left"> Certificate /
                        Receipt Upload </label>

                    <div class="col-md-6">
                        <input  type='file' name='file_upload_proof' id='file_upload_proof' style='width:150px !important;'  />
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>
                <div class="form-group  ">
                    <label class=" control-label col-md-1 text-left"></label>

                    <div class="alert alert-warning col-md-6" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Info:</span>
                        Uploaded file must be in .pdf format.
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>


                <div class="form-group  ">
                    <label for="Service Id" class=" control-label col-md-1 text-left"> Service Id </label>

                    <div class="col-md-6">
                        <select name='service_id' rows='5' id='service_id' code='{$service_id}'
                                class='select2 '></select>
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Comments" class=" control-label col-md-1 text-left"> Comments </label>

                    <div class="col-md-6">
                        {{ Form::text('comments', "",array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>
            </fieldset>
        </div>


        <div style="clear:both"></div>

        <div class="form-group">
            <label class="col-sm-2 text-right">&nbsp;</label>

            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  "/>
                <button type="button"
                        onclick="location.href='{{ URL::to('maintenance?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}










        <div class="toolbar-line ">
            @if($access['is_add'] ==1)
                <a href="{{ URL::to('maintenance/add?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-info" title="{{ Lang::get('core.btn_create') }}">
                    <i class="fa fa-plus"></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
            @endif
            @if($access['is_remove'] ==1)
                <a href="javascript://ajax" onclick="SximoDelete();" class="tips btn btn-xs btn-danger"
                   title="{{ Lang::get('core.btn_remove') }}">
                    <i class="fa fa-trash-o"></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
            @endif
            @if($access['is_excel'] ==1)
                <a href="{{ URL::to('maintenance/download?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_download') }}">
                    <i class="fa fa-download"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
            @endif
            @if(Session::get('gid') ==1)
                <a href="{{ URL::to('module/config/maintenance') }}" class="tips btn btn-xs btn-default"
                   title="{{ Lang::get('core.btn_config') }}">
                    <i class="fa fa-cog"></i>&nbsp;{{ Lang::get('core.btn_config') }} </a>
            @endif

        </div>


        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        {{ $details }}




        {{ Form::open(array('url'=>'maintenance/destroy/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) }}
        <div class="table-responsive" style="min-height:300px;">
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th>Status</th>
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
                    <td></td>
                    <td> #</td>
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
                    <td></td>
                </tr>
                @foreach ($rowData as $row)
                    <tr>


                        <!--the if statements define frequency brackets to change the status of jobs. This is represented by a colour. Yellow is when a job is nearly due, red is past, and green is within range-->

                        <!--if monitored with checks system-->
                        @if($row->monitor_in_checks == 1)

                            @if(($row->datediff >= $row->freq) or is_null($row->datediff))
                                <td width="50" class="editable" style="background:indianred"></td>

                            @elseif ($row->datediff >= ($row->freq*0.75))
                                <td width="50" class="editable" style="background:yellow"></td>
                            @else
                                <td width="50" class="editable" style="background:darkseagreen"></td>
                                @endif
                                        <!--if not monitored with check system-->
                                @else
                                    <td width="50" class="editable" style="background:slategrey"></td>
                                @endif



                                <td width="50"> {{ ++$i }} </td>
                                <td width="50"><input type="checkbox" class="ids" name="id[]" value="{{ $row->id }}"/>
                                </td>
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
                                                    <a href="{{ URL::to('maintenance/show/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                                class="fa  fa-search"></i> {{ Lang::get('core.btn_view') }}
                                                    </a></li>
                                            @endif
                                            @if($access['is_edit'] ==1)
                                                <li>
                                                    <a href="{{ URL::to('maintenance/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                                class="fa fa-edit"></i> {{ Lang::get('core.btn_edit') }}
                                                    </a></li>
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
        <div class="alert alert-info" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Info:</span>
            <strong>Status Colours: </strong><br>
            <strong>Green:</strong> Job Complete<br>
            <strong>Yellow:</strong> Job is approaching its due date<br>
            <strong>Red:</strong> Job is past its due date<br>
            <strong>Grey:</strong> Not monitored<br>
            <br>

            <strong>Note:</strong> Only jobs that are applicable to your currently selected position will be shown here.
            If you are assigned to multiple positions change your site and department on the dashboard and return to
            this page to view jobs for that section<br>

        </div>

    </div>
</div>
<script>
    $(document).ready(function () {

        $('.do-quick-search').click(function () {
            $('#SximoTable').attr('action', '{{ URL::to("maintenance/multisearch")}}');
            $('#SximoTable').submit();
        });
        $("#check_id").jCombo("{{ URL::to('temp/comboselect?filter=checks:id:check_name') }}","");

        $("#service_id").jCombo("{{ URL::to('temp/comboselect?filter=service_contacts:id:name') }}","");

    });
</script>		