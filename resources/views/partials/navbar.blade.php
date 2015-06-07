<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">BeActive</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
				<!-- guest -->
                @if(\Auth::guest())
					<li><a href="{{ url('about') }}"><i class="fa fa-info-circle">  About </i></a></li>
                    <li><a href="{{ url('/user/create') }}"><i class="fa fa-key">  Sign Up </i></a></li> 
                    <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in">  Sign In </i></a></li>
				<!-- registered user -->
                @else
                    <li><a href="#">Welcome, {{ \Auth::user()->name }}</a></li>
					<li><a href="{{ url('dashboard') }}"><i class="fa fa-dashcube">  Dashboard</i></a></li>
					<li><a href="{{ route('user.edit', \Auth::user()->id) }}"><i class="fa fa-user">  Profile</i></a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out">  Sign Out</i></a></li>
                @endif
            </ul>
        </div>

    </div>
</nav>