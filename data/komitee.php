<?php
include "./vendor/autoload.php";

use Ramsey\Uuid\Uuid;

$komitee = json_decode(file_get_contents("komitee.json"), true);

$komitee = array_filter($komitee, function($mitglied) {
    return $mitglied["part"] == 1
    ;
});

$lname = array_column($komitee, "lname");
array_multisort($lname, SORT_ASC, $komitee);

$i == 0;

foreach ($komitee as $mitglied) {
    $uuid = Uuid::uuid4()->toString();

    $text = <<<EOD
    {$mitglied["fname"]} {$mitglied["lname"]}, {$mitglied["job"]}
    EOD;

    // $text = <<<EOD
    // {"_id" : "{$uuid}", "name" : "{$mitglied["fname"]} {$mitglied["lname"]}", "job": "{$mitglied["job"]}", "image": "{$mitglied["img"]}"}
    // EOD;


    if ($i < count($komitee) - 1) {
        $text .= "; ";
    }

    $i++;
    file_put_contents("komitee_brief.txt", $text, FILE_APPEND);
    // file_put_contents("komitee.txt", $text, FILE_APPEND);
}