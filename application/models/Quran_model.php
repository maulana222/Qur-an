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
    if ($keywords) {
        $this->db->like('surah', $keywords);
        $this->db->or_like('arti_surah', $keywords);
        $this->db->or_like('jumlah_ayat', $keywords);
        $this->db->or_like('jenis_surah', $keywords);
    }

    return $this->db->get('surah')->result_array();
}


}

?>