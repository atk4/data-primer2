<?php

include'vendor/autoload.php';

$db = \atk4\data\Persistence::connect('mysql:host=localhost;dbname=earth', 'root', 'root');


try {

    $m = new Client($db);
    $m->onlyFields(['name','total_budget']);

    $m->load($argv[1]);

    echo "Client: ".$m['name']." Total projects for: ".$m['total_budget']."\n";

    foreach($m->ref('ActiveProject')
        ->setOrder('budget desc')
        ->onlyFields(['name','budget'])
        ->setLimit(10) as $p) {
        echo "  Project ".$p['name']." Budget: ".$p['budget']."\n";
    }


} catch (\atk4\core\Exception $e) {
    echo $e->getColorfulText();
}
