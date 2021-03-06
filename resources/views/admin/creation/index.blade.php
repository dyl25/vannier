@extends('admin.layouts.app')

@section('title')
Espace création
@endsection

@section('content')
<!-- Creations table -->
<section class="card-panel grey lighten-4 hoverable">
    <h2>Liste des créations <i class="material-icons medium">shopping_basket</i></h2>
    <a href="{{ route('admin.creations.create') }}" class="btn btn-primary">Ajouter une création</a>
    <table class="bordered highlight">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>Date de création</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($creations as $creation)
            <tr>
                <td>{{ $creation->id }}</td>
                <td><a href="{{ route('admin.creations.show', $creation->id) }}">{{ $creation->name }}</a></td>
                <td>{{ str_limit($creation->description, 50) }}</td>
                <td>
                @foreach($creation->categories as $category)
                <span class="chip">{{ $category->name }}</span> 
                @endforeach
                </td>
                <td>{{ $creation->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.creations.edit', $creation->id) }}"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                    <form action="{{ route('admin.creations.destroy', $creation->id) }}" method="post" class="button-form">
                        @method('DELETE')
                        @csrf
                        <button type="submit" name="btSendDelete"><i class="material-icons red-text">delete</i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $creations->links('vendor.pagination.default') }}
</section>
@endsection
