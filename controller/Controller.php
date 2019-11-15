<?php

declare(strict_types=1);

namespace app\controller;

class Controller
{
    protected $action;
    protected $layout = 'main';
    protected $useLayout = true;

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
            return $this->renderTemplate( "layouts/{$this->layout}", [
                    'menu' => $this->renderTemplate('menu'),
                    'content' => $this->renderTemplate($templateName, $params)
                ]
            );
        } else {
            return $this->renderTemplate($templateName, $params = []);
        }
    }

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
