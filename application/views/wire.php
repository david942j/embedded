<?php include 'header.php' ?>
<div>
	<h3>網路資訊</h3>
	<table class='table'>
		<thead>
			<tr>
				<th>#</th>
				<th>device</th>
		        <th>dhcp</th>
		        <th>IP</th>
		        <th>mask</th>
		        <th>gateway</th>
		        <th>dns server</th>
			</tr>
		</thead>
		<tbody>
			<? $i=1; ?>
			<?foreach($network->result() as $row) {?>
			<tr>
				<td><?=$i;?></td>
				<td><?=$row->device;?></td>
				<td><?=$row->dynamic_flag==1?'Yes':'No';?></td>
				<td><?=$row->ip_addr;?></td>
				<td><?=$row->subnet_mask;?></td>
				<td><?=$row->gateway;?></td>
				<td><?=$row->dns;?></td>
				<?$i++;?>
			</tr>
			<? } ?>
		</tbody>
	</table>
</div>
<div class='btn btn-primary' data-toggle="modal" data-target="#new-network-modal">新增網路</div>
<div id='new-network-modal' class="modal fade hide" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">新增網路</h4>
      </div>
      <div class="modal-body">
        <form id='new-network-form' role='form' method='post' action="<?=site_url()?>/system/new_network" data-remote="true">
        	<div class="form-group">
			    <label for="device">Device</label>
			    <input name='device' type="text" class="form-control" id="device" placeholder="Device name(e.g. usb1)">
			</div>
			<div class="checkbox">
		   		<label>
		      		<input type="checkbox" name="dhcp">Dynamic IP</input>
		   		</label>
		  	</div>
		  	<div class="form-group">
			    <label for="ip-addr">IP Address</label>
			    <input name='ip-addr' type="text" class="form-control" id="ip-addr" placeholder="static IP">
			</div>
			<div class="form-group">
			    <label for="mask">Subnet Mask</label>
			    <input name='mask' type="text" class="form-control" id="mask" placeholder="e.g. 255.255.255.0">
			</div>
			<div class="form-group">
			    <label for="gateway">Default Gateway </label>
			    <input name='gateway' type="text" class="form-control" id="gateway" placeholder="e.g. 192.168.1.1">
			</div>
			<div class="form-group">
			    <label for="dns">DNS Server</label>
			    <input name='dns' type="text" class="form-control" id="dns" placeholder="e.g. 8.8.8.8">
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="$('#new-network-form').submit();">Submit</button>
      </div>
    </div>
  </div>
</div>
<script>
	$(function(){
	    $('#new-network-form').submit(function(evnt){
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
<?php include 'footer.php' ?>
