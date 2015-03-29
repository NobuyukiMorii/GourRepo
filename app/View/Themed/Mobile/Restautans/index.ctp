<h1>Restaurant_index</h1>
<table>
	<tr>
		<th>Id<th>
		<th>Name</th>
		<th>Tel</th>
		<th>Address</th>
		<th>Latitude</th>
		<th>Longitued</th>
		<th>Category</th>
		<th>Url</th>
		<th>Url_Mobile</th>
		<th>Opentime</th>
		<th>Holiday</th>
		<th>Access_line</th>
		<th>Access_station</th>
		<th>Access_station_exit</th>
		<th>Access_walk</th>
		<th>Access_note</th>
		<th>Parking_lots</th>
		<th>Pr</th>
		<th>Code_areacode</th>
		<th>Code_areaname</th>
		<th>Code_prefcode</th>
		<th>Code_prefname</th>
		<th>Code_category_code_I</th>
		<th>Code_category_code_I_order</th>
		<th>Code_category_name_I</th>
		<th>Code_category_name_I_order</th>
		<th>Code_category_code_s</th>
		<th>Code_category_code_s_order</th>
		<th>Code_category_name_s</th>
		<th>Code_category_name_s_order</th>
		<th>Budger</th>
		<th>Party</th>
		<th>Lunch</th>
		<th>Credit_card</th>
		<th>Equipment</th>
		<th>Del_flg</th>
		<th>Created</th>
		<th>Created_user_id</th>
		<th>Modified</th>
		<th>Modified_user_id</th>
	<tr>

		<?php foreach ($restaurants as $restaurant): ?>
		<tr>
			<td><?php echo $restaurant['Restaurant']['id']; ?></td>
			<td>
				<?php echo $this->Html->link($restaurant['Restaurant']['id'], array('controller' => 'restaurants', 'action' => 'view'、$restaurant['Restaurant']['id'])); ?>
			</td>
			<td><?php echo $restaurant['Restaurant']['created']; ?></td>

		</tr>

	<?php endforeach; ?>
	<?php unset($restaurant); ?>
	
</table>


	