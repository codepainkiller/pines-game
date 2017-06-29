<?php

$code =  sprintf("%04d", mt_rand(0, 9999));

header('Content-Type: application/json');

echo json_encode($code);