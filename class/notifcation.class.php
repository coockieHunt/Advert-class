<?php

namespace lib\advert;
use Exception;

/**
* The short description
*
* creates advert simply and quickly 
**/

class advert
{
	/** Create advert setting **/
	private $_type;
	private $_keyword ;
	private $_text;

	/** Default color notification **/
	private $_color = array(
		'succes' => '#16E263', 
		'info' => '#40E6DC', 
		'warning' => '#EDD75A', 
		'danger' => '#EDD75A', 
	);
    
	/** push advert **/
    public function push($type, $keyword, $text){
    	$this->hydrate($type, $keyword, $text);

    	// if the keyword and automatic alor it will take the value of the type //
    	if ($keyword == 'auto') {
    		$this->set_keyword($this->get_type());
    	}

    	//apply color compared to Type //
    	$this->set_type($this->_color[$this->get_type()]);

    	$this->initmodel($type, $keyword, $text);
    }


	/** Add a notification color */
	public function addcolor($name, $addcolor){
		// vcheck whether the information is valid //
		if (preg_match('/#([a-fA-F0-9]{3}){1,2}\b/', $addcolor) && preg_match("/^[a-zA-Z]+$/", $name)) {
			$tmpcolor = array(''. $name .'' => ''. $addcolor .'');
			$this->_color = array_merge($tmpcolor, $this->_color);
		}else{throw new Exception('hexadecimal code Invalid : http://www.w3schools.com/tags/ref_colorpicker.asp or the name must contain only character');}
	}
    

    /** Sending variable **/
	private function hydrate($type, $keyword, $text){
		$this->set_type(lcfirst($type));
		$this->set_keyword($keyword); 
		$this->set_text(ucfirst($text));
	}

	/** appearance of advert */
	private function initmodel($type, $keyword, $text){
		echo "<div class='notification animated bounceInDown'  id='hide' style='background-color:" . $this->get_type()  . "'><strong>" . $this->get_keyword() . " </strong><span>" . $this->get_text() . "</span><a href='#' onclick='cacher()'><i class='fa fa-times'></i></a></div>";
	}

	/** debug function **/
	public function debug(){
		$test = $this->get_color();
		foreach ($test as $key => $value) {
			echo "nom = ". $key . " couleur = " . $value . "<br>";
		}
		echo "<br>";
		echo "type = ". $this->get_type()."<br>";
		echo "keyword = ". $this->get_keyword()."<br>";
		echo "text = ". $this->get_text()."<br>";
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
}
?>