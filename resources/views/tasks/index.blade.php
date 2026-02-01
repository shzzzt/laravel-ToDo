<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
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
            border: #0c0f1b 1px solid;
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

        .tasks-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .tasks-header {
            background: #ffffff;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(148, 163, 184, 0.1);
            margin-bottom: 2rem;
            border: #0c0f1b 1px solid;
            ;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .tasks-header h2 {
            color: #1e293b;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .add-task-btn {
            background: linear-gradient(135deg, #a3c1f1 0%, #98f3d0 100%);
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border: #0c0f1b 1px solid;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: inherit;
            text-decoration: none;
            transition: all 0.2s ease;
            letter-spacing: 0.025em;
        }

        .task-card {
            background: #ffffff;
            border-radius: 12px;
            border: #0c0f1b 1px solid;
            box-shadow: 0 4px 12px rgba(148, 163, 184, 0.1);
            margin-bottom: 1rem;
            overflow: hidden;
            transition: all 0.2s ease;
        }

        .task-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(148, 163, 184, 0.15);
        }

        .task-content {
            padding: 1.5rem;
        }

        .task-title {
            color: #1e293b;
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .task-status {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .task-status.pending {
            background: #fef3c7;
            color: #d97706;
        }

        .task-status.completed {
            background: #d1fae5;
            color: #059669;
        }

        .task-description {
            color: #64748b;
            font-size: 0.875rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .task-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            color: #94a3b8;
        }

        .task-actions {
            display: flex;
            gap: 0.5rem;
            padding: 1rem 1.5rem;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .task-actions a {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .edit-btn {
            background: #eff6ff;
            color: #3b82f6;
        }

        .edit-btn:hover {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .delete-btn {
            background: #fef2f2;
            color: #dc2626;
        }

        .delete-btn:hover {
            background: #fee2e2;
            color: #b91c1c;
        }

        .empty-state {
            background: #ffffff;
            padding: 3rem 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(148, 163, 184, 0.1);
            border: 1px solid #e2e8f0;
            text-align: center;
            color: #64748b;
        }

        .empty-state h3 {
            color: #1e293b;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            margin-bottom: 2rem;
        }

        .success-message {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 2rem;
            color: #166534;
            font-size: 0.875rem;
        }

        @media (max-width: 640px) {
            .nav {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .tasks-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .task-meta {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
            }

            .task-actions {
                flex-direction: column;
            }

            .task-actions a {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <nav class="nav">
        <h1>To do list!</h1>
        <div class="nav-links">
            <a href="{{ route('tasks.index') }}">To-do</a>
            <a href="{{ route('profile.show') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="tasks-container">
        <div class="tasks-header">
            <h2>My To-do list</h2>
            <a href="{{ route('tasks.create') }}" class="add-task-btn">+ Add New Task</a>
        </div>

        @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif

        @if($tasks->count() > 0)
        @foreach($tasks as $task)
        <div class="task-card">
            <div class="task-content">
                <div class="task-title">
                    {{ $task->title }}
                    <span class="task-status {{ $task->status }}">
                        {{ ucfirst($task->status) }}
                    </span>
                </div>
                @if($task->description)
                <div class="task-description">
                    {{ $task->description }}
                </div>
                @endif
                <div class="task-meta">
                    <span>Created: {{ $task->created_at->format('M j, Y') }}</span>
                    @if($task->updated_at != $task->created_at)
                    <span>Updated: {{ $task->updated_at->format('M j, Y') }}</span>
                    @endif
                </div>
            </div>
            <div class="task-actions">
                <a href="{{ route('tasks.edit', $task) }}" class="edit-btn">Edit</a>
                <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn" style="border: none; background: none; cursor: pointer; padding: 0.5rem 1rem; border-radius: 6px; font-size: 0.875rem; font-weight: 500; transition: all 0.2s ease;" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
        @else
        <div class="empty-state">
            <h3>No tasks yet</h3>
            <p>Get started by creating your first task!</p>
            <a href="{{ route('tasks.create') }}" class="add-task-btn" style="display: inline-block; margin-top: 1rem;">Create Your First Task</a>
        </div>
        @endif
    </div>
</body>

</html>