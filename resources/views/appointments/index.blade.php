@extends('layouts.master')


@section('content')
	<!-- page title -->
    <h1>Appointments</h1> 
    <hr/>
	
	<!-- display messages -->	
    @include('partials.flash_notification')
	<!-- if the user have saved any appointments -->
    @if(count($appointmentsList!==0))
        <div class="col-md-12 portlets">
            <div class="panel panel-lightblue">
				<div class="lightblue-panel-heading">
				   <a href="{{ url('/appointments/create') }}" class="btn btn-warning btn-block">Create new appointment</a>


                </div><br><br><br>
				@foreach ($appointmentsList as $appointment )
                <div class="panel-body">
      
                    <!-- calendar -->
                    <div id="calendar"> </div>
		
			<div class="col-sm-12 col-md-12">
				<!-- show delete option only for the upcoming appointments -->
				@if($appointment->start > $now )
					{!! Form::open(['route' => ['appointments.destroy', $appointment->id], 'class' => 'form-inline', 'method' => 'delete']) !!}
                                {!! Form::hidden('id', $appointment->id) !!}	    
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!} 
								<pre>{{$appointment->title}}</pre>
                            {!! Form::close() !!} 
			</div>
					@endif
            </div>

					@endforeach
			</div> 
		</div>	 
		<!-- if there ara no appointment records for this user: -->
		@else
			<div class="text-center">
				<h3>No appointments available yet</h3>
				<p><a href="{{ url('/appointmentsList/create') }}">Create new appointment</a></p>
			</div>
	@endif
	
<!-- footer section -->
@include('partials.footer')

@endsection

<!-- scripts for this page -->
@section('scripts')
	<!--  Google Calendar scripts -->
    <script src="/fullcalendar/js/fullcalendar.js"></script>
	<script src="/fullcalendar/js/fullcalendar.min.js"></script>

<script>
	$(document).ready(function() {
		//display calendar:
        $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        editable: true,
		// this allows things to be dropped onto the calendar 
        droppable: true, 
		// function that will be called when something is dropped
        drop: function(date, allDay) { 

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // copy the appointment so  multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            // render the event on the calendar
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // if the "remove after drop" checkbox is checked
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        },    
		//fetch appointments from the database:
        events: [@foreach ($appointmentsList as $appointment )
		{
            title: '{{$appointment->title}}',
   			start:'{{$appointment->start}}',
			end: '{{$appointment->end}}',
            color: 'yellow',
            textColor: 'green'
        } ,@endforeach],
            selectable: true,
            selectHelper: true
            });
        });
		

</script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
@stop