
<div class="container">
    <nav class="navbar navbar-default col-md-9 col-md-offset-2">
        <ul class="nav nav-pills">
            <li><a href="/categories">все категории</a></li>
            @forelse($rootCategories as $rootCategory)
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      {{ $rootCategory->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @if(isset($categories[$rootCategory->id]))
                            @foreach($categories[$rootCategory->id] as $category)
                                <li>
                                    <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        @else
                            <li><a href="#">нет категорий</a></li>
                        @endif
                        
                    </ul>

                </li>
            @empty
                <li><a href="#">нет категорий</a></li>
            @endforelse
        </ul>
    </nav>
</div>
