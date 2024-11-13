<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div class="container">
            <h1>Tasks</h1>
            <form method="GET" action="{{route(tasks.index)}}">
                <label for="status">Filter By status</label>
                <select name="status" id="status">
                    <option value="">All</option>
                    <option value="pending">pending</option>
                    <option value="in_progress">InProgress</option>

                    <option value="completed">completed</option>
                </select>
                <button type="submit">Filter</button>
                <a href="{{route(tasks.create)}}">Create new task</a>
            </form>

            <ul>
                @foreach($tasks as $task)
                <li>{{$task->title}}--{{$task->status}}--{{$task->due_date}}</li>
                @endforeach
            </ul>
        </div>
    </body>
</html>