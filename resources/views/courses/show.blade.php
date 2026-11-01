
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details | PHU</title>
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
            max-width: 850px;
            margin: 40px auto;
            padding: 25px;
        }
        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px #00000010;
        }
        .card-header {
            background: #234f91;
            color: white;
            padding: 25px;
        }
        .card-header h1 { margin: 0 0 8px; }
        .details { padding: 25px; }
        .detail {
            padding: 17px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        .label {
            display: block;
            color: #64748b;
            font-size: 14px;
            margin-bottom: 7px;
        }
        .value { font-size: 18px; font-weight: bold; }
        .actions { padding: 0 25px 25px; }
        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 6px;
            text-decoration: none;
            margin: 5px 8px 5px 0;
        }
        .edit { background: #1d4ed8; color: white; }
        .back { background: #e2e8f0; color: #1e3a5f; }
    </style>
</head>
<body>
<header>
    <h2>PHU Student Management System</h2>
    <p>Course Management</p>
</header>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Course Details</h1>
            <p>View the information for this course.</p>
        </div>

        <div class="details">
            <div class="detail">
                <span class="label">Course Code</span>
                <div class="value">{{ $course->course_code }}</div>
            </div>

            <div class="detail">
                <span class="label">Course Name</span>
                <div class="value">{{ $course->course_name }}</div>
            </div>

            <div class="detail">
                <span class="label">Description</span>
                <div class="value">
                    {{ $course->description ?: 'No description provided' }}
                </div>
            </div>

            <div class="detail">
                <span class="label">Credit Units</span>
                <div class="value">{{ $course->credit_units }}</div>
            </div>

            <div class="detail">
                <span class="label">Assigned Lecturer</span>
                <div class="value">
                    {{ $course->lecturer?->full_name ?? 'Not assigned' }}
                </div>
            </div>
        </div>

        <div class="actions">
            <a class="btn edit"
               href="{{ route('courses.edit', $course->id) }}">
                Edit Course
            </a>
            <a class="btn back" href="{{ route('courses.index') }}">
                Back to Courses
            </a>
        </div>
    </div>
</div>
</body>
</html>
