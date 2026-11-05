
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register | Pearl Horizon University</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f6f9fc;
    color: #172033;
}

a {
    text-decoration: none;
}

/* NAVIGATION HEADER */
.header {
    background: #ffffff;
    border-bottom: 1px solid #dce5ef;
}

.nav {
    max-width: 1200px;
    margin: auto;
    padding: 10px 22px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.brand {
    display: flex;
    align-items: center;
    gap: 10px;
}

.brand img {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    object-fit: contain;
    object-position: center;
}

.brand strong {
    display: block;
    color: #12315b;
    font-size: 14px;
}

.brand small {
    display: block;
    color: #009b70;
    letter-spacing: 1px;
    font-size: 9px;
    margin-top: 4px;
}

.links {
    display: flex;
    gap: 14px;
    align-items: center;
    flex-wrap: wrap;
}

.links a {
    font-size: 12px;
    font-weight: 600;
    color: #475569;
}

.links a:hover {
    color: #009b70;
}

.links .signin {
    background: #009b70;
    color: white;
    padding: 9px 14px;
    border-radius: 7px;
}

/* REGISTRATION AREA */
main {
    min-height: 670px;
    padding: 55px 16px 45px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: #f6f9fc;
}

/* UNIVERSITY BRANDING */
.page-heading {
    text-align: center;
    margin-bottom: 25px;
}

.page-heading img {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    object-fit: contain;
    object-position: center;
    display: block;
    margin: 0 auto 12px;
    image-rendering: auto;
}

.page-heading .university {
    color: #009b70;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
    margin-bottom: 6px;
}

.page-heading h1 {
    font-size: 25px;
    font-weight: 800;
    color: #071b3b;
    margin: 0;
}

.page-heading p {
    font-size: 12px;
    color: #8290a5;
    margin-top: 7px;
}

/* REGISTRATION CARD */
.card {
    width: 100%;
    max-width: 440px;
    background: #ffffff;
    border: 1px solid #dce5ef;
    border-radius: 17px;
    padding: 30px 32px;
    box-shadow: 0 12px 30px rgba(15, 39, 75, 0.06);
}

/* CARD INTRODUCTION */
.intro {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 27px;
}

.intro-icon {
    width: 44px;
    height: 44px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #e9fbf4;
    color: #009b70;
    border-radius: 12px;
    font-size: 22px;
    flex-shrink: 0;
}

.intro h2 {
    margin: 0;
    font-size: 17px;
    font-weight: 800;
    color: #071b3b;
}

.intro p {
    margin: 4px 0 0;
    font-size: 12px;
    color: #8491a5;
}

/* FORM FIELDS */
.field {
    margin-bottom: 19px;
}

.field label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #263957;
    margin-bottom: 9px;
}

.field input,
.field select {
    width: 100%;
    height: 49px;
    padding: 0 15px;
    border: 1px solid #d9e2ee;
    border-radius: 9px;
    background: #f8fafc;
    font-size: 14px;
    color: #263957;
    outline: none;
}

.field input::placeholder {
    color: #9ba9bd;
    font-size: 13px;
}

.field input:focus,
.field select:focus {
    border-color: #009b70;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(0, 155, 112, 0.08);
}

/* LECTURER INFORMATION */
.note {
    background: #eff6ff;
    border: 1px solid #dbeafe;
    color: #1e40af;
    border-radius: 9px;
    padding: 13px;
    font-size: 12px;
    line-height: 1.6;
    margin-bottom: 18px;
}

/* VALIDATION ERRORS */
.validation-errors {
    color: #dc2626;
    font-size: 13px;
    margin-bottom: 18px;
}

.validation-errors ul {
    padding-left: 20px;
}

/* REGISTER BUTTON */
.register-button {
    width: 100%;
    height: 49px;
    border: none;
    background: #009b70;
    color: #ffffff;
    border-radius: 9px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 155, 112, 0.2);
    transition: 0.3s;
}

.register-button:hover {
    background: #00845f;
    transform: translateY(-1px);
}

