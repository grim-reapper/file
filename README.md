# File Handling
The `File` class is a PHP class that provides a convenient and easy-to-use API for working with files and directories in PHP. With this class, you can perform a wide range of file-related operations, such as reading and writing to files, creating and deleting directories, moving and copying files, and more.

All the methods in this class are static methods, meaning that you can use them without creating an instance of the class. This makes it easy to use the class from anywhere in your code.

Overall, the File class provides a powerful and user-friendly API for working with files and directories in PHP. Whether you're a beginner or an experienced PHP developer, this class is a valuable tool for simplifying file-related tasks and improving the reliability and performance of your code.

## Features
- `exists`: Check if a file or directory exists
- `get`: Get the contents of a file
- `put`: Put contents into a file
- `append`: Append contents to a file
- `delete`: Delete a file
- `isDirectory`: Check if a path is a directory
- `makeDirectory`: Create a directory
- `deleteDirectory`: Delete a directory
- `readDirectory`: Read the contents of a directory
- `changeMode`: Change the mode of a file or directory
- `prepend`: Prepend contents to a file
- `link`: Create a symbolic link to a target file
- `name`: Get the file name without extension
- `baseName`: Get the base name of a file
- `dirName`: Get the directory name of a file
- `type`: Get the type of file
- `isReadable`: Check if a file is readable
- `isWriteable`: Check if a file is writeable
- `isFile`: Check if a path is a file
- `files`: Get all files in a directory
- `allFiles`: Get all files in a directory and its subdirectories
- `moveDirectory`: Move a directory to a new location
- `copyDirectory`: Copy a directory to a new location
- `cleanDirectories`: Delete all files in a directory
- `size`: Get the size of a file in bytes
- `lastModified`:  Get the last modification time of a file as a UNIX
- `copy`: Copies a file from one location to another
- `move`: Moves a file from one location to another
- `extension`: Get extension of a file
- `mimeType`: Get the MIME type of file

## Requirements
- PHP 8.0 or Higher
- PHP File info Extension: `ext-fileinfo`

## Installation
First, include the File.php class in your project.
```php
require_once 'path/to/File.php';
```
or by using composer `Recommended way`

```php
composer require imran/file
```

## Methods

### `exists`
The `exists()` method checks if a file or directory exists.
```php
$exists = File::exists('path/to/file');
```
### `get`
The `get()` method gets the contents of a file.
```php
$contents = File::get('path/to/file');
```
### `put`
The `put()` method puts contents into a file.
```php
File::put('path/to/file', 'contents');
```
### `append`
The `append()` method appends contents to a file.
```php
File::append('path/to/file', 'contents');
```
### `delete`
The `delete()` method deletes a file.
```php
File::delete('path/to/file');
```
### `isDirectory`
The `isDirectory()` method checks if a path is a directory.
```php
$isDirectory = File::isDirectory('path/to/directory');
```
### `makeDirectory`
The `makeDirectory()` method creates a directory.
```php
File::makeDirectory('path/to/directory');
```
### `deleteDirectory`
The `deleteDirectory()` method deletes a directory.
```php
File::deleteDirectory('path/to/directory');
```
### `readDirectory`
The `readDirectory()` method reads the contents of a directory.
```php
$contents = File::readDirectory('path/to/directory');
```
### `changeMode`
The `changeMode()` method changes the mode of a file or directory.
```php
File::changeMode('path/to/file', 0777);
```
### `prepend`
The `prepend()` method prepends contents to a file.
```php
File::prepend('path/to/file', 'contents');
```
### `move`
The `move()` method moves a file to a new location.
```php
File::move('path/to/old/file', 'path/to/new/file');
```
### `link`
The `link()` method creates a symbolic link to a target file.
```php
File::link('path/to/target', 'path/to/link');
```
### `name`
The `name()` method gets the file name without extension.
```php
$name = File::name('path/to/file.ext');
```
### `basename`
The `basename()` method gets the base name of a file.
```php
$basename = File::basename('path/to/file.ext');
```
### `dirname`
The `dirname()` method gets the directory name of a file.
```php
$dirname = File::dirname('path/to/file.ext');
```
### `type`
The `type()` method gets the type of file.
```php
$type = File::type('path/to/file');
```
### `isReadable`
The `isReadable()` method checks if a file is readable.
```php
$isReadable = File::isReadable('path/to/file');
```
### `isWriteable`
The `isWriteable()` method checks if a file is writeable.
```php
$isWriteable = File::isWriteable('path/to/file');
```
### `isFile`
The `isFile()` method checks if a path is a file.
```php
$isFile = File::isFile('path/to/file');
```
### `files`
The `files()` method gets all files in a directory.
```php
$files = File::files('path/to/directory');
```
### `allFiles`
The `allFiles()` method gets all files in a directory and its subdirectories.
```php
$allFiles = File::allFiles('path/to/directory');
```
### `moveDirectory`
The `moveDirectory()` method moves a directory to a new location.
```php
File::moveDirectory('path/to/old/directory', 'path/to/new/directory');
```
### `copyDirectory`
The `copyDirectory()` method copies a directory to a new location.
```php
File::copyDirectory('path/to/old/directory', 'path/to/new/directory');
```
### `cleanDirectory`
The `cleanDirectory()` method deletes all files in a directory.
```php
File::cleanDirectory('path/to/directory');
```
### `size`
The `size()` method returns the size of a file in bytes.
```php
$size = File::size('path/to/file');
```
### `lastModified`
The `lastModified()` method returns the last modification time of a file as a UNIX timestamp.
```php
$lastModified = File::lastModified('path/to/file');
```
### `copy`
The `copy()` method copies a file from one location to another.
```php
$source = 'path/to/source';
$destination = 'path/to/destination';

File::copy($source,destination);
```
### `move`
The `move()` method moves a file from one location to another.
```php
$source = 'path/to/source';
$destination = 'path/to/destination';

File::move($source,destination);
```
### `extension`
The `extension()` method returns the extension of a file.
```php
$extension = File::extension('path/to/file');
```
### `mimeType`
The `mimeType()` method returns the MIME type of file.
```php
$mimeType = File::mimeType('path/to/file');
```
### Running Tests

To run tests, use following command

```shell
.\vendor\bin\phpunit tests/FileTest.php
```

### Hi, I'm Imran Ali! 👋

### 🚀 About Me

Senior **Full-Stack** Developer specializing in front end and back-end development. Experienced with all stages of
the development cycle for dynamic web projects. Innovative, creative and a proven team player, I possess
a Tech Degree in Front End Development and have 7 years building developing and managing websites,
applications and programs for various companies. I seek to secure the position of Senior Full
Stack Developer where i can share my skills, expertise and experience with valuable clients.

### 🛠 Skills

PHP OOP,
Laravel,
Codeigniter
Javascript,
Node,
React,
Vue,
Git,
HTML,
Rest Api,
Typescript,
Angular,
SCSS,
Docker,
CI/CD Jenkins,
Bootstrap,
Responsive Design,
ASP.NET Core

### 🔗 Follow on

[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/imranali291/)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/imranali125)

### License

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)

### Contributing

Contributions are always welcome!

See `contributing.md` for ways to get started.

Please adhere to this project's `code of conduct`.
