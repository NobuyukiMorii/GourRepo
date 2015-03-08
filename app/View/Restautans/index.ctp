<h1>Restaurant_index</h1>
<table>
	<tr>
		<th>Id<th>
		<th>Name</th>
		<th></th>
	<tr>

		<?php foreach ($restaurants as $restaurant): ?>
		<tr>
			<td><?php echo $restaurant['Restaurant']['id']; ?></td>

		</tr>


	