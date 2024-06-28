<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
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
        $path = rtrim($path,'/');
        $filename = Uuid::fromDateTime(now()) . '.' . $file->getClientOriginalExtension();

        return $this->url($file->storeAs($path, $filename, $this->disk));
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
        $path = get_path_from_url($path, ['/storage', 'storage']);
        return Storage::disk($this->disk)->delete($path);
    }

    private function url($filepath)
    {
        return Storage::disk($this->disk)->url($filepath);
    }
}
