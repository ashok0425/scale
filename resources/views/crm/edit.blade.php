@extends('layout.master')
@section('main-content')

<div class="card">
    <div class="bg-dark  card-header d-flex justify-content-between">
        <h5 class="card-title text-white">Edit Info</h5>
    </div>

    <div class="card-body">
        <div class="container">
            <form action="{{ route('crm.update', ['id'=>$crm]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PATCH') --}}

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Enter your full name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $crm->name ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label>Email ID</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $crm->email ?? '') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Phone number</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $crm->phone ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label>Select your role</label>
                        <select class="form-control" name="role">
                            <option value="">Select Role</option>
                            <option value="founder" {{ old('role', $crm->role ?? '') == 'founder' ? 'selected' : '' }}>Founder</option>
                            <option value="freelancer" {{ old('role', $crm->role ?? '') == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
                            <option value="investor" {{ old('role', $crm->role ?? '') == 'investor' ? 'selected' : '' }}>Investor</option>
                            <option value="mentor" {{ old('role', $crm->role ?? '') == 'mentor' ? 'selected' : '' }}>Mentor</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label>Expertise</label>
                        <select class="form-control" name="expertise">
                            <option value="">Select Expertise</option>
                            <option value="tech" {{ old('expertise', $crm->expertise ?? '') == 'tech' ? 'selected' : '' }}>Tech</option>
                            <option value="marketing" {{ old('expertise', $crm->expertise ?? '') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="finance" {{ old('expertise', $crm->expertise ?? '') == 'finance' ? 'selected' : '' }}>Finance</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Speciality</label>
                        <select class="form-control" name="specialist">
                            <option value="">Select Speciality</option>
                            <option value="ai" {{ old('specialist', $crm->specialist ?? '') == 'ai' ? 'selected' : '' }}>AI</option>
                            <option value="design" {{ old('specialist', $crm->specialist ?? '') == 'design' ? 'selected' : '' }}>Design</option>
                            <option value="product" {{ old('specialist', $crm->specialist ?? '') == 'product' ? 'selected' : '' }}>Product</option>
                        </select>
                    </div>

                <div class="mb-3 col-md-6">
                    <label>LinkedIn profile URL (optional)</label>
                    <input type="url" class="form-control" name="linkedin" value="{{ old('linkedin', $crm->linkedin ?? '') }}">
                </div>

                <div class="mb-3 col-md-6">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city', $crm->city ?? '') }}">
                </div>
                </div>

                <div class="mb-3">
                    <label>What challenges do you face...?</label>
                    <textarea class="form-control" name="message" rows="2">{{ old('message', $crm->message ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label>What excites you about ScaleDux?</label>
                    <textarea class="form-control" name="what_excited" rows="1">{{ old('what_excited', $crm->what_excited ?? '') }}</textarea>
                </div>

                <div class="">
                    <label ><input type="checkbox" value="1" name="show_on_frontend" {{$crm->show_on_frontend?'checked':''}}> Show on Frontend</label>
                </div>

                   @if (Request::segment(2))
                    {{-- Means there is something after /resource --}}
                    <a
                        href="/{{ Request::segment(1) }}?type={{ request()->query('type') }}"
                        class="btn btn-secondary btn-sm"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                @endif
                <button type="submit" class="btn btn-sm  btn btn-sm btn-primary">Update Info</button>

            </form>
        </div>
    </div>
</div>

@endsection
