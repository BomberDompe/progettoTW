@php
        if (empty($imgFile)) {
            $imgFile = 'default.jpg';
        }
        
        if (null !== $attrs) {
            $attrs = 'class="' . $attrs . '"';
        }
@endphp
<img src="{{ asset('images/offers/' . $imgFile) }}" {!! $attrs !!}>