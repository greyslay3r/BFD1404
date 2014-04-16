<?php

class Home extends CI_Controller
{
    function index()
{
    $this->load->model("testmodel");
    $data['records'] = $this->testmodel->getAllRecords();
    $this->load->view("homeview",$data);
}
    function about()
{
 
    $data["title"] = "About Us";
    $data["content"] = "About My Website.......";
 
    $this->load->view("about",$data);
}
}

?>