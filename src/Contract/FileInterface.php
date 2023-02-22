<?php
declare(strict_types=1);

namespace Imran\File\Contract;

interface FileInterface
{
    public static function get(string $path): string;
    public static function put(string $path, string $contents, bool $lock = false): int;
    public static function append(string $path, string $data): int;
    public static function delete(string $path): bool;
    public static function exists(string $path): bool;
    public static function size(string $path): int;
    public static function lastModified(string $path): int;
    public static function copy(string $source, string $destination): bool;
    public static function move(string $source, string $destination): bool;
    public static function extension(string $path): string;
    public static function mimeType(string $path): string;
    public static function isDirectory(string $path): bool;
    public static function makeDirectory(string $path, int $mode = 0755, bool $recursive = false): bool;
    public static function deleteDirectory(string $path): bool;
    public static function readDirectory(string $path, int $order = SCANDIR_SORT_ASCENDING, bool $withDots = true): array;
    public static function changeMode(string $path, int $mode): bool;
    public static function prepend(string $path, string $data): int;
    public static function link(string $target, string $link): bool;
    public static function name(string $path): string;
    public static function baseName(string $path): string;
    public static function dirName(string $path): string;
    public static function type(string $path): string;
    public static function isReadable(string $path): bool;
    public static function isWriteable(string $path): bool;
    public static function isFile(string $path): bool;
    public static function files(string $directory): array;
    public static function allFiles(string $directory): array;
    public static function moveDirectory(string $from, string $to): bool;
    public static function copyDirectory(string $from, string $to): bool;
    public static function cleanDirectories(string $directory): bool;
}
