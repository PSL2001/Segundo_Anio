@if (session('errmail'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{session('errmail')}}",
        })
    </script>
@endif
@if (session('infomail'))
<script>
    Swal.fire("{{session('infomail')}}")
    </script>
@endif
