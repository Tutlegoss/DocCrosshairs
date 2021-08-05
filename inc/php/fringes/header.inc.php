<?php
    ob_start();
    session_status() === PHP_SESSION_ACTIVE ?: session_start();

    require_once("/home/____________/pdoconfig.php");

	/* Hardcoded $article, so no prepared statement */
	$metadata = $conn->query("SELECT Headers.*, Articles.ArticleID FROM Headers LEFT JOIN Articles
	                            ON Headers.Title = Articles.Title WHERE Headers.Title = '$article';");
	$metadata->execute();
	$metadata = $metadata->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE HTML>
<html lang="en-US">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Landen Marchand">
	<meta name="description" content="<?php echo $metadata["Description"]; ?>">

	<title><?php echo $metadata["Title"]; ?></title>

    <!--<link rel="canonical" href="https://doccrosshairs.com<?php echo $metadata["URL"]; ?>">-->
    <link rel="canonical" href="localhost/DocCrosshairs<?php echo $metadata["URL"]; ?>">
	<link rel="icon" href="<?php echo $metadata["Path"]; ?>inc/img/Logos/mainLogoIcon.ico">

	<!-- Directory relative to article page and not header.inc.php -->
	<link rel="stylesheet" href="<?php echo $metadata["Path"]; ?>inc/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<?php echo $metadata["Path"]; ?>inc/css/normalize.min.css">
	<link rel="stylesheet" href="<?php echo $metadata["Path"]; ?>inc/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $metadata["Path"]; ?>inc/css/main.min.css">
