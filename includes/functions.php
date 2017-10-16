<?php

function convertToMinutes($seconds){
    $time= round($seconds);
    return sprintf('%02d:%02d',($time / 60 % 60), $time%60);
}

function getActiveArtists($link){


    $sql = "SELECT COUNT(title) 
					FROM song;";

	if($result = mysqli_query($link, $sql)){
        $sqlArray = mysqli_fetch_assoc($result);
        $songs = $sqlArray['COUNT(title)'];
        return htmlentities($songs);
    }
    else {
        return htmlentities("Currently unavailable");
    }
}


function getNumberOfSongs($link){

    
    $sql = "SELECT COUNT(name)
				FROM artist
				WHERE name in (SELECT name
								FROM song,artist
								WHERE  song.artist_id = artist.id
								);";
    
    if($result = mysqli_query($link,$sql)){
        $sqlArray = mysqli_fetch_assoc($result);
        $artists = $sqlArray['COUNT(name)'];
        return htmlentities($artists);
    }
    else{
        return htmlentities("Currently unavailable");
    }
    
}
?>