<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class CleanTempImages extends Command
{
    protected $signature = 'cleanup:temp-images';
    protected $description = 'Menghapus gambar sampah di folder temp yang usianya lebih dari 24 jam';

    public function handle()
    {
        $directory = 'uploads/temp'; 
        $disk = Storage::disk('public');

        if (!$disk->exists($directory)) {
            $this->info("Folder {$directory} tidak ditemukan.");
            return;
        }

        $files = $disk->files($directory);
        $deletedCount = 0;
        $now = Carbon::now();

        $this->info("Memulai pemindaian file sampah...");

        foreach ($files as $file) {
            $lastModified = Carbon::createFromTimestamp($disk->lastModified($file));
            
            if ($now->diffInHours($lastModified) >= 24) {
                $disk->delete($file);
                $deletedCount++;
            }
        }

        if ($deletedCount > 0) {
            $this->info("Berhasil SAPU BERSIH! {$deletedCount} file usang telah dilenyapkan dari folder {$directory}.");
        } else {
            $this->info("Folder {$directory} aman. Tidak ada file yang usianya lebih dari 24 jam.");
        }
    }
}