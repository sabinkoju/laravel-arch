<table>
    <thead>
    <tr>
        <th style="width: 10px">SN</th>
        <th>Title</th>
        <th style="width: 50px">Type</th>
        <th>Date</th>
        <th style="width: 50px" class="text-right">{{trans('app.action')}}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($feedbacks as $key=>$feedback)
        <tr>
            <th scope=row>{{++$key}}</th>
            <td>{{$feedback->title}}</td>
            <td>
                @if($feedback->category == 'bug')
                    <button class="btn btn-block btn-danger btn-xs">Bug / Error</button>
                @elseif($feedback->category == 'suggestion')
                    <button class="btn btn-block btn-primary btn-xs">Suggestion</button>
                @else
                    <button class="btn btn-block btn-success btn-xs">Feedback</button>
                @endif
            </td>
            <td>{{$feedback->date}}</td>
            <td class="text-right">
                <a href="{{url('feedback/'.$feedback->id .'/edit')}}"
                   class="text-info btn btn-xs btn-default">
                    <i class="fa fa-pencil-square-o"></i>
                </a>
                <a href="{{url('feedback/'.$feedback->id)}}"
                   class="text-info btn btn-xs btn-default">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
        </tr>
    @empty
    @endforelse
    </tbody>
</table>