<?php
/**
* The short description
*
* creates notification simply and quickly 
*/
class notification
{
	private $_type;
	private $_keyword;
	private $_text;

	private $_color_succes = '#84EB3F';
	private $_color_info = '#40E6DC' ;
	private $_color_warning = '#EDF33E';
	private $_color_danger = '#EA5858';


	public function puch($type, $keyword, $text){
		
		$this->set_type($type);
		$this->set_keyword($keyword); 
		$this->set_text($text);

		if ($this->_keyword = 'auto') {
			
			echo('key = '.$this->_keyword.'</br>');
			echo('type = '.$this->_type.'</br>');
			$this->set_keyword($this->get_type());
			
		}

		switch ($type) {
			case 'succes':
				$this->initmodel($this->_type, $this->_keyword = $keyword, $this->_text = $text);		
			break;

			case 'info':
				$this->initmodel($this->_type, $this->_keyword = $keyword, $this->_text = $text);		
			break;

			case 'warning':
				$this->initmodel($this->_type, $this->_keyword = $keyword, $this->_text = $text);		
			break;

			case 'danger':
				$this->initmodel($this->_type, $this->_keyword = $keyword, $this->_text = $text);		
			break;
		
			default:
				$this->initmodel($this->_type, $this->_keyword = $keyword, $this->_text = $text);		
			break;
		}
	}

	private function initmodel($type, $keyword, $text){
		echo "<div class='notification' stle='background-color:" . $this->_color_succes  . " '><strong>". $this->_keyword ."</strong><span>" . $this->_text . "</span><a href='#''><i class='fa fa-times'></i></a></div>";
	}


	private function set_type($type){
		$this->_type = $type;
	}

	private function set_keyword($keyword){
		$this->_keyword = $keyword;
	}

	private function set_text($text){
		$this->_text = $text;
	}

	private function get_type(){
		$this->_type;
	}

	private function get_keyword(){
		$this->_keyword;
	}

	private function get_text(){
		$this->_text;
	}

}

?>