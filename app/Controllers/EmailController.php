<?php

namespace App\Controllers;

use Medoo\Medoo;

class EmailController
{
    public function sendEmail()
    {
        $databaseConfig = require_once __DIR__ . '/config/database.php';
        $database = new Medoo($databaseConfig);

        $datas = $database->select("deals", [
            "application_id",
            "client",
            "status"
        ], [
            "application_id[<]" => 1000
        ]);

        foreach ($datas as $data) {
            if ($data['status'] === 'offer') {
                echo "Application_id: " . $data["application_id"] .
                    " - Client: " . $data["client"] .
                    " - Status: " . $data["status"] . " - Send Email!" . "<br/>";
            }
        }

    }
}