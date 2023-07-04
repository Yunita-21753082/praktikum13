<?php

namespace App\Controllers;

use App\Controllers\BaseController;

//1
use App\Models\GenreModel;

class Genre extends BaseController
{
    //2
    protected $Genre;                                                                                        
    //3 fungsi constract
    public function __construct()
    {
        //4 melakukan inisiasi di class Genre
        $this->Genre = new GenreModel();
    }

    public function index()
    {
        //5
        $data['data_Genre'] = $this->Genre->getGenre();
        return view("Genre/index", $data);
    }

    public function all(){
        $data['SemuaGenre'] = $this->Genre->getAllData();
        return view("Genre/SemuaGenre", $data);
    }

    public function Genre_by_id(){
        dd($this->Genre->getDataByID(1));
    }

    public function Genre_by_nama_Genre(){
        dd($this->Genre->getDataBy("Horor"));
    }

    public function Genre_order(){
        dd($this->Genre->getOrderBy());
    }

    public function Genre_limit_five(){
        dd($this->Genre->getlimit());
    }



}