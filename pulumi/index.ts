import * as pulumi from "@pulumi/pulumi";
import * as aws from "@pulumi/aws";
import { glob } from 'glob';
import mime from 'mime';

const configs = new pulumi.Config();
const org = pulumi.getOrganization();
const stack = pulumi.getStack();

// Create an AWS resource (S3 Bucket)
const PublicRead = aws.s3.CannedAcl.PublicRead
const logsBucket = new aws.s3.Bucket("logs.lysz210.name")
const logBucketAcl = new aws.s3.BucketAcl("logs.lysz210.name-bucketAcl", {
    bucket: logsBucket.id,
    acl: aws.s3.CannedAcl.LogDeliveryWrite
});
const bucket = new aws.s3.Bucket("lysz210.name", {
    bucket: 'lysz210.name'
});

const bucketLogging = new aws.s3.BucketLogging("lysz210.name-bucketLogging", {
    bucket: bucket.id,
    targetBucket: logsBucket.id,
    targetPrefix: 'log/'
});

const bucketAcl = new aws.s3.BucketAcl("lysz210.name-bucketAcl", {
    bucket: bucket.id,
    acl: PublicRead
});

const websiteConfiguration = new aws.s3.BucketWebsiteConfiguration("lysz210.name-websiteConfiguration", {
    bucket: bucket.id,
    indexDocument: {
        suffix: "index.html"
    },
    routingRules: [
        {
            condition: {
                httpErrorCodeReturnedEquals: '404'
            },
            redirect: {
                replaceKeyWith: '404.html'
            }
        }
    ]
});

const dist = '../.output/public/';

glob.sync('**/*', {
    cwd: dist,
    nodir: true,
    stat: true
}).forEach(file => {
    const filePath = `${dist}${file}`;
    const mimeType = mime.getType(filePath);
    new aws.s3.BucketObject(file, {
        bucket: bucket.id,
        source: new pulumi.asset.FileAsset(filePath),
        acl: PublicRead,
        contentType: mimeType || undefined
    })
})

// Export the name of the bucket
export const bucketName = bucket.id;
export const websiteEndpoint = websiteConfiguration.websiteEndpoint;
