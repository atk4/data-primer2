<?php

include'vendor/autoload.php';

$db = \atk4\data\Persistence::connect('mysql:host=localhost;dbname=earth', 'root', 'root');

eval(\Psy\sh());