/* SIGN IN LINK */
.signin-link {
    text-align: center;
    border-top: 1px solid #edf1f6;
    margin-top: 22px;
    padding-top: 19px;
    font-size: 12px;
    color: #718096;
}

.signin-link a {
    color: #009b70;
    font-weight: 700;
}

.back-home {
    text-align: center;
    margin-top: 17px;
}

.back-home a {
    font-size: 12px;
    color: #718096;
}

/* SECURITY TEXT */
.protected {
    text-align: center;
    color: #a0aec0;
    font-size: 11px;
    margin-top: 20px;
}

/* FOOTER */
footer {
    background: #020617;
    border-top: 2px solid #009b70;
    padding: 30px 22px 18px;
}

.foot {
    max-width: 1200px;
    margin: auto;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 30px;
}

.footbrand {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #ffffff;
    font-weight: 800;
    font-size: 14px;
}

.footbrand img {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    object-fit: contain;
}

.desc {
    font-size: 12px;
    line-height: 1.7;
    color: #94a3b8;
    margin-top: 12px;
    max-width: 430px;
}

footer h4 {
    font-size: 12px;
    color: #ffffff;
    margin: 4px 0 13px;
}

footer ul {
    padding: 0;
    list-style: none;
    margin: 0;
}

footer li {
    margin: 9px 0;
    font-size: 11px;
}

footer li a {
    color: #94a3b8;
}

footer li a:hover {
    color: #00b88a;
}

.copyright {
    text-align: center;
    border-top: 1px solid #1e293b;
    margin: 24px auto 0;
    padding-top: 17px;
    font-size: 11px;
    color: #94a3b8;
}

.copyright b {
    display: block;
    color: #00b88a;
    margin-top: 5px;
    font-weight: 600;
}

/* RESPONSIVE DESIGN */
@media(max-width: 800px) {
    .foot {
        grid-template-columns: 1fr 1fr;
    }

    .foot > div:first-child {
        grid-column: 1 / -1;
    }
}

@media(max-width: 550px) {
    .nav {
        justify-content: center;
    }

    .links {
        justify-content: center;
        gap: 10px;
    }

    main {
        padding: 40px 15px;
    }

    .page-heading img {
        width: 82px;
        height: 82px;
    }

    .card {
        padding: 25px 20px;
    }

    .foot {
        grid-template-columns: 1fr;
    }

    .foot > div:first-child {
        grid-column: auto;
    }
}
</style>
</head>

<body>

<!-- HEADER -->
<header class="header">
    <div class="nav">

        <a class="brand" href="{{ url('/') }}">
            <img src="{{ asset('logo/logo.jpg') }}" alt="PHU Logo">

            <span>
                <strong>Pearl Horizon University</strong>
                <small>ACADEMIC &amp; MANAGEMENT SYSTEMS</small>
            </span>
        </a>

        <div class="links">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            <a href="{{ url('/students') }}">Students</a>
            <a href="{{ url('/courses') }}">Courses</a>
            <a href="{{ url('/registrations') }}">Registrations</a>
            <a href="{{ url('/lecturers') }}">Lecturers</a>
            <a href="{{ url('/student-login') }}">Student Portal</a>
            <a href="{{ route('login') }}">Staff Portal</a>
            <a href="{{ route('register') }}">Register</a>
            <a class="signin" href="{{ route('login') }}">Sign In</a>
        </div>

    </div>
</header>

