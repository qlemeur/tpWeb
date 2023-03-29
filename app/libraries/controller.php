<?php

abstract class Controller
{
    public function loadModel(string $model)
    {
        require_once(APPROOT . "/models/" . $model . ".php");
        $this->$model = new $model();
        return $this->$model;
    }

    public function render($vue, array $data = [])
    {
        extract($data);
        ob_start();
        require_once(APPROOT . "/views/". strtolower(get_class($this)) . "/" . $vue . ".php");
        $content = ob_get_clean();
        require_once(APPROOT . "/views/layout/default.php");
    }
}
?>