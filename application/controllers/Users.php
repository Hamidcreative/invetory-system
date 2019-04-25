<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    public function index() //listing
    {
        $this->show('users/listing');
    }
    public function add(){
        $this->show('users/add');
    }
    public function destroy(){
         
    }
}
