<header>
	<div id="floater">
		<div class="toggler">
			<div class="logo">
				<a href="{{ URL::to('/') }}" title="">
					<img src="images/site/logo-header.png" alt="" class="logo">
				</a>
			</div><!-- /logo -->
			<nav class="nav">
			    <ul>
			        <li><a href="{{ URL::action('home.index') }}">Welkom</a></li>
				    <li><a href="{{ URL::action('bureau.index') }}">Ons Bureau</a></li>
				    <li><a href="{{ URL::action('cases.index') }}">Cases</a></li>
				    <li><a href="{{ URL::action('workshops.index') }}">Workshops</a></li>
				    <li><a href="{{ URL::action('insides.index') }}">Insides</a></li>
				    <li><a href="{{ URL::action('kennismaken.index') }}">Kennismaken</a></li>
			    </ul>
			</nav><!-- /nav -->
		</div><!-- /toggler -->
		<figure class="togglemenu"><div class="menu-up"></div></figure>
	</div><!-- /floater -->
</header><!-- /header -->