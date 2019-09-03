<?php
/*
Plugin Name: Query String Content
Description: Provides a shortcode to retrieve any query string from the url and display it or display content if specified value is set.
Version: 1.0
Text Domain: Query String Content
Author: Andrew Greirson | <a href = "https://pixelkey.com.au" target="_blank">Pixel Key</a>
*/


function query_string_content_shortcode($atts = [], $content = null, $tag = '')
{
   
    // normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);
 
    // override default attributes with user attributes
    $query_string_atts = shortcode_atts([
                                     'field' => '',
                                    'value' => '',
                                    'find' => ''
                                 ], $atts, $tag);
    
$field = $query_string_atts['field'];
$value = $query_string_atts['value'];
$find_in_string = $query_string_atts['find'];
    
    
$query_string_value = $_GET[$field] != '' ? $_GET[$field] : '';    

if ( $field === '' &&  $value === '' && $find_in_string === '') {
         
    $instructions = '<p><strong>Please specify a field and value to return content or specify just a field to return a value.</strong></p>';
    $instructions .= '<p><strong>EXAMPLE 1</strong>';
    $instructions .= '<br />URL: example.com/home/?city=Perth';
    $instructions .= '<br />SHORTCODE: [query_string_content field="city" value="Perth"]The text will display[/query_string_content]';
    $instructions .= '<br />RESULT: The text will display</p>';   
    
    $instructions .= '<p><strong>EXAMPLE 2</strong>';
    $instructions .= '<br />URL: example.com/home/?city=Perth';
    $instructions .= '<br />SHORTCODE: [query_string_content field="city"][/query_string_content]';
    $instructions .= '<br />RESULT: Perth</p>'; 

    $instructions .= '<p><strong>EXAMPLE 3</strong>';
    $instructions .= '<br />URL: example.com/home/?city=Perth';
    $instructions .= '<br />SHORTCODE: [query_string_content find="Perth"]Yes, the string was found[/query_string_content]';
    $instructions .= '<br />RESULT: Yes, the string was found</p>';     
        
    return $instructions;
}
    
if ( mb_strtoupper($query_string_value) === mb_strtoupper($value) && $value) {
    if (!is_null($content)) {
         return $content;
    }   
}
    
    
if ( $field && $value === '' &&  $find_in_string === '') {
         return $query_string_value;
}
    
if ( $find_in_string ) {

$queries = strstr($_SERVER['REQUEST_URI'], '?');
$value_search = strstr($queries, $find_in_string);
if ($value_search && !is_null($content)) {
     return $content;
}
}
    
       
}


function query_string_shortcodes_init()
{
    add_shortcode('query_string_content', 'query_string_content_shortcode');
    
}
 
add_action('init', 'query_string_shortcodes_init');