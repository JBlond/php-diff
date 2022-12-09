<?php

namespace jblond\Diff;

use InvalidArgumentException;

/**
 *
 */
class File
{
    /** @var string $file */
    protected $file;

    /**
     * @param string $file
     */
    public function __construct(string $file)
    {
        if (!file_exists($file)) {
            throw new InvalidArgumentException();
        }
        $this->file = $file;
    }

    /**
     * @return false|mixed|string
     */
    public function getLastLine()
    {
        $lines = file($this->file);
        return end($lines);
    }

    /**
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
