<?php
class Students extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
    }

    public function index()
    {
        $data['all_student'] = $this->Student_model->get_students();
        $data['title'] = 'All Students';
        $this->load->view('templates/header', $data);
        $this->load->view('class/index', $data);
        $this->load->view('templates/footer');
    }


    public function view($number = -1)
    {
        $data['student'] = $this->Student_model->get_students($number);

        if (empty($data['student'])) {
            show_404();
        }

        $data['title'] = $data['student']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('class/view', $data);
        $this->load->view('templates/footer');
    }
}
?>