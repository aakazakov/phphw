<?php

declare(strict_types=1);

namespace app\interfaces;

interface IRenderer
{
    public function renderTemplate($templateName, $params = []);
}