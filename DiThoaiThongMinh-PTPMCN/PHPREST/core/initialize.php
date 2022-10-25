<?php

	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);//định nghĩa dấu '/'
	defined('SITE_ROOT') ? null : define('SITE_ROOT',DS.'wamp23'.DS.'www'.DS.'WebDiDong_PTPMCN'.DS.'DiThoaiThongMinh-PTPMCN'.DS.'PHPREST');
	//wamp64/www/DiThoaiThongMinh-PTPMCN/PHPREST/includes
	defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
	//wamp64/www/DiThoaiThongMinh-PTPMCN/PHPREST/core
	defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');
	
	require_once(INC_PATH.DS."config.php");
	require_once(CORE_PATH.DS."product.php");
	require_once(CORE_PATH.DS."user.php");
	require_once(CORE_PATH.DS."cart.php");
	require_once(CORE_PATH.DS."tinhTP.php");
?>