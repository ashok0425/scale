<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Scaledux - Dashboard</title>
        <!-- Custom fonts for this template-->
        <link
            href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}"
            rel="stylesheet"
            type="text/css"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"
        />
        <!-- Custom styles for this template-->
        <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet" />
        <link
            href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css"
            rel="stylesheet"
        />
        {{-- toastr --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        />
        <style>
            .badge{
                color: #fff!important;
            }
            h3.card-title {
                font-size: 16px !important;
                margin-bottom: 0px !important;
                color: #fff !important;
            }
            h5.card-title {
                font-size: 16px !important;
                margin-bottom: 0px !important;
                color: #fff !important;
            }
            h3,
            h5 {
                font-size: 16px !important;
                color: #fff !important;
            }
            .card-header {
                background: #4e73df !important;
                align-items: center !important;
                color: #fff !important;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            @include('layout.sidebar')
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav
                        class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
                    >
                        <!-- Sidebar Toggle (Topbar) -->
                        <button
                            id="sidebarToggleTop"
                            class="btn btn-sm btn btn-sm btn-link rounded-circle mr-3"
                        >
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="userDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        {{ Auth::user()->name }}
                                    </span>
                                    <img
                                        class="img-profile rounded-circle"
                                        src="img/undraw_profile.svg"
                                    />
                                </a>
                                <!-- Dropdown - User Information -->
                                <div
                                    class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown"
                                >
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        data-toggle="modal"
                                        data-target="#logoutModal"
                                    >
                                        <i
                                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                                        ></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <div class="container">
                        <x-errormsg />
                        @if (Request::segment(2))
                            {{-- Means there is something after /resource --}}
                            <a href="/{{Request::segment(1)}}?type={{request()->query('type')}}" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i>
                                Back
                            </a>
                        @endif

                        @yield('main-content')
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; scaledux.com {{date('Y')}}</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div
            class="modal fade"
            id="logoutModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Select "Logout" below if you are ready to end your current session.
                    </div>
                    <div class="modal-footer">
                        <button
                            class="btn btn-sm btn btn-sm btn-secondary"
                            type="button"
                            data-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <a class="btn btn-sm btn btn-sm btn-primary" href="{{ route('logout') }}">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div
                class="modal fade"
                id="deleteModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalTitle">
                                Are you sure you want to delete this item ?
                            </h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" id="delete_form" class="text-right">
                                @method('DELETE')
                                @csrf
                                <button
                                    type="button"
                                    class="btn btn-sm btn btn-sm btn-secondary btn btn-sm btn-rounded"
                                    data-dismiss="modal"
                                >
                                    &nbsp; No &nbsp;
                                </button>
                                <button class="btn btn-sm btn btn-sm btn-primary btn btn-sm btn-rounded">
                                    &nbsp; Yes &nbsp;
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
        <!-- Page level plugins -->
        <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
        <!-- Page level custom scripts -->
        <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
        @stack('scripts')
        <script>
            $(document).ready(function () {
                    if ($('#summernote').length) {
                     $('#summernote').summernote({
              height: 300,
              toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'video', 'table','linkedImage']],
                ['misc', ['undo', 'redo']],
                ['view', ['fullscreen', 'codeview', 'help']]
              ],
              fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36', '48', '64', '82', '150'],
               fontNames: [
                'Arial', 'Verdana', 'Times New Roman', 'Courier New',
                'Roboto', 'Open Sans', 'Merriweather', 'Lato', 'Montserrat',
                'Inter', 'Hubot Sans', 'Bricolage Grotesque', 'Instrument Serif', 'Playfair Display', 'Raleway'
              ],
               buttons: {
                     linkedImage: function (context) {
    var ui = $.summernote.ui;
    return ui.button({
      contents: '<i class="note-icon-picture"></i> 🔗 Img Link',
      tooltip: 'Insert Linked Image with Alt',
      click: function () {
        const imageUrl = prompt("Enter image URL");
        const linkUrl = prompt("Enter link URL");
        const altText = prompt("Enter alt text for the image");

        if (imageUrl && linkUrl) {
          const html = `<a href="${linkUrl}" target="_blank">
                          <img src="${imageUrl}" alt="${altText || ''}" style="max-width: 100%;" />
                        </a>`;
          context.invoke('editor.pasteHTML', html);
        }
      }
    }).render();
  }

                }
            });
                    }
                });
                        @if (Session::has('message')) //toatser
                            var type = "{{ Session::get('alert-type', 'info') }}"
                            switch (type) {
                                case 'info':
                                    toastr.info("{{ Session::get('message') }}");
                                    break;
                                case 'success':
                                    toastr.success("{{ Session::get('message') }}");
                                    break;
                                case 'warning':
                                    toastr.warning("{{ Session::get('message') }}");
                                    break;
                                case 'error':
                                    toastr.error("{{ Session::get('message') }}");
                                    break;
                            }
                        @endif
        </script>
        <script>
            let delete_rows = document.querySelectorAll('.delete_btn btn-sm ');
            let form = document.querySelector('#delete_form');
            let deleteModal = new bootstrap.Modal(document.getElementById('deleteModal')); // Initialize Bootstrap modal
            delete_rows.forEach(function (ele) {
                ele.addEventListener('click', function (e) {
                    e.preventDefault();
                    let url = ele.href;
                    form.setAttribute('action', url);
                    deleteModal.show(); // Show modal
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const fileInputs = document.querySelectorAll('.file-upload-field');
                fileInputs.forEach(function (fileInput) {
                    fileInput.addEventListener('change', function (event) {
                        const file = event.target.files[0];
                        if (!file) return;
                        // Remove existing preview specific to this input
                        const existingPreview =
                            fileInput.parentNode.querySelector('.preview-image');
                        if (existingPreview) {
                            existingPreview.remove();
                        }
                        // Create and insert new preview
                        const img = document.createElement('img');
                        img.classList.add('preview-image', 'mt-3');
                        img.style.width = '80px';
                        img.src = URL.createObjectURL(file);
                        fileInput.parentNode.appendChild(img);
                    });
                });
            });
        </script>
        <script>
            document.querySelectorAll('[data-toggle]').forEach(function (togglebtn btn-sm ) {
                togglebtn btn-sm .addEventListener('click', function () {
                    const targetId = this.getAttribute('data-toggle');
                    const dropdown = document.getElementById(targetId);
                    if (dropdown) {
                        if (dropdown.classList.contains('d-none')) {
                            dropdown.classList.remove('d-none');
                            dropdown.classList.add('d-block');
                            this.querySelector('.toggle-icon')?.classList.add('rotate-180');
                        } else {
                            dropdown.classList.remove('d-block');
                            dropdown.classList.add('d-none');
                            this.querySelector('.toggle-icon')?.classList.remove('rotate-180');
                        }
                    }
                });
            });
        </script>
    </body>
</html>
