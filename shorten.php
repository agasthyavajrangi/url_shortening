<?php
	/**
	 * Shortening URL
	 *
	 * @author AV
	 *
	 *SET Session
	 */
	session_start();

	//include Shortner file
	require_once 'classes/Shortening_url.php';

	/** 
     * @param  $shrt
     */
	$shrt = new Shortening;

	// Check for URL entered
	if (isset($_POST['submitted_url'])) 
	{
    	$url = $_POST['submitted_url'];
    
    // Short url appended
    if ($code = $shrt->makeCode($url)) 
    {
        $_SESSION['user'] = "Shortened URL is : <a href=\"http://localhost:81/url/{$code}\"> http://localhost:81/url{$code}</a>";
    } 
    else 
    {
        $_SESSION['user'] = "Failed.";
    }
}

	 /** 
     * Redirect to home 
     */
    header('Location: index.php');