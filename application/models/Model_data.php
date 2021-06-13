<?php

class Model_data extends CI_Model
{

	function data_produk($where)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('barang', 'barang.kode_barang=produk.kode_barang');
		$this->db->where($where);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

	function data_produk_all()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('barang', 'barang.kode_barang=produk.kode_barang');
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

	function data_barang($where)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where($where);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

	function data_penjualan($where)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('barang', 'barang.kode_barang=produk.kode_barang');
		$this->db->join('penjualan', 'penjualan.id_produk=produk.id_produk');
		$this->db->where($where);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

	function data_penjualan_all()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('barang', 'barang.kode_barang=produk.kode_barang');
		$this->db->join('penjualan', 'penjualan.id_produk=produk.id_produk');
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

	function insert($data, $table)
	{
		return $this->db->insert($table, $data);
	}

	//menjumlahkan penjualan 
	function jumlahPenjualan()
	{
		$sql = "SELECT sum(jumlah_penjualan) as total FROM penjualan";
		$result = $this->db->query($sql);
		return $result->result_array()[0]['total'];
	}

	function jumlahPenjualan_byId($id_produk)
	{
		$sql = "SELECT sum(jumlah_penjualan) as total FROM penjualan WHERE id_produk = " .$id_produk;
		$result = $this->db->query($sql);
		return $result->result_array()[0]['total'];
	}

	function jumlahPenjualan_row($id_produk)
	{
		$sql = "SELECT * FROM penjualan WHERE id_produk = " .$id_produk;
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function getLastPenjualan($id_produk)
	{
		$sql = "SELECT bulan_penjualan , tahun_penjualan FROM penjualan WHERE id_produk = " .$id_produk . " ORDER BY id_penjualan DESC LIMIT 1";
		$result = $this->db->query($sql);
		return $result->result_array()[0];
	}

	function mencariperiode($id_produk = FALSE)
	{
		if($id_produk == FALSE){
			$sql = "SELECT * FROM penjualan";
		} else {
			$sql = "SELECT * FROM penjualan WHERE id_produk = " .$id_produk;
		}		
		$query = $this->db->query($sql);
		$totalrow = $query->num_rows();

		$bagianatas = floor($totalrow / 2);
		$last = 0;
		for ($i = 1; $i <= $totalrow; $i++) {
			//ganjil
			if ($totalrow % 2 != 0) {
				//set nilai 0
				if ($i == ($bagianatas + 1)) {
					$ambil_data[$i] = 0;
				} else {
					$periode = ($i - 1) - $bagianatas;
					$ambil_data[$i] = $periode;
				}
			}

			//genap
			else {
				//jika i = 1
				if ($i == 1) {
					$periode = 1 - $totalrow;
					$last = $periode;
					$ambil_data[$i] = $periode;
				}
				//jika i != 1
				else {
					$periode = $last + 2;
					$last = $periode;
					$ambil_data[$i] = $periode;
				}
			}
		}


		// print_r($ambil_data);
		// exit;
		return $ambil_data;
	}
	function jumlahxy()
	{
		$sql = "SELECT * FROM penjualan";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function jumlahx2()
	{
		$sql = "SELECT * FROM penjualan";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	function tampil_data($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

	function tampil_data_kondisi($table, $where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

	function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function edit_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function cek($where, $table)
	{
		$query = $this->db->get_where($table, $where);
		return $query->row_array();
	}
	function ambil_user($where, $table)
	{
		$query = $this->db->get_where($table, $where);
		return $query->result_array();
	}


	function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	function insert_multiple_produk($data)
	{
		$this->db->insert_batch('produk', $data);
	}

	function insert_multiple_kode_barang($data)
	{
		$data_kode_barang = array();
		foreach ($data as $row) {
			$where = array(
				'kode_barang' =>  $row
			);

			$cek = $this->tampil_data_kondisi('barang', $where);
			if ($cek == null) {
				array_push($data_kode_barang, array(
					'kode_barang' => $row, // Insert data nama dari kolom B di excel
				));
			}
		}
		if ($data_kode_barang != null) {
			$this->db->insert_batch('barang', $data_kode_barang);
		}
	}

	function data_prediksi($id_produk, $prediksi_tahun, $prediksi_bulan)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('barang', 'barang.kode_barang=produk.kode_barang');
		$this->db->join('penjualan', 'penjualan.id_produk=produk.id_produk');
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

	function convert_month($month){				
		if($month == 'Januari')
			return $month = "January";
		else if($month == "Februari")
			return $month = "February";		
		else if($month == "Maret")
			return $month = "March";		
		else if($month == "Mei")
			return $month = "May";
		else if($month == "Juni")
			return $month = "June";
		else if($month == "Juli")
			return $month = "July";						
		else if($month == "Agustus")
			return $month = "August";	
		else if($month == "Oktober")
			return $month = "October";
		else if($month == 'Desember')
			return $month = "December";						
		else 
			return $month;
	}
}
