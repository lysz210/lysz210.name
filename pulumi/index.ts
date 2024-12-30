import * as pulumi from "@pulumi/pulumi";
import * as aws from "@pulumi/aws";
import * as glob from 'glob';
import * as mime from 'mime';

const configs = new pulumi.Config();
const org = pulumi.getOrganization();
const stack = pulumi.getStack();

// Create an AWS resource (S3 Bucket)
const PublicRead = aws.s3.CannedAcl.PublicRead
const logsBucket = new aws.s3.Bucket("logs.lysz210.name")
const bucket = new aws.s3.Bucket("lysz210.name", {
    bucket: 'lysz210.name',
    acl: PublicRead,
    website: {
        indexDocument: "index.html",
        routingRules: [
            {
                Condition: {
                    HttpErrorCodeReturnedEquals: '404'
                },
                Redirect: {
                    ReplaceKeyWith: '404.html'
                }
            }
        ]
    },
    loggings: [
        {
            targetBucket: logsBucket.id,
            targetPrefix: 'log/'
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
export const websiteEndpoint = bucket.websiteEndpoint;
