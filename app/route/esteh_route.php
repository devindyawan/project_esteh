<?php
class Route
{
    public $file_location;

    /**
     * A description of the entire PHP function.
     *
     * @uses create file on ./app/page with folder name as slug and one file index.php
     */

    public function __construct()
    {
        for ($index = 1; $index < countUriSegment() + 1; $index++) {
            $this->file_location .= '/' . getUriSegment($index);
        }
    }

    public function get_content()
    {

        if (file_exists('./app/page' . $this->file_location . '/index.php')) {
            // Page

            require_once('./app/page' . $this->file_location . '/index.php');
        } else if (!getUriSegment(1)) {
            // Home

            require_once('./app/_home.php');
        } else {
            // 404 Not Found

            require_once('./app/_notfound.php');
        }
    }

    public function setTemplate()
    {
        global $template;

        if (file_exists('./app/page' . $this->file_location . '/index.php')) {
            // Page Template

            $scriptCheck = file_exists('./app/script/page/' . getUriSegment(countUriSegment()) . '.js') ? true : false;
            $styleCheck = file_exists('./app/css/' . getUriSegment(countUriSegment()) . '.css') ? true : false;


            $scriptFile = $scriptCheck ? home_url() . '/app/script/page/' . getUriSegment(countUriSegment()) . '.js' : false;
            $styleFile = $styleCheck ? home_url() . '/app/css/' . getUriSegment(countUriSegment()) . '.css' : false;
        } else if (!getUriSegment(1)) {
            // Home Template

            $scriptFile = home_url() . '/app/script/page/_home.js';
            $styleFile = home_url() . '/app/css/_home.css';
        } else {
            // Not Found Template

            $scriptFile = home_url() . '/app/script/page/_notfound.js';
            $styleFile = home_url() . '/app/css/_notfound.css';
        }

        if ($scriptFile) {
            $template->setScript('<script src="' . $scriptFile . '?' . time() . '"></script>');
        }

        if ($styleFile) {
            $template->setStyle('<link rel="stylesheet" href="' . $styleFile . '?' . time() . '" />');
        }
    }
}
