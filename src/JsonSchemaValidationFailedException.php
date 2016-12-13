<?php

namespace TH\JsonValidator;

class JsonSchemaValidationFailedException extends \Exception
{
    /** @var array */
    private $errors;

    /**
     * @param string          $message
     * @param array           $errors
     * @param integer         $code
     * @param \Exception|null $previous
     */
    public function __construct($message, array $errors, $code, \Exception $previous = null)
    {
        $this->errors = $errors;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @param array           $errors
     * @param integer         $code
     * @param \Exception|null $previous
     * @return self
     */
    public static function fromErrors(array $errors, $code = 0, \Exception $previous = null)
    {
        return new static(sprintf(
            "Validation of the JSON data failed:".PHP_EOL."%s",
            implode(PHP_EOL, array_map(function ($error) {
                return "[{$error["property"]}]: {$error["message"]}";
            }, $errors))
        ), $errors, $code, $previous);
    }

    /**
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }
}
