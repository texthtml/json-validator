<?php

namespace TH\JsonValidator;

class JsonDecoder
{
    /** @var JsonValidator */
    private $validator;

    /**
     * @param JsonValidator $validator
     */
    public function __construct(JsonValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param string $json
     * @param string|\stdClass $schema
     * @param integer|null $checkMode
     * @return mixed
     */
    public function decode($json, $schema, $checkMode = null)
    {
        return $this->validator->validate(
            json_decode($json),
            is_string($schema) ? (object)["\$ref" => "flapi://$schema"] : $schema,
            $checkMode
        );
    }

    public static function create()
    {
        return new self(JsonValidator::create());
    }
}
