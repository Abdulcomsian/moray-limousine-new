
<div class="main-panel">
    <div class="content-wrapper pt-0">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card pt-2">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dropdown mt-0 mb-0">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-filter pr-1"></i> FILTER VEHICLES LIST
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="Partners Lists">
                                        <button class="dropdown-item all-vehicles-list bg-dark text-white border border-dark" type="button">All Vehicles List</button>
                                        <button class="dropdown-item pending-vehicles-list bg-dark text-white border border-dark" type="button">Pending Vehicles List</button>
                                        <button class="dropdown-item approved-vehicles-list bg-dark text-white border border-dark" type="button">Approved Vehicles List</button>
                                        <button class="dropdown-item blocked-vehicles-list bg-dark text-white border border-dark" type="button">Disapproved Vehicles List</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h2 class="text-center">VEHICLES LIST</h2>
                            </div>
                            <div class="col-md-4">
                                @if(auth()->user()->user_type !== "admin")
                                    <a href="{{$addVehicleRoute}}">
                                        <button class="btn btn-dark float-right" > Create New Vehicle </button></a>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="img-responsive">
                        <img src="{{asset('images/load.gif')}}" class="img-rounded"  id="loading_gif" alt="loading gif" style=" display: none; position: absolute; width: 95%; height: fit-content; z-index: 10;">
                    </div>
                    <div class="card-body vehicle-content">
                        @include('parshall-views._vehicle-listing-table', ['vehicles' => $vehicles])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 | Moray Limousines </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Moray Limousines <i class="fa fa-car text-danger"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>
