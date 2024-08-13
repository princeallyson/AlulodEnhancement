<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smartyci extends Smarty
{
    public function __construct()
    {
        parent::__construct();
        
        $this->caching = 0;
        
        $this->setTemplateDir( VIEWPATH );
        
        $this->setCompileDir( APPPATH.'third_party/smarty/templates_c' );
        
        $this->setConfigDir( APPPATH.'third_party/smarty/configs' );

        $this->addPluginsDir( APPPATH.'libraries/smarty/plugins' );

        if (ENVIRONMENT == ENV_DEV)
        {
            $this->setCaching(Smarty::CACHING_OFF);

            $this->clearAllCache(3600);

            $this->clearCompiledTemplate(null, null, 10);

            $this->clearCompiledTemplate();
        }
        else if (ENVIRONMENT == ENV_PRD)
        {
            $this->setCacheDir( APPPATH . 'third_party/cache' );
        }

        # $this->loadFilter('output', 'trimwhitespace');
        
        # $this->registerFilter('output', 'htmlIndent');
        
        $this->registerPlugin('modifier', 'base_url', 'base_url');

        $this->registerPlugin('modifier', 'is_null', 'is_null');
        
        $this->registerPlugin('modifier', 'get_time_ago', 'get_time_ago');
        
        $this->registerPlugin('modifier', 'htmlspecialchars', 'htmlspecialchars');

        $this->registerPlugin('function', 'is_logged_in', 'is_logged_in');

        $this->registerPlugin('function', 'uniqid', 'uniqid');
        
        $this->registerPlugin('function', 'random_int', 'random_int');
    }
    public function _()
    {
        return new self();
    }
    public function _assign($param1, $param2 = NULL)
    {
        if (!is_null($param2))
            $this->assign($param1, $param2);
        else
            $this->assign($param1);

        return $this;
    }
    public function _display($tpl, $is_template=false)
    {
        $this->display( ($is_template ? TEMPLATES_PATH : '') .$tpl.'.tpl');
    }
    public function _fetch($tpl, $tags = array())
    {
        $template = $this->fetch($tpl.'.tpl');

        if (in_array('minify', $tags)) $template = trim(preg_replace('/\s+/', ' ', $template));

        return $template;
    }
    public function dumpTplVars()
    {
        dj( $this->getTemplateVars() );
    }
    public function addFlashStatusMessage() 
    {
        return $this->_assign([
            'info_message'      => flashdata('info_message'),
            'success_message'   => flashdata('success_message'),
            'warning_message'   => flashdata('warning_message'),
            'error_message'     => flashdata('error_message'),
        ]);
    }
    public function addPrevPostData($prev_data_name=null)
    {
        return $this->_assign($prev_data_name ?? 'prev_data', flashdata('prev_data'));
    }
    public function test($string='') 
    {
        return 'Hi, from smarty '.$string;
    }
}