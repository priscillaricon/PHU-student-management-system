<!DOCTYPE html>
<html>
<head>
    <title>Edit Course Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h2 {
            color: #17365d;
        }

        label {
            display: block;
            margin-top: 18px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
        }

        button, a {
            display: inline-block;
            padding: 11px 18px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            cursor: pointer;
        }

        button {
            background: #0879c9;
        }

        a {
            background: #555;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Edit Course Registration</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <p>
        <strong>Student:</strong>
        {{ $registration->student->full_name }}
    </p>

    <form action="{{ route('registrations.update', $registration->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Select Course</label>

        <select name="course_id" required>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}"
                    {{ $registration->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->course_code }} - {{ $course->course_name }}
                </option>
            @endforeach
        </select>

        <label>Select Semester</label>

        <select name="semester" required>
            <option value="Semester I"
                {{ $registration->semester == 'Semester I' ? 'selected' : '' }}>
                Semester I
            </option>

            <option value="Semester II"
                {{ $registration->semester == 'Semester II' ? 'selected' : '' }}>
                Semester II
            </option>
        </select>

        <button type="submit">Update Registration</button>

        <a href="{{ route('students.show', $registration->student_id) }}">
            Cancel
        </a>

    </form>

</div>

</body>
</html>
