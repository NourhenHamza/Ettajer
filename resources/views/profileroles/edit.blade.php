@extends('layouts/contentNavbarLayout')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h1>Modifier le rôle {{ $profilerole->name }}</h1>

            <form action="{{ route('profileroles.update', $profilerole->id) }}" method="post">

                @csrf

                @method('PUT')

                <div class="form-group">

                    <label for="name">Nom du profile rôle</label>

                    <input type="text" class="form-control" id="name" name="name" value="{{ $profilerole->name }}">

                </div>

                <div class="form-group">

                    <label for="permissions">Permissions</label>

                    <div id="permissions">
                        @foreach($models as $model)
                            <div class="model-permissions mb-2">
                                <h5>{{ class_basename($model) }}</h5>
                                @foreach($permissions as $permission)
                                    <label>
                                        <input type="checkbox" name="permissions[{{ class_basename($model) }}][]" value="{{ $permission->name }}"
                                            {{ $profilerole->permissions->contains('name', "{$permission->name}_".class_basename($model)) ? 'checked' : '' }}>
                                        {{ ucfirst($permission->name) }}
                                    </label>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>

            </form>

        </div>

    </div>

</div>

@endsection
