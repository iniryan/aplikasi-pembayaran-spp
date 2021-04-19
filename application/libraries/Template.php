<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template
{
    var $template_data = array();

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = array(), $return = false )
    {
        $this->ci =& get_instance();
        $this->set('contents', $this->ci->load->view($view, $view_data, true));
        return $this->ci->load->view($template, $this->template_data, $return);
    }
}


?>