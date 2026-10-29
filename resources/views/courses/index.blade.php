
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management | PHU</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #173b70;
            color: white;
            padding: 22px 6%;
        }

        .container {
            max-width: 1150px;
            margin: 35px auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px #00000010;
            overflow-x: auto;
        }

        h1 { color: #173b70; }

        .btn {
            display: inline-block;
            padding: 9px 13px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .add, .edit {
            background: #1d4ed8;
            color: white;
        }

        .view {
            background: #e0e7ff;
            color: #1e3a8a;
        }

        .delete {
            background: #dc2626;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 22px;
        }

        th, td {
            padding: 13px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        th {
            background: #eaf0f8;
            color: #173b70;
        }

        .message {
            padding: 12px;
            background: #dcfce7;
            color: #166534;
            border-radius: 5px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .inline-form { display: inline; }
    </style>
</head>
<body>

<header>
    <h2>PHU Student Management System</h2>
    <p>Course Management</p>
</header>

<div class="container">
    <div class="card">
        <h1>Courses</h1>
        <p>Manage course records and assigned lecturers.</p>

        @if (session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <a class="btn add" href="{{ route('courses.create') }}">
            + Add Course
        </a>

        <table>
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Credit Units</th>
                    <th>Lecturer</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->credit_units }}</td>
                        <td>{{ $course->lecturer?->full_name ?? 'Not assigned' }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn view"
                                   href="{{ route('courses.show', $course->id) }}">
                                    View
                                </a>

                                <a class="btn edit"
                                   href="{{ route('courses.edit', $course->id) }}">
                                    Edit
                                </a>

                                <form class="inline-form"
                                      action="{{ route('courses.destroy', $course->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this course?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn delete" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            No courses found. Click Add Course to create one.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $courses->links() }}
    </div>
</div>

</body>
</html>
