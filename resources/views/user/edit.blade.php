<div class="container">
    <h1>Edit User</h1>

    <form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
        @method('put')
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disabled" value="{{ $user->id }}">
            <div id="idHelp" class="form-text">User ID.</div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" required class="form-control" id="name" placeholder="User name" name="name" value="{{ $user->name }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" required class="form-control" id="email" placeholder="User email" name="email" value="{{ $user->email }}">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option selected disabled value="">Choose one...</option>
                @foreach($roles as $roleOption)
                    <option value="{{ $roleOption->role }}" @if($user->role == $roleOption->role) selected @endif>{{ ucfirst($roleOption->role) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <select class="form-select" id="client_id" name="client_id">
                <option value="">None</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" @if($user->client_id == $client->id) selected @endif>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="employee_id" class="form-label">Employee</label>
            <select class="form-select" id="employee_id" name="employee_id">
                <option value="">None</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" @if($user->employee_id == $employee->id) selected @endif>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-warning">Cancel</a>
        </div>
    </form>
</div>