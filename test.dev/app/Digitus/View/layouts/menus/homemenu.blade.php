	<div class="navbar navbar-top navbar-default">
		<div class="navbar-inner">
			<div class="container">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav pull-left">
						<a href="{{URL::to('/')}}"><figure alt="" class="nav-logo"></figure></a>
						<li>{{ HTML::link('', 'Welkom') }}</li>
						<li>{{ HTML::link('ons-bureau', 'Ons Bureau') }}</li>
						<li>{{ HTML::link('cases', 'Cases') }}</li>
						<li>{{ HTML::link('workshops', 'Workshops') }}</li>
						<li>{{ HTML::link('blog', 'Insides') }}</li>
						<li>{{ HTML::link('kennismaken', 'Kennismaken') }}</li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						
						@if(!$loggedUser)
							<li>{{ HTML::link('register', 'Register') }}</li>
							<li>{{ HTML::link('login', 'Login') }}</li>
						@else
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<img class="profile-pic-thumb" src="{{{ URL::to($loggedUser->image) }}}">
									{{ $loggedUser->username }} <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										{{ HTML::link("user/".$loggedUser->username."/profile", 'My Profile') }}
									</li>
									<li>
										{{ HTML::link("user/".$loggedUser->username."/dashboard", 'Dashboard')}}
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
