<?php

	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);//định nghĩa dấu '/'
	defined('SITE_ROOT') ? null : define('SITE_ROOT',DS.'wamp64'.DS.'www'.DS.'WebDiDong_PTPMCN'.DS.'DiThoaiThongMinh-PTPMCN'.DS.'PHPREST');
	//wamp64/www/DiThoaiThongMinh-PTPMCN/PHPREST/includes
	defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
	//wamp64/www/DiThoaiThongMinh-PTPMCN/PHPREST/core
	defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');
	
	require_once(INC_PATH.DS."config.php");
	require_once(CORE_PATH.DS."product.php");
	require_once(CORE_PATH.DS."user.php");
	require_once(CORE_PATH.DS."cart.php");
	require_once(CORE_PATH.DS."tinhTP.php");
	require_once(CORE_PATH.DS."quanhuyen.php");
	require_once(CORE_PATH.DS."xa_phuong.php");
	require_once(CORE_PATH.DS."orders.php");
	require_once(CORE_PATH.DS."comment.php");
	require_once(CORE_PATH.DS."product_sale.php");
	require_once(CORE_PATH.DS."product_type.php");
?>