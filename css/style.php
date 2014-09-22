<?php

if (!defined('ABSPATH')) {
	die('Error.');
}

include_once ABSPATH . "wp-load.php";

header("Content-type: text/css");

$layout_blog = foliogine_lite('layout_blog');
$layout_single = foliogine_lite('layout_single');
$address_map = foliogine_lite('address_map');

if (isset($layout_blog) && ($layout_blog == 'valoare1')) {

?>

	body.search .sidebar, body.blog .sidebar, body.archive .sidebar {
		display:none !important;
	}

	body.search section.bloglist .left, body.blog section.bloglist .left, body.archive section.bloglist .left {
		width:100% !important;
	}

<?php

}

else if (isset($layout_blog) && ($layout_blog == 'valoare2')) {

?>

	body.search .list-post-info, body.blog .list-post-info, body.archive .list-post-info   {
		display:none !important;
	}

	body.search .list-post-content, body.blog .list-post-content, body.archive .list-post-content {
		width:100% !important;
	}

<?php

}


if (isset($layout_single) && ($layout_single == 'valoare1')) {
?>

    body.single .sidebar {
		display:none !important;
	}

	body.single section.bloglist .left {
		width:100% !important;
	}

<?php

}

else if (isset($layout_single) && $layout_single == 'valoare2') {

?>

	body.single .list-post-info   {

		display:none !important;

	}

	body.single .list-post-content {

		width:100% !important;

	}

<?php

}



if (!isset($address_map) || ($address_map == '')) {

?>

	.contact .left {

		display:none !important;

	}

	.contact .right {

		width:100% !important;

	}

<?php

}