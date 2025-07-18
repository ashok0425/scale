@extends('layout.master')

@push('styles')
<style>
    #step-details, #step-email-editor { display: none; }

    /* Loader overlay styles */
    .loader-overlay {
        position: fixed;
        top: 0; left: 0;
        width: 100vw; height: 100vh;
        background: rgba(255,255,255,0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1050; /* Above bootstrap modal */
        display: none;
    }
    .loader-overlay.active {
        display: flex;
    }
    .spinner-border {
        width: 3rem;
        height: 3rem;
    }
    #editor .sc-fFoeYl{
        display: none!important;
        visibility: hidden!important;
    }

</style>
@endpush
@section('main-content')
<div id="app">
    <!-- Loader -->
    <div class="loader-overlay" :class="{active: loading}">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header d-flex justify-content-between align-items-center bg-dark ">
                    <div class="card-title">
                        <h5 class="text-white">Create Campaign</h5>
                    </div>
                    <div class="card-toolbar">
                        <a class="btn btn-sm  mr-10 text-white" href="{{ route('admin.campaigns.index') }}">Cancel</a>
                        <button class="btn btn-sm  btn btn-sm -info  d-none" id="backbtn btn-sm " @click="prevStep">Back</button>
                        <button class="btn btn-sm  btn btn-sm -info " id="nextbtn btn-sm " @click="nextStep">Next</button>
                        <button class="btn btn-sm  btn btn-sm -info  d-none" id="savebtn btn-sm " @click="submitForm(false)">Save</button>
                        <button class="btn btn-sm  btn btn-sm -info " type="button" v-if="showTestMailButton" @click="openTestEmailModal">Test Mail</button>
                    </div>
                </div>

                <div class="card-body">
                    <form id="form" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf

                        <!-- STEP 1 -->
                        <div id="step-subject">
                            <div class="form-group">
                                <label class="col-form-label h4">Select User Group</label>
                                <div>
                                    <select name="group_ids[]" multiple class="form-control">
                                        <option value="">Select group</option>
                                        @foreach (App\Models\EmailGroup::all() as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- STEP 2 -->
                        <div id="step-details">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label h4">Title</label>
                                    <div>
                                        <input type="text" class="form-control" v-model="title" required placeholder="Enter internal campaign title">
                                    </div>
                                </div>

                                {{-- <div class="form-group col-md-6">
                                    <label class="col-form-label h4">Subject Title</label>
                                    <div>
                                        <input type="text" class="form-control" v-model="emailSubject" required placeholder="Enter email subject">
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group col-md-6">
                                    <label class="col-form-label h4">Thumbnail</label>
                                    <div>
                                        <input type="file" class="form-control-file form-control" @change="handleImageUpload">
                                    </div>
                                </div> --}}

                                <div class="form-group col-md-6">
                                    <label class="col-form-label h4">Schedule Date & Time</label>
                                    <div>
                                        <input type="datetime-local" class="form-control" v-model="scheduleAt">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- STEP 3 -->
                        <div id="step-email-editor">
                            <div id="editor" style="height: 70vh;"></div>
                        </div>

                        <input type="hidden" name="email_html" v-model="emailContent" id="email_html">
                        <input type="hidden" name="email_json" v-model="emailJson" id="email_json">

                        <input type="hidden" name="design_json" id="design_json">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Test Email Modal -->
    <div class="modal fade" id="testEmailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Test Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="sendTestEmail">
                        <div class="form-group">
                            <label>Enter Email Address</label>
                            <input type="email" class="form-control" v-model="testEmail" required placeholder="Recipient email">
                        </div>
                        <button type="submit" class="btn btn-sm  btn btn-sm -primary" :disabled="loading">
                            <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Send Test Email
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://editor.unlayer.com/embed.js"></script>

<script>
    const app = new Vue({
        el: '#app',
        data: {
            title: '',
            emailSubject: '',
            emailContent: '',
            emailJson: '',
            testEmail: '',
            scheduleAt: '',
            titleImage: null,
            showTestMailButton: false,
            currentStep: 1,
            campaign_id:null,
            loading: false
        },
        methods: {
            nextStep() {
                if (this.currentStep === 1) {
                    document.getElementById('step-subject').style.display = 'none';
                    document.getElementById('step-details').style.display = 'block';
                    document.getElementById('backbtn btn-sm ').classList.remove('d-none');
                    this.currentStep++;
                } else if (this.currentStep === 2) {
                    if (!this.title.trim()) {
                        alert('Please enter both Title and Subject.');
                        return;
                    }
                    document.getElementById('step-details').style.display = 'none';
                    document.getElementById('step-email-editor').style.display = 'block';
                    document.getElementById('nextbtn btn-sm ').classList.add('d-none');
                    document.getElementById('savebtn btn-sm ').classList.remove('d-none');
                    this.showTestMailButton = true;
                    this.currentStep++;
                }
            },
            prevStep() {
                if (this.currentStep === 2) {
                    document.getElementById('step-details').style.display = 'none';
                    document.getElementById('step-subject').style.display = 'block';
                    document.getElementById('backbtn btn-sm ').classList.add('d-none');
                    this.currentStep--;
                } else if (this.currentStep === 3) {
                    document.getElementById('step-email-editor').style.display = 'none';
                    document.getElementById('step-details').style.display = 'block';
                    document.getElementById('nextbtn btn-sm ').classList.remove('d-none');
                    document.getElementById('savebtn btn-sm ').classList.add('d-none');
                    this.showTestMailButton = false;
                    this.currentStep--;
                }
            },
            handleImageUpload(event) {
                this.titleImage = event.target.files[0];
            },
            submitForm(is_draft=false) {
                if(!is_draft){
                this.loading = true;
                }
                unlayer.exportHtml((data) => {
                    this.emailContent = data.html;
                    this.emailJson = data.design

                    this.submitNewsletter(is_draft);
                });
            },
            submitNewsletter(is_draft=false) {
                const formData = new FormData();
                formData.append('title', this.title);
                formData.append('subject', this.emailSubject);
                formData.append('htmlContent', this.emailContent);
                formData.append('emailJson', JSON.stringify(this.emailJson));
                formData.append('schedule_at', this.scheduleAt);
                formData.append('is_draft', is_draft);
                formData.append('campaign_id', this.campaign_id);
                if (this.titleImage) {
                    formData.append('title_image', this.titleImage);
                }

                const selectedGroups = Array.from(document.querySelectorAll('select[name="group_ids[]"] option:checked')).map(option => option.value);
                formData.append('group_ids', JSON.stringify(selectedGroups));

                axios.post('/campaigns', formData)
                    .then(response => {
                        this.loading = false;
                        this.campaign_id=response.data.campaign_id;
                        if(!is_draft){
                        alert('Newsletter saved successfully!');
                        window.location.href = '/campaigns';

                        }
                    })
                    .catch(error => {
                        this.loading = false;
                        console.error(error);
                         if(!is_draft){
                        alert('Failed to save newsletter.');
                         }
                    });
            },
            openTestEmailModal() {
                $('#testEmailModal').modal('show');
            },
            sendTestEmail() {
                this.loading = true;
                unlayer.exportHtml((data) => {
                    this.emailContent = data.html;
                    this.emailJson = data.design;


                    const formData = new FormData();
                    formData.append('email', this.testEmail);
                    formData.append('title', this.title);

                    formData.append('subject', this.emailSubject);
                    formData.append('htmlContent', this.emailContent);
                    formData.append('emailJson', this.emailJson);


                    axios.post('/send-test-email', formData)
                        .then(response => {
                            this.loading = false;
                            alert('Test email sent!');
                            $('#testEmailModal').modal('hide');
                        })
                        .catch(error => {
                            this.loading = false;
                            console.error(error);
                            alert('Error sending test email.');
                        });
                });
            }
        },
        mounted() {
            unlayer.init({
                id: 'editor',
                displayMode: 'email',
                projectId: 272719
            });

             setInterval(() => {
                if(!this.loading){
            this.submitForm(true);
                }
        }, 10000);
        }
    });
</script>
@endpush
