<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'login';
$route['home'] = 'tarefas/home';
$route['view'] = 'tarefas/view';
$route['drop'] = 'tarefas/drop';
$route['download'] = 'tarefas/download';
$route['editar'] = 'tarefas/editar';
$route['edit'] = 'tarefas/edit';
$route['registro'] = 'cadastro/registro';
$route['do_upload'] = 'registro/do_upload';
$route['usuario'] = 'user/usuario';
$route['send'] = 'usuario/send';
$route['login'] = 'usuario/login';
$route['sair'] = 'usuario/sair';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
