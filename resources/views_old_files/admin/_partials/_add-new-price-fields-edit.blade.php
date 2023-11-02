<div class="row price-wrapper mt-3 last" data-number="{{isset($number) ? $number+1 : '1'}}">
    <div class="col-md-4">
        <div class="form-group">
            <label for="from{{$unit}}_{{$number}}">From: ( {{$unit}} )</label>
            <input id="from{{$unit}}_{{$number}}" name="from[]" class="form-control need-validation from" type="number" min="0" step="0.01" placeholder="From" value="{{isset($price) ? $price->from : ''}}">
            @include('admin._partials._error-feedback', ['message' => 'Valid From price is required'])
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="to{{$unit}}_{{$number}}">To: ( {{$unit}} )</label>
            <input id="to{{$unit}}_{{$number}}" name="to[]" class="form-control need-validation to" type="number" min="0" step="0.01" placeholder="To"  value="{{isset($price) ? $price->to : ''}}">
            @include('admin._partials._error-feedback', ['message' => 'Valid To price is required'])
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="price" for="priceIn{{$unit}}_{{$number}}"> {{$price->is_price_fixed ? 'Fixed Price' : 'Price / '.$unit}}: </label>
            <input id="priceIn{{$unit}}_{{$number}}" name="price[]" class="form-control need-validation" type="number" min="0" step="0.01" placeholder="Price" value="{{$price->is_price_fixed ? $price->fixed_price : $price->base_price}}">
            @include('admin._partials._error-feedback', ['message' => 'Valid price is required'])
        </div>
    </div>
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <div class="d-inline-block">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="is_price_fixed[]" value="{{$price->is_price_fixed ? '1' : '0'}}">
                    <input type="checkbox" {{$price->is_price_fixed ? 'checked' : ''}} data-unit="Price / {{$unit}}" class="custom-control-input is_price_fixed" id="fixedPrice_{{$unit}}_{{$number}}">
                    <label class="custom-control-label" for="fixedPrice_{{$unit}}_{{$number}}">Price Fixed?</label>
                </div>
            </div>
            @if(isset($wrapper))
                <span class="d-inline-block action-button add-price-fields" data-price-unit="{{$unit}}"
                      data-number="{{isset($number) ? $number : '1'}}">
                    <i class="fa fa-plus-circle fa-2x"></i>
                </span>
            @else
                <span class="d-inline-block action-button remove-price-fields" data-price-unit="{{$unit}}"
                      data-number="{{isset($number) ? $number : '1'}}">
                    <i class="fa fa-minus-circle text-danger fa-2x"></i>
                </span>
            @endif
        </div>
    </div>
</div>
