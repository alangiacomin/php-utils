<?php

dataset('guid.valid', [
    // senza trattini con lettere maiuscole, minuscole, miste
    "C8E067BA7F7C4411B8EF7ED357EA18FD",
    "c8e067ba7f7c4411b8ef7ed357ea18fd",
    "C8E067BA7f7c4411b8ef7ED357EA18FD",
    // con trattini con lettere maiuscole, minuscole, miste
    "C8E067BA-7F7C-4411-B8EF-7ED357EA18FD",
    "c8e067ba-7f7c-4411-b8ef-7ed357ea18fd",
    "C8E067BA-7f7c-4411-b8ef-7ED357EA18FD",
]);

dataset('guid.wrong', function () {
    // senza trattini troppo corto
    yield "C8E067BA7F7C4411B8EF7ED357EA18F";
    yield "c8e067ba7f7c4411b8ef7ed357ea18f";
    yield "C8E067BA7f7c4411b8ef7ED357EA18F";
    // senza trattini troppo lungo
    yield "C8E067BA7F7C4411B8EF7ED357EA18FD9";
    yield "c8e067ba7f7c4411b8ef7ed357ea18fD9";
    yield "C8E067BA7f7c4411b8ef7ED357EA18FD9";
    // troppi trattini
    yield "C8E0-67BA-7F7C-4411-B8EF-7ED357EA18FD";
    yield "c8e0-67ba-7f7c-4411-b8ef-7ed357ea18fd";
    yield "C8E0-67BA-7f7c-4411-b8ef-7ED357EA18FD";
    // pochi trattini
    yield "C8E067BA-7F7C-4411B8EF-7ED357EA18FD";
    yield "c8e067ba-7f7c-4411b8ef-7ed357ea18fd";
    yield "C8E067BA-7f7c-4411b8ef-7ED357EA18FD";

    // senza trattini, lettere non valide (prima lettera)
    for ($i = 'g'; $i < 'z'; $i++) {
        yield strtolower((string)$i) . "8E067BA7f7c4411b8ef7ED357EA18FD";
        yield strtoupper((string)$i) . "8E067BA7f7c4411b8ef7ED357EA18FD";
    }

    // con trattini, lettere non valide (prima lettera primo gruppo)
    for ($i = 'g'; $i < 'z'; $i++) {
        yield strtolower((string)$i) . "8E067BA-7f7c-4411b8ef-7ED357EA18FD";
        yield strtoupper((string)$i) . "8E067BA-7f7c-4411b8ef-7ED357EA18FD";
    }

    // con trattini, lettere non valide (prima lettera secondo gruppo)
    for ($i = 'g'; $i < 'z'; $i++) {
        yield "C8E067BA-" . strtolower((string)$i) . "f7c-4411b8ef-7ED357EA18FD";
        yield "C8E067BA-" . strtoupper((string)$i) . "f7c-4411b8ef-7ED357EA18FD";
    }

    // con trattini, lettere non valide (prima lettera terzo gruppo)
    for ($i = 'g'; $i < 'z'; $i++) {
        yield "C8E067BA-5f7c-" . strtolower((string)$i) . "411b8ef-7ED357EA18FD";
        yield "C8E067BA-5f7c-" . strtoupper((string)$i) . "411b8ef-7ED357EA18FD";
    }

    // con trattini, lettere non valide (prima lettera quarto gruppo)
    for ($i = 'g'; $i < 'z'; $i++) {
        yield "C8E067BA-2f7c-4411b8ef-" . strtolower((string)$i) . "ED357EA18FD";
        yield "C8E067BA-2f7c-4411b8ef-" . strtoupper((string)$i) . "ED357EA18FD";
    }
});
