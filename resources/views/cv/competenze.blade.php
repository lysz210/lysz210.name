<section id="competenze_personali">
    <h1>{{ __('cv.competenze.title') }}</h1>

    <dl>

        <dt>
            {{ __('cv.competenze.lingue.madre.title') }}
        </dt>
        <dd>
            {{ __('cv.competenze.lingue.madre.content') }}
        </dd>

        <dt>
            {{ __('cv.competenze.lingue.altre.title') }}
        </dt>
        <dd>
            <table>
                <thead>
                    <tr>
                        <th> </th>
                        @foreach(__('cv.competenze.lingue.altre.cols') as $col)
                        <th>{{ $col }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach(__('cv.competenze.lingue.altre.list') as $lingua)
                    <tr>
                        <td>{{ $lingua['name'] }}</td>
                        @foreach(__('cv.competenze.lingue.altre.cols') as $k => $v)
                        <td>{{ $lingua[$k] }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            {!! __('cv.competenze.lingue.altre.footer') !!}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </dd>

        <dt>
            Competenze informatiche
        </dt>
        <dd>
            <ul>
                <li>
                    Database NoSQL
                    <ul>
                        <li>CouchDB</li>
                        <li>mongodb</li>
                    </ul>
                </li>
                <li>
                    Programmazione in javascript
                    <ul>
                        <li>
                            Lato client
                            <ul>
                                <li>Uso di librerie base. Jquery</li>
                                <li>Comunicazione con Socket.io, ajax, rest API</li>
                                <li>Pouchdb per l'uso di database in locate e in remote</li>
                            </ul>
                        </li>
                        <li>
                            Lato server(Nodejs)
                            <ul>
                                <li>Creazione base di server http</li>
                                <li>Creazione di script generici per cron</li>
                                <li>Gestione connessione a DBMS</li>
                                <li>Creazione librerie</li>
                            </ul>
                        </li>
                        <li>
                            Frameworks
                            <ul>
                                <li>Vuejs</li>
                                <li>Quasarjs (Vuejs)</li>
                                <li>Vuetify (Vuejs)</li>
                                <li>Nuxt (Vuejs)</li>
                                <li>Angular consonscienza base</li>
                            </ul>
                        </li>
                        <li>
                            Librerie
                            <ul>
                                <li>PouchDB</li>
                                <li>Axiosjs</li>
                                <li>Rxjs</li>
                                <li>Bookshelf</li>
                                <li>lodash</li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    Programmazione in PHP
                    <ul>
                        <li>Uso di composer, compresa la preparazione di repository</li>
                        <li>Framework
                            <ul>
                                <li>Laravel</li>
                                <li>Zend Framework (solo moduli, principalmente Mail e DB)</li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    Creazione di siti in HTML/CSS
                </li>
                <li>Styling avanzato
                    <ul>
                        <li>SASS/SCSS</li>
                        <li>Stylus</li>
                        <li>Bootstrap</li>
                    </ul>
                </li>
                <li>
                    Programmazione base in java
                </li>
                <li>
                    Programmazione base in python
                </li>
                <li>
                    Conoscenza basi di Django
                </li>
                <li>
                    Conoscenza basilare di Assembler
                </li>
                <li>
                    Creazione e gestioni basi di dati in PostgreSQL/MySQL
                </li>
                <li>
                    Programmazione base di linguaggio funzionale (CaML)
                </li>
                <li>
                    Programmazione base di C
                </li>
                <li>
                    Conoscenze basilari di R
                </li>
                <li>
                    Buona padronanza degli strumenti Microsoft Office
                </li>
            </ul>
        </dd>

        <dt>
            Patende di guida
        </dt>
        <dd>
            B
        </dd>
    </dl>
</section>
