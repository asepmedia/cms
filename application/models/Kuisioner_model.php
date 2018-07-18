<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kuisioner_model extends CI_Model
{

    public $table = 'kuisioner';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,nama,umur,jenis_kelamin,nama_surveyor,nip_surveyor,pendidikan,pekerjaan,kuis1,kuis2,kuis3,kuis4,kuis5,updated_at,created_at');
        $this->datatables->from('kuisioner');
        //add this line for join
        //$this->datatables->join('table2', 'kuisioner.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('kuisioner/read/$1'),'Read')." | ".anchor(site_url('kuisioner/update/$1'),'Update')." | ".anchor(site_url('kuisioner/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('umur', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('nama_surveyor', $q);
	$this->db->or_like('nip_surveyor', $q);
	$this->db->or_like('pendidikan', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('kuis1', $q);
	$this->db->or_like('kuis2', $q);
	$this->db->or_like('kuis3', $q);
	$this->db->or_like('kuis4', $q);
	$this->db->or_like('kuis5', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->or_like('created_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('umur', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('nama_surveyor', $q);
	$this->db->or_like('nip_surveyor', $q);
	$this->db->or_like('pendidikan', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('kuis1', $q);
	$this->db->or_like('kuis2', $q);
	$this->db->or_like('kuis3', $q);
	$this->db->or_like('kuis4', $q);
	$this->db->or_like('kuis5', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->or_like('created_at', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}