<?php
namespace phpsec;

require_once 'random.php';

$a = randstr(1024);
echo strlen($a) . "<BR>";
echo $a;

?>