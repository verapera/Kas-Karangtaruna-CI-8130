<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi_model extends CI_model { 
	public function pemasukan_hari_ini(){
        $tanggal = date('Y-m-d');
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','Pemasukan');
        $pemasukan_hari_ini = $this->db->where("DATE_FORMAT(tanggal,'%Y-%m-%d')",$tanggal);
        
            return $this->db->get()->row()->total;
        
        // tampilkan jumlah nominal(total) dari table transaksi, tampilkan bedasarkan transaksi pemasukan yang sesuai pada tanggal hari ini
    }
	public function pemasukan_bulan_ini(){
        $tanggal = date('Y-m');
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','Pemasukan');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
        return $this->db->get()->row()->total;
        // tampilkan jumlah nominal(total) dari table transaksi, tampilkan bedasarkan transaksi pemasukan yang sesuai pada tanggal bulan ini
    }
	public function pemasukan(){
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','Pemasukan');
        return $this->db->get()->row()->total;
        // tampilkan jumlah nominal(total) dari table transaksi
    }
	public function pengeluaran_hari_ini(){
        $tanggal = date('Y-m-d');
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','Pengeluaran');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m-%d')",$tanggal);
        return $this->db->get()->row()->total;
        // tampilkan jumlah nominal(total) dari table transaksi, tampilkan bedasarkan transaksi pengeluaran yang sesuai pada tanggal hari ini
    }
	public function pengeluaran_bulan_ini(){
        $tanggal = date('Y-m');
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','Pengeluaran');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
        return $this->db->get()->row()->total;
        // tampilkan jumlah nominal(total) dari table transaksi, tampilkan bedasarkan transaksi pengeluaran yang sesuai pada bulan ini
    }
	public function pengeluaran(){
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','Pengeluaran');
        return $this->db->get()->row()->total;
        // tampilkan jumlah nominal(total) dari table transaksi
    }
    public function saldo_awal($tanggal){
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','Pemasukan');
        $this->db->where("tanggal <",$tanggal);
        $pemasukan =  $this->db->get()->row()->total;

        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi','Pengeluaran');
        $this->db->where("tanggal <",$tanggal);
        $pengeluaran =  $this->db->get()->row()->total;
        $saldo = intval($pemasukan)-intval($pengeluaran);
        return $saldo;
        // tampilkan jumlah nominal(total) dari table transaksi
    }
}


