<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Registered Students</h2>
        <a href="{{ route('students.create') }}" class="btn btn-success">+ Add New Student</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0"> <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Course</th>
                        <th>Registered At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->date_of_birth }}</td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $student->course }}</span>
                            </td>
                            <td>{{ $student->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No students found in the system.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>