@extends("layouts.singleProduct")
@section("content")
    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area">
        <div class="custom-container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-area">
                        <h2>{{ $category_name }}</h2>
                        <ul>
                            <li><i class="fal fa-home"></i><a href="/"></a> / </li>
                            <li><a href="#">{{ $category_name }}</a></li>
                            <li>@if(!empty($subCategory_name))
                                    /  {{ $subCategory_name }}
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- Product Details1 Area Start Here -->
    <div class="product-details1-area">
        <div class="custom-container">
            <div class="inner-shop-details">
                <div class="product-details-info-area">
                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <div class="inner-product-details-left">
                                <ul>
                                    @if(gettype($product->images) =='string')
                                        <li class="active">
                                            <a href="#related1" data-toggle="tab" aria-expanded="false">
                                                <img alt="{{ $product->description }}"
                                                     src="{{'/img/products/'.$product->images}}" class="img-responsive">
                                            </a>
                                        </li>
                                    @else
                                        <li class="active">
                                            <a href="#related1" data-toggle="tab" aria-expanded="false">
                                                <img alt="{{ $product->description }}"
                                                     src="{{'/img/products/'.$product->images[0]}}"
                                                     class="img-responsive">
                                            </a>
                                        </li>
                                        @if(isset($product->images[1]))
                                            <li>
                                                <a href="#related2" data-toggle="tab" aria-expanded="false">
                                                    <img alt="{{ $product->description }}"
                                                         src="{{'/img/products/'.$product->images[1]}}"
                                                         class="img-responsive">
                                                </a>
                                            </li>
                                        @endif
                                        @if(isset($product->images[2]))
                                            <li>
                                                <a href="#related3" data-toggle="tab" aria-expanded="false">
                                                    <img alt="{{ $product->description }}"
                                                         src="{{'/img/products/'.$product->images[2]}}"
                                                         class="img-responsive">
                                                </a>
                                            </li>
                                        @endif
                                        @if(isset($product->images[3]))
                                            <li>
                                                <a href="#related4" data-toggle="tab" aria-expanded="false">
                                                    <img alt="{{ $product->description }}"
                                                         src="{{'/img/products/'.$product->images[3]}}"
                                                         class="img-responsive">
                                                </a>
                                            </li>
                                        @endif
                                        @if(isset($product->images[4]))
                                            <li>
                                                <a href="#related5" data-toggle="tab" aria-expanded="false">
                                                    <img
                                                         src="{{'/img/products/'.$product->images[4]}}"
                                                         class="img-responsive">
                                                </a>
                                            </li>
                                        @endif
                                        @if(isset($product->images[5]))
                                            <li>
                                                <a href="#related6" data-toggle="tab" aria-expanded="false">
                                                    <img
                                                         src="{{'/img/products/'.$product->images[5]}}"
                                                         class="img-responsive">
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                                <div class="tab-content">
                                    @if(gettype($product->images) =='string')
                                        <div class="tab-pane fade active in tiles" id="related1">
                                            <a href="#" class="tile" data-scale="2.4" data-image="{{'/img/products/'.$product->images}}">
                                                <img
                                                                              src="{{'/img/products/'.$product->images}}"
                                                                              class="img-responsive"></a>
                                        </div>
                                    @else
                                        @if(isset($product->images[0]))
                                        <div class="tab-pane fade active in tiles" id="related1">
                                            <a href="#" ><img
                                                                              src="{{'/img/products/'.$product->images[0]}}"
                                                                              class="img-responsive"></a>
                                        </div>
                                        @endif
                                        @if(isset($product->images[1]))
                                            <div class="tab-pane fade tiles" id="related2">
                                                <a href="#" ><img
                                                                                  src="{{'/img/products/'.$product->images[1]}}"
                                                                                  class="img-responsive"></a>
                                            </div>
                                        @endif
                                        @if(isset($product->images[2]))
                                            <div class="tab-pane fade tiles" id="related3">
                                                <a href="#" ><img alt="{{ $product->description }}"
                                                                                  src="{{'/img/products/'.$product->images[2]}}"
                                                                                  class="img-responsive"></a>
                                            </div>
                                        @endif
                                            @if(isset($product->images[3]))
                                            <div class="tab-pane fade tiles" id="related4">
                                                <a href="#" ><img
                                                                                  src="{{'/img/products/'.$product->images[3]}}"
                                                                                  class="img-responsive"></a>
                                            </div>
                                        @endif
                                        @if(isset($product->images[4]))
                                            <div class="tab-pane fade tiles" id="related5">
                                                <a href="#" ><img
                                                                                  src="{{'/img/products/'.$product->images[4]}}"
                                                                                  class="img-responsive"></a>
                                            </div>
                                        @endif @if(isset($product->images[5]))
                                            <div class="tab-pane fade tiles" id="related6">
                                                <a href="#" ><img
                                                                                  src="{{'/img/products/'.$product->images[5]}}"
                                                                                  class="img-responsive"></a>
                                            </div>
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <div class="inner-product-details-right info-panel">
                                <h1><?php
                                    $lang = Session::get('applocale');
                                    if ($lang == 'am') {
                                        echo $product->productName->nameAm;
                                    } else if ($lang == 'ru') {
                                        echo $product->productName->nameRu;
                                    } else if ($lang == 'en') {
                                        echo $product->productName->nameEn;

                                    }
                                    ?>
                                </h1>
                                <p class="price">
                                    <span class="total-amount">{{ $product->price }}</span> @lang('home.amd')
                                </p>
                                <ul class="single-feedback-ul">
                                    @for($i=1; $i<=5; $i++)
                                            @if(isset($product->averangeStars))
                                                @if($i <= $product->averangeStars->rate)
                                                    <li><i class="fas fa-star"></i></li>

                                                @else
                                                    <li><i class="fal fa-star"></i></li>
                                                @endif
                                            @else
                                            <li><i class="fal fa-star"></i></li>
                                            @endif
                                    @endfor
                                </ul>
                                <p>
                                    <?php
                                    $lang = Session::get('applocale');
                                    if ($lang == 'am') {
                                        echo substr($product->productName->descriptionAm, 0, 210);
                                    } else if ($lang == 'ru') {
                                        echo substr($product->productName->descriptionRu, 0, 210);
                                    } else if ($lang == 'en') {
                                        echo substr($product->productName->descriptionEn, 0, 210);

                                    }
                                    ?>
                                    <a href="#description">@lang('product.prodMore')...</a>
                                </p>
                                {{-- product size --}}
                                <div class="product-size">
                                    <h5 class="sub-title">@lang('product.Size')</h5>
                                    <?php
                                    $price = explode(",", $product->size);
                                    foreach ($price as $key) {
                                        echo '<span class="size">' . $key . '</span>';
                                    }

                                    ?>

                                </div>
                                {{-- product size end here--}}

                                {{-- color list --}}
                                <div class="color-list">
                                    <h5 class="sub-title">@lang('product.Color')</h5>
                                    @for($i=0; $i<count($product->colors) ;$i ++)
                                        <button class="color" style="background-color: {{ $product->colors[$i] }};">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    @endfor

                                </div>
                                {{-- color list end here --}}
                                <div class="product-details-content">

                                    <p><span>@lang('product.Availability'):</span> {{ $product->availability }}</p>
                                    <p>
                                        <span>@lang('product.Seller'): </span>
                                        <a href="{{ route('companyByName', ['name' => $product->Company->name]) }}">
                                            <span class="seller-brandname">{{ $product->Company->name }}</span>
                                        </a>
                                    </p>
                                </div>
                                <form id="checkout-form">
                                    <p class="ctt-p"><span>@lang('product.quantity'):</span></p>
                                    <ul class="inner-product-details-cart">
                                        <li class="quantity-li">
                                            <div class="input-group quantity-holder" id="quantity-holder">
                                                <button class="btn btn-default quantity-minus" type="button">-</button>
                                                <input type="text" name='quantity' class="form-control quantity-input"
                                                       value="1" placeholder="1">
                                                <button class="btn btn-default quantity-plus" type="button">+</button>
                                            </div>
                                        </li>
                                    </ul>

                                    <ul class="inner-product-details-cart">
                                        <li>
                                            <a  class="order-now">@lang('product.order')</a>
                                        </li>
{{--                                        <li>--}}
{{--                                            <a class="add-to-cart">--}}
{{--                                                <i aria-hidden="true" class="fal fa-shopping-cart"></i>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
                                        <li>
                                            <a class="add-to-favorite">
                                                <i aria-hidden="true" class="fal fa-heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-details-tab-area">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="tab-menu-ul">
                                <li class="active">
                                    <a href="#description" data-toggle="tab"
                                                      aria-expanded="false">@lang('product.Description')</a>
                                </li>
                                <li>
                                    <a href="#review" data-toggle="tab"
                                       aria-expanded="false">@lang('product.Review')</a>
                                </li>
                                {{--<li>
                                    <a href="#delivery" data-toggle="tab"
                                       aria-expanded="false">@lang('product.delivery')</a>
                                </li>--}}
                            </ul>
                        </div>
                        <div class="col-sm-12">
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="description">
                                    <p>
                                        <?php
                                        $lang = Session::get('applocale');
                                        if ($lang == 'am') {
                                            echo $product->productName->descriptionAm;
                                        } else if ($lang == 'ru') {
                                            echo $product->productName->descriptionRu;
                                        } else if ($lang == 'en') {
                                            echo $product->productName->descriptionEn;

                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="review">
                                        <div class="pro-tab-info pro-reviews">
                                            <div class="customer-review">
                                                <h3 class="small-title">@lang('home.customerreviews')</h3>
                                                <ul class="product-comments clearfix">
                                                    @foreach($product->review as $value)

                                                    <li class="threaded-comments" style="width: 100%">
                                                        <div class="pro-reviewer">
                                                            <img src="assets/img/reviewer/1.jpg" alt="">
                                                        </div>
                                                        <div class="pro-reviewer-comment">
                                                            <div class="fix">
                                                                <div class="pull-left mbl-center">
                                                                    <h5>
                                                                        <strong>{{ $value->full_name }}</strong>
                                                                        <span>
                                                                            @for($i=1; $i<=5; $i++)
                                                                                @if($i <= $value->stars)
                                                                                    <a><i class="fas fa-star"></i></a>
                                                                                    @else
                                                                                    <a><i class="fal fa-star"></i></a>
                                                                                @endif
                                                                            @endfor
                                                                        </span>
                                                                    </h5>
                                                                    <p class="reply-date">27 Jun, 2016 at 2:30pm</p>
                                                                </div>
                                                            </div>
                                                            <p>{{ $value->review }}</p>
                                                        </div>
                                                    </li>
                                                        <hr>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @if($order)
                                                <form method="post" action="{{ route('addReview',['id' =>  $product->id ]) }}"
                                                      class="review-form">
                                                        <div class="leave-review">
                                                <h3 class="small-title">@lang('home.leaveyourreview')</h3>
                                                <div class="your-rating mb-30">
                                                    <p class="mb-10"><strong>@lang('home.yourrating')</strong></p>
                                                    <span class="stars-review">
                                                        <a ><i class="fal fa-star"></i></a>
                                                    </span>
                                                    <span class="separator">|</span>
                                                    <span class="stars-review">
                                                        <a ><i class="fal fa-star"></i></a>
                                                        <a ><i class="fal fa-star"></i></a>
                                                    </span>
                                                    <span class="separator">|</span>
                                                    <span class="stars-review">
                                                        <a ><i class="fal fa-star"></i></a>
                                                        <a ><i class="fal fa-star"></i></a>
                                                        <a ><i class="fal fa-star"></i></a>
                                                    </span>
                                                    <span class="separator">|</span>
                                                    <span class="stars-review">
                                                        <a ><i class="fal fa-star"></i></a>
                                                        <a ><i class="fal fa-star"></i></a>
                                                        <a ><i class="fal fa-star"></i></a>
                                                        <a ><i class="fal fa-star"></i></a>
                                                    </span>
                                                    <span class="separator">|</span>
                                                    <span class="stars-review">
                                                        <a ><i class="fal fa-star"></i></a>
                                                        <a ><i class="fal fa-star"></i></a>
                                                        <a ><i class="fal fa-star"></i></a>
                                                        <a ><i class="fal fa-star"></i></a>
                                                        <a ><i class="fal fa-star"></i></a>
                                                    </span>
                                                </div>
                                                <div class="row reply-box">

                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input class="form-control" type="text" name="name"
                                                                       placeholder="@lang('account.firstName')...">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <textarea class="form-control input-lg review-textarea" name="comment"
                                                                          rows="4"
                                                                          placeholder="@lang('home.yourrating')...">
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <button type="submit">@lang('product.send')</button>
                                                            </div>
                                                        </div>

                                                </div>
                                            </div>
                                                    <input type="hidden" name="countStars" id="countStars">
                                                    {{ csrf_field() }}
                                                </form>
                                            @endif
                                        </div>

                                </div>
                                {{--<div class="tab-pane fade" id="delivery">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eaque est ex illum
                                    minima non obcaecati provident ullam ut vel.
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="featured-products-area2 relate-products-in-single">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="title-carousel">@lang('home.relatedproducts')</h2>
                        </div>
                    </div>
                    <div class="owl-carousel">
                        @foreach($categoryProducts as $value)
                        <div class="product-box1">
                            <div class="product-img-holder">
                                <a href="/product-details/{{ $value->id }}" target="_blank">
                                    @if(gettype($value->images) =='string')
                                        <img src="/img/products/{{ $value->images }}" alt="product">
                                    @else
                                        <img src="/img/products/{{ $value->images[0] }}" alt="product">
                                    @endif
                                </a>
                            </div>
                            <div class="product-content-holder">
                                <h3>
                                    <a href="/product-details/{{ $value->id }}" target="_blank">
                                        <?php
                                        $lang = Session::get('applocale');
                                        if ($lang == 'am') {
                                            echo $value->productName->nameAm;
                                        } else if ($lang == 'ru') {
                                            echo $value->productName->nameRu;
                                        } else if ($lang == 'en') {
                                            echo $value->productName->nameEn;
                                        }
                                        ?>
                                    </a>
                                </h3>
                                <ul class="feedback-ul">
                                    <li><i class="fal fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fal fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fal fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fal fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fal fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <div class="price-parent">
                                    <span class="main-price">{{ $value->price }}  @lang('home.amd')</span>
                                    <span class="saled-price">{{ $value->price }}  @lang('home.amd')</span>
                                </div>
                            </div>
                            <a href="/product-details/{{ $value->id }}" target="_blank">@lang('product.prodMore')</a>
                        </div>

                      @endforeach
                    </div> {{-- related products carousel ends here  --}}
                </div>
            </div>

        </div>
    </div>
    <script>
        var productId = "{{ $product->id }}";
        var checkUser = "{{ Auth::check() }}";
        var amountSingle = '{{ $product->price }}';

    </script>
    <script src="/js/productDetails.js"></script>
@endsection
