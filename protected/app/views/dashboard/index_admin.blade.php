<div class="page-content row">
    <div class="page-header">
        <div class="page-title">
            <h3> Dashboard Head Title
                <small> Small Note</small>
            </h3>
        </div>

        <ul class="breadcrumb">
            <li><a href="{{ URL::to('dashboard') }}">Home</a></li>
            <li class="active">Dashboard</li>
        </ul>

    </div>

    <div class="page-content-wrapper">

        @if(Session::has('message'))
            {{ Session::get('message') }}
    </div>
    @endif
            <!-- these select boxes will control which site and department are currently active in the session variables-->
    <div class="panel panel-default">
        <!-- <div class="panel-heading">
              <div class="panel-title"><h3>Select your current site and department</h3></div>
          </div>-->
        <div class="panel-body" >
            <div>
                <label>Site</label><br/>
                <select name='site_id' rows='5' id='site_id' class='select2 '>

                    @foreach ($sites as $site)
                        @if ($site->id == Session::get('sid'))
                            <option selected value="{{$site->id}}">{{$site->name}}
                                , {{$site->address_city}}</option>
                        @else
                            <option value="{{$site->id}}">{{$site->name}}, {{$site->address_city}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label>Department</label><br/>
                <select name='dep_id' rows='5' id='dep_id' class='select2 '>
                    @foreach ($departments as $dep)
                        @if ($dep->id == Session::get('did'))
                            <option selected value=" {{$dep->id}}"> {{$dep->name}}</option>
                        @else
                            <option value=" {{$dep->id}}"> {{$dep->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="alert alert-info" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Info:</span>

        <p><strong>Note: </strong><br> D</p>
    </div>


</div>
</div>
<script>

    $("#site_id").change(function () {
        $sid = $("#site_id option:selected").val();
        alert($sid);
        $.ajax({
            type: 'POST',
            url: 'changesite',
            dataType: 'json',
            data: {
                sid: $sid
            },
            success: function (data) {
                if (data === 'success') {
                    window.location.href = "dashboard";
                }

            }
        });
    });

    $("#dep_id").change(function () {
        $did = $("#dep_id option:selected").val();
        alert($did);
        $.ajax({
            type: 'POST',
            url: 'changedep',
            dataType: 'json',
            data: {
                did: $did
            }
            ,
            success: function (data) {
                if (data === 'success') {
                    window.location.href = "dashboard";
                }

            }
        });
    });
</script>