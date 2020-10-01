<?php
class Login_model extends CI_Model{
    //cek nip dan sandi guru
    function auth_guru($username,$password){
        $query=$this->db->query("SELECT * FROM guru WHERE nip='$username' AND sandi=MD5('$password') LIMIT 1");
        return $query;
    }
 
    //cek nis dan sandi siswa
    function auth_siswa($username,$password){
        $query=$this->db->query("SELECT * FROM siswa WHERE nis='$username' AND sandi=MD5('$password') LIMIT 1");
        return $query;
    }
 
}