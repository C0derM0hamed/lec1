<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

with($app)->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$user = \App\Models\User::first();
$token = $user->createToken('test')->plainTextToken;
echo $token;
?>
