<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css')}}"  rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

    @include('admin.layouts.navbar')

    @include('admin.layouts.sidebar')

    <main>
        @yield('content')

    </main>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('admin/assets/js/main.js')}}"></script>

    

</html>
<script>
            // preview image before upload
            const imageInput = document.getElementById('profileImageInput');
            const preview = document.getElementById('profilePreview');

            imageInput.addEventListener('change', function(e) {

                const file = e.target.files[0];

                if (file) {

                    preview.src = URL.createObjectURL(file);

                }

            });

            // delete preview image
            document.getElementById('deletePreviewBtn')
                .addEventListener('click', function() {

                    preview.src = "{{ asset('assets/img/profile-img.jpg') }}";

                    imageInput.value = '';

                });
        </script>