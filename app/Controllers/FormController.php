<?php

namespace App\Controllers;

use Medoo\Medoo;

require_once 'index.html';

class FormController
{
    public function index()
    {
        $databaseConfig = require_once __DIR__ . '/config/database.php';
        $database = new Medoo($databaseConfig);

        $database->insert("applications", [
            "email" => $email = $_POST['email'],
            "sum" => $sum = $_POST['sum']
        ]);

        if ($sum >= 5000) {
            $database->insert("deals", [
                "application_id" => $applications_id = $database->id(),
                "client" => 'A',
                "status" => 'ask'
            ]);
        } else {
            $database->insert("deals", [
                "application_id" => $applications_id = $database->id(),
                "client" => 'B',
                "status" => 'ask'
            ]);
        }
    }
}