@extends('layouts.front.main')

@section('title')
@stop

@section('bodyid')123456789
@stop

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('notification')
@stop

@section('sidebar')
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-2-5 col-sm-offset-2-5 col-md-offset-2-5 col-lg-offset-2-5 page-welcome">
		<h3 class="text-center page-heading">Wilt u graag meer weten over één of meedere diensten? Neem telefonisch contact met ons op via <a href="{{URL::to($tel)}}">085 003 02 56</a> of stuur ons een <a href="{{ URL::to($email) }}">mailtje</a>.<br />
		Algemene vragen kunt u ook altijd stellen op onze <a href="{{URL::to($facebook)}}">Facebook pagina</a></h3>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		<address class="address-info">
			<h4 class="address-info">Digitus Marketing</h4>
			<p>Industriestraat 215a<br />
			7553CP Hengelo(ov)</p>
			<p>Telefoon: 085 003 02 56<br />
				info@digitusmarketing.nl</p>
			<p>Kvk: 52622746<br />
				BTW: NL.8505.25.469.B.01<br />
				ABN Amro: 59.59.22.694</p>
		</address>
	</div>

	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="gmap">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2442.589700473182!2d6.777445899999991!3d52.250835800000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b80dfdc2b3e23f%3A0x4ee5f71cd7d956d2!2sIndustriestraat+215A!5e0!3m2!1snl!2s!4v1394713865205" frameborder="0" style="border:0"></iframe>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		@include('forms.ons-bureau.contact')
	</div>
</div>
@stop

@section('footer')
	@include('layouts.front.footer.main')
@stop