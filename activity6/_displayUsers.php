<?php
/*
 * Project: activity6
 * Module Name: activity6
 * Author: Daniel Cender
 * Date: April 7, 2019
 * Synopsis: This fragment displays all users in the database in an HTML table.
 */
?>

<table>
	<tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
	</tr>
	<?php
for ($i = 0; $i < count($users); $i++) {
    echo "<tr>";
    echo "<td>" . $users[$i][0] . "</td>" . "<td>" . $users[$i][1] . "</td>" . "<td>" . $users[$i][2] . "</td>";
    echo "</tr>";
}
?>
	</table>