<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Upload dan Resize Gambar
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @param  string $directory
     * @param  string $fileName
     * @param  int|null $width
     * @param  int|null $height
     * @return string
     * @throws \Exception
     */
    public static function uploadAndResize($file, $directory, $fileName, $width = null, $height = null)
    {
        $destinationPath = public_path($directory);
        $extension = strtolower($file->getClientOriginalExtension());
        $image = null;

        // Tentukan metode pembuatan gambar berdasarkan ekstensi file
        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $image = imagecreatefromjpeg($file->getRealPath());
                break;
            case 'png':
                $image = imagecreatefrompng($file->getRealPath());
                break;
            case 'gif':
                $image = imagecreatefromgif($file->getRealPath());
                break;
            default:
                throw new \Exception('Unsupported image type');
        }

        // Resize gambar jika lebar diset
        if ($width) {
            $oldWidth = imagesx($image);
            $oldHeight = imagesy($image);
            $aspectRatio = $oldWidth / $oldHeight;

            if (!$height) {
                $height = $width / $aspectRatio; // Hitung tinggi dengan mempertahankan aspek rasio
            }

            $newImage = imagecreatetruecolor($width, $height);
            imagecopyresampled(
                $newImage,
                $image,
                0, 0, 0, 0,
                $width, $height,
                $oldWidth, $oldHeight
            );

            imagedestroy($image);
            $image = $newImage;
        }

        // Simpan gambar dengan kualitas asli
        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                imagejpeg($image, $destinationPath . '/' . $fileName);
                break;
            case 'png':
                imagepng($image, $destinationPath . '/' . $fileName);
                break;
            case 'gif':
                imagegif($image, $destinationPath . '/' . $fileName);
                break;
        }

        // Hapus sumber daya gambar dari memori
        imagedestroy($image);

        return $fileName;
    }
}