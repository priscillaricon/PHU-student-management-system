<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details | PHU</title>

    <style>
        * {
            box-sizing: border-box;
        }

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

        header h2 {
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 25px;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px #00000012;
        }

        .card-header {
            background: #234f91;
            color: white;
            padding: 28px;
        }

        .card-header h1 {
            margin: 0 0 8px;
            font-size: 27px;
        }

        .card-header p {
            margin: 0;
        }

        .details {
            padding: 20px 30px;
        }

        .detail {
            padding: 18px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail:last-child {
            border-bottom: none;
        }

        .detail-label {
            display: block;
            color: #64748b;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .detail-value {
            font-size: 18px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .actions {
            padding: 0 30px 30px;
        }

        .btn {
            display: inline-block;
            padding: 11px 17px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            margin: 5px 8px 5px 0;
            font-weight: bold;
        }

        .edit {
            background: #1d4ed8;
            color: white;
        }

        .back {
            background: #e2e8f0;
            color: #1e3a5f;
        }

        .register {
            background: #15803d;
            color: white;
        }

        .view-btn {
            background: #2563eb;
            color: white;
        }

        .edit-btn {
            background: #15803d;
            color: white;
        }

        .delete-btn {
            background: #dc2626;
            color: white;
        }

        .message-success {
            margin: 20px 30px 0;
            padding: 12px 15px;
            background: #dcfce7;
            color: #166534;
            border-radius: 6px;
        }

        .message-error {
            margin: 20px 30px 0;
            padding: 12px 15px;
            background: #fee2e2;
            color: #991b1b;
            border-radius: 6px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 15px;
            background: white;
        }

        .section-title {
            margin-top: 0;
            color: #173b70;
        }

        .registered-course {
            background: #f8fafc;
            border: 1px solid #dbe3ee;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 18px;
        }

        .course-heading {
            font-size: 18px;
            color: #173b70;
            margin-bottom: 12px;
        }

        .course-info {
            color: #475569;
            margin: 8px 0;
        }

        .course-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin-top: 18px;
        }

        .course-actions form {
            margin: 0;
        }

        .course-actions .btn {
            margin: 0;
        }

        .empty-message {
            color: #64748b;
        }

        @media (max-width: 600px) {
            .container {
                margin: 15px auto;
                padding: 12px;
            }

            .details {
                padding: 15px 20px;
            }

            .actions {
                padding: 0 20px 20px;
            }

            .message-success,
            .message-error {
                margin-left: 20px;
                margin-right: 20px;
            }
        }
    </style>
</head>

<body>

<header>
    <h2>PHU Student Management System</h2>
</header>

<div class="container">
    <div class="card">

        <div class="card-header">
            <h1>Student Details</h1>
            <p>View student information and manage course registration.</p>
        </div>

        <!-- Success message -->
        @if (session('success'))
            <div class="message-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validation errors -->
        @if ($errors->any())
            <div class="message-error">
                <strong>Please correct the following:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Student information -->
        <div class="details">

            <div class="detail">
                <span class="detail-label">Registration Number</span>
                <div class="detail-value">{{ $student->reg_no }}</div>
            </div>

            <div class="detail">
                <span class="detail-label">Full Name</span>
                <div class="detail-value">{{ $student->full_name }}</div>
            </div>

            <div class="detail">
                <span class="detail-label">Email Address</span>
                <div class="detail-value">{{ $student->email }}</div>
            </div>

            <div class="detail">
                <span class="detail-label">Program</span>
                <div class="detail-value">{{ $student->program }}</div>
            </div>

        </div>

        <!-- Course registration form -->
        <div class="details">

            <h2 class="section-title">Course Registration</h2>

            <p>Select a course and semester to register this student.</p>

            @if ($courses->isEmpty())

                <p class="empty-message">
                    No courses are available. Add a course before registering a student.
                </p>

            @else

                <form action="{{ route('registrations.store') }}" method="POST">
                    @csrf

                    <input type="hidden"
                           name="student_id"
                           value="{{ $student->id }}">

                    <div class="detail">

                        <label for="course_id" class="detail-label">
                            Select Course
                        </label>

                        <select name="course_id"
                                id="course_id"
                                class="form-control"
                                required>

                            <option value="">-- Select Course --</option>

                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ (string) old('course_id') === (string) $course->id ? 'selected' : '' }}>
                                    {{ $course->course_code }} - {{ $course->course_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="detail">

                        <label for="semester" class="detail-label">
                            Semester
                        </label>

                        <select name="semester"
                                id="semester"
                                class="form-control"
                                required>

                            <option value="Semester I"
                                {{ old('semester', 'Semester I') === 'Semester I' ? 'selected' : '' }}>
                                Semester I
                            </option>

                            <option value="Semester II"
                                {{ old('semester') === 'Semester II' ? 'selected' : '' }}>
                                Semester II
                            </option>

                        </select>
                    </div>

                    <button type="submit" class="btn register">
                        Register Student
                    </button>

                </form>

            @endif
        </div>

        <!-- Registered courses -->
        <div class="details">

            <h2 class="section-title">Registered Courses</h2>

            <p>View, edit or remove courses registered by this student.</p>

            @forelse ($student->registrations as $registration)

                <div class="registered-course">

                    <div class="course-heading">
                        <strong>{{ $registration->course->course_code }}</strong>
                        — {{ $registration->course->course_name }}
                    </div>

                    <div class="course-info">
                        <strong>Credit Units:</strong>
                        {{ $registration->course->credit_units }}
                    </div>

                    <div class="course-info">
                        <strong>Semester:</strong>
                        {{ $registration->semester }}
                    </div>

                    <div class="course-actions">

                        <!-- View -->
                        <a href="{{ route('registrations.show', $registration->id) }}"
                           class="btn view-btn">
                            View
                        </a>

                        <!-- Edit -->
                        <a href="{{ route('registrations.edit', $registration->id) }}"
                           class="btn edit-btn">
                            Edit
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('registrations.destroy', $registration->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this course registration?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn delete-btn">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <p class="empty-message">
                    This student is not registered for any courses yet.
                </p>

            @endforelse

        </div>

        <!-- Student actions -->
        <div class="actions">

            <a class="btn edit"
               href="{{ route('students.edit', $student->id) }}">
                Edit Student
            </a>

            <a class="btn back"
               href="{{ route('students.index') }}">
                Back to Students
            </a>

        </div>

    </div>
</div>

</body>
</html>
