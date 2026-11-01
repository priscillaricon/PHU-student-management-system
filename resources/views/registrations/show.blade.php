<!DOCTYPE html>
<html>
<head>
    <title>Registration Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h2 {
            color: #17365d;
        }

        p {
            margin: 15px 0;
        }

        .buttons a {
            display: inline-block;
            padding: 10px 16px;
            margin-right: 8px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
        }

        .back {
            background: #555;
        }

        .edit {
            background: #0879c9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Course Registration Details</h2>

    <p><strong>Registration Number:</strong>
        {{ $registration->student->reg_no }}</p>

    <p><strong>Student Name:</strong>
        {{ $registration->student->full_name }}</p>

    <p><strong>Course Code:</strong>
        {{ $registration->course->course_code }}</p>

    <p><strong>Course Name:</strong>
        {{ $registration->course->course_name }}</p>

    <p><strong>Semester:</strong>
        {{ $registration->semester }}</p>

    <div class="buttons">
        <a class="edit"
           href="{{ route('registrations.edit', $registration->id) }}">
            Edit Registration
        </a>

        <a class="back"
           href="{{ route('students.show', $registration->student_id) }}">
            Back to Student
        </a>
    </div>
</div>

</body>
</html>
