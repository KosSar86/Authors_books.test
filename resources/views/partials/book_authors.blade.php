

@foreach($book->authors as $authors)
    <a href="{{ route('author_books') }}?ID={{ $authors->id }} ">{{$authors->first_name}} {{$authors->last_name}}</a>,
@endforeach
