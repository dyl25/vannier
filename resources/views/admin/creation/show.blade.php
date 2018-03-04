@extends('admin.layouts.app')

@section('title')
Vue de la création {{$creation->name}}
@endsection

@section('content')
<!-- Articles table -->
<article class="card-panel grey lighten-4 hoverable">
    <div class="row">
        <div class="center-align">
        <img src="{{asset('img/creations/'.$creation->image)}}" alt="Image de la création" class="responsive-img">
        </div>
    </div>
    <div class="row">
        <div class="col m8">
            <h2>{{ $creation->name }}</h2>
            <p>{{ $creation->description }}</p>
        </div>
        <div class="col 4">
            <div class="card-panel">
                <div>
                    <label>Url:</label>
                    <p><a href="{{ route('creations.show', $creation->id) }}">{{ route('creations.show', $creation->id) }}</a></p>
                </div>
                <div>
                    <label>Catégories:</label>
                    <p>
                        @foreach($creation->categories as $category)
                        <span class="chip">{{ $category->name }}</span>
                        @endforeach
                    </p>
                </div>
                <div>
                    <label>Créé le:</label>
                    <p>{{ $creation->created_at }}</p>
                </div>
                <div>
                    <label>Modifié le:</label>
                    <p>{{ $creation->updated_at }}</p>
                </div>
                <hr>
                <a class="btn waves-effect" href="{{ route('admin.creations.edit', $creation->id) }}"><i class="material-icons">mode_edit</i> Editer</a>
                <a class="btn waves-effect red" href="{{ route('admin.creations.destroy', $creation->id) }}"><i class="material-icons">delete</i> Supprimer</a>
            </div>
        </div>
    </div>
</article>
@endsection