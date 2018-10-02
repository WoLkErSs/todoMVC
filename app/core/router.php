<?php 
  class Router {
    private $controller_name;
    private $action_name;
    private $request;
    private $controller;
    const DEFAULT_CONTROLLER = 'todolists';
    const DEFAULT_ACTION = 'index';

    public function init() {
      $this -> request = $_SERVER['REQUEST_URI'];
      $explode_arrya = explode('/', $this -> request);
      $count = COUNT(explode('/', $this -> request));

      if ($this -> request == '/') {
        $this -> controller_name = self::DEFAULT_CONTROLLER;
        $this -> action_name = self::DEFAULT_ACTION;
      }elseif ($count == 2 || $count == 3 and $explode_arrya[1] == 'todolists' and $explode_arrya[2] == '') {
        $this -> controller_name = $explode_arrya[1];
        $this -> action_name = self::DEFAULT_ACTION;
      }elseif ($explode_arrya[1] != 'todolists' and $count == 2) {
        $this -> controller_name = self::DEFAULT_CONTROLLER;
        $this -> action_name = $explode_arrya[1];
      }else {
        $this -> controller_name = $explode_arrya[1];
        $this -> action_name = $explode_arrya[2];
      }
      $controller_name = lcfirst($this -> controller_name).'_controller';
      if (file_exists("app/controllers/$controller_name.php")) {
        require "app/core/controller.php";
        require "app/controllers/$controller_name.php";
        $this -> controller = ucfirst($this -> controller_name).'Controller';
        $controller = new $this -> controller($this -> controller_name);
        if (method_exists($controller , "{$this -> action_name}")) {
          $action = $this -> action_name;
          $controller -> $action();
        }else{
          var_dump("{$this -> action_name}");
          require "app/controllers/errors_controller.php";
          $error = new ErrorsController;
          $error -> error405();
        }
      }else {
        require "app/controllers/errors_controller.php";
        $error = new ErrorsController;
        $error -> error404();
      } 
      
    }
  }
 ?>