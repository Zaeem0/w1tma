<?php
// Import
require ('includes/config.inc.php');
require ('includes/functions.php');


if (!isset($_GET['page'])) {
    $id = 'home'; // display home page
} else {
    $id = $_GET['page']; // else requested page
}

$content = '';

//link to pass the getActiveArtists() and getNumberOfSongs() functions
$link = mysqli_connect
	(
		$config['db_host'],
		$config['db_user'],
		$config['db_pass'],
		$config['db_name']
	);

//entry to pages
switch ($id) {
    case 'home' :
        include 'views/home.php';
        break;
	case 'artists' :
        include 'views/artists.php';
        break;
    case 'songs' :
        include 'views/songs.php';
        break;
    default :
        include 'views/404.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Index</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>W1 MUSIC</h1>
    
    <nav id="menu">
        <ul >
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?page=artists">Artists</a></li>
                <li><a href="index.php?page=songs">Songs</a></li>			
        <ul>
    </nav>
            
	<?php
        echo "<p>Number of songs currently available: ".getActiveArtists($link)."</p>";
        echo "<p>Number of artists currently active: ".getNumberOfSongs($link)."</p>";
        echo $content;
    ?>
</body>

</html>
