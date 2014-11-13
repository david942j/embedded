<?php include 'header.php'; ?>
<div>
	<h3>無線網路</h3>
	<table class='table'>
		<thead>
			<tr>
				<th>#</th>
				<th>SSID</th>
		        <th>type</th>
		        <th>psk</th>
		        <th>priority</th>
			</tr>
		</thead>
		<tbody>
			<? $i=1; ?>
			<?foreach($wpa_conf->result() as $row) {?>
			<tr>
				<td><?=$i;?></td>
				<td><?=$row->ssid;?></td>
				<td><?=$row->type;?></td>
				<td><?=$row->psk;?></td>
				<td><?=$row->priority;?></td>
				<?$i++;?>
			</tr>
			<? } ?>
		</tbody>
	</table>
</div>

<div class='btn btn-primary' data-toggle="modal" data-target="#new-ap-modal">新增無線網路</div>
<div id='new-ap-modal' class="modal fade hide" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">新增無線網路</h4>
      </div>
      <div class="modal-body">
        <form id='new-ap-form' role='form' method='post' action="<?=site_url()?>/system/new_ap" data-remote="true">
        	<div class="form-group">
			    <label for="ssid">SSID</label>
			    <input name='ssid' type="text" class="form-control" id="ssid" placeholder="SSID">
			</div>
		  	<div class="form-group">
			    <label for="type">Security Mode</label>
			    <input name='type' type="text" class="form-control" id="type" placeholder="e.g. wpa">
			</div>
			<div class="form-group">
			    <label for="psk">Key</label>
			    <input name='psk' type="text" class="form-control" id="psk" placeholder="password">
			</div>
			<div class="form-group">
			    <label for="priority">Priority</label>
			    <input name='priority' type="text" class="form-control" id="priority" placeholder="e.g. 10">
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="$('#new-ap-form').submit();">Submit</button>
      </div>
    </div>
  </div>
</div>
<script>
	$(function(){
	    $('#new-ap-form').submit(function(evnt){
	        $.post($(this).attr('action'),
	        	$(this).serializeHash(),
		        function (data) {
		        	if(data=='error')return alert('error');
		        	location.reload();
		        });
	        return false;
    	});
	});
</script>
<?php include 'footer.php'; ?>