<?php
session_start();
require_once __DIR__ . '/../models/TuVanModel.php';

$ds_tuvan = get_tuvan_by_user($_SESSION['user']['id']);

require_once __DIR__ . '/../views/tuvan/list.php';
