<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-title">
            <h3> Temperature Record
                <small></small>
            </h3>
        </div>

        <ul class="breadcrumb">
            <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
            <li class="active"></li>
        </ul>

    </div>


    <div class="page-content-wrapper">
        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        <div class="container">
            <div id="content">

                <!-- DYNAMICALLY CREATED FORM FOR INPUTTING TEMPERATURES-->
                @if($recent_log[0]->timediff < "08:00:00")
                    <div class="alert alert-success col-md-12" role="alert">
                        <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            <span class="sr-only">Info:</span>

                            You're all good! A temperature log has already been submitted
                            by
                            <strong> {{ SiteHelpers::gridDisplayView($recent_log[0]->completed_by,'completed_by','1:tb_users:id:first_name|last_name') }} </strong>
                            within the last 8 hours.</p>
                        <i class="fa fa-bank fa-4x"></i>
                    </div>
                @else
                    <div class="col-md-12" id="temp-form">
                        {{ Form::open(array('url'=>'temperatures/store', 'class'=>'form-horizontal','parsley-validate'=>'','novalidate'=>' ')) }}

                        <fieldset>
                            <legend> Submit a Temp Record</legend>


                            @foreach ($equipment as $eq)
                                <div class="form-group  ">
                                    <label for="{{$eq->id}}"
                                           class="control-label col-md-4 text-left">{{$eq->name}}</label>

                                    <div class="col-md-6">
                                        {{ Form::text($eq->id, "",array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                            @endforeach
                        </fieldset>

                        <div class="form-group">
                            <label class="col-sm-4 text-right">&nbsp;</label>

                            <div class="col-sm-8">
                                <input type="submit" name="submit" class="btn btn-primary"
                                       value="Submit  "/>
                            </div>

                        </div>
                        {{ Form::close() }}
                    </div>
                    @endif
                            <!-- THIS SECTION IS FOR DISPLAY THE LASt 100 RESULTS OF EACH PEICE OF EQUIPMENT------>
                    <div class="col-md-12" id="temp-tabs">
                        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                            <li class="active"><a href="#intro" data-toggle="tab">Intro</a></li>
                            @foreach ($equipment as $eq)

                                <li><a href="#{{$eq->id}}" data-toggle="tab">{{$eq->name}}</a></li>
                            @endforeach
                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="intro">
                                <h3>intro</h3>

                                <p>Select the tab to view the reords for that peice of equipment.</p>

                                <p>The last 100 records from the database will be shown for each piece of equipment,
                                    contact management to obtain logs dated further back than this</p>
                            </div>
                            @foreach ($equipment as $eq)
                                <div class="tab-pane" id={{$eq->id}}>
                                    <h1>{{$eq->name}} Temperature Log</h1>


                                    <div class="table-responsive" style="min-height:300px;">
                                        <table class="table">

                                            <thead>

                                            <tr>
                                                <th>Date</th>
                                                <th>Temperature (degrees C)</th>
                                                <th>Time</th>
                                                <th>Checked By</th>

                                            </tr>

                                            </thead>
                                            <tbody>

                                            @foreach($logs[$eq->id] as $log)
                                                <tr>
                                                    <td>
                                                        {{date_format(date_create($log->completed_on), 'Y-m-d')}}
                                                    </td>
                                                    <td>
                                                        {{ $log->value}}
                                                    </td>
                                                    <td>
                                                        {{date_format(date_create($log->completed_on), 'H:i:s')}}
                                                    </td>
                                                    <td>
                                                        {{ SiteHelpers::gridDisplayView($log->completed_by,'completed_by','1:tb_users:id:first_name|last_name') }}

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>


                                        </table>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>

            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    $('#tabs').tab();
                });
            </script>
        </div>
    </div>
    <script>
        $(document).ready(function () {


        });
    </script>