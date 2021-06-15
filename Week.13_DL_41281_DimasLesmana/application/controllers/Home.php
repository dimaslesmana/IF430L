<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('dosen');
        $this->load->model('mahasiswa');
    }

    public function index()
    {
        if (!$this->session->loggedIn) {
            $data['title'] = "Login";

            $this->load->view('templates/login-header', $data);
            $this->load->view('home/login_view');
            $this->load->view('templates/login-footer');
            return;
        }

        return redirect('dosen');
    }

    public function login()
    {
        if ($this->session->loggedIn) {
            return redirect('/');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if (!$this->form_validation->run()) {
            $data['title'] = "Login";

            $this->load->view('templates/login-header', $data);
            $this->load->view('home/login_view');
            $this->load->view('templates/login-footer');
            return;
        }

        // Get POST data
        $email = $this->input->post('email', TRUE);
        $password = md5($this->input->post('password', TRUE));

        $user = $this->admin->getAdminByEmail($email);

        if (!$user) {
            // email or account not found
            $this->session->set_flashdata('error_message', '<p class="text-center text-danger">Data yang anda masukkan tidak valid!</p>');
            return redirect('/');
        }

        if ($user['password'] !== $password) {
            // wrong password
            $this->session->set_flashdata('error_message', '<p class="text-center text-danger">Data yang anda masukkan tidak valid!</p>');
            return redirect('/');
        }

        $userSession = [
            'loggedIn' => TRUE,
            'fullName' => $user['fname_admin'] . " " . $user['lname_admin']
        ];

        $this->session->set_userdata($userSession);

        return redirect('/');
    }

    public function logout()
    {
        if (!$this->session->loggedIn) {
            return redirect('/');
        }

        $this->session->unset_userdata(['loggedIn', 'fullName']);
        return redirect('/');
    }

    public function dosen()
    {
        if (!$this->session->loggedIn) {
            return redirect('/');
        }

        $data['title'] = "Halaman Dosen";
        $data['dosen'] = $this->dosen->getAllDosen();

        $this->load->view('templates/header', $data);
        $this->load->view('home/dosen_view', $data);
        $this->load->view('templates/footer');
    }

    public function deleteDosen($id)
    {
        if (!$this->session->loggedIn) {
            return redirect('/');
        }

        $this->dosen->deleteDosenById($id);
        return redirect('/');
    }

    public function mahasiswa()
    {
        if (!$this->session->loggedIn) {
            return redirect('/');
        }

        $data['title'] = "Halaman Mahasiswa";

        $mahasiswa = $this->mahasiswa->getAllMahasiswa();

        foreach ($mahasiswa as $idx => $mhs) {
            $data['mahasiswa'][$idx]['id_mahasiswa'] = $mhs['id_mahasiswa'];
            $data['mahasiswa'][$idx]['fullName'] = $mhs['fname_mahasiswa'] . " " . $mhs['lname_mahasiswa'];
            $data['mahasiswa'][$idx]['nim'] = $mhs['nomorinduk_mahasiswa'];
            $data['mahasiswa'][$idx]['email'] = $mhs['email_mahasiswa'];
            $data['mahasiswa'][$idx]['nilai_tugas'] = $mhs['tugas_mahasiswa'];
            $data['mahasiswa'][$idx]['nilai_uts'] = $mhs['uts_mahasiswa'];
            $data['mahasiswa'][$idx]['nilai_uas'] = $mhs['uas_mahasiswa'];

            $nilaiAkhir = (0.3 * $mhs['tugas_mahasiswa']) + (0.3 * $mhs['uts_mahasiswa']) + (0.4 * $mhs['uas_mahasiswa']);
            $grade = "Nilai tidak valid!";

            if ($nilaiAkhir >= 80 && $nilaiAkhir <= 100) {
                $grade = "A";
            } else if ($nilaiAkhir >= 60 && $nilaiAkhir <= 79) {
                $grade = "B";
            } else if ($nilaiAkhir >= 40 && $nilaiAkhir <= 59) {
                $grade = "C";
            } else if ($nilaiAkhir >= 0 && $nilaiAkhir <= 39) {
                $grade = "D";
            }

            $data['mahasiswa'][$idx]['grade'] = $grade;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('home/mahasiswa_view', $data);
        $this->load->view('templates/footer');
    }

    public function deleteMahasiswa($id)
    {
        if (!$this->session->loggedIn) {
            return redirect('/');
        }

        $this->mahasiswa->deleteMahasiswaById($id);
        return redirect('mahasiswa');
    }
}
