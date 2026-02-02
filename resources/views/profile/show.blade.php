
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'JetBrains Mono', 'Fira Code', 'Source Code Pro', monospace;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .nav {
            background: #ffffff;
            padding: 1rem 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(148, 163, 184, 0.1);
            margin-bottom: 2rem;
            border: #0c0f1b 1px solid;  
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav h1 {
            color: #1e293b;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .nav-links a,
        .nav-links form {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .nav-links a:hover {
            background: #eff6ff;
            color: #1d4ed8;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #3b82f6;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: inherit;
            font-size: inherit;
            border: #0c0f1b 1px solid;
        }

        .logout-btn:hover {
            background: #fef2f2;
            color: #dc2626;
        }

        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(148, 163, 184, 0.1);
            border: #0c0f1b 1px solid;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .profile-header h2 {
            color: #1e293b;
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        .profile-header p {
            color: #64748b;
            font-size: 0.875rem;
        }
        .profile-pic {
            display: flex; 
            align-items: center;       
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

        .update-btn {
            width: 100%;
            padding: 0.875rem 1rem;
            background: linear-gradient(135deg, #a3c1f1 0%, #98f3d0 100%);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s ease;
            letter-spacing: 0.025em;
        }

        .update-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }

        .update-btn:active {
            transform: translateY(0);
        }

        .upload-pic-btn {
            width: 100%;
            padding: 0.875rem 1rem;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: inherit;
        }
        

        .success-message {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #166534;
            font-size: 0.875rem;
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

        .current-info {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .current-info h3 {
            color: #1e293b;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #64748b;
            font-size: 0.875rem;
        }

        .info-value {
            color: #1e293b;
            font-weight: 500;
        }

        @media (max-width: 640px) {
            .nav {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .profile-container {
                padding: 2rem 1.5rem;
            }

            .nav-links {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <nav class="nav">
        <h1>To do list!</h1>
        <div class="nav-links">
            <a href="/tasks">To-do</a>
            <a href="/profile">Profile</a>
            <form method="POST" action="/logout" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="profile-container">
        <div class="profile-header">
            <h2>Profile Settings</h2>
            <p>Update your account information</p>
        </div>

        @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="current-info">
            <h3>Current Information</h3>
            <div class="profile-pic">
                @if($user && $user->profile_image && Storage::disk('public')->exists($user->profile_image))
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" width="150">
                @else
                    <img src="{{ asset('default-avatar.png') }}" alt="Default Image" width="150">
                @endif
            </div>

            <div class="info-item">
                <span class="info-label">Name:</span>
                <span class="info-value">{{ $user->name }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Email:</span>
                <span class="info-value">{{ $user->email }}</span>
            </div>
        </div>
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="profile_image">Choose Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*">
                @if($user->profile_image)
                    <p style="margin-top: 0.5rem; font-size: 0.75rem; color: #64748b;">
                        Current: <a href="{{ asset('storage/' . $user->profile_pic) }}" target="_blank">{{ basename($user->pfp) }}</a>
                    </p>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
        

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">New Password (leave blank to keep current)</label>
                <input type="password" id="password" name="password" placeholder="Enter new password">
            </div>

            <button type="submit" class="update-btn">Update Profile</button>
        </form>
    </div>
</body>

</html>