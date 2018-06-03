<?php

/**
 * Shortening Class 
 *
 * @author AV
 */

class Shortening
{
	/**
     * 
     *
     * @var object
     */
	protected $dbconnect;

    /**
     * establishing database connection
     * @param Hostname
     * @param Username
     * @param Password
     * @param Database Name
     */
	public function __construct()
	{
		$this->dbconnect = new mysqli('localhost', 'root', '', 'test_urls');
	}

    /*Generating a unique short code 
     */
	protected function generateCode($num){
		return base_convert($num, 10, 36);
	}

	 /**
     * Make Code
     * 
     * Select, Insert, Update
     * @param $url
     * 
     */
	public function makeCode($url)
	{
		$url = trim($url);
		if(!filter_var($url, FILTER_VALIDATE_URL))
		{
			return '';
		}

		$url = $this->dbconnect->escape_string($url);

		// IS existance
		$is_exists = $this->dbconnect->query("SELECT code FROM tbl_url WHERE url = '{$url}'");

		if($is_exists->num_rows)
		{
			return $is_exists->fetch_object()->code;
		}
		else
		{
			// Insert record without a code
			$this->dbconnect->query("INSERT INTO tbl_url (url, created) VALUES ('{$url}', NOW())");

			// Generate code based on inserted ID
			$code = $this->generateCode($this->dbconnect->insert_id);

			// Update the record with the generated code
			$this->dbconnect->query("UPDATE tbl_url SET code = '{$code}' WHERE url = '{$url}'");

			return $code;
		}
	}

	/**
     * Fetching short URL
     * @param $code
     */
	 public function getUrl($code){
	 	$code = $this->dbconnect->escape_string($code);

	 	$code = $this->dbconnect->query("SELECT url FROM tbl_url WHERE code = '$code'");

	 	if($code->num_rows){
	 		return $code->fetch_object()->url;
	 	}

	 	return '';
	 }
}
