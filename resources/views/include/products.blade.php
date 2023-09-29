@if(isset($products ))
    @foreach($products as $value)
        <div class="col-md-3 col-sm-4 col-xs-12">
            @include('include.product')
        </div>
    @endforeach
    <div class="row">
        <div class="col-xs-12 text-right">
            @if(
            isset($_GET['to']) and
            isset($_GET['from']) and
            !isset($_GET['subCategory']) and
            !isset($_GET['category']))
                {{ $products->appends(['from' => $_GET['from'],'to' => $_GET['to']])->links() }}
            @elseif(
            !isset($_GET['to']) and
            isset($_GET['from']) and
            !isset($_GET['subCategory']) and
            !isset($_GET['category']))
                {{ $products->appends(['from' => $_GET['from']])->links() }}
            @elseif(
            isset($_GET['to']) and
            !isset($_GET['from']) and
            !isset($_GET['subCategory']) and
            !isset($_GET['category']))
                {{ $products->appends(['to' => $_GET['to']])->links() }}
            @elseif(
            isset($_GET['subCategory']) and
            isset($_GET['category']) and
            isset($_GET['to']) and
            !isset($_GET['from']))
                {{ $products->appends(['category' => $_GET['category'],'subCategory' => $_GET['subCategory'], 'to' => $_GET['to'] ])->links() }}
            @elseif(
            isset($_GET['subCategory']) and
            isset($_GET['category']) and
            !isset($_GET['to']) and
            isset($_GET['from']))
                {{ $products->appends(['category' => $_GET['category'],'subCategory' => $_GET['subCategory'], 'from' => $_GET['from'] ])->links() }}
            @elseif(
            !isset($_GET['subCategory']) and
            isset($_GET['category']) and
            !isset($_GET['to']) and
            isset($_GET['from']))
                {{ $products->appends(['category' => $_GET['category'], 'from' => $_GET['from'] ])->links() }}
            @elseif(
            !isset($_GET['subCategory']) and
            isset($_GET['category']) and
            isset($_GET['to']) and
            !isset($_GET['from']))
                {{ $products->appends(['category' => $_GET['category'], 'to' => $_GET['to'] ])->links() }}
            @elseif(
            isset($_GET['subCategory']) and
            isset($_GET['category']) and
            !isset($_GET['to']) and
            !isset($_GET['from']))
                {{ $products->appends(['category' => $_GET['category'], 'subCategory' => $_GET['subCategory'] ])->links() }} @elseif(
            !isset($_GET['subCategory']) and
            isset($_GET['category']) and
            !isset($_GET['to']) and
            !isset($_GET['from']))
                {{ $products->appends(['category' => $_GET['category'] ])->links() }}
            @else
                {{ $products->links() }}
            @endif
        </div>
    </div>
@endif
