<?php
require ('includes/config.inc.php');

$link = mysqli_connect
	(
		$config['db_host'],
		$config['db_user'],
		$config['db_pass'],
		$config['db_name']
	);


    $sql = "SELECT name, COUNT(title) as songs
			FROM artist, song
			WHERE artist.id = song.artist_id
			GROUP BY name 
			ORDER BY name ASC;";

        $content = '';
		// </table> start outside of the loop(else:while:) in case no content
        $file = 'templates/artistTable.html';
        $tpl_table = file_get_contents($file);
        $content .= $tpl_table;

	$ok = mysqli_query($link, $sql);
    //second view with all artists
	if ($ok === false) {
		echo mysqli_error($link);
	} 
	else {
        
        
        $file = 'templates/artistRow.html';
        $tpl_row = file_get_contents($file);
        
        //<td>        
        /* fetch associative array */
		while ($row = mysqli_fetch_assoc($ok)) {
             // Use the template for each author
             $pass1 = str_replace('[+artist+]',htmlentities($row['name']),$tpl_row);
             $final = str_replace('[+songs+]',htmlentities($row['songs']),$pass1);
             // Add this author's HTML to $content
             $content .= $final;
		}
		/* free result set */
		mysqli_free_result($ok);
	}

        //close table 
        $file = 'templates/tableEnd.html';
        $tpl_endTable = file_get_contents($file);
        $content .= $tpl_endTable;
            
	?>



