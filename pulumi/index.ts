import * as pulumi from "@pulumi/pulumi";
import * as aws from "@pulumi/aws";
import * as awsx from "@pulumi/awsx";
import * as glob from 'glob';
import * as mime from 'mime';
import { remote } from '@pulumi/command'

const configs = new pulumi.Config();

// Create an AWS resource (S3 Bucket)
const bucket = new aws.s3.Bucket("lysz210.name", {
    bucket: 'lysz210.name',
    website: {
        indexDocument: "index.html"
    },
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
        acl: 'public-read',
        contentType: mimeType || undefined
    })
})

const cvTraefik = new remote.CopyFile('traefik', {
    connection: {
        host: 'lysz210.name',
        user: 'ubuntu',
        privateKey: configs.requireSecret('awsMiPem')
    },
    localPath: './website-traefik.yaml',
    remotePath: 'swarm-controller/configs/traefik/website.yaml'
})

// Export the name of the bucket
export const bucketName = bucket.id;
export const websiteEndpoint = bucket.websiteEndpoint;