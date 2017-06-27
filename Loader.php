<?php

namespace cyberinferno\yii\phpdotenv;

use Dotenv\Dotenv;
use Yii;
use yii\base\BootstrapInterface;

/**
 * Class Loader
 *
 * @property Dotenv $dotenv
 *
 * @package yii\phpdotenv
 */
class Loader implements BootstrapInterface
{
    /**
     * @var string Environment variable file directory
     */
    public $path = '@vendor/../';
    /**
     * @var string Use if custom environment variable file
     */
    public $file = '.env';
    /**
     * @var bool Whether to overload already existing environment variables
     */
    public $overload = false;
    /**
     * @var Dotenv
     */
    private $_dotenv;

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        try {
            if ($this->path === null) {
                $this->path = '@vendor/../';
            }
            if ($this->file === null) {
                $this->file = '.env';
            }
            $this->path = Yii::getAlias($this->path);
            $this->_dotenv = New Dotenv($this->path, $this->file);
            if ($this->overload) {
                $this->_dotenv->overload();
            } else {
                $this->_dotenv->load();
            }
        } catch (\Exception $e) {
            \Yii::error('Could not load Dotenv file. ERROR: '.$e->getMessage());
        }
    }

    /**
     * Get dotenv
     * @return Dotenv
     */
    public function getDotenv()
    {
        return $this->_dotenv;
    }
}