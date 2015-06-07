@extends('layouts.master')

@section('content')
    <h1>Body Mass Index</h1> 
     <hr/>
	  <br>
	
    @include('partials.flash_notification')
	
	<!-- if the user has already calculate their BMI before -->
    @if(count($bmis)!==0)
		@foreach ($bmis as $bmi)
		<!-- show BMI : -->
		<div class="text-center">
	        <div class="section">
            <div class="container">
                <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-random fa-5x"></i>
						<h1>{{ $bmi->result }}</h1>
						<p> this is your <abbr title="Body Mass Index">BMI</abbr></p>							
					</div>	
				</div>


	        <div class="section">
            <div class="container">
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<!-- BMI explanation: -->
						@if($bmi->result<18.5)
						 <i class="fa fa-street-view"></i>
							<h2>You are underweight.</h2>
							<p>Being underweight can seriously damage your health and your immune system, not to mention the lack of energy.
							<br>A healthy diet that provides more calories than your current one as well as some exercise that will relief you from stress will work wonders in your health and energy. </p>
						@elseif($bmi->result> 18.5 & $bmi->result<24.9)
						 <i class="fa fa-info"></i>
							<h2>You are healthy!</h2>
							<p>So far you have managed to keep your weight in healthy standards. 
							<br>As a result, you are not in danger of heart disease, stroke and type 2 diabetes. A healthy balanced diet combined with physical activities is the way to keep your self healthy and in good form.</p>
						@elseif($bmi->result> 25 & $bmi->result<29.9)
						 <i class="fa fa-info"></i>
							<h2>You are overweight.</h2>
							<p>You are above the ideal BMI range.
							<br>You are not obese yet but it is strongly recommended to consider some changes in your diet and to  commit your self to an exercise program. This way you will most certainly avoid related to overweight health issues. BeActive is the way to go and you have already done the first step.</p>
						@elseif($bmi->result>= 30)
						<i class="fa fa-info"></i>
							<h2>You are obese.</h2>
							<br>Unfortunately, your BMI is well above healthy range.
							<p>Being obese, increases the possibility of suffering heart diseases, stroke and type 2 diabetes. A more energetic lifestyle among with better diet will result in weight loss and significant health improvements. Using BeActive is the first step!</p>
						@endif
				</div>	
				</div>
            </div>
			</div>
				</div>
			</div>
			</div>
               

		</div>

		@endforeach
			<br>
			<br>
			<!-- Dismissible alert : informs about what bmi is -->
			<div class="alert alert-warning alert-dismissible opacity" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<i class="fa fa-info-circle"></i>

				<strong> Body Mass Index </strong> is a calculation that takes into consideration both a person's body weight and height to determine whether they are underweight, overweight, or at a healthy weight.
				<br>BMI applies to adult men and women and  It’s useful to know because if your weight increases or decreases outside of the ideal range, your health risks may increase.
			</div>
			<!-- delete BMI-->

			<div class="form-group">
			 {!! Form::open(['route' => ['bmi.destroy', $bmi->id],'style'=>'width: 100%;', 'class' => 'form-inline', 'method' => 'delete']) !!}
                                {!! Form::hidden('id', $bmi->id) !!}
								
                                {!! Form::submit('Delete this record', ['style'=>'width: 100%;','class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
	
							</div>
	<!-- if the user have not calculate their BMI yet, display below message -->
    @else
        <div class="text-center">
            <h3>there is not any BMI calculation</h3>
            <p><a href="{{ url('/bmi/create') }}">calculate your BMI now</a></p>
        </div>
    @endif

@endsection