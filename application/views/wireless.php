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
<?php include 'footer.php'; ?>