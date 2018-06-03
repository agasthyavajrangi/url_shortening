<?php
//includes Shortening_url file
require_once 'classes/Shortening_url.php';

// Checks for the short url
if (isset($_GET['code'])) 
{
	/** 
     * @param Shortener $shrt
     * @param $code
     */
    $shrt    = new Shortening;
    $code = $_GET['code'];
    
    if ($url = $shrt->getUrl($code)) 
    {
        header("Location: {$url}");
        die();
    }
}
     /** 
     * Redirect to home page
     */
    header('location: index.php');