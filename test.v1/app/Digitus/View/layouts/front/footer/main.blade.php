<footer id="footer">
	<div class="container">
		<div class="footer-inner">
			<div class="footer-info">
				<ul class="copy">
					<li>&copy; <a>Digitus Marketing</a> 2014</li>
					<li><a>voorwaarden</a></li>
				</ul>
				<ul class="social">
					<?php
					$facebook = 'https://www.facebook.com/DigitusMarketing';
					$twitter = 'https://www.twitter.com/_DigiMarketing'; 
					?>
					<li><a href="{{$facebook}}" target="_blank"><span class="facebook"></span></a></li>
					<li><a href="{{$twitter}}" target="_blank"><span class="twitter"></span></a></li>
				</ul>
			</div>
			<div class="footer-brief">
				@include('forms.footer.form')
			</div>
		</div>
	</div>
</footer>