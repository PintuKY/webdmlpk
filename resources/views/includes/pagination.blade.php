
    <ul class="pagination list-pagenat">
        @if(!$paginator->onFirstPage())
       <li class="">
           <a href="{{ $paginator->previousPageUrl() }}">
           <i class="material-icons">chevron_left</i>
            </a>
        </li>
        @else
        <li class="disabled">
            <a href="#!!">
            <i class="material-icons">chevron_left</i>
             </a>
         </li>
         @endif
         @foreach($elements as $element)
         @if(is_string($element))
         <li class="waves-effect"><a href="#!">{{ $element }}</a> </li>
         @endif
         @if(is_array($element))
        @foreach($element as $page=>$url)
        @if($page==$paginator->currentPage())
        <li class="active"><a href="#!">{{ $page }}</a> </li>
        @else
        <li class=""><a href="{{ $paginator->nextPageUrl() }}">{{ $page }}</a> </li>
        @endif
        @endforeach
        @endif
        @endforeach

        @if($paginator->hasMorePages())
            <li class="waves-effect"><a href="{{ $paginator->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a> </li>
        @else
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a> </li>
        @endif
      </ul>

