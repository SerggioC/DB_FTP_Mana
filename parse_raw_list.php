<?php
/**
* Takes a raw list from FTP and parses it to make an 
* array which is a bit more simple to handle.
* @param array $raw_list
* @return array
*/
private function parse_rawlist($array, $systype) {

if ( $systype == 'Windows_NT' ) {

// We've got a Windows NT server
$structures = array();

for ( $i = 0; $i < count($array); $i++ ) {
preg_match('#^([0-9]{2})-([0-9]{2})-([0-9]{2})  ([0-9]{2}):([0-9]{2})([a-z]{2}) +(<DIR>)? +([0-9]+)? (.*)$#i', $array[$i], $match); 

$struct['perms'] = FALSE;
$struct['number'] = FALSE;
$struct['owner'] = FALSE;
$struct['group'] = FALSE;
$struct['size'] = trim($match[8]);
$struct['filename'] = trim($match[9]);

if ( $match[6] == 'PM' ) {
// If we have PM, then add 12 hours so we have
// 24 hour system.
$match[4] += 12;
}

$struct['time'] = mktime($match[4], $match[5], 0, $match[1], $match[2], $match[3]);

array_push($structures, $struct);

}

return $structures;

} else {

// Assume we have a unix system
$structures = array();

for ( $i = 0; $i < count($array); $i++ ) {

preg_match('#(.+) {1}([0-9]+) +([a-z0-9]+) +([a-z0-9]+) +([0-9]+) (([a-z]+) +([0-9]+) +([0-9]{4}|[0-9]+:[0-9]+)) (.+)#i', $array[$i], $match);

$struct['perms'] = trim($match[1]);
$struct['number'] = $match[2];
$struct['owner'] = $match[3];
$struct['group'] = $match[4];
$struct['size'] = $match[5];
$struct['filename'] = $match[10];

if ( preg_match('/^[0-9]+$/', $match[9]) ) {
$struct['time'] = strtotime("{$match[7]} {$match[8]}, {$match[9]}");
} else {
$struct['time'] = strtotime("{$match[7]} {$match[8]}, ".date('Y')." {$match[9]}");
}

array_push($structures, $struct);
}

}

return $structures;
}

?>