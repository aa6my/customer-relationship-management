<?php
  //Loads configuration from database into global CI config
  function load_config()
  {
   $CI =& get_instance();
   foreach($CI->Siteconfig_model->get_all()->result() as $site_config)
   {
    $CI->config->set_item($site_config->key,$site_config->value);
   }
  }
?>