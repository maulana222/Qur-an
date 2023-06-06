<?php
class Admin_model extends CI_Model {
  
    public function get_data_with_join() {
      $this->db->select('materi_quran.*, surah.surah, surah.id_surah');
      $this->db->from('materi_quran');
      $this->db->join('surah', 'surah.id_surah = materi_quran.id_surah');
      $query = $this->db->get();
      return $query->result_array();
      
  }
  public function get_data_by_id($id) {
    $this->db->where('id_materi', $id);
    $query = $this->db->get('materi_quran');
    return $query->row_array();
}
 
  public function update_data($id, $data) {
    // Fungsi ini digunakan untuk mengupdate data yang sudah ada di database
    $this->db->where('id_materi', $id);
    $this->db->update('materi_quran', $data);
    
  }
  
  public function delete_data($id) {
    $this->db->where('id_materi', $id);
    $this->db->delete('materi_quran');
  }
  
  public function createData($data)  {
        return $this->db->insert('materi_quran', $data);
    }

  public function getSurahNames() {
        $this->db->select('id_surah, surah');
        $query = $this->db->get('surah');
        return $query->result_array();
    }
     // Fungsi untuk mendapatkan ID surah berdasarkan nama surah

    }

?>
