@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Create Staff Member</h2>
	<br/>
  <div class="row">
    <div class="col">
    </div>
    <div class="col-md-8">
      <div id="bleh">
      <form>
        <div class="row">
          <div class="col-md-6">
            <h5 for="clockNumber">Clock Number:</h5>
            <input type="text" class="form-control" required />
          </div>
          <br/>
          <div class="col-md-6">
            <h5>Seniority:</h5>
            <input type="text" class="form-control" id="seniority" required />
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-6">
            <h5>First Name:</h5>
            <input type="text" class="form-control"  required />
          </div>
          <br/>
          <div class="col-md-6">
            <h5>Last Name:</h5>
            <input type="text" class="form-control"  required />
          </div>
        </div>
      <br />
        <button id="staff_btn" name="staff_btn" type="button" class="btn btn-outline-info">
          Add Shift
          <i class="fas fa-plus-circle"></i>
        </button>
        <br/>
        <div id="staffbox">
          <br/>
          <div class="row">
            <div class="col">
              <h5>Shift:</h5>
              <select class="form-control" value='' name="shift" id="shift">
                <option value="">None</option>
              <?php
              foreach (range('A', 'D') as $char) {
              ?>
                <option value="<?= $char ?>"><?=  $char ?></option>
                <?php
                }?>
            </select>
            </div>
            <div class="col">
              <h5>Primary Job:</h5>
              <input type="text" class="form-control" name="primaryJob" id="primaryJob" />
            </div>
          </div>

          <br/>

          <div class="form-group">
              <input type="hidden" value="{{csrf_token()}}" name="_token" />
              <h5>Comments:</h5>
              <textarea type="textarea" class="form-control" name="comments" /></textarea>
          </div>
        </div>
        <br/>
         <button type="submit" class="btn btn-primary">Create</button>

      </form>
    </div>
    </div>
    <div class="col">
    </div>
  </div>
</div>

@endsection
