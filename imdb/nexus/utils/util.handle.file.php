<?php
require_once './../constants/codes.php';
require_once './../constants/helper.php';

class FileHandler {
    private $fileHandle;

    /**
     * Opens a file with a lock and retrieves the latest data.
     *
     * @param string $basePath The base path of the file.
     * @param string $file The file name.
     * @return string|null The latest data from the file, or null if an error occurred.
     */
    public function openFileWithLock($basePath, $file, $isJson=false) {
        $filePath = rtrim($basePath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $file;

        // Open the file in read mode
        $this->fileHandle = @fopen($filePath, 'r+');
        if (!$this->fileHandle) {
            return [ 'status' => StatusHelper::display(1013) ];
        }

        // Acquire an exclusive lock
        if (!flock($this->fileHandle, LOCK_EX)) {
            fclose($this->fileHandle);
            return [ 'status' => StatusHelper::display(1014) ];
        }

        // Read the latest data from the file
        $data = stream_get_contents($this->fileHandle);
        if ($data === false) {
            return [ 'status' => StatusHelper::display(1015) ];
        }

        return [
            'data' =>$isJson?json_decode($data):$data,
            'status' => StatusHelper::display(1017)
        ];
    }

    /**
     * Unlocks the file and closes the handle.
     *
     * @return bool True if the file was successfully unlocked, false otherwise.
     */
    public function unlockFile() {
        if ($this->fileHandle) {
            // Release the lock
            if (!flock($this->fileHandle, LOCK_UN)) {
                return [ 
                    'unlocked' => false,
                    'status' => StatusHelper::display(1016) ];
            }

            // Close the file handle
            fclose($this->fileHandle);
            $this->fileHandle = null;
        }
        return [ 
            'unlocked' => true,
            'status' => StatusHelper::display(1018) ];
    }
}

// Usage example
$fileHandler = new FileHandler();
$openResponse = $fileHandler->openFileWithLock('./../../data/h1', 'a2.txt',true);


echo json_encode($openResponse).PHP_EOL;
$closeResponse = $fileHandler->unlockFile();
sleep(10);
echo json_encode($closeResponse);
/*
if ($data === null) {
    // Handle error
    echo "Error ({$fileHandler->errorCode}): {$fileHandler->errorMessage}" . PHP_EOL;
} else {
    // Perform required operations on $data here
    echo "File Data: " . $data . PHP_EOL;

    // Unlock the file after processing
    if (!$fileHandler->unlockFile()) {
        echo "Error ({$fileHandler->errorCode}): {$fileHandler->errorMessage}" . PHP_EOL;
    }
}
    */

?>