<?php

declare(strict_types=1);

namespace app\controller;

use app\interfaces\IRenderer;

class Controller implements IRenderer
{
    protected $action;
    protected $layout = 'main';
    protected $useLayout = true;
    protected $defaultAction = 'index';
    protected $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null) : void
    {
        $this->action = $action ? : $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo 'Bad news: 404 (no action)';
        }
    }

    public function render($templateName, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                    'menu' => $this->renderTemplate('menu'),
                    'content' => $this->renderTemplate($templateName, $params),
                    'auth' => false,
                    'username' => ''
                ]
            );
        } else {
            return $this->renderTemplate($templateName, $params = []);
        }
    }

    public function renderTemplate($templateName, $params = [])
    {
        return $this->renderer->renderTemplate($templateName, $params);
    }
}
