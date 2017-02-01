<?php

namespace CheckCriteria;
use Aws\S3\S3Client;

/**
 * Class S3BucketCheckCriteria
 * @package CheckCriteria
 */
class S3BucketCheckCriteria implements ICheckCriteria {

    private $s3Client;

    private $bucketName;

    public function __construct(S3Client $client, $bucketName){
        $this->s3Client = $client;
        $this->bucketName = $bucketName;
    }

    public function check() {
        $result = $this->s3Client->doesBucketExist($this->bucketName);
        if (FALSE === $result){
            $result = "Could not find the bucket '" . $this->bucketName . "'.";
        }

        return $result;
    }

    public function getName() {
        return $this->bucketName;
    }

}