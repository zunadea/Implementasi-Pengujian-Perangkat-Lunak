<?php

namespace Tests\Support;

use Illuminate\Http\UploadedFile;

trait FakesUploadedImages
{
    protected function fakeImage(string $name = 'image.png', int $kilobytes = 500): UploadedFile
    {
        $png = base64_decode(
            'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAFgwJ/luz56wAAAABJRU5ErkJggg=='
        );

        return UploadedFile::fake()
            ->createWithContent($name, str_pad($png, $kilobytes * 1024, '0'));
    }

    protected function fakeInvalidImage(string $name = 'not-image.jpg', int $kilobytes = 500): UploadedFile
    {
        config([
            'livewire.temporary_file_upload.preview_mimes' => [
                'png', 'gif', 'bmp', 'svg', 'wav', 'mp4', 'mov', 'avi',
                'wmv', 'mp3', 'm4a', 'jpg', 'jpeg', 'mpga', 'webp', 'wma', 'pdf',
            ],
        ]);

        return UploadedFile::fake()
            ->create($name === 'not-image.jpg' ? 'not-image.pdf' : $name, $kilobytes, 'application/pdf');
    }
}
