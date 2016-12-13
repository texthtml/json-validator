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
     * @param  mixed     $data
     * @param  \stdClass $schema
     * @return mixed
     */
    public function validate($data, $schema)
    {
        $this->validator->reset();
        $this->validator->check($data, $schema);
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
