<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class FileService
{
    protected $disk;

    public function __construct($disk = 'public')
    {
        $this->disk = $disk;
    }

    public function save(UploadedFile $file, string $path): string
    {
        $filename = Uuid::fromDateTime(now()) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($path, $filename, $this->disk);
    }

    public function update(UploadedFile $file, string $path, $old_image = null): string
    {
        if ($old_image) {
            $this->delete($old_image);
        }

        return $this->save($file, $path);
    }

    public function delete(string $path): bool
    {
        return Storage::disk($this->disk)->delete($path);
    }
}
