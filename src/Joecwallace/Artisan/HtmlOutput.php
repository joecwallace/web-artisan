<?php namespace Joecwallace\Artisan;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;

class HtmlOutput implements OutputInterface
{

    protected $verbosity = OutputInterface::VERBOSITY_VERBOSE;
    protected $decorated = true;
    protected $formatter = null;

    protected function formatOutput($message)
    {
        return str_replace(PHP_EOL, '<br>', $message);
    }

    /**
     * Writes a message to the output.
     *
     * @param string|array $messages The message as an array of lines of a single string
     * @param Boolean      $newline  Whether to add a newline or not
     * @param integer      $type     The type of output (0: normal, 1: raw, 2: plain)
     *
     * @throws \InvalidArgumentException When unknown output type is given
     *
     * @api
     */
    public function write($messages, $newline = false, $type = 0)
    {
        $messages = (array)$messages;

        foreach ($messages as $message)
        {
            echo $this->formatOutput($message);
        }

        if ($newline) echo '<br>';
    }

    /**
     * Writes a message to the output and adds a newline at the end.
     *
     * @param string|array $messages The message as an array of lines of a single string
     * @param integer      $type     The type of output (0: normal, 1: raw, 2: plain)
     *
     * @api
     */
    public function writeln($messages, $type = 0)
    {
        $this->write($messages, true, $type);
    }

    /**
     * Sets the verbosity of the output.
     *
     * @param integer $level The level of verbosity
     *
     * @api
     */
    public function setVerbosity($level)
    {
        $this->verbosity = $level;
    }

    /**
     * Gets the current verbosity of the output.
     *
     * @return integer The current level of verbosity
     *
     * @api
     */
    public function getVerbosity()
    {
        return $this->verbosity;
    }

    /**
     * Sets the decorated flag.
     *
     * @param Boolean $decorated Whether to decorate the messages or not
     *
     * @api
     */
    public function setDecorated($decorated)
    {
        $this->decorated = $decorated;
    }

    /**
     * Gets the decorated flag.
     *
     * @return Boolean true if the output will decorate messages, false otherwise
     *
     * @api
     */
    public function isDecorated()
    {
        return $this->decorated;
    }

    /**
     * Sets output formatter.
     *
     * @param OutputFormatterInterface $formatter
     *
     * @api
     */
    public function setFormatter(OutputFormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * Returns current output formatter instance.
     *
     * @return  OutputFormatterInterface
     *
     * @api
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

}