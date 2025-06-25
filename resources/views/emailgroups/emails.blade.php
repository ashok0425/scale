@extends('layout.master')
@section('main-content')
<div class="d-flex flex-column-fluid" id="app">
    <div class="container">
        <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between bg-dark text-white">
                        <h5 class="text-white">Email List</h5>
                    <div class="d-flex">
                        <input type="text" v-model="searchQuery" placeholder="Search emails..." @input="fetchEmails" class="form-control mb-3">
                        {{-- @if (!request()->query('group_id'))
                         <div></div>
                         @endif --}}
                    </div>
                </div>

            <div class="card-body">
                <div v-if="selectedEmails.length" class="mb-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#groupModal">
                        Add to Group
                    </button>
                </div>

                <table class="table table-bordered w-100">
                    <thead>
                        <tr>
                           @if (request()->query('group_id'))
                                <th>
                                <input type="checkbox" @change="toggleSelectAll" :checked="isAllCurrentPageSelected">
                            </th>
                           @endif
                            <th>Email</th>
                            <th>Type</th>
                            <th>Group</th>
                            <th>Created AT</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="email in emails" :key="email.id">
                             @if (request()->query('group_id'))
                            <td>
                                <input type="checkbox" :value="email.id"  :checked="selectedEmails.includes(email.id)" @change="toggleSelection(email.id)">
                            </td>
                            @endif
                            <td>@{{ email.email }}</td>
                            <td><span class="badge bg-info text-white">@{{ email.type==1?'Newsletter':'Job Alert' }}</span></td>
                            <td>
                                <span v-for="group in email.groups" class="badge bg-info mx-1 text-white">
                                    @{{group.name}}
                                </span>
                            </td>
                            <td>@{{ email.created_at }}</td>

                        </tr>
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{ disabled: currentPage === 1 }">
                            <a class="page-link" href="#" @click.prevent="changePage(1)">«</a>
                        </li>
                        <li  class="page-item">
                            <a class="page-link" href="#" @click.prevent="changePage(1)">1</a>
                        </li>
                        <li v-if="currentPage > 4" class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                        <li v-for="page in pageNumbersToShow" :key="page" class="page-item" :class="{ active: page === currentPage }">
                            <a class="page-link" href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                        </li>
                        <li v-if="currentPage < totalPages - 3" class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                        <li v-if="currentPage < totalPages - 2" class="page-item">
                            <a class="page-link" href="#" @click.prevent="changePage(totalPages)">@{{ totalPages }}</a>
                        </li>
                        <li class="page-item" :class="{ disabled: currentPage === totalPages }">
                            <a class="page-link" href="#" @click.prevent="changePage(totalPages)">»</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('admin.subscriber.import')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="importModalLabel">Import Subscriber</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                <label for="">Select File</label>
            <input type="file" class="form-control" name="file">
            </div>
            <div class="my-2"><a href="{{asset('subscriber.xlsx')}}" class="text-info text-decoration-none" download="emails">Download sampled file</a></div>
 <div>
                <label for="">Select Group</label>
                <select name="group" id="" class="from-group form-control">
                <option value="">select group</option>
                @foreach (App\Models\EmailGroup::all() as $group)
                 <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Import</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('admin.subscriber.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="CreateModalLabel">Create Subscriber</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                <label for="">Enter Email</label>
            <input type="email" class="form-control" name="email">
            </div>
 <div class="mt-3">
                <label for="">Select Group</label>
                <select name="group" id="" class="from-group form-control">
                <option value="">select group</option>
                @foreach (App\Models\EmailGroup::all() as $group)
                 <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Import</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Add to Group Modal -->
<div class="modal fade" id="groupModal" tabindex="-1" role="dialog" aria-labelledby="groupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form @submit.prevent="submitGroup">
        <div class="modal-header">
          <h5 class="modal-title" id="groupModalLabel">Add Emails to Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div>

    <h6 class="text-warning">Are you sure you want to add emails to this group?</h6>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  new Vue({
    el: '#app',
    data() {
      return {
        emails: [],
        selectedEmails: @json($group?->email_ids)??[],
        currentPage: 1,
        totalPages: 1,
        perPage: 5,
        searchQuery: '',
        selectedGroupId: "{{$group?->id}}",
        groupId: "{{$group?->id}}",
        groups: @json($groups) // ← inject groups from Laravel

      };
    },
    computed: {
      isAllCurrentPageSelected() {
        return this.emails.length > 0 && this.emails.every(email => this.selectedEmails.includes(email.id));
      },
      pageNumbersToShow() {
        const totalNumbers = 5;
        const pages = [];

        let start = Math.max(2, this.currentPage - 2);
        let end = Math.min(this.totalPages - 1, this.currentPage + 2);

        if (this.currentPage <= 3) {
          end = Math.min(totalNumbers, this.totalPages - 1);
        }

        if (this.currentPage >= this.totalPages - 2) {
          start = Math.max(this.totalPages - totalNumbers + 1, 2);
        }

        for (let i = start; i <= end; i++) {
          pages.push(i);
        }

        return pages;
      }
    },
    methods: {
      fetchEmails() {
        axios.get('/api/emails', {
          params: {
            page: this.currentPage,
            perPage: this.perPage,
            search: this.searchQuery
          }
        })
        .then(response => {
          this.emails = response.data.emails.data;
          this.totalPages = response.data.emails.last_page;
          this.currentPage = response.data.emails.current_page;
        })
        .catch(error => {
          console.error('Error fetching emails:', error);
        });
      },

      changePage(page) {
        if (page < 1 || page > this.totalPages) return;
        this.currentPage = page;
        this.fetchEmails();
      },
      toggleSelection(emailId) {
        if (this.selectedEmails.includes(emailId)) {
          this.selectedEmails = this.selectedEmails.filter(id => id !== emailId);
        } else {
          this.selectedEmails.push(emailId);
        }
      },
      toggleSelectAll() {
        const idsOnPage = this.emails.map(e => e.id);
        const allSelected = idsOnPage.every(id => this.selectedEmails.includes(id));
        if (allSelected) {
          this.selectedEmails = this.selectedEmails.filter(id => !idsOnPage.includes(id));
        } else {
          this.selectedEmails = [...new Set([...this.selectedEmails, ...idsOnPage])];
        }
      },
      submitGroup(e) {
        e.preventDefault();
        if (!this.selectedGroupId) {
          alert('Please select a group.');
          return;
        }

        axios.post('/api/emails/add-to-group', {
          group_id: this.selectedGroupId,
          email_ids: this.selectedEmails
        })
        .then(response => {
          alert(response.data.message);
          $('#groupModal').modal('hide');
          this.selectedEmails = [];
          this.selectedGroupId = '';
          this.fetchEmails();
        })
        .catch(error => {
          console.error('Error adding to group:', error);
          alert('Something went wrong.');
        });
      }
    },
    mounted() {
      this.fetchEmails();
    }
  });
</script>
@endpush
