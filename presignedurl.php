<?php
use Aws\S3\S3Client;     
        class AwsUtils{
        public function generatePresignedIrl(){
        $s3Client = new S3Client([
        //import region and endpoint and key and secret and bucket name from config file 
            'region' =>config('filesystems.disks.spaces.region'),
            'version' => 'latest',
            'endpoint' => config('filesystems.disks.spaces.endpoint'),
            'signature_version' => 'v4',
            'credentials' => [
                'key' => config('filesystems.disks.spaces.key'),
                'secret'  => config('filesystems.disks.spaces.secret'),
            ]
        ]);
        $cmd = $s3Client->getCommand('GetObject', [
            'Bucket' => config('filesystems.disks.spaces.bucket'),
            'Key' => $generated_url
        ]);

        $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
        // Get the actual presigned-url
        $presignedUrl = (string)$request->getUri();
var_dump($presignedUrl);
}
}
