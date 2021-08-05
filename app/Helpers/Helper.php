<?php

namespace App\Helpers;

class Helper
{
    /**
     * Check if there's a session, indicating that a user is logged in
     */
    public static function isLoggedIn()
    {
        return isset($_SESSION) && 
            isset($_SESSION['user']) && 
            isset($_SESSION['user']['uid']) &&
            (int)$_SESSION['user']['uid'] > 0 ? true : false;
    }


    /**
     * Get the user ID from session from the user that is logged in
     */
    public static function getUserIdFromSession()
    {
        if (self::isLoggedIn()) {
            return (int)$_SESSION['user']['uid'];
        }

        return false;
    }


    /**
     * Get id from URL
     * @param $param (string) the parameter to search for
     * @return value (int)
     */
    public static function getIdFromUrl($param) : int
    {
        $param = trim(strtolower($param));
		$allParams = array();
		$request  = trim($_SERVER['REQUEST_URI']);

		//split the path by '/'
		$params = explode("/", $request);

		//get rid of empty index (check for double or unnessacary slashes)
		$cleans = self::cleansParams($params);

		if (empty($cleans) || (!empty($cleans) && count($cleans) < 2))
		{
			return '';
		}

		for ($i = 0; $i < count($cleans); $i++)
		{
			if (!empty($param))
			{
				if (trim(strtolower($cleans[$i])) == $param)
				{
					if ($i + 1 <= count($cleans) - 1)
					{
						return (int)$cleans[$i + 1];
					}
				}
			}
			else
			{
				if (count($cleans) > 2 && $i + 1 <= count($cleans) - 1)
				{
					$allParams[$cleans[$i]] = $cleans[$i + 1];
				}
			}
		}

		return $allParams;
    }

	/**
	 * Clean up emtpy values in an array that was created by PHP explode function
	 * @param $params (array)
	 * @return array with legitimate data
	 */
    private static function cleansParams($params)
    {
        $cleans = array();
		if (count($params) > 0)
		{
			foreach ($params as $key => $value) {
				if (!empty($value))
				{
					array_push($cleans, trim(strtolower($value)));
				}
			}
		}

		return $cleans;
    }

}