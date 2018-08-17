<?php

require_once "../vendor/autoload.php";

use CandakInfoIP\CandakIP;

$a = CandakIP::grab()->get();
print_r($a);