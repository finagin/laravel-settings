<?php

namespace Finagin\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Finagin\Settings\Contracts\Settings as SettingsContracts;

class Settings extends Model implements SettingsContracts
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'value'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(static::getTableName('settings'));
    }

    /**
     * Get compiled table name with options.
     *
     * @param string $key
     *
     * @return string
     */
    protected static function getTableName(String $key): String
    {
        $tablePrefix = config('laravel-settings.table.prefix');

        $tablePrefix = $tablePrefix ? $tablePrefix.'_' : '';
        $tableNames = config('laravel-settings.table.names');

        return $tablePrefix.$tableNames[$key];
    }

    /**
     * {@inheritdoc}
     */
    public static function get(String $key, $default = null)
    {
        return json_decode(static::firstOrNew(['key' => $key])->value) ?? $default;
    }

    /**
     * {@inheritdoc}
     */
    public static function set(String $key, $value = null)
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => json_encode($value)]
        );
    }

    /**
     * {@inheritdoc}
     */
    public static function unset(String $key)
    {
        $setting = static::where(['key' => $key]);
        if ($setting->count()) {
            return $setting->first()->delete();
        }

        return false;
    }
}
