
@extends('layouts.master')

@section('content')
	
    <div class="page-header">
	<!-- page title -->
    <h3>its time for you to BeActive!</h3>
	<hr>
    </div>

    <div class="row">        
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-check-square-o fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">to do </div>
							<!-- show number of todo list for this user only -->
                            <div>there are : <span class="badge"> {{$todoCount}} </span>  items in your to-do list </div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('todo')}}">
                    <div class="panel-footer">
                        <span class="pull-left">visit your to-do lst</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-calendar fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">calendar</div>
                            <div>never miss a doctors appointment again!</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('appointments')}}">
                    <div class="panel-footer">
                        <span class="pull-left">appointments plan</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>		
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-calculator fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">bmi</div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('bmi')}}">
                    <div class="panel-footer">
                        <span class="pull-left">calculate you Body Mass Index</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-lightgr">
                <div class="lightgr-panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-quote-left fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">Healthy Quotes</div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('HealthyQuotes')}}">
                    <div class="panel-footer">
                        <span class="pull-left">a collection of health quotations by famous authors</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-area-chart fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">weight</div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('weight')}}">
                    <div class="panel-footer">
                        <span class="pull-left">monitor your weight</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-grey">
                <div class="grey-panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-location-arrow fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">distance measuring </div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('geolocation')}}">
                    <div class="panel-footer">
                        <span class="pull-left">start walking!</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection
