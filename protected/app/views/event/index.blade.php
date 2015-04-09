{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-title">
            <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
        </div>

        <ul class="breadcrumb">
            <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
            <li class="active">{{ $pageTitle }}</li>
        </ul>

    </div>
        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        {{ $details }}
    <div id="event_content">
        <div id='external-events'>
            <h4>Shifts</h4>
            <div id='lunch'><h4>Lunch</h4></div>
            <div id='evening'><h4>Evening</h4></div>
            <h4>Status panel</h4>
            <div id="status_panel" style=""></div>
            <div id="loading" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);">{{ HTML::image('sximo/images/spinner.gif') }}</div>
            <div id="calendar"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
      var shift_type_duration = [3.5, 5.5];
      var shift_type_id       = ["#lunch", "#evening"];
      var shift_type_class    = ["label-success", "label-warning"];

      //hide the loading bar, initially
      //$('#loading').hide();

      $.ajax({
          url: '/event/users/',
          type: 'GET',
          dataType: 'JSON',
          success: function(json) {
              //alert('success');
              for(var i=0; i<=1; i++) {
                  for(var j=0;j<json.length;j++){
                      var eventObject = {
                          title: json[j]['last_name'] + ', ' + json[j]['first_name'],
                          user_id: json[j]['id'],
                          duration: shift_type_duration[i]
                      }

                      $('<div/>', {
                          class: 'label ' + shift_type_class[i],
                          text: json[j]['first_name'] + " " + json[j]['last_name']
                      }).data('eventObject', eventObject).draggable({
                          zIndex: 999,
                          revert: true,      // will cause the event to go back to its
                          revertDuration: 0  //  original position after the drag
                      }).appendTo('#external-events ' + shift_type_id[i]);
                  }
              }
          }
      });

      // page is now ready, initialize the calendar...

      $('#calendar').fullCalendar({
          // put your options and callbacks here
          header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,agendaWeek,agendaDay'
          },
          defaultView: 'agendaWeek',
          defaultDate: '{{date('Y-m-d')}}',
          minTime: '11:00:00',
          editable: true,
          droppable: true,
          eventLimit: true, // allow "more" link when too many events
          eventAfterAllRender: function( view ) {
              var events = $('#calendar').fullCalendar('clientEvents');
              var satCount = 0;
              var satStart = moment('2015-03-07 16:00', 'YYYY-MM-DD hh:mm');
              var satEnd = moment('2015-03-07 23:59', 'YYYY-MM-DD hh:mm');
              $.each(events, function(index, value) {
                  if (value.start.isAfter(satStart) && value.end.isBefore(satEnd)) {
                      satCount++;
                  }
              });
              //alert(satCount);
          },
          eventResize: function( event, delta, revertFunc, jsEvent, ui, view ) {
              $.ajax({
                  url: ('/event/edit'),
                  type: 'POST',
                  data: ({
                      id: event.id,
                      start: event.start.format(),
                      end: event.end.format()
                  }),
                  success: function (data) {
                      //$('#calendar').fullCalendar('refetchEvents');
                  },
                  error: function (xhr, status, error) {
                      alert("fail " + status + " " + error);
                      revertFunc();
                  }
              });
          },
          eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) {

              //alert("/event/" + event.id + "/" + event.start.format() + "/" + event.end.format());
              $.ajax({
                  url: ('/event/edit'),
                  type: 'POST',
                  data: ({
                      id: event.id,
                      start: event.start.format(),
                      end: event.end.format()
                  }),
                  success: function (data) {

                  },
                  error: function (xhr, status, error) {
                      alert("fail " + status + " " + error);
                      revertFunc();
                  }
              });

          },
          drop: function(date) {
              // retrieve the dropped element's stored Event Object
              var originalEventObject = $(this).data('eventObject');

              // we need to copy it, so that multiple events don't have a reference to the same object
              var copiedEventObject = $.extend({}, originalEventObject);

              // assign it the date that was reported
              copiedEventObject.start = date;
              copiedEventObject.end = moment(date).add(copiedEventObject.duration, 'hours');

              //TODO: events dragged onto screen have the ID of user, not the shift id? this needs to be fixed.
              $.ajax({
                  url: ('/event/create'),
                  type: 'POST',
                  data: {
                      id: copiedEventObject.user_id,
                      start: moment(date).format(),
                      end: moment(date).add(copiedEventObject.duration, 'hours').format()
                  },
                  success: function (data) {
                      // render the event on the calendar
                      // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                      copiedEventObject.id = data;
                      $('#calendar').fullCalendar('renderEvent', copiedEventObject, false);
                  },
                  error: function (xhr, status, error) {
                      alert("fail " + status + " " + error);
                  }
              });


          },
          timeFormat: 'h:mm',
          eventSources: [
              {
                  url: '/event/list',
                  type: 'GET',
                  data: {
                      custom_param1: 'manager_conf_flag',
                      custom_param2: 'admin_conf_flag',
                      custom_param3: 'paid',
                      custom_param4: 'last_name'
                  },
                  error: function() {
                      alert('there was an error while fetching events!');
                  }
              }
          ],
          loading: function(isLoading, view) {
              if (isLoading) {
                  $('#loading').show();
              } else {
                  $('#loading').hide();
              }

          }
      })

  });
</script>