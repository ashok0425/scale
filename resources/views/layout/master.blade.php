<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="{{ cms('meta_description') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <meta name="keywords" content="cms('meta_keyword')" />

        <link rel="shortcut icon" href="{{ asset(cms('fevicon')) }}" />

        <title>{{ cms()->title }}</title>

        {{-- fontawsome --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        {{-- custom css --}}
        <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet" />


        <link
            href="https://fonts.googleapis.com/css2?family=Inter&family=Hubot+Sans&family=Bricolage+Grotesque&family=Instrument+Serif&family=Playfair+Display&family=Raleway&display=swap"
            rel="stylesheet"
        />

        <style>
            .rotate-180 {
                transform: rotate(180deg);
                transition: transform 0.3s ease;
            }
            ul,
            .submenu {
                list-style: none !important;
            }
            .file-upload-wrapper {
                position: relative;
                width: 100%;
                height: 40px;
                border: 1px solid #17e67e;
            }

            .file-upload-wrapper:after {
                content: attr(data-text);
                font-size: 18px;
                position: absolute;
                top: 0;
                left: 0;
                background: #fff;
                padding: 0px 15px;
                display: block;
                width: calc(100% - 40px);
                pointer-events: none;
                z-index: 20;
                height: 10px;
                line-height: 40px;
                color: #999;
                border-radius: 5px 10px 10px 5px;
                font-weight: 300;
            }

            .file-upload-wrapper:before {
                content: 'Choose file';
                position: absolute;
                top: 0;
                right: 0;
                display: inline-block;
                height: 40px;
                background: #4daf7c;
                color: #fff;
                font-weight: 700;
                z-index: 25;
                font-size: 16px;
                line-height: 40px;
                padding: 0 15px;
                text-transform: uppercase;
                pointer-events: none;
                border-radius: 0 5px 5px 0;
            }

            .file-upload-wrapper:hover:before {
                background: #17e67e;
            }

            .file-upload-wrapper input {
                opacity: 0;
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 99;
                height: 20px;
                margin: 0;
                padding: 0;
                display: block;
                cursor: pointer;
                width: 100%;
            }

            table,
            td,
            tr,
            th {
                border: 0.5px solid rgb(209, 208, 208) !important;
                border-collapse: collapse;
            }
            .card {
                border-top: 5px solid rgb(5, 24, 199);
            }

            .card-header {
                padding: 0.3rem 1rem !important;
                border-radius: 0px !important;
            }

            #myTable_length {
                margin-bottom: 1rem !important;
            }

            .dataTables_wrapper select {
                border: 1px solid #aaa;
                border-radius: 3px;
                padding: 0.4rem 3rem !important;
            }
            .dropdown-menu {
                left: -100px !important;
            }
            .note-editable ul {
                list-style-type: disc !important;
            }
            /* #sidebar,.sidebar{
                background-color: #fff!important;
            }
            .sidebar-link, a.sidebar-link{
                background-color: #fff!important;
                color: #000;
            } */
             a:hover{
                text-decoration: none!important;
             }
        </style>
        @stack('styles')
        <style>
            .flex-wrap{
                display: flex;
                justify-content: space-between;
                padding: 0px!important;
                font-size: 18px!important;

            }
            .flex-wrap.pt-4.pb-4{
                /* padding: 0px!important; */
                padding:1rem .4rem!important;
                padding-bottom: .4rem!important;
            }
            .flex-wrap h4{
                font-size: 16px!important;

            }

        </style>

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
            .toast-success {
  background-color: #0dec3d !important; /* dark background */
  color: #fff !important;            /* white text */
  opacity: 1 !important;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  border-radius: 4px;
}
        </style>
    </head>

    <body>
        <div class="wrapper">
            {{-- include sidebar --}}
            @include('layout.sidebar')

            <div class="main">
                {{-- include header --}}

                @include('layout.header')

                <main class="content">
                    {{-- include breadcrum --}}
                    {{-- Dyanmic content --}}
                    @include('layout.breadcrum')
                    <x-errormsg />
                    @yield('main-content')
                </main>
            </div>
        </div>

        <!-- Modal -->
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
                                    class="btn btn-secondary btn-rounded"
                                    data-dismiss="modal"
                                >
                                    &nbsp; No &nbsp;
                                </button>
                                <button class="btn btn-primary btn-rounded">
                                    &nbsp; Yes &nbsp;
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('admin/js/app.js') }}"></script>


        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"
        ></script>

        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"
        ></script>

        <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
                ['insert', ['link', 'picture', 'video', 'table','linkedImage']],
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
                        tooltip: 'Insert Linked Image',
                        click: function () {
                          const imageUrl = prompt("Enter image URL");
                          const linkUrl = prompt("Enter link URL");
                          if (imageUrl && linkUrl) {
                            const html = `<a href="${linkUrl}" target="_blank"><img src="${imageUrl}" alt="" style="max-width: 100%;" /></a>`;
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
            let delete_rows = document.querySelectorAll('.delete_btn');
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

    fileInputs.forEach(function(fileInput) {
        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (!file) return;

            // Remove existing preview specific to this input
            const existingPreview = fileInput.parentNode.querySelector('.preview-image');
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
            document.querySelectorAll('[data-toggle]').forEach(function (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
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
