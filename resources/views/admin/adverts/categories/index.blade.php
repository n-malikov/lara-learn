@extends('layouts.app')

@section('content')
    @include('admin._nav', ['page' => 'categories'])

    <p><a href="{{ route('admin.adverts.categories.create') }}" class="btn btn-success">Add Category</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach($categories AS $category)
            <tr>
                <td>
                    {!! $category->depth ? str_repeat('&mdash;', $category->depth) : '' !!}
                    {{-- @for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor--}}
                    <a href="{{ route('admin.adverts.categories.show', $category) }}">{{ $category->name }}</a>
                </td>
                <td>{{ $category->slug }}</td>
                <td class="d-flex flex-row">
                    <form method="POST" action="{{ route('admin.adverts.categories.first', $category) }}" class="mr-1">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                    </form>
                    <form method="POST" action="{{ route('admin.adverts.categories.up', $category) }}" class="mr-1">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                    </form>
                    <form method="POST" action="{{ route('admin.adverts.categories.down', $category) }}" class="mr-1">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                    </form>
                    <form method="POST" action="{{ route('admin.adverts.categories.last', $category) }}" class="mr-1">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>


@endsection
