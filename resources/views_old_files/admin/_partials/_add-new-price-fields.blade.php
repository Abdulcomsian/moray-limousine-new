<div class="row price-wrapper mt-3 last" data-number="{{isset($number) ? $number+1 : '1'}}">
    <div class="col-md-4">
        <div class="form-group">
            <label for="from{{$unit}}_{{$number}}">From: ( {{$unit}} )</label>
            <input id="from{{$unit}}_{{$number}}" name="from[]" class="form-control need-validation from" type="number" min="0" step="0.01" placeholder="From">
            @include('admin._partials._error-feedback', ['message' => 'Valid From price is required'])
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="to{{$unit}}_{{$number}}">To: ( {{$unit}} )</label>
            <input id="to{{$unit}}_{{$number}}" name="to[]" class="form-control need-validation to" type="number" min="0" step="0.01" placeholder="To">
            @include('admin._partials._error-feedback', ['message' => 'Valid To price is required'])
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="price" for="priceIn{{$unit}}_{{$number}}"> Price / {{$unit}}: </label>
            <input id="priceIn{{$unit}}_{{$number}}" name="price[]" class="form-control need-validation" type="number" min="0" step="0.01"placeholder="Price">
            @include('admin._partials._error-feedback', ['message' => 'Valid price is required'])
        </div>
    </div>
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <div class="d-inline-block">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="is_price_fixed[]" value="0">
                    <input type="checkbox" data-unit="Price / {{$unit}}" class="custom-control-input is_price_fixed" id="fixedPrice_{{$unit}}_{{$number}}">
                    <label class="custom-control-label" for="fixedPrice_{{$unit}}_{{$number}}">Price Fixed?</label>
                </div>
            </div>
            <span class="d-inline-block action-button" onclick="$(this).parents('.price-wrapper').remove()" data-price-unit="{{$unit}}"
                  data-number="{{isset($number) ? $number+1 : '1'}}">
                <i class="fa fa-minus-circle text-danger fa-2x"></i>
            </span>
        </div>
    </div>
</div>
