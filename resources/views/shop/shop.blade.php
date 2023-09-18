@extends("layouts.main")
@section('title')
    {{ $category_name }}
@endsection
@section("content")
    <!-- Inner Pagpe Banner Area Start Here -->
    <div class="inner-page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-area">
                        <h1>{{ $category_name }}</h1>
                        <ul>
                            <li><a class="fal fa-home" href="/"></a> /</li>
                            <li><a href="#">{{ $category_name }}</a> </li>
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

    <!-- Shop Page Area Start Here -->
        <div class="custom-container">
            <div class="row products-container">
                <div class="col-lg-3 col-sm-4 sidebar-col mt60">
                    <div class="sidebar hidden-before-tab">
                        <div class="category-menu-area sidebar-section-margin" id="category-menu-area">
                            <h4 class="categories-all">
                                <a href="{{ route('allProduct')}}">@lang('home.allCategories')</a>
                                <span class="fal fa-times"></span>
                            </h4>
                            <ul>
                                <?php
                                $lang = Session::get('applocale');
                                ?>
                                @if(isset($category) )
                                    @foreach($category as $value)
                                        <li>
                                            <a href="{{ route('category', ['category' => $value->id]) }}">{!! $value->icon !!}{{ $value->name }}</a>
                                            <ul class="dropdown-menu">
                                                @foreach($subCategory as $key)
                                                    <?php
                                                    if ($lang == 'am') {
                                                        $subCategoryLang = $key->category_am_id;
                                                    } else if ($lang == 'ru') {
                                                        $subCategoryLang = $key->category_ru_id;
                                                    } else if ($lang == 'en') {
                                                        $subCategoryLang = $key->category_id;
                                                    }

                                                    ?>
                                                    @if($subCategoryLang == $value->id)
                                                        <li>
                                                            <a href="{{ route('category', ['category' =>$value->id, 'subCategory' =>  $key->id]) }}">{{ $key->name }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    @include('include.filter')

                </div>
                <div class="col-lg-9 col-sm-8 main-right">
                    <div class="row shop-page-area">
                        @include('include.products')

                    </div>
                </div>
            </div>


        </div>
    <!-- Shop Page Area End Here -->




@endsection