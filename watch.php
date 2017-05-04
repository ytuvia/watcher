<?php
	require_once __DIR__ . '/vendor/autoload.php';

	$files = new Illuminate\Filesystem\Filesystem;
	$tracker = new JasonLewis\ResourceWatcher\Tracker;
	$watcher = new JasonLewis\ResourceWatcher\Watcher($tracker, $files);

	$listener = $watcher->watch('app');
	
	$listener->anything(function($event, $resource, $path) {
		//Add your app init / distruction here
		echo "{$path} has been modified.".PHP_EOL;
	});

	echo "Start listening to changes in app/".PHP_EOL;
	$watcher->start();
?>