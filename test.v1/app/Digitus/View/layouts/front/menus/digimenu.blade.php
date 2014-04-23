<header>
	<div class="container">
		<div class="inner">
			<div id="floater">
				<div class="toggler">
					<div class="logo">
						<a href="{{ URL::to('/') }}" title="">
							<img src="{{ URL::to('/') }}/images/site/logo-header.png" alt="" class="logo">
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
				<div class="togglemenu">
					<figure class="menu-up"></figure>
				</div>
			</div><!-- /floater -->
		</div><!-- /inner -->
	</div><!-- /container -->
</header><!-- /header -->