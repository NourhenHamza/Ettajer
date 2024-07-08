@extends('layouts/contentNavbarLayout')

@section('title', 'Profile Roles')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1"> <!-- Modification de la dimension -->

            <div class="text-end mb-3">
              <a href="{{ route('profileroles.create') }}" class="btn btn-success">Add Profile Role</a>
            </div>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Profile Role Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Profile Role ID</th>
                                <th>Profile Role Name</th>
                                <th>Model ID</th>
                                <th>Model Type</th>
                                <th>Can Create</th>
                                <th>Can View</th>
                                <th>Can Update</th>
                                <th>Can Delete</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profileRoles as $profileRole)
                                <tr>
                                    <td>{{ $profileRole->profile_id }}</td>
                                    <td>{{ $profileRole->profile_name }}</td>
                                    <td>{{ $profileRole->model_id }}</td>
                                    <td>{{ $profileRole->model_type }}</td>
                                    <td>{{ $profileRole->can_create ? 'Yes' : 'No' }}</td>
                                    <td>{{ $profileRole->can_view ? 'Yes' : 'No' }}</td>
                                    <td>{{ $profileRole->can_update ? 'Yes' : 'No' }}</td>
                                    <td>{{ $profileRole->can_delete ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('profileroles.edit', $profileRole->profile_id) }}" class="dropdown-item">
                                                    <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                                </a>
                                                <a href="{{ route('profileroles.show', $profileRole->profile_id) }}" class="dropdown-item">
                                                    <i class="mdi mdi-eye-outline me-1"></i> Show Permissions
                                                </a>
                                                <form action="{{ route('profileroles.destroy', $profileRole->profile_id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this profile role?')">
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
