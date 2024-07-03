<?php

class Template
{
    public $javascript;
    public $style;
    function __construct()
    {
    }

    function getScript()
    {
        return $this->javascript;
    }

    function setScript($script)
    {
        $this->javascript = $script;
    }

    function getStyle()
    {
        return $this->style;
    }

    function setStyle($style)
    {
        $this->style = $style;
    }
}

$template = new Template;

require_once("esteh_route.php");

$route = new Route;
$route->setTemplate();

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $GLOBALS['esteh_title'] ?></title>
</head>
<?= $template->getStyle() ?>

<body>
    <?= $route->get_content() ?>

</body>
<script src="<?= home_url() . '/app/script/index.js?' . time() ?>"></script>
<?= $template->getScript() ?>

</html>