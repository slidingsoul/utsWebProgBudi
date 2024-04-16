@extends('layout/master')

@section('title', 'Create Portofolio')

@section('content')

<div class="content" style="max-width: 75rem; margin-left: auto; margin-right: auto; margin-top: 5%; margin-bottom: 5%">
  <form method="POST" action="/writeToPortofolio">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required value="{{ $portofolio->name ?? '' }}"> 
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">Gender</label>
      <select class="form-select" id="gender" name="gender" required>
          <option selected disabled value="">Choose...</option>
          <option value="Male" {{ ($portofolio->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
          <option value="Female" {{ ($portofolio->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
      </select>
  </div>
    <div class="mb-3">
        <label for="aboutMe" class="form-label">About Me</label>
        <textarea class="form-control" id="aboutMe" name="aboutMe" rows="3" required >{{ $portofolio->aboutMe ?? '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="telpNum" class="form-label">Telephone Number</label>
        <input type="text" class="form-control" id="telpNum" name="telpNum" required value="{{ $portofolio->telpNum ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="linkedin" class="form-label">LinkedIn</label>
        <input type="url" class="form-control" id="linkedin" name="linkedin" required value="{{ $portofolio->linkedin ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="instagram" class="form-label">Instagram</label>
        <input type="url" class="form-control" id="instagram" name="instagram" required value="{{ $portofolio->instagram ?? '' }}">
    </div>
    <div class="mb-3" id="skill_fields">
      
      <label class="form-label">Skill</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="skillTitle" name="skillTitle" placeholder="Skill Title" required value="{{ $portofolio->skillTitle ?? '' }}">
        <textarea class="form-control" id="skillDesc" name="skillDesc" rows="3" placeholder="Skill Description" required>{{ $portofolio->skillDesc ?? '' }}</textarea>
        
      </div>
      
      
      
  </div>
  <div class="text-end">
    <button type="submit" class="btn btn-success">Generate</button>
  </div>
    
</form>
<div class="text-end">
</div>
<form action="{{ route('main.destroy') }}" method="POST" class="text-end" style="display:inline;">
  @csrf
  @method('DELETE')
  <div class="text-end">
  <button type="submit" class="btn btn-danger" style="margin-top: 1%">Delete</button>
  </div>
</form>
</div>

@endsection