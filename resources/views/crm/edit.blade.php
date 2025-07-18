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
                    <div class="col-md-6">
                        <label>Expertise</label>
                        <select class="form-control" name="expertise">
                            <option value="">Select Expertise</option>
                            <option value="tech" {{ old('expertise', $crm->expertise ?? '') == 'tech' ? 'selected' : '' }}>Tech</option>
                            <option value="marketing" {{ old('expertise', $crm->expertise ?? '') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="finance" {{ old('expertise', $crm->expertise ?? '') == 'finance' ? 'selected' : '' }}>Finance</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Speciality</label>
                        <select class="form-control" name="speciality">
                            <option value="">Select Speciality</option>
                            <option value="ai" {{ old('speciality', $crm->speciality ?? '') == 'ai' ? 'selected' : '' }}>AI</option>
                            <option value="design" {{ old('speciality', $crm->speciality ?? '') == 'design' ? 'selected' : '' }}>Design</option>
                            <option value="product" {{ old('speciality', $crm->speciality ?? '') == 'product' ? 'selected' : '' }}>Product</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label>LinkedIn profile URL (optional)</label>
                    <input type="url" class="form-control" name="linkedin" value="{{ old('linkedin', $crm->linkedin ?? '') }}">
                </div>

                <div class="mb-3">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city', $crm->city ?? '') }}">
                </div>

                <div class="mb-3">
                    <label>What challenges do you face...?</label>
                    <textarea class="form-control" name="challenges" rows="4">{{ old('challenges', $crm->challenges ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label>What excites you about ScaleDux?</label>
                    <textarea class="form-control" name="excitement" rows="3">{{ old('excitement', $crm->excitement ?? '') }}</textarea>
                </div>



                <button type="submit" class="btn btn-sm  btn btn-sm -primary">Update Info</button>
            </form>
        </div>
    </div>
</div>

@endsection
