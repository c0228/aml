<?php
/**
 Create a PHP Class with following functions
 1) Create a File 
    In this function, base directory (string) and files (array) are given as input and response should be as same above
    {
      "success":[],
      "failed":[{
        "fileName":{
          "code":0000,
          "message":""
        }
      }]
     
    }
 */
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
}
$fileManager = new FileManager();
?>