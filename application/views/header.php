<!DOCTYPE html>
<html>
<title>嵌入式系统2014</title>
<body style="background-color:#ffffff">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=link_tag(css_url().'bootstrap2.3.2min.css');?>
<?=link_tag(css_url().'layout.css');?>
<?=link_tag(css_url().'login.css');?>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="<?= js_url() ?>jquery.serialize-hash.js"></script>
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
							<li role="presentation"><a role="menuitem" tabindex="-1" href="<?= site_url() ?>/system/wire/">網路資訊</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="<?= site_url() ?>/system/wireless">無線網路</a></li>
							<li role="presentation" class="divider"></li>
							<li role="presentation"><a role="menuitem" target="_blank" tabindex="-1" href="http://www.youtube.com/watch?v=vieVk_n2ECQ">喵喵叫</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">資料整理 <b class="caret"></b></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
							<li role="presentation"><a role="menuitem" tabindex="-1" data-toggle='modal' data-target="#import-modal">資料匯入</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url() ?>database/sys">資料匯出</a></li>
						</ul>
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
<div id='import-modal' class="modal fade hide" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">資料匯入</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= site_url() ?>/system/import" enctype="multipart/form-data">
		<input type="file" name="userfile" size="20" />
		<br/><br/>
		<input class='btn btn-info' type="submit" value="upload"/>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<? } ?>
<div class='layout'>
