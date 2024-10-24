<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('assetsAdmin/js') }}/jquery.min.js"></script>
<script src="{{ asset('assetsAdmin/js') }}/jquery-ui.js"></script>
<script src="{{ asset('assetsAdmin/js') }}/bootstrap.min.js"></script>
<script src="{{ asset('assetsAdmin/js') }}/adminlte.min.js"></script>
<script src="{{ asset('assetsAdmin/js') }}/dashboard.js"></script>
<script src="{{ asset('assetsAdmin/tinymce') }}/tinymce.min.js"></script>
<script src="{{ asset('assetsAdmin/tinymce') }}/config.js"></script>
<script src="{{ asset('assetsAdmin/js') }}/function.js"></script>
<script src="{{ asset('assetsAdmin/js') }}/sweetalert2.all.js"></script>

<script>
    // import Swal from 'sweetalert2/dist/sweetalert2.js';
    const handleDelete = async () => {
        const formElem = document.querySelectorAll('#form-delete');
        formElem.forEach(item => {
            item.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa không!?',
                    showCancelButton: true,
                    confirmButtonText: `Tiếp tục`,
                    denyButtonText: `Hủy`,
                }).then((result) => {
                    if (result.value) {
                        e.target.submit();
                    }
                });
            })

        });
    }
    handleDelete()
</script>
