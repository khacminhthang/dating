<?php

	define('ENVIRONMENT', 'development');

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.(M�i tru?ng ?ng d?ng kh�ng du?c d?t ch�nh x�c)');
	}
}

	$system_path = 'glanceSys';


	$application_folder = 'glanceApp';


	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	$system_path = rtrim($system_path, '/').'/';

	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this:(�u?ng d?n thu m?c h? th?ng c?a b?n du?ng nhu kh�ng du?c d?t ch�nh x�c. Vui l�ng m? t?p sau d�y v� s?a l?i n�y:) ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));


	define('EXT', '.php');

	define('BASEPATH', str_replace("\\", "/", $system_path));

	define('FCPATH', str_replace(SELF, '', __FILE__));

	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this(�u?ng d?n thu m?c ?ng d?ng c?a b?n du?ng nhu kh�ng du?c d?t ch�nh x�c. Vui l�ng m? t?p sau d�y v� s?a l?i n�y): ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

require_once BASEPATH.'core/CodeIgniter.php';
