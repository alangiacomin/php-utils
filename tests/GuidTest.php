<?php

declare(strict_types=1);

use Alangiacomin\PhpUtils\Guid;
use PHPUnit\Framework\TestCase;

final class GuidTest extends TestCase
{
    /**
     * @test
     * @group newGuid
     */
    public function newValueIsString(): void
    {
        $this->assertEquals(
            true,
            is_string(Guid::newGuid())
        );
    }

    /**
     * @test
     * @group isValid
     * @dataProvider validGuid
     */
    public function isValidShouldReturnTrue(string $guid): void
    {
        $this->assertEquals(
            true,
            Guid::isValid($guid)
        );
    }

    /**
     * @test
     * @group isValid
     * @dataProvider wrongGuid
     */
    public function isValidShouldReturnFalse(string $guid): void
    {
        $this->assertEquals(
            false,
            Guid::isValid($guid)
        );
    }

    /**
     * Data Provider
     */
    public function validGuid(): array
    {
        return [
            // senza trattini con lettere maiuscole, minuscole, miste
            ["C8E067BA7F7C4411B8EF7ED357EA18FD"],
            ["c8e067ba7f7c4411b8ef7ed357ea18fd"],
            ["C8E067BA7f7c4411b8ef7ED357EA18FD"],
            // con trattini con lettere maiuscole, minuscole, miste
            ["C8E067BA-7F7C-4411-B8EF-7ED357EA18FD"],
            ["c8e067ba-7f7c-4411-b8ef-7ed357ea18fd"],
            ["C8E067BA-7f7c-4411-b8ef-7ED357EA18FD"],
        ];
    }

    /**
     * Data Provider
     */
    public function wrongGuid(): array
    {
        $guids = [
            // senza trattini troppo corto
            ["C8E067BA7F7C4411B8EF7ED357EA18F"],
            ["c8e067ba7f7c4411b8ef7ed357ea18f"],
            ["C8E067BA7f7c4411b8ef7ED357EA18F"],
            // senza trattini troppo lungo
            ["C8E067BA7F7C4411B8EF7ED357EA18FD9"],
            ["c8e067ba7f7c4411b8ef7ed357ea18fD9"],
            ["C8E067BA7f7c4411b8ef7ED357EA18FD9"],
            // troppi trattini
            ["C8E0-67BA-7F7C-4411-B8EF-7ED357EA18FD"],
            ["c8e0-67ba-7f7c-4411-b8ef-7ed357ea18fd"],
            ["C8E0-67BA-7f7c-4411-b8ef-7ED357EA18FD"],
            // pochi trattini
            ["C8E067BA-7F7C-4411B8EF-7ED357EA18FD"],
            ["c8e067ba-7f7c-4411b8ef-7ed357ea18fd"],
            ["C8E067BA-7f7c-4411b8ef-7ED357EA18FD"],
        ];

        // senza trattini, lettere non valide (prima lettera)
        for ($i = 'g'; $i < 'z'; $i++) {
            $guids[] = [strtolower((string)$i) . "8E067BA7f7c4411b8ef7ED357EA18FD"];
            $guids[] = [strtoupper((string)$i) . "8E067BA7f7c4411b8ef7ED357EA18FD"];
        }

        // con trattini, lettere non valide (prima lettera primo gruppo)
        for ($i = 'g'; $i < 'z'; $i++) {
            $guids[] = [strtolower((string)$i) . "8E067BA-7f7c-4411b8ef-7ED357EA18FD"];
            $guids[] = [strtoupper((string)$i) . "8E067BA-7f7c-4411b8ef-7ED357EA18FD"];
        }

        // con trattini, lettere non valide (prima lettera secondo gruppo)
        for ($i = 'g'; $i < 'z'; $i++) {
            $guids[] = ["C8E067BA-" . strtolower((string)$i) . "f7c-4411b8ef-7ED357EA18FD"];
            $guids[] = ["C8E067BA-" . strtoupper((string)$i) . "f7c-4411b8ef-7ED357EA18FD"];
        }

        // con trattini, lettere non valide (prima lettera terzo gruppo)
        for ($i = 'g'; $i < 'z'; $i++) {
            $guids[] = ["C8E067BA-5f7c-" . strtolower((string)$i) . "411b8ef-7ED357EA18FD"];
            $guids[] = ["C8E067BA-5f7c-" . strtoupper((string)$i) . "411b8ef-7ED357EA18FD"];
        }

        // con trattini, lettere non valide (prima lettera quarto gruppo)
        for ($i = 'g'; $i < 'z'; $i++) {
            $guids[] = ["C8E067BA-2f7c-4411b8ef-" . strtolower((string)$i) . "ED357EA18FD"];
            $guids[] = ["C8E067BA-2f7c-4411b8ef-" . strtoupper((string)$i) . "ED357EA18FD"];
        }

        return $guids;
    }
}
