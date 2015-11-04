<?php
if (isset($_POST['type'])) {
	include "interface/" . $_POST['type'] . ".php";
} else {
	echo "error";
}

exit;

?>