<?php

/*====================================
=           Advert Class             =
====================================*/

/**

	Athor:
	- Gleyze Jonathan
	Release:
	- 1.0
	Link:
	- https://github.com/jonasky/Advert-class
**/



/*==========  namespace end use  ==========*/

namespace lib\advert;
use Exception;


class advert
{

	/** Color end theme notification **/
	private $_color = array(
		'succes' => '#16E263', 
		'info' => '#40E6DC', 
		'warning' => '#EDD75A', 
		'danger' => '#EDD75A', 
	);

	private $_style = array(
		'round' => 'notification',
		'top' =>'notification_two',
	);
    


	/** Create advert setting **/
	private $_type;
	private $_keyword;
	private $_text;
	private $_name;
	private $_style_name;


	public function __construct(){
		//set default style
		$name = 'top';
		$name = $this->get_style_array($name);
		$this->_style_name = $name;
	}



    public function session($nameadvert, $type, $keyword, $text){
    	// puch var //
    	$this->hydrate($nameadvert, $type, $keyword, $text);

    	// if the keyword and automatic it will take the value of the type //
    	if ($keyword == 'auto') {
    		$this->set_keyword($this->get_type());
    	}

    	// add a suffix to the name of the array name to avoid the conflict //
    	$namesession = 'advert_'.$nameadvert;

    	if (isset($_SESSION)) {
    		// create temp array for puch session //
    		$nameadvert = array(
    			'name' => $this->get_name(),
    			'type' => $this->get_type(),
    			'keyword' => $this->get_keyword(),
    			'text' => $this->get_text(),
    		);

    		// puch advert session array //
    		$_SESSION[$namesession] = $nameadvert;
    	}else{throw new Exception('find no session : http://php.net/manual/en/session.examples.basic.php'); die();}
    }

    /** push advert **/
    public function push($nameadvert, $type, $keyword, $text){
		// puch var //
    	$this->hydrate($nameadvert, $type, $keyword, $text);

    	// if the keyword and automatic it will take the value of the type //
    	if ($keyword == 'auto') {
    		$this->set_keyword($this->get_type());
    	}

    	//apply color compared to Type //
    	$this->set_type($this->_color[$this->get_type()]);

    	// push advert //
    	$this->initmodel($nameadvert, $type, $keyword, $text);
    }

    public function push_session($nameadvert){
    	
	// adding the suffix to the name of the array//
    $namesession = 'advert_'.$nameadvert;

    if (isset($_SESSION[$namesession])) {
	 		// hydrate function //
    		$this->hydrate($_SESSION[$namesession]['name'], $_SESSION[$namesession]['type'], $_SESSION[$namesession]['keyword'], $_SESSION[$namesession]['text']);
		
    		// if the keyword and automatic it will take the value of the type //
    		if ($_SESSION[$namesession]['keyword'] == 'auto') {
    			$this->set_keyword($this->get_type());
    		}
		
    		//apply color compared to Type //
    		$this->set_type($this->_color[$this->get_type()]);
	
    		// push advert //
    		$this->initmodel($_SESSION[$namesession]['name'], $_SESSION[$namesession]['type'], $_SESSION[$namesession]['keyword'], $_SESSION[$namesession]['text']);
	
    		// delete array //
    		unset($_SESSION[$namesession]);
    	}else{throw new Exception('Not Found advert'); die();}

    	
    }


    /** Sending variable **/
	private function hydrate($nameadvert, $type, $keyword, $text){
		$this->set_name($nameadvert);
		$this->set_type(lcfirst($type));
		$this->set_keyword($keyword);  
		$this->set_text(ucfirst($text));
	}

	/** appearance of advert */
	private function initmodel($nameadvert, $type, $keyword, $text){
		// snipet var //
		$name = '"'.$this->get_name().'"';

		//dyspaly advert //
		echo "<div class='" . $this->get_style() . "'  id='" . $this->get_name() . "' style='background-color:" . $this->get_type()  . "'><strong>" . $this->get_keyword() . " </strong><span>" . $this->get_text() . "</span>
		<span href='' class='advert' id='" . $this->get_name() . "' onclick='advert_hide(". $name .")'><i class='fa fa-times'></i></span></div>";
	}

	/** Add a notification color */
	public function addcolor($name, $addcolor){
		// Check whether the information is valid //
		if (preg_match('/#([a-fA-F0-9]{3}){1,2}\b/', $addcolor) && preg_match("/^[a-zA-Z]+$/", $name)) {
			// new array //
			$tmpcolor = array(''. $name .'' => ''. $addcolor .'');
			// merge temp array in array color //
			$this->_color = array_merge($tmpcolor, $this->_color);
		}else{throw new Exception('hexadecimal code Invalid : http://www.w3schools.com/tags/ref_colorpicker.asp or the name must contain only character'); die();}
	}

	/** Set style */
	public function setstyle($name){
		// Check whether the information is valid //
		if (array_key_exists($name, $this->_style)) {
			// switch name theme do class name//
			$name = $this->get_style_array($name);
			// hydrate var //
			$this->_style_name = $name;
		}else{throw new Exception('Theme not found'); die();}
	}

	/** debug function **/
	public function debug(){
		$array = $this->get_color();
		foreach ($array as $key => $value) {
			echo "nom = ". $key . " couleur = " . $value . "<br>";
		}

		var_dump($_SESSION);

		echo "<br>";
		echo "type = ". $this->get_type()."<br>";
		echo "keyword = ". $this->get_keyword()."<br>";
		echo "text = ". $this->get_text()."<br>";
		echo "style = ". $this->get_style()."<br>";

	}

	/**
	* get end set function 
	**/
    
    /** get **/
	private function get_type(){
		return $this->_type;
	}

	private function get_keyword(){
		return $this->_keyword;
	}

	private function get_text(){
		return $this->_text;
	}

	private function get_color(){
		return $this->_color;
	}

	private function get_name(){
		return $this->_name;
	}

	private function get_style(){
		return $this->_style_name;
	}


	private function get_style_array($key){
		return $this->_style[$key];
	}

	/** set **/
	private function set_type($type){
		$this->_type = $type;
	}

	private function set_keyword($keyword){
		$this->_keyword = $keyword;
	}

	private function set_text($text){
		$this->_text = $text;
	}

	private function set_name($nameadvert){
		$this->_name = $nameadvert;
	}

	private function set_style($style){
		$this->_style_name = $style;
	}
}
?>