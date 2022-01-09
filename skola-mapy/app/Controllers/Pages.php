<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Main_Model;
use App\Models\Obor;
use App\Models\Pocet_prijatych;
use App\Models\Skola;


class Pages extends BaseController
{
    public function __construct(){
        $this->ionAuth = new \IonAuth\Libraries\IonAuth();
    }
    public function index($page = 'index')
    {
        $model = new Main_Model();
        $data['get_data'] = $model->load_data();
        $data['title'] = 'Databáze škol';
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php')) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }

    public function create($page = 'school_add')
    {
        $data['title'] = 'Přidej školu';
        $skola = new Skola();
        $data['select_mesto'] = $skola->select_mesto();
        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }

    public function school_add()
    {
        if (! $this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}
		else if (! $this->ionAuth->isAdmin())
		{
			throw new \Exception('You must be an administrator to view this page.');
        }
        $skola = new Skola();
        $data = [
            'nazev' => $this->request->getPost('nazev'),
            'mesto' => $this->request->getPost('mesto'),
            'geo_lat' => $this->request->getPost('geo_lat'),
            'geo_long' => $this->request->getPost('geo_long'),
        ];
        $skola->save($data);
        return redirect()->to(base_url('pages'))->with('status','Úspěšně přidáno');
    }

    public function pocet_prijatych($page = 'admitted_add')
    {
        $data['title'] = 'Přijatí studenti';
        $pocet_prijatych = new pocet_prijatych();
        $data['select_skola'] = $pocet_prijatych->select_skola();
        $data['select_obor'] = $pocet_prijatych->select_obor();
        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }
    public function admitted_add(){
        if (! $this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}
		else if (! $this->ionAuth->isAdmin())
		{
			throw new \Exception('You must be an administrator to view this page.');
        }
        $pocet_prijatych = new Pocet_prijatych();
        $data = [
            'skola' => $this->request->getPost('skola'),
            'obor' => $this->request->getPost('obor'),
            'pocet' => $this->request->getPost('pocet'),
            'rok' => $this->request->getPost('rok'),
        ];
        $pocet_prijatych->save($data);
        return redirect()->to(base_url('pages'))->with('status','Úspěšně přidáno');
    }
    public function map($page = 'maps')
    {
        $model = new Main_Model();
        $data['get_data'] = $model->load_data();
        //$data['title'] = ucfirst($page);
        $data['title'] = 'Mapy';
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php')) {
        // Whoops, we don't have a page for that!
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page); 
    }
        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }
        public function school_edit($id){
            $skola = new Skola();
            $data['select_mesto'] = $skola->select_mesto();
            $data['row'] = $skola->find($id);            
            echo view('templates/header', $data);
            echo view('pages/school_edit', $data);
            echo view('templates/footer', $data);
            
        }
        public function school_update($id){
            if (! $this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}
		else if (! $this->ionAuth->isAdmin())
		{
			throw new \Exception('You must be an administrator to view this page.');
        }
            $skola = new Skola();
            $data = [
            'nazev' => $this->request->getPost('nazev'),
            'mesto' => $this->request->getPost('mesto'),
            'geo_lat' => $this->request->getPost('geo_lat'),
            'geo_long' => $this->request->getPost('geo_long'),
        ];
        $skola->update($id, $data);
        return redirect()->to(base_url('pages'))->with('status','Úspěšně upraveno');
        }
        public function admitted_delete($id){
            if (! $this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}
		else if (! $this->ionAuth->isAdmin())
		{
			throw new \Exception('You must be an administrator to view this page.');
        }
            $prijatych = new Pocet_prijatych();
            $prijatych->delete($id);
            return redirect()->to(base_url('pages'))->with('status','Úspěšně smazáno');
        }
    }