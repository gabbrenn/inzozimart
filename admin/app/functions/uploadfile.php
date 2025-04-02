<?php
class UploadFile {
    private $uploadDir;
    private $filePath;
    private $errorMessage;

    public function __construct($uploadDir = "app/uploads/") {
        $this->uploadDir = $uploadDir;

        // Create the uploads directory if it doesn't exist
        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
    }

    public function upload($file) {
        if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
            $this->errorMessage = "Error: No file uploaded or upload failed.";
            return false;
        }

        $imageName = basename($file['name']);
        $imageTmp = $file['tmp_name'];
        $this->filePath = $this->uploadDir . $imageName;

        // Move the uploaded file to the destination
        if (move_uploaded_file($imageTmp, $this->filePath)) {
            return $this->filePath;
        } else {
            $this->errorMessage = "Error: Unable to move uploaded file.";
            return false;
        }
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }
}
?>
