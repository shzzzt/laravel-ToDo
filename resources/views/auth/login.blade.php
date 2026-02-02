<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'JetBrains Mono',  monospace;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex; /* Use flexbox for centering */
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(148, 163, 184, 0.1);
            width: 100%;
            max-width: 400px;
            border: #0c0f1b 1px solid;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h2 {
            color: #1e293b;
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 0.5rem; /* Adjusted margin for spacing */
            letter-spacing: -0.025em; /* Slightly tighter letter spacing */
        }

        .login-header p {
            color: #64748b;
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: #374151;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            letter-spacing: 0.025em;
        }

        .form-group input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.875rem;
            font-family: inherit;
            background: #f8fafc;
            transition: all 0.2s ease;
            color: #1e293b;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3b82f6;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-group input::placeholder {
            color: #94a3b8;
        }

        .login-btn {
            width: 100%;
            padding: 0.875rem 1rem;
            background: linear-gradient(135deg, #a3c1f1 0%, #98f3d0 100%);
            color: #ffffff;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: inherit; /*inherit font from body*/
            cursor: pointer;
            transition: all 0.2s ease;
            letter-spacing: 0.025em;
            border: #0c0f1b 1px solid;
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .errors {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .errors ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .errors li {
            color: #dc2626;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e2e8f0;
        }

        .register-link p {
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .register-link a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .register-link a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        @media (max-width: 640px) {
            .login-container {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Sign in to your account</p>
        </div>

        @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="login-btn">Sign In</button>
        </form>

        <div class="register-link">
            <p>Don't have an account?</p>
            <a href="/register">Create one here</a>
        </div>
    </div>
</body>

</html>