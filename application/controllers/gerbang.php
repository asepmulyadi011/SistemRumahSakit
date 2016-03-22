<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class gerbang extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		redirect('welcome');
	}
	public function rawatinap(){
		redirect('iri/ricreservasi');
	}
	public function rawatdarurat(){
		redirect('IRD/IrDRegistrasi');
	}
}
