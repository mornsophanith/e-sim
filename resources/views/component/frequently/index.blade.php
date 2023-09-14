<div class="frequently" id="faqs">
    <div class="container">
        <h4 class="title fade-animation" >{!! str_replace('{country}', "" , __('index.frequently_asked_question'))!!}</h4>
        <?php foreach( $questions as $key => $question): ?>
            <button class="accordion fade-animation"><p title="{{$question->name}}">{{$question->name}}</p></button>
            <div class="panel">
                @if($question->answer)
                    <p class="fade-animation">{{strip_tags($question->answer)}}</p>
                @else 
                    
                @endif
            </div>
        <?php endforeach?>
    </div>
    <div class="d-block"></div>
</div> 