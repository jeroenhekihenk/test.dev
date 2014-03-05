<div id="mainmenu" class="navbar-fixed-top row" role="navigation">
	<div class="navbar navbar-fixed-top navbar-default row">
		<div class="navbar-inner">
			<div class="container">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav pull-left">
						<a href=""><figure alt="" class="nav-logo"></figure></a>
						<li>{{ HTML::link('', 'Welkom') }}</li>
						<li>{{ HTML::link('ons-bureau', 'Ons Bureau') }}</li>
						<li>{{ HTML::link('cases', 'Cases') }}</li>
						<li>{{ HTML::link('workshops', 'Workshops') }}</li>
						<li>{{ HTML::link('insides', 'Insides') }}</li>
						<li>{{ HTML::link('kennismaken', 'Kennismaken') }}</li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						
						@if(!$user)
							<li>{{ HTML::link('register', 'Register') }}</li>
							<li>{{ HTML::link('login', 'Login') }}</li>
						@else
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<span class="glyphicon glyphicon-user"></span>  
									{{ $user->username }} <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										{{ HTML::link("profile/".$user->username, 'My Profile') }}
									</li>
									<li>
										{{ HTML::link("profile/dashboard", 'Dashboard')}}
									</li>
									<li>
										{{ HTML::link("profile/messages", 'Messages')}}
									</li>
									<li>
										{{ HTML::link("profile/settings", 'Account Settings') }}
									</li>
									<li>
										{{ HTML::link("profile/adminsettings", 'Admin Settings') }}
									</li>
									<li>
										{{ HTML::link("profile/plan", 'Change Plan') }}
									</li>
									<li>{{ HTML::link('logout', 'Logout') }}</li>

								</ul></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>