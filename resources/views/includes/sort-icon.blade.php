@if ($sortBy !== $field)
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460 1000"><path d="M230 0l230 364H0L230 0m0 1000L0 634h460l-230 366"/></svg>
@elseif ($sortDirection === 'asc')
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460 1000"><path d="M0 700l230-400 230 400H0"/></svg>
@else
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460 1000"><path d="M460 300L230 700 0 300h460"/></svg>
@endif
