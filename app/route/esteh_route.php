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
        $this->file_location = _file_location();
    }

    public function get_content()
    {

        if (getUriSegment(1, 'api')) {

            if (getUriSegment(2, 'admin')) {
                // validation access token
            }

            require_once('./controller/service/api.php');
            return;
        }

        if (file_exists('./app/page' . $this->file_location . '.php')) {
            // Page

            require_once('./app/page' . $this->file_location . '.php');
        } else if (!getUriSegment(1)) {
            // Home

            require_once('./app/_home.php');
        } else {
            // 404 Not Found

            require_once('./app/_notfound.php');
        }
    }

    public function validation_script_file(): array
    {
        if (file_exists('./app/page' . $this->file_location . '.php')) {
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
        return [
            "scriptFile" => [$scriptFile],
            "styleFile" => [$styleFile],
        ];;
    }

    public function setTemplate()
    {
        global $template;

        $scriptFile = $this->validation_script_file()['scriptFile'];
        $styleFile = $this->validation_script_file()['styleFile'];

        if ($scriptFile) {
            foreach ($scriptFile as $script) {
                $template->setScript('<script src="' . $script . '?' . time() . '"></script>');
            }
        }

        if ($styleFile) {
            foreach ($styleFile as $style) {
                $template->setStyle('<link rel="stylesheet" href="' . $style . '?' . time() . '" />');
            }
        }
    }
}
