<?php
namespace WPSPCORE\FileSystem;

class FileSystem {

	/** @var \Illuminate\Filesystem\Filesystem|null */
	private static $instance = null;

	/**
	 * @return \Illuminate\Filesystem\Filesystem|null
	 */
	public static function instance() {
		if (!self::$instance) {
			self::$instance = new \Illuminate\Filesystem\Filesystem();
		}
		return self::$instance;
	}

	public static function exists($path) {
		return self::instance()->exists($path);
	}

	public static function missing($path) {
		return !self::instance()->exists($path);
	}

	public static function get($path, $lock = false) {
		try {
			return self::instance()->get($path, $lock);
		}
		catch (\Illuminate\Contracts\Filesystem\FileNotFoundException|\Exception $e) {
			return null;
		}
	}

	public static function put($path, $contents, $lock = false) {
		return self::instance()->put($path, $contents, $lock);
	}

	public static function append($path, $data, $lock = false) {
		return self::instance()->append($path, $data, $lock);
	}

	public static function replace($path, $content, $mode = null) {
		self::instance()->replace($path, $content, $mode);
	}

	public static function prepend($path, $data) {
        return self::instance()->prepend($path, $data);
    }

	public static function replaceInFile($search, $replace, $path) {
		self::instance()->replaceInFile($search, $replace, $path);
	}

	public static function delete($paths) {
		return self::instance()->delete($paths);
	}

	public static function move($from, $to) {
		return self::instance()->move($from, $to);
	}

	public static function copy($from, $to) {
		return self::instance()->copy($from, $to);
	}

	public static function size($path) {
		return self::instance()->size($path);
	}

	public static function lastModified($path) {
		return self::instance()->lastModified($path);
	}

	public static function mimeType($path) {
		return self::instance()->mimeType($path);
	}

	public static function extension($path) {
		return self::instance()->extension($path);
	}

	public static function type($path) {
		return self::instance()->type($path);
	}

	public static function allFiles($directory, $hidden = false) {
		return self::instance()->allFiles($directory, $hidden);
	}

	public static function directories($directory) {
		return self::instance()->directories($directory);
	}

	public static function makeDirectory($path, $mode = 0755, $recursive = false, $force = false) {
		return self::instance()->makeDirectory($path, $mode, $recursive, $force);
	}

	public static function deleteDirectory($directory, $preserve = false) {
        return self::instance()->deleteDirectory($directory, $preserve);
    }

	public static function cleanDirectory($directory) {
        return self::instance()->cleanDirectory($directory);
    }

	public static function copyDirectory($directory, $destination, $options = null) {
        return self::instance()->copyDirectory($directory, $destination, $options);
    }

	public static function moveDirectory($directory, $destination, $options = null) {
        return self::instance()->moveDirectory($directory, $destination, $options);
    }

}