<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 //ini_set('error_reporting', E_STRICT);
 //require_once APPPATH."/libraries/admin/PHPExcel/Classes/PHPExcel/Shared/ZipArchive.php";
 require_once APPPATH."/libraries/PHPExcel.php";


 class Excel extends PHPExcel
 {
 	public function __construct()
 	{
 		parent::__construct();
 	}
 }