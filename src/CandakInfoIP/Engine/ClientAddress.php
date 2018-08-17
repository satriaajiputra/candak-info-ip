<?php
namespace CandakInfoIP\Engine;

/**
 * For getting some client from server information
 */
class ClientAddress
{
    /**
     * Get IP Adress from client
	 * 
	 * @return mixed
     */
    public static function getClientIP()
    {
        $ip = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ip = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ip = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ip = $_SERVER['REMOTE_ADDR'];
	    else
	        $ip = false;
	    return $ip;
    }

	/**
	 * Get user agent from client
	 * 
	 * @return mixed
	 */
    public static function getClientUserAgent()
    {
    	return !(isset($_SERVER['HTTP_USER_AGENT'])) ? false : $_SERVER['HTTP_USER_AGENT'];
    }
}