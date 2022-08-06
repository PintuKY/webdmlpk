@extends('layouts.app')

@section('content')

<!--DASHBOARD-->
    <section>
        <div class="tz">
            <!--LEFT SECTION-->

            <!--CENTER SECTION-->
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>Service Providers Categories List</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Service Providers List Details</h2>
                            <p>Search Man power service, Estate service,Plumber </p>
                        </div>
                        <div class="tz2-form-pay tz2-form-com">
                            <form class="col s12">
                                 <div class="row">
                                    <div class="input-field col s12">
                                    <input type="text" placeholder="Search Here" name="search">
  
                                    </div>
                                </div><br> 
                               
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='service-name-list';" type="button">Man power service</button>
                                   </div>
                                </div>
                                
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='service-name-list';" type="button">Estate service</button>
                                   </div>
                                </div>
                                
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='service-name-list';" type="button">Plumber</button>
                                   </div>
                                </div>
                                
                                
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='service-name-list';" type="button">Painters</button>
                                   </div>
                                </div>
                            
                            
                                
                    
                                
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