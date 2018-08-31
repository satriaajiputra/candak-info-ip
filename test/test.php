<?php

require_once "../vendor/autoload.php";

use CandakInfoIP\CandakIP;

$a = CandakIP::grab()->get(true);
print_r($a);