<?php

$conn = mysqli_connect("localhost", "root", "", "411");

if (!$conn) {
    echo "Connection Failed";
}