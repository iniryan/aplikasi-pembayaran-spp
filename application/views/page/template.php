<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title><?= $title; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>style.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>daterangepicker/daterangepicker.css">
</head>

<body>
<input type="checkbox" name ="" id="sidebar-toggle">
<div class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-flex">
            <span class="fas fa-user-graduate"></span>
            <div class="brand-text mx-3"> <?= $title; ?></div>
        </div>
        <hr class="brand-divider">
    </div>
    
    <div class="sidebar-main">
        <div class="sidebar-user">
            <div>
                <h3><?= ucfirst($this->session->userdata('nama_petugas')); ?></h3>
                <span><?= $this->session->userdata('level'); ?></span>
            </div>
        </div>
        
        <?php $menu = $this->uri->segment(1); ?>

        <div class="sidebar-menu">
                <div class="menu-head">
                    <span>Dashboard</span>
                </div>
                <ul class="nav-pills flex-column">
                    <li>
                        <a href="<?= base_url('dashboard');?>" class="nav-link <?php if ($menu == 'Dashboard' || $menu == 'dashboard') {echo 'active';} ?>">
                            <span class="fas fa-home"></span>
                            Dashboard
                        </a>
                    </li>
                </ul>

            <?php if($this->session->userdata('level') == 'Administrator') { ?>
                <div class="menu-head">
                <span>Master</span>
            </div>
            <ul class="nav-pills flex-column">
                <li>
                    <a href="<?= base_url('petugas');?>" class="nav-link <?php if ($menu == 'Petugas' || $menu == 'petugas') {echo 'active';} ?>">
                            <span class="fas fa-chalkboard-teacher"></span>
                            Petugas
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('kelas');?>" class="nav-link <?php if ($menu == 'Kelas' || $menu == 'kelas') {echo 'active';} ?>">
                        <span class="fas fa-chalkboard"></span>
                            Kelas
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('siswa');?>" class="nav-link <?php if ($menu == 'Siswa' || $menu == 'siswa') {echo 'active';} ?>">
                        <span class="fas fa-users"></span>
                        Siswa
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('spp');?>" class="nav-link <?php if ($menu == 'Spp' || $menu == 'spp') {echo 'active';} ?>">
                            <span class="fas fa-money-check"></span>
                            SPP
                        </a>
                    </li>
                </ul>
                <?php } ?>
                <?php if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator') { ?>
                    <div class="menu-head">
                        <span>Transaksi</span>
                </div>
                <ul class="nav-pills flex-column">
                    <li>
                        <a href="<?= base_url('transaksi');?>" class="nav-link <?php if ($menu == 'Transaksi' || $menu == 'transaksi') {echo 'active';} ?>">
                        <span class="fas fa-cash-register"></span>
                        Pembayaran SPP
                        </a>
                    </li>
                    <?php if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator') { ?> 
                        <li>
                            <a href="<?= base_url('histori');?>" class="nav-link <?php if ($menu == 'Histori' || $menu == 'histori') {echo 'active';} ?>">
                                <span class="fas fa-history"></span>
                                Histori Transaksi
                            </a>
                        </li>
                    <?php } ?>
                    <?php if($this->session->userdata('level') == 'Administrator') { ?> 
                    <li>
                        <a href="<?= base_url('laporan');?>" class="nav-link <?php if ($menu == 'Laporan' || $menu == 'laporan') {echo 'active';} ?>">
                            <span class="fas fa-file-signature"></span>
                            Laporan
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <?php if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator') { ?>
                    <div class="menu-head">
                        <span>Pengaturan</span>
                </div>
                <ul class="nav-pills flex-column">
                    <li>
                        <a href="<?= base_url('setting');?>" class="nav-link <?php if ($menu == 'Setting' || $menu == 'setting') {echo 'active';} ?>">
                            <span class="fas fa-cogs"></span>
                            Pengaturan
                        </a>
                    </li>
                </ul>
                <?php } ?>
                <div class="menu-head">
                    <span>Keluar</span>
                </div>
                <ul class="nav-pills flex-column">
                    <li>
                        <a href="" class="nav-link logout" data-toggle="modal" data-target="#Keluar">
                            <span class="fas fa-power-off"></span>
                            Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="menu-toggle">
                <label for="sidebar-toggle">
                    <span class="fas fa-bars"></span>
                </label>
            </div>
        </header>

        <main>
            <?= $contents; ?>

            <div class="modal fade" id="Keluar" tabindex="-1" role="dialog" aria-labelledby="modalKeluar" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalKeluar">Apakah Anda Yakin Ingin Keluar ?</h5>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger">Keluar</a>
                    </div>
                </div>
                </div>
            </div>


        </main>
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; 2021</a>
                    </span>
                </div>
            </div>
        </footer> 
 
    </div>
    <label for="sidebar-toggle" class="body-label"></label>

<script src="<?= base_url('assets/'); ?>jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>moment/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/'); ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script> 
    $(document).ready(function() {
        $('#table-spp, #table-kelas, #table-siswa, #table-petugas, #table-siswa-modal, #table-histori-siswa, #table-histori, #table-instansi').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "pageLength": 5,
        "language": {
            "info": 'Menampilkan _START_ ke _END_ dari _TOTAL_ jumlah data',
            "infoEmpty": 'Menampilkan 0 ke 0 dari 0 jumlah data',
            "infoFiltered": '(Difilter dari _MAX_ jumlah data)',
            "zeroRecords": 'Data Kosong',
            "emptyTable": 'Data Kosong',
            "search": 'Pencarian :',
            "paginate": {
                "next": '&raquo',
                "previous": '&laquo',
            }
        }
        });

        var tbl_transaksi = 
        $('#table-transaksi').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "sDom": "tp",
        "info": true,
        "autoWidth": false,
        "pageLength": 5,
        "language": {
            "info": 'Menampilkan _START_ ke _END_ dari _TOTAL_ jumlah data',
            "infoEmpty": 'Menampilkan 0 ke 0 dari 0 jumlah data',
            "infoFiltered": '(Difilter dari _MAX_ jumlah data)',
            "zeroRecords": 'Data Kosong',
            "emptyTable": 'Data Kosong',
            "search": 'Pencarian :',
            "paginate": {
                "next": '&raquo',
                "previous": '&laquo',
            }
        }
        });
        
        setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);
        setTimeout(function(){$("#pesan").fadeOut('slow');}, 2000);

        $(document).on('click', '#select', function() {
            var nisn = $(this).data('nisn');
            var nis = $(this).data('nis');
            var nama_siswa = $(this).data('nama_siswa');
            var nama_kelas = $(this).data('nama_kelas');
            var id_spp = $(this).data('id_spp');
            var tahun = $(this).data('tahun');
            var nominal = $(this).data('nominal');
            
            $('#nisn').val(nisn);
            $('#nis').val(nis);
            $('#nama_siswa').val(nama_siswa);
            $('#nama_kelas').val(nama_kelas);
            $('#id_spp').val(id_spp);
            $('#tahun').val(tahun);
            $('#nominal').val(nominal);
            $('#nomina').val('Rp '+nominal.toLocaleString().replace(/\,/g,'.'));
            $('#siswaModal').modal('hide');     
            $('#bulan_dibayar').prop('disabled', false);
            $('#tb-pembayaran').prop('hidden', false);     
            tbl_transaksi.search( nisn ).draw();
        });
        
        $(document).on('click', '#reset', function() {          
            $('#nisn').val('');
            $('#nis').val('');
            $('#nama_siswa').val('');
            $('#nama_kelas').val('');
            $('#id_spp').val('');
            $('#tahun').val('');
            $('#nominal').val('');
            $('#nomina').val('');
            $('#bulan_dibayar').prop('disabled', true);     
            $('#tb-pembayaran').prop('hidden', true);         
            tbl_transaksi.search( '' ).draw();
        });

        $('[type=numeric]').on('change', function(e) {
            $(e.target).val($(e.target).val().replace(/[^\d\.]/g, ''))
        });

        $('[type=numeric]').on('keypress', function(e) {
            keys = ['0','1','2','3','4','5','6','7','8','9']
            return keys.indexOf(event.key) > -1
        });

        $('select[name=filter] option').filter(':selected').val()
        $('select[name=filter]').on('change', function () {
            console.log('Changed option value ' + this.value);
            var target = this.value;
            pageLaporan(false, true);
            if (target == 'kelas'){
                $('#kelas').prop('hidden', false);         
                $('[name=tglPembayaran]').val('');       
                $('#tanggal').prop('hidden', true);         
            }
            else if (target == 'tanggal'){
                $('select[name=id_kelas]').val('');
                $('#kelas').prop('hidden', true);         
                $('#tanggal').prop('hidden', false);         
            }
            else if (target == ''){
                $('select[name=id_kelas]').val('');
                $('#kelas').prop('hidden', true);  
                $('[name=tglPembayaran]').val('');      
                $('#tanggal').prop('hidden', true);         
            }
            
        });

        $('select[name=id_kelas] option').filter(':selected').val()
        $('select[name=id_kelas]').on('change', function () {
            console.log('Changed option value ' + this.value);
        });

        $('#datepick').daterangepicker({
        opens: 'left',
        autoUpdateInput: false,
        showInputs: false,
        showMeridian: false,
        locale: {
            format: 'DD-MM-YYYY'
            }
        });

        $('input[name="tglPembayaran"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
        });

        $('input[name="tglPembayaran"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

        pageLaporan(page_url = false);
        $(document).on('click', '#caripembayaran', function() {          
            var tglPembayaran = $('[name=tglPembayaran]').val();
            pageLaporan(page_url = false);
        });
        
        $(document).on('click', '#cariKelas', function() {          
            var kelas = $('select[name=id_kelas]').val();
            pageLaporan(page_url = false);
        });

        $(document).on('click', ".pagination li a", function () {
            var page_url = $(this).attr('href');
            pageLaporan(page_url);
            return false;
        });

        function pageLaporan(page_url, all = false) {
            var tglPembayaran = $('[name=tglPembayaran]').val();
            var kelas = $('select[name=id_kelas]').val();
            var link = '<?= base_url('laporan/index_ajax') ?>';

            if (page_url) {
                link = page_url;
            }

            $.ajax({
                type: "POST",
                url: link,
                data: !all && {
                    tglPembayaran: tglPembayaran,
                    kelas: kelas
                },
                success: function (response) {
                    $('.laporan').html(response);
                }
            });
        }

    });
</script>
</body>
</html>
