<?php
    function date_indo($tanggal){
        $bulan = [ 1 => 'Januari', 'Februari', 'Maret',
        'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
        'Oktober', 'November', 'Desember'];
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2].' '.$bulan[(int)$pecahkan[1]].' '.$pecahkan[0];
    }

?>