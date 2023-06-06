<?php
class Quran_model extends CI_MODEL {

	public function get_data(){
		return $this->db->get('surah')->result_array();
	}

	public function getAyat($id){
		$result = $this->db->where('id_surah', $id)->get('surah');

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function searchKeywords($keywords) {
    if (!empty($keywords)) {
        $this->db->group_start();
        $this->db->like('surah', $keywords);
        $this->db->or_like('arti_surah', $keywords);
        $this->db->or_like('jumlah_ayat', $keywords);
        $this->db->or_like('jenis_surah', $keywords);
        $this->db->group_end();
    }

    return $this->db->get('surah')->result_array();
}

    public function get_Tafsir($no) {

    $this->db->where('id_quran', $no);
    $query = $this->db->get('tafsir');
    $result = $query->row();
   
    if ($result) {
        $tafsir = $result->tafsiran;
        return $tafsir;
    } else {
        return false;
    }
}
public function get_surah_ids() {
    $this->db->select('id_surah');
    $query = $this->db->get('surah');

    $result = array();
    foreach ($query->result() as $row) {
        $result[] = $row->id_surah;
    }

    return $result;
}

}

?>