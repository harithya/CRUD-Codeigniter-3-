<script>
    $(document).ready(function() {

        const BaseUrl = "<?= base_url(); ?>"

        $(".table").on('click', '.update', function(e) {
            e.preventDefault();
            const id = $(this).attr("data-id");
            const url = BaseUrl + 'mahasiswa/show/' + id;
            // request ajak ke controller
            $.get(url, (result) => {
                $("#id").val(result.id);
                $("#nama").val(result.nama);
                $("#email").val(result.email);
                $("#jenis_kelamin option[value='" + result.jenis_kelamin + "']").prop('selected', true);
                $("#alamat").val(result.alamat);
            });
            // menampilkan modal update
            $("#modalUpdate").modal('show');
        })

    })
</script>