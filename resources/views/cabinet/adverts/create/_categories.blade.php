<ul>
    @foreach($categories as $category)
        <li>
            <a href="{{ route('cabinet.adverts.create.region', $category) }}">{{ $category->name }}</a>
            {{-- рекурсия: --}}
            @include('cabinet.adverts.create._categories', ['categories' => $category->children])
        </li>
    @endforeach
</ul>
