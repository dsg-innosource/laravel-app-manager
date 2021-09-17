<?php

namespace Database\Factories;

use App\Models\Instance;
use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'instance_id' => Instance::factory(),
            'php_version' => $this->faker->randomElement(['8.1', '8.0', '7.2', '7.3', '7.4']),
            'database_version' => $this->faker->randomElement(['8', '5.7']),
            'config' => json_encode([
                'app' => [
                    'name' => $this->faker->company,
                    'env' => $this->faker->randomElement(['local', 'production', 'staging']),
                    'debug' => $this->faker->boolean,
                    'url' => $this->faker->url,
                ],
                'db' => [
                    'default' => $this->faker->randomElement(['mysql', 'pgsql', 'sqlite', 'sqlsrv']),
                ],
                'mail' => [
                    'default' => $this->faker->randomElement(['smtp', 'mail', 'sendmail', 'mailgun', 'mandrill', 'ses', 'sparkpost']),
                    'host' => $this->faker->url,
                ],
                'custom' => $this->faker->randomElement([[], ['one' => 'two', 'three' => 'four'], ['five' => 'six', 'seven' => 'eight']]),
            ]),
            'composer_versions' => [
                "asm89/stack-cors" => "v2.0.3",
                "brick/math" => "0.9.3",
                "dflydev/dot-access-data" => "v3.0.1",
                "doctrine/inflector" => "2.0.3",
                "doctrine/lexer" => "1.2.1",
                "dragonmantank/cron-expression" => "v3.1.0",
                "egulias/email-validator" => "2.1.25",
                "fruitcake/laravel-cors" => "v2.0.4",
                "graham-campbell/result-type" => "v1.0.2",
                "guzzlehttp/guzzle" => "7.3.0",
                "guzzlehttp/promises" => "1.4.1",
                "guzzlehttp/psr7" => "2.0.0",
                "innosource/laravel-application-manager" => "dev-main",
                "laravel/framework" => "v8.61.0",
                "laravel/sanctum" => "v2.11.2",
                "laravel/tinker" => "v2.6.1",
                "league/commonmark" => "2.0.2",
                "league/config" => "v1.1.1",
                "league/flysystem" => "1.1.5",
                "league/mime-type-detection" => "1.7.0",
                "monolog/monolog" => "2.3.4",
                "nesbot/carbon" => "2.53.1",
                "nette/schema" => "v1.2.1",
                "nette/utils" => "v3.2.3",
                "nikic/php-parser" => "v4.12.0",
                "opis/closure" => "3.6.2",
                "phpoption/phpoption" => "1.8.0",
                "psr/container" => "1.1.1",
                "psr/event-dispatcher" => "1.0.0",
                "psr/http-client" => "1.0.1",
                "psr/http-factory" => "1.0.1",
                "psr/http-message" => "1.0.1",
                "psr/log" => "1.1.4",
                "psr/simple-cache" => "1.0.1",
                "psy/psysh" => "v0.10.8",
                "ralouphie/getallheaders" => "3.0.3",
                "ramsey/collection" => "1.2.1",
                "ramsey/uuid" => "4.2.1",
                "swiftmailer/swiftmailer" => "v6.2.7",
                "symfony/console" => "v5.3.7",
                "symfony/css-selector" => "v5.3.4",
                "symfony/deprecation-contracts" => "v2.4.0",
                "symfony/error-handler" => "v5.3.7",
                "symfony/event-dispatcher" => "v5.3.7",
                "symfony/event-dispatcher-contracts" => "v2.4.0",
                "symfony/finder" => "v5.3.7",
                "symfony/http-client-contracts" => "v2.4.0",
                "symfony/http-foundation" => "v5.3.7",
                "symfony/http-kernel" => "v5.3.7",
                "symfony/mime" => "v5.3.7",
                "symfony/polyfill-ctype" => "v1.23.0",
                "symfony/polyfill-iconv" => "v1.23.0",
                "symfony/polyfill-intl-grapheme" => "v1.23.1",
                "symfony/polyfill-intl-idn" => "v1.23.0",
                "symfony/polyfill-intl-normalizer" => "v1.23.0",
                "symfony/polyfill-mbstring" => "v1.23.1",
                "symfony/polyfill-php72" => "v1.23.0",
                "symfony/polyfill-php73" => "v1.23.0",
                "symfony/polyfill-php80" => "v1.23.1",
                "symfony/polyfill-php81" => "v1.23.0",
                "symfony/process" => "v5.3.7",
                "symfony/routing" => "v5.3.7",
                "symfony/service-contracts" => "v2.4.0",
                "symfony/string" => "v5.3.7",
                "symfony/translation" => "v5.3.7",
                "symfony/translation-contracts" => "v2.4.0",
                "symfony/var-dumper" => "v5.3.7",
                "tijsverkoyen/css-to-inline-styles" => "2.2.3",
                "vlucas/phpdotenv" => "v5.3.0",
                "voku/portable-ascii" => "1.5.6",
                "webmozart/assert" => "1.10.0",
            ],
            'created_at' => $this->faker->dateTime,
        ];
    }
}
