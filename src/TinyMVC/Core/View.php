<?php

namespace TinyMVC\Core;

abstract class View implements iView {

  protected $viewName;
  protected $htmlFile;
  protected $viewFilePath;

  public function __construct($controller, $actionName) {
    $this->viewName = $controller->getShortName();
    $this->viewFilePath = APP_PATH . DIRECTORY_SEPARATOR . APP_VIEW_DIR . DIRECTORY_SEPARATOR . $this->viewName . DIRECTORY_SEPARATOR . $actionName . ".html";
  }

  protected function loadHTMLFile() {
    $this->htmlFile = file_get_contents($this->viewFilePath);
  }

  public function renderOutput() {
    if ($this->htmlFile == "") {
      $this->loadHTMLFile();
    }
    return $this->htmlFile;
  }
}

?>