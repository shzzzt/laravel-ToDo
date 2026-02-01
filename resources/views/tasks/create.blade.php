<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
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
            border: 1px solid #e2e8f0;
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
        }

        .logout-btn:hover {
            background: #fef2f2;
            color: #dc2626;
        }

        .create-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(148, 163, 184, 0.1);
            border: 1px solid #e2e8f0;
        }

        .create-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .create-header h2 {
            color: #1e293b;
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        .create-header p {
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

        .form-group input,
        .form-group textarea,
        .form-group select {
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

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3b82f6;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #94a3b8;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-group select {
            cursor: pointer;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .create-btn {
            flex: 1;
            padding: 0.875rem 1rem;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
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

        .create-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }

        .create-btn:active {
            transform: translateY(0);
        }

        .cancel-btn {
            flex: 1;
            padding: 0.875rem 1rem;
            background: #f8fafc;
            color: #64748b;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            text-align: center;
            letter-spacing: 0.025em;
        }

        .cancel-btn:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
            color: #475569;
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

        @media (max-width: 640px) {
            .nav {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .create-container {
                padding: 2rem 1.5rem;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <nav class="nav">
        <h1>To-do list Manager</h1>
        <div class="nav-links">
            <a href="/tasks">To-do</a>
            <a href="/profile">Profile</a>
            <form method="POST" action="/logout" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="create-container">
        <div class="create-header">
            <h2>Create New Task</h2>
            <p>Add a new task to your list</p>
        </div>

        @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach>
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Task Title</label>
                <input type="text" id="title" name="title" placeholder="Enter task title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description (Optional)</label>
                <textarea id="description" name="description" placeholder="Enter task description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ old('status', 'pending') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="button-group">
                <button type="submit" class="create-btn">Create Task</button>
                <a href="{{ route('tasks.index') }}" class="cancel-btn">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>