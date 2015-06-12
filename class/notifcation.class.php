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

	private $_color_succes = '#16E263';
	private $_color_info = '#40E6DC' ;
	private $_color_warning = '#EDD75A';
	private $_color_danger = '#EA5858';


	public function puch($type = 'null', $keyword ='null', $text){
		

		// Hydrate function//
		$text = ucfirst($text);

		$this->set_type($type);
		$this->set_keyword($keyword); 
		$this->set_text($text);

		// If the type of notification is not specified then she pressed a succes //
		if (is_null($this->_type)) {
			$type = 'succes';
		}

		// If not keyword then they will not specify the type valer //
		if (is_null($this->_keyword)) {
			$keyword = $type;
			$keyword = ucfirst($keyword);
		}

		// Send the notification with these parameter //
		switch ($type) {
			case 'succes':
				$this->initmodel($this->_type, $this->_keyword = $keyword, $this->_text = $text,  $color = $this->_color_succes  );		
			break;

			case 'info':
				$this->initmodel($this->_type, $this->_keyword = $keyword, $this->_text = $text,  $color = $this->_color_info  );		
			break;

			case 'warning':
				$this->initmodel($this->_type, $this->_keyword = $keyword, $this->_text = $text,  $color = $this->_color_warning  );				
			break;

			case 'danger':
				$this->initmodel($this->_type, $this->_keyword = $keyword, $this->_text = $text,  $color = $this->_color_danger  );			
			break;
		
			default:
				$this->initmodel($this->_type, $this->_keyword = $keyword, $this->_text = $text,  $color = $this->_color_succes  );			
			break;
		}
	}


	private function initmodel($type ='null', $keyword = 'null', $text, $color){
		echo "<div class='notification animated bounceInDown '  id='hide' style='background-color:". $color ."'><strong>". $this->_keyword ." </strong><span>" . $this->_text . "</span><a href='#' onclick='cacher()'><i class='fa fa-times'></i></a></div>";
	}


	// Setter end Getter //

	private function set_type($type){
		 return $this->_type = $type;
	}

	private function set_keyword($keyword){
		return $this->_keyword = $keyword;
	}

	private function set_text($text){
		return $this->_text = $text;
	}

	private function get_type(){
		return $this->_type;
	}

	private function get_keyword(){
		return $this->_keyword;
	}

	private function get_text(){
		return $this->_text;
	}

}

?>