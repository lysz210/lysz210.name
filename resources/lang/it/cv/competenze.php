<?php
$tmpfoot = <<<FOOT
Livelli: A1/2 Livello base - B1/2 Livello intermedio - C1/2 Livello avanzato
<br />
Quadro Comune Europeo di Riferimento delle Lingue
FOOT;
return [
    "title" => "Competenze personali",
    "lingue" => [
        "madre" => [
            "title" => "Lingua madre",
            "content" => "Italiano"
        ],
        "altre" => [
            "title" => "Altre lingue",
            "cols" => [
                "comprensione" => "Comprensione",
                "parlato" => "Parlato",
                "scritto" => "Scritto"
            ],
            "list" => [
                "inglese" => [
                    "name" => "Inglese",
                    "comprensione" => "B2",
                    "parlato" => "B2",
                    "scritto" => "B2"
                ],
                "francese" => [
                    "name" => "francese",
                    "comprensione" => "A1",
                    "parlato" => "A1",
                    "scritto" => "A1"
                ],
            ],
            "footer" => $tmpfoot
        ]
    ],
    "informatiche" => [
        "title" => "Competenze informatiche",
        "list" => [
            [
                "title" => "Database NoSQL",
                "content" => [
                    "CouchDB",
                    "mongodb"
                ]
            ],
            [
                "title" => "Programmazione in javascript",
                "content" => [
                    [
                        "title" => "Lato client",
                        "content" => [
                            "Uso di librerie base. Jquery",
                            "Comunicazione con Socket.io, ajax, rest API",
                            "Pouchdb per l'uso di database in locate e in remote",
                        ]
                    ],
                    [
                        "title" => "Lato server(Nodejs)",
                        "content" => [
                            "reazione base di server http",
                            "reazione di script generici per cron",
                            "estione connessione a DBMS",
                            "reazione librerie"
                        ]
                    ],
                    [
                        "title" => "Frameworks",
                        "content" => [
                            "Vuejs",
                            "Quasarjs (Vuejs)",
                            "Vuetify (Vuejs)",
                            "Nuxt (Vuejs)",
                            "Angular consonscienza base"
                        ]
                    ],
                    [
                        "title" => "Librerie",
                        "content" => [
                            "PouchDB",
                            "Axiosjs",
                            "Rxjs",
                            "Bookshelf",
                            "lodash"
                        ]
                    ],
                ]
            ],
            [
                "title" => "Programmazione in PHP",
                "content" => [
                    "Uso di composer, compresa la preparazione di repository",
                    [
                        "title" => "Frameworks",
                        "content" => [
                            "Laravel",
                            "Zend Framework (solo moduli, principalmente Mail e DB)"
                        ]
                    ],
                ]
            ],
            [
                "title" => "Creazione di siti in HTML/CSS",
                "content" => [
                    [
                        "title" => "Styling avanzato",
                        "content" => [
                            "SASS/SCSS",
                            "Stylus",
                            "Bootstrap",
                        ]
                    ]
                ]
            ],
            "Programmazione base in java",
            "Programmazione base in python",
            "Conoscenza basi di Django",
            "Conoscenza basilare di Assembler",
            "Creazione e gestioni basi di dati in PostgreSQL/MySQL",
            "Programmazione base di linguaggio funzionale (CaML)",
            "Programmazione base di C",
            "Conoscenze basilari di R",
            "Buona padronanza degli strumenti Microsoft Office",
        ]
    ],
    "patente" => [
        "title" => "Patende di guida",
        "content" => "B"
    ]
];
