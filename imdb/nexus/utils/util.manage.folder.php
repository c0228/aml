<?php
/*
 * Dependencies:
 * 	- constants/codes.php
 *	- constants/helper.php
 */
class FolderManager {
 /**
 * Create directories from an array of folder names inside a base path.
 *
 * @param string $basePath The base path where folders will be created.
 * @param array $folders Array of folder names to create.
 * @return array An array with `success` and `failed` keys listing folder names.
 */
 public function createDirectories(string $basePath, array $folders): array {
    $results = [
        'success' => [],
        'failed' => []
    ];

    foreach ($folders as $folderName) {
        $fullPath = rtrim($basePath, '/') . '/' . $folderName;
        if (!is_dir($fullPath)) {
            if (mkdir($fullPath, 0755, true)) {
                $results['success'][] = $folderName;
            } else {
                $results['failed'][] = [
				  $folderName => StatusHelper::display(1000)
				];
            }
        } else {
            $results['failed'][] = [
				$folderName => StatusHelper::display(1001)
			];
        }
    }

    return $results;
 }

 /**
 * Rename existing directories.
 *
 * @param string $basePath Base path where directories are located.
 * @param array $directories Array of directories with 'currentName' and 'newName'.
 * @return array Response with success and failed results.
 */
  public function updateDirectoriesName(string $basePath, array $directories): array {
    $results = [
        'success' => [],
        'failed' => []
    ];

    foreach ($directories as $directory) {
        if (isset($directory['currentName'], $directory['newName'])) {
            $currentName = rtrim($basePath, '/') . '/' . $directory['currentName'];
            $newName = rtrim($basePath, '/') . '/' . $directory['newName'];

            if (is_dir($currentName)) {
                if (!is_dir($newName)) {
                    if (rename($currentName, $newName)) {
                        $results['success'][] = [
						   "currentName" => $directory['currentName'],
                            "newName" => $directory['newName']
						 ];
                    } else {
                        $results['failed'][] = [
                            $directory['currentName'] => StatusHelper::display(1000)
                        ];
                    }
                } else {
                    $results['failed'][] = [
                        $directory['currentName'] => StatusHelper::display(1001)
                    ];
                }
            } else {
                $results['failed'][] = [
                    $directory['currentName'] => StatusHelper::display(1002)
                ];
            }
        } else {
            // Handle the case where 'currentName' or 'newName' is missing in the directory array
            $results['failed'][] = [
                'Invalid data' =>  StatusHelper::display(1003)
            ];
        }
    }

    return $results;
  }


  /**
 * View list of files and folders in a directory with metadata.
 *
 * @param string $path Path of the directory.
 * @return array|string Array of files and folders with metadata, or error message.
 */
 public function viewDirectoryContents(string $path) {
    if(is_dir($path)) {
        $contents = scandir($path);
        $contents = array_diff($contents, ['.', '..']); // Remove '.' and '..'

        $result = [];
        
        foreach ($contents as $item) {
            $itemPath = rtrim($path, '/') . '/' . $item;

            // Check if it's a directory or file
            $isDir = is_dir($itemPath);
            $result[] = [
                'name' => $item,
                'isDirectory' => $isDir,
                'created_at' => date("Y-m-d H:i:s", filectime($itemPath)), // Creation time
                'updated_at' => date("Y-m-d H:i:s", filemtime($itemPath)), // Last modification time
            ];
        }

        return $result;
    }
    return StatusHelper::display(1002);
 }


  /**
 * Delete multiple directories.
 *
 * @param string $basePath Base path where the directories are located.
 * @param array $folders Array of folder names to delete.
 * @return array Array with success and failed deletions.
 */
 public function deleteDirectories(string $basePath, array $folders): array {
    $results = [
        'success' => [],
        'failed' => []
    ];

    foreach ($folders as $folderName) {
        $fullPath = rtrim($basePath, '/') . '/' . $folderName;
        
        if (is_dir($fullPath)) {
            // Try to delete the directory
            if (rmdir($fullPath)) {
                $results['success'][] = $folderName;
            } else {
                $results['failed'][] = [
                    'folder' => $folderName,
                    'message' => StatusHelper::display(1004)
                ];
            }
        } else {
            $results['failed'][] = [
                'folder' => $folderName,
                'message' => StatusHelper::display(1002)
            ];
        }
    }

    return $results;
 }
}
$folderManager = new FolderManager();
/*
// Usage example:
$folderManager = new FolderManager();

// Create a directory.
echo $folderManager->createDirectory('imdb/testFolder') . PHP_EOL;

// Rename the directory.
echo $folderManager->updateDirectoryName('imdb/testFolder', 'imdb/renamedFolder') . PHP_EOL;

// View contents of the directory.
print_r($folderManager->viewDirectoryContents('./imdb'));

// Delete the directory.
// echo $folderManager->deleteDirectory('renamedFolder') . PHP_EOL;
*/
?>
