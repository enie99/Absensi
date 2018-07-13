<?php

class MY_Controller extends CI_Controller
{
	
	function render_page($content, $data = NULL)
	{
		$data['sidebar'] = $this->load->view('backend/sidebar', $data, TRUE);
		$data['content'] = $this->load->view($content, $data, TRUE);
		$this->load->view('backend/index', $data);
	}
}
?>