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
        <div class="toolbar-line ">
            @if($access['is_add'] ==1)
                <a href="{{ URL::to('employee/add?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-info" title="{{ Lang::get('core.btn_create') }}">
                    <i class="fa fa-plus"></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
            @endif
            @if($access['is_remove'] ==1)
                <a href="javascript://ajax" onclick="SximoDelete();" class="tips btn btn-xs btn-danger"
                   title="{{ Lang::get('core.btn_remove') }}">
                    <i class="fa fa-trash-o"></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
            @endif
            @if($access['is_excel'] ==1)
                <a href="{{ URL::to('employee/download?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_download') }}">
                    <i class="fa fa-download"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
            @endif
            @if(Session::get('gid') ==1)
                <a href="{{ URL::to('module/config/employee') }}" class="tips btn btn-xs btn-default"
                   title="{{ Lang::get('core.btn_config') }}">
                    <i class="fa fa-cog"></i>&nbsp;{{ Lang::get('core.btn_config') }} </a>
            @endif


        </div>


        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        {{ $details }}

        {{ Form::open(array('url'=>'employee/destroy/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) }}
        <div class="table-responsive" style="min-height:300px;">
            <table class="table">
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
                        @if($row->processed == 1)
                            <td width="50" class="editable" style="background:darkseagreen">
                                @elseif ($row->reg_complete == 1)
                            <td width="50" class="editable" style="background:yellow">
                        @else
                            <td width="50" class="editable" style="background:indianred">
                                @endif
                                        <!-- status colour here -->
                            </td>

                            <td width="50"> {{ ++$i }} </td>
                            <td width="50"><input type="checkbox" class="ids" name="id[]"
                                                  value="{{ $row->employee_id }}"/>
                            </td>
                            @foreach ($tableGrid as $field)
                                @if($field['view'] =='1')
                                    <td>
                                        @if($field['attribute']['image']['active'] =='1')
                                            <!--this wont work for me as the files are tagged as "files", not as images-->
                                            {{ SiteHelpers::showUploadedFile($row->$field['field'],'/uploads/user_docs/'.$row->last_name.' '.$row->first_name.' ['.$row->employee_id.']/') }}

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
                                        {{--*/ $id = SiteHelpers::encryptID($row->employee_id) /*--}}
                                        @if($access['is_detail'] ==1)
                                            <li>
                                                <a href="{{ URL::to('employee/show/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                            class="fa  fa-search"></i> {{ Lang::get('core.btn_view') }}
                                                </a>

                                            </li>
                                        @endif
                                        @if($row->employee_id == Session::get('uid') or Session::get('lvl') <= GLOBAL_USER)
                                            @if($access['is_edit'] ==1)
                                                <li>
                                                    <a href="{{ URL::to('employee/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                                class="fa fa-edit"></i> {{ Lang::get('core.btn_edit') }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                        @if ($row->scan_p45_p46 != "")
                                        <li>
                                            <a href="{{ URL::to('employee/p45/'.$row->employee_id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                        class="fa fa-download"></i> Download P45
                                            </a>
                                        </li>
                                        @endif
                                        @if ($row->scan_p45_p46 != "")
                                            <li>
                                                <a href="{{ URL::to('employee/ni/'.$row->employee_id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                            class="fa fa-download"></i> Download NI
                                                </a>
                                            </li>
                                        @endif
                                        @if ($row->scan_p45_p46 != "")
                                            <li>
                                                <a href="{{ URL::to('employee/pass/'.$row->employee_id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                            class="fa fa-download"></i> Download Pass
                                                </a>
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

        <div class="alert alert-info" role="alert">
            <p> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Info:</span>

           <strong>Status Colours: </strong><br> Red : Registration incomplete <br> Yellow : Registration complete
                but not yet processed by accountant. <br> Green : Registration complete and processed.</p>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {

        $('.do-quick-search').click(function () {
            $('#SximoTable').attr('action', '{{ URL::to("employee/multisearch")}}');
            $('#SximoTable').submit();
        });

    });
</script>		