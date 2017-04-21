<ul class="media-list">
    <li class="media">
        <div class="media-body">
             <table class="table table-striped">
                <thead>
                    <th>id</th>
                    <th>内容</th>
                    <th>ｽﾃｰﾀｽ</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <?php $user = $task->user; ?>
                        <tr>
                            <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} </td>
                            <td>{{ $task->content }}</td>
                            <td>{{ $task->status }}</td>
                            <td>
                                @if (Auth::user()->id == $task->user_id)
                                    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                @endif

                            </td>
                        </tr>
                    @endforeach
                        
                </tbody>
            </table>    
        </div>
    </li>
</ul>
{!! $tasks->render() !!}