<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Movie extends CI_Controller
{
    private $ratingCodes = ['PG-13', 'PG', 'G', 'R', 'NC-17'];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
    }

    public function newIndex()
    {
        return redirect('movie');
    }

    public function index()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tblmovie');
        $crud->set_subject('Movie');


        $crud->columns('Title', 'Year', 'Director', 'PosterLink', 'RatingCode');
        $crud->display_as('RatingCode', 'Rating');
        $crud->display_as('PosterLink', 'Poster');

        $crud->fields('Title', 'Year', 'Director', 'PosterLink', 'Deskripsi', 'RatingCode');
        $crud->set_field_upload('PosterLink', 'assets/uploads/poster');

        $crud->callback_edit_field('Deskripsi', [$this, 'edit_description']);
        $crud->callback_add_field('Deskripsi', [$this, 'add_description']);
        $crud->callback_add_field('RatingCode', [$this, 'add_rating']);
        $crud->callback_edit_field('RatingCode', [$this, 'edit_rating']);

        $crud->required_fields('Title');
        $crud->required_fields('Year');
        $crud->required_fields('Director');
        $crud->required_fields('PosterLink');

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);

        $data['style'] = $this->load->view('include/style', $data, TRUE);
        $data['script'] = $this->load->view('include/script', $data, TRUE);
        $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer', NULL, TRUE);

        $this->load->view('pages/movies', $data);
    }

    function edit_description($value, $primary_key) {
        return "<textarea name='Deskripsi'>$value</textarea>";
    }

    function add_description() {
        return "<textarea name='Deskripsi'></textarea>";
    }

    function edit_rating($value, $primary_key) {
        $html = "<select name='RatingCode'>";

        foreach ($this->ratingCodes as $code) {
            if ($code === $value) {
                $html .= "<option value='" . $code . "' selected>" . $code . "</option>";
            } else {
                $html .= "<option value='" . $code . "'>" . $code . "</option>";
            }
        }

        $html .= "</select>";

        return $html;
    }

    function add_rating() {
        $html = "<select name='RatingCode'>";

        foreach ($this->ratingCodes as $code) {
            $html .= "<option value='" . $code . "'>" . $code . "</option>";
        }

        $html .= "</select>";

        return $html;
    }
}
