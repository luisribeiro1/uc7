<?php

class SairController {

  public $baseUrl = "http://localhost/uc7/restaurante-mvc";

  public function index() {

    # remove todas as sessões ativas
    session_destroy();

    # redireciona para o ligin
    header("location:" . $this->baseUrl . "/login");
  }

}