<?php
/**
 * Rhythmbox Remote Control via HTTP
 * @author   Simon Lauger <simon@lauger.name>
 * @url      http://blog.simlau.net/
 * @version  1.03
 */

$scriptpath = '/usr/local/bin/rbcontrol';

error_reporting(E_ALL);

function rb_control($cmd, $arg = 0)
{
	global $scriptpath;

	// Erlaubte Kommandos
	$allowed = array('play', 'pause', 'play-pause', 'set-volume',
			'volume-up', 'volume-down', 'mute', 'unmute',
			'print-playing', 'next', 'previous');

	// Handelt es sich um ein erlaubtes Kommando?
	if (!in_array($cmd, $allowed))
	{
		return false;
	}
	
	$shell_cmd = sprintf('sudo sh %s %s %s', $scriptpath, $cmd, escapeshellarg($arg));

	return shell_exec($shell_cmd);
}

$do = (isset($_GET['do'])) ? $_GET['do'] : '';

if ($do != '') {
	rb_control($do);
	$song = rb_control('print-playing');
} else {
	$song = 'None';
}

?>
<html>
<head>
	<title>Rhythmbox Control</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<link title="style" type="text/css" rel="stylesheet" href="iphone.css" />
</head>
<body>
	<h1>Rhythmbox Control</h1>
		<ul>
			<li><p>Current Song:<br /><?php echo $song; ?></p></li>
			<li><a href="index.php?do=next">Next Song</a></li>
			<li><a href="index.php?do=previous">Last Song</a></li>
			<li><a href="index.php?do=play-pause">Play/Pause</a></li>
			<li><a href="index.php?do=volume-up">Volume Up</a></li>
			<li><a href="index.php?do=volume-down">Volume Down</a></li>
			<li><a href="index.php?do=mute">Mute</a></li>
			<li><a href="index.php?do=unmute">Unmute</a></li>
			</ul>
</body>
</html>
