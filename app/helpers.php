<?php
use Illuminate\Routing\Route;
function route_class(){
  return str_replace('.','-',Route::currenRouteName());
}