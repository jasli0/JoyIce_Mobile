<?php
require 'vendor/autoload.php';

use MongoDB\Client;

// MongoDB Atlas connection
$uri = "mongodb+srv://jasondionanao87:Pogiakoxd123@cluster0.kzbqdga.mongodb.net/"; // Replace with your MongoDB Atlas URI
$databaseName = "Joyicedb"; // Replace with your database name

// MongoDB Atlas connection
$client = new Client($uri);

// Select your database and collection
$db = $client->selectDatabase($databaseName);
$collection = $db->selectCollection('JIp');

// Retrieve the submitted username and password
$username = $_POST['user'];
$password = $_POST['pass'];

// Query the database to check if the user exists and the password is correct
$user = $collection->findOne(['username' => $username, 'password' => $password]);

if ($user) {
    // User is authenticated
    echo "Login successful!";
} else {
    // Invalid login
    echo "Invalid username or password.";
}
