<?php

require ROOT . DS . "vendor" . DS . "autoload.php";

// inhibit DOMPDF's auto-loader
define('DOMPDF_ENABLE_AUTOLOAD', false);

//include the DOMPDF config file (required)
require ROOT . DS . 'vendor' . DS . 'dompdf' . DS . 'dompdf' . DS . "dompdf_config.inc.php";

//if you get errors about missing classes please also add:
require_once(ROOT . DS . 'vendor' . DS . 'dompdf' . DS . 'dompdf' . DS . 'include' . DS . 'autoload.inc.php');
// require(ROOT.DS.'..'.'vendor'.DS.'dompdf'.DS.'dompdf');
ob_start();
?>
<!DOCTYPE>
<html>
    <head>
        <?= $this->fetch('css'); ?>
    </head>
    <body>
        <?= $this->fetch('content'); ?>
    </body>
</html>
<?php

$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("sample.pdf", array("Attachment" => 0));
// die;

