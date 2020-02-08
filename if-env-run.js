#!/usr/bin/env node 

const {spawn} = require('child_process');

const argv = process.argv
const key = argv[2]
const command = argv[3]

if (key in process.env) spawn('npm', ['run', command], { stdio: 'inherit' });