<?php

class FileManager {

    /**
     * Create multiple files in the specified base directory.
     *
     * @param string $basePath Base directory where files should be created.
     * @param array $files Array of file names to be created.
     * @return array Array with success and failed file creations.
     */
    public function createFiles(string $basePath, array $files): array {
        $results = [
            'success' => [],
            'failed' => []
        ];

        if (!is_dir($basePath)) {
            $results['failed'][] = [
                'basePath' => StatusHelper::display(1007)
            ];
            return $results;
        }

        foreach ($files as $fileName) {
            $fullPath = rtrim($basePath, '/') . '/' . $fileName;

            // Check if file already exists
            if (file_exists($fullPath)) {
                $results['failed'][] = [
                    $fileName => StatusHelper::display(1005)
                ];
            } else {
                // Try to create the file
                if (touch($fullPath)) {
                    $results['success'][] = $fileName;
                } else {
                    $results['failed'][] = [
                        $fileName => StatusHelper::display(1006)
                    ];
                }
            }
        }
        return $results;
    }

    /**
     * Update (rename) multiple files in the specified base directory.
     *
     * @param string $basePath Base directory where files are located.
     * @param array $files Array of files with currentName and newName.
     * @return array Array with success and failed file renaming results.
     */
     public function updateFiles(string $basePath, array $files): array {
        $results = [
            'success' => [],
            'failed' => []
        ];
    
        foreach ($files as $file) {
            // Validate if currentName and newName are provided
            if (isset($file['currentName'], $file['newName'])) {
                $currentPath = rtrim($basePath, '/') . '/' . $file['currentName'];
                $newPath = rtrim($basePath, '/') . '/' . $file['newName'];
    
                // Check if current file exists
                if(file_exists($currentPath)) {
                    // Check if the new file name already exists
                    if(!file_exists($newPath)) {
                        // Try to rename the file
                        if(rename($currentPath, $newPath)) {
                            $results['success'][] = [
                                'currentName' => $file['currentName'],
                                'newName' => $file['newName']
                            ];
                        } else {
                            $results['failed'][] = [  
                                $file['currentName'] => StatusHelper::display(1008)
                            ];
                        }
                    } else {
                        $results['failed'][] = [
                            $file['currentName'] => StatusHelper::display(1009)
                        ];
                    }
                } else {
                    $results['failed'][] = [
                        $file['currentName'] => StatusHelper::display(1010)
                    ];
                }
            } else {
                $results['failed'][] = [
                    'Invalid data' => StatusHelper::display(1011)
                ];
            }
        }
        return $results;
    }

    /**
     * Delete multiple files in the specified base directory.
     *
     * @param string $basePath Base directory where files are located.
     * @param array $files Array of file names to delete.
     * @return array Array with success and failed file deletion results.
     */
     public function deleteFiles(string $basePath, array $files): array {
        $results = [
            'success' => [],
            'failed' => []
        ];
    
        foreach ($files as $fileName) {
            $filePath = rtrim($basePath, '/') . '/' . $fileName;
    
            // Check if the file exists
            if(file_exists($filePath)) {
                // Attempt to delete the file
                if(unlink($filePath)) {
                    $results['success'][] = $fileName;
                } else {
                    $results['failed'][] = [
                        $fileName => StatusHelper::display(1012)
                    ];
                }
            } else {
                $results['failed'][] = [
                    $fileName => StatusHelper::display(1010)
                ];
            }
        }
        return $results;
    }
}
$fileManager = new FileManager();
?>