$(document).ready(function() {
    function jam() {
        var time = new Date(),
            hours = time.getHours(),
            minutes = time.getMinutes(),
            seconds = time.getSeconds();
        document.querySelectorAll('.jam')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);

        function harold(standIn) {
            if (standIn < 10) {
                standIn = '0' + standIn
            }
            return standIn;
        }
    }
    setInterval(jam, 1000)

    var tanggallengkap = new String()
    var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu")
    namahari = namahari.split(" ");
    var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember")
    namabulan = namabulan.split(" ")
    var tgl = new Date()
    var hari = tgl.getDay()
    var tanggal = tgl.getDate()
    var bulan = tgl.getMonth()
    var tahun = tgl.getFullYear()
    tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun
    document.querySelector('.tanggal').innerHTML = tanggallengkap

    $('#loading-simpan, #pesan-error, #pesan-error-keperluan, #pesan-error-keperluan1, #pesan-sukses, #pesan-sukses1, #pesan-sukses-daftar, #pesan-error-daftar, #pesan-errorstatus').hide();

    /*
     *Kelola User
     */
    // modal ubah user
    $('#pesan-error-ubahprofilnama, #pesan-error-ubahprofilusername, #pesan-error-ubahprofilpassword').hide()
    $('#pesan-error-tambahprofilnama, #pesan-error-tambahprofilusername, #pesan-error-tambahprofilpassword').hide()

    var namaadmin = document.getElementById('namaadmin');
    if (namaadmin) {
        namaadmin.addEventListener("keyup", function() {
            var namaadmin = document.getElementById('namaadmin').value;
            if (namaadmin !== "" && namaadmin.trim()) {
                $('#pesan-error-ubahprofilnama').hide()
            }
        });
    }

    var usernameadmin = document.getElementById('usernameadmin');
    if (usernameadmin) {
        usernameadmin.addEventListener("keyup", function() {
            var usernameadmin = document.getElementById('usernameadmin').value;
            if (usernameadmin !== "" && usernameadmin.trim()) {
                $('#pesan-error-ubahprofilusername').hide()
            }
        });
    }

    var passwordadmin = document.getElementById('passwordadmin');
    if (passwordadmin) {
        passwordadmin.addEventListener("keyup", function() {
            var passwordadmin = document.getElementById('passwordadmin').value;
            if (passwordadmin !== "" && passwordadmin.trim()) {
                $('#pesan-error-ubahprofilpassword').hide()
            }
        });
    }

    $('#ubahProfilModal').on('hidden.bs.modal', function() {
        $('#btn-reseteditprofil').hide()
        $('#btn-simpanprofil').hide()
        $('#pesan-error-ubahprofilnama, #pesan-error-ubahprofilusername, #pesan-error-ubahprofilpassword').hide()
        $('#namaadmin').attr('readonly', 'readonly')
        $('#usernameadmin').attr('readonly', 'readonly')
        $('#passwordadmin').attr('readonly', 'readonly')
        var inputpassword = document.getElementById('passwordadmin')
        inputpassword.value = "•••••"
    });

    $('#btn-ubahprofil').click(function() {
        var iduser = $(this).data('iduser')
        var namauser = $(this).data('namauser')
        var username = $(this).data('username')

        document.getElementById('iduseradmin').value = iduser
        document.getElementById('namaadmin').value = namauser
        document.getElementById('usernameadmin').value = username
    })

    $('#btn-simpanprofil').hide()
    $('#btn-reseteditprofil').hide()
    $('#btn-editprofil').click(function() {
        $('#btn-reseteditprofil').show()
        $('#btn-simpanprofil').show()

        document.getElementById('namaadmin').removeAttribute('readonly')
        document.getElementById('usernameadmin').removeAttribute('readonly')
        document.getElementById('passwordadmin').removeAttribute('readonly')
        var inputpassword = document.getElementById('passwordadmin')
        inputpassword.value = ""

        $('#btn-simpanprofil').click(function() {
            var nama_user = document.getElementById('namaadmin').value;
            var username = document.getElementById('usernameadmin').value;
            var password = document.getElementById('passwordadmin').value;
            var validasinama = false,
                validasiuseernam = false,
                validasipassword = false

            if (nama_user == "") {
                $('#pesan-error-ubahprofilnama').show()
            } else if (nama_user !== "" && !nama_user.trim()) {
                $('#pesan-error-ubahprofilnama').show()
            } else if (nama_user !== "") {
                $('#pesan-error-ubahprofilnama').hide()
                validasinama = true
            }

            if (username == "") {
                $('#pesan-error-ubahprofilusername').show()
            } else if (username !== "" && !username.trim()) {
                $('#pesan-error-ubahprofilusername').show()
            } else if (username !== "") {
                $('#pesan-error-ubahprofilusername').hide()
                validasiuseernam = true
            }

            if (password == "") {
                $('#pesan-error-ubahprofilpassword').show()
            } else if (password !== "" && !password.trim()) {
                $('#pesan-error-ubahprofilpassword').show()
            } else if (password !== "") {
                $('#pesan-error-ubahprofilpassword').hide()
                validasipassword = true
            }

            if (validasinama == true && validasiuseernam == true && validasipassword == true) {
                $.ajax({
                    url: base_url + 'kelolaadmin/ubah_profil',
                    type: 'POST',
                    data: $("#ubahProfilModal form").serialize(),
                    dataType: 'json',
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType('application/jsoncharset=UTF-8')
                        }
                    },
                    success: function(response) {

                        if (response.status == 'sukses') {

                            $('#ubahProfilModal').modal('hide')

                            window.location.reload()
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.responseText)
                    }
                })
            }
        })
    })

    $('#btn-reseteditprofil').click(function() {
        $('#pesan-error-ubahprofilnama, #pesan-error-ubahprofilusername, #pesan-error-ubahprofilpassword').hide()
        document.getElementById('namaadmin').value = ""
        document.getElementById('usernameadmin').value = ""
        document.getElementById('passwordadmin').value = ""
    })

    //tambah profil
    var namaadminsimpan = document.getElementById('namaadminsimpan');
    if (namaadminsimpan) {
        namaadminsimpan.addEventListener("keyup", function() {
            var namaadminsimpan = document.getElementById('namaadminsimpan').value;
            if (namaadminsimpan !== "" && namaadminsimpan.trim()) {
                $('#pesan-error-tambahprofilnama').hide()
            }
        });
    }

    var usernameadminsimpan = document.getElementById('usernameadminsimpan');
    if (usernameadminsimpan) {
        usernameadminsimpan.addEventListener("keyup", function() {
            var usernameadminsimpan = document.getElementById('usernameadminsimpan').value;
            if (usernameadminsimpan !== "" && usernameadminsimpan.trim()) {
                $('#pesan-error-tambahprofilusername').hide()
            }
        });
    }

    var passwordadminsimpan = document.getElementById('passwordadminsimpan');
    if (passwordadminsimpan) {
        passwordadminsimpan.addEventListener("keyup", function() {
            var passwordadminsimpan = document.getElementById('passwordadminsimpan').value;
            if (passwordadminsimpan !== "" && passwordadminsimpan.trim()) {
                $('#pesan-error-tambahprofilpassword').hide()
            }
        });
    }

    $('#tambahProfilModal').on('hidden.bs.modal', function() {
        $('#pesan-error-tambahprofilnama, #pesan-error-tambahprofilusername, #pesan-error-tambahprofilpassword').hide()
        $('#namaadminsimpan').val('')
        $('#usernameadminsimpan').val('')
        $('#passwordadminsimpan').val('')
    });

    $('#btn-simpantambahprofil').click(function() {
        var nama_usersimpan = document.getElementById('namaadminsimpan').value;
        var usernamesimpan = document.getElementById('usernameadminsimpan').value;
        var passwordsimpan = document.getElementById('passwordadminsimpan').value;
        var validasinamasimpan = false,
            validasiusernamesimpan = false,
            validasipasswordsimpan = false

        if (nama_usersimpan == "") {
            $('#pesan-error-tambahprofilnama').show()
        } else if (nama_usersimpan !== "" && !nama_usersimpan.trim()) {
            $('#pesan-error-tambahprofilnama').show()
        } else if (nama_usersimpan !== "") {
            $('#pesan-error-tambahprofilnama').hide()
            validasinamasimpan = true
        }

        if (usernamesimpan == "") {
            $('#pesan-error-tambahprofilusername').show()
        } else if (usernamesimpan !== "" && !usernamesimpan.trim()) {
            $('#pesan-error-tambahprofilusername').show()
        } else if (usernamesimpan !== "") {
            $('#pesan-error-tambahprofilusername').hide()
            validasiusernamesimpan = true
        }

        if (passwordsimpan == "") {
            $('#pesan-error-tambahprofilpassword').show()
        } else if (passwordsimpan !== "" && !passwordsimpan.trim()) {
            $('#pesan-error-tambahprofilpassword').show()
        } else if (passwordsimpan !== "") {
            $('#pesan-error-tambahprofilpassword').hide()
            validasipasswordsimpan = true
        }

        if (validasinamasimpan == true && validasiusernamesimpan == true && validasipasswordsimpan == true) {
            $.ajax({
                url: base_url + 'kelolaadmin/tambah_profil',
                type: 'POST',
                data: $("#tambahProfilModal form").serialize(),
                dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType('application/jsoncharset=UTF-8')
                    }
                },
                success: function(response) {

                    if (response.status == 'sukses') {

                        window.location.replace(base_url + 'login')

                        // var notifAkunBaru = document.getElementById('notifAkunBaru')
                        // notifAkunBaru.style.display = "block"
                        // $('#notifAkunBaru').delay(5000).fadeOut()

                        // $('#tambahProfilModal').modal('hide')

                        // window.location.reload()
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText)
                }
            })
        }
    })


    /*
     *form buku tamu
     */
    $('#rekap').click(function() {
        document.getElementById('daftartamu').style.display = 'none'
        document.getElementById('rekap').style.display = 'none'
        document.getElementById('kembali').style.display = 'block'
        document.getElementById('view_data_bukutamu').style.display = 'none'
        document.getElementById('form_rekapbuku').style.display = 'block'
    })
    $('#daftarModal').on('hidden.bs.modal', function() {
        $('#daftarModal input, #daftarModal textarea').val('')
        $('#daftarModal select').val('Pilih Keperluan')
        $('#pesan-error, #pesan-error-keperluan, #keterangan, #keteranganbaca').hide()
    });

    $('#daftarPengunjungModal').on('shown.bs.modal', function() {
        document.getElementById('btn-simpandaftarpengunjung').disabled = true;
    });

    $('#daftarPengunjungModal').on('hidden.bs.modal', function() {
        var status = document.getElementsByName('status');

        for (var i = 0; i < status.length; i++) {
            status[i].checked = false;
        }

        $('#daftarPengunjungModal input').val('')
        $('#pesan-error-daftar, #inputalamat, #inputunitkerja, #pesan-errorstatus').hide()
    });

    var data = {
        url: base_url + 'bukutamu/autocompleteBukutamu',
        getValue: "nama",
        template: {
            type: "custom",
            method: function(value, item) {
                if (item.status == "1") {
                    return item.nama + " | " + item.alamat;
                } else if (item.status == "0") {
                    return item.nama;
                }
            }
        },
        list: {
            match: {
                enabled: true
            },
            onClickEvent: function() {
                var status = $("#namaSimpan").getSelectedItemData().status;
                if (status == "0") {
                    var dari = $("#namaSimpan").getSelectedItemData().unit_kerja;
                }
                if (status == "1") {
                    var dari = $("#namaSimpan").getSelectedItemData().alamat;
                }
                var id_pengunjung = $("#namaSimpan").getSelectedItemData().id_pengunjung;
                $("#alamatSimpan").val(dari).trigger("change");
                $("#bukutamu_Idpengunjung").val(id_pengunjung);
            },
            maxNumberOfElements: 10
        },
        placeholder: "Masukkan Nama",
    };
    $("#namaSimpan").easyAutocomplete(data);

    var data = {
        url: base_url + 'bukutamu/autocompleteBukutamu',
        getValue: "nama",
        template: {
            type: "custom",
            method: function(value, item) {
                if (item.status == "1") {
                    return item.nama + " | " + item.alamat;
                } else if (item.status == "0") {
                    return item.nama;
                }
            }
        },
        list: {
            match: {
                enabled: true
            },
            onClickEvent: function() {
                var status = $("#namaSimpan1").getSelectedItemData().status;
                if (status == "0") {
                    var dari = $("#namaSimpan1").getSelectedItemData().unit_kerja;
                }
                if (status == "1") {
                    var dari = $("#namaSimpan1").getSelectedItemData().alamat;
                }
                var id_pengunjung = $("#namaSimpan1").getSelectedItemData().id_pengunjung;
                $("#alamatSimpan1").val(dari).trigger("change");
                $("#bukutamu_Idpengunjung1").val(id_pengunjung);
            },
            maxNumberOfElements: 10
        },
        placeholder: "Masukkan Nama",
    };
    $("#namaSimpan1").easyAutocomplete(data);

    $('.js-example-basic-multiple').select2();

    $('input[type="radio"]').on('click change', function(e) {
        var status = document.getElementsByName('status');
        var inputalamat = document.getElementById('inputalamat');
        var inputunitkerja = document.getElementById('inputunitkerja');
        var unitKerja = document.getElementById('unitkerja');
        var alamatDaftar = document.getElementById('alamatDaftar');

        for (var i = 0; i < status.length; i++) {
            if (status[0].checked == true) {
                inputunitkerja.style.display = "block";
                inputalamat.style.display = "none";
                alamatDaftar.value = "";
                document.getElementById('btn-simpandaftarpengunjung').disabled = true;
            } else if (status[1].checked == true) {
                inputalamat.style.display = "block";
                inputunitkerja.style.display = "none";
                unitKerja.value = "";
                document.getElementById('btn-simpandaftarpengunjung').disabled = true;
            }
        }
    });

    var unitKerja = document.getElementById('unitkerja');
    if (unitKerja) {
        unitKerja.addEventListener("keyup", function() {
            var unitKerja = document.getElementById('unitkerja').value;
            if (unitKerja !== "" && unitKerja.trim()) {
                document.getElementById('btn-simpandaftarpengunjung').disabled = false;
            } else {
                document.getElementById('btn-simpandaftarpengunjung').disabled = true;
            }
        });
    }

    var alamatDaftar = document.getElementById('alamatDaftar');
    if (alamatDaftar) {
        alamatDaftar.addEventListener("keyup", function() {
            var alamatDaftar = document.getElementById('alamatDaftar').value;
            if (alamatDaftar !== "" && alamatDaftar.trim()) {
                document.getElementById('btn-simpandaftarpengunjung').disabled = false;
            } else {
                document.getElementById('btn-simpandaftarpengunjung').disabled = true;
            }
        });
    }

    //combo box keperluan
    $('#keperluan').change(function() {
        var selected = $(this).val()
        var textarea = document.getElementById("keterangan")
        var input = document.getElementById("keteranganbaca")

        if (selected === 'lainnya') {
            textarea.style.display = "block"
        } else {
            textarea.style.display = "none"
        }

        if (selected === 'baca') {
            input.style.display = "block"
        } else {
            input.style.display = "none"
        }

        if (selected.selectedIndex !== "0") {
            $('#pesan-error-keperluan').hide()
        }
    })

    $('#keperluan1').change(function() {
        var selected = $(this).val()
        var textarea = document.getElementById("keterangan1")
        var input = document.getElementById("keteranganbaca1")

        if (selected === 'lainnya') {
            textarea.style.display = "block"
        } else {
            textarea.style.display = "none"
        }

        if (selected === 'baca') {
            input.style.display = "block"
        } else {
            input.style.display = "none"
        }

        if (selected.selectedIndex !== "0") {
            $('#pesan-error-keperluan1').hide()
        }
    })

    $('#btn-resetrekapbuku').click(function() {
        $('#namaSimpan1').val('')
        $('#alamatSimpan1').val('')
        $('#datepicker').val('')
        var selected = document.getElementById('keperluan1')
        selected.selectedIndex = 0
        document.getElementById('keterangan1').style.display = "none"
        document.getElementById('keteranganbaca1').style.display = "none"
    })

    $("#datepicker").datepicker({ dateFormat: 'dd/mm/yy' });

    $('#btn-simpanrekapbuku').click(function() { // Ketika tombol di klik
        var keperluan = document.getElementById('keperluan1').selectedIndex
        if (keperluan == "0") {
            $('#pesan-error-keperluan1').show()
        } else {
            $.ajax({
                url: base_url + 'bukutamu/rekap_tambah_aksi',
                type: 'POST',
                data: $("#form_rekapbuku").serialize(),
                dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType('application/jsoncharset=UTF-8')
                    }
                },
                success: function(response) {

                    if (response.status == 'sukses') {
                        $('#pesan-sukses1').html(response.pesan).fadeIn().delay(10000).fadeOut()
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText)
                }
            })
        }
    })

    $('#btn-simpanbukutamu').click(function() { // Ketika tombol di klik
        var keperluan = document.getElementById('keperluan').selectedIndex
        if (keperluan == "0") {
            $('#pesan-error-keperluan').show()
        } else {
            $.ajax({
                url: base_url + 'bukutamu/tambah_aksi', // URL tujuan
                type: 'POST', // Tentukan type nya POST atau GET
                data: $("#daftarModal form").serialize(), // Ambil semua data yang ada didalam tag form
                dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType('application/jsoncharset=UTF-8')
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil

                    if (response.status == 'sukses') { // Jika Statusnya = sukses
                        // Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
                        // $('#view_data_bukutamu').html(response.html)

                        /*
                         * Ambil pesan suksesnya dan set ke div pesan-sukses
                         * Lalu munculkan div pesan-sukes nya
                         * Setelah 10 detik, sembunyikan kembali pesan suksesnya
                         */
                        $('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut()

                        $('#daftarModal').modal('hide') // Close / Tutup Modal Dialog

                        window.location.reload()
                    } else { // Jika statusnya = gagal
                        /*
                         * Ambil pesan errornya dan set ke div pesan-error
                         * Lalu munculkan div pesan-error nya
                         */
                        $('#pesan-error').html(response.pesan).show()
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                    alert(xhr.responseText) // munculkan alert
                }
            })
        }
    })

    $('#btn-simpandaftarpengunjung').click(function() {
        var status = document.getElementsByName('status');
        var statusValue = false;

        for (var i = 0; i < status.length; i++) {
            if (status[i].checked == true) {
                statusValue = true;
            }
        }
        if (!statusValue) {
            return false;
        } else {
            $.ajax({
                url: base_url + 'bukutamu/daftar_pengunjung',
                type: 'POST',
                data: $("#daftarPengunjungModal form").serialize(),
                dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType('application/jsoncharset=UTF-8')
                    }
                },
                success: function(response) {
                    if (response.status == 'sukses') {
                        $('#pesan-sukses-daftar').html(response.pesan).fadeIn().delay(10000).fadeOut()

                        $('#daftarPengunjungModal').modal('hide') // Close / Tutup Modal Dialog

                        window.location.reload()
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText)
                }
            })
        }
    })

    /*
     *form peminjaman
     */
    $('#detail_peminjaman').hide()

    //tombol transaksi peminjaman
    $('#btn-batal-prosesTransaksi').click(function() {
        var data = {
            list: {
                onClickEvent: function() {
                    $("#namaPeminjam").val("");
                }
            }
        };
        $("#namaPeminjam").easyAutocomplete(data);
    })

    $('#btn-simpan-transaksi').click(function() {
        var idPengunjung = $('#peminjaman_Idpengunjung').val();
        var status = $('#peminjaman_status').val();
        var idbuku = [];
        var iduser = $('#iduser').val();
        var table = document.getElementById("tabel_detailrekam");
        var sumRows = table.rows.length - 1;

        for (var i = 1; i < sumRows + 1; i++) {
            var cellValue = document.getElementById("tabel_detailrekam").rows[i].cells.item(0).innerHTML;
            var getIdbuku = $(cellValue).data('idbuku');
            idbuku.push(getIdbuku);
        }

        $.ajax({
            url: base_url + 'peminjaman/transaksi',
            type: 'POST',
            data: { idpengunjung: idPengunjung, status: status, dataidbuku: idbuku, iduser: iduser },
            dataType: 'json',
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType('application/jsoncharset=UTF-8')
                }
            },
            success: function(response) {

                if (response.status == 'sukses') {
                    // Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
                    // $('#view_data_bukutamu').html(response.html)
                    window.location.reload()

                    $('#simpantransaksiModal').modal('hide')

                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText) // munculkan alert
            }
        })
    })

    var data = {
        url: base_url + 'peminjaman/autocompletePeminjaman',
        getValue: "nama",
        template: {
            type: "custom",
            method: function(value, item) {
                if (item.status == "1") {
                    return item.nama + " | " + item.alamat;
                } else if (item.status == "0") {
                    return item.nama;
                }
            }
        },
        list: {
            match: {
                enabled: true
            },
            onClickEvent: function() {
                var status = $("#namaPeminjam").getSelectedItemData().status;
                if (status == "0") {
                    var dari = $("#namaPeminjam").getSelectedItemData().unit_kerja;
                } else if (status == "1") {
                    var dari = $("#namaPeminjam").getSelectedItemData().alamat;
                }
                var id_pengunjung = $("#namaPeminjam").getSelectedItemData().id_pengunjung;
                var status = $("#namaPeminjam").getSelectedItemData().status;
                $("#alamatPeminjam").val(dari).trigger("change");
                $("#peminjaman_Idpengunjung").val(id_pengunjung);
                $("#peminjaman_status").val(status);
            }
        },
        placeholder: "Masukkan Nama"
    };
    $("#namaPeminjam").easyAutocomplete(data);

    $('.btn-rekam').click(function() {

        var idbuku = $(this).data('idbuku');
        var judulbuku = $(this).data('judulbuku');
        var noinventaris = $(this).data('noinventaris');
        var pengarang = $(this).data('pengarang');
        var penerbit = $(this).data('penerbit');
        var jumlah = $(this).data('jumlah');

        try {
            var table = document.getElementById("tabel_detailrekam");
            var sumRows = table.rows.length - 1;
            if (sumRows < 1) {
                if (jumlah == '0') {
                    $.ajax({
                        url: base_url + 'peminjaman/status_buku',
                        type: 'POST',
                        data: { idbuku: idbuku },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === "sukses") {
                                Swal.fire({
                                    type: 'info',
                                    title: 'Buku Sedang dipinjam !!!',
                                    text: response.tgl_kembali
                                })
                            }
                        }
                    })
                } else {
                    $('#detail_peminjaman').show()

                    $("table#tabel_detailrekam").append("<tr style='color:#000000;'><td class='text-center'><a href='javascript:void();' title='Keluar list' class='btn-keluarlist' data-idbuku=" + idbuku + "><i class='fas fa-fw fa-sign-out-alt'></i></a></td><td>" + judulbuku + "</td><td>" + noinventaris + "</td><td>" + pengarang + "</td><td>" + penerbit + "</td></tr>");
                }
            } else if (sumRows == 4) {
                Swal.fire({
                    type: 'error',
                    title: 'Batas maksimal Peminjaman hanya 4 Buku !!!'
                })
            } else {
                var dataIdbuku = [];
                var table = document.getElementById("tabel_detailrekam");
                var sumRows = table.rows.length - 1;
                for (var i = 1; i < sumRows + 1; i++) {
                    var cellValueId = document.getElementById("tabel_detailrekam").rows[i].cells.item(0).innerHTML;
                    var getIdbuku = $(cellValueId).data('idbuku');
                    dataIdbuku.push(getIdbuku);
                }

                var statusRekam = false;

                for (var i = 0; i < dataIdbuku.length + 1; i++) {
                    if (dataIdbuku[i] == idbuku) {
                        statusRekam = true;
                    }
                }

                if (statusRekam == true || jumlah == 0) {
                    if (statusRekam == true) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Buku Sudah dipilih !!!'
                        })
                    } else if (jumlah == 0) {
                        Swal.fire({
                            type: 'info',
                            title: 'Buku Sedang dipinjam !!!'
                        })
                    }
                } else {
                    $("table#tabel_detailrekam").append("<tr style='color:#000000;'><td class='text-center'><a href='javascript:void();' title='Keluar list' class='btn-keluarlist' data-idbuku=" + idbuku + "><i class='fas fa-fw fa-sign-out-alt'></i></a></td><td>" + judulbuku + "</td><td>" + noinventaris + "</td><td>" + pengarang + "</td><td>" + penerbit + "</td></tr>");
                }
            }
        } catch (e) {
            alert(e);
        }
    });

    //tombol keluar list
    $('#tabel_detailrekam').on('click', '.btn-keluarlist', function() {
        try {
            var table = document.getElementById("tabel_detailrekam");
            var rowCount = table.rows.length - 1;

            var bukuId = $(this).data('idbuku');

            for (var i = rowCount; i > 0; i--) {
                var valueCell = document.getElementById("tabel_detailrekam").rows[i].cells.item(0).innerHTML;
                valueCell = $(valueCell).data('idbuku');
                if (bukuId == valueCell) {
                    table.deleteRow(i);
                    var rowCount = table.rows.length - 1;

                    if (rowCount < 1) {
                        $('#detail_peminjaman').hide();
                    } else {
                        break;
                    }
                } else {
                    continue;
                }
            }
        } catch (e) {
            alert(e);
        }
    });

    //tombol batal transaksi
    $('#btn-batal-transaksi').click(function() {
        try {
            var table = document.getElementById("tabel_detailrekam");
            var rowCount = table.rows.length;

            for (var i = 1; i < rowCount; i++) {
                table.deleteRow(i);
                rowCount--;
                i--;
            }
        } catch (e) {
            alert(e);
        }

        $('#detail_peminjaman').hide()
    });

    //tombol kembalikan buku
    $('#btn-kembalikanbuku').click(function() {
        try {
            var table = document.getElementById("tableDetailPengembalian");
            var rowCount = table.rows.length - 1;

            if (rowCount = 0) {
                $.ajax({
                    url: base_url + 'pengembalian/index'
                })
            }
        } catch (e) {
            alert(e);
        }
    })

    //data transaksi
    var tabelHistoriPeminjaman = document.getElementById('divTableDataPeminjaman')
    var tabelHistoriPengembalian = document.getElementById('divTableDataPengembalian')
    var btnHistoriPeminjaman = document.getElementById('btn-historiPemijaman')
    var btnHistoriPengembalian = document.getElementById('btn-historiPengembalian')

    $('#btn-historiPemijaman').click(function() {
        btnHistoriPeminjaman.style.backgroundColor = "#858796";
        btnHistoriPeminjaman.style.color = "#ffffff";
        btnHistoriPengembalian.className = "btn btn-outline-secondary";
        btnHistoriPengembalian.style.backgroundColor = "";
        btnHistoriPengembalian.style.color = "#858796";
        btnHistoriPengembalian.style = "#858796";
        tabelHistoriPeminjaman.style.display = "block";
        tabelHistoriPengembalian.style.display = "none";
    })

    $('#btn-historiPengembalian').click(function() {
        btnHistoriPengembalian.style.backgroundColor = "#858796";
        btnHistoriPengembalian.style.color = "#ffffff";
        btnHistoriPeminjaman.className = "btn btn-outline-secondary";
        btnHistoriPeminjaman.style.backgroundColor = "";
        btnHistoriPeminjaman.style.color = "#858796";
        btnHistoriPeminjaman.style = "#858796";
        tabelHistoriPengembalian.style.display = "block";
        tabelHistoriPeminjaman.style.display = "none";
    })

    /*
     *laporan pengunjung
     */
    var bulan, tahun
    $('#pilihbulan').change(function() {
        bulan = $(this).val()
    })

    $('#pilihtahun').change(function() {
            tahun = $(this).val()
        })
        //tombol simpan bukutamu
    $('#btn-cariLaporanPengunjung').click(function() { // Ketika tombol di klik
        $.ajax({
            url: base_url + 'laporanpengunjung/filter_laporan_pengunjung', // URL tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: { bulan: bulan, tahun: tahun }, // Ambil semua data yang ada didalam tag form
            dataType: 'json',
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType('application/jsoncharset=UTF-8')
                }
            },
            success: function(response) { // Ketika proses pengiriman berhasil
                var tabel_laporan = document.getElementById('view_tabel_laporan_pengunjung');
                var btn_cetak = document.getElementById('btn-cetakLaporanPengunjung');
                tabel_laporan.style.display = "block";
                btn_cetak.style.display = "block";
                btn_cetak.setAttribute('data-bulan', bulan)
                btn_cetak.setAttribute('data-tahun', tahun)
                btn_cetak.setAttribute('href', base_url + 'laporanpengunjung/preview_laporan/' + bulan + '/' + tahun)

                if (response.status == 'sukses') {
                    $('#view_tabel_laporan_pengunjung').html(response.html)
                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText) // munculkan alert
            }
        })
    })

    /*
     *Manajemen Buku
     */
    //buku
    $('.btn-hapusbuku').click(function() {
        var id_buku = $(this).data('idbuku')
        var judul_buku = $(this).data('judulbuku')

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: 'menghapus Buku ' + judul_buku + ' !',
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'buku/hapus',
                    type: 'POST',
                    data: { id_buku: id_buku },
                    dataType: 'json',
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType('application/jsoncharset=UTF-8')
                        }
                    },
                    success: function(response) {
                        if (response.status == 'sukses') {
                            Swal.fire(
                                'Terhapus!',
                                'Buku ' + judul_buku + ' terhapus!',
                                'success'
                            )
                        }
                        setTimeout(location.reload.bind(location), 1500);
                        // setTimeout(function() { location.reload() }, 3000);
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                        alert(xhr.responseText) // munculkan alert
                    }
                })
            }
        })
    })

    $('#pesan-error-jenisbuku, #pesan-error-rak, #pesan-error-judulbuku, #pesan-error-jumlah').hide()
    $('#jenis_buku').change(function() {
        var selected = $(this).val()

        if (selected.selectedIndex !== "0") {
            $('#pesan-error-jenisbuku').hide()
        }
    })

    $('#rak').change(function() {
        var selected = $(this).val()

        if (selected.selectedIndex !== "0") {
            $('#pesan-error-rak').hide()
        }
    })

    //tombol reset tambah buku
    $('#btn-resetambahbuku').click(function() {
        $('#pesan-error-jenisbuku, #pesan-error-rak, #pesan-error-judulbuku, #pesan-error-jumlah').hide()
    })

    //tombol tambah simpan buku
    $('#btn-simpantambahbuku').click(function() {
        var jenis_buku = document.getElementById('jenis_buku').selectedIndex
        var rak = document.getElementById('rak').selectedIndex
        var judul_buku = document.getElementById('judul_buku').value;
        var jumlah = document.getElementById('jumlah').value;
        var validasi_judulbuku = true
        var validasi_jumlah = true

        if (judul_buku == "") {
            $('#pesan-error-judulbuku').show()
        } else if (judul_buku !== "" && !judul_buku.trim()) {
            $('#pesan-error-judulbuku').show()
        } else if (judul_buku !== "") {
            $('#pesan-error-judulbuku').hide()
            validasi_judulbuku = false
        }

        if (jumlah == "") {
            $('#pesan-error-jumlah').show()
        } else if (jumlah !== "" && !jumlah.trim()) {
            $('#pesan-error-jumlah').show()
        } else if (jumlah !== "" && isNaN(jumlah)) {
            $('#pesan-error-jumlah').show()
        } else if (jumlah !== "") {
            $('#pesan-error-jumlah').hide()
            validasi_jumlah = false
        }

        if (jenis_buku == "0" || rak == "0" || jumlah < 0 || validasi_judulbuku == true) {
            if (jenis_buku == "0") {
                $('#pesan-error-jenisbuku').show()
            }

            if (rak == "0") {
                $('#pesan-error-rak').show()
            }

            if (validasi_judulbuku == true) {
                $('#pesan-error-judulbuku').show()
            }

            if (jumlah < 0) {
                $('#pesan-error-jumlah').show()
            }

        } else {
            $.ajax({
                url: base_url + 'manajemendata/tambah_aksi',
                type: 'POST',
                data: $('#form_inputbuku').serialize(),
                dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType('application/jsoncharset=UTF-8')
                    }
                },
                success: function(response) {
                    if (response.status == 'sukses') {
                        window.location.replace(base_url + 'manajemendata')
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                    alert(xhr.responseText) // munculkan alert
                }
            });
        }
    })

    //jenis buku
    $('#btn-simpanFormJenisBuku').attr('disabled', true)
    var jenis_buku_formInput = document.getElementById('jenis_buku_formInput');
    if (jenis_buku_formInput) {
        jenis_buku_formInput.addEventListener("keyup", function() {
            var jenis_buku_formInput = document.getElementById('jenis_buku_formInput').value;
            if (jenis_buku_formInput !== "" && jenis_buku_formInput.trim()) {
                $('#btn-simpanFormJenisBuku').attr('disabled', false)
            } else {
                $('#btn-simpanFormJenisBuku').attr('disabled', false)
            }
        });
    }

    $('#btn-resetFormJenisBuku').click(function() {
        document.getElementById('btn-simpanFormJenisBuku').disabled = true;
    })

    //rak
    $('#btn-simpanFormRak').attr('disabled', true)
    var rak_forminput = document.getElementById('rak_forminput');
    if (rak_forminput) {
        rak_forminput.addEventListener("keyup", function() {
            var rak_forminput = document.getElementById('rak_forminput').value;
            if (rak_forminput !== "" && rak_forminput.trim()) {
                $('#btn-simpanFormRak').attr('disabled', false)
            } else {
                $('#btn-simpanFormRak').attr('disabled', false)
            }
        });
    }

    $('#btn-resetFormRak').click(function() {
        document.getElementById('btn-simpanFormRak').disabled = true;
    })

    $('.btn-hapusIdRak').click(function() {
        var id_rak = $(this).data('idrak')
        var rak = $(this).data('rak')

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: 'menghapus Rak ' + rak + ' !',
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'jenisbukudanrak/hapusrak',
                    type: 'POST',
                    data: { id_rak: id_rak },
                    dataType: 'json',
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType('application/jsoncharset=UTF-8')
                        }
                    },
                    success: function(response) {
                        if (response.status == 'sukses') {
                            Swal.fire(
                                'Terhapus!',
                                'Rak ' + rak + ' terhapus!',
                                'success'
                            )
                        }
                        setTimeout(location.reload.bind(location), 1500);
                        // setTimeout(function() { location.reload() }, 3000);
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                        alert(xhr.responseText) // munculkan alert
                    }
                })
            }
        })
    })

    $('.btn-hapusIdJenisBuku').click(function() {
        var id_jenis_buku = $(this).data('idjenisbuku')
        var jenis_buku = $(this).data('jenisbuku')

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: 'menghapus Jenis Buku ' + jenis_buku + ' !',
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'jenisbukudanrak/hapusjenisbuku',
                    type: 'POST',
                    data: { id_jenis_buku: id_jenis_buku },
                    dataType: 'json',
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType('application/jsoncharset=UTF-8')
                        }
                    },
                    success: function(response) {
                        if (response.status === "sukses") {
                            Swal.fire(
                                'Terhapus!',
                                'Jenis Buku ' + jenis_buku + ' terhapus!',
                                'success'
                            )
                        }
                        setTimeout(location.reload.bind(location), 1500)
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                        alert(xhr.responseText) // munculkan alert
                    }
                })
            }
        })
    })
})