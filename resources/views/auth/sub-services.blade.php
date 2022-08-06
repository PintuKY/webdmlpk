<div class="sub_services">

  @if(count($services1))
    @foreach($services1 as $service)
    <div class="row">
      <input type="radio" id="service{{$service->id}}" class="input-field col s12" name="service_id" value="{{$service->id}}">
      <label for="service{{$service->id}}" class="form-check-label">{{$service->name}}</label>
    </div>
    @endforeach
  @endif
</div>