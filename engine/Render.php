<?php

declare(strict_types=1);

namespace app\engine;

class Render
{
    public function renderTemplate($templateName, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $templateName . '.php';
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean();
    }
}
