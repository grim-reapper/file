<?php
declare(strict_types=1);

namespace Imran\File;

use Imran\File\Contract\FileInterface;

class File implements FileInterface
{
    /**
     * Get the contents of a file.
     *
     * @param  string  $path
     * @return string
     *
     * @throws \Exception
     */
    public static function get(string $path): string
    {
        if (!file_exists($path)) {
            throw new \Exception("File does not exist at path [{$path}].");
        }

        return file_get_contents($path);
    }

    /**
     * Write the contents of a file.
     *
     * @param  string  $path
     * @param  string  $contents
     * @param  bool  $lock
     * @return int
     */
    public static function put(string $path, string $contents, bool $lock = false): int
    {
        return file_put_contents($path, $contents, $lock ? LOCK_EX : 0);
    }

    /**
     * Append to a file.
     *
     * @param  string  $path
     * @param  string  $data
     * @return int
     */
    public static function append(string $path, string $data): int
    {
        return file_put_contents($path, $data, FILE_APPEND | LOCK_EX);
    }

    /**
     * Delete a file.
     *
     * @param  string  $path
     * @return bool
     */
    public static function delete(string $path): bool
    {
        if (file_exists($path)) {
            return unlink($path);
        }

        return false;
    }

    /**
     * Determine if a file exists.
     *
     * @param  string  $path
     * @return bool
     */
    public static function exists(string $path): bool
    {
        return file_exists($path);
    }

    /**
     * Get the size of a file.
     *
     * @param  string  $path
     * @return int
     */
    public static function size(string $path): int
    {
        return filesize($path);
    }

    /**
     * Get the file's last modification time.
     *
     * @param  string  $path
     * @return int
     */
    public static function lastModified(string $path): int
    {
        return filemtime($path);
    }

    /**
     * Copy a file to a new location.
     *
     * @param  string  $source
     * @param  string  $destination
     * @return bool
     */
    public static function copy(string $source, string $destination): bool
    {
        return copy($source, $destination);
    }

    /**
     * Move a file to a new location.
     *
     * @param  string  $source
     * @param  string  $destination
     * @return bool
     */
    public static function move(string $source, string $destination): bool
    {
        return rename($source, $destination);
    }

    /**
     * Get the extension of a file.
     *
     * @param  string  $path
     * @return string
     */
    public static function extension(string $path): string
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    /**
     * Get the type of a file.
     *
     * @param  string  $path
     * @return string
     */
    public static function type(string $path): string
    {
        return filetype($path);
    }

    /**
     * Get the MIME type of a file.
     *
     * @param  string  $path
     * @return string
     */
    public static function mimeType(string $path): string
    {
        return finfo_file(finfo_open(FILEINFO_MIME_TYPE), $path);
    }

    /**
     * Check if a given path is a directory.
     *
     * @param  string  $path
     * @return bool
     */
    public static function isDirectory(string $path): bool
    {
        return is_dir($path);
    }

    /**
     * Create a directory.
     *
     * @param  string  $path
     * @param  int  $mode
     * @param  bool  $recursive
     * @return bool
     */
    public static function makeDirectory(string $path, int $mode = 0755, bool $recursive = false): bool
    {
        if(self::exists($path)) return true;
        return mkdir($path, $mode, $recursive);
    }

    /**
     * Delete a directory.
     *
     * @param  string  $path
     * @return bool
     */
    public static function deleteDirectory(string $path): bool
    {
        if(!self::exists($path)) return false;
        return rmdir($path);
    }

    /**
     * Read the contents of a directory.
     *
     * @param  string  $path
     * @param  int  $order
     * @param  bool  $withDots
     * @return array
     */
    public static function readDirectory(string $path, int $order = SCANDIR_SORT_ASCENDING, bool $withDots = true): array
    {
        if(!$withDots){
            return self::files($path, $order);
        }
        return scandir($path, $order);
    }

