<?php

namespace cyberinferno\yii\phpdotenv;

use Dotenv\Dotenv;
use yii\base\Component;

/**
 * Class Loader
 *
 * @property Dotenv $dotenv
 *
 * @package yii\phpdotenv
 */
class Loader extends Component
{
    /**
     * @var string Use if custom environment variable directory
     */
    public $file;
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
    public function init()
    {
        if ($this->file !== null) {
            $this->_dotenv = new Dotenv(__DIR__, $this->file);
        } else {
            $this->_dotenv = new Dotenv(__DIR__);
        }
        if ($this->overload) {
            $this->_dotenv->overload();
        } else {
            $this->_dotenv->load();
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