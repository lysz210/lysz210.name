<section id="informazioni_personali">
    <h1>Informazioni personali</h1>
    <dl>
        <dt>
            Nome e Cognome
        </dt>
        <dd>
            <p>
                <span id="nome">Lingyong</span> <span id="cognome">Sun</span>
            </p>
        </dd>
        <dt>
            Contatti social
        </dt>
        <dd>
            <dl id="contatti_social">
                @foreach (json_decode(Storage::disk('public')->get('data/me/social-accounts.json')) as $social)
                <dt>{{ $social->name }}</dt>
                <dd>
                    <a href="{{ $social->url }}">{{ $social->username }}</a>
                </dd>
                @endforeach
                <dt>
                    Skype
                </dt>
                <dd>
                    lysz210
                </dd>
                <dt class="print_only">
                    Curriculum online
                </dt>
                <dd class="print_only">
                    <a href="{{Request::url()}}" target="blank">Curriculum vitae online</a>
                </dd>
            </dl>
        </dd>
    </dl>
</section>