
@extends('layouts.master')
<div class="bg">
@section('content')


	
		<div class="text-center">
        <div class="padding"> 
		<h1>Welcome to BeAtcive</h1>
        <hr>
        <h3>an app that makes you active, interested?</h3>
		
		@include('partials.flash_notification')
		<br>
		<br>
		<br>
            <div class="container">
                <div class="row bcg-color">
                    <div class="col-md-4">
                        <h2 class="text-info">A dynamic web application</h2>
                        <p>Plan your activities, adopt healthy habits, schedule your tasks, learn your BMI and improve your lifestyle!
                            </p>
                    </div>
                    <div class="col-md-4">
                        <h2 class="text-info">Project Information</h2>
                        <p>Project area: Web Application
                        <br>Project technology: PHP, HTLM5, CSS3, Javascript, MySQL
                        <br>Project Platform: Multi-Platform</p>
                    </div>
                    <div class="col-md-4">
                        <h2 class="text-info">Version 1.0</h2>
                        <p>Part of the Final Year Project of Virginia Zarakeli
						<br>BSc (Hons) in Computing, UCLan.</p>
                    </div>
                </div>
            </div>
        </div>
         </div>      
   </div> 
@endsection
