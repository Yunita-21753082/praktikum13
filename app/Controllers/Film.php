<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilmModel;

class Film extends BaseController
{
    protected $film;

    public function __construct()
    {
        $this->film = new FilmModel();
    }

    public function index()
    {
        $data['data_film'] = $this->film->getAllDatajoin();
        return view("film/index", $data);  
    }

    public function all()
    {
        $data['semuafilm'] = $this->film->getAllData();
        return view("film/semuafilm", $data);
    }

    public function detail($id)
    {
        $film = $this->film->getDataByID($id);

        if (!$film) {
            return redirect()->to('/semuafilm')->with('error', 'Film tidak ditemukan.');
        }

        $data['film'] = $film;
        return view("film/detail_film", $data);
    }

    public function add()
    {
        return view("film/add");
    }

}
