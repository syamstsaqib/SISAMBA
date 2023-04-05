$(".hapus_admin").click(function () {
    let form = $(this).parent();
    Swal.fire({
        icon: "question",
        title: "Hapus admin?",
        text: "Apa anda yakin akan menghapus data admin? ",
        showCancelButton: true,
        showConfirmButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

$(".detail_admin").click(function () {
    let idadmin = $(this).attr("data-id");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("input[name=_token]").val(),
        },
    });
    $.get(`/superadmin/dataadmin/${idadmin}`, {}, function (data, status) {
        let nama = data.nama_admin.split(" ");
        $("#nama_admin").text(nama[0]);
        $("#foto").attr("src", `/storage/${data.foto}`);
        $("#NISN").text(data.NISN);
        $("#nama_lengkap").text(data.nama_admin);
        $("#kelas").text(data.kelas);
        $("#jurusan").text(data.jurusan);
        $("#TTL").text(`${data.tempat_lahir} / ${data.tgl_lahir}`);
        $("#J_kelamin").text(data.jenis_kelamin);
        $("#alamat").text(data.alamat);
        $("#nama_wali").text(data.nama_wali);
        $("#email").text(data.email);
    });
});
