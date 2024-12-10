<?php
/*
 * Dependencies:
 * 	- constants/codes.php
 */
class StatusHelper {
    /**
     * Generate an status response
     *
     * @param int $statusCode The status code.
     * @return array An associative array with `code` and `message`.
     */
    public static function display(int $statusCode): array {
        // Load error codes and messages
		global $API_STATUS_CODES;
        return [
            'code' => $statusCode,
            'message' => $API_STATUS_CODES[$statusCode] ?? 'Unknown error'
        ];
    }
}

$statusHelper = new StatusHelper();

?>