<?php

declare(strict_types=1);

namespace app\engine;

use app\interfaces\IRenderer;
use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class TwigRender implements IRenderer
{
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(TWIG_TEMPLATES_DIR);
        $this->twig = new Environment($loader);
    }

    public function renderTemplate($templateName, $params = [])
    {
        $templateName .= '.twig';
        if (file_exists(TWIG_TEMPLATES_DIR . $templateName)) {
            return $this->twig->render($templateName, $params);
        }
    }
}
