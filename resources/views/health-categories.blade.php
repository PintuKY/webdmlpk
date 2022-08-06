@extends('layouts.app')

@section('content')

<!--DASHBOARD-->
    <section>
        <div class="tz">
            <!--LEFT SECTION-->

            <!--CENTER SECTION-->
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>Health Categories List</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Health Categories </h2>
                            <p>Search Your Fav Hospital, Doctors </p>
                        </div>
            
            <div id="tab-contents">
                  <ul class="tabs">
                    <li data-target="#Hospitals" class="active">Hospitals</li>
                    <li data-target="#Doctors">Doctors</li>
                    <li data-target="#Clinic">Clinic</li>
                    <li data-target="#Health">Health centre</li>
                  </ul>

                  <div class="panel active" id="Hospitals">
                    <p><strong>Hospital Categories </strong></p>
            
            
                    <form class="col-lg-6 col-sm-6">
                                 <div class="row">
                                    <div class="input-field col s12">
                                    <input type="text" placeholder="Search Here" name="search">
  
                                    </div>
                                </div><br> 
                               
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='hospital-name-list';" type="button">Children Hospitals</button>
                                   </div>
                                </div>
                                
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='hospital-name-list';" type="button">ENT Hospitals</button>
                                   </div>
                                </div>
                                
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='hospital-name-list';" type="button">Eye Hospitals</button>
                                   </div>
                                </div>
                
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='hospital-name-list';" type="button"> Multi speciality Hospitals</button>
                                   </div>
                                </div>
                                
                            </form>
                  </div>

                  <div class="panel" id="Doctors">
                    <p><strong>Doctors Categories</strong></p>
                    <form class="col-lg-6 col-sm-6">
                                 <div class="row">
                                    <div class="input-field col s12">
                                    <input type="text" placeholder="Search Here" name="search">
  
                                    </div>
                                </div><br> 
                               
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='doctors-name-list';" type="button">Ayurvedic Doctors</button>
                                   </div>
                                </div>
                                
                               <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='doctors-name-list';" type="button">Cardiologists Doctors</button>
                                   </div>
                                </div>
                                
                                  <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='doctors-name-list';" type="button">Child Specialist Doctors</button>
                                   </div>
                                </div>
                                
                            
                                
                            </form>
                  </div>

                  <div class="panel" id="Clinic">
                    <p><strong>Clinic Details</strong></p>
                    <form class="col-lg-6 col-sm-6">
                                 <div class="row">
                                    <div class="input-field col s12">
                                    <input type="text" placeholder="Search Here" name="search">
  
                                    </div>
                                </div><br> 
                               
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='hospital-name-list';" type="button">Clinic 1</button>
                                   </div>
                                </div>
                                
                               <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='hospital-name-list';" type="button">Clinic 2</button>
                                   </div>
                                </div>
                                
                              
                
                               
                                
                            </form>
                  </div>
                  
                    <div class="panel" id="Health">
                    <p><strong>Health Care Details </strong></p>
                    <form class="col-lg-6 col-sm-6">
                                 <div class="row">
                                    <div class="input-field col s12">
                                    <input type="text" placeholder="Search Here" name="search">
  
                                    </div>
                                </div><br> 
                               
                                <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='hospital-name-list';" type="button">HC 1</button>
                                   </div>
                                </div>
                                
                                    <div class="row" style="padding-top:10px;">
                                    <div class="span9 btn-block">
                                    <button class="btn btn-large btn-block btn-danger" onClick="window.location='hospital-name-list';" type="button">HC 2</button>
                                   </div>
                                </div>
                                
                            
                                
                            </form>
                  </div>
                  
                </div>
            
                
                    </div>
                </div>
            </div>
            <!--RIGHT SECTION-->

        </div>
    </section>
    <!--END DASHBOARD-->
@endsection