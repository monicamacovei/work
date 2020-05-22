<?php
function __autoload($class)
{
	if(file_exists(DIRECTOR_SITE . SLASH . 'util' . SLASH . $class . '.php'))
	{
	    //echo DIRECTOR_SITE . SLASH . 'util' . SLASH . $class . '.php';
		require_once DIRECTOR_SITE . SLASH . 'util' . SLASH . $class . '.php';
    }
	elseif (file_exists(DIRECTOR_SITE . SLASH . 'models' . SLASH . $class . '.php')) 
	{
	//echo DIRECTOR_SITE . SLASH . 'models' . SLASH . $class . '.php';
	require_once DIRECTOR_SITE . SLASH . 'models' . SLASH . $class . '.php';
    }
	elseif (file_exists(DIRECTOR_SITE . SLASH . 'controllers' . SLASH . $class . '.php')) 
	{
	//echo DIRECTOR_SITE . SLASH . 'controllers' . SLASH . $class . '.php';
	require_once DIRECTOR_SITE . SLASH . 'controllers' . SLASH . $class . '.php';
    }
	elseif (file_exists(DIRECTOR_SITE . SLASH . 'views' . SLASH . $class . '.php') ) {
	//echo DIRECTOR_SITE . SLASH . 'views' . SLASH . $class . '.php';
	require_once DIRECTOR_SITE . SLASH . 'views' . SLASH . $class . '.php';
    }


}
?>