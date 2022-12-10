<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function login()
    {
        $data = [
            'title' => 'Login | Inventaris',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login', $data );
    }

    public function postlogin()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $credentials = ['username' => $username];

        $user = $this->model->where($credentials)->first();

        if (!$user) {
            session()->setFlashdata('error', 'Username or password is incorrect!');
            return redirect()->back();
        }

        $passwordCheck = password_verify($password, $user['password']);

        if (!$passwordCheck) {
            session()->setFlashdata('error', 'Password is wrong!');
            return redirect()->back();
        }

        $userData = [
            'id_user' => $user['id_user'],
            'nama' => $user['nama'],
            'username' => $user['username'],
            'level' => $user['level'],
            'logged_in' => TRUE
        ];

        session()->set($userData);
        return redirect()->to(base_url('/'));
    }

    public function register()
    {
        $data = [
            'title' => 'Register | Inventaris',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/register', $data );
    }

    public function postregister()
    {
        if (!$this->validate([
            'nama' => 'required|max_length[30]',
            'username' => 'required|max_length[40]|is_unique[user.username]',
            'password' => 'required|min_length[5]',
            'confirmpassword' => 'required|matches[password]'
        ])) {
            return redirect()->to('/register')->withInput();
        }

        // GET NEW ID USER 
        $db = \Config\Database::connect();
        $query = $db->query("SELECT newkodeuser() AS id_user");
        $data =  $query->getResultArray();
        $id_user = $data[0]['id_user'];

        $user = [
            'id_user' => $id_user,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'level' => 'U01'
        ];

        $this->model->insert($user);

        session()->setFlashdata('success', 'Register Successfully!');
        return redirect()->to(base_url('login'));

        // if ($save) {
        //     session()->setFlashdata('success', 'Register Successfully!');
        //     return redirect()->to(base_url('login'));
        // }else{
        //     session()->setFlashdata('error', $this->model->errors());
        //     dd(session()->getFlashdata('error'));
        //     // return redirect()->back();
        // }
    }

    public function logout()
    {
        $userData = [
            'id_user',
            'nama',
            'username',
            'level',
            'logged_in'
        ];

        session()->remove($userData);
        session()->destroy();
        return redirect()->to('/login');
    }
}