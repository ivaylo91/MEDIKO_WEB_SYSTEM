<?php

$connection = new mysqli("localhost", "root", "qwerty13", "websystem1");

if (!$connection) {
    echo "No database";
    exit;
}