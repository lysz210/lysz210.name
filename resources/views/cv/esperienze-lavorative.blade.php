<section id="esperienze_professionali">
    <h1>{{__('cv.lavoro.title')}}</h1>
    <dl>
    @foreach(__('cv.lavoro.esperienze') as $esperienza)
        <dt>{{$esperienza['periodo']}}</dt>
        <dd>
            <h2>{!! $esperienza['ruolo'] !!}</h2>
            <p>
                {!! $esperienza['azienda'] !!}
            </p>
            <ul>
            @foreach($esperienza['attivita'] as $attivita)
                <li>{{ $attivita }}</li>
            @endforeach
            </ul>
            <p class="settore">
                {{ $esperienza['settore'] }}
            </p>
        </dd>
    @endforeach
</section>
