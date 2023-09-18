<?php

namespace App\Controllers;

class Pages extends BaseController
{
  public function index()
  {
    $data = [
      'title' => "Halaman Index",
    ];
    return view('pages/home', $data);
  }
  public function about()
  {
    $data = [
      'title' => "Halaman About",
    ];
    return view('pages/about', $data);
  }
}
