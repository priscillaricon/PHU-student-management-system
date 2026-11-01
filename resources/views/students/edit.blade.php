
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student | PHU</title>

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
            background: #1e3a5f;
            color: white;
            padding: 22px 8%;
        }

        header h2 {
            margin: 0 0 6px;
        }

        header p {
            margin: 0;
            color: #dbeafe;
        }

        .container {
            max-width: 650px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px #00000010;
        }

        h1 {
            margin-top: 0;
            color: #1e3a5f;
        }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 16px;
        }

        input:focus {
            outline: 2px solid #93c5fd;
            border-color: #2563eb;
        }

        .btn {
            display: inline-block;
            margin-top: 24px;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            background: #1d4ed8;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 15px;
        }

        .back {
            margin-left: 10px;
            background: #e2e8f0;
            color: #1e293b;
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
    <p>Student Records Management</p>
</header>

<div class="container">
    <h1>Edit Student</h1>
    <p>Update the student's details below.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <label>Registration Number</label>
        <input type="text" name="reg_no"
               value="{{ old('reg_no', $student->reg_no) }}" required>

        <label>Full Name</label>
        <input type="text" name="full_name"
               value="{{ old('full_name', $student->full_name) }}" required>

        <label>Email Address</label>
        <input type="email" name="email"
               value="{{ old('email', $student->email) }}" required>

        <label>Program</label>
        <input type="text" name="program"
               value="{{ old('program', $student->program) }}" required>

        <button type="submit" class="btn">Update Student</button>

        <a href="{{ route('students.index') }}"
           class="btn back">Back to Students</a>
    </form>
</div>

</body>
</html>
