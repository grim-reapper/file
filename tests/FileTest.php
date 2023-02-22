<?php
namespace Imran\File\FileTest;

use PHPUnit\Framework\TestCase;
use Imran\File\File;

class FileTest extends TestCase
{
    /**
     * @group exists
     * @return void
     */
    public function testExistsMethod()
    {
        $this->assertTrue(File::exists(__FILE__));
        $this->assertFalse(File::exists(__FILE__.'nonexistent'));
    }

    /**
     * @group put
     * @return void
     * @throws \Exception
     */
    public function testPutMethod()
    {
        $file = __DIR__.'/file.txt';
        File::put($file, 'Content');
        $this->assertTrue(File::exists($file));
        $this->assertEquals('Content', File::get($file));
    }

    /**
     * @group get
     * @return void
     * @throws \Exception
     */
    public function testGetMethod()
    {
        $file = __DIR__.'/file.txt';
        File::put($file, 'Content');
        $this->assertTrue(File::exists($file));
        $this->assertEquals('Content', File::get($file));
    }

    /**
     * @group append
     * @return void
     * @throws Exception
     */
    public function testAppendMethod()
    {
        $file = __DIR__. '/file.txt';
        File::put($file, 'Content'.PHP_EOL);
        File::append($file, 'Append Content');
        $this->assertEquals('Content'. PHP_EOL. 'Append Content', File::get($file));
    }

    /**
     * @group prepend
     * @return void
     * @throws \Exception
     */
    public function testPrependMethod()
    {
        $file = __DIR__.'/file.txt';
        File::put($file, 'Content');
        File::prepend($file, 'Prepended Content'.PHP_EOL);
        $this->assertEquals('Prepended Content'.PHP_EOL.'Content', File::get($file));
    }

    /**
     * @group delete
     * @return void
     */
    public function testDeleteMethod()
    {
        $file = __DIR__.'/file.txt';
        File::put($file, 'Content');
        File::delete($file);
        $this->assertFalse(File::exists($file));
    }

    /**
     * @group isDir
     * @return void
     */
    public function testIsDirectoryMethod()
    {
        $this->assertTrue(File::isDirectory(__DIR__));
        $this->assertFalse(File::isDirectory(__FILE__));
    }

    /**
     * @group makeDir
     * @return void
     */
    public function testCreateDirectoryMethod()
    {
        $dir = __DIR__.'/test';
        File::deleteDirectory($dir);
        File::makeDirectory($dir);
        $this->assertTrue(File::isDirectory($dir));
    }

    /**
     * @group deleteDir
     * @return void
     */
    public function testDeleteDirectoryMethod()
    {
        $dir = __DIR__.'/test';
        File::makeDirectory($dir);
        File::deleteDirectory($dir);
        $this->assertFalse(File::isDirectory($dir));
    }

    /**
     * @group readDir
     * @return void
     */
    public function testReadDirectoryMethod()
    {
        $dir = __DIR__.'/test';
        File::makeDirectory($dir);
        File::put("{$dir}/file1.txt", 'Content1');
        File::put("{$dir}/file2.txt", 'Content2');
        $files = File::readDirectory($dir);
        $this->assertCount(4, $files);
        $this->assertContains("file1.txt", $files);
        $this->assertContains("file2.txt", $files);
    }

    /**
     * @group changeFileMod
     * @return void
     */
    public function testChangeFileModMethod()
    {
        $file = __DIR__.'/file.txt';
        File::put($file, 'Content');
        File::changeMode($file, 0775);
        $this->assertEquals(0775, fileperms($file) & 0775);
    }

    /**
     * @group symlink
     * @return void
     * @throws \Exception
     */
    public function testLinkMethod()
    {
        $file = __DIR__.'/file.txt';
        File::put($file, 'Content');
        $link = __DIR__.'/link.txt';
        File::link($file, $link);
        $this->assertTrue(File::exists($link));
        $this->assertEquals('Content', File::get($link));
    }

    /**
     * @group name
     * @return void
     */
    public function testNameMethod()
    {
        $file = __DIR__.'/file.txt';
        $this->assertEquals('file', File::name($file));
    }

    /**
     * @group basename
     * @return void
     */
    public function testBasenameMethod()
    {
        $file = __DIR__.'/file.txt';
        $this->assertEquals('file.txt', File::basename($file));
    }

    /**
     * @group dirname
     * @return void
     */
    public function testDirnameMethod()
    {
        $file = __DIR__.'/file.txt';
        $this->assertEquals(__DIR__, File::dirname($file));
    }

    /**
     * @group type
     * @return void
     */
    public function testTypeMethod()
    {
        $file = __DIR__.'/file.txt';
        File::put($file, 'Content');
        $this->assertEquals('file', File::type($file));
    }

    /**
     * @group readable
     * @return void
     */
    public function testIsReadableMethod()
    {
        $file = __DIR__.'/file.txt';
        File::put($file, 'Content');
        $this->assertTrue(File::isReadable($file));
    }

