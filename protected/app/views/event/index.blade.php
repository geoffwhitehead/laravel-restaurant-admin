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
            <div id='external-events'><h4>Shifts</h4>

            </div>
            <div id="calendar"></div>
        </div>

    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
      $.ajax({
          url: '/event/users/',
          type: 'GET',
          dataType: 'JSON',
          success: function(json) {
              //alert('success');
              for(var i=0;i<json.length;i++){
                  var eventObject = {
                      title: json[i]['last_name'] + ', ' + json[i]['first_name'],
                      id: json[i]['id'],
                      duration: 1
                  }

                  $('<div/>', {
                      class: 'label label-success',
                      text: json[i]['first_name'] + " " + json[i]['last_name']
                  }).data('eventObject', eventObject).draggable({
                      zIndex: 999,
                      revert: true,      // will cause the event to go back to its
                      revertDuration: 0  //  original position after the drag
                  }).appendTo('#external-events');
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
          editable: true,
          droppable: true,
          eventLimit: true, // allow "more" link when too many events
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
                      alert("success");
                      //$('#calendar').fullCalendar('refetchEvents');
                  },
                  error: function (xhr, status, error) {
                      alert("fail");
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
                      alert("success");
                  },
                  error: function (xhr, status, error) {
                      alert("fail");
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

              // render the event on the calendar
              // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
              $('#calendar').fullCalendar('renderEvent', copiedEventObject, false);

              $.ajax({
                  url: ('/event/create'),
                  type: 'POST',
                  data: {
                      id: copiedEventObject.id,
                      start: moment(date).format(),
                      end: moment(date).add(copiedEventObject.duration, 'hours').format()
                  },
                  success: function (data) {
                      alert("success");
                  },
                  error: function (xhr, status, error) {
                      alert("fail");
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
          ]
      })

  });
</script>