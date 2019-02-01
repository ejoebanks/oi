@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="container">
      <form class="form-horizontal" role="form" method="POST" action="{{ action('OrderController@update',$order->id) }}">
           {!! csrf_field() !!}
           <input type="hidden" name="_method" value="PATCH">
           <div class="form-group">
               <input type="hidden" value="{{csrf_token()}}" name="_token" />
               <label for="horsename">Horse Name:</label>
               <input type="text" class="form-control" name="horsename" value="{{ $order->horsename }}" />
           </div>

        <div class="form-group">
            <label for="serviceid">Service:</label>
                <select class="form-control" value='{{ $order->servname }}' name="serviceid" id="serviceid">
                      <option value="{{ $order->serviceid }}">{{ $order->servname }}</option>
                    <?php  $services = \DB::table('services')
                                  ->select('services.*')
                                  ->get(); ?>

                  <?php
                  $selected = "";
    foreach ($services as $service) {
        if ($service->id == $order->serviceid) {
            $selected = "selected";
        } else {
            $selected = "";
        } ?>
                        <option {{ $selected }} value="<?= $service->id ?>"><?= $service->servicename ?></option>
                    <?php
    } ?>

            </select>
          </div>
          <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
              <label for="employeeid">Employee:</label>
              <select class="form-control" value="{{ $order->employeeid }}" name="employeeid" >
                <?php
                    $users = DB::table('users')
                      ->where('users.type', '!=', '0')
                      ->distinct()
                      ->get(); ?>
                    <option value="">None</option>
              <?php
              foreach ($users as $uid) {
                  if ($uid->id == $order->employeeid) {
                      $selected = "selected";
                  } else {
                      $selected = "";
                  } ?>

                    <option {{ $selected }} value="<?= $uid->id ?>"><?= $uid->firstname, " ".$uid->lastname ?></option>
                <?php
              } ?>
          </select>
        </div>

            <div class="form-group">
                <label for="clientid">Client:</label>
                <select class="form-control" value="clientid" name="clientid" id="clientid" required>
                  <?php
                      $clients = DB::table('users')
                        //->where('users.type', '=', '0')
                        ->distinct()
                        ->get(); ?>
                      <option value="">None</option>

                <?php
                $selected = "";
    foreach ($clients as $client) {
        if ($client->id == $order->clientid) {
            $selected = "selected";
        } else {
            $selected = "";
        } ?>
                      <option {{ $selected }} value="<?= $client->id ?>"><?= $client->firstname. " ".$client->lastname ?></option>
                  <?php
    } ?>

            </select>
          </div>
              <div class="form-group">
                  <label for="locationid">Location:</label>
                  <select class="form-control" value="locationid" name="locationid" >
                    <?php
                        $locations = DB::table('locations')
                          ->distinct()
                          ->get(); ?>
                        <option value="">None</option>

                  <?php foreach ($locations as $loc) {
                              if ($loc->id == $order->locationid) {
                                  $selected = "selected";
                              } else {
                                  $selected = "";
                              } ?>
                        <option {{ $selected }} value="<?= $loc->id ?>"><?= $loc->address.", ".$loc->city.", ".$loc->state ?></option>
                    <?php
                          } ?>
              </select>
            </div>

                <div class="form-group">
                    <label for="buildingid">Building:</label>
                    <input id="buildingid" name="buildingid" value="{{ $order->buildingid }}"type="text" placeholder="Building" class="form-control input-md">
              </div>
                  <div class="form-group">
                      <label for="stablenumber">Stable:</label>
                          <input class="form-control" value="{{ $order->stablenumber }}" name="stablenumber" id="stablenumber">
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="scheduledtime">Scheduled Time:</label>
                            <input class="form-control" value="{{ $order->scheduledtime }}" name="scheduledtime" id="scheduledtime">
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="comments">Comments:</label>
                              <input class="form-control" value="{{ $order->comments }}" name="comments" id="comments">
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="color">Color:</label>
                                <input class="form-control" value="{{ $order->color }}" name="color" id="color">
                            </select>
                          </div>
                          <div class="form-group">
                              <label for="tied">Tied:</label>
                                  <select required name="tied" id="tied" class="form-control">
                                    <option value="{{ $order->tied }}">{{ $order->tied }}</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                  </select>
                              </select>
                            </div>

                      <div class="form-group">
                          <label for="status">Status:</label>
                              <input class="form-control" value="{{ $order->status }}" name="status" id="status">
                        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
