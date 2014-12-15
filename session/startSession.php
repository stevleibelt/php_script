<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-10-23
 */

/**
 * Class Session
 *
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-10-23
 */
class Session
{
    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-10-23
     */
    public function isStarted()
    {
        if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
            $isStarted = !(session_status() == PHP_SESSION_NONE);
        } else {
            $isStarted = !(is_null($_SESSION));
        }
    }
}
