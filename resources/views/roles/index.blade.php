@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1"> <!-- Modification de la dimension -->

            <div class="text-end mb-3">
              <a href="{{ route('roles.create') }}" class="btn btn-success">Add Role</a>
            </div>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Role Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>guard_name</th>
                                <th>profile_name</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td> <!-- Ajout de la colonne pour l'ID -->
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->guard_name }}</td>
                                    <td>{{ $role->profile_name }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>{{ $role->updated_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('roles.edit', $role->id) }}" class="dropdown-item">
                                                    <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                                </a>
                                                <a href="{{ route('roles.show', $role->id) }}" class="dropdown-item">
                                                    <i class="mdi mdi-eye-outline me-1"></i> Show Permissions
                                                </a>
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this role?')">
                                                        <i class="mdi mdi-trash-can-outline me-1"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