    /**
     * @group writeable
     * @return void
     */
    public function testIsWriteableMethod()
    {
        $file = __DIR__.'/file.txt';
        File::put($file, 'Content');
        $this->assertTrue(File::isWriteable($file));
    }

    /**
     * @group isFile
     * @return void
     */
    public function testIsFileMethod()
    {
        $file = __DIR__.'/file.txt';
        File::put($file, 'Content');
        $this->assertTrue(File::isFile($file));
        $this->assertFalse(File::isFile(__DIR__));
    }

    /**
     * @group isFiles
     * @return void
     */
    public function testFilesMethod()
    {
        $dir = __DIR__.'/test';
        File::makeDirectory($dir);
        File::put("{$dir}/file1.txt", 'Content1');
        File::put("{$dir}/file2.txt", 'Content2');
        $files = File::files($dir);
        $this->assertCount(2, $files);
        $this->assertContains("file1.txt", $files);
        $this->assertContains("file2.txt", $files);
    }

    /**
     * @group allFiles
     * @return void
     */
    public function testAllFilesMethod()
    {
        $dir = __DIR__.'/test';
        File::makeDirectory($dir);
        File::put("{$dir}/file1.txt", 'Content1');
        File::put("{$dir}/file2.txt", 'Content2');
        $files = File::allFiles($dir);
        $this->assertCount(2, $files);
        $this->assertContains("{$dir}/file1.txt", $files);
        $this->assertContains("{$dir}/file2.txt", $files);
    }

    /**
     * @group moveDir
     * @return void
     */
    public function testMoveDirectoryMethod()
    {
        $src = __DIR__ . '/src';
        $dst = __DIR__ . '/dst';
        File::makeDirectory($src);
        File::put("{$src}/file1.txt", 'Content1');
        File::put("{$src}/file2.txt", 'Content2');
        File::moveDirectory($src, $dst);
        $this->assertFalse(File::exists($src));
        $this->assertTrue(File::exists($dst));
        $this->assertTrue(File::exists("{$dst}/file1.txt"));
        $this->assertTrue(File::exists("{$dst}/file2.txt"));
    }

    /**
     * @group copyDir
     * @return void
     */
    public function testCopyDirectoryMethod()
    {
        $src = __DIR__ . '/src';
        $dst = __DIR__ . '/dst';
        File::makeDirectory($src);
        File::put("{$src}/file1.txt", 'Content1');
        File::put("{$src}/file2.txt", 'Content2');
        File::copyDirectory($src, $dst);
        $this->assertTrue(File::exists($src));
        $this->assertTrue(File::exists($dst));
        $this->assertTrue(File::exists("{$dst}/file1.txt"));
        $this->assertTrue(File::exists("{$dst}/file2.txt"));
    }

    /**
     * @group cleanDir
     * @return void
     */
    public function testCleanDirectoriesMethod()
    {
        $dir = __DIR__ . '/test';
        File::makeDirectory($dir);
        File::put("{$dir}/file1.txt", 'Content1');
        File::put("{$dir}/file2.txt", 'Content2');
        File::cleanDirectories($dir);
        $this->assertFalse(File::exists($dir));
        $this->assertFalse(File::exists("{$dir}/file1.txt"));
        $this->assertFalse(File::exists("{$dir}/file2.txt"));
    }
    /**
     * @group size
     * Test the size() method.
     */
    public function testSizeMethod()
    {
        $file = __DIR__ . '/file1.txt';
        File::put($file, 'Content1');
        $this->assertEquals(filesize($file), File::size($file));
    }

    /**
     * @group modified
     * Test the lastModified() method.
     */
    public function testLastModifiedMethod()
    {
        $file = __DIR__ . '/file1.txt';
        File::put($file, 'Content1');
        $this->assertEquals(filemtime($file), File::lastModified($file));
    }

    /**
     * @group copyMethod
     * Test the copy() method.
     */
    public function testCopyMethod()
    {
        $src = __DIR__ . '/file1.txt';
        $dst = __DIR__ . '/file3.txt';

        File::copy($src, $dst);

        $this->assertFileExists($dst);
        $this->assertEquals(file_get_contents($src), file_get_contents($dst));

        unlink($dst);
    }

    /**
     * @group move
     * Test the move() method.
     */
    public function testMoveMethod()
    {
        $src = __DIR__ . '/file1.txt';
        $dst = __DIR__ . '/file3.txt';

        File::move($src, $dst);

        $this->assertFileExists($dst);
        $this->assertFileDoesNotExist($src);

//        rename($dst, $src);
    }

    /**
     * @group extension
     * Test the extension() method.
     */
    public function testExtensionMethod()
    {
        $file = __DIR__ . '/file1.txt';

        $this->assertEquals(pathinfo($file, PATHINFO_EXTENSION), File::extension($file));
    }

    /**
     * @group mimeType
     * Test the mimeType() method.
     */
    public function testMimeTypeMethod()
    {
        $file = __DIR__ . '/file3.txt';

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file);
        finfo_close($finfo);

        $this->assertEquals($mimeType, File::mimeType($file));
    }
}
