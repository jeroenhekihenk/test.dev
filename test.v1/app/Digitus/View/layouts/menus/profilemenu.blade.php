<div id="sidebar" class="col-sm-3 col-md-2 sidebar" role="sidebar">
	<ul class="nav nav-sidebar nav-pills nav-stacked">
	    <li>{{ HTML::link('profile/'.$loggedUser->username, "My Profile") }}</li>
	    <li>{{ HTML::link('profile/dashboard', 'Dashboard') }}</li>
	    <li>{{ HTML::link('profile/messages', 'Messages') }}</li>

	</ul>
</div>