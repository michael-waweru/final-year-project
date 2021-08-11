{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.0/sweetalert2.min.js"
integrity="sha512-+dw5OaugLkFBeUC/lnMnX3HRt/xLOMfL5FkdGu0mzvEP18npZHwTgtdVc9WCuSdKYgikRXFhgD5MqliMq8ufrA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

<script>
    $(function(){

        @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get("error") }}'
        })
        @endif

        @if(Session::has('success'))
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get("success") }}',
            showConfirmButton: false,
            timer: 3500
        })
        @endif

        @if(Session::has('warning'))
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: '{{ Session::get("warning") }}'
        })
        @endif

        @if(Session::has('info'))
        Swal.fire({
            icon: 'info',
            title: 'Oops...',
            text: '{{ Session::get("info") }}',
            showConfirmButton: false,
            timer: 3500
        })
        @endif

    });
</script>
