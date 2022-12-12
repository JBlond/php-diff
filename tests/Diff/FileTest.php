<?php

namespace Tests\Diff;

use InvalidArgumentException;
use jblond\Diff\File;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class FileTest extends TestCase
{
    /**
     * Test the type of EOF
     */
    public function testGetEOLType()
    {
        $mac = new File();
        $mac->setFile('tests/resources/eol/mac.txt');
        $this->assertEquals(
            'EOL type is Mac (CR)',
            $mac->getEOLType()
        );

        $unix = new File();
        $unix->setFile('tests/resources/eol/unix.txt');
        $this->assertEquals(
            'EOL type is Unix (LF)',
            $unix->getEOLType()
        );

        $noEol = new File();
        $noEol->setFile('tests/resources/eol/no-eol.txt');
        $this->assertEquals(
            '\ No newline at end of file',
            $noEol->getEOLType()
        );

        $windows = new File();
        $windows->setFile('tests/resources/eol/windows.txt');
        $this->assertEquals(
            'EOL type is Windows (CRLF)',
            $windows->getEOLType()
        );
    }

    /**
     * Bool test if the file has a line ending
     */
    public function testHasNewLineAtTheEnd()
    {
        $mac = new File();
        $mac->setFile('tests/resources/eol/mac.txt');
        $this->assertEquals(
            true,
            $mac->hasNewLineAtTheEnd()
        );

        $unix = new File();
        $unix->setFile('tests/resources/eol/unix.txt');
        $this->assertEquals(
            true,
            $unix->hasNewLineAtTheEnd()
        );

        $noEol = new File();
        $noEol->setFile('tests/resources/eol/no-eol.txt');
        $this->assertEquals(
            false,
            $noEol->hasNewLineAtTheEnd()
        );

        $windows = new File();
        $windows->setFile('tests/resources/eol/windows.txt');
        $this->assertEquals(
            true,
            $windows->hasNewLineAtTheEnd()
        );
    }

    /**
     * Test get the last string from a file
     */
    public function testGetLastLine()
    {
        $mac = new File();
        $mac->setFile('tests/resources/eol/mac.txt');
        $this->assertEquals(
            "Lorem ipsum\r",
            $mac->getLastLine()
        );

        $unix = new File();
        $unix->setFile('tests/resources/eol/unix.txt');
        $this->assertEquals(
            "Lorem ipsum\n",
            $unix->getLastLine()
        );

        $noEol = new File();
        $noEol->setFile('tests/resources/eol/no-eol.txt');
        $this->assertEquals(
            "Lorem ipsum",
            $noEol->getLastLine()
        );

        $windows = new File();
        $windows->setFile('tests/resources/eol/windows.txt');
        $this->assertEquals(
            "Lorem ipsum\r\n",
            $windows->getLastLine()
        );
    }

    /**
     * Test if the file exists
     */
    public function testSetFile()
    {
        $this->expectException(InvalidArgumentException::class);
        $file = new File();
        $file->setFile('foo.txt');
    }
}
