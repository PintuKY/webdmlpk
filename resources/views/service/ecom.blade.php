@extends('layouts.app')

@section('content')

<!--DASHBOARD-->
    <section>
        <div class="tz">
            <!--LEFT SECTION-->

            <!--CENTER SECTION-->
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>{{$service->name}} List</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                           <!--  <h2>Shop Us</h2> -->
                            <!-- <p>Search Your Fav Product </p> -->
                        </div>
                        <div class="tz2-form-pay tz2-form-com">
                            <form class="col s12">
                              <!--   <div class="row">
                                    <div class="input-field col s12">
                                    <input type="text" placeholder="Search Here" name="search">
  
                                    </div>
                                </div><br>  -->
                               @foreach($service->sub_services as $sub_service)
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='{{url('service',$sub_service->slug)}}';" type="button">{{$sub_service->name}}</button>
                                   </div>
                                </div>
                                @endforeach
                            </form>
                        </div>
                
                    </div>
                </div>
            </div>
            <!--RIGHT SECTION-->

        </div>
    </section>
    <!--END DASHBOARD-->

    
@endsection