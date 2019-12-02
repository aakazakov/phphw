<?php

declare(strict_types=1);

namespace app\engine;

use app\interfaces\IRenderer;

class Render implements IRenderer
{
    public function renderTemplate($templateName, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = App::call()->config['templates_dir'] . $templateName . '.php';
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean();
    }
}
