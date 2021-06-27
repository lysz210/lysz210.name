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
    ]
];