<!-- REGISTRATION SECTION -->
<main>

    <!-- UNIVERSITY LOGO AND HEADING -->
    <div class="page-heading">

        <img src="{{ asset('logo/logo.jpg') }}" alt="PHU Logo">

        <div class="university">
            PEARL HORIZON UNIVERSITY
        </div>

        <h1>Create Account</h1>

        <p>Secure access to university portal</p>

    </div>

    <!-- REGISTRATION CARD -->
    <section class="card">

        <div class="intro">
            <div class="intro-icon">✚</div>

            <div>
                <h2>Welcome to PHU</h2>
                <p>Enter your details to get started</p>
            </div>
        </div>

        @if ($errors->any())
            <div class="validation-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field">
                <label for="account_type">Account Type</label>

                <select name="account_type" id="account_type" required>
                    <option value="">Select Account Type</option>

                    <option value="student"
                        {{ old('account_type') == 'student' ? 'selected' : '' }}>
                        Student
                    </option>

                    <option value="lecturer"
                        {{ old('account_type') == 'lecturer' ? 'selected' : '' }}>
                        Lecturer
                    </option>
                </select>
            </div>

            <div class="field">
                <label for="name">Full Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your full name"
                    required
                    autocomplete="name">
            </div>

            <div class="field">
                <label for="email">Email Address</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email address"
                    required
                    autocomplete="username">
            </div>

            <div id="studentFields" style="display:none">

                <div class="field">
                    <label for="reg_no">
                        Student Registration Number
                    </label>

                    <input
                        type="text"
                        id="reg_no"
                        name="reg_no"
                        value="{{ old('reg_no') }}"
                        placeholder="e.g. 24/U/12345/EVE">
                </div>

                <div class="field">
                    <label for="program">Academic Programme</label>

                    <input
                        type="text"
                        id="program"
                        name="program"
                        value="{{ old('program') }}"
                        placeholder="e.g. Bachelor of Business Computing">
                </div>

            </div>

            <div id="lecturerNote" class="note" style="display:none">
                Lecturer accounts must match lecturer details already
                registered by the PHU administrator.
            </div>

            <div class="field">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Create a password"
                    required
                    autocomplete="new-password">
            </div>

            <div class="field">
                <label for="password_confirmation">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Enter your password again"
                    required
                    autocomplete="new-password">
            </div>

            <button type="submit" class="register-button">
                Create Account →
            </button>

            <div class="signin-link">
                Already have an account?
                <a href="{{ route('login') }}">Sign In</a>
            </div>

            <div class="back-home">
                <a href="{{ url('/') }}">← Back to Home</a>
            </div>

        </form>

    </section>

    <div class="protected">
        Protected university access • Pearl Horizon University
    </div>

</main>

<!-- FOOTER -->
<footer>

    <div class="foot">

        <div>
            <div class="footbrand">
                <img src="{{ asset('logo/logo.jpg') }}" alt="PHU Logo">
                Pearl Horizon University
            </div>

            <p class="desc">
                Empowering excellence through integrated learning,
                academic administration and student management.
            </p>
        </div>

        <div>
            <h4>Quick Links</h4>

            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ url('/students') }}">Students</a></li>
                <li><a href="{{ url('/courses') }}">Courses</a></li>
            </ul>
        </div>

        <div>
            <h4>University Portals</h4>

            <ul>
                <li><a href="{{ url('/student-login') }}">Student Portal</a></li>
                <li><a href="{{ route('login') }}">Lecturer Portal</a></li>
                <li><a href="{{ route('login') }}">Staff Portal</a></li>
            </ul>
        </div>

    </div>

    <div class="copyright">
        © {{ date('Y') }} Pearl Horizon University. All rights reserved.
        <b>PHU Student Self-Service System</b>
    </div>

</footer>

<!-- ACCOUNT TYPE SCRIPT -->
<script>
(function () {

    const type = document.getElementById('account_type');
    const studentFields = document.getElementById('studentFields');
    const lecturerNote = document.getElementById('lecturerNote');
    const regNo = document.getElementById('reg_no');
    const program = document.getElementById('program');

    function showFields() {

        const isStudent = type.value === 'student';
        const isLecturer = type.value === 'lecturer';

        studentFields.style.display = isStudent ? 'block' : 'none';
        lecturerNote.style.display = isLecturer ? 'block' : 'none';

        regNo.required = isStudent;
        program.required = isStudent;
    }

    type.addEventListener('change', showFields);
    showFields();

})();
</script>

</body>
</html>
