<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Return_boxes
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function sucess($ms){
		$text = '<div class="card-panel green lighten-1 white-text">';
		$text .= $ms;
		$text .= '</div>';

		return $text;
	}
	public function error($ms){
		$text = '<div class="card-panel red lighten-1 white-text">';
		$text .= $ms;
		$text .= '</div>';

		return $text;
	}
	public function warning($ms){
		$text = '<div class="card-panel orange lighten-1 white-text">';
		$text .= $ms;
		$text .= '</div>';

		return $text;
	}

}

/* End of file return_boxes.php */
/* Location: ./application/libraries/return_boxes.php */
