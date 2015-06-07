@extends('layouts.master')
	<!-- head section for this page : -->
	@section('head')
	<script src="js/Chart.js"></script>

	@stop

@section('content')
	<!-- page title -->
    <h1>Weight</h1> 
    <hr/>		
	<br>
	
	
    @include('partials.flash_notification')

   @if(count($weightList)!==0)
	   <a href="{{ url('/weight/create') }}" class="btn btn-warning btn-block">Add New weight record</a>
		<br>
	 <div class="col-sm-6">
	   <canvas id="canvas" height="300" width="500"></canvas>
	 </div>
	 <div class="col-sm-6">
	 
		 
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>weight</th>
                    <th>Status</th>
					<th>Date - Time</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                @foreach($weightList as $weight)
                    <tr>
                        <td>{{ $weight->weight }}</td>
                        <td>	
							<div class="progress">

								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="10" aria-valuemax="200" style="width: {{ $weight->weight }}%">

							</div>

						<td>{{ $weight->created_at }}</td>
					</div>	</td>

<td>						  
                            

                            {!! Form::open(['route' => ['weight.destroy', $weight->id], 'class' => 'form-inline', 'method' => 'delete']) !!}
                                {!! Form::hidden('id', $weight->id) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
						</div>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>	

					
							                          


				

        <div class="text-center">
            {!! $weightList->render() !!}
        </div>
    
    @else
        <div class="text-center">
            <h3>No weight records available yet</h3>
            <p><a href="{{ url('/weight/create') }}">enter a weight record</a></p>
        </div>
    @endif
	
@endsection


@section('scripts')
  <script src="assets/chart-master/Chart.js"></script>
<script>

      $(document).ready(function() {
		var lineChartData = {
			labels : ["start","{{ $weight->created_at }}"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					data : [		
					@foreach ($weightList as $weight)
        

         
		 {{$weight->weight}},        
			 @endforeach          
        ]
				}
			]
			
		}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	      });
	</script>

@stop