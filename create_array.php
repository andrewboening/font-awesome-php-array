// Create fontawesome php array file
//
// Andrew Boening
// https://github.com/andrewboening/font-awesome-php-array

<?php
$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s"\\\\(.+)";\s+}/';
// update $subject variable to the location of the font-awesome.css file
$subject = file_get_contents('font-awesome.css');
preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

foreach($matches as $match) {
	$icons[$match[1]] = $match[2];
}

ksort($icons);

// update $file variable to the exported filename desired
$file = 'font-awesome.php';
$iconarray = '<?php' . PHP_EOL . '$fontawesome = ' . var_export($icons, true) . ';' . PHP_EOL . '?>';
file_put_contents($file, $iconarray);

?>
