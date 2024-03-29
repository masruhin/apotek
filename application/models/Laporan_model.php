<?php
class Laporan_model extends CI_Model{   
     
    function getrowspo($params = array()){ 
        $this->db->select("a.nomor_po, a.tgl_po, a.termin,
         a.pembayaran, a.supplier, a.total, a.keterangan, b.nama_supplier");
        $this->db->from("purchase_order a");
        $this->db->join('master_supplier b', 'b.id = a.supplier');   
        if(!empty($params['search']['supplier'])){
            $this->db->where('a.supplier',$params['search']['supplier']);
        } 
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('a.tgl_po BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('a.tgl_po','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    }
    
    function getrowspembelian($params = array()){ 
        $this->db->select("a.nomor_faktur, a.tgl_pembelian, a.termin,
         a.pembayaran, a.supplier, a.total, a.keterangan, b.nama_supplier");
        $this->db->from("pembelian_langsung a");
        $this->db->join('master_supplier b', 'b.id = a.supplier');   
        if(!empty($params['search']['supplier'])){
            $this->db->where('a.supplier',$params['search']['supplier']);
        } 
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('a.tgl_pembelian BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('a.tgl_pembelian','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    } 
    function getrowspenerima($params = array()){ 
        $this->db->select("*");
        $this->db->from("penerimaan_barang"); 
        if(!empty($params['search']['penerima'])){
            $this->db->where('penerima',$params['search']['penerima']);
        } 
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('tanggal_penerimaan BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('tanggal_penerimaan','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    }

     
    function getrowsstok($params = array()){ 
        $this->db->select("a.kode_item, a.tanggal, a.jumlah_masuk, a.jenis_transaksi,
         a.jumlah_keluar, a.satuan_kecil, a.tgl_expired, b.nama_item");
        $this->db->from("kartu_stok a");
        $this->db->join('master_item b', 'b.kode_item = a.kode_item');    
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('a.tanggal BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('a.tanggal','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    }
    
    function getrowspenjualan($params = array()){ 
        $this->db->select("item.nama_item, beli.harga as harga_beli, item.harga_jual, SUM(detail.kuantiti) as qty, SUM(beli.kuantiti) as stok_awal, jual.tanggal");
        $this->db->from("penjualan jual");
        $this->db->join("penjualan_detail detail", "detail.id_penjualan = jual.id");
        $this->db->join("master_item item", "item.kode_item = detail.kode_item");
        $this->db->join("pembelian_langsung_detail beli", "item.kode_item = beli.kode_item");
        $this->db->join('master_admin admin', 'admin.id = jual.id_admin');   
        if(!empty($params['search']['kasir'])){
            $this->db->where('admin.id_admin',$params['search']['kasir']);
        } 
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('jual.tanggal BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('jual.tanggal_jam','ASC'); 
        $this->db->group_by('jual.tanggal, beli.kode_item'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    } 


    function getrowskeuangan($params = array()){ 
        $this->db->select("a.kode_rekening, a.tanggal, a.masuk, a.keluar,
         a.keterangan, b.nama_rekening ");
        $this->db->from("cash_in_out a");
        $this->db->join('rekening_kode b', 'b.kode_rekening = a.kode_rekening');    
        if(!empty($params['search']['firstdate']) AND !empty($params['search']['lastdate'])){
            $this->db->where('a.tanggal BETWEEN "'.$params['search']['firstdate']. '" and "'. $params['search']['lastdate'].'"');
        }
        $this->db->order_by('a.tanggal','ASC'); 
        if(empty($params['kategori']['excel']) OR $params['kategori']['excel'] != 'excel'){
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            } 
        }

        $query = $this->db->get(); 
        return $query->result_array();
    }

}