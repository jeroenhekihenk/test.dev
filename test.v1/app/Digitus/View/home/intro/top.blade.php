<section id="intro">
	<div class="intro">
		<div class="content">
			<div class="intro-div statistics"><figure class="statistics"></figure></div>
			<div class="intro-div email"><figure class="email"></figure></div>
			<div class="intro-div responsive"><figure class="responsive"></figure></div>
			<div class="intro-div cart"><figure class="cart"></figure></div>
			<div class="intro-div social"><figure class="social"></figure></div>
		</div>
		<figure class="fluidbg"></figure>
	</div>
</section>

<script>
console.log("hey hallo");
  $("div.intro-div").hover(function(){
  	console.log($(this).position());
  });
</script>