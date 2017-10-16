<?php
require ('includes/config.inc.php');


$link = mysqli_connect
	(
		$config['db_host'],
		$config['db_user'],
		$config['db_pass'],
		$config['db_name']
	);

    $sql = "SELECT title, name, duration
			FROM song, artist
			WHERE song.artist_id =  artist.id
			ORDER BY name, title;";

        $content = '';
		// </table> start outside of the loop(else:while:) in case no content
        $file = 'templates/songsTable.html';
        $tpl_table = file_get_contents($file);
        $content .= $tpl_table;

	$ok = mysqli_query($link, $sql);
    //third view The list should be sorted first by artist, then by the
    //song title, both in ascending order
	if ($ok === false) {
		echo mysqli_error($link);
	} 
	else {
        $file = 'templates/songsRow.html';
        $tpl_row = file_get_contents($file);
		/* fetch associative array */
		while ($row = mysqli_fetch_assoc($ok)) {
            
			/*$content.= '<li>'.htmlentities($row['name']).' '.htmlentities($row['title']).' '.htmlentities(convertToMinutes($row['duration'])).'</li>';*/
            $pass1 = str_replace('[+artist+]',htmlentities($row['name']),$tpl_row);
             $pass2 = str_replace('[+title+]',htmlentities($row['title']),$pass1);
            $final = str_replace('[+duration+]',htmlentities(convertToMinutes($row['duration'])),$pass2);
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