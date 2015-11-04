<?php

/**
 * Installs all tables in the mysql.sql file, using the default mysql connection
 */

/* Change and uncomment this when you need to: */


class init_sql{
	function init(){
		mysql_connect('43.229.115.122', 'a0715123205', "5e362558");
if (mysql_errno())
{
	die(' Error '.mysql_errno().': '.mysql_error());
}

mysql_select_db('a0715123205');


$sql = file_get_contents(dirname(__FILE__) . '/mysql.sql');
$ps  = explode('#--SPLIT--', $sql);

foreach ($ps as $p)
{
	$p = preg_replace('/^\s*#.*$/m', '', $p);
	
	mysql_query($p);
	if (mysql_errno())
	{
		die(' Error '.mysql_errno().': '.mysql_error());
	}
}
	}
}

?>