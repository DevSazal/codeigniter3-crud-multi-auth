<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    public function encryptHash($password) {
      if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
          $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
          return crypt($password, $salt);
      }
    }

    public function encrypt_verify($password, $hashedPassword) {
      return crypt($password, $hashedPassword) == $hashedPassword;
    }

    public function get_all() {
        return $this->db->get($this->table)
                        ->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, array('id' => $id))
                        ->row();
    }

    public function insert($request,$role, $role_type) {
      $data = array(
                  'name' => ucfirst($request->name),
                  'email' => $request->email,
                  'password' => $this->encryptHash($request->password),
                  'role' => $role,
                  'role_type' => $role_type,
                  'profile_photo_path' => NULL,
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
            );
        return $this->db->insert($this->table, $data);
    }

}
