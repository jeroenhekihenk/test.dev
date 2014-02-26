	<footer id="footer" class="navbar-inverse navbar-fixed-bottom row">
		<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 col-xs-offset-1 col-sm-offset-1 col-lg-offset-1 col-md-offset-1 pull-left">
			<div class="pull-left col-xs-7 col-sm-7 col-md-7 col-lg-7">
				<p>&copy; 2014 Digitus Marketing / {{ HTML::link('algemene-voorwaarden', 'voorwaarden') }}</p> 
			</div>
				<ul class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<li class="pull-left"><a href="#"><span class="foot-twit"></span></a></li>
					<li class="pull-left"><a href="#"><span class="foot-face"></span></a></li>
				</ul>
		</div>

		<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 pull-left foot-news">
			@include('forms.footer.nieuwsbrief')
		</div>

	</footer>

	{{ HTML::script('js/jquery-2.1.0.min.js') }}
	{{ HTML::script('js/main.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}