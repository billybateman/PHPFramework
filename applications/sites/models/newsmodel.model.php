<?php
/**
 * The News Model does the back-end heavy lifting for the News Controller
 */
class NewsModel
{
	/**
	 * Holds instance of database connection
	 */
	static $instance;
    private $db;
	
	
	public static function getInstance()
	{
		if(self::$instance ==  null)
			self::$instance = new self();
		return self::$instance;
	}

	private function __clone(){} 
	 
	
	
	public function __construct()
	{
		$this->db = new mysqldriver;
	}

	/**
	 * Fetches article based on supplied name
	 * 
	 * @param string $author
	 * 
	 * @return array $article
	 */
	
	public function get_article($author)
	{		
		//connect to database
		$this->db->connect();
		
		//sanitize data
		$author = $this->db->escape($author);
		
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				`date`,
				`title`,
				`content`,
				`author`
			FROM
				`articles`
			WHERE
				`author` = '$author'
			LIMIT
				1
			;
			"
		);
		
		//execute query
		$this->db->query();
		
		$article = $this->db->fetch('array');
		
		return $article;
	}
	
	public function get_data()
	{		
		//connect to database
		$this->db->connect();
		
			
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				`date`,
				`title`,
				`content`,
				`author`
			FROM
				`articles`
			LIMIT
				10
			;
			"
		);
		
		//execute query
		$this->db->query();
		
		$article = $this->db->fetch('array');
		
		return $article;
	}

}