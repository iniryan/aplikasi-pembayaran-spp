<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    //cek login
    public function getUsername($username)
    {
        return $this->db->get_where('petugas', ['username' => $username])->row_array();
    }
    
    //cek login siswa
    public function getNisn($nisn)
    {
        return $this->db->get_where('siswa', ['nisn' => $nisn])->row_array();
    }
    
    //datauser / session
    public function datauser()
    {
        return $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
    }

    //ambil data petugas
    public function getDataPetugas($id)
    {
        return $this->db->get_where('petugas', ['id_petugas' => $id])->row_array();
    }
    
    //ambil data petugas
    public function getPetugas()
    {
        return $this->db->get_where('petugas', ['dihapus' => 0])->result_array();
    }    
    
    //count data petugas
    public function countPetugas()
    {
        return $this->db->get_where('petugas', ['dihapus' => 0])->num_rows();
    }
    
    //tambah petugas
    public function tambah_petugas()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'level' => 'Petugas',
            'status' => 1,
        ];
        $this->db->insert('petugas', $data);
    }
    
    //ubah petugas
    public function ubah_petugas($data, $where)
    {
        return $this->db->where($where)->set($data)->update('petugas');
    }
    
    //delete petugas
    public function delete_petugas($id)
    {
        $data = [
            'dihapus' => 1
        ];
        return $this->db->where('id_petugas', $id)->update('petugas', $data);
    }
    
    //blokir petugas
    public function block_petugas($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->set('status', '0');
        $this->db->update('petugas');
    }
    
    //aktifkan petugas
    public function active_petugas($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->set('status', '1');
        $this->db->update('petugas');
    }

    //ambil data kelas
    public function getDataKelas($id)
    {
        return $this->db->get_where('kelas', ['id_kelas' => $id])->row_array();
    }

    //ambil data kelas
    public function getAllKelas()
    {
        return $this->db->get_where('kelas', ['dihapus' => 0])->result_array();
    }

    //count data kelas
    public function countKelas()
    {
        return $this->db->get_where('kelas', ['dihapus' => 0])->num_rows();
    }

    //tambah kelas
    public function tambah_kelas()
    {
        $data = [
            'kompetensi_keahlian' => htmlspecialchars($this->input->post('kompetensi_keahlian', true)),
            'nama_kelas' => htmlspecialchars($this->input->post('nama_kelas', true)),
        ];
        $this->db->insert('kelas', $data);
    }

    //ubah kelas
    public function ubah_kelas($data, $where)
    {
        return $this->db->where($where)->set($data)->update('kelas');
    }

    //delete kelas
    public function delete_kelas($id)
    {
        $data = [
            'dihapus' => 1
        ];
        return $this->db->where('id_kelas', $id)->update('kelas', $data);
    }

    //ambil data spp
    public function getDataSpp($id)
    {
        return $this->db->get_where('spp', ['id_spp' => $id])->row_array();
    }

    //ambil data spp
    public function getAllSpp()
    {
        return $this->db->get_where('spp', ['dihapus' => 0])->result_array();
    }

    //count data spp
    public function countSpp()
    {
        return $this->db->get_where('spp', ['dihapus' => 0])->num_rows();
    }

    //tambah spp
    public function tambah_spp()
    {
        $data = [
            'tahun' => $this->input->post('tahun', true),
            'nominal' => $this->input->post('nominal', true),
        ];
        $this->db->insert('spp', $data);
    }

    //ubah spp
    public function ubah_spp($data, $where)
    {
        return $this->db->where($where)->set($data)->update('spp');
    }

    //delete spp
    public function delete_spp($id)
    {
        $data = [
            'dihapus' => 1
        ];
        return $this->db->where('id_spp', $id)->update('spp', $data);
    }

    //ambil data siswa
    public function getAllSiswa($nisn)
    {
        $this->db->select('*');
        $this->db->from('siswa a');
        $this->db->join('kelas b', 'a.id_kelas = b.id_kelas', 'left');
        $this->db->join('spp c', 'a.id_spp = c.id_spp', 'left');
        $this->db->where('nisn', $nisn);
        return $this->db->get()->row_array();
    }

    //ambil data Siswa
    public function getSiswa()
    {
        $this->db->select('*');
        $this->db->from('siswa a');
        $this->db->join('kelas b', 'a.id_kelas = b.id_kelas', 'left');
        $this->db->join('spp c', 'a.id_spp = c.id_spp', 'left');
        $this->db->where('a.dihapus', 0);
        return $this->db->get()->result_array();
    }

    //count data Siswa
    public function countSiswa()
    {
        return $this->db->get_where('siswa', ['dihapus' => 0])->num_rows();
    }

    //tambah siswa
    public function tambah_siswa()
    {
        $data = [
            'nisn' => $this->input->post('nisn', true),
            'nis' => $this->input->post('nis', true),
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
            'no_telepon' => $this->input->post('no_telepon', true),
            'id_kelas' => $this->input->post('id_kelas', true),
            'id_spp' => $this->input->post('id_spp', true),
            'alamat' => htmlspecialchars($this->input->post('alamat', true))
        ];

        $this->db->insert('siswa', $data);
    }

    //ubah siswa
    public function ubah_siswa($data, $where)
    {
        return $this->db->where($where)->set($data)->update('siswa');
    }

    //delete siswa
    public function delete_siswa($nisn)
    {
        $data = [
            'dihapus' => 1
        ];
        return $this->db->where('nisn', $nisn)->update('siswa', $data);
    }
    
    //histori pemnbayaran siswa
    public function getHistori($nisn)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('petugas b', 'a.id_petugas = b.id_petugas', 'left');
        $this->db->where('nisn', $nisn);
        $this->db->order_by('id_pembayaran DESC');
        return $this->db->get()->result_array();
    }

    //count data transaksi
    public function countTransaksi()
    {
        return $this->db->get('pembayaran')->num_rows();
    }

    //tambah transaksi
    public function validasi($nisn, $bulan, $tahun)
    {
        $query = "SELECT *
                    FROM `pembayaran` WHERE `nisn` = $nisn
                      AND `bulan_dibayar` = '$bulan' AND `tahun_dibayar` = $tahun";

        return $this->db->query($query)->row_array();
    }

    public function proses_pembayaran($id)
    {
        $data = [
            'nisn' => $this->input->post('nisn', true),
            'id_petugas' => $id,
            'tahun_dibayar' => $this->input->post('tahun', true),
            'bulan_dibayar' => $this->input->post('bulan_dibayar', true),
            'jumlah_bayar' => $this->input->post('nominal', true),
            'id_spp' => $this->input->post('id_spp', true),
        ];

        $this->db->insert('pembayaran', $data);
    }

    public function batal_bayar($id)
    {
        return $this->db->delete('pembayaran', ['id_pembayaran' => $id]);
    }
    
    public function cetakNota($id)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('petugas b', 'a.id_petugas = b.id_petugas', 'left');
        $this->db->join('siswa c', 'a.nisn = c.nisn', 'left');
        $this->db->join('kelas d', 'c.id_kelas = d.id_kelas', 'left');
        $this->db->where('id_pembayaran', $id);
        return $this->db->get()->row_array();
    }
    
    //ambil semua laporan
    public function getAllLaporan()
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('petugas b', 'a.id_petugas = b.id_petugas', 'left');
        $this->db->join('siswa c', 'a.nisn = c.nisn', 'left');
        $this->db->order_by('id_pembayaran DESC');
        return $this->db->get()->result_array();
    }   
    
    public function lastTransaksi()
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('petugas b', 'a.id_petugas = b.id_petugas', 'left');
        $this->db->join('siswa c', 'a.nisn = c.nisn', 'left');
        $this->db->order_by('id_pembayaran DESC');
        $this->db->limit(3);
        return $this->db->get()->result_array();
    }   

    public function getFilterLaporan($limit = null, $start = null, $count = true, $where1, $where2)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('petugas b', 'a.id_petugas = b.id_petugas', 'left');
        $this->db->join('siswa c', 'a.nisn = c.nisn', 'left');
        if($where1 != null && $where2 != null){
            $this->db->where($where1);
            $this->db->where($where2);  
        }
        $this->db->order_by('id_pembayaran DESC');
        
        if ($count) {
            return $this->db->count_all_results();
        } else {
            $this->db->limit($limit, $start);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }
        return array();
    }
    
    public function getLaporan($where1, $where2)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('petugas b', 'a.id_petugas = b.id_petugas', 'left');
        $this->db->join('siswa c', 'a.nisn = c.nisn', 'left');
        if($where1 != null && $where2 != null){
            $this->db->where($where1);
            $this->db->where($where2);
        }
        $this->db->order_by('id_pembayaran DESC');
        return $this->db->get();
    }
    
    public function getLaporanTotal($where1, $where2)
    {
        $this->db->select('SUM(jumlah_bayar) as a');
        $this->db->from('pembayaran');
        if($where1 != null && $where2 != null){
            $this->db->where($where1);
            $this->db->where($where2);
        }
        return $this->db->get();
    }

}
?>