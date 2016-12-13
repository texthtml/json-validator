# json-validator

```php
$validator = \TH\JsonValidator\JsonValidator::create();
$data = json_decode($dataJsonString);
$validator->validate($data, (object)["\$ref" => "file://" . __DIR__."/data-schema.json"]));

$decoder = \TH\JsonValidator\JsonDecoder::create();
$data = $decoder->decode($dataJsonString, (object)["\$ref" => "file://" . __DIR__."/data-schema.json"]));
```
