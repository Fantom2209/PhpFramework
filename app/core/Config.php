<?php
	namespace app\core;
	
	class Config{
		const PATH_SEPARATOR = '\\';
	    const PATH_ROOT = 'E:\OpenServer\domains\perezvonok.local' . self::PATH_SEPARATOR;
        const PATH_SOURCE = self::PATH_ROOT . 'app' . self::PATH_SEPARATOR;
        const PATH_RECOURCES = self::PATH_ROOT . 'assets' . self::PATH_SEPARATOR;
        const PATH_VIEW = self::PATH_SOURCE . 'view' . self::PATH_SEPARATOR;
        const PATH_LAYOUT = self::PATH_VIEW . 'Shared' . self::PATH_SEPARATOR;
        const PATH_TMP = self::PATH_SOURCE . 'tmp' . self::PATH_SEPARATOR;
        const PATH_LOG_DIR = self::PATH_TMP . 'logs' . self::PATH_SEPARATOR;
        const PATH_LOG_FILE = self::PATH_LOG_DIR . 'log.txt';


	    const URL_ROOT = 'http://perezvonok.local/';
        const URL_IMG = self::URL_ROOT . 'assets/images/';
        const URL_CSS = self::URL_ROOT . 'assets/css/';
        const URL_JS = self::URL_ROOT . 'assets/js/';

        const DB_HOST = 'localhost';
        const DB_NAME = 'perezvonok';
        const DB_USER = 'root';
        const DB_PASSWORD = '';
        const DB_PREFIX = 'p_';

        const APP_SECRET = '%@zs:ZIP.';

        const CATEGORY_ADMINISTRATOR = 1;
        const CATEGORY_CLIENT = 2;

    }