<?php
try
{
    $conn = new PDO("mysql:host=localhost;dbname=unibot_project","root","toor");
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
} 
catch (Exception $ex) 
{
    $conn = "error";
}
?>