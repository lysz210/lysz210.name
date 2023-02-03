import * as pulumi from "@pulumi/pulumi";
import * as aws from "@pulumi/aws";
import * as awsx from "@pulumi/awsx";
import * as glob from 'glob';
import * as mime from 'mime';
import { remote } from '@pulumi/command'
import { Output } from "@pulumi/pulumi";
import { readFileSync } from "fs";
import * as md5 from "md5";

const configs = new pulumi.Config();
const org = pulumi.getOrganization();
const stack = pulumi.getStack();

const traefikRef = new pulumi.StackReference(`${org}/traefik.lysz210.name/${stack}`)

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

interface SshConnection {
    user: Output<string>;
    host: Output<string>;
}
// add suffix in name to ensure trigger changes
// on file channge.
// This is a temporary solution, need a proper
// change detection on contente in resource log
const treafikFilePath = './website-traefik.yaml';
const hash = md5(readFileSync(treafikFilePath));
const connection = traefikRef.requireOutput('connection') as Output<SshConnection>
const cvTraefik = new remote.CopyFile(`traefik-${hash}`, {
    connection: {
        user: connection.user,
        host: connection.host,
        privateKey: configs.requireSecret('awsMiPem')
    },
    localPath: treafikFilePath,
    remotePath: pulumi.interpolate `${traefikRef.requireOutput('dynamicConfigsPath')}/website.yaml`
})

// Export the name of the bucket
export const bucketName = bucket.id;
export const websiteEndpoint = bucket.websiteEndpoint;
