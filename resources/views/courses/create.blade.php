
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course | PHU</title>

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
            max-width: 700px;
            margin: 35px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px #00000010;
        }

        h1 { color: #173b70; }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 15px;
        }

        button, .back {
            display: inline-block;
            margin-top: 22px;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            background: #1d4ed8;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .back {
            background: #e2e8f0;
            color: #1e293b;
            margin-left: 8px;
        }

        .error {
            color: #b91c1c;
            background: #fee2e2;
            padding: 12px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<header>
    <h2>PHU Student Management System</h2>
    <p>Course Management</p>
</header>

<div class="container">
    <h1>Add New Course</h1>
    <p>Enter the course details and assign a lecturer.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($lecturers->isEmpty())
        <p class="error">
            No lecturers are available. Add a lecturer before creating a course.
        </p>
    @else
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <label>Course Code</label>
            <input type="text" name="course_code"
                   value="{{ old('course_code') }}" required>

            <label>Course Name</label>
            <input type="text" name="course_name"
                   value="{{ old('course_name') }}" required>

            <label>Description</label>
            <textarea name="description" rows="3">{{ old('description') }}</textarea>

            <label>Credit Units</label>
            <input type="number" name="credit_units" min="1"
                   value="{{ old('credit_units') }}" required>

            <label>Assigned Lecturer</label>
            <select name="lecturer_id" required>
                <option value="">-- Select Lecturer --</option>
                @foreach ($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}"
                        @selected(old('lecturer_id') == $lecturer->id)>
                        {{ $lecturer->full_name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Save Course</button>
            <a class="back" href="{{ route('courses.index') }}">
                Back to Courses
            </a>
        </form>
    @endif
</div>

</body>
</html>
