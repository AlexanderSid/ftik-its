<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class View_test extends TestCase
{
        public function setUp()
        {
            $this->resetInstance();
            $this->CI->load->model('My_Model');
            $this->obj = $this->CI->My_Model;
            $this->form_validation = new CI_Form_validation();
        }
        
        // B U K A  H A L A M A N //
        
        public function test_halamanloginadmin()
        {
            $_SESSION['username'] = "admin";
            $this->request('GET', 'My_Controller/login');
            $this->assertRedirect('My_Controller/admin');
	}
        
        public function test_halamanloginadmin_fail()
        {
            $output = $this->request('GET', 'My_Controller/login');
            $this->assertContains('<title>Login Form</title>', $output);
	}
        
        public function test_halamanloginadmin_else()
        {
            $_SESSION['isLogin'] = false;
            $output = $this->request('GET', 'My_Controller/login_admin');
            $this->assertContains("<script> alert('Username atau Password yang anda masukkan salah!') </script>", $output);
	}
        
        public function test_halamanHome()
        {
            $output = $this->request('GET', 'My_Controller/index');
            $this->assertContains('<title>P O L A L O Y D  </title>', $output);
	}
        
        public function test_halamanKomentar()
        {
            $_SESSION['username'] = "admin";
            $output = $this->request('GET', 'My_Controller/komentar');                                                      
            $this->assertRedirect('My_Controller/readDataKomentar', $output);  
	}  
        
        public function test_halamanKomentar_fail()
        {
//            $_SESSION['username'] != "admin";
            
            $output = $this->request('GET', 'My_Controller/komentar');                                                      
            $this->assertRedirect('My_Controller/login', $output);  
	}
}