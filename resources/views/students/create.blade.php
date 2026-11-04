
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Student - Pearl Horizon University</title>

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
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 20px 6%;
        }

        header a {
            color: #0f172a;
            text-decoration: none;
            font-size: 21px;
            font-weight: bold;
        }

        nav {
            margin-top: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 22px;
        }

        nav a {
            font-size: 14px;
            color: #475569;
        }

        nav a:hover {
            color: #059669;
        }

        main {
            max-width: 800px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
        }

        h1 {
            font-size: 28px;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 9px;
            font-size: 14px;
        }

        input {
            display: block;
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            background: white;
        }

        input:focus {
            outline: none;
            border-color: #059669;
            box-shadow: 0 0 0 2px rgba(5,150,105,0.12);
        }

        .help-text {
            color: #64748b;
            font-size: 12px;
            margin-top: 7px;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 22px;
        }

        .error-text {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 13px 22px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-save {
            background: #059669;
            color: white;
        }

        .btn-save:hover {
            background: #047857;
        }

        .btn-cancel {
            background: #e2e8f0;
            color: #334155;
        }

        footer {
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 22px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }

        @media(max-width: 600px) {
            .form-card {
                padding: 22px;
            }

            h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<header>
    <a href="{{ route('home') }}">Pearl Horizon University</a>

    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('registration') }}">Registrations</a>
    </nav>
</header>

<main>
    <div class="form-card">

        <h1>Add New Student</h1>

        <p class="subtitle">
            Enter the student's academic details and create their login password.
        </p>

        @if ($errors->any())
            <div class="error-box">
                <strong>Please correct the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Registration Number</label>
                <input type="text" name="reg_no"
                       value="{{ old('reg_no') }}" required>
                @error('reg_no')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name"
                       value="{{ old('full_name') }}" required>
                @error('full_name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email"
                       value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Academic Programme</label>
                <input type="text" name="program"
                       value="{{ old('program') }}" required>
                @error('program')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Student Password</label>
                <input type="password" name="password"
                       minlength="8" autocomplete="new-password" required>
                <p class="help-text">
                    Minimum 8 characters. This will be the student's login password.
                </p>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation"
                       minlength="8" autocomplete="new-password" required>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-save">
                    Save Student
                </button>

                <a href="{{ route('students.index') }}" class="btn btn-cancel">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</main>

<footer>
    &copy; {{ date('Y') }} Pearl Horizon University. All rights reserved.
</footer>

</body>
</html>
