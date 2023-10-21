<!doctype html>
<html>

{!! packagemaker::htmlhead() !!}

<body>

  @if(isset($content))

    {!! $content !!}
    
  @endif

  {!! packagemaker::htmlend() !!}

</body>

</html>
