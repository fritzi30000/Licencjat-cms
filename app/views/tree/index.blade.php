@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header title">{{ trans('app.plugin-tree') }}</h1>
        </div>
    </div>
    <div class="tree">
        @foreach( $tree as $treeItem)
            <div class="tree-item">
                <h2><a href="{{ URL::route('tree.'.$treeItem->name, $treeItem->id) }}">{{ $treeItem->name }}</a></h2>
            </div>
        @endforeach
    </div>
@stop
