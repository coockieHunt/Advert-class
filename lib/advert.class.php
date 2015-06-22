<?php

/*====================================
=           Advert Class             =
====================================*/

/**

	Athor:
	- Gleyze Jonathan
	Release:
	- 1.2
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
		'succes' => '#61bd6d', 
		'info' => '#54acd2', 
		'warning' => '#fba026', 
		'danger' => '#d14841', 
	);

	private $_style = array(
		'round' => 'advert_round',
		'top' =>'advert_top',
	);

	private	$_advert_name = array(
		'error',
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


	/**
	 * [Storing a advert session]
	 * @param  [string] $nameadvert [id of advert]
	 * @param  [string] $type [type of advert (succes = green/ info= blue / etc.)]
	 * @param  [string] $keyword [dysplay advert keyword, if 'auto' then keyword]
	 * @param  [$text] $text [dysplay advert keyword, if 'auto' then keyword]
	 * @return [$this] [store data]
	 */
    public function session($nameadvert, $type, $keyword, $text){
    	// push var //
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

    /**
	 * [Dysplay a advert]
	 * @param  [string] $nameadvert [id of advert]
	 * @param  [string] $type [type of advert (succes = green/ info= blue / etc.)]
	 * @param  [string] $keyword [dysplay advert keyword, if 'auto' then keyword]
	 * @param  [$text] $text [dysplay advert keyword, if 'auto' then keyword]
	 * @return [$this] [Dysplay a advert]
	 */
    public function push($nameadvert, $type, $keyword, $text){
		
		// add name array check //
    	if (!in_array($nameadvert, $this->_advert_name)) {
			
			array_push($this->_advert_name, $nameadvert);

		}else{throw new Exception("Cannot redeclare name advert"); die();;}


		// push var //
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

    /**
	 * [push a advert store session]
	 * @param  [string] $nameadvert [id of advert]
	 * @return [$this] [Dysplay a advert]
	 */
    public function push_session($nameadvert){
    
        if (!in_array($nameadvert, $this->_advert_name)) {	
			array_push($this->_advert_name, $nameadvert);
		}else{throw new Exception("Cannot redeclare name advert"); die();;}


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


    /**
	 * [Sending variable]
	 * @param  [string] $nameadvert [id of advert]
	 * @param  [string] $type [type of advert (succes = green/ info= blue / etc.)]
	 * @param  [string] $keyword [dysplay advert keyword, if 'auto' then keyword]
	 * @param  [$text] $text [dysplay advert keyword, if 'auto' then keyword]
	 * @return [$this] [hydrate a function]
	 */
	private function hydrate($nameadvert, $type, $keyword, $text){
		$this->set_name($nameadvert);
		$this->set_type(lcfirst($type));
		$this->set_keyword($keyword);  
		$this->set_text(ucfirst($text));
	}

	/**
	 * [appearance of advert]
	 * @param  [string] $nameadvert [id of advert]
	 * @param  [string] $type [type of advert (succes = green/ info= blue / etc.)]
	 * @param  [string] $keyword [dysplay advert keyword, if 'auto' then keyword]
	 * @param  [$text] $text [dysplay advert keyword, if 'auto' then keyword]
	 * @return [$this] [dysplay advert]
	 */
	private function initmodel($nameadvert, $type, $keyword, $text){
		// snipet var //
		$name = '"'.$this->get_name().'"';

		//dyspaly advert //
		echo "<div class='" . $this->get_style() . "'  id='" . $this->get_name() . "' style='background-color:" . $this->get_type()  . "'><strong>" . $this->get_keyword() . " </strong><span>" . $this->get_text() . "</span>
		<span href='' class='advert' id='" . $this->get_name() . "' onclick='advert_hide(". $name .")'><i class='fa fa-times'></i></span></div>";
	}

	/**
	 * [Add a notification color]
	 * @param  [string] $name [name of type]
	 * @param  [string] $addcolor [color HEX]
	 * @return [$this] [set new color "type"]
	 */
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
	/**
	 * [Set style]
	 * @param  [string] $name [name of type]
	 * @return [$this] [set new color "style"]
	 */
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

		var_dump($this->_advert_name);

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

	private function get_name_array($key){
		return $this->_advert_name[$key];
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