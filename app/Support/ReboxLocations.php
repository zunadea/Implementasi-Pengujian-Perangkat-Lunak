<?php

namespace App\Support;

class ReboxLocations
{
    public static function all(): array
    {
        $images = [
            'images/GambarcardRebox1.png',
            'images/GambarcardRebox2.png',
            'images/GambarcardRebox3.png',
            'images/GambarcardRebox4.png',
        ];

        $locations = [
            ['name' => 'Andir', 'code' => 'AD-01'],
            ['name' => 'Antapani', 'code' => 'AT-02'],
            ['name' => 'Arcamanik', 'code' => 'AR-03'],
            ['name' => 'Astana Anyar', 'code' => 'AA-04'],
            ['name' => 'Babakan Ciparay', 'code' => 'BC-05'],
            ['name' => 'Bandung Kidul', 'code' => 'BK-06'],
            ['name' => 'Bandung Kulon', 'code' => 'BL-07'],
            ['name' => 'Bandung Wetan', 'code' => 'BW-08'],
            ['name' => 'Batununggal', 'code' => 'BN-09'],
            ['name' => 'Bojongloa Kaler', 'code' => 'BJ-10'],
            ['name' => 'Bojongloa Kidul', 'code' => 'BD-11'],
            ['name' => 'BuahBatu', 'code' => 'BB-12'],
            ['name' => 'Cibeunying Kaler', 'code' => 'CK-13'],
            ['name' => 'Cibeunying Kidul', 'code' => 'CD-14'],
            ['name' => 'Cibiru', 'code' => 'CB-15'],
            ['name' => 'Cicendo', 'code' => 'CI-16'],
            ['name' => 'Cidadap', 'code' => 'CP-17'],
            ['name' => 'Cinambo', 'code' => 'CN-18'],
            ['name' => 'Coblong', 'code' => 'CG-19'],
            ['name' => 'Gedebage', 'code' => 'GB-20'],
            ['name' => 'Kiaracondong', 'code' => 'KC-21'],
            ['name' => 'Lengkong', 'code' => 'LG-22'],
            ['name' => 'Mandalajati', 'code' => 'MJ-23'],
            ['name' => 'Panyileukan', 'code' => 'PY-24'],
            ['name' => 'Rancasari', 'code' => 'RC-25'],
            ['name' => 'Regol', 'code' => 'RG-26'],
            ['name' => 'Sukajadi', 'code' => 'SJ-27'],
            ['name' => 'Sukasari', 'code' => 'SS-28'],
            ['name' => 'Sumur Bandung', 'code' => 'SB-29'],
            ['name' => 'Ujungberung', 'code' => 'UB-30'],
            ['name' => 'Dago', 'code' => 'DG-31'],
            ['name' => 'Pasteur', 'code' => 'PS-32'],
            ['name' => 'Braga', 'code' => 'BR-33'],
            ['name' => 'Cihampelas', 'code' => 'CH-34'],
            ['name' => 'Setiabudi', 'code' => 'ST-35'],
            ['name' => 'Leuwipanjang', 'code' => 'LP-36'],
            ['name' => 'Soekarno Hatta', 'code' => 'SH-37'],
            ['name' => 'Cicaheum', 'code' => 'CC-38'],
            ['name' => 'BuahBatu Tengah', 'code' => 'BT-39'],
            ['name' => 'Asia Afrika', 'code' => 'AF-40'],
        ];

        return collect($locations)->map(fn ($location, $index) => [
            'id' => $index + 1,
            'name' => $location['name'],
            'title' => 'Rebox ' . $location['name'],
            'area' => $location['name'] . ', Kota Bandung',
            'distance' => ($index % 5) + 1 . '.' . ($index % 8) . ' km',
            'code' => $location['code'],
            'image' => asset($images[$index % count($images)]),
        ])->all();
    }

    public static function findByCode(string $code): ?array
    {
        $normalizedCode = self::normalizeCode($code);

        return collect(self::all())->firstWhere('code', $normalizedCode);
    }

    public static function extractCode(string $value): string
    {
        $normalizedValue = self::normalizeCode($value);

        if (preg_match('/[A-Z]{2}-\d{2}/', $normalizedValue, $matches)) {
            return $matches[0];
        }

        return $normalizedValue;
    }

    public static function normalizeCode(string $code): string
    {
        return strtoupper(trim($code));
    }
}
