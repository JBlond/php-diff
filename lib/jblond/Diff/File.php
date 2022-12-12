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
        $this->file = file($file);
    }

    /**
     * return the last line from the file array
     * @return false|mixed|string
     */
    public function getLastLine()
    {
        $lines = $this->file;
        return end($lines);
    }

    /**
     * Bool return if the file has a new line at the end
     * @return bool
     */
    public function hasNewLineAtTheEnd(): bool
    {
        $lastLine = $this->getLastLine();
        if (strpos($lastLine, "\r\n") !== false) {
            return true;
        }

        if (strpos($lastLine, "\r") !== false) {
            return true;
        }

        if (strpos($lastLine, "\n") !== false) {
            return true;
        }
        return false;
    }

    /**
     * Return the File Ending / EOL / EOF Type
     * @return string
     */
    public function getEOLType(): string
    {
        $lastLine = $this->getLastLine();
        if (strpos($lastLine, "\r\n") !== false) {
            return "EOL type is Windows (CRLF)";
        }

        if (strpos($lastLine, "\r") !== false) {
            return "EOL type is Mac (CR)";
        }

        if (strpos($lastLine, "\n") !== false) {
            return "EOL type is Unix (LF)";
        }
        return "\ No newline at end of file";
    }
}