    /**
     * Change the mode of a file or directory.
     *
     * @param  string  $path
     * @param  int  $mode
     * @return bool
     */
    public static function changeMode(string $path, int $mode): bool
    {
        return chmod($path, $mode);
    }

    /**
     * Prepend data to a file.
     *
     * @param  string  $path
     * @param  string  $data
     * @return int
     */
    public static function prepend(string $path, string $data): int
    {
        return file_put_contents($path, $data . file_get_contents($path));
    }

    /**
     * Create a symbolic link to a file.
     *
     * @param  string  $target
     * @param  string  $link
     * @return bool
     */
    public static function link(string $target, string $link): bool
    {
        return symlink($target, $link);
    }

    /**
     * Get the file name from a path.
     *
     * @param  string  $path
     * @return string
     */
    public static function name(string $path): string
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    /**
     * Get the base name from a path.
     *
     * @param  string  $path
     * @return string
     */
    public static function baseName(string $path): string
    {
        return pathinfo($path, PATHINFO_BASENAME);
    }

    /**
     * Get the directory name from a path.
     *
     * @param  string  $path
     * @return string
     */
    public static function dirName(string $path): string
    {
        return pathinfo($path, PATHINFO_DIRNAME);
    }

    /**
     * Check if a file is readable.
     *
     * @param  string  $path
     * @return bool
     */
    public static function isReadable(string $path): bool
    {
        return is_readable($path);
    }

    /**
     * Check if a file is writeable.
     *
     * @param  string  $path
     * @return bool
     */
    public static function isWriteable(string $path): bool
    {
        return is_writeable($path);
    }

    /**
     * Check if a path is a file.
     *
     * @param  string  $path
     * @return bool
     */
    public static function isFile(string $path): bool
    {
        return is_file($path);
    }

    /**
     * Get all of the files in a directory.
     *
     * @param  string  $directory
     * @param  int  $order
     * @return array
     */
    public static function files(string $directory, int $order = SCANDIR_SORT_ASCENDING): array
    {
        return array_diff(scandir($directory, $order), ['.', '..']);
    }

    /**
     * Get all of the files in a directory, including subdirectories.
     *
     * @param  string  $directory
     * @return array
     */
    public static function allFiles(string $directory): array
    {
        $files = [];
        $scan = function ($dir) use (&$files) {
            $newFiles = array_diff(scandir($dir), ['.', '..']);
            foreach ($newFiles as $file) {
                $path = "{$dir}/{$file}";
                if (is_dir($path)) {
                    $scan($path);
                } else {
                    $files[] = $path;
                }
            }
        };
        $scan($directory);
        return $files;
    }

    /**
     * Move a directory to a new location.
     *
     * @param  string  $from
     * @param  string  $to
     * @return bool
     */
    public static function moveDirectory(string $from, string $to): bool
    {
        return self::copyDirectory($from, $to) && self::cleanDirectories($from);
    }

    /**
     * Copy a directory to a new location.
     *
     * @param  string  $from
     * @param  string  $to
     * @return bool
     */
    public static function copyDirectory(string $from, string $to): bool
    {
        if (!is_dir($to)) {
            mkdir($to, 0755, true);
        }
        foreach (self::files($from) as $file) {
            $fromPath = "{$from}/{$file}";
            $toPath = "{$to}/{$file}";
            if (is_dir($fromPath)) {
                self::copyDirectory($fromPath, $toPath);
            } else {
                copy($fromPath, $toPath);
            }
        }
        return true;
    }

    /**
     * Remove all of the directories within a given directory.
     *
     * @param  string  $directory
     * @return bool
     */
    public static function cleanDirectories(string $directory): bool
    {
        foreach (self::allFiles($directory) as $file) {
            if (is_dir($file)) {
                self::deleteDirectory($file);
            }else {
                self::delete($file);
            }
        }
        self::deleteDirectory($directory);
        return true;
    }
}
