<div class="category-menu-list">
    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{route('products.index', ['category_id' => $category->id])}}">{{$category->name}}<i
                        class="pe-7s-angle-right"></i></a>

                @php
                    $children = $category->children;
                @endphp

                @if($children->isNotEmpty())
                    <div class="category-menu-dropdown">

                        @foreach ($children as $child)
                            <div class="category-dropdown-style category-common3">
                                <h4 class="categories-subtitle">
                                    <a href="{{route('products.index', ['category_id' => $child->id])}}">
                                        {{$child->name}}
                                    </a>

                                </h4>
                                @php
                                    $grandChildren = $child->children;
                                @endphp
                                @if($grandChildren && $grandChildren->isNotEmpty())
                                    <ul>
                                        @foreach ($grandChildren as $grandChild)
                                            <li><a href="{{route('products.index', ['category_id' => $grandChild->id])}}">{{$grandChild->name}}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach


                    </div>

                @endif
            </li>

        @endforeach

    </ul>
</div>
