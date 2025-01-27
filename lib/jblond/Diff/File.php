<?php

namespace jblond\Diff;

use InvalidArgumentException;

/**
 *
 */
class File
{
    /** @var array $file */
    protected $file;


    /**
     * Add data
     * @param string|array $file
     * @return void
     */
    public function setFile($file): void
    {
        if (is_array($file)) {
            $this->file = $file;
            return;
        }
        if (!file_exists($file)) {
            throw new InvalidArgumentException();
        }
        $file = file($file);
        if ($file === false) {
            throw new InvalidArgumentException();
        }
        $this->file = $file;
    }

    /**
     * return the last line from the file array
     * @return false|mixed
     */
    public function getLastLine()
    {
        return end($this->file);
    }

    /**
     * Bool return if the file has a new line at the end
     * @return bool
     */
    public function hasNewLineAtTheEnd(): bool
    {
        return (bool)preg_match('(\r\n|\r|\n)', $this->getLastLine());
    }

    /**
     * Return the File Ending / EOL / EOF Type
     * @return string
     */
    public function getEOLType(): string
    {
        preg_match('(\r\n|\r|\n)', $this->getLastLine(), $matches);
        switch ($matches[0] ?? '') {
            case "\n":
                return 'EOL type is Unix (LF)';
            case "\r":
                return 'EOL type is Mac (CR)';
            case "\r\n":
                return 'EOL type is Windows (CRLF)';
            default:
                return '\ No newline at end of file';
        }
    }
}
