<?php
class Super_Admin extends CI_Model {
public function get_data_with_join() {
    $this->db->select('materi_islam.*, surah.surah, surah.id_surah, kategory.*');
    $this->db->from('materi_islam');
    $this->db->join('surah', 'surah.id_surah = materi_islam.id_surah');
    $this->db->join('kategory', 'kategory.id_kategory = materi_islam.id_category');
    $query = $this->db->get();
    return $query->result_array();
}

  public function get_data_by_id($id) {
    $this->db->where('id_materi', $id);
    $query = $this->db->get('materi_islam');
    return $query->row_array();
}
  public function update_data($id, $data) {
    // Fungsi ini digunakan untuk mengupdate data yang sudah ada di database
    $this->db->where('id_materi', $id);
    $this->db->update('materi_islam', $data);
    
  }
  public function delate_data($table, $id) {
      if ($table === 'materi_islam') {
          $this->db->where('id_materi', $id);
          $this->db->delete('materi_islam');
      }
      if ($table === 'admin') {
          $this->db->where('id', $id);
          $this->db->delete('admin');
      }
  }

  public function createData($table, $data) {
      return $this->db->insert($table, $data);
  }

  public function getSurahNames() {
        $this->db->select('id_surah, surah');
        $query = $this->db->get('surah');
        return $query->result_array();
    }
      public function getkategori() {
        $this->db->select('id_kategory, name_category');
        $query = $this->db->get('kategory');
        return $query->result_array();
    }
  public function getdata($table){
      return $this->db->get($table)->result_array();
  }
  public function get_data_byuser($user) {
      $this->db->select('materi_islam.*, surah.surah, surah.id_surah');
      $this->db->from('materi_islam');
      $this->db->join('surah', 'surah.id_surah = materi_islam.id_surah');
    $this->db->where('materi_islam.by', $user);
    	$query = $this->db->get();

    return $query->result_array();
}
public function categoryDelete($id) {
	$this->db->where('id_kategory', $id);
	$this->db->delete('kategory');
}

}

?>
