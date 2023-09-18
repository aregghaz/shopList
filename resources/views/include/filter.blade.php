{{-- daily deal section in sidebar starts here--}}
<div class="filter-range-wrapper">
    {{-- Filter Area start here --}}
    <h3>@lang('home.filterOptions')</h3>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">@lang('home.priceRange')</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <span id="filter-price" class="price_histogram">
                       <span class="ui-label">@lang('home.price'):</span>
                       <input class="ui-textfield ui-textfield-system"  name="minPrice" id="filter-price-from" autocomplete="off"  value="{{ isset($_GET['from']) ? $_GET['from'] : ''}}" placeholder="@lang('home.min')"> <span>-</span>
                       <input class="ui-textfield ui-textfield-system"  name="maxPrice" id="filter-price-to" autocomplete="off"  value="{{ isset($_GET['to']) ? $_GET['to'] : ''}}" placeholder="@lang('home.max')" >
                    </span>
                    <a href="javascript:;" class="ui-button narrow-go fal fa-angle-right" id="filter-submit"></a>

                    <hr>
                    <div class="free-shipping tuned-check">
                        <input type="checkbox" id="free_shipping_check">
                        <label for="free_shipping_check">@lang('home.freeShipping')</label>
                    </div>

                    <hr>
                    <div class="rate-in-filter tuned-check">
                        <input type="checkbox" id="rate_in_filter_5">
                        <ul class="feedback-ul">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fal fa-star"></i></li>
                        </ul>
                        <label for="rate_in_filter_5">@lang('home.orMore')</label>
                    </div>

                    <div class="rate-in-filter tuned-check">
                        <input type="checkbox" id="rate_in_filter_4">
                        <ul class="feedback-ul">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fal fa-star"></i></li>
                            <li><i class="fal fa-star"></i></li>
                        </ul>
                        <label for="rate_in_filter_4">@lang('home.orMore')</label>
                    </div>

                    <div class="rate-in-filter tuned-check">
                        <input type="checkbox" id="rate_in_filter_3">
                        <ul class="feedback-ul">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fal fa-star"></i></li>
                            <li><i class="fal fa-star"></i></li>
                            <li><i class="fal fa-star"></i></li>
                        </ul>
                        <label for="rate_in_filter_3">@lang('home.orMore')</label>
                    </div>

                    <div class="rate-in-filter tuned-check">
                        <input type="checkbox" id="rate_in_filter_1">
                        <ul class="feedback-ul">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fal fa-star"></i></li>
                            <li><i class="fal fa-star"></i></li>
                            <li><i class="fal fa-star"></i></li>
                            <li><i class="fal fa-star"></i></li>
                        </ul>
                        <label for="rate_in_filter_1">@lang('home.orMore')</label>
                    </div>

                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse2">Companies</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="tuned-check">
                        <input type="checkbox" id="brand_check_1">
                        <label for="brand_check_1">Adele Soap</label>
                    </div>

                    <div class="tuned-check">
                        <input type="checkbox" id="brand_check_2">
                        <label for="brand_check_2">Belaya Voda</label>
                    </div>

                    <div class="tuned-check">
                        <input type="checkbox" id="brand_check_3">
                        <label for="brand_check_3">Smart Systems</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse3">Collapsible Group 3</a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
        </div>
    </div>

    {{-- Filter Area end here --}}
</div>
{{-- daily deal section in sidebar end here--}}