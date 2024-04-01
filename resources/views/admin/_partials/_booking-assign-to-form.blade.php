<form id="bookingAssignForm" method="post" class="mb-5" action="{{route('assignBooking')}}">
    @csrf
    <input type="hidden" name="booking_id" value="{{$booking_id}}">
    <div class="row justify-content-center">
        @if($assignTo == 1) {{-- 1 for driver --}}
        <input type="hidden" name="type" value="driver">
        <div class="col-md-4">
            <label for="vehicle">Select Vehicle: </label>
            <select data-placeholder="Select Vehicle" class="assign-booking" id="vehicle" name="vehicle_id">
                <option></option>
                @foreach($vehicles as $vehicle)
                    <option value="{{$vehicle->id}}">{{$vehicle->title}} - {{$vehicle->plate}}</option>
                @endforeach
            </select>
            @include('admin._partials._error-feedback', ['message' => 'Please select Vehicle'])
        </div>
        <div class="col-md-4">
            <label for="drivers">Select Drivers: </label>
            <select data-placeholder="Select Drivers" multiple id="drivers" class="assign-booking" name="driver_id[]">
                <option></option>
                @foreach($drivers as $driver)
                    <option value="{{$driver->id}}">{{$driver->userName()}}</option>
                @endforeach
            </select>
            @include('admin._partials._error-feedback', ['message' => 'Please select at least one Driver'])
        </div>
        @elseif($assignTo == 2) {{-- 2 for partners --}}
        <input type="hidden" name="type" value="partner">
        <div class="col-md-4">
            <label for="partner">Select Partners: </label>
            <select data-placeholder="Select Partner" multiple  class="assign-booking" id="partner" name="partner_id[]">
                <option></option>
                @foreach($partners as $partner)
                    <option value="{{$partner->id}}">{{$partner->userName()}}</option>
                @endforeach
            </select>
            @include('admin._partials._error-feedback', ['message' => 'Please select Partner'])
        </div>
        <div class="col-md-4">
                <label for="commission">Enter Commission(%):</label>
                <input type="number" step="0.01" min="0" max="100" placeholder="Booking Commission" class="form-control assign-booking" id="commission" name="commission">
            @include('admin._partials._error-feedback', ['message' => 'Please enter commission'])
        </div>
        @endif
        <div class="col-md-3">
            <label class="d-block">&nbsp;</label>
            <input type="submit" class="btn btn-dark" value="Assign">
        </div>
    </div>
</form>
