<?php defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists('flash_message'))
{
    
    function flash_message($type = '_success',$content = ''){
        $CI =& get_instance();
        $CI->session->set_flashdata($type, $content);
    }
}

if ( ! function_exists('aasort'))
{

    function aasort (&$array, $key) {

        $sorter=array();
        $ret=array();
        reset($array);
        
        foreach ($array as $ii => $va) {
            $sorter[$ii]=$va[$key];
        }
        
        asort($sorter);
        foreach ($sorter as $ii => $va) {
            $ret[$ii]=$array[$ii];
        }
        
        $array=$ret;

    }

}

if ( ! function_exists('table_row_color'))
{

    function table_row_color ($code) {
        switch($code){
            case "Processing":
                return "warning";
                break;
            case "Delivered":
                return "success";
            case "Return":
                case "Partial Delivery":
                case "Payment Due":
                return "danger";
            case "Shipped":
                return "info";
            case "Pending bKash":
                return "active";
            case "Delay":
                return "delay";
            default:
                return "default";
        }

    }

}

if ( ! function_exists('status_color'))
{

    function status_color ($code) {
        switch($code){
            case "processing":
                return "warning";
                break;
            case "delivered":
            case "solved":
            case "complete":
                return "success";
            case "return":
            case "pending":
            case "partial delivery":
            case "payment due":
                return "danger";
            case "shipped":
                return "info";
            case "pending bkash":
                return "warning";
            case "delay":
                return "delay";
            default:
                return "default";
        }

    }

}

if ( ! function_exists('pagination'))
{

    function pagination ($total_rows,$per_page,$url,$segment) {

        $ci = & get_instance();
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = $segment;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;

        $ci->load->library('pagination');
        $ci->pagination->initialize($config);
        return $ci->pagination->create_links();

    }

}

if( ! function_exists('do_upload'))
{

    function do_upload($field_name = 'upload', $args = array('path' => NULL,  'size' => "5150", 'file_name'=>NULL))
    {
        $ci = & get_instance();
        
        $path = $args['path'];

        if($path == "")
            $path = FCPATH."upload";
        else
            $path = FCPATH."upload/".$path;

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = @$args['size'];
        
        if(@$args['file_name'] != NULL)
            $config['file_name']            = $args['file_name'];
        // $config['max_width']            = ;
        // $config['max_height']           = 768;

        $ci->load->library('upload', $config); 

        if ( ! $ci->upload->do_upload($field_name))
        {
            $ci->session->set_flashdata('file_error', $ci->upload->display_errors());
            return false;
        }
        else
        {
            return $ci->upload->data();
        }
    }
}


/**
 * Thumb()
 * A TimThumb-style function to generate image thumbnails on the fly.
 *
 * @access public
 * @param string $fullname
 * @param int $width
 * @param int $height
 * @param string $image_thumb
 * @return String
 *
 */

if( ! function_exists('thumb'))
{

    function thumb($fullname, $width, $height)
    {
        
        if(empty($fullname)||$fullname=='') return false;
        // Path to image thumbnail in your root
        $dir            = FCPATH.'upload/';
        $url            = base_url() . 'upload/';
        // Get the CodeIgniter super object
        $CI = &get_instance();
        // get src file's extension and file name
        $extension = pathinfo($fullname , PATHINFO_EXTENSION);
        $filename = pathinfo($fullname, PATHINFO_FILENAME);
        $dirname = pathinfo($fullname, PATHINFO_DIRNAME);
        
        if($dirname) {
            $dir = $dir.$dirname.'/';
            $url = $url.$dirname.'/';
        }

        $target_path = $dir.'thumb/';
        $image_org = $dir . $filename . "." . $extension;
        $image_thumb = $dir .'thumb/'.$filename . "-" . $height . '_' . $width . "." . $extension;
        $image_returned = $url .'thumb/'. $filename . "-" . $height . '_' . $width . "." . $extension;

        if (!file_exists($image_thumb)) {
            
            if (!file_exists($target_path)) {
                mkdir($target_path, 0777, true);
            }
            // LOAD LIBRARY
            $CI->load->library('image_lib');
            // CONFIGURE IMAGE LIBRARY
            $config['source_image'] = $image_org;
            $config['new_image'] = $image_thumb;
            $config['width'] = $width;
            $config['height'] = $height;
            $CI->image_lib->initialize($config);
            $CI->image_lib->resize();
            $CI->image_lib->clear();
        }

        return $image_returned;
    }
}

if ( ! function_exists('linear_color'))
{

    function linear_color($num = 4, $ratio = .9, $from = "efefef", $to = "1eb02b") {
            $ratio = $ratio*$num/100;
            // normalize ralio
            $ratio = $ratio<0?0:($ratio>1?1:$ratio);
            // unsure colors are numeric values
            if(!is_numeric($from))$from=hexdec($from);
            if(!is_numeric($to))$to=hexdec($to);

            $rf = 0xFF & ($from >> 0x10);
            $gf = 0xFF & ($from >> 0x8);
            $bf = 0xFF & $from;
            $rt = 0xFF & ($to >> 0x10);
            $gt = 0xFF & ($to >> 0x8);
            $bt = 0xFF & $to;
            return str_pad( dechex(($bf + (($bt-$bf)*$ratio)) + ($gf + (($gt-$gf)*$ratio) << 0x8) + ($rf + (($rt-$rf)*$ratio) << 0x10)), 6,'0',STR_PAD_LEFT);
    }
}

if ( ! function_exists('debug'))
{

    function debug($var = NULL){
        echo "<pre>";
        if(is_array($var))
            print_r($var);
        elseif(is_object($var))
            var_dump($var);
        else
            echo $var;
        echo "</pre>";
    }

}

if ( ! function_exists('dd'))
{

    function dd($var){
        debug($var);
        exit;
    }

}
