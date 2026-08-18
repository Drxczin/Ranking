<?php

declare(strict_types=1);

$participantes = [
    ['nome' => 'Nadone', 'pontos' => 120],
    ['nome' => 'Shaun Carneiro', 'pontos' => 185],
    ['nome' => 'Helio', 'pontos' => -22],
    ['nome' => 'Goblin', 'pontos' => 231],
];


function ordenarRanking(array $participantes): array
{
    usort(
        $participantes,
        static function (array $a, array $b): int {

            $comparacaoPontos = $b['pontos'] <=> $a['pontos'];

            if ($comparacaoPontos !== 0) {
                return $comparacaoPontos;
            }

            return strcasecmp($a['nome'], $b['nome']);
        }
    );

    return $participantes;
}

$ranking = ordenarRanking($participantes);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ranking</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #ccc;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .participante {
            display: flex;
            align-items: center;
            padding: 15px;
            margin-bottom: 10px;

            background-color: #f7f7f7;
            border-radius: 6px;
        }

        .posicao {
            width: 50px;
            font-weight: bold;
        }

        .nome {
            flex: 1;
            font-weight: bold;
        }

        .pontos {
            font-weight: bold;
            color: #333;
        }

        .primeiro {
            background-color: #fff3cd;
        }

        .segundo {
            background-color: #e9ecef;
        }

        .terceiro {
            background-color: #f8d7da;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1> Ranking</h1>

        <?php foreach ($ranking as $indice => $participante): ?>

            <?php
                $posicao = $indice + 1;

                $classe = match ($posicao) {
                    1 => 'primeiro',
                    2 => 'segundo',
                    3 => 'terceiro',
                    default => ''
                };
            ?>

            <div class="participante <?= $classe ?>">

                <div class="posicao">
                    <?= $posicao ?>º
                </div>

                <div class="nome">
                    <?= htmlspecialchars($participante['nome']) ?>
                </div>

                <div class="pontos">
                    <?= $participante['pontos'] ?> pontos
                </div>

            </div>

        <?php endforeach; ?>

    </div>

</body>

</html>