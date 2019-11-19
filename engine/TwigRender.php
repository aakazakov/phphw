<?php

declare(strict_types=1);

namespace app\engine;

use app\interfaces\IRenderer;
use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class TwigRender implements IRenderer
{
    public function renderTemplate($templateName, $params = [])
    {
        $templateName .= '.twig';
        if (file_exists(TWIG_TEMPLATES_DIR . $templateName)) {
            $loader = new FilesystemLoader(TWIG_TEMPLATES_DIR);
            $twig = new Environment($loader);
            return $twig->render($templateName, $params);
        }
    }
}
