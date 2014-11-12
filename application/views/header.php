<!DOCTYPE html>
<html>
<title>嵌入式系统2014</title>
<body style="background-color:#ffffff">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=link_tag(css_url().'bootstrap2.3.2min.css');?>
<?=link_tag(css_url().'layout.css');?>
<?=link_tag(css_url().'login.css');?>
<?=link_tag(css_url().'map/user/user.css');?>
<?=link_tag(css_url().'game/game.css');?>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="<?= js_url() ?>map.js"></script>
<script src="<?= js_url() ?>cards.js"></script>
<script src="<?= js_url() ?>cookie.js"></script>
<? if(isset($user)) {?>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="<?= base_url() ?>">BeagleBoard</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="">
						<a href="<?= base_url() ?>">Home</a>
					</li>
					<li class="dropdown">
						<a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">網路設定 <b class="caret"></b></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
							<li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url() ?>click/">有線網路</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url() ?>game/lottery">無線網路</a></li>
							<li role="presentation" class="divider"></li>
							<li role="presentation"><a role="menuitem" target="_blank" tabindex="-1" href="http://www.youtube.com/watch?v=vieVk_n2ECQ">喵喵叫</a></li>
						</ul>
					</li>
					<li class="">
						<a href="<?= base_url() ?>quests">Quests</a>
					</li>
					<li class="">
						<a href="<?= base_url() ?>about_eenight">About EEnight</a>
					</li>
					<li class="">
						<a href="#main_rule_modal" data-toggle="modal">Rules</a>
					</li>
				</ul>
				<ul class="nav pull-right">
					<li class="">
						<a><?= $user?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<? } ?>
<div class='layout'>
