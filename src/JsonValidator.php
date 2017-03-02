<?php

namespace TH\JsonValidator;

class JsonValidator
{
    /** @var Validator */
    public $validator;

    /**
     * @param Validator $validator
     */
    public function __construct(\JsonSchema\Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param mixed $data
     * @param \stdClass $schema
     * @param integer|null $checkMode
     * @return mixed
     */
    public function validate($data, $schema, $checkMode = null)
    {
        $this->validator->reset();
        $this->validator->validate($data, $schema, $checkMode);
        if (!$this->validator->isValid()) {
            throw JsonSchemaValidationFailedException::fromErrors($this->validator->getErrors());
        }
        return $data;
    }

    public static function create()
    {
        return new self(new \JsonSchema\Validator());
    }
}
