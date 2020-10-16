#!/usr/bin/env node

const {spawn} = require('child_process');

const [,,key = '', command = ''] = process.argv;

if (key in process.env && command.length) {
    spawn('npm', ['run', command], { stdio: 'inherit', shell: true });
}
